<?php
    if(isset($_POST['login-submit'])){

    require 'dbh.inc.php';

    $lrn = $_POST['lrn'];
    $pass = $_POST['pwd'];

    $sql = "SELECT * FROM tblstudent WHERE LRN=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../index.php?error=sqlerrore");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $lrn);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
            //password verifier...
            $passCheck = password_verify($pass, $row['STUDPASS']);
            if($passCheck == false){
                header("Location: ../index.php?error=wronglogin2");
                exit();
            }elseif($passCheck == true){
                session_start();
                $_SESSION['studid'] = $row['StudentID'];
                $_SESSION['susernm'] = $row['username'];
                $_SESSION['simage'] = $row['imgsrc'];
        
                header("Location: ../home.php?login=success");
                exit();
            }else{
                header("Location: ../index.php?error=wronglogin2");
                exit();
            }
        }else{
            header("Location: ../index.php?error=wronglogin1");
            exit();
        }
    }
    }if(isset($_POST['login-user'])){

        require 'dbh.inc.php';
    
        $uname = $_POST['uname'];
        $pass = $_POST['pwd'];
    
        $sql = "SELECT * FROM tblusers WHERE USERNAME=? OR EMAIL=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../loguser.php?error=sqlerrore");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "ss", $uname, $uname);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                //password verifier...
                $passCheck = password_verify($pass, $row['PASS']);
                if($passCheck == false){
                    header("Location: ../loguser.php?error=wronglogin2");
                    exit();
                }elseif($passCheck == true){
                    session_start();
                    $_SESSION['usid'] = $row['USERID'];
                    $_SESSION['ln'] = $row['LNAME'];
                    $_SESSION['fn'] = $row['FNAME'];
                    $_SESSION['ustype'] = $row['TYPE'];
                    $_SESSION['image'] = $row['imgsrc'];
            
                    header("Location: ../dashb.php?login=success");
                    exit();
                }else{
                    header("Location: ../loguser.php?error=wronglogin2");
                    exit();
                }
            }else{
                header("Location: ../loguser.php?error=wronglogin1");
                exit();
            }
        }
    }