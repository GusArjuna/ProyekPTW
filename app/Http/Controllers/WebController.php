<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    public function dashboard()
    {
        if (Auth::guest()) {
            return redirect('/login');
        }
        return view('dashboard-utama');
    }
    public function login()
    {
        dd("tes");
        return view('login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function signature()
    {
        return view('signature');
    }
    public function mail()
    {
        return view('mail');
    }
    public function sendmail(Request $req)
    {
        // dd($req->all());
        $details = [
            'title' => 'Mail From Cangs Web',
            'body' => $req->pesan,
            'subject' => $req->subject
        ];

        Mail::to($req->emailTujuan)->send(new \App\Mail\MyTestMail($details));
        return redirect()->back()->with('success', 'Pesan Sudah Terkirim');
    }
    public function vidcon()
    {
        return view('vidcon');
    }
}
