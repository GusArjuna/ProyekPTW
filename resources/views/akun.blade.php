@extends('layout.main')
@section('judul','Akun')
@section('bagan')
<h3>List Akun</h3>
<table class="table">
    <thead class="thead-primary">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">NIM</th>
            <th scope="col">Level</th>
            <th scope="col">aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Admin</td>
            <td>1461900089</td>
            <td>1</td>
            <td><a href="" class="badge badge-danger">hapus</a></td>
        </tr>
    </tbody>
</table>
<button type="submit" class="btn btn-primary">Buat</button>
@endsection