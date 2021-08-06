<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
</head>
<body>
    <p>Nhập email để lấy lại mật khẩu</p>
    <form method="POST">
    <?php echo csrf_field(); ?>
       
       <?php if(session()->has('message')): ?>
       <div class="alert alert-success">
         <?php echo e(session()->get('message')); ?>

       </div>
       <?php endif; ?>
        <input type="email" name="email" placeholder="Nhập email">
        <button type="submit">Submit</button>
    </form>
</body>
</html><?php /**PATH C:\wamp64\traderclass\app\Modules/Sites/Views/users/forgotpassword.blade.php ENDPATH**/ ?>