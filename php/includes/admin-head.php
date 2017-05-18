<?php
/**
 * Created by PhpStorm.
 * User: correywinke
 * Date: 5/17/17
 * Time: 3:37 PM
 */
    require 'admin_php_querys.php'
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>
        Admin Page
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type = "text/javascript" src="../../js/resources.js"></script>
    <style>
        <?php echo file_get_contents("../../dist/myStyle.css") ?>
    </style>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Welcome, Administrator</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="admin.php">Home</a></li>
            <li><a href="admin_add.php" role="button">Add</a></li>
            <li><a href="../../index.php" role="button">Logout</a></li>
        </ul>
    </div>
</nav>
<div class="container-fluid">

