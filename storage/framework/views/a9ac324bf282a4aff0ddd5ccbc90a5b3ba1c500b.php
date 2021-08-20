<?php echo csrf_field(); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>" class="btn btn-danger waves-effect btn-sm ml-2"><i class="mdi mdi-close-circle"></i></a>
                <a href="javascript: window.location.reload();" class="btn btn-light waves-effect waves-light btn-sm ml-2">
                    <i class="mdi mdi-autorenew"></i>
                </a>
                <button type="submit" name="save" class="ladda-button btn btn-success waves-effect waves-light btn-sm ml-2" data-style="expand-right">
                    <span class="ladda-label"><i class="ti-save"></i> Save</span>
                    <span class="ladda-spinner"></span>
                </button>
            </div>
            <h4 class="page-title"><?php echo e($row->title); ?></h4>
        </div>
    </div>
</div>

<?php if(count($errors)>0): ?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body text-danger">
                <h5 class="card-title"><i class="fe-alert-triangle"></i> Đã xảy ra lỗi</h5>
                <ul style="margin: 0;padding: 0 15px;">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="card-text"><?php echo e($value); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules\Dashboard\Views\inc\formheader.blade.php ENDPATH**/ ?>