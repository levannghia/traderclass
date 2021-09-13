<?php if(Gate::allows('view', 'Role')): ?>

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
                                                <th>ID</th>
                                                <th>Tên</th>
                                                <th>Xem</th>
                                                <th>Thêm</th>
                                                <th>Sửa</th>
                                                <th>Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $list_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($value->id); ?></td>
                                                    <td><?php echo e($value->name); ?></td>
                                                    <td>
                                                        <?php if($value->views==1): ?>
                                                        <a class="dropdown-item text-danger" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/view/<?php echo e($value->id); ?>/0"><span class="badge bg-soft-success text-success shadow-none">Kích hoạt</span></a>
                                                        <?php elseif($value->views==0): ?>
                                                        <a class="dropdown-item text-danger" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/view/<?php echo e($value->id); ?>/1"><span class="badge bg-soft-danger text-danger shadow-none">Khóa</span></a>
                                                        <?php endif; ?>
                                                     </td>
                                                     <td>
                                                        <?php if($value->adds==1): ?>
                                                        <a class="dropdown-item text-danger" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/add/<?php echo e($value->id); ?>/0"><span class="badge bg-soft-success text-success shadow-none">Kích hoạt</span></a>
                                                        <?php elseif($value->adds==0): ?>
                                                        <a class="dropdown-item text-danger" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/add/<?php echo e($value->id); ?>/1"><span class="badge bg-soft-danger text-danger shadow-none">Khóa</span></a>
                                                        <?php endif; ?>
                                                     </td>
                                                     <td>
                                                        <?php if($value->edits==1): ?>
                                                        <a class="dropdown-item text-danger" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/edit/<?php echo e($value->id); ?>/0"><span class="badge bg-soft-success text-success shadow-none">Kích hoạt</span></a>
                                                        <?php elseif($value->edits==0): ?>
                                                        <a class="dropdown-item text-danger" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/edit/<?php echo e($value->id); ?>/1"><span class="badge bg-soft-danger text-danger shadow-none">Khóa</span></a>
                                                        <?php endif; ?>
                                                     </td>
                                                     <td>
                                                        <?php if($value->deletes==1): ?>
                                                        <a class="dropdown-item text-danger" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/delete/<?php echo e($value->id); ?>/0"><span class="badge bg-soft-success text-success shadow-none">Kích hoạt</span></a>
                                                        <?php elseif($value->deletes==0): ?>
                                                        <a class="dropdown-item text-danger" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/delete/<?php echo e($value->id); ?>/1"><span class="badge bg-soft-danger text-danger shadow-none">Khóa</span></a>
                                                        <?php endif; ?>
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
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <form method="post" action="<?php echo e(route('admin.rolePermission.postAdd',$data->id)); ?>">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-8">
                <div class="card-box">
                    <h4 class="header-title mb-3"><?php echo e($row->desc); ?></h4>
                    <div class="form-group mb-2">
                        <label>Danh mục</label>
                        <select class="form-control form-control-sm" name="permission_id">
                            <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Class Name</label>
                        <select class="form-control form-control-sm" name="class_name">
                            <option value="Crypto">Crypto</option>
                            <option value="UserCourse">UserCourse</option>
                            <option value="Advertisement">Advertisement</option>
                            <option value="Privacy">Policy</option>
                            <option value="Home">Home</option>
                            <option value="Course">Course</option>
                            <option value="Faq">Faq</option>
                            <option value="Testimonials">Testimonials</option>
                            <option value="Teachers">Teachers</option>
                            <option value="Users">Users</option>
                            <option value="Config">Config</option>
                            <option value="Role">Role</option>
                            <option value="Admins">Admins</option>
                            <option value="Blog">Blog</option>
                            <option value="Products">Products</option>
                            <option value="Dashboard">Dashboard</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box">
                    <div class="form-group mb-2">
                        <label>Xem</label>
                        <select class="form-control form-control-sm" name="views">
                            <option value="1" <?php echo e((old('views')!="" && old('views')==1)? "selected" :""); ?>>Kích hoạt</option>
                            <option value="0" <?php echo e((old('views')!="" && old('views')==0)? "selected" :""); ?>>Khóa</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Thêm</label>
                        <select class="form-control form-control-sm" name="adds">
                            <option value="1" <?php echo e((old('adds')!="" && old('adds')==1)? "selected" :""); ?>>Kích hoạt</option>
                            <option value="0" <?php echo e((old('adds')!="" && old('adds')==0)? "selected" :""); ?>>Khóa</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Sửa</label>
                        <select class="form-control form-control-sm" name="edits">
                            <option value="1" <?php echo e((old('edits')!="" && old('edits')==1)? "selected" :""); ?>>Kích hoạt</option>
                            <option value="0" <?php echo e((old('edits')!="" && old('edits')==0)? "selected" :""); ?>>Khóa</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Xóa</label>
                        <select class="form-control form-control-sm" name="deletes">
                            <option value="1" <?php echo e((old('deletes')!="" && old('deletes')==1)? "selected" :""); ?>>Kích hoạt</option>
                            <option value="0" <?php echo e((old('deletes')!="" && old('deletes')==0)? "selected" :""); ?>>Khóa</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <button type="submit" name="save" class="ladda-button btn btn-success waves-effect waves-light float-right" data-style="expand-right">
                <span class="ladda-label"><i class="ti-save"></i> Save</span>
                <span class="ladda-spinner"></span>
            </button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Dashboard/Views/role_permission/roledetail.blade.php ENDPATH**/ ?>