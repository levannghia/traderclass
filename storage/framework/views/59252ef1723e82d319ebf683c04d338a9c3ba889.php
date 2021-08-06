<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký người dùng</title>
</head>
<body>
    <p>Đăng ký người dùng</p>
    <form  method="post">
        <?php echo csrf_field(); ?>
       
        <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
          <?php echo e(session()->get('message')); ?>

        </div>
        <?php endif; ?>

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
       
        <input type="email" name = "email" id="email" placeholder="email"> <br/>
        <input type="text" name = "fullname" id="fullname" placeholder="fullname"> <br/>
        <select name="gender" id="gender">
            <option value="1">Nam</option>
            <option value="2">Nữ</option>
        </select><br/>
        <input type="text" name = "address" id="address" placeholder="address"> <br/>
        <input type="text" name = "phone" id="phone" placeholder="phone"> <br/>
        <input type="password" name = "password" id="password" placeholder="password"> <br/>
        <input type="password" name = "password_comfirmation" id="password_comfirmation" placeholder="password_comfirmation"> <br/>     
        <select name="type" id="type">
            <option value="0">Normal</option>
            <option value="1">Dev</option>
        </select><br/>
        <button type="submit" name="button">Submit</button>
        <br>
        
        <div class="text-center mt-4 font-weight-light">
        Do you have an account? <a href="<?php echo e(url('/login')); ?>" class="text-primary">Login</a>
      </div> 
       
    </form>
    
</body>
</html><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/users/register.blade.php ENDPATH**/ ?>