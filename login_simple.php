<?php

session_start();
$login = false;
$error = false;

if(isset($_COOKIE['email']) ){
	die('hello');
	//header("location: secret.php");
}

if(isset($_SESSION['loggedin']) ){
	header("location: secret.php");
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	include 'partials/_dbconnect.php';
	$email = $_POST["email"];
	$password = $_POST["pass"];
	
    $sql = "Select * from users where email='$email' ";
	$result = mysqli_query($connect, $sql);
	$num = mysqli_num_rows($result);
	if($num==1){
		if($row=mysqli_fetch_assoc($result)){
			if(password_verify($password, $row['password'])){
				$login = true;
				session_start();
				$_SESSION['loggedin'] = "hello";
				$_SESSION['email'] = $email;
				if(isset($_POST["keep"])){
					setcookie("email", $email, time() + 30);
				}
				header("location: secret.php");
			}
			else{
				$error = " Incorrect Password";
			}
		}
		
	}
	else{
		$error = " I don't know you. Please register";
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



            <ul class="navbar-nav ml-md-auto">




                <li class="nav-item">
                    <a href="index.php" class="navbar-nav-link legitRipple">
                        <i class="icon-home"></i> Home
                        <span class="d-md-none ml-2">home</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="login_registration.php" class="navbar-nav-link legitRipple">
                        <i class="icon-add"></i> Registration
                        <span class="d-md-none ml-2">Registration</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>



    <?php

if($login){
   echo '<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
									<span class="font-weight-semibold">Success!</span> You are logged in.
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

                <!-- Login form -->
                <form class="login-form" action="login_simple.php" method="post">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i
                                    class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">Login to your account</h5>
                                <span class="d-block text-muted">Enter your credentials below</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-right">
                                <input type="email" class="form-control" name="email" placeholder="Your email">
                                <div class="form-control-feedback">
                                    <i class="icon-mention text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="password" class="form-control" name="pass" placeholder="Password">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>
                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="checkbox" id="keep" name="keep" value="keep">
                                <label for="keep"> Keep me Logged In</label>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign in <i
                                        class="icon-circle-right2 ml-2"></i></button>
                            </div>

                            <div class="text-center">
                                <a href="login_password_recover.html">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /login form -->

            </div>
            <!-- /content area -->


        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

</html>