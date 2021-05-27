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
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3">Cangs</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">
                    <span>Dashboard</span></a>
            </li>
            <div class="sidebar-heading">
                Menu
            </div>
            @if(auth()->user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('mails.index')}}">
                        <span>Mail</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('conferences.index')}}">
                        <span>List Conference</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('accounts.index')}}">
                        <span>Manajemen Akun</span>
                    </a>
                </li>
            @elseif(auth()->user()->hasRole('user'))
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('signatures.index')}}">
                        <span>Generate Signature</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#!">
                        <span>Conferences</span>
                    </a>
                </li>
            @endif
            <hr>
            <li class="nav-item">
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="btn btn-danger ml-5 mt-5" name="logout" type="submit">log out</button>
                </form>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                </nav>
                <!-- End of Topbar -->
                <div class="container">
                    @if ($message = Session::get('message'))
                    <div class="alert alert-info alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                            <ul>
                                {!! implode('', $errors->all('<li>:message</li>')) !!}
                            </ul>
                        </div>
                    @endif
                    @yield('bagan')
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('js/jquery-3.5.1.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="{{url('js/bootstrap.js')}}"></script>
    <script src="{{url('js/script.js')}}"></script>
    @stack('scripts')
</body>

</html>