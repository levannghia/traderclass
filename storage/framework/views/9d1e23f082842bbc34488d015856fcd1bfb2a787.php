<?php $__env->startSection('content'); ?>
	<h1>jQuery Mobile Skin</h1>

	<p>CKFinder UI is based on <a href="http://jquerymobile.com/">jQuery Mobile</a> so its look &amp; feel can be changed using the <a href="http://themeroller.jquerymobile.com/">jQuery Mobile Theme Roller</a>.
		For more information about custom skins and Theme Roller please refer to <a href="https://docs.ckeditor.com/ckfinder/ckfinder3/#!/guide/dev_themeroller">CKFinder documentation</a>.</p>

	<h3>jQuery Mobile Swatch "a" Skin </h3>
	<pre class="prettyprint"><code>CKFinder.widget( 'ckfinder-widget', {
	width: '100%',
	height: 600,
	skin: 'jquery-mobile',
	swatch: 'a'
} );</code></pre>
	<div id="ckfinder-widget-a"></div>

	<h3>jQuery Mobile Swatch "b" Skin </h3>
	<pre class="prettyprint"><code>CKFinder.widget( 'ckfinder-widget', {
	width: '100%',
	height: 600,
	skin: 'jquery-mobile',
	swatch: 'b'
} );</code></pre>
	<div id="ckfinder-widget-b"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
		CKFinder.widget( 'ckfinder-widget-a', {
			width: '100%',
			height: 600,
			skin: 'jquery-mobile',
			swatch: 'a'
		} );

		CKFinder.widget( 'ckfinder-widget-b', {
			width: '100%',
			height: 600,
			skin: 'jquery-mobile',
			swatch: 'b'
		} );
	</script>
	<script src="//cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ckfinder::samples/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\vendor\ckfinder\ckfinder-laravel-package\views\samples\skins-jquery-mobile.blade.php ENDPATH**/ ?>