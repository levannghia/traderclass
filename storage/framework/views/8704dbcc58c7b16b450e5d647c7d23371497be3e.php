<?php $__env->startSection('content'); ?>
    <h1>Widget Mode</h1>

    <p>Using the <a href="https://docs.ckeditor.com/ckfinder/ckfinder3/#!/guide/dev_installation-section-embedding-as-widget">widget mode</a> you can embed CKFinder directly on a page, as shown below.</p>
    <pre class="prettyprint"><code>CKFinder.widget( 'ckfinder-widget', {
	width: '100%',
	height: 700
} );</code></pre>

    <div id="ckfinder-widget"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    CKFinder.widget( 'ckfinder-widget', {
        width: '100%',
        height: 700
    } );
</script>
<script src="//cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ckfinder::samples/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\vendor\ckfinder\ckfinder-laravel-package\views\samples\widget.blade.php ENDPATH**/ ?>