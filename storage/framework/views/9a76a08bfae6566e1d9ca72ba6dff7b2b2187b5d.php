<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title></title>
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="description" content="">
    <meta property="og:url" itemprop="url" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta property="og:image:alt" content="">
    <link href="./public/sites/css/bootstrap.min.css" rel="stylesheet">
    <link href="./public/sites/vendor/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./public/sites/vendor/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="./public/sites/css/menu-mobile.css" rel="stylesheet">
    <link href="./public/sites/css/animate.css" rel="stylesheet">
    <link href="./public/sites/css/style.css?v=<?php echo e(time()); ?>" rel="stylesheet">
    <script src="./public/sites/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

    <?php echo $__env->make('Sites::inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('Sites::inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="./public/sites/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./public/sites/js/popper.min.js" type="text/javascript"></script>
    <script src="./public/sites/js/wow.min.js" type="text/javascript"></script>
    <script src="./public/sites/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js" type="text/javascript"></script>
    <script src="./public/sites/js/app.js?v=1" type="text/javascript"></script>
    <?php echo $__env->make('Sites::inc.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/layout.blade.php ENDPATH**/ ?>