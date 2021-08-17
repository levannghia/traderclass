
<?php $__env->startSection('content'); ?>
<div class="container box">
    <h3 align="center">Gợi ý tìm kiếm với ajax</h3><br />
    <div class="form-group">
        <input type="text" name="country_name" id="country_name" class="form-control input-lg"
            placeholder="Enter Country Name" />
        <div id="countryList"><br>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Sites::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/my_course/searchajax.blade.php ENDPATH**/ ?>