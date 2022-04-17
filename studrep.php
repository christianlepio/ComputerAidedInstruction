<?php
  session_start();
  $_SESSION['aktib'] = 'studrep';
  require 'header1.php';
?>

<?php
require 'includes/dbh.inc.php';

$sql2 = "SELECT DISTINCT(LessonID) as distLessonID FROM tblscore";
$res2 = mysqli_query($conn, $sql2);
if(mysqli_num_rows($res2) > 0){
    while($rows = mysqli_fetch_assoc($res2)){
        $lessonid = $rows['distLessonID'];
        $lessonTitle = '';
        $sikwel = "SELECT lessonTitle from lessontbl WHERE lessonid = '$lessonid';";
        $resikwel = mysqli_query($conn, $sikwel);
        if(mysqli_num_rows($resikwel) > 0){
            while($ro = mysqli_fetch_assoc($resikwel)){
                $lessonTitle = $ro['lessonTitle'];
            }
        }
        $noStud = 0;
        ////echo $lessonid.'.&nbsp; LessonTitle: '.$lessonTitle.'<br>';
        $sql1 = "SELECT DISTINCT(StudentID) as distStudentID FROM tblscore WHERE LessonID = '$lessonid'";
        $res = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($res) > 0){
            while($rows1 = mysqli_fetch_assoc($res)){
                $studentid = $rows1['distStudentID'];
                $studname = '';
                $LRN = '';
                $secs = '';
                $sikwel1 = "SELECT LRN, Fname, Lname, studentsec FROM tblstudent WHERE StudentID = '$studentid';";
                $resikwel1 = mysqli_query($conn, $sikwel1);
                if(mysqli_num_rows($resikwel1) > 0){
                    while($ro1 = mysqli_fetch_assoc($resikwel1)){
                        $studname = $ro1['Lname'].', '.$ro1['Fname'];
                        $LRN = $ro1['LRN'];
                        $secs = $ro1['studentsec'];
                    }
                }
                $noStud++;
                //echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$studentid.'. &nbsp;'.$studname.'<br>';
                $sql3 = "SELECT SUM(Score) as Score, COUNT(NoItems) as countItems FROM tblscore WHERE LessonID = '$lessonid' AND StudentID = '$studentid'";
                $res3 = mysqli_query($conn, $sql3);
                if(mysqli_num_rows($res3) > 0){
                    while($rows2 = mysqli_fetch_assoc($res3)){
                        $score = $rows2['Score'];
                        $countItems = $rows2['countItems'];
                        $status = '';
                        //echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Score is: '.$score.'/'.$countItems;
                        $percent = $score / $countItems;

                        if($percent >= 0.5){
                            $status = 'PASSED';
                            //echo '&nbsp;&nbsp; ==  PASSED!<br>';
                        }else{
                            $status = 'FAILED';
                            //echo '&nbsp;&nbsp; ==  FAILED!<br>';
                        }
                        $percent *= 100;
                        $scores = $score.'/'.$countItems;
                        ////echo $percent.'<br>';

                        $sikwel3 = "SELECT * FROM tblsummary WHERE studid = '$studentid' AND lessonid = '$lessonid';";
                        $ress = mysqli_query($conn, $sikwel3);

                        if(mysqli_num_rows($ress) > 0){
                            $sik = "UPDATE tblsummary SET LRN='$LRN', studname = '$studname', studentsec='$secs', lesson = '$lessonTitle', noItems = '$countItems', score = '$scores', percentage = '$percent', status = '$status'
                            WHERE studid = '$studentid' AND lessonid = '$lessonid';";
                            $resss = mysqli_query($conn, $sik);
                        }else{
                            $sikwel2 = "INSERT INTO tblsummary (studid, LRN, studname, studentsec, lessonid, lesson, noItems, score, percentage, status)
                            VALUES('$studentid', '$LRN', '$studname', '$secs', '$lessonid', '$lessonTitle', '$countItems', '$scores', '$percent', '$status');";
                            $resikwel2 = mysqli_query($conn, $sikwel2);
                            if($resikwel2){
                                //echo 'data inserted successfully<br>';
                            }
                        }
                    }
                }
            }
        }
        //echo 'No. of Student: '.$noStud.'<br><br>';
    }
}

