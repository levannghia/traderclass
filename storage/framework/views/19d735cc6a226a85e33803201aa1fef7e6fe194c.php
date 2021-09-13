
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<form method="post" enctype="multipart/form-data">
    <?php echo $__env->make('Dashboard::inc.formheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Dashboard::inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card-box">
                <h4 class="header-title mb-3"><?php echo e($row->desc); ?></h4>
                <div class="form-group mb-2">
                    <label for="title">Tên video</label>
                    <input type="text" name="name" value="<?php echo e(old('name',$data->name)); ?>" class="form-control form-control-sm" placeholder="* Tên video">
                </div>
                <div class="form-group mb-2">
                    <label for="title">Id video youtube</label>
                    <input type="text" name="id_video" value="<?php echo e(old('id_video',$data->id_video)); ?>" class="form-control form-control-sm" placeholder="* Link video">
                </div>
                <div class="form-group mb-2">
                    <label>Khóa học</label>
                    <select class="form-control form-control-sm" name="id_course">
                        <?php $__currentLoopData = $list_course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->id); ?>" <?php echo e(old('id_course',$value->id)==$data->id_course ? "selected" :""); ?>><?php echo e($value->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                
                <div class="form-group mb-0">
                    <label>Trạng thái</label>
                    <select class="form-control form-control-sm" name="status">
                        <option value="1" <?php echo e(old('status',$data->status)==1? "selected" :""); ?>>Kích hoạt</option>
                        <option value="0" <?php echo e(old('status',$data->status)==0? "selected" :""); ?>>Khóa</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Dashboard::inc.formfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Dashboard/Views/video_course/edit.blade.php ENDPATH**/ ?>