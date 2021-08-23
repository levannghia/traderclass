<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    {{-- <link rel="stylesheet" href="/public/sites/css/MasterClass.css" /> --}}
    <link rel="SHORTCUT ICON" href="https://www.masterclass.com/webpack/_/mc-logo-937df31b02ee324a8e1fe1773969416e.svg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/brands.min.css" integrity="sha512-sVSECYdnRMezwuq5uAjKQJEcu2wybeAPjU4VJQ9pCRcCY4pIpIw4YMHIOQ0CypfwHRvdSPbH++dA3O4Hihm/LQ==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap-grid.min.css" integrity="sha512-3AxW5HcDzhL9MJdO2mpDEGEZ6NcCg/pDSa8R2kH5gwEA4r48RxZf0nPITA1NfX1pNA6a/eAayX+yW6QopF4jeg==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <!-- Frontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Lity -->
    <link href="/public/sites/dist/lity.css" rel="stylesheet" />
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta property="og:url" itemprop="url" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta property="og:image:alt" content="">
    @if (Auth::check())
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @else
    <link href="/public/sites/css/bootstrap.min.css" rel="stylesheet">
    @endif
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
    <link rel="stylesheet" href="/public/sites/css/My Course.css?v={{ time() }}">
    <link rel="stylesheet" href="/public/sites/css/Invite friends.css?v={{ time() }}">
    <link rel="stylesheet" href="/public/sites/css/findmyclass.css?v={{ time() }}">
    <script src="/public/sites/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/public/sites/js/js.js" type="text/javascript"></script>
    
    <script src="/public/sites/js/app.js?v=1" type="text/javascript"></script>
</head>

<body>
    @include('Sites::inc.sidebar')
    @include('Sites::inc.header')

    @yield('content')

    @include('Sites::inc.footer')
    @include('Sites::inc.login')

    
    <!-- CDN ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="/public/sites/js/Course Introduction.js"></script>
    <script src="/public/sites/js/teacher.js"></script>
    <!-- <script src="/public/sites/js/MasterClass.js"></script> -->
    <script src="/public/sites/js/popper.min.js" type="text/javascript"></script>
    <script src="/public/sites/js/wow.min.js" type="text/javascript"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="/public/sites/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js" type="text/javascript"></script>
    <script src="/public/sites/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/public/sites/js/popper.min.js" type="text/javascript"></script>
    <script src="/public/sites/js/wow.min.js" type="text/javascript"></script>
    
    <script src="/public/sites/vendor/jquery.js"></script>
    <script src="/public/sites/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js" type="text/javascript"></script>
    <script src="/public/sites/dist/lity.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
    @include('Sites::inc.script')

</body>
