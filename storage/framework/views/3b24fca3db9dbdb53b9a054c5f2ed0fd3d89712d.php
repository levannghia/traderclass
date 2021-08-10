
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<div class="main">
    <div class="container  ">
        <p id="title">Information about us</p>
        <?php $__currentLoopData = $contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($value->name); ?></p>
        <p>Address: <?php echo e($value->address); ?></p>
        <p><?php echo e($value->enterprise_code); ?></p>
        <p><?php echo e($value->founding_date); ?></p>
        <p>Phone: <?php echo e($value->phone); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Sites::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\traderclass\app\Modules/Sites/Views/contact/index.blade.php ENDPATH**/ ?>