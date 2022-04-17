<?php
	session_start();

	if(isset($_SESSION['studid'])){
		header("Location: home.php");
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
						<div class="img" class="img-fluid" style="background-image: url(images/bg-1.png); background-size: 65% 50%; background-color:#51cec8;">
			      </div>
						<div class="login-wrap p-4 p-md-5">
                        <?php
                            if(isset($_GET['error'])){
                                if($_GET['error'] == "emptyfields"){
                                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <small><strong> <i class="fa-solid fa-circle-exclamation"></i>&nbsp; Please fill out all fields.</strong><small>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                }elseif($_GET['error'] == "pwdnotmatched"){
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><i class="fa-solid fa-circle-exclamation"></i></strong> &nbsp;Unmatched password, please try again.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                                }elseif($_GET['error'] == "incorrectlastname"){
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><i class="fa-solid fa-circle-exclamation"></i></strong> &nbsp;Incorrect lastname, please try again.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                                }elseif($_GET['error'] == "incorrectfirstname"){
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><i class="fa-solid fa-circle-exclamation"></i></strong> &nbsp;Incorrect firstname, please try again.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                                }elseif($_GET['error'] == "lrn"){
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><i class="fa-solid fa-circle-exclamation"></i></strong> &nbsp;Incorrect LRN, please try again.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                                }elseif($_GET['error'] == "phone"){
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><i class="fa-solid fa-circle-exclamation"></i></strong> &nbsp;Incorrect Contact #, please try again.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                                }elseif($_GET['error'] == "nouser"){
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><i class="fa-solid fa-circle-exclamation"></i></strong> &nbsp;Unknown LRN, please try again.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                                }
                            }if(isset($_GET['resetpassword'])){
                                if($_GET['resetpassword'] == "success"){
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><i class="fa-solid fa-circle-check"></i></strong> &nbsp;Password reset successfully.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                                }
                            }
                        ?>
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4 text-center">Forgot password?</h3>
			      		</div>
			      	</div>
							<form action="includes/manageAcc.php" method="POST" class="signin-form">
			      		<div class="form-group mb-3">
                              <div class="row justify-content-center">
                                  <div class="col-md mb-3">
                                        <input type="text" name="lrn" class="form-control" placeholder="LRN" required>
                                  </div>
                                  <div class="col-md">
                                        <input type="text" name="lname" class="form-control" placeholder="Lastname" required>
                                  </div>
                              </div>
			      		</div>
                        <div class="form-group mb-3">
                              <div class="row justify-content-center">
                                  <div class="col-md mb-3">
                                        <input type="text" name="fname" class="form-control" placeholder="Firstname" required>
                                  </div>
                                  <div class="col-md">
                                        <input type="text" name="contact" class="form-control" placeholder="Contact #" required>
                                  </div>
                              </div>
			      		</div>
		                <div class="form-group mb-3">
                            <div class="row justify-content-center">
                                  <div class="col-md mb-3">
                                        <input type="password" name="pwd1" class="form-control" placeholder="New password" required>
                                  </div>
                              </div>
                              <div class="row justify-content-center">
                                  <div class="col-md mb-3">
                                        <input type="password" name="pwd2" class="form-control" placeholder="Confirm password" required>
                                  </div>
                              </div>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="forg1-submit" class="form-control btn btn-primary rounded submit px-3">Save</button>
		            </div>
						<div class="text-center">
							<a href="index.php"><--Back</a>
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

