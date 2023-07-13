<?php
$alert = false;
$error = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	include 'partials/_dbconnect.php';
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["pass"];
	$cpassword = $_POST["cpass"];
	$role = 'user';
	
	$existSql = "Select * FROM `users` WHERE email='$email' ";
	$result = mysqli_query($connect, $existSql);
	$numExitsRows = mysqli_num_rows($result);
	if($numExitsRows > 0){
		$error = " Credential already exist";
	}else{
		if(($password==$cpassword)){
			$hash = password_hash($password, PASSWORD_DEFAULT);
			$sql = "INSERT INTO `users` (`name`, `email`, `password`, `role`, `created_at`) 
			VALUES ('$name', '$email', '$hash', '$role', current_timestamp())";
			$result = mysqli_query($connect, $sql);
			if($result){
				$alert = true;
			}
		}else{
			$error = " Password doesn't match";
		}
	}
	
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="./global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="./global_assets/js/main/jquery.min.js"></script>
	<script src="./global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="./global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="./global_assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="./global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="assets/js/app.js"></script>
	<script src="./global_assets/js/demo_pages/login.js"></script>
	<!-- /theme JS files -->

</head>

<body>

<div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
		<div class="navbar-brand">
			<a href="index.html" class="d-inline-block">
				<img src="./global_assets/images/logo_light.png" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">			</ul>

				

			<ul class="navbar-nav ml-md-auto">
				

				

				<li class="nav-item">
					<a href="index.php" class="navbar-nav-link legitRipple">
						<i class="icon-home"></i> Home
						<span class="d-md-none ml-2">home</span>
					</a>
				</li>

				<li class="nav-item">
					<a href="login_simple.php" class="navbar-nav-link legitRipple">
						<i class="icon-enter"></i> Login
						<span class="d-md-none ml-2">Login</span>
					</a>
				</li>
			</ul>
		</div>
	</div>

	<?php
if($alert){
   echo '<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
									<span class="font-weight-semibold">Success!</span> You are created an account, now you can login.
							    </div>';
 } 

 if($error){
	echo '<div class="alert alert-danger alert-dismissible">
									 <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
									 <span class="font-weight-semibold">Failed!</span>'. $error .'
								 </div>';
  } 
 
 ?>

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Registration form -->
				<form action="login_registration.php" method="post" class="flex-fill">
					<div class="row">
						<div class="col-lg-6 offset-lg-3">
							<div class="card mb-0">
								<div class="card-body">
									<div class="text-center mb-3">
										<i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
										<h5 class="mb-0">Create account</h5>
										<span class="d-block text-muted">All fields are required</span>
									</div>

									<div class="form-group form-group-feedback form-group-feedback-right">
										<input type="text" class="form-control" name="name" placeholder="Your Name">
										<div class="form-control-feedback">
											<i class="icon-user-plus text-muted"></i>
										</div>
									</div>

									
										
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="email" class="form-control" name="email" placeholder="Your email">
												<div class="form-control-feedback">
													<i class="icon-mention text-muted"></i>
												</div>
											</div>
										

										
									

									<div class="row">
										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="password" class="form-control" name="pass" placeholder="Create password">
												<div class="form-control-feedback">
													<i class="icon-user-lock text-muted"></i>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="password" class="form-control" name="cpass" placeholder="Repeat password">
												<div class="form-control-feedback">
													<i class="icon-user-lock text-muted"></i>
												</div>
											</div>
										</div>
									</div>

									

									<button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-plus3"></i></b> Create account</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!-- /registration form -->

			</div>
			<!-- /content area -->


			

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
