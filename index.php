<!DOCTYPE html>
<html lang="en"> 

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>MedWeb</title>

	<!--cdn for css-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<!-- cdn for animation -->
	<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">




	<style>
		
		h5 {
			color: black;
			font-size: 45px;
			letter-spacing: 2;
		}

		p {
			color: black;
			font-size: 18px;
			margin: auto;
		}

		.carousel-caption {
			width: 30%;
			text-align: left;
			top: 30%;

		}

		.carousel-item {
			height: 100vh;
			min-height: 300px;
			background: no-repeat center center scroll;
			-webkit-background-size: cover;
			background-size: cover;
		}



		.bg-dark {
			background-color: white !important;
		}


		.navbar-brand {
			font-size: 25px;

		}

		.nav-item {
			font-size: 18px;
			padding: 10px;
		}

		.nav-item a:hover {
			color: red;
		}

		.btn-slide {
			padding: 10px 20px;
			margin-top: 15px;
			display: inline-block;
			background: red;
			text-decoration: none;
			color: white;
		}
		.btn-slide:hover{
			color: white;
			background: black;
		}
	</style>

</head>

<body>
	

	<!-- navbar -->
<?php
session_start();
$loggedin = false;
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
	$loggedin = true;
}
	echo '<nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#"><span class="text-danger">Med</span>Web</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto font-weight-bold">
					<li class="nav-item">
						<a class="nav-link" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About</a>
					</li>
				
					<li class="nav-item">
						<a class="nav-link" href="#">News</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#contact">Contact</a>
					</li>
				</ul>
				<form class="d-flex ms-auto" role="search">';
                    if($loggedin==true){
						echo '<a class="btn btn-outline-danger mx-1" href="secret.php">Secret Page</a>';
					}else{
					echo '<a class="btn btn-outline-danger mx-1" href="login_simple.php">Login</a>
					<a class="btn btn-outline-danger" href="login_registration.php">Resigter</a>';
				}
				echo '</form>
			</div>
		</div>
	</nav>';
?>
	<!-- navbar end -->

	<!-- carousel -->


	<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active" data-bs-interval="10000">
				<img src="images/slide-1.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption animate__animated animate__backInUp animate__delay-.5s">
					<h5>Ensure Your Medical Services</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, unde.</p>
					<a class="btn-slide" href="#appointemnt">Appoinment Now</a>
				</div>
			</div>
			<div class="carousel-item" data-bs-interval="2000">
				<img src="images/slide-2.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption animate__animated animate__backInUp animate__delay-.5s">
					<h5>Ensure Your Medical Services</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, unde.</p>
					<a class="btn-slide" href="#appointemnt">Appoinment Now</a>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/slide-3.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption animate__animated animate__backInUp animate__delay-.5s">
					<h5>Ensure Your Medical Services</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, unde.</p>
					<a class="btn-slide" href="#appointemnt">Appoinment Now</a>
				</div>
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
			data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
			data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>

	<!-- carousel end -->


	



	<!-- contact Section -->


	<div class="container-fluid px-5 my-5" id="contact">
		<div class="row justify-content-center">
			<div class="col-xl-6">
				<div class="card border-0 rounded-3 shadow-lg overflow-hidden">
					<div class="card-body p-0">
						<div class="row g-0">
							<div class="col-sm-0 d-none d-sm-block bg-image">
							
							</div>
							<div class="col-sm-12 p-4">
								<div class="text-center">
									<div class="h3 my-5 fw-light">Contact Form</div>
							
								</div>

						

								<form id="contactForm" data-sb-form-api-token="API_TOKEN">

									<!-- Name Input -->
									<div class="form-floating mb-3">
										<input class="form-control" id="name" type="text" placeholder="Name"
											data-sb-validations="required" />
										<label for="name">Name</label>
										<div class="invalid-feedback" data-sb-feedback="name:required">Name is required.
										</div>
									</div>

									<!-- Email Input -->
									<div class="form-floating mb-3">
										<input class="form-control" id="emailAddress" type="email"
											placeholder="Email Address" data-sb-validations="required,email" />
										<label for="emailAddress">Email Address</label>
								
									</div>

									<!-- Message Input -->
									<div class="form-floating mb-3">
										<textarea class="form-control" id="message" type="text" placeholder="Message"
											style="height: 10rem;" data-sb-validations="required"></textarea>
										<label for="message">Message</label>
										<div class="invalid-feedback" data-sb-feedback="message:required">Message is
											required.</div>
									</div>


									<!-- Submit button -->
									<div class="d-grid">
										<button class="btn btn-danger btn-lg" id="submitButton"
											type="submit">Submit</button>
									</div>
								</form>
								<!-- End of contact form -->

							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- contact end -->




	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
		crossorigin="anonymous"></script>

	<script>
		var nav = document.querySelector('nav');
		window.addEventListener('scroll', function () {
			if (window.pageYOffset > 100) {
				nav.classList.add('bg-dark', 'shadow');
			} else {
				nav.classList.remove('bg-dark', 'shadow');
			}
		})
	</script>


</body>

</html>