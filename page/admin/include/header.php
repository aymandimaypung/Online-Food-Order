<?php
  include '../../function/admin_session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Order Website | Home Page</title>
  <!-- css bootstrap link -->
	<link rel="stylesheet" href="../../assets/bootstrap/bootstrap/dist/css/bootstrap.min.css">
	<!-- icon link -->
	<!-- Font Awesome -->
  	<link rel="stylesheet" href="../../assets/font-awesome/css/font-awesome.min.css">
  	<!-- Ionicons -->
  	<link rel="stylesheet" href="../../assets/Ionicons/css/ionicons.min.css">
  	<!-- Datatables -->
	<link href="../../assets/datatable/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../../assets/datatable/css/buttons.bootstrap.min.css" rel="stylesheet" type="text/css">
	<!-- /Datatables -->

  	<!-- SWEETALERT -->
	<link rel="stylesheet" href="../../assets/sweetalert/sweetalert.css">
	<script type="text/javascript" src="../../assets/sweetalert/sweetalert-dev.js"></script>
	<script type="text/javascript" src="../../assets/sweetalert/sweetalert.min.js"></script>
  <link rel="stylesheet" href="../../css/admin.css">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="index.php">Portfolio</a>
			</div>

			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="manage-admin.php">Admin</a></li>
					<li><a href="manage-category.php">Category</a></li>
					<li><a href="manage-food.php">Food</a></li>
          <li><a href="manage-order.php">Order</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>

  <!-- Menu Section Starts -->
  <!-- <div class="menu text-center">
    <div class="wrapper">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="manage-admin.php">Admin</a></li>
          <li><a href="manage-category.php">Category</a></li>
          <li><a href="manage-food.php">Food</a></li>
          <li><a href="manage-order.php">Order</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>   
  </div> -->
  <!-- Menu section Ends -->