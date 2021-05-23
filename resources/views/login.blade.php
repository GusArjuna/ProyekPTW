@extends('layout.acc')
@section('judul','Login')
@section('bagan')
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
</div>
<form method="POST" action="{{  url("login") }}">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter Username...">
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
    </div>
    <hr>
    <button class="btn btn-primary btn-user btn-block">
        Login
    </button>
    <p class="text-danger mt-3 text-center">Belum Punya Akun? <a href="/register" class="text-primary">Register</a></p>
</form>
@endsection