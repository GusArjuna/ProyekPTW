@extends('layout.main')
@section('judul','Signature')

@section('bagan')

<div class="editsiswa">
    <div class="container mt-5 mb-5">
        <h3>Biodata</h3>
        <p class="text-danger"><b>Lengkapi Data Anda ! </b> Sebelum Generate Signature </p>
        <div class="row">
            <div class="col-md-12">
                <form action="{{$userDetail == null ? route('signatures.store') : route('signatures.update', $userDetail->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($userDetail != null)
                        @method('PUT')
                    @endif
                    <div class="form-row">
                        <div class="col">
                            <label for="">Nama Lengkap</label>
                          <input type="text" class="form-control" name="fullname" required value="{{$userDetail->fullname ?? null}}">
                        </div>
                        <div class="col">
                            <label for="">NIM</label>
                          <input type="number" class="form-control" name="student_number" required value="{{$userDetail->student_number ?? null}}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="">Tempat Lahir</label>
                          <input type="text" class="form-control" name="born_place" required value="{{$userDetail->born_place ?? null}}">
                        </div>
                        <div class="col">
                            <label for="">Tanggal Lahir</label>
                          <input type="date" class="form-control" name="born_date" required value="{{$userDetail->born_date ?? null}}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="">Alamat</label>
                            <textarea name="address" class="form-control" rows="4" required>
                                {{$userDetail->address ?? null}}
                            </textarea>
                        </div>
                        <div class="col">
                            <label for="">Desa</label>
                          <input type="text" class="form-control" name="village" value="{{$userDetail->village ?? null}}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="">Kecamatan</label>
                            <input type="text" class="form-control" name="district" value="{{$userDetail->district?? null}}">
                        </div>
                        <div class="col">
                            <label for="">Kabupaten</label>
                            <input type="text" class="form-control" name="city" value="{{$userDetail->city ?? null}}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="">Provinsi</label>
                            <input type="text" class="form-control" name="province" value="{{$userDetail->province ?? null}}">
                        </div>
                        <div class="col">
                            <label for="">No. Hp</label>
                            <input type="number" class="form-control" name="phone_number" required value="{{$userDetail->phone_number ?? null}}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-6">
                            <label for="">Photo</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                    </div>

                    <div class="form-row mt-2">
                        <div class="col">
                            @if($userDetail == null)
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            @else
                                <button type="submit" class="btn btn-warning">Simpan</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelBarcode">
                                    Check Barcode
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modelBarcode" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Scan Barcode</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body" style="text-align: center">
                                                <img src="data:image/png;base64,{{$userDetail->barcode }}" alt="barcode"  class="img-thumbnail" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection