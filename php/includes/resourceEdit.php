<?php
include("../../stage3/Admin Pages/admin_php_querys.php");
require("../../php/model/db.php");

//returns buttons for each resource category in the database
function catButtons() {
	$cats = getCategories();
	echo '<div class="btn-group-vertical" style="position:fixed">';
	for($i = 0; $i < count($cats); $i++) {
		echo '<button class="btn btn-primary" role="button" value="' .$cats[$i] .'" onclick="categorySort(this.value)">';
		echo $cats[$i];
		echo '</button>';
	}
}
?>