?>

<?php
    require 'includes/dbh.inc.php';

    $sql = "SELECT DISTINCT(lessonid) as distlesid,  lesson FROM tblsummary ORDER BY lesson ASC;";
    $sikwelres = mysqli_query($conn, $sql);
    if(mysqli_num_rows($sikwelres)>0){
        while($row = mysqli_fetch_assoc($sikwelres)){
            $lessonTitle = $row['lesson'];
            $lessonid = $row['distlesid'];
            $passingrate = 0;
            $failingrate = 0;
            $totalstud = 0;
            //echo 'Lesson: '.$lessonTitle.'<br>';
            $sql1 = "SELECT COUNT(studid) as totstudid FROM tblsummary WHERE lessonid = '$lessonid';";
            $sikwelres1 = mysqli_query($conn, $sql1);
            if(mysqli_num_rows($sikwelres1)>0){
                while($row1 = mysqli_fetch_assoc($sikwelres1)){
                    $totalstud = $row1['totstudid'];
                    //echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Student taken: '.$row1['totstudid'].'<br>';
                }
            }

            $sql1 = "SELECT COUNT(studid) as totstudidpass FROM tblsummary WHERE lessonid = '$lessonid' AND status = 'PASSED';";
            $sikwelres1 = mysqli_query($conn, $sql1);
            if(mysqli_num_rows($sikwelres1)>0){
                while($row1 = mysqli_fetch_assoc($sikwelres1)){
                    $passingrate = number_format(($row1['totstudidpass'] / $totalstud)*100, 2);
                    //echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PASSED: '.$passingrate.'<br>';
                }
            }

            $sql11 = "SELECT COUNT(studid) as totstudidfail FROM tblsummary WHERE lessonid = '$lessonid' AND status = 'FAILED';";
            $sikwelres11 = mysqli_query($conn, $sql11);
            if(mysqli_num_rows($sikwelres11)>0){
                while($row1 = mysqli_fetch_assoc($sikwelres11)){
                    $failingrate = number_format(($row1['totstudidfail'] / $totalstud)*100, 2);
                    //echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FAILED: '.$failingrate.'<br>';
                }
            }

            $skl = "SELECT * FROM tblstudreport WHERE lessonid = '$lessonid';";
            $resskl = mysqli_query($conn, $skl);
            if(mysqli_num_rows($resskl) > 0){
                $skl1 = "UPDATE tblstudreport SET lesson = '$lessonTitle', totalstud = '$totalstud', passed = '$passingrate', failed = '$failingrate'
                WHERE lessonid = '$lessonid';";
                $resskl1 = mysqli_query($conn, $skl1);
            }else{
                $sql111 = "INSERT INTO tblstudreport (lessonid, lesson, totalstud, passed, failed)
                VALUES('$lessonid', '$lessonTitle', '$totalstud', '$passingrate', '$failingrate');";
                $sikwelres111 = mysqli_query($conn, $sql111);
            }
        }
    }

