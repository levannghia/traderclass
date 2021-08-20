<?php $__env->startSection('content'); ?>
	<h1>Compact User Interface</h1>
	<p>It is possible to disable the folders panel and have folders displayed as icons in the main area of the application.
		In the example below this mode is initialized inside a widget, but it also works in all standalone modes.</p>

	<pre class="prettyprint"><code>CKFinder.widget( 'ckfinder-widget', {
	displayFoldersPanel: false,
	width: '100%',
	height: 700
} );</code></pre>

	<div id="ckfinder-widget"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
		CKFinder.widget( 'ckfinder-widget', {
			displayFoldersPanel: false,
			width: '100%',
			height: 700
		} );
	</script>
	<script src="//cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ckfinder::samples/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\vendor\ckfinder\ckfinder-laravel-package\views\samples\user-interface-compact.blade.php ENDPATH**/ ?>