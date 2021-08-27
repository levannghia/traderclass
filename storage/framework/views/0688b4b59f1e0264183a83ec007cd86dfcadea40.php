
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
                    <label for="title">Chức vụ</label>
                    <input type="text" name="position" value="<?php echo e(old('position',$data->position)); ?>" class="form-control form-control-sm" placeholder="* Chức vụ">
                </div>
            </div>
            <div class="card-box">
                <h4 class="header-title mb-3">Danh sách khóa học</h4>
                <form method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="card-box">
                                <div class="responsive-table-plugin">
                                    <div class="table-wrapper">
                                        <div class="table-rep-plugin fixed-solution">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table class="table table-sm table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Hình ảnh</th>
                                                            <th>Tên khóa học</th>
                                                            <th>Danh mục</th>
                                                            <th>Status</th>
                                                            
                                                            <th>Tools</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $list_course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($value->status != 2): ?>
                                                        <tr>
                                                            <th scope="row"><input type="checkbox" name="check[]" value="<?php echo e($value->id); ?>" /></th>
                                                            <td class="table-user"><img src='/public/upload/images/course/thumb/<?php echo e($value->photo); ?>' class="rounded-circle"/></td>
                                                            <td><a href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/class/<?php echo e($value->id); ?>" title="xem danh sách lớp <?php echo e($value->name); ?>"><?php echo e($value->name); ?></a></td>
                                                            <td><?php echo e($value->title); ?></td>
                                                            <td>
                                                                <?php if($value->status): ?>
                                                                <span class="badge bg-soft-success text-success shadow-none">Kích hoạt</span>
                                                                <?php elseif(!$value->status): ?>
                                                                <span class="badge bg-soft-danger text-danger shadow-none">Khóa</span>
                                                                <?php endif; ?>
                                                             </td>
                                                            
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn btn-blue btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-settings"></i></button>
                                                                    <div class="dropdown-menu dropdown-menu-right"  x-placement="bottom-start" >
                                                                        <a class="dropdown-item" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/class/<?php echo e($value->id); ?>"><i class="fa fa-eye"></i> Xem</a>
                                                                        <a class="dropdown-item" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/course/edit/<?php echo e($value->id); ?>"><i class="fe-edit-2"></i> Chỉnh sửa</a>
                                                                        <?php if($value->status==1): ?>
                                                                        <a class="dropdown-item text-danger" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/teacher/course/status/<?php echo e($value->id); ?>/0"><i class="fe-lock"></i> Khóa</a>
                                                                        <?php elseif($value->status==0): ?>
                                                                        <a class="dropdown-item text-success" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/teacher/course/status/<?php echo e($value->id); ?>/1"><i class="fe-check-circle"></i> Kích hoạt</a>
                                                                        <?php endif; ?>
                                                                        <div class="dropdown-divider"></div>
                                                                        <?php if(Gate::allows('delete', 'Teachers')): ?>
                                                                        <a class="dropdown-item text-danger" href='/<?php echo e(Helper_Dashboard::get_patch()); ?>/teacher/course/delete/[{"id":<?php echo e($value->id); ?>}]'><i class="fe-trash-2"></i> Xóa</a>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pagin mt-2">
                                    <div class="row">
                                        <div class="col">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-trash-2"></i> <i class="mdi mdi-chevron-down"></i></button>
                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                                                    <a class="dropdown-item" href="#" onclick="javascript:checkDelBoxes($(this).closest('form').get(0), 'check[]', true);return false;"><i class="fe-check-square"></i> Tất cả</a>
                                                    <a class="dropdown-item" href="#" onclick="javascript:checkDelBoxes($(this).closest('form').get(0), 'check[]', false);return false;"><i class="fe-x"></i> Hủy bỏ</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" delete-all="true" url="/<?php echo e(Helper_Dashboard::get_patch(1)); ?>/course/delete" href="#"><i class="fe-trash-2"></i> Xóa</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-image mr-1"></i> Hình ảnh</h5>
                <?php if($data->photo!=""): ?>
                <div class="form-group mb-2">
                    <img src="/public/upload/images/teachers/large/<?php echo e($data->photo); ?>" style="width: auto;max-width: 100%">
                </div>
                <?php endif; ?>
                <div class="form-group mb-2">
                    <?php
                    $thumbsize = json_decode($settings["THUMB_SIZE_TEACHERS"]);
                    ?>
                    <label>Upload (jpg,png) [<?php echo e($thumbsize->width."x".$thumbsize->height); ?>px]</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input " name="photo" id="photo">
                            <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>Trạng thái</label>
                    <select class="form-control form-control-sm" name="status">
                        <option value="1" <?php echo e(old('status',$data->status)==1? "selected" :""); ?>>Kích hoạt</option>
                        <option value="0" <?php echo e(old('status',$data->status)==0? "selected" :""); ?>>Khóa</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label>Type</label>
                    <select class="form-control form-control-sm" name="type">
                        <option value="1" <?php echo e(old('type',$data->type)==1? "selected" :""); ?>>New</option>
                        <option value="0" <?php echo e(old('type',$data->type)==0? "selected" :""); ?>>Old</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Dashboard::inc.formfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Dashboard/Views/teacher/edit.blade.php ENDPATH**/ ?>