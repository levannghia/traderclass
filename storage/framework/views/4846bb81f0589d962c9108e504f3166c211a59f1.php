<?php $__env->startSection('content'); ?>
	<h1>Moono Skin</h1>

	<p>Moono is a default skin used in CKFinder that provides visual integration with CKEditor.</p>

	<div id="ckfinder-widget"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
		CKFinder.widget( 'ckfinder-widget', {
			width: '100%',
			height: 700
		} );
	</script>
	<script src="//cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ckfinder::samples/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\vendor\ckfinder\ckfinder-laravel-package\views\samples\skins-moono.blade.php ENDPATH**/ ?>