<?php
    require 'dbh.inc.php';

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