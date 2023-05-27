<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Sweet Alert 2 -->
        <script src="https://cdn.jsdelivr.net/sweetalert2/0.4.5/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/0.4.5/sweetalert2.css">
    </head>

    <body>
        <!-- HEADER -->
        <div class="container">
            @include('includes.header')
        </div>
        <!-- CONTENT-->
        <div class="container">
            @yield('content')
        </div>
        <!-- Scripts -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
