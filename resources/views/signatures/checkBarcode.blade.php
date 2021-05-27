<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul')</title>
    <link rel="stylesheet" href="{{url('css/two.css')}}">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link rel="stylesheet" href="{{url('css/styles.css')}}">
    <link rel="stylesheet" href="{{url('css/dashboard.min.css')}}">
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!-- <link rel="shortcut icon" href="img/nhico.ico" type="image/x-icon"> -->
</head>

<body class="page-top">
    <div id="wrapper">

<div class="editsiswa">
    <div class="container mt-5 mb-5">
        <h3>Data Barcode</h3>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead class="thead-inverse">
                        <tbody>
                            <tr>
                                <td>Photo</td>
                                <td>:</td>
                                <td>
                                    <img src="{{asset("storage/{$userDetail->photo}")}}" class="img-thumbnail" width="100" height="100" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td>{{$userDetail->fullname}}</td>
                            </tr>
                            <tr>
                                <td>NIM</td>
                                <td>:</td>
                                <td>{{$userDetail->student_number}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{$userDetail->address}}</td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:</td>
                                <td>{{$userDetail->born_place}}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td>{{$userDetail->born_date}}</td>
                            </tr>
                            <tr>
                                <td>No. Hp</td>
                                <td>:</td>
                                <td>{{$userDetail->phone_number}}</td>
                            </tr>
                            <tr>
                                <td>Desa</td>
                                <td>:</td>
                                <td>{{$userDetail->village}}</td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>:</td>
                                <td>{{$userDetail->district}}</td>
                            </tr>
                            <tr>
                                <td>Kabupaten/Kota</td>
                                <td>:</td>
                                <td>{{$userDetail->city}}</td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>:</td>
                                <td>{{$userDetail->province}}</td>
                            </tr>
                            <tr>
                                <td>Barcode</td>
                                <td>:</td>
                                <td>
                                    <img src="data:image/png;base64,{{$userDetail->barcode }}" alt="barcode"  class="img-thumbnail" />
                                </td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    </div>
    <script src="{{url('js/jquery-3.5.1.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="{{url('js/bootstrap.js')}}"></script>
    <script src="{{url('js/script.js')}}"></script>
</body>
</html>