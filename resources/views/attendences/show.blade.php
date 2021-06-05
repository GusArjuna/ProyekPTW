@extends('layout.main')
@section('judul','Attendece Detail')

@section('bagan')

<div class="editsiswa">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('attendences.index')}}" class="btn btn-danger">Kembali</a>
            </div>
            <div class="col-md-12">
                <h3>Detail Presensi</h3>
                <div class="form-row">
                    <div class="col">
                        <label for="">Judul Presensi</label>
                        <input type="text" class="form-control" value="{{$attendences->title}}" readonly>
                    </div>
                    <div class="col">
                        <label for="">Judul Meeting</label>
                        <input type="text" class="form-control" value="{{$attendences->meeting->topic}}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="">Tanggal mulai</label>
                        <input type="text" class="form-control" value="{{$attendences->date_start}}" readonly>
                    </div>
                    <div class="col">
                        <label for="">Tanggal berakhir</label>
                        <input type="text" class="form-control" value="{{$attendences->date_end}}" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <h3>Data absensi mahasiswa</h3>
                <table class="table table-striped table-inverse table-presensi">
                    <thead class="thead-inverse">
                        <tr>
                            <th>No</th>
                            <th>Nama/Email</th>
                            <th>NBI/NIM</th>
                            <th>Tanggal & waktu presensi</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($attendences->attendencesUser as $item)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td>{{$item->user->email}}</td>
                                    <td>{{$item->user->nbi ?? $item->user->userDetail->student_number}}</td>
                                    <td>{{$item->created_at->format('d-m-Y H:i:s')}}</td>
                                    <td>
                                        <a href="#!" class="btn btn-sm 
                                        @php
                                            if($item->status == 'hadir') {
                                                echo 'btn-success';
                                            }elseif ($item->status == 'terlambat') {
                                                echo 'btn-danger';
                                            }elseif ($item->status == 'izin') {
                                                echo 'btn-warning';
                                            }
                                        @endphp
                                        ">
                                            {{$item->status}}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.table-presensi').DataTable();
    });
</script>
@endpush