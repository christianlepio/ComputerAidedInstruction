<?php
	session_start();

	if(isset($_SESSION['usid'])){
		header("Location: dashb.php");
		exit();
	}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login | CAI-E-Learning</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="css/style.css">

	</head>
	<style>
		body{
			  background-image: url("images/ggg.png");
  			  background-position: center;
  			  background-repeat: no-repeat;
  			  background-size: cover;
		}
	</style>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" class="img-fluid" style="background-image: url(images/bg-1.png); background-size: 65% 60%; background-color:#51cec8;">
			      </div>
						<div class="login-wrap p-4 p-md-5">
							<?php
								if(isset($_GET['error'])){
									if($_GET['error'] == "wronglogin1"){
										echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<strong><i class="fa-solid fa-circle-exclamation"></i></strong> &nbsp;Unknown student LRN.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>';
									}else{
										echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong><i class="fa-solid fa-circle-exclamation"></i></strong> &nbsp;Incorrect password, please try again.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>';
									}
								}
							?>
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4 text-center">Log In</h3>
			      		</div>
			      	</div>
							<form action="includes/login.php" method="POST" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input type="text" name="uname" class="form-control" placeholder="Username" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="pwd" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="login-user" class="form-control btn btn-primary rounded submit px-3">Log In</button>
		            </div>
                    <div class="text-center">
                        <a href="forgotpass1.php">Forgot Password</a>
                    </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

