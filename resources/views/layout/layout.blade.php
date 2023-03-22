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
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweetalert2.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
    @yield('css')
    <script src="{{asset('js/jquery-3.6.0.min.js')}}" type="text/javaScript"></script>
    <script src="{{asset('js/sweetalert2.js')}}" type="text/javaScript"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <title>@yield('title', 'Nueva Pagina')</title>
</head>
<body>
    <header>
        @include('layout.header')
    </header>
    <div class="body">
        @yield('body')
    </div>
    <footer>
        @include('layout.footer')
    </footer>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}" type="text/javaScript"></script>
    @yield('javascript')
</body>
</html>
