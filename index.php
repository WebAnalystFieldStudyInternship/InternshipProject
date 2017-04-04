<!DOCTYPE HTML>
<html>
<?php require 'php/includes/head.php' ?>

<body>
<?php require 'php/includes/navbar.php' ?>

<!-- MAP: Map & Basic-Info-Model -->
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
            <?php require 'php/includes/model-basic-info.php' ?>
            <?php require 'php/includes/map.php' ?>
		</div>
	</div>
</div>
<script>
    <?php echo file_get_contents("dist/my-com.js") ?>
</script>
</body>
</html>