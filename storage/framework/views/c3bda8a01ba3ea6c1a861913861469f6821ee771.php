<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/sites/css/style.css?v=<?php echo e(time()); ?>">
    <?php if(Auth::check()): ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php else: ?>
    <link href="/public/sites/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/sites/css/index2.css?v=<?php echo e(time()); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    
    <link href="/public/sites/css/menu-mobile.css?v=<?php echo e(time()); ?>" rel="stylesheet">
    <link href="/public/sites/css/animate.css?v=<?php echo e(time()); ?>" rel="stylesheet">
   
    <link rel="stylesheet" href="/public/sites/css/Teacher.css?v=<?php echo e(time()); ?>">
    
    <script src="/public/sites/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/public/sites/js/js.js" type="text/javascript"></script>
    <!--Icon-->
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>

<body>

    <?php echo $__env->make('Sites::inc.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Sites::inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('Sites::inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(!Auth::check()): ?>
        <?php echo $__env->make('Sites::inc.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
   
    
    <script src="/public/sites/js/Course Introduction.js"></script>
    <script src="/public/sites/js/teacher.js?v=<?php echo e(time()); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="/public/sites/js/wow.min.js" type="text/javascript"></script>
    <script src="/public/sites/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js" type="text/javascript"></script>
    <?php echo $__env->make('Sites::inc.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>

<?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/teacher.blade.php ENDPATH**/ ?>