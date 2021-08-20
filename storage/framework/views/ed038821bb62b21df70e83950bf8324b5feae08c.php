<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">

    <title>CKFinder 3 - Full Page Sample</title>
</head>
<body>
<?php echo $__env->make('ckfinder::setup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
	var finder;

	CKFinder.start( {
		onInit: function( instance ) {
			finder = instance;
		}
	} );
</script>

</body>
</html>
<?php /**PATH D:\wamp64\www\traderclass\vendor\ckfinder\ckfinder-laravel-package\views\samples\full-page-open.blade.php ENDPATH**/ ?>