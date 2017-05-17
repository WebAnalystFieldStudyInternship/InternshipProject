<!DOCTYPE HTML>
<html>
<?php require 'php/includes/head.php' ?>

<body>
<?php require 'php/includes/navbar.php' ?>

<!-- MAP: Map & Basic-Info-Model -->
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-9">
            <?php require 'php/includes/model-basic-info.php' ?>
            <?php require 'php/includes/map.php' ?>
		</div>
		<div class = "col-xs-12 col-sm-3" id = "resourceList">
		</div>
	</div>
</div>
<div class = "container-fluid">
	<div class = "row">
		<div class = "col-xs-12" id = "resourcesHere">
		</div>
	</div>
</div>
<script>
    <?php echo file_get_contents("dist/my-com.js") ?>
</script>

</body>
</html>
