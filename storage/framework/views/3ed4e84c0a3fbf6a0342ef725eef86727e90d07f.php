
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
                    <label for="title">Họ & tên</label>
                    <input type="text" name="fullname" value="<?php echo e(old('fullname',$data->fullname)); ?>" class="form-control form-control-sm" placeholder="* Họ và tên">
                </div>
                <div class="form-group mb-2">
                    <label for="title">Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email',$data->email)); ?>" class="form-control form-control-sm" placeholder="* Email">
                </div>
                <div class="form-group mb-2">
                    <label>Giới tính</label>
                    <select class="form-control form-control-sm" name="gender">
                        <option value="0" <?php echo e(old('status',$data->status)==0 ? "selected" :""); ?>>Nữ</option>
                        <option value="1" <?php echo e(old('status',$data->status)==1 ? "selected" :""); ?>>Nam</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="title">Số điện thoại</label>
                    <input type="text"  name="phone" value="<?php echo e(old('phone', $data->phone)); ?>" class="form-control form-control-sm" placeholder="* số điện thoại">
                </div>
                <div class="form-group mb-2">
                    <label for="title">Địa chỉ</label>
                    <input type="text"  name="address" value="<?php echo e(old('address', $data->address)); ?>" class="form-control form-control-sm" placeholder="* Địa chỉ">
                </div>
                <div class="form-group mb-2">
                    <label for="title">Password reset 1-8</label>
                    <input type="text"  name="password" value="12345678" class="form-control form-control-sm" placeholder="* password">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-image mr-1"></i> Hình ảnh</h5>
                <?php if($data->photo!=""): ?>
                <div class="form-group mb-2">
                    <img src="/public/upload/images/admins/large/<?php echo e($data->photo); ?>" style="width: auto;max-width: 100%">
                </div>
                <?php endif; ?>
                <div class="form-group mb-2">
                    <?php
                    $thumbsize = json_decode($settings["THUMB_SIZE_ADMIN"]);
                    ?>
                    <label>Upload (jpg,png) [<?php echo e($thumbsize->width."x".$thumbsize->height); ?>px]</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input " name="photo" id="photo">
                            <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                    </div>
                </div>
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
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules\Dashboard\Views\admin\edit.blade.php ENDPATH**/ ?>