@php
if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: '.$redirect);
}
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweetalert2.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
    @yield('css')
    <script src="{{asset('js/sweetalert2.js')}}" type="text/javaScript"></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}" type="text/javaScript"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
    <title>@yield('title', 'Nueva Pagina')</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-1 col-xl-1 px-sm-2 px-0 sidebar-dashboard">
                @include('layout.header2')
            </div>
            <div class="layout-dashboard-content col">
                <div class="col-s-12 sidebar-dashboard-2">
                    <nav class="navbar bg-light">
                        <div class="container-fluid">
                          <a class="navbar-brand" href="#">
                            <img src="{{asset('img/logo-estilo.webp')}}" class="img-fluid logo-estilo">
                          </a>
                          <ul class="menu">
                            <li class="nav-item">
                                <a href="{{route('dashboard')}}" class="nav-link align-middle px-0 active">
                                    <i class="bi-calendar4"></i>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('inscritos')}}" class="nav-link px-0 align-middle">
                                    <i class="bi-people"></i> </a>
                            </li>
                            <li>
                                <a href="{{route('logout')}}" class="nav-link px-0 align-middle">
                                    <i class="bi-box-arrow-right"></i> </a>
                            </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="body">
                    @yield('body')
                </div>
            </div>
        </div>
    </div>
    <footer>
        @include('layout.footer2')
    </footer>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" type="text/javaScript"></script>
    @yield('javascript')
</body>
</html>
