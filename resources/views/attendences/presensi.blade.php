@extends('layout.main')

@section('judul','Presensi')
@section('bagan')
<div class="editsiswa">
    <div class="container mt-5 mb-5">
        <h3>Form Presensi ({{$attendences->title}})</h3>
        <div class="col-md-12">
            <form action="{{route('attendences.presensiStore', $attendences->id)}}" method="POST">
                @csrf
                @if(!empty($attendenceUser))
                <div class="form-row">
                    <div class="col">
                        <label for="">Status presensi</label>
                        @if($attendenceUser->status == 'hadir')
                        <span class="badge badge-success">Tepat waktu</span>
                        @elseif($attendenceUser->status == 'izin')
                        <span class="badge badge-warning">Izin</span>
                        @elseif($attendenceUser->status == 'terlambat')
                        <span class="badge badge-danger">Terlambat</span>
                        @endif
                    </div>
                </div>
                @endif
                <div class="form-row">
                    <div class="col">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" disabled value="{{$userDetail->fullname}}">
                    </div>
                    <div class="col">
                        <label for="">Waktu sekarang</label>
                      <input type="text" class="form-control" name="start_time" readonly value="{{date('Y-m-d H:i:s')}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="">Meeting</label>
                        <input type="text" class="form-control" disabled value="{{$attendences->meeting->topic}}">
                    </div>
                    <div class="col">
                        <label for="">Tanggal terakhir absensi</label>
                        <input type="text" class="form-control" disabled value="{{$attendences->date_end}}">
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{route('conferencesPublic.index')}}" class="btn btn-danger">Cancel</a>
                    @if(empty($attendenceUser))
                        <button type="submit" class="btn btn-info">Submit</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection