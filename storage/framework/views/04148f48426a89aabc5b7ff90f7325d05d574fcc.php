
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
                                    <input type="text" class="form-control border-white" name="search"
                                        value="<?php echo e(Cookie::get('search_role')); ?>" placeholder="Vai trò...">
                                    <div class="input-group-append">
                                        <button type="submit" name="btn_search"
                                            class="input-group-text bg-blue border-blue text-white">
                                            <i class="fe-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript: window.location.reload();" class="btn btn-blue btn-sm ml-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>
                            <a href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/add"
                                class="ladda-button waves-effect waves-light btn btn-blue btn-sm ml-1"
                                data-style="expand-right">
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
                                                <th>Tên</th>
                                                <th>Mô tả</th>
                                                <th>Tên quyền hạng</th>
                                                <th>Tools</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th scope="row"><input type="checkbox" name="check[]"
                                                            value="<?php echo e($value->id); ?>" /></th>
                                                    <td><a href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/role-permission/<?php echo e($value->id); ?>"
                                                            title="Xem chi tiết <?php echo e($value->name); ?>"><?php echo e($value->name); ?></a>
                                                    </td>
                                                    <td><?php echo e($value->Note); ?></td>
                                                    <td><a href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/role-permission/<?php echo e($value->id); ?>"
                                                        title="Chi tiết <?php echo e($value->name); ?>">Chi tiết</a>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-blue btn-xs"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"><i class="fe-settings"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                x-placement="bottom-start">
                                                                <a class="dropdown-item" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/edit/<?php echo e($value->id); ?>"><i class="fe-edit-2"></i> Chỉnh sửa</a>
                                                                <a class="dropdown-item" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/role-permission/<?php echo e($value->id); ?>"><i class="fe-eye"></i> Xem chi tiết</a>
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
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger btn-xs dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                            class="fe-trash-2"></i> <i class="mdi mdi-chevron-down"></i></button>
                                    <div class="dropdown-menu" x-placement="bottom-start"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                                        <a class="dropdown-item" href="#"
                                            onclick="javascript:checkDelBoxes($(this).closest('form').get(0), 'check[]', true);return false;"><i
                                                class="fe-check-square"></i> Tất cả</a>
                                        <a class="dropdown-item" href="#"
                                            onclick="javascript:checkDelBoxes($(this).closest('form').get(0), 'check[]', false);return false;"><i
                                                class="fe-x"></i> Hủy bỏ</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" delete-all="true"
                                            url="/<?php echo e(Helper_Dashboard::get_patch(1)); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/delete"
                                            href="#"><i class="fe-trash-2"></i> Xóa</a>
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

<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Dashboard/Views/role/index.blade.php ENDPATH**/ ?>