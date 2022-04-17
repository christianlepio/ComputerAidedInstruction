<?php
    session_start();
    $_SESSION['actb'] = 'homeq';
    require 'homeheader.php';
    $studid = $_SESSION['studid'];
?>
    <main>
        <div class="container"><br>
        <div class="bg-light p-3 rounded">
            <div class="bg-light p-3 shadow-sm rounded">
                <h3><i class="fa-brands fa-stack-overflow"></i>List of Exercises</h3>
            </div><hr>
            
            <div class="row justify-content-center">
                <?php
                    $sikwel = "SELECT DISTINCT(LessonID) as distlesid FROM tblexercise;";
                    $res = mysqli_query($conn, $sikwel);

                    if(mysqli_num_rows($res) > 0){
                        while($row = mysqli_fetch_assoc($res)){
                            $lessonid = $row['distlesid'];
                            $sql = "SELECT * FROM lessontbl WHERE lessonid = '$lessonid' ORDER BY dateCreated DESC;";
                            $res1 = mysqli_query($conn, $sql);
                            $score = 'false';

                            $qls = "SELECT * FROM tblscore WHERE LessonID = '$lessonid' AND StudentID = '$studid';";
                            $qlsres = mysqli_query($conn, $qls);

                            if(mysqli_num_rows($qlsres) > 0){
                                $score = 'true';
                            }

                            if(mysqli_num_rows($res1) > 0){
                                while($row = mysqli_fetch_assoc($res1)){
                                    echo '<div class="col-md">
                                    <div class="border rounded shadow-sm bg-light bg-lesson">
                                        <center><div style="background-color:#51cec8;"><img src="img/quizlog.png" class="mb-3 mt-3" style="height:30%;width:30%;" alt="logo"></div></center><hr>
                                        <h6 class="mx-3 mt-2">Chapter: '.$row['lessonChapter'].'</h6>
                                        <h5 class="mx-3">Title: '.$row['lessonTitle'].'</h5>';
                                    if($score == 'true'){
                                        echo '<center><a href="hometake.php?lessonid='.$row['lessonid'].'&studid='.$_SESSION['studid'].'&chapter='.$row['lessonChapter'].'&title='.$row['lessonTitle'].'&category='.$row['category'].'&dir='.$row['fileLoc'].'&score=true" class="mt-2 mb-3 btn btn-sm btn-success"><i class="fa fa-eye"></i>View Score </a>
                                            
                                        </center>
                                    </div>
                                </div>';
                                    }else{
                                        echo '<center><a href="hometake.php?lessonid='.$row['lessonid'].'&studid='.$_SESSION['studid'].'&chapter='.$row['lessonChapter'].'&title='.$row['lessonTitle'].'&category='.$row['category'].'&dir='.$row['fileLoc'].'" class="mt-2 mb-3 btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i>Take Exercise </a>
                                            
                                        </center>
                                    </div>
                                </div>';
                                    }
                                        
                                }
                            }
                        }
                    }
                ?>
            </div><br><br>
            </div><br><br>
        </div>
    </main>
    <style>
        body{
            background-image: url("images/ggg.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
<?php
    require 'homefooter.php';
?>