?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <?php
        if(isset($_GET['login'])){
          if($_SESSION['ustype'] == 'Administrator'){
            echo '<div class="row">
            <div class="alert alert-success alert-dismissible my-2 fade show" role="alert">
              <strong>Welcome!</strong> You logged in as a system administrator.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>';
          }else{
            echo '<div class="row">
            <div class="alert alert-success alert-dismissible my-2 fade show" role="alert">
              <strong>Welcome!</strong> You logged in as a Teacher.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>';
          }
        }
      ?>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-chart-line"></i> Student Progress Report</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <a href ="includes/export.php" class="btn btn-sm btn-outline-secondary">
          <i class="fa-solid fa-file-arrow-down"></i> Export Data
        </a>
        </div>
      </div>

      <canvas class="my-4 w-100" id="myChart1" width="900" height="380"></canvas>

      <h2><i class="fa-solid fa-star"></i> Student Scores</h2><hr><br>
      <?php
        if(isset($_GET['action'])){
            echo '<div class = "alert alert-'.$_GET['action'].'">';
            if($_GET['action'] == 'danger')
                echo $_GET['studname'].'\'s scores has been deleted!';
            echo '</div>';
        }
        $no = 0;
      $sql = "SELECT DISTINCT(lessonid), lesson FROM tblsummary ORDER BY lesson ASC;";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $distlessid = $row['lessonid'];
                $sample = 'example'. ++$no;
                echo '<h4><i class="fa fa-book"></i> LESSON: '.$row['lesson'].'</h4><br>';
                $sql1 = "SELECT * FROM tblsummary WHERE lessonid = '$distlessid';";
                $result1 = mysqli_query($conn, $sql1);
                ?>
                <div class="table-responsive">
                <table id="<?php echo $sample; ?>" class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Section</th>
                            <th>Lesson</th>
                            <th>No. of Items</th>
                            <th>Score</th>
                            <th>Percentage</th>
                            <th>Status</th>
                            <th>Date Taken</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                            if(mysqli_num_rows($result1) > 0){
                                while($row1 = mysqli_fetch_assoc($result1)){
                                     echo '<tr>';
                                          echo '<td>'.++$no.'</td>';
                                          echo '<td>'.$row1['studname'].'</td>';
                                          echo '<td>'.$row1['studentsec'].'</td>';
                                          echo '<td>'.$row1['lesson'].'</td>';
                                          echo '<td>'.$row1['noItems'].'</td>';
                                          echo '<td>'.$row1['score'].'</td>';
                                          echo '<td>'.$row1['percentage'].'%</td>';
                                          //echo '<td>'.$row1['status'].'</td>';
                                          if($row1['status'] == "PASSED"){
                                               echo '<td><span style = "color:green;">'.$row1['status'].'</span></td>';
                                          }else{
                                               echo '<td><span style = "color:red;">'.$row1['status'].'</span></td>';
                                          }
                                          echo '<td>'.$row1['datecreated'].'</td>';
                                          echo '<td><a title="View" href="dashb.php?viewreport='.$row1['summaryid'].'" class="btn btn-primary btn-sm" ><i class="fa-solid fa-eye"></i></a>
                                          <a title="Delete" href="process.php?deletereport='.$row1['summaryid'].'&studname='.$row1['studname'].'&studid='.$row1['studid'].'&lessonid='.$row1['lessonid'].'" class="btn btn-danger btn-sm" > <i class="fa-solid fa-trash-can"></i></a>
                                          </td>';
                                     echo '</tr>';
                                }
                           }
                        ?>
                    </tbody>
                </table><br><br>
                </div>
                <?php
            }
        }
        ?>
              <?php
            if(isset($_GET['viewreport'])){
                $iddd = $_GET['viewreport'];

                $sql = "SELECT * FROM tblsummary WHERE summaryid=$iddd;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $c = $row['studname'];
                        $d = $row['lesson'];
                        $e = $row['noItems'];
                        $f = $row['score'];
                        $g = $row['percentage'];
                        $h = $row['status'];
                    }
                    echo '<script>
                                let str = `<br>Student Name:&nbsp;&nbsp;&nbsp;&nbsp; '.$c.'<br>Lesson:&nbsp;&nbsp;&nbsp;&nbsp; '.$d.'<br>No. of Items:&nbsp;&nbsp;&nbsp;&nbsp; '.$e.'<br>
                                Score:&nbsp;&nbsp;&nbsp;&nbsp; '.$f.'<br>Percentage:&nbsp;&nbsp;&nbsp;&nbsp; '.$g.'<br>Status:&nbsp;&nbsp;&nbsp;&nbsp; '.$h.'<br>`
                                Alert.render(str)
                            </script>';
                }
            }
        ?>
    </main>
<?php
  require 'footer1.php';
?>