<?php if(Session::has("flash_message")): ?>
<div class="alert alert-success bg-<?php echo e(Session::get("type")); ?> text-white border-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <?php echo e(Session::get("flash_message")); ?>

</div>
<?php endif; ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Dashboard/Views/inc/message.blade.php ENDPATH**/ ?>