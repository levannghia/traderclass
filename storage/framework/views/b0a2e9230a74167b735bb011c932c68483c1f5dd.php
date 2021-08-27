<?php
use Illuminate\Support\Facades\DB;
?>

<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>" class="btn btn-danger waves-effect btn-sm ml-2"><i class="mdi mdi-close-circle"></i></a>
            </div>
            <h4 class="page-title"><?php echo e($row->title); ?></h4>
        </div>
    </div>
</div>
<?php echo $__env->make("Dashboard::inc.message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<form method="post">
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
                                            <th>Tên khóa học</th>
                                            <th>Tên giáo viên</th>   
                                            <th>Trạng thái</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="table-user"><img src='/public/upload/images/users/large/<?php echo e($value->photo); ?>' class="rounded-circle"/></td>
                                            <td><?php echo e($value->fullname); ?></td>
                                            <td><?php echo e($value->email); ?></td>
                                            <?php if($value->gender == 1): ?>
                                            <td>Nam</td>
                                            <?php elseif($value->gender == 2): ?>
                                            <td>Nữ</td>
                                            <?php else: ?>
                                            <td>Không xác định</td>
                                            <?php endif; ?>
                                            <td><?php echo e($value->name); ?></td>
                                            <?php
                                                $teacher_name = DB::table('course')->select('teachers.fullname')->join('teachers','teachers.id', '=', 'course.teacher_id')->where('course.teacher_id',$value->teacher_id)->first();
                                                // <td>$value->teacher_id</td>
                                                echo '<td>'.$teacher_name->fullname.'</td>';
                                            ?>
                                            <td>
                                                <?php if($value->status==2): ?>
                                                <span class="badge bg-soft-danger text-danger shadow-none">Thùng rác</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-blue btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-settings"></i> <i class="mdi mdi-chevron-down"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right"  x-placement="bottom-start" >
                                                        <a class="dropdown-item text-success" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/class/status/<?php echo e($value->id); ?>/1"><i class="fe-check-circle"></i> Khôi phục</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-danger" href='/<?php echo e(Helper_Dashboard::get_patch()); ?>/class/trash/delete/[{"id":<?php echo e($value->id); ?>}]'><i class="fe-trash-2"></i> Xóa</a>
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
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Dashboard/Views/user_course/trash.blade.php ENDPATH**/ ?>