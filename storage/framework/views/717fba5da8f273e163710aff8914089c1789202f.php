<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Register  Password</title>
</head>
<body>
    <p>
        
        Xin chào <?php echo e($data['fullname']); ?>. Bạn hãy click vào đường link sau đây để hoàn tất việc thay đổi email.
        </br>
        <a href="<?php echo e($data['linkreset']); ?>"><?php echo e($data['linkreset']); ?></a>
    </p>
</body><?php /**PATH C:\wamp64\traderclass\app\Modules/Sites/Views/Mail/updateMail.blade.php ENDPATH**/ ?>