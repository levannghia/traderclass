<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title') - Administrator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="ngoluan.com" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--link rel="shortcut icon" href="assets/images/favicon.ico"-->
        <!-- Plugins css -->
        <link href="/public/dashboard/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="/public/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/public/dashboard/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/public/dashboard/assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="/public/dashboard/assets/libs/custombox/custombox.min.css" rel="stylesheet">
        <link href="/public/dashboard/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
        <link href="/public/dashboard/assets/css/style.css?v={{time()}}" rel="stylesheet" type="text/css" />

        <!-- Loading button css -->
        <link href="/public/dashboard/assets/libs/ladda/ladda-themeless.min.css" rel="stylesheet" type="text/css">
        <!-- JQuery js-->
        <script src="/public/dashboard/assets/js/jquery-3.4.1.min.js"></script>
        <!-- Ckeditor 4 js-->
        <script src="/public/dashboard/assets/libs/ckeditor/ckeditor.js"></script>
        <script src="/public/dashboard/assets/libs/ckeditor/config.js"></script>
        <script src="/public/dashboard/assets/libs/custombox/custombox.min.js"></script>

    </head>
    <body>
        <!--<div class="overplay_custome"></div>-->
        <!-- Begin page -->
        <div id="wrapper">
            @include('Dashboard::inc.header')

            @include('Dashboard::inc.sidebar')
            @show
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('Dashboard::inc.footer')

        </div>
        <!-- Vendor js -->
        <script src="/public/dashboard/assets/js/vendor.min.js"></script>
        <!-- Plugins js-->
        <script src="/public/dashboard/assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="/public/dashboard/assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="/public/dashboard/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <!-- Loading buttons js -->
        <script src="/public/dashboard/assets/libs/ladda/spin.js"></script>
        <script src="/public/dashboard/assets/libs/ladda/ladda.js"></script>
        <!-- Buttons init js-->
        <script src="/public/dashboard/assets/js/pages/loading-btn.init.js"></script>
        <script src="/public/dashboard/assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <script src="/public/dashboard/assets/js/pages/sweet-alerts.init.js"></script>
<!--<script src="/public/dashboard/assets/libs/flot-charts/jquery.flot.js"></script>-->
<!--<script src="/public/dashboard/assets/libs/flot-charts/jquery.flot.time.js"></script>-->
<!--<script src="/public/dashboard/assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>-->
<!--<script src="/public/dashboard/assets/libs/flot-charts/jquery.flot.selection.js"></script>-->
<!--<script src="/public/dashboard/assets/libs/flot-charts/jquery.flot.crosshair.js"></script>-->
        <!-- Dashboar 1 init js-->
        <!--<script src="/public/dashboard/assets/js/pages/dashboard-1.init.js"></script>-->

        <!-- App js-->
        <script src="/public/dashboard/assets/js/app.min.js"></script>
        @include('ckfinder::setup')
        @include('Dashboard::inc.script')

    </body>
</html>