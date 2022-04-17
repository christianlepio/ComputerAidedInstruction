<?php
    session_start();
    $_SESSION['actb'] = 'takeq';
    require 'homeheader.php';
?>
    <main>
        <div class="container"><br>
        <div class="bg-light p-3 rounded">
            <div class="bg-light p-3 shadow-sm rounded">
                <?php
                    if(isset($_GET['score'])){
                        echo '<h3 style="color:green;"><i class="fa-solid fa-circle-check"></i>You\'ve Already Responded.</h3>';                    
                    }else{
                        echo '<h3><i class="fa-brands fa-stack-overflow"></i>Take Exercise</h3>';
                    }
                ?>
            </div><hr>
            <div class="containerg">

            <div class="justify-content-center mt-4 p-3 mb-1 bg-light shadow-sm rounded">
                <div class="col-md-7 col-ques-img mb-2 mt-3 shadow-sm rounded" style = "background-color:#aef5ff;">
                    <center><img src="img/elernbg.jpg" alt="" class="img-fluid"></center>
                </div>
                <div class="col-md-7 col-ques p-2 py-4 px-4 bg-light mb-2 bord border-5 shadow-sm rounded">
                    <h2><?php echo 'Chapter: '.$_GET['chapter']; ?></h2><hr>
                    <h6><?php echo 'Title: '.$_GET['title']; ?></h6>
                    <?php
                        $lessonid = $_GET['lessonid'];
                        $studid = $_SESSION['studid'];
                        $skor = 0;
                        $count = 0;
                        if(isset($_GET['score'])){
                            $qls = "SELECT SUM(Score) as sumskor, COUNT(NoItems) as cnn FROM tblscore WHERE LessonID = '$lessonid' AND StudentID = '$studid';";
                            $res = mysqli_query($conn, $qls);

                            if(mysqli_num_rows($res)>0){
                                while($rose = mysqli_fetch_assoc($res)){
                                    $skor = $rose['sumskor'];
                                    $count = $rose['cnn'];
                                }
                            }
                            echo '<p class="text-right"><small><b>Score: '.$skor.'/'.$count.'</b></small></p>';
                            if($skor == $count){
                                $sabihin1 = 'You got perfect score. great!';
                            }else{
                                $sabihin1 = 'You Score is '.$skor.'. Out of '.$count.' Items';
                            }
                        }
                    ?>
                </div>
                <?php
                    $sql = "SELECT * FROM tblscore WHERE LessonID = '$lessonid' AND StudentID = '$studid';";
                    $res = mysqli_query($conn, $sql);
                    $anss = array();
                    $score = array();
                    if(mysqli_num_rows($res) > 0){
                        while($rowsss = mysqli_fetch_assoc($res)){
                            $score[] = $rowsss['Score'];
                            $anss[] = $rowsss['answer'];
                        }
                ?>
                <form action="" method="post">
                    <?php
                        $sabihin2 = 'wrong answer in question. ';
                        $lessonid = $_GET['lessonid'];
                        $sql = "SELECT * FROM tblexercise WHERE LessonID='$lessonid';";
                        $res = mysqli_query($conn, $sql);
                        $noo = 0;

                        if(mysqli_num_rows($res) > 0){
                            while($row = mysqli_fetch_assoc($res)){
                                echo '<div class="col-md-7 col-ques p-2 py-4 px-4 bg-light mb-2 shadow-sm rounded">
                                <p class="fs-6 fw-bold">';

                                if($score[$noo] == 1){
                                    echo '<span style="color:green; font-weight:bold;"><i class="fa-solid fa-circle-check"></i>';
                                }else{
                                    echo '<span style="color:red; font-weight:bold;"><i class="fa-solid fa-circle-xmark"></i>';
                                }
                                echo $row['Question'].'</span></p>';
                                //echo '<br>'.$anss[$noo].'<br>';
                                if($score[$noo] == 0){
                                    $sabihin2 .= $row['Question'].'. ';
                                }
                                if($row['qpic'] != ''){
                                    echo '<center><img src="'.$row['qpic'].'" class="rounded" style="height: 35%; width: 35%;"></center><br>';
                                }
                                echo '<div class="form-check">
                                        <input class="form-check-input" type="radio" name="choices'.$row['ExerciseID'].'" value="'.$row['ChoiceA'].'"';
                                if($anss[$noo] == $row['ChoiceA']){
                                    echo ' checked ';
                                }
                                echo'required disabled>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            '.$row['ChoiceA'].'<br>';
                                            if($row['Apic'] != ''){
                                                echo '<img src="'.$row['Apic'].'" class="rounded" style="height: 35%; width: 35%;"><br><br>';
                                            }
                                            
                                echo    '</label>
                                </div>
                                <div class="form-check">
                                        <input class="form-check-input" type="radio" name="choices'.$row['ExerciseID'].'" value="'.$row['ChoiceB'].'"';
                                if($anss[$noo] == $row['ChoiceB']){
                                    echo ' checked ';
                                }
                                echo 'disabled>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            '.$row['ChoiceB'].'<br>';
                                            if($row['Bpic'] != ''){
                                                echo '<img src="'.$row['Bpic'].'" class="rounded" style="height: 35%; width: 35%;"><br><br>';
                                            }
                                echo    '</label>
                                </div>
                                <div class="form-check">
                                        <input class="form-check-input" type="radio" name="choices'.$row['ExerciseID'].'" value="'.$row['ChoiceC'].'"';
                            if($anss[$noo] == $row['ChoiceC']){
                                echo ' checked ';
                            }        
                                echo 'disabled>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            '.$row['ChoiceC'].'<br>';
                                            if($row['Cpic'] != ''){
                                                echo '<img src="'.$row['Cpic'].'" class="rounded" style="height: 35%; width: 35%;"><br><br>';
                                            }
                                echo    '</label>
                                </div>
                                <div class="form-check">
                                        <input class="form-check-input" type="radio" name="choices'.$row['ExerciseID'].'" value="'.$row['ChoiceD'].'"';
                                if($anss[$noo] == $row['ChoiceD']){
                                    echo ' checked ';
                                }        
                                echo 'disabled>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            '.$row['ChoiceD'].'<br>';
                                            if($row['Dpic'] != ''){
                                                echo '<img src="'.$row['Dpic'].'" class="rounded" style="height: 35%; width: 35%;"><br><br>';
                                            }
                                echo    '</label>
                                </div>
                            </div>';
                            $noo++;
                            }
                        }
                        if($sabihin1 == 'You got perfect score. great!'){
                            $sabihin2 = '';
                        }
                        echo '<input type="hidden" name="" id="txtscore" value = "'.$sabihin1.'  '.$sabihin2.'">';
                    ?>
                </form>
                <?php
                          
                    }else{
                ?>
                <form action="" method="post">
                    <?php
                        $lessonid = $_GET['lessonid'];
                        $sql = "SELECT * FROM tblexercise WHERE LessonID='$lessonid';";
                        $res = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($res) > 0){
                            while($row = mysqli_fetch_assoc($res)){
                                echo '<div class="col-md-7 col-ques p-2 py-4 px-4 bg-light mb-2 shadow-sm rounded">
                                <p class="fs-6 fw-bold">'.$row['Question'].'</p>';
                                if($row['qpic'] != ''){
                                    echo '<center><img src="'.$row['qpic'].'" class="rounded" style="height: 35%; width: 35%;"></center><br>';
                                }
                                echo '<div class="form-check">
                                        <input class="form-check-input" type="radio" name="choices'.$row['ExerciseID'].'" value="'.$row['ChoiceA'].'" required>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            '.$row['ChoiceA'].'<br>';
                                            if($row['Apic'] != ''){
                                                echo '<img src="'.$row['Apic'].'" class="rounded" style="height: 35%; width: 35%;"><br><br>';
                                            }
                                            
                                echo    '</label>
                                </div>
                                <div class="form-check">
                                        <input class="form-check-input" type="radio" name="choices'.$row['ExerciseID'].'" value="'.$row['ChoiceB'].'">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            '.$row['ChoiceB'].'<br>';
                                            if($row['Bpic'] != ''){
                                                echo '<img src="'.$row['Bpic'].'" class="rounded" style="height: 35%; width: 35%;"><br><br>';
                                            }
                                echo    '</label>
                                </div>
                                <div class="form-check">
                                        <input class="form-check-input" type="radio" name="choices'.$row['ExerciseID'].'" value="'.$row['ChoiceC'].'">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            '.$row['ChoiceC'].'<br>';
                                            if($row['Cpic'] != ''){
                                                echo '<img src="'.$row['Cpic'].'" class="rounded" style="height: 35%; width: 35%;"><br><br>';
                                            }
                                echo    '</label>
                                </div>
                                <div class="form-check">
                                        <input class="form-check-input" type="radio" name="choices'.$row['ExerciseID'].'" value="'.$row['ChoiceD'].'">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            '.$row['ChoiceD'].'<br>';
                                            if($row['Dpic'] != ''){
                                                echo '<img src="'.$row['Dpic'].'" class="rounded" style="height: 35%; width: 35%;"><br><br>';
                                            }
                                echo    '</label>
                                </div>
                            </div>';
                            }
                        }
                    ?>
                <div class="row justify-content-center">
                    <div class="col-6 mb-4">
                        <center>
                            <a href="homequiz.php" class="btn btn-danger shadow-lg btn-sm">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="submit" name="answer-submit" class="btn btn-primary shadow-lg btn-sm">Submit</button>
                        </center>
                    </div>
                </div>
                </form>
                <?php
                    }
                ?>
            </div><br><br>
            <?php
                if(isset($_POST['answer-submit'])){
                    $qid = $_GET['lessonid'];
                    $studid = $_SESSION['studid'];
                    //echo 'STUDENTID: '.$_SESSION['studid']."&nbsp;&nbsp;LESSONID: ".$qid.'<br>';
                    $sikwel = "SELECT * FROM tblexercise WHERE LessonID = '$qid';";
                    $sikwelres = mysqli_query($conn, $sikwel);

                    if(mysqli_num_rows($sikwelres) > 0){
                        while($row = mysqli_fetch_assoc($sikwelres)){
                            $exid = $row['ExerciseID'];
                            $cexid = "choices".$exid;
                            $response = $_POST[$cexid];
                            $ans = '';
                            $score = 0;

                            $sikwel1 = "SELECT Answer FROM tblexercise WHERE ExerciseID = '$exid';";
                            $sikwelres1 = mysqli_query($conn, $sikwel1);

                            if(mysqli_num_rows($sikwelres1) > 0){
                                while($row1 = mysqli_fetch_assoc($sikwelres1)){
                                    $ans = $row1['Answer'];
                                }
                            }
                            if($response == $ans){
                                $score = 1;
                            }
                            $sq = "INSERT INTO tblscore (LessonID, ExerciseID, StudentID, NoItems, Score, Submitted, answer) 
                            VALUES('$qid', '$exid', '$studid', '1', '$score', '1', '$response');";
                            $sqres = mysqli_query($conn, $sq);

                            if($sqres){
                                echo '<script>window.location.href="hometake.php?lessonid='.$_GET['lessonid'].'&studid='.$_GET['studid'].'&chapter='.$_GET['chapter'].'&title='.$_GET['title'].'&score=true";</script>';
                            }
                            
                            //echo '&nbsp;&nbsp;&nbsp;ExerciseID: '.$exid.'&nbsp;&nbsp;Response: '.$response.'&nbsp;&nbsp;Score: '.$score.'<br>';
                        }
                    }
                }
            ?>
            </div>
            </div><br><br>
        </div>
    </main>
    <style>
        body{
            background-image: url("images/bb.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .bord{
            border-top: 2px solid #000080;
        }
        .col-ques{
            margin: auto;
        }
        .col-ques-img{
            margin: auto;
        }
    </style>
<?php

    require 'homefooter.php';
?>