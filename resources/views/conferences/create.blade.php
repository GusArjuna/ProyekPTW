@extends('layout.main')
@section('judul','Accounts')

@section('bagan')

<div class="editsiswa">
    <div class="container mt-5 mb-5">
        <h3>Add Conferences</h3>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route("conferences.store")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="">Topik</label>
                          <input type="text" class="form-control" name="topic" required>
                        </div>
                        <div class="col">
                            <label for="">Tanggal & Waktu</label>
                          <input type="datetime-local" class="form-control" name="start_time" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="">Durasi (Menit)</label>
                          <input type="number" class="form-control" name="duration" required>
                        </div>
                        <div class="col">
                            <label for="">Password Conferences</label>
                          <input type="text" class="form-control" name="password" required>
                        </div>
                    </div>

                    <a href="{{route('conferences.index')}}" class="btn btn-danger mt-2">Cancel</a>
                    <button type="submit" class="btn btn-primary mt-2">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection