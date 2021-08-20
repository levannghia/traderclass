<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
</head>
<body>
    <?php
    $token = $_GET['token'];
    $email = $_GET['email'];
    ?>

    <p>Nhập mật khẩu mới</p>

    <form method="POST">
    <?php echo csrf_field(); ?>
       
       <?php if(session()->has('message')): ?>
       <div class="alert alert-success">
         <?php echo e(session()->get('message')); ?>

       </div>
       <?php endif; ?>
       <input type="hidden" name="token" value="<?php echo e($token); ?>" >
       <input type="hidden" name="email" value="<?php echo e($email); ?>">
        <input type="password" name="password" placeholder="Nhập password">
        <button type="submit">Submit</button>
    </form>
</body>
</html><?php /**PATH D:\wamp64\www\traderclass\app\Modules\Sites\Views\users\updatepassword.blade.php ENDPATH**/ ?>