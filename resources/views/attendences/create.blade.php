@extends('layout.main')
@section('judul','Attendences')

@section('bagan')

<div class="editsiswa">
    <div class="container mt-5 mb-5">
        <h3>Add Conferences</h3>
        <div class="row">
            
                <div class="col-md-12">
                    <form action="{{route('attendences.store')}}" method="post">
                        @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="">Judul Presensi</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="col">
                            <label for="">Tanggal Mulai</label>
                            <input type="datetime-local" class="form-control" name="date_start" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="">Tanggal Berakhir</label>
                            <input type="datetime-local" class="form-control" name="date_end" required>
                        </div>
                        <div class="col">
                            <label for="">Deskripsi (Optional)</label>
                            <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>
                    </div>

                    <a href="{{route('attendences.index')}}" class="btn btn-danger mt-2">Cancel</a>
                    <button type="submit" class="btn btn-primary mt-2">Save</button>
                </form>
                </div>
            
        </div>
    </div>
</div>

@endsection