<?php
      if(!isset($_SESSION['usid'])){
        header("Location: loguser.php");
        exit();
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>CAI-Early Childhood</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="alert.css">
    <script src="alertjs.js"></script>

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <!-- End Datatables -->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>
  <body>
  <?php
    require 'includes/process.php';
  ?>
    
<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color:#002352;">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><img src="<?php echo $_SESSION['image'];?>" width="33px" height="33px" class="rounded-circle" alt=""> <?php echo $_SESSION['ln'].', '.$_SESSION['fn'] ?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <h5 class="h5" style="color:white;">Computer Aided Instruction - Early Childhood</h5>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="includes/logout1.php"><i class="fa fa-right-from-bracket"></i> Sign Out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link <?php if($_SESSION['aktib'] == 'dashb'){ echo 'active';} ?>" aria-current="page" href="dashb.php">
            <i class="fa fa-dashboard"></i> 
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($_SESSION['aktib'] == 'lesson'){ echo 'active';} ?>" href="lesson.php?mod=true">
            <i class="fa fa-book"></i> 
              Lesson
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($_SESSION['aktib'] == 'exer'){ echo 'active';} ?>" href="exercise.php">
            <i class="fa-brands fa-stack-overflow"></i> 
              Exercises
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($_SESSION['aktib'] == 'stud'){ echo 'active';} ?>" href="student.php">
            <i class="fa fa-users"></i> 
              Student
            </a>
          </li>
          <?php
            if($_SESSION['ustype'] == 'Administrator'){
          ?>
         <li class="nav-item">
            <a class="nav-link <?php if($_SESSION['aktib'] == 'user'){ echo 'active';} ?>" href="manageuser.php">
            <i class="fa fa-user-gear"></i> 
              Manage User
            </a>
          </li>
          <?php
            }
          ?>
          <li class="nav-item">
            <a class="nav-link <?php if($_SESSION['aktib'] == 'studrep'){ echo 'active';} ?>" href="studrep.php">
            <i class="fa fa-chart-line"></i> 
              Student Report
            </a>
          </li>
        </ul>
      </div>
    </nav>