@extends('layout.main')
@section('judul','signature')
@section('bagan')
<div class="editsiswa">
    <form action="/biodata" method="post" enctype="multipart/form-data">
        <input type="hidden" name="fotoLama" value="">
        <div class="container mt-5 mb-5">
            <h3>Biodata</h3>
            <p class="text-danger"><b>Lengkapi Data Anda ! </b> Sebelum Generate Signature </p>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="namaLengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" autofocus>
                    <div class="invalid-feedback">
                        Nama Lengkap Harus Diisi
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim">
                    <div class="invalid-feedback">
                        NIM Harus Diisi
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                    <div class="invalid-feedback">
                        Alamat Harus Diisi
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="tempatlahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir">
                    <div class="invalid-feedback">
                        Tempat Lahir Harus Diisi
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="tanggallahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir">
                    <div class="invalid-feedback">
                        Tanggal Lahir Harus Diisi
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="noHP">No Hp.</label>
                    <input type="text" class="form-control" id="noHP" name="noHP">
                    <div class="invalid-feedback">
                        No Hp. Harus Diisi
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                    <div class="invalid-feedback">
                        Alamat Harus Diisi
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="desa">Desa</label>
                    <input type="text" class="form-control" id="desa" name="desa">
                    <div class="invalid-feedback">
                        Desa Harus Diisi
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                    <div class="invalid-feedback">
                        Kecamatan Harus Diisi
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="kota">Kabupaten / Kota </label>
                    <input type="text" class="form-control" id="kota" name="kota">
                    <div class="invalid-feedback">
                        Kabupaten / Kota Harus Diisi
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <div class="col-md-2">
                    <img src="" class="img-thumbnail img-preview">
                </div>
                <div class="col-md-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto">
                        <div class="invalid-feedback">
                        </div>
                        <label for="foto" class="custom-file-label"></label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Perbarui</button>
            <a href="/" class="btn btn-primary">Generate</a>
        </div>
    </form>
</div>
@endsection