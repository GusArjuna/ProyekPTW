@extends('layout.main')
@section('judul','Mail')
@section('bagan')
<div class="editsiswa">
    @if(Session::has('success'))
    {{Session::get('success')}}
    @endif
    <form action="{{url('/sendmail')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5 mb-5">
            <h3>E-Mail</h3>
            <div class="form-row ml-2">
                <div class="form-group col-md-4">
                    <label for="emailTujuan">Email Tujuan</label>
                    <input type="text" class="form-control" id="emailTujuan" name="emailTujuan" autofocus required>
                </div>
                <div class="form-group col-md-3">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
            </div>
            <div class="input-group">
                <span class="input-group-text">Pesan</span>
                <textarea class="form-control" id="pesan" name="pesan" required></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
    </form>
</div>
@endsection