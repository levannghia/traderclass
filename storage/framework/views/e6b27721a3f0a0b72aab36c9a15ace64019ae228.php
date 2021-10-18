
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('Sites::inc.maketting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="main">
    <div class="intro">
        <p>Choose a class to start</p>
    </div>
    <div class="classify">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="sort">
                        <p style="color: white;">Sorted by:</p>
                        <button>Most Popular</button>
                        <button>Just Added</button>
                        <div class="topics">
                            <button id="navbarDropdown" role="button" data-toggle="dropdown"> Topics &nbsp; <i class="bi bi-caret-down-fill"></i></button>
                            <div class="dropdown-menu" id="dropdown-menu1" aria-labelledby="navbarDropdown">
                                <p class="dropdown-item">Crypto Currency</p>
                                <p class="dropdown-item">Forex</p>
                                <p class="dropdown-item">Stock</p>
                            </div>
                        </div>
                        <div class="nteacher">
                            <button id="navbarDropdown" role="button" data-toggle="dropdown">Teacher &nbsp; <i class="bi bi-caret-down-fill"></i></button>
                            <div class="dropdown-menu" id="dropdown-menu1" aria-labelledby="navbarDropdown">
                                <p class="dropdown-item">Hoang Minh Thien</p>
                                <p class="dropdown-item">Hoang Minh Thien</p>
                                <p class="dropdown-item">Hoang Minh Thien</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md"></div>
            </div>
        </div>
    </div>
    <div class="teacher">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <a href="/course/<?php echo e($value->id); ?>">
                        <div class="img">
                            <img src="/public/upload/images/course/thumb/<?php echo e($value->photo); ?>" alt="">
                        </div>
                        <div class="nameclass">
                            <p><?php echo e($value->name); ?></p>
                            <p><?php echo e($value->title); ?></p>
                            <p><?php echo e($value->fullname); ?></p>
                        </div>
                    </a> 
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="pagination">
                <a class="active" href="#">1</a>
                <a href="#">2</a>
                <p style="color: white; margin-bottom: 0px; padding-top: 10px;">...</p>
                <a href="#">5</a>
                <a href="#">6</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Sites::allClass', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/all_class/index.blade.php ENDPATH**/ ?>