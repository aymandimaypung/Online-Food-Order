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
    <div class="login">
        <h1 class="text-center">Login</h1>
  

        <?php

            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['not-login-msg']))
            {
                echo $_SESSION['not-login-msg'];
                unset($_SESSION['not-login-msg']);
            }
        ?>
        <!-- Login Form Starts here -->
        <div class="container">
  <div class="row">

    <div class="col-md-4"></div>
    <div class="col-md-4">
            <div class="panel panel-default divcenter noradius noborder" style="max-width: 400px;">
							<div class="panel-body" style="padding: 40px;">
								<form method="post">
									<h3>Login to your Account</h3>

									<div class="form-group">
										<label for="login-form-username">Username:</label>
										<input type="text" id="login-form-username" name="login-form-username" value="" class="form-control" />
									</div>

									<div class="form-group">
										<label for="login-form-password">Password:</label>
										<input type="password" id="login-form-password" name="login-form-password" value="" class="form-control" />
									</div>

									<div class="form-group">
										<button class="btn btn-success" id="login-form-submit" name="login-form-submit" value="login">Login</button>
										<a href="#" class="fright">Forgot Password?</a>
									</div>
								</form>
							</div>
						</div>
    </div>
    <div class="col-md-4"></div>

  </div>

</div>
        <!-- Login Form Ends here -->

    </div>
</body>
</html>

<?php
  include 'include/footer.php';
    login();
?>
