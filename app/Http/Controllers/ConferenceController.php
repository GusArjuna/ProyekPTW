<?php

namespace App\Http\Controllers;

use App\Jobs\InivatationMailJob;
use App\Models\Attendece;
use App\Models\Meeting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use MacsiDigital\Zoom\Facades\Zoom;

class ConferenceController extends Controller
{
    protected $zoomModel;
    protected $zoomUserId;

    public function __construct(Zoom $zoom)
    {
        $this->zoomModel = $zoom;
        $this->zoomUserId = env('ZOOM_USER');
    }

    public function index(Request $request)
    {
        $user = $this->zoomModel::user()->find($this->zoomUserId);
        $conferences = Meeting::orderBy('created_at', 'desc')->get();
        return view('conferences.index', compact('conferences'));
    }

    public function create()
    {
        return view("conferences.create");
    }

    public function store(Request $request)
    {
        try {
            $user = $this->zoomModel::user()->find($this->zoomUserId);
            // Create Meeting
            $meeting = Zoom::meeting()->make([
                'topic' => $request->topic,
                'type' => 1,
                'start_time' => new Carbon($request->start_time),
                "duration" => $request->duration,
                "password" => $request->password,
                'timezone' => "Asia/Jakarta"
            ]);

            $meeting->settings()->make([
                'join_before_host' => true,
                'approval_type' => 1,
                'registration_type' => 2,
                'waiting_room' => false,
            ]);

            $users = User::whereHas('roles', function ($query) {
                return $query->where('name', 'user');
            })->get();

            // foreach ($users as $user) {
            //     $registrants = Zoom::meetingRegistrant()->make([
            //         "email" => $user->email,
            //         "first_name" => $user->name,
            //     ]);
            //     $meeting->registrants()->save($registrants);
            // }

            $user->meetings()->save($meeting);
            $meeting->save();

            // save meeting
            $meeting = $meeting->toArray();

            $details = [
                "topic" => $meeting['topic'],
                "type" => $meeting['type'],
                "start_time" => $meeting['start_time'],
                "duration" => $meeting['duration'],
                "password" => $meeting['password'],
                "user_id" => $meeting['user_id'],
                "uuid" => $meeting['uuid'],
                "id" => $meeting['id'],
                "host_id" => $meeting['host_id'],
                "host_email" => $meeting['host_email'],
                "status" => $meeting['status'],
                "timezone" => $meeting['timezone'],
                "created_at" => $meeting['created_at'],
                "start_url" => $meeting['start_url'],
                "join_url" => $meeting['join_url'],
                "h323_password" => $meeting['h323_password'],
                "pstn_password" => $meeting['pstn_password'],
                "encrypted_password" => $meeting['encrypted_password'],
            ];

            $meetingModel = Meeting::create([
                "uuid" => $meeting['uuid'],
                "topic" => $meeting['topic'],
                "type" => $meeting['type'],
                "password" => $meeting['password'],
                "join_url" => $meeting['join_url'],
                "details" =>  json_encode($details),
                "settings" => json_encode($meeting['settings']),
            ]);

            // create presensi
            $attendences = new Attendece();
            $attendences->title = $request['title'];
            $attendences->date_start = $request['date_start'];
            $attendences->date_end = $request['date_end'];
            $attendences->description = $request['description'];
            $attendences->meeting_id = $meetingModel->id;
            $attendences->save();

            // send email notification to all user
            foreach ($users as $key => $value) {
                dispatch(new InivatationMailJob($value->email, $meetingModel, $attendences));
            }

            return redirect()->route('conferences.index')->with('message', 'Conference Successfully');
        } catch (\Exception $th) {
            return redirect()->back()->with('message', 'Gagal membuat conferences');
        }
    }

    public function destroy($id)
    {
        try {
            $meetingModel = Meeting::find($id);

            if ($meetingModel == null) {
                abort(404);
            }

            $meetingZoom = $this->zoomModel::meeting()->find($meetingModel->uuid);

            if ($meetingZoom != null) {
                $meetingZoom->delete();
            }

            $meetingModel->delete();

            return redirect()->back()->with('message', 'Conference Successfully deleted');
        } catch (\Exception $th) {
            $meetingModel->delete();
            return redirect()->back();
        }
    }

    public function indexPublic() {
        $conferences = Meeting::with('attendences')->get();
        return view('conferences.public.index', compact('conferences'));
    }
}
