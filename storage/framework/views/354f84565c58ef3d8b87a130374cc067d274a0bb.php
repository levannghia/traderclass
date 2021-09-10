<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>payment Crypto</title>
</head>
<body>
    <form action="<?php echo e(route('sites.crypto.postAdd')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="email" name="email" id="" placeholder="email..."> <br>
        <select name="symbol">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($value['symbol'] == 'BTCUSDT'): ?>
                <option value="BTCUSDT">Bitcoin</option>
                <?php elseif($value['symbol'] == 'ETHUSDT'): ?>
                <option value="ETHUSDT">Ethereum</option>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select> <br>
        <input type="text" id="" name="currency" placeholder="USD..."> <br>
        <button type="submit">submit</button>
    </form>
</body>
</html><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/payment_crypto/index.blade.php ENDPATH**/ ?>