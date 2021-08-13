<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta property="og:url" itemprop="url" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta property="og:image:alt" content="">
    <link href="/public/sites/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/sites/vendor/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/public/sites/vendor/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="/public/sites/css/menu-mobile.css" rel="stylesheet">
    <link href="/public/sites/css/animate.css" rel="stylesheet">
    <link href="/public/sites/css/style.css?v={{ time() }}" rel="stylesheet">
    <link href="/public/sites/css/index.css?v={{ time() }}" rel="stylesheet">
    <link rel="stylesheet" href="/public/sites/css/terms.css">
    <link rel="stylesheet" href="/public/sites/css/privacy.css">
    <link rel="stylesheet" href="/public/sites/css/Return&RefundPolicy.css">
    <link rel="stylesheet" href="/public/sites/css/contact.css?v={{ time() }}">
    <link rel="stylesheet" href="/public/sites/css/My Course.css?v={{time()}}">
    <link rel="stylesheet" href="/public/sites/css/Invite friends.css?v={{time()}}">
    <script src="/public/sites/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<body>
    @include('Sites::inc.sidebar')
    @include('Sites::inc.header')

    @yield('content')
              
    @include('Sites::inc.footer')
    @include('Sites::inc.login')

   
    
    {{-- <script src="/public/sites/js/js.js"></script> --}}
    <script src="/public/sites/js/Course Introduction.js"></script>
    <script src="/public/sites/js/teacher.js"></script>
    <script src="/public/sites/js/popper.min.js" type="text/javascript"></script>
    <script src="/public/sites/js/wow.min.js" type="text/javascript"></script>
    <script src="/public/sites/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js" type="text/javascript"></script>
    <script src="/public/sites/js/app.js?v=1" type="text/javascript"></script>
    <script src="/public/sites/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/public/sites/js/popper.min.js" type="text/javascript"></script>
    <script src="/public/sites/js/wow.min.js" type="text/javascript"></script>
    <script src="/public/sites/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js" type="text/javascript"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS	+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-	h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    @include('Sites::inc.script')
    
</body>

