
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<div class="main">
    <div class="container  ">
        <?php echo $privacy->content; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Sites::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\traderclass\app\Modules/Sites/Views/privacy/index.blade.php ENDPATH**/ ?>