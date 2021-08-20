<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<form method="post" enctype="multipart/form-data">
    <?php echo $__env->make('Dashboard::inc.formheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Dashboard::inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <h4 class="header-title mb-3"><?php echo e($row->desc); ?></h4>
                <div class="form-group mb-2">
                    <label for="title">Tiêu đề</label>
                    <input type="text" name="title" value="<?php echo e(old('title',$data->title)); ?>" class="form-control form-control-sm" placeholder="* tiêu đề">
                </div>
                <div class="form-group mb-2">
                    <label for="title">Link</label>
                    <input type="text" name="alias" value="<?php echo e(old('alias',$data->alias)); ?>" class="form-control form-control-sm" placeholder="bai-viet">
                </div>
                <div class="form-group mb-2">
                    <label>Chuyên mục</label>
                    <select class="form-control form-control-sm" name="blog_category_id">
                        <option value="0">-- Không chọn --</option>
                        <?php 
                        // Helper_backend::recursive_category_select($list_category, 0, '', old('blog_category_id', $data->blog_category_id)); 
                        ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="input_note">Mô tả</label>
                    <textarea  name="excerpt" rows="5" class="form-control form-control-sm " placeholder="Mô tả"><?php echo e(old('excerpt',$data->excerpt)); ?></textarea>
                </div>
                <div class="form-group mb-0">
                    <label for="input_note">Nội dung</label>
                    <textarea  name="content" rows="8" class="form-control form-control-sm" placeholder="* Nội dung"><?php echo e(old('content',$data->content)); ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-image mr-1"></i> Hình ảnh</h5>
                <?php if($data->photo!=""): ?>
                <div class="form-group mb-2">
                    <img src="/public/upload/images/blog/large/<?php echo e($data->photo); ?>" style="width: auto;max-width: 100%">
                </div>
                <?php endif; ?>
                <div class="form-group mb-2">
                    <?php
                    $thumbsize = json_decode($settings["THUMB_SIZE_BLOG"]);
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
            <div class="card-box">
                <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-edit-1"></i> SEO</h5>
                <div class="form-group mb-2">
                    <label for="title">Meta title</label>
                    <input type="text" name="meta_title" value="<?php echo e(old('meta_title',$data->meta_title)); ?>" class="form-control form-control-sm" placeholder="Meta title">
                </div>
                <div class="form-group mb-2">
                    <label for="title">Meta keyword</label>
                    <input type="text" name="meta_keyword" value="<?php echo e(old('meta_keyword',$data->meta_keyword)); ?>" class="form-control form-control-sm" placeholder="Meta keyword">
                </div>
                <div class="form-group mb-0">
                    <label for="input_note">Meta description</label>
                    <textarea  name="meta_description" rows="8" class="form-control form-control-sm" placeholder="Meta description"><?php echo e(old('meta_description',$data->meta_description)); ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Dashboard::inc.formfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules\Dashboard\Views\blog\edit.blade.php ENDPATH**/ ?>