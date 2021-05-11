<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Electro Market</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet"/>
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />
    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />
    <!-- Font Awesome Icon -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    @yield('additional_css')
</head>
@include('layout.header')
 <body>

 @yield('content')

 </body>
 @include('layout.footer')


    <!-- jQuery Plugins -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>

        </script>
    @yield('additional_js')
 </html>
