<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Day la trang login</title>

</head>
<body>
<form method="post">
    <?php echo csrf_field(); ?>
    <p>Site login</p>
    <input type="text" name="email" placeholder="email" value="ngodinhluan1@gmail.com" /><br/>
    <input type="text" name="password" placeholder="passsword" value="123" /><br/>
    <button type="submit" name="button">Submit</button>
</form>
</body>
</html><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/users/login.blade.php ENDPATH**/ ?>