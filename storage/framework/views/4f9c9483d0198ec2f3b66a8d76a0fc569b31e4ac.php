<?php $__env->startSection('content'); ?>
	<h1>Full Page Mode</h1>

	<p>The <strong>full page</strong> mode opens CKFinder using the entire page as the working area.</p>
	<pre class="prettyprint"><code>CKFinder.start();</code></pre>
	<p>Click the button below to open CKFinder in full page mode.</p>

	<a href="<?php echo e(route('ckfinder_examples', ['example' => 'full-page-open'])); ?>" class="button-a button-a-background" target="_blank">Open CKFinder</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="//cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ckfinder::samples/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\vendor\ckfinder\ckfinder-laravel-package\views\samples\full-page.blade.php ENDPATH**/ ?>