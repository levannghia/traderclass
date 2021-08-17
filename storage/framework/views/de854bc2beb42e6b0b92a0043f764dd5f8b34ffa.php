
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
                                <input type="text" class="form-control border-white" name="search" value="<?php echo e(Cookie::get('search_user')); ?>" placeholder="Tên người dùng...">
                                <div class="input-group-append">
                                    <button type="submit" name="btn_search" class="input-group-text bg-blue border-blue text-white">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <a href="javascript: window.location.reload();" class="btn btn-blue btn-sm ml-2">
                            <i class="mdi mdi-autorenew"></i>
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
                                            <th>Hình ảnh</th>
                                            <th>Tên</th>
                                            <th>email</th>
                                            <th>Giới tính</th>
                                            <th>Phone</th>
                                            <th>Địa chỉ</th>
                                            <th>Trạng thái</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="table-user">
                                                <?php if(@getimagesize('http://dashboard.traderclass.vn/public/upload/images/users/thumb/'.$value->photo)): ?>
                                                <img src="/public/upload/images/users/thumb/<?php echo e($value->photo); ?>" class="rounded-circle"/>
                                                <?php else: ?>
                                                <img src="<?php echo e($value->photo); ?>" class="rounded-circle"/>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($value->fullname); ?></td>
                                            <td><?php echo e($value->email); ?></td>
                                            <?php if($value->gender): ?>
                                            <td>Nam</td>
                                            <?php elseif(!$value->gender): ?>
                                            <td>Nữ</td>
                                            <?php endif; ?>
                                            
                                            <td><?php echo e($value->phone); ?></td>
                                            <td><?php echo e($value->address); ?></td>
                                        
                                            <td>
                                                <?php if($value->status==1): ?>
                                                <span class="badge bg-soft-success text-success shadow-none">Đã kích hoạt</span>
                                                <?php elseif($value->status==2): ?>
                                                <span class="badge bg-soft-danger text-danger shadow-none">Khóa</span>
                                                <?php elseif($value->status==0): ?>
                                                <span class="badge bg-soft-danger text-danger shadow-none">Chưa xác nhận</span>
                                                <?php endif; ?>
                                             </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-blue btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-settings"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right"  x-placement="bottom-start" >
                                                        
                                                        <?php if($value->status==0): ?>
                                                        <a class="dropdown-item text-danger" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/status/<?php echo e($value->id); ?>/2"><i class="fe-lock"></i> Khóa</a>
                                                        <a class="dropdown-item text-success" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/status/<?php echo e($value->id); ?>/1"><i class="fe-check-circle"></i> kích hoạt</a>
                                                        <?php elseif($value->status==1): ?>
                                                        <a class="dropdown-item text-danger" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/status/<?php echo e($value->id); ?>/2"><i class="fe-lock"></i> Khóa</a>
                                                        <?php elseif($value->status==2): ?>
                                                        <a class="dropdown-item text-success" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/status/<?php echo e($value->id); ?>/1"><i class="fe-check-circle"></i> Kích hoạt</a>
                                                        <?php endif; ?>
                                                        <div class="dropdown-divider"></div>
                                                    </div>
                                                </div>
                                            </td>
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
                            <?php echo $data->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Dashboard/Views/user/index.blade.php ENDPATH**/ ?>