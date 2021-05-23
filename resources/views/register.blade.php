@extends('layout.acc')
@section('judul','Register')
@section('bagan')
<a href="/login" class="close">
    <span>&times;</span>
</a>
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Regist Page</h1>
</div>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter Username...">
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Enter Full Name...">
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="nbi" name="nbi" placeholder="nbi">
    </div>
    <hr>
    <button class="btn btn-primary btn-user btn-block">
        Register
    </button>
</form>
@endsection