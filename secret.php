<?php
session_start();
if(!isset($_COOKIE['email'])){
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
		header("location: login_simple.php");
		exit;
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
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
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
    <script src="assets/js/app.js"></script>
    <!-- /theme JS files -->

</head>

<body>
    <?php 
// print_r($_SESSION); 
include 'partials/_dbconnect.php';
$email =  $_SESSION['email'] ?? $_COOKIE['email'];
$stmt = $connect->prepare("SELECT role FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    $role = $user['role'];
    // echo "Role: " . $role;
} else {
    echo "User not found";
}

// Close the database connection
$stmt->close();
$connect->close();
?>



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
            <ul class="navbar-nav"> </ul>

            <span class="navbar-text ml-md-3">
                <span class="badge badge-mark border-orange-300 mr-2"></span>
                Morning, <?php echo ucfirst($role) ?>!
            </span>

            <ul class="navbar-nav ml-md-auto">

                <li class="nav-item">
                    <a href="index.php" class="navbar-nav-link legitRipple">
                        <i class="icon-home"></i> Home
                        <span class="d-md-none ml-2">home</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="logout.php" class="navbar-nav-link legitRipple">
                        <i class="icon-switch2"></i>
                        <span class="d-md-none ml-2">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <center>
        <h5 class="my-3">Secret Page</h5>
    </center>


    <div class="row m-2">
        <?php if($role=='user' || $role=='admin' || $role=='moderator')
	{
        echo '<div class="col-4">
		<div class="card">
			
			<div class="card-body bg-blue text-center card-img-top" style="background-image: url(./global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
										<div class="card-img-actions d-inline-block mb-3">
											<img class="img-fluid rounded-circle" src="./global_assets/images/placeholders/placeholder.jpg" width="170" height="170" alt="">
											<div class="card-img-actions-overlay card-img rounded-circle">
												<a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round legitRipple">
													<i class="icon-plus3"></i>
												</a>
												<a href="user_pages_profile.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2 legitRipple">
													<i class="icon-link"></i>
												</a>
											</div>
										</div>
		
										<h6 class="font-weight-semibold mb-0"> For all authenticated users</h6>
										
		
										
									</div>
		
									<div class="card-body border-top-0">
										<div class="d-sm-flex flex-sm-wrap mb-3">
											<div class="font-weight-semibold">Full name:</div>
											<div class="ml-sm-auto mt-2 mt-sm-0">Victoria Anna Davidson</div>
										</div>
		
										<div class="d-sm-flex flex-sm-wrap mb-3">
											<div class="font-weight-semibold">Phone number:</div>
											<div class="ml-sm-auto mt-2 mt-sm-0">+3630 8911837</div>
										</div>
									</div>
					</div>
		
					</div>';
	} ?>

        <?php if($role=='admin' || $role=='moderator')
	{

		echo '	<div class="col-4">
     <div class="card">
	
	<div class="card-body bg-blue text-center card-img-top" style="background-image: url(./global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
								<div class="card-img-actions d-inline-block mb-3">
									<img class="img-fluid rounded-circle" src="./global_assets/images/placeholders/placeholder.jpg" width="170" height="170" alt="">
									<div class="card-img-actions-overlay card-img rounded-circle">
										<a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round legitRipple">
											<i class="icon-plus3"></i>
										</a>
										<a href="user_pages_profile.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2 legitRipple">
											<i class="icon-link"></i>
										</a>
									</div>
								</div>

								<h6 class="font-weight-semibold mb-0">For admins and moderators</h6>
								

								
							</div>

							<div class="card-body border-top-0">
								<div class="d-sm-flex flex-sm-wrap mb-3">
									<div class="font-weight-semibold">Full name:</div>
									<div class="ml-sm-auto mt-2 mt-sm-0">Victoria Anna Davidson</div>
								</div>

								<div class="d-sm-flex flex-sm-wrap mb-3">
									<div class="font-weight-semibold">Phone number:</div>
									<div class="ml-sm-auto mt-2 mt-sm-0">+3630 8911837</div>
								</div>

							</div>
			</div>

			</div>';
		} ?>

        <?php if($role=='admin')
	{

	echo '<div class="col-4">
      <div class="card">
	
	<div class="card-body bg-blue text-center card-img-top" style="background-image: url(./global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
								<div class="card-img-actions d-inline-block mb-3">
									<img class="img-fluid rounded-circle" src="./global_assets/images/placeholders/placeholder.jpg" width="170" height="170" alt="">
									<div class="card-img-actions-overlay card-img rounded-circle">
										<a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round legitRipple">
											<i class="icon-plus3"></i>
										</a>
										<a href="user_pages_profile.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2 legitRipple">
											<i class="icon-link"></i>
										</a>
									</div>
								</div>

								<h6 class="font-weight-semibold mb-0">Admin only</h6>
								

								
							</div>

							<div class="card-body border-top-0">
								<div class="d-sm-flex flex-sm-wrap mb-3">
									<div class="font-weight-semibold">Full name:</div>
									<div class="ml-sm-auto mt-2 mt-sm-0">Victoria Anna Davidson</div>
								</div>

								<div class="d-sm-flex flex-sm-wrap mb-3">
									<div class="font-weight-semibold">Phone number:</div>
									<div class="ml-sm-auto mt-2 mt-sm-0">+3630 8911837</div>
								</div>
							</div>
			</div>

			</div>';

		} ?>

    </div>








</body>

</html>