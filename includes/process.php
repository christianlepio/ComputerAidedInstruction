<?php
    require 'dbh.inc.php';

    $lschapter = '';
    $lstitle = '';
    $lsfiletp = '';

    $LessonTitle = '';
    $LessonID = '';
    $Question = '';
    $ChoiceA = '';
    $ChoiceB = '';
    $ChoiceC = '';
    $ChoiceD = '';
    $Answer = '';

    $lrn = '';
    $lname = '';
    $fname = '';
    $gender = '';
    $section = '';
    $contact = '';
    $address = '';
    $pass1 = '';
    $pass2 = '';

    $ulname = '';
    $ufname = '';
    $ugender = '';
    $ucontact = '';
    $uemail = '';
    $uaddress = '';
    $uname = '';
    $usertype = '';
    $upass1 = '';
    $upass2 = '';

    function Uploadfile(){
        $target_dir = "../files/";
        $target_file = $target_dir.basename($_FILES["content-file"]["name"]);
        $uploadOk = 1;
        $contentFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $contentFileType = strtolower($contentFileType);    

        if($contentFileType == 'mp4' || $contentFileType == 'mkv' || $contentFileType == 'avi' || $contentFileType == 'webm') {
            if (move_uploaded_file($_FILES["content-file"]["tmp_name"], $target_file)) {
                return basename($_FILES["content-file"]["name"]);
            }else{
                echo "Error Uploading File";
                exit;
            }
        }elseif($contentFileType == 'pdf'){
            if (move_uploaded_file($_FILES["content-file"]["tmp_name"], $target_file)) {
                return basename($_FILES["content-file"]["name"]);
            }else{
                echo "Error Uploading File";
                exit;
            }
        }else{
            echo "File Not Supported";
            exit;
        }
    }
    function Uploadimg1(){
        $target_dir = "../files/";
        $target_file = $target_dir.basename($_FILES["ques-file"]["name"]);
        $uploadOk = 1;
        $file_error = $_FILES['ques-file']['error'];
        $contentFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $contentFileType = strtolower($contentFileType);    
        if($file_error == 0){
            if($contentFileType == 'jpg' || $contentFileType == 'jpeg' || $contentFileType == 'png') {
                if (move_uploaded_file($_FILES["ques-file"]["tmp_name"], $target_file)) {
                    return "files/".basename($_FILES["ques-file"]["name"]);
                }else{
                    echo "Error Uploading File";
                    exit;
                }
            }else{
                echo "File Not Supported1";
                exit;
            }
        }else{
            return '';
        }
    }
    function Uploadimg2(){
        $target_dir = "../files/";
        $target_file = $target_dir.basename($_FILES["choiceA-file"]["name"]);
        $uploadOk = 1;
        $file_error = $_FILES['choiceA-file']['error'];
        $contentFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $contentFileType = strtolower($contentFileType);    

        if($file_error == 0){
            if($contentFileType == 'jpg' || $contentFileType == 'jpeg' || $contentFileType == 'png') {
                if (move_uploaded_file($_FILES["choiceA-file"]["tmp_name"], $target_file)) {
                    return "files/".basename($_FILES["choiceA-file"]["name"]);
                }else{
                    echo "Error Uploading File";
                    exit;
                }
            }else{
                echo "File Not Supported2";
                exit;
            }
        }else{
            return '';
        }
    }
    function Uploadimg3(){
        $target_dir = "../files/";
        $target_file = $target_dir.basename($_FILES["choiceB-file"]["name"]);
        $uploadOk = 1;
        $file_error = $_FILES['choiceB-file']['error'];
        $contentFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $contentFileType = strtolower($contentFileType);    

        if($file_error == 0){
            if($contentFileType == 'jpg' || $contentFileType == 'jpeg' || $contentFileType == 'png') {
                if (move_uploaded_file($_FILES["choiceB-file"]["tmp_name"], $target_file)) {
                    return "files/".basename($_FILES["choiceB-file"]["name"]);
                }else{
                    echo "Error Uploading File";
                    exit;
                }
            }else{
                echo "File Not Supported3";
                exit;
            }
        }else{
            return '';
        }
    }
    function Uploadimg4(){
        $target_dir = "../files/";
        $target_file = $target_dir.basename($_FILES["choiceC-file"]["name"]);
        $uploadOk = 1;
        $file_error = $_FILES['choiceC-file']['error'];
        $contentFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $contentFileType = strtolower($contentFileType);    

        if($file_error == 0){
            if($contentFileType == 'jpg' || $contentFileType == 'jpeg' || $contentFileType == 'png') {
                if (move_uploaded_file($_FILES["choiceC-file"]["tmp_name"], $target_file)) {
                    return "files/".basename($_FILES["choiceC-file"]["name"]);
                }else{
                    echo "Error Uploading File";
                    exit;
                }
            }else{
                echo "File Not Supported4";
                exit;
            }
        }else{
            return '';
        }
    }
    function Uploadimg5(){
        $target_dir = "../files/";
        $target_file = $target_dir.basename($_FILES["choiceD-file"]["name"]);
        $uploadOk = 1;
        $file_error = $_FILES['choiceD-file']['error'];
        $contentFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $contentFileType = strtolower($contentFileType);    

        if($file_error == 0){
            if($contentFileType == 'jpg' || $contentFileType == 'jpeg' || $contentFileType == 'png') {
                if (move_uploaded_file($_FILES["choiceD-file"]["tmp_name"], $target_file)) {
                    return "files/".basename($_FILES["choiceD-file"]["name"]);
                }else{
                    echo "Error Uploading File";
                    exit;
                }
            }else{
                echo "File Not Supported5";
                exit;
            }
        }else{
            return '';
        }
    }
    function Uploadimg6(){
        $target_dir = "../files/";
        $target_file = $target_dir.basename($_FILES["answer-file"]["name"]);
        $uploadOk = 1;
        $file_error = $_FILES['answer-file']['error'];
        $contentFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $contentFileType = strtolower($contentFileType);    

        if($file_error == 0){
            if($contentFileType == 'jpg' || $contentFileType == 'jpeg' || $contentFileType == 'png') {
                if (move_uploaded_file($_FILES["answer-file"]["tmp_name"], $target_file)) {
                    return "files/".basename($_FILES["answer-file"]["name"]);
                }else{
                    echo "Error Uploading File";
                    exit;
                }
            }else{
                echo "File Not Supported6";
                exit;
            }
        }else{
            return '';
        }
    }
    function Uploadprofile(){
        $target_dir = "../files/";
        $target_file = $target_dir.basename($_FILES["pro-file"]["name"]);
        $uploadOk = 1;
        $file_error = $_FILES['pro-file']['error'];
        $contentFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $contentFileType = strtolower($contentFileType);    

        if($file_error == 0){
            if($contentFileType == 'jpg' || $contentFileType == 'jpeg' || $contentFileType == 'png') {
                if (move_uploaded_file($_FILES["pro-file"]["tmp_name"], $target_file)) {
                    return "files/".basename($_FILES["pro-file"]["name"]);
                }else{
                    echo "Error Uploading File";
                    exit;
                }
            }else{
                echo "File Not Supported6";
                exit;
            }
        }else{
            return '';
        }
    }
    if(isset($_POST['lesson-submit'])){
        $lschapter = $_POST['lschapter'];
        $lstitle = $_POST['lstitle'];
        $lsfiletp = $_POST['lsfiletp'];
        $location = '';

        $target_dir = "files/";
        $target_file = $target_dir.basename($_FILES["content-file"]["name"]);
        $uploadOk = 1;
        $file_error = $_FILES['content-file']['error'];
        $contentFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $contentFileType = strtolower($contentFileType);

        if($file_error == 0){
            if($lsfiletp == 'docs/pdf'){
                if($contentFileType == 'pdf'){
                    $filename = Uploadfile();
                    $location = "files/". $filename;
                }else{
                    header("Location: ../addlesson.php?error=pdferror");
                    exit();
                }
            }elseif($lsfiletp == 'vid'){
                if($contentFileType == 'mp4' || $contentFileType == 'mkv' || $contentFileType == 'avi' || $contentFileType == 'webm'){
                    $filename = Uploadfile();
                    $location = "files/". $filename;
                }else{
                    header("Location: ../addlesson.php?error=viderror");
                    exit();
                }
            }
        }else{
            header("Location: ../addlesson.php?error=nofile");
            exit();
        }

        $sql = "INSERT INTO lessontbl(lessonChapter, lessonTitle, fileLoc, category)
        VALUES('$lschapter', '$lstitle', '$location', '$lsfiletp');";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: ../lesson.php?error=noerror&lessontitle=".$lstitle);
            exit();
        }

    }if(isset($_GET['editLesson'])){
        $editless = $_GET['editLesson'];

        $sql = "SELECT * FROM lessontbl WHERE lessonid = '$editless';";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $lschapter = $row['lessonChapter'];
                $lstitle = $row['lessonTitle'];
                $lsfiletp = $row['category'];
            }
        }
    }if(isset($_POST['lesson-update'])){
        $lsid = $_POST['lessonid'];
        $lschapter = $_POST['lschapter'];
        $lstitle = $_POST['lstitle'];
        $lsfiletp = $_POST['lsfiletp'];

        $sql = "UPDATE lessontbl SET lessonChapter='$lschapter', lessonTitle='$lstitle', category='$lsfiletp'
        WHERE lessonid='$lsid';";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: ../lesson.php?error=updated&lessonid=".$lsid);
            exit();
        }
    }if(isset($_GET['deletelesson'])){
        $delless = $_GET['deletelesson'];
        $deletelessonTitle = $_GET['deletelessonTitle'];
        $deletelessonChapter = $_GET['deletelessonChapter'];

        $sql = "DELETE FROM lessontbl WHERE lessonid = '$delless';";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: ../lesson.php?error=deleted&lessonTitle=".$deletelessonTitle."&lessonChapter=".$deletelessonChapter);
            exit();
        }
    }if(isset($_POST['que-submit'])){
        $lessonid = '';
        $lessontitle = $_POST['lessonTitle'];
        $question = $_POST['question'];
        $choiceA = $_POST['choiceA'];
        $choiceB = $_POST['choiceB'];
        $choiceC = $_POST['choiceC'];
        $choiceD = $_POST['choiceD'];
        $answer = $_POST['answer'];

        $file1 = Uploadimg1();
        $file2 = Uploadimg2();
        $file3 = Uploadimg3();
        $file4 = Uploadimg4();
        $file5 = Uploadimg5();
        $file6 = Uploadimg6();


        $sql = "SELECT lessonid FROM lessontbl WHERE lessonTitle = '$lessontitle';";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $lessonid = $row['lessonid'];
            }
        }

        $sql = "INSERT INTO tblexercise (LessonID, Question, qpic, ChoiceA, Apic, ChoiceB, Bpic, ChoiceC, Cpic, ChoiceD, Dpic, Answer, Anspic)
        VALUES('$lessonid', '$question', '$file1', '$choiceA', '$file2', '$choiceB', '$file3', '$choiceC', '$file4', '$choiceD', '$file5', '$answer', '$file6');";
        $res = mysqli_query($conn, $sql);
        echo mysqli_error($conn);
        if($res){
            header("Location: ../exercise.php?error=quizadded&lessontitle=".$lessontitle);
            exit();
        }
    }if(isset($_GET['editquestion'])){
        $exerciseid = $_GET['editquestion'];

        $sql = "SELECT * FROM tblexercise WHERE ExerciseID = '$exerciseid';";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $LessonID = $row['LessonID'];
                $Question = $row['Question'];
                $ChoiceA = $row['ChoiceA'];
                $ChoiceB = $row['ChoiceB'];
                $ChoiceC = $row['ChoiceC'];
                $ChoiceD = $row['ChoiceD'];
                $Answer = $row['Answer'];
            }
        }

        $sql = "SELECT lessonTitle FROM lessontbl WHERE lessonid = '$LessonID';";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $LessonTitle = $row['lessonTitle'];
            }
        }
    }if(isset($_POST['que-update'])){
        $exerciseid = $_POST['exerciseid'];
        $lessonid = '';
        $lessontitle = $_POST['lessonTitle'];
        $question = $_POST['question'];
        $choiceA = $_POST['choiceA'];
        $choiceB = $_POST['choiceB'];
        $choiceC = $_POST['choiceC'];
        $choiceD = $_POST['choiceD'];
        $answer = $_POST['answer'];


        $sql = "SELECT lessonid FROM lessontbl WHERE lessonTitle = '$lessontitle';";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $lessonid = $row['lessonid'];
            }
        }

        $sql = "UPDATE tblexercise SET LessonID = '$lessonid', Question = '$question', ChoiceA = '$choiceA', ChoiceB = '$choiceB', ChoiceC = '$choiceC', ChoiceD = '$choiceD', Answer = '$answer'
        WHERE ExerciseID = '$exerciseid';";
        $res = mysqli_query($conn, $sql);

        if($res){
            header("Location: ../exercise.php?error=quizupdated&lessontitle=".$lessontitle);
            exit();
        }
    }if(isset($_GET['deletequestion'])){
        $delques = $_GET['deletequestion'];
        $deletelessonTitle = $_GET['deletelessonTitle'];

        $sql = "DELETE FROM tblexercise WHERE ExerciseID = '$delques';";
        $res = mysqli_query($conn, $sql);

        if($res){
            header("Location: ../exercise.php?error=quizdeleted&lessontitle=".$deletelessonTitle);
            exit();
        }
    }if(isset($_POST['student-submit'])){
        $lrn = $_POST['lrn'];
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $gender = $_POST['gender'];
        $section = $_POST['section'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $profile = Uploadprofile();

        if($pass1 != $pass2){
            header("Location: ../addstudent.php?error=pwdnotmatch");
            exit();
        }else{
            $sql = "INSERT INTO tblstudent (LRN, Fname, Lname, gender, studentsec, Address, MobileNo, STUDPASS, imgsrc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../addstudent.php?error=sqlerror");
                exit();
            }else{
                //this is for encrypting the password...
                $hashedPass = password_hash($pass1, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sssssssss", $lrn, $fname, $lname, $gender, $section, $address, $contact, $hashedPass, $profile);
                //this is for execution of the sql statement
                mysqli_stmt_execute($stmt);
                header("Location: ../student.php?error=none");
                exit();
            }
        }
    }if(isset($_GET['editstudent'])){
        $StudentID = $_GET['editstudent'];

        $sql = "SELECT * FROM tblstudent WHERE StudentID = '$StudentID';";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $lrn = $row['LRN'];
                $lname = $row['Lname'];
                $fname = $row['Fname'];
                $gender = $row['gender'];
                $section = $row['studentsec'];
                $contact = $row['MobileNo'];
                $address = $row['Address'];
            }
        }
    }if(isset($_POST['student-update'])){
        $StudentID = $_POST['studentid'];
        $lrn = $_POST['lrn'];
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $gender = $_POST['gender'];
        $section = $_POST['section'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];

        $sql = "UPDATE tblstudent SET LRN = '$lrn', Lname = '$lname', Fname = '$fname', gender = '$gender', studentsec = '$section', Address = '$address', MobileNo = '$contact'
        WHERE StudentID = '$StudentID';";
        $res = mysqli_query($conn, $sql);

        if($res){
            header("Location: ../student.php?error=studentupdated&lname=".$lname);
            exit();
        }
    }if(isset($_GET['deletestudent'])){
        $StudentID = $_GET['deletestudent'];
        $lname = $_GET['deletelname'];

        $sql = "DELETE FROM tblstudent WHERE StudentID = '$StudentID';";
        $res = mysqli_query($conn, $sql);

        if($res){
            header("Location: ../student.php?error=studentdeleted&lname=".$lname);
            exit();
        }
    }if(isset($_POST['user-submit'])){
        $ulname = $_POST['lname'];
        $ufname = $_POST['fname'];
        $ugender = $_POST['gender'];
        $ucontact = $_POST['contact'];
        $uemail = $_POST['mail'];
        $uaddress = $_POST['address'];
        $uname = $_POST['uname'];
        $usertype = $_POST['usertype'];
        $upass1 = $_POST['pass1'];
        $upass2 = $_POST['pass2'];
        $profile = Uploadprofile();

        if($upass1 != $upass2){
            header("Location: ../adduser.php?error=pwdnotmatch");
            exit();
        }else{
            $sql = "INSERT INTO tblusers (LNAME, FNAME, GENDER, PHONE, ADDRESS, EMAIL, USERNAME, PASS, TYPE, imgsrc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../adduser.php?error=sqlerror");
                exit();
            }else{
                //this is for encrypting the password...
                $hashedPass = password_hash($upass1, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "ssssssssss", $ulname, $ufname, $ugender, $ucontact, $uaddress, $uemail, $uname, $hashedPass, $usertype, $profile);
                //this is for execution of the sql statement
                mysqli_stmt_execute($stmt);
                header("Location: ../manageuser.php?error=none");
                exit();
            }
        }
    }if(isset($_GET['edituser'])){
        $userid = $_GET['edituser'];

        $sql = "SELECT * FROM tblusers WHERE USERID = '$userid'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $ulname = $row['LNAME'];
                $ufname = $row['FNAME'];
                $ugender = $row['GENDER'];
                $ucontact = $row['PHONE'];
                $uemail = $row['EMAIL'];
                $uaddress = $row['ADDRESS'];
                $uname = $row['USERNAME'];
                $usertype = $row['TYPE'];
            }
        }
    }if(isset($_POST['user-update'])){
        $userid = $_POST['userid'];
        $ulname = $_POST['lname'];
        $ufname = $_POST['fname'];
        $ugender = $_POST['gender'];
        $ucontact = $_POST['contact'];
        $uemail = $_POST['mail'];
        $uaddress = $_POST['address'];
        $uname = $_POST['uname'];
        $usertype = $_POST['usertype'];

        $sql = "UPDATE tblusers SET LNAME = '$ulname', FNAME = '$ufname', GENDER = '$ugender', PHONE = '$ucontact', ADDRESS = '$uaddress', EMAIL = '$uemail', USERNAME = '$uname', TYPE = '$usertype' 
        WHERE USERID = '$userid';";
        $res = mysqli_query($conn, $sql);

        if($res){
            header("Location: ../manageuser.php?error=studentupdated&lname=".$ulname);
            exit();
        }
    }if(isset($_GET['deleteuser'])){
        
        $userid = $_GET['deleteuser'];
        $lname = $_GET['deletelname'];

        $sql = "DELETE FROM tblusers WHERE USERID = '$userid';";
        $res = mysqli_query($conn, $sql);

        if($res){
            header("Location: ../manageuser.php?error=studentdeleted&lname=".$lname);
            exit();
        }
    }