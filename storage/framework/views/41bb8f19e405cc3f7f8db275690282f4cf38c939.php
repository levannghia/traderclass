<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Silica Admin</title>
    <script src="/public/dashboard/assets/js/vendor.min.js"></script>
    <script src="/public/dashboard/assets/js/app.min.js"></script>
    <link rel="stylesheet" href="/public/dashboard/assets/css/app.min.css">
    <link rel="stylesheet" href="/public/dashboard/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/dashboard/assets/css/icons.min.css">
    
</head>

<body class="sidebar-light">
    <?php echo $__env->make('Dashboard::inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" method="post">
                                <?php echo csrf_field(); ?>
                                <?php if(count($errors) > 0): ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body text-danger">
                                                    <h5 class="card-title"><i class="fe-alert-triangle"></i> Đã xảy ra
                                                        lỗi</h5>
                                                    <ul style="margin: 0;padding: 0 15px;">
                                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="card-text"><?php echo e($value); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>   
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Email" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" name="password">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        type="submit">SIGN IN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</body>

</html>
<?php /**PATH D:\wamp64\www\traderclass\app\Modules\Dashboard\Views\authentication\login.blade.php ENDPATH**/ ?>