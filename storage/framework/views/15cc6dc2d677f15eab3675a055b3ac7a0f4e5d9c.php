
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<form method="post">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <div class="form-inline">
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control border-white" name="search" value="<?php echo e(Cookie::get('search_order_detail')); ?>" placeholder="Tên người dùng...">
                                <div class="input-group-append">
                                    <button type="submit" name="btn_search" class="input-group-text bg-blue border-blue text-white">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <a href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/trash" class="btn btn-blue btn-sm ml-2">
                            <i class="fe-trash"></i>
                        </a>
                        <a href="javascript: window.location.reload();" class="btn btn-blue btn-sm ml-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <a href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/add" class="ladda-button waves-effect waves-light btn btn-blue btn-sm ml-1" data-style="expand-right">
                            <span class="ladda-label"><i class="fe-plus-circle"></i></span>
                            <span class="ladda-spinner"></span>
                        </a>
                    </div>
                </div>
                <h4 class="page-title"><?php echo e($row->title); ?></h4>
            </div>
        </div>
    </div>
    <?php echo $__env->make("Dashboard::inc.message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                            <th>Quantity</th>
                                            <th>Gia</th>
                                            <th>Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                        ?>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <?php if(@getimagesize($value->photo)): ?>
                                            <td class="table-user"><img src="<?php echo e($value->photo); ?>" class="rounded-circle"/></td>
                                            <?php else: ?>
                                            <td class="table-user"><img src='/public/upload/images/course/thumb/<?php echo e($value->photo); ?>' class="rounded-circle"/></td>
                                            <?php endif; ?>
                                            <td><a href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/order-detail/download-excel/<?php echo e($value->id); ?>" title="xuất đơn hàng ra file excel"><?php echo e($value->name); ?></a></td>
                                            <td><?php echo e($value->quantity); ?></td>
                                            <td><?php echo e($value->price); ?></td>
                                            <td><?php echo e($value->created_at); ?></td>
                                            
                                                

                                        </tr>
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
                                    <a class="dropdown-item text-danger" delete-all="true" url="/<?php echo e(Helper_Dashboard::get_patch(1)); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/delete" href="#"><i class="fe-trash-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <?php echo $data->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Dashboard/Views/order_detail/index.blade.php ENDPATH**/ ?>