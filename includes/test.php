<?php
require 'dbh.inc.php';

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