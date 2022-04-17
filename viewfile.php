<?php
    session_start();
    $_SESSION['actb'] = 'viewles';
    require 'homeheader.php';
?>
    <main>
        <div class="container"><br>
        <div class="bg-light p-3 rounded">
            <div class="bg-light p-3 shadow-sm rounded">
            <h3><i class="fa-solid fa-book"></i>Chapter: <?php echo $_GET['chapter'].'&nbsp; | &nbsp;'.$_GET['title']; ?></h3>
            </div><hr>
            
            <div class="row justify-content-center bg-dark border rounded p-3">
                <?php
                    if($_GET['category'] == 'vid'){
                ?>
                    <video class="img-fluid rounded" width="1000" controls>
                        <source src="<?php echo $_GET['dir'];?>" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                <?php
                    }else{
                ?>
                    <embed class="rounded" src="<?php echo $_GET['dir'];?>" type="application/pdf" width="100%" height="470px" />
                <?php
                    }
                ?>
            </div><br><br>
            </div><br><br>
        </div>
    </main>
    <style>
        body{
            background-image: url("images/bbg.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
<?php
    require 'homefooter.php';
?>