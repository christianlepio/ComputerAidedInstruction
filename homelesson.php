<?php
    session_start();
    $_SESSION['actb'] = 'homeles';
    require 'homeheader.php';
?>
    <main>
        <div class="container"><br>
        <div class="bg-light p-3 rounded">
            <div class="bg-light p-3 shadow-sm rounded">
                <h3><i class="fa-solid fa-book"></i>List of Lessons</h3>
            </div><hr>
            <div class="row justify-content-center">
                <?php
                    $sql = "SELECT * FROM lessontbl ORDER BY dateCreated DESC;";
                    $res = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($res) > 0){
                        while($row = mysqli_fetch_assoc($res)){
                            //$filename = explode('/',$row['fileLoc']);
                            //$newfilename = $filename[1];

                            echo '<div class="col-md">
                            <div class="border rounded shadow-sm bg-light bg-lesson">
                                <center><div style="background-color:#51cec8;"><img src="img/leslog1.png" class="mb-3 mt-3" style="height:30%;width:30%;" alt="logo"></div></center><hr>
                                <h6 class="mx-3 mt-2">Chapter: '.$row['lessonChapter'].'</h6>
                                <h5 class="mx-3">Title: '.$row['lessonTitle'].'</h5>
                                <center><a href="viewfile.php?chapter='.$row['lessonChapter'].'&title='.$row['lessonTitle'].'&category='.$row['category'].'&dir='.$row['fileLoc'].'" class="mt-2 mb-3 btn btn-sm btn-primary"><i class="fa fa-eye"></i>View </a>&nbsp;&nbsp;&nbsp;
                                    <a href="'.$row['fileLoc'].'" download="'.$row['lessonTitle'].'" class="mt-2 mb-3 btn btn-sm btn-secondary"><i class="fa fa-download"></i>Download</a>
                                </center>
                            </div>
                        </div>';
                        }
                    }
                ?>
            </div><br><br>
            </div><br><br>
        </div>
    </main>
    <style>
        body{
            background-image: url("images/ggg.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
<?php
    require 'homefooter.php';
?>