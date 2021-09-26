<!DOCTYPE html>
<html>
<head>
	<title>Images</title>
	<style type="text/css">
		img {
			width: 200px;
			height: auto;
			display: inline-block;
			margin: 10px;
		}
		span {
			max-width: 200px;
		}
	</style>
</head>
<body>
	<?php $i = 1; ?>
    <?php foreach ($products as $product) : ?>
    	<?php if (!file_exists('img/products/'.$product->path.'/'.$product->image)) : ?>
        	<?php echo $i++.' - Код: '.$product->barcode.' ---  '.$product->title; ?><br>
        <?php else : ?>
        	<span><?php // echo $i++.' '.$product->title; ?></span>
    	<?php endif; ?>
    <?php endforeach; ?>
</body>
</html>