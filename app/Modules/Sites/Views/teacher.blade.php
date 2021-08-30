<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/sites/css/style.css?v={{time()}}">
    @if (Auth::check())
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @else
    <link href="/public/sites/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/sites/css/index2.css?v={{time()}}">
    @endif
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    
    <link href="/public/sites/css/menu-mobile.css?v={{time()}}" rel="stylesheet">
    <link href="/public/sites/css/animate.css?v={{time()}}" rel="stylesheet">
   
    <link rel="stylesheet" href="/public/sites/css/Teacher.css?v={{time()}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/public/sites/js/js.js" type="text/javascript"></script>
    <!--Icon-->
    <title>@yield('title')</title>
</head>

<body>

    @include('Sites::inc.sidebar')
    @include('Sites::inc.header')

    @yield('content')

    @include('Sites::inc.footer')
    @if (!Auth::check())
        @include('Sites::inc.login')
    @endif
   
    {{-- <script src="/public/sites/js/js.js"></script> --}}
    <script src="/public/sites/js/Course Introduction.js"></script>
    <script src="/public/sites/js/teacher.js?v={{time()}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="/public/sites/js/wow.min.js" type="text/javascript"></script>
    <script src="/public/sites/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js" type="text/javascript"></script>
    @include('Sites::inc.script')
</body>

</html>

