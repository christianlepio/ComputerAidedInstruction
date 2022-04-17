<?php
    if(!isset($_SESSION['studid'])){
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAI-Early Childhood</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="indexxx.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Datatables -->
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <!-- End Datatables -->

</head>
<body>
<?php
    require 'includes/process.php';
?>
    <nav class="navbar navbar-expand-custom navbar-mainbg">
        <a class="navbar-brand navbar-logo" href="#">
            <img src="logggo.png" alt="public market logo" height="33" weight="33">&nbsp;
            <span style="font-size: 0.8em;">Early Childhood | E-Learning</span>
        </a>
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                <li class="nav-item">
                    <a class="nav-link" href="home.php"><i class="fa-solid fa-house"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php if($_SESSION['actb'] == 'viewles'){ echo 'viewfile.php';}else{ echo 'homelesson.php';}?>"><i class="fa-solid fa-book"></i>Lesson</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php if($_SESSION['actb'] == 'takeq'){ echo 'hometake.php';}else{ echo 'homequiz.php';}?>"><i class="fa-brands fa-stack-overflow"></i>Exercises</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="homeperf.php"><i class="fa-solid fa-chart-line"></i>Performance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="includes/logout.php"><img src="<?php echo $_SESSION['simage']; ?>" width="30px" height="30px" class="rounded-circle" alt=""> &nbsp;Logout</a>
                </li>
            </ul>
        </div>
    </nav>