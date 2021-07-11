@extends('layout.main')
@section('judul','Conferences')

@section('bagan')

<div class="editsiswa">
    <div class="container mt-5 mb-5">
        <h3>List Presensi</h3>
        <div class="row">
            <div class="col-md-12 mb-2">
                <a href="{{route('attendences.create')}}" class="btn btn-primary">Add New Presensi</a>
            </div>
            <div class="col-md-12">
                <table class="table table-striped table-inverse table-presensi">
                    <thead class="thead-inverse">
                        <tr>
                            <th>No</th>
                            <th>Judul Presensi</th>
                            <th>Absensi Meeting (optional)</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                           @foreach($attendences as $item)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->meeting->topic ?? '-'}}</td>
                                    <td>
                                        {{$item->date_start}}
                                    </td>
                                    <td>{{$item->date_end}}</td>
                                    <td>
                                        <a href="{{route('attendences.show', $item->id)}}" class="btn btn-info">Detail</a>
                                        <a href="{{route('attendences.edit', $item->id)}}" class="btn btn-warning">Edit</a>
                                        <form action="{{route('attendences.destroy', $item->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
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