@extends('layout.main')
@section('judul','Vidcon')
@section('bagan')
<h3>List Conferences</h3>
<table class="table">
    <thead class="thead-primary">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Judul</th>
            <th scope="col">Waktu</th>
            <th scope="col">Link</th>
            <th scope="col">aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Zoom apapa</td>
            <td>5 juni 2001</td>
            <td>http</td>
            <td>
                <a href="" class="badge badge-danger">Hapus</a>
            </td>
        </tr>
    </tbody>
</table>
<button type="submit" class="btn btn-primary">Buat</button>

@endsection