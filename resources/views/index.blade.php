<!DOCTYPE html>
<html lang="en">
<head>
    @stack('head_start')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Electro - HTML Ecommerce</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet"/>
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../../public/css/style.css" />
    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="../../public/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="../../public/css/slick-theme.css" />
    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="../../public/css/nouislider.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../../public/css/font-awesome.min.css"/>
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../../public/css/bootstrap.min.css" />
    @stack('css')
    @stack('stylesheet')
    @livewireStyles
</head>

 <body>
 @include('layout')
 @include('footer')
    <!-- jQuery Plugins -->

    @stack('js')
    <script src="../../public/js/jquery.min.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
    <script src="../../public/js/slick.min.js"></script>
    <script src="../../public/js/nouislider.min.js"></script>
    <script src="../../public/js/jquery.zoom.min.js"></script>
    <script src="../../public/js/main.js"></script>
    @stack('scripts')

    @stack('head_end')
 </body>
 </html>
