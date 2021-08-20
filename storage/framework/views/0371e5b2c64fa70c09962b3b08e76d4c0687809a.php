
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<div class="main">
    <div class="container">
        <p id="title">My Course</p>
        <div class="cens">
            <p style="color: white;">You haven't taken the course yet</p>
            <p><a href="/course-introduction" style="color: #EF8D21;">Choose a course to get started</a></p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Sites::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules\Sites\Views\my_course\index.blade.php ENDPATH**/ ?>