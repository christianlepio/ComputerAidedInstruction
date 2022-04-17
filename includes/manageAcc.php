<?php
    require 'dbh.inc.php';

    if(isset($_POST['forg1-submit'])){
        $lrn = $_POST['lrn'];
        $sname = $_POST['lname'];
        $gname = $_POST['fname'];
        $cont = $_POST['contact'];
        $pas1 = $_POST['pwd1'];
        $pas2 = $_POST['pwd2'];

        if(empty($lrn) || empty($sname) || empty($gname) || empty($cont) || empty($pas1) || empty($pas2)){
            header("Location: ../forgotpass.php?error=emptyfields");
            exit();
        }elseif($pas1 != $pas2){
            header("Location: ../forgotpass.php?error=pwdnotmatched");
            exit();
        }else{
            $sql = "SELECT LRN, Fname, Lname, MobileNo FROM tblstudent WHERE LRN='$lrn';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            echo mysqli_error($conn);

            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $a = $row['LRN'];
                    $b = $row['Fname'];
                    $c = $row['Lname'];
                    $d = $row['MobileNo'];
                }
                
                if($sname == $c && $gname == $b && $lrn == $a && $cont == $d){
                    
                    //this is for password hash
                    $hashP = password_hash($pas1, PASSWORD_DEFAULT);

                    $sql1 = "UPDATE tblstudent SET STUDPASS='$hashP' WHERE LRN='$lrn';";
                    $result1 = mysqli_query($conn, $sql1);
                    
                    if($result1){
                        header("Location: ../forgotpass.php?resetpassword=success");
                        exit();
                    }
                }else{
                    if($sname != $c){
                        header("Location: ../forgotpass.php?error=incorrectlastname");
                        exit();
                    }elseif($gname != $b){
                        header("Location: ../forgotpass.php?error=incorrectfirstname");
                        exit();
                    }elseif($lrn != $a){
                        header("Location: ../forgotpass.php?error=lrn");
                        exit();
                    }elseif($cont != $d){
                        header("Location: ../forgotpass.php?error=phone");
                        exit();
                    }
                }
            }else{
                header("Location: ../forgotpass.php?error=nouser");
                exit();
            }
        }
    }if(isset($_POST['forg2-submit'])){
        $lrn = $_POST['lrn'];
        $sname = $_POST['lname'];
        $gname = $_POST['fname'];
        $cont = $_POST['contact'];
        $pas1 = $_POST['pwd1'];
        $pas2 = $_POST['pwd2'];

        if(empty($lrn) || empty($sname) || empty($gname) || empty($cont) || empty($pas1) || empty($pas2)){
            header("Location: ../forgotpass1.php?error=emptyfields");
            exit();
        }elseif($pas1 != $pas2){
            header("Location: ../forgotpass1.php?error=pwdnotmatched");
            exit();
        }else{
            $sql = "SELECT LNAME, FNAME, EMAIL, USERNAME FROM tblusers WHERE USERNAME='$lrn';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            echo mysqli_error($conn);

            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $a = $row['USERNAME'];
                    $b = $row['FNAME'];
                    $c = $row['LNAME'];
                    $d = $row['EMAIL'];
                }
                
                if($sname == $c && $gname == $b && $lrn == $a && $cont == $d){
                    
                    //this is for password hash
                    $hashP = password_hash($pas1, PASSWORD_DEFAULT);

                    $sql1 = "UPDATE tblusers SET PASS='$hashP' WHERE USERNAME='$lrn' AND LNAME='$sname' AND FNAME='$gname' AND EMAIL='$cont';";
                    $result1 = mysqli_query($conn, $sql1);
                    
                    if($result1){
                        header("Location: ../forgotpass1.php?resetpassword=success");
                        exit();
                    }
                }else{
                    if($sname != $c){
                        header("Location: ../forgotpass1.php?error=incorrectlastname");
                        exit();
                    }elseif($gname != $b){
                        header("Location: ../forgotpass1.php?error=incorrectfirstname");
                        exit();
                    }elseif($lrn != $a){
                        header("Location: ../forgotpass1.php?error=lrn");
                        exit();
                    }elseif($cont != $d){
                        header("Location: ../forgotpass1.php?error=phone");
                        exit();
                    }
                }
            }else{
                header("Location: ../forgotpass1.php?error=nouser");
                exit();
            }
        }
    }