
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<form method="post">
    <?php echo $__env->make('Dashboard::inc.formheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Dashboard::inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card-box">
                <h4 class="header-title mb-3"><?php echo e($row->desc); ?></h4>
                <div class="form-group mb-2">
                    <label for="title">Họ & tên</label>
                    <input type="text" name="name" value="<?php echo e(old('name',$data->name)); ?>" class="form-control form-control-sm" placeholder="* Họ và tên">
                </div>
                <div class="form-group mb-2">
                    <label for="input_note">Mô tả</label>
                    <textarea  name="note" rows="5" class="form-control form-control-sm " placeholder="Mô tả"><?php echo e(old('note',$data->Note)); ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Dashboard::inc.formfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules\Dashboard\Views\role\edit.blade.php ENDPATH**/ ?>