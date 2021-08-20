<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail ForgotPassword</title>
</head>
<body>
    <p>
        
        Chào mừng <?php echo e($data['fullname']); ?> đã đăng ký thành viên tại traderclass Bạn hãy click vào đường link sau đây để resetpassword.
        </br>
        <a href="<?php echo e($data['linkreset']); ?>"><?php echo e($data['linkreset']); ?></a>
    </p>
</body>
</html><?php /**PATH D:\wamp64\www\traderclass\app\Modules\Sites\Views\Mail\forgotpassword_mail.blade.php ENDPATH**/ ?>