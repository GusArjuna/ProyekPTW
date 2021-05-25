<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $accounts = User::all();
        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('accounts.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nbi' => 'unique:users',
            'email' => 'email|unique:users',
        ]);

        $transact = DB::transaction(function () use ($request) {
            $input = $request->all();

            if ($request->file('profile_photo_path')) {
                $file = $request->file('profile_photo_path');
                $filename = time() . ". {$file->extension()}";
                $path = $file->storeAs('public/file', $filename);
                $input['profile_photo_path'] = $path;
            }

            $input['email_verified_at'] = now();
            $user = User::create($input);
            $user->assignRole('user');

            return compact('user');
        });

        return redirect()->route('accounts.index')->with('message', 'Saved Successfully');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $account = User::find($id);
        if (empty($account)) {
            abort(404);
        }
        $roles = Role::pluck('name', 'id');
        return view('accounts.edit', compact('account', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $transact = DB::transaction(function () use ($request, $id) {
            $input = $request->all();
            $user = User::find($id);

            if ($request->file('profile_photo_path')) {
                Storage::delete('public/file', $user->profile_photo_path);
                $file = $request->file('profile_photo_path');
                $filename = time() . ". {$file->extension()}";
                $path = $file->storeAs('public/file', $filename);
                $input['profile_photo_path'] = $path;
            }

            if ($input['password']) {
                $input['password'] = Hash::make($input['password']);
            }

            $user = $user->update($input);

            return compact('user');
        });

        return redirect()->route('accounts.index')->with('message', 'Update Successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user == null) {
            abort(404);
        }

        $user->delete();
        return redirect()->back()->with('message', 'Delete Successfully');
    }
}
