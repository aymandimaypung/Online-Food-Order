<?php include '../../function/guest_session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->s
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
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

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../../css/style.css">
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
				<a class="navbar-brand" href="index.php">RESTO</a>
			</div>

			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="categories.php">Categories</a></li>
					<li><a href="foods.php">Foods</a></li>
					<li><a href="#">Contact</a></li>
				</ul>

			</div>
		</div>
	</nav>

    <!-- Navbar Section Starts Here -->
    <!-- <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="../../images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="#">Login</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section> -->
    <!-- Navbar Section Ends Here -->