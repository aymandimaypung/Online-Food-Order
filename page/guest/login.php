<?php
    include 'include/header.php';
?>

<br><br><br><br><br>
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
			



<?php 
    include 'include/footer.php';
    login();
?>