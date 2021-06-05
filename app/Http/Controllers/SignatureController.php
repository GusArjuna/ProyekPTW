<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\DNS2D;

class SignatureController extends Controller
{
    protected $model;
    protected $userDetailModel;

    public function __construct(User $user, UserDetail $userDetail)
    {
        $this->model = $user;
        $this->userDetailModel = $userDetail;
    }

    public function index()
    {
        $user = $this->model->find(auth()->user()->id);

        $userDetail = null;

        if ($user->userDetail != null) {
            $userDetail = $user->userDetail;
        }

        return view('signatures.index', compact('user', 'userDetail'));
    }

    public function store(Request $request)
    {
        $transact = DB::transaction(function () use ($request) {
            $input = $request->all();

            if ($request->file('photo')) {
                $file = $request->file('photo');
                $filename = time() . ".{$file->extension()}";
                $path = $file->storeAs('public/file', $filename);
                $input['photo'] = $path;
            }

            $input['user_id'] = auth()->user()->id;
            $userDetail = $this->userDetailModel::create($input);
            // generate barcode
            $url = env('APP_URL') . "/checkbarcode/" . Crypt::encryptString($userDetail->id);

            $barcode = new DNS2D;
            $userDetail->barcode = $barcode->getBarcodePNG($url, 'QRCODE');
            $userDetail->save();

            // End generated barcode
            return compact('userDetail');
        });

        return redirect()->back()->with('message', 'Generate signature Successfully');
    }

    public function update(Request $request, $id)
    {
        $transact = DB::transaction(function () use ($request, $id) {
            $userDetail = $this->userDetailModel::find($id);
            if ($userDetail == null) {
                abort(404);
            }

            $input = $request->all();

            if ($request->file('photo')) {
                Storage::delete('public/file',);
                $file = $request->file('photo');
                $filename = time() . ".{$file->extension()}";
                $path = $file->storeAs('public/file', $filename);
                $input['photo'] = $path;
            }

            $input['user_id'] = auth()->user()->id;
            $userDetail->update($input);
            return compact('userDetail');
        });

        return redirect()->back()->with('message', 'Update signature Successfully');
    }

    public function checkBarcode($id)
    {
        $userDetailId = Crypt::decryptString($id);

        $userDetail = $this->userDetailModel::find($userDetailId);

        if ($userDetail == null) {
            abort(404);
        }

        return view('signatures.checkBarcode', compact('userDetail'));
    }

    public function download($id)
    {
        $userDetailId = Crypt::decryptString($id);

        $userDetail = $this->userDetailModel::find($userDetailId);

        if ($userDetail == null) {
            abort(404);
        }

        return view('signatures.download', compact('userDetail'));
    }
}
