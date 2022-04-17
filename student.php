<?php
    session_start();
    $_SESSION['aktib'] = 'stud';
    require 'header1.php';
?>
    <!-- this is for alert -->
    <div id="dialogoverlay"></div>
        <div id="dialogbox">
            <div>
                <div id="dialogboxhead"></div>
                <div id="dialogboxbody"></div>
                <div id="dialogboxfoot"></div>
            </div>
        </div>
    <!-- end of alert -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
            <h1 class="h2"><i class="fa fa-users"></i> List of Students</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            <a href="addstudent.php" class="btn btn-sm btn-outline-secondary">
                <i class="fa-solid fa-circle-plus"></i>
                Add Student
            </a>
            </div>
        </div>
        <?php
            $sql = "SELECT * FROM tblstudent ORDER BY Lname ASC;";
            $result = mysqli_query($conn, $sql);
        ?>

        <div class="container">
            <div class="row justify-content-center">
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == 'studentupdated'){
                            echo '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                            <strong><i class="fa-solid fa-circle-check"></i> </strong>&nbsp;Student "'.$_GET['lname'].'" has been updated.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }elseif($_GET['error'] == 'none'){
                            echo '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <strong><i class="fa-solid fa-circle-check"></i> </strong>&nbsp;New Student has been added.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }elseif($_GET['error'] == 'studentdeleted'){
                            echo '<div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <strong><i class="fa-solid fa-circle-check"></i> </strong>&nbsp;Student "'.$_GET['lname'].'" has been deleted.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }
                    }
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="example" class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Profile</th>
                        <th>LRN</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Gender</th>
                        <th>Section</th>
                        <th>Address</th>
                        <th>Contact #</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 0;
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<tr>';
                                    echo '<td>'.++$no.'</td>';
                                    if($row['imgsrc'] != ''){echo '<td><img style="width:50px; height:50px; border-radius:25px;" src="'.$row['imgsrc'].'"></td>';}else{echo '<td>none</td>';}
                                    echo '<td>'.$row['LRN'].'</td>';
                                    echo '<td>'.$row['Lname'].'</td>';
                                    echo '<td>'.$row['Fname'].'</td>';
                                    echo '<td>'.$row['gender'].'</td>';
                                    echo '<td>'.$row['studentsec'].'</td>';
                                    echo '<td>'.$row['Address'].'</td>';
                                    echo '<td>'.$row['MobileNo'].'</td>';
                                    echo '<td class="text-center"> <a href="student.php?view='.$row['StudentID'].'" class="btn btn-primary btn-sm rounded mb-2"><i class="fa-solid fa-eye"></i></a>
                                    <a href="addstudent.php?editstudent='.$row['StudentID'].'" class="btn btn-warning btn-sm rounded mb-2"><i class="fa-solid fa-pen-to-square"></i></a> 
                                    <a href="includes/process.php?deletestudent='.$row['StudentID'].'&deletelname='.$row['Lname'].'" class="btn btn-danger btn-sm rounded mb-2"><i class="fa-solid fa-trash"></i></a></td>';
                                echo '</tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div><br><br>
        <?php
            if(isset($_GET['view'])){
                $iddd = $_GET['view'];
                $sql = "SELECT * FROM tblstudent WHERE StudentID=$iddd;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $p = $row['imgsrc'];
                        $k = $row['gender'];
                        $a = $row['Lname'];
                        $b = $row['Fname'];
                        $c = $row['LRN'];
                        $h = 'Student';
                        $d = $row['Address'];
                        $ph = $row['MobileNo'];
                        $sec = $row['studentsec'];
                        
                    }
                }
                echo '<script>
                    let str = `<center><img style="height:110px; width:110px; border-radius:60px;" src="'.$p.'"><br><h3>Profile</h3></center><br>Last Name:&nbsp;&nbsp;&nbsp;&nbsp; '.$a.'<br>First Name:&nbsp;&nbsp;&nbsp;&nbsp; '.$b.'<br>Gender:&nbsp;&nbsp;&nbsp;&nbsp; '.$k.'<br>LRN:&nbsp;&nbsp;&nbsp;&nbsp; '.$c.'<br>
                    Section:&nbsp;&nbsp;&nbsp;&nbsp; '.$sec.'<br>User Type:&nbsp;&nbsp;&nbsp;&nbsp; '.$h.'<br>Address:&nbsp;&nbsp;&nbsp;&nbsp; '.$d.'<br>Phone no.:&nbsp;&nbsp;&nbsp;&nbsp; '.$ph.'<br>`
                    Alert.render(str)
                    </script>';
            }
        ?>
    </main>
<?php
    require 'footer1.php';
?>