
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form style="text-align: center">
        <h3>Payment Crypto to <?php echo e($username); ?></h3>
        <label style="color: red" for="">Amount(<?php echo e($rcurrency); ?>)</label>
        <h1><?php echo e($result['result']['amount']); ?> <?php echo e($rcurrency); ?></h1>
        <a style="background: green; color: white; padding: 5px;" href="<?php echo e($result['result']['status_url']); ?>">PAYMENT</a>
    </form>
</body>
</html><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/terms/index3.blade.php ENDPATH**/ ?>