<?php

namespace App\Http\Controllers;

use App\Models\Attendece;
use App\Models\AttendenceUser;
use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendences = Attendece::with('meeting')->get();
        return view('attendences.index', compact('attendences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendences = Attendece::with('attendencesUser')->find($id);
        return view('attendences.show', compact('attendences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function presensi($presensiId)
    {
        $userDetail = UserDetail::where('user_id', Auth::user()->id)->first();
        $attendences = Attendece::find($presensiId);
        $attendenceUser = AttendenceUser::where(['user_id' => Auth::user()->id, 'attendence_id' => $attendences->id])->first();
        return view('attendences.presensi', compact('attendences', 'userDetail', 'attendenceUser'));
    }

    public function presensiStore(Request $request, $attendenceId) {
        // check if user already attendences
        $attendenceUser = AttendenceUser::where(['user_id' => Auth::user()->id, 'attendence_id' => $attendenceId])->first();
        
        if($attendenceUser != null) {
            return redirect()->back()->with('message', 'Anda sudah melakukan absen.');
        }

        $attendenceUser = new AttendenceUser;
        $attendenceUser->user_id = Auth::user()->id;
        $attendenceUser->attendence_id = $attendenceId;

        $dateTimeNow = Carbon::now();
        // hadir, izin, terlambat
        $status = "hadir";
        $description = 'Tepat waktu';

        $attendence = Attendece::find($attendenceId);

        if(empty($attendence)) {
            abort(404);
        }

        if(strtotime($dateTimeNow) < strtotime($attendence->date_start)) {
            return redirect()->back()->with('message', 'Mohon maaf absensi belum dibuka');
        }

        if(strtotime($dateTimeNow) > strtotime($attendence->date_end)) {
            $status = "terlambat";
            $description = "Absensi terlambat pada ".date('Y-m-d H:i:s', strtotime($dateTimeNow));
        }

        $attendenceUser->status = $status;
        $attendenceUser->description = $description;
        $attendenceUser->save();

        return redirect()->back()->with('message', 'Absensi berhasil');
    }
}
