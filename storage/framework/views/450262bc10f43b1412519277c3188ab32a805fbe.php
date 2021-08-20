<?php $__env->startSection('content'); ?>
	<h1>List View</h1>
	<p>By default files are displayed in CKFinder as thumbnails. With list view enabled all files will be displayed as a list, one bellow the other. No image previews are available in this mode.</p>
	<p>The list view can be enabled regardless of the selected user interface (Default/Compact/Mobile).</p>

	<pre class="prettyprint"><code>CKFinder.widget( 'ckfinder-widget', {
	defaultViewType: 'list',
	width: '100%',
	height: 700
} );</code></pre>

	<div id="ckfinder-widget"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
		CKFinder.widget( 'ckfinder-widget', {
			defaultViewType: 'list',
			width: '100%',
			height: 700,
			// Specifying ID is not needed when setting defaultViewType.
			// It is set here just to make sure this CKFinder instance will not share user settings with other instances.
			id: 'custom-listview'
		} );
	</script>
	<script src="//cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ckfinder::samples/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\vendor\ckfinder\ckfinder-laravel-package\views\samples\user-interface-listview.blade.php ENDPATH**/ ?>