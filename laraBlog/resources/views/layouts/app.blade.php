<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{asset('plugins/themify/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.css')}}">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('assets/css/public-style.css')}}">

</head>
<body>
    
    @include('layouts.inc.public-navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.inc.public-footer')

    <!-- Main jQuery -->
    <script src="{{asset('plugins/jquery/jquery.js')}}"></script>

    <!-- Bootstrap 4.3.1 -->
    <script src="{{asset('plugins/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>  
    
    <script src="{{asset('js/script.js')}}"></script>

</body>
</html>


