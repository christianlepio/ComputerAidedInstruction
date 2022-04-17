<?php
    session_start();
    $_SESSION['aktib'] = 'exer';
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
            <h1 class="h2"><i class="fa-brands fa-stack-overflow"></i> List of Exercises</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            <a href="addquestion.php" class="btn btn-sm btn-outline-secondary">
                <i class="fa-solid fa-circle-plus"></i>
                Add Question
            </a>
            </div>
        </div>
        <?php
            $sql = "SELECT * FROM tblexercise ORDER BY ExercisesDate DESC;";
            $result = mysqli_query($conn, $sql);
        ?>

        <div class="container">
            <div class="row justify-content-center">
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == 'quizupdated'){
                            echo '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                            <strong><i class="fa-solid fa-circle-check"></i> </strong>&nbsp;1 question has been updated in a lesson entitled "'.$_GET['lessontitle'].'".
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }elseif($_GET['error'] == 'quizadded'){
                            echo '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <strong><i class="fa-solid fa-circle-check"></i> </strong>&nbsp;New question has been added in a lesson entitled "'.$_GET['lessontitle'].'".
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }elseif($_GET['error'] == 'quizdeleted'){
                            echo '<div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <strong><i class="fa-solid fa-circle-check"></i> </strong>&nbsp;1 question has been deleted in a lesson entitled "'.$_GET['lessontitle'].'".
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
                        <th>Lesson</th>
                        <th>Question</th>
                        <th>Question-img</th>
                        <th>Choice-A</th>
                        <th>Choice-A-img</th>
                        <th>Choice-B</th>
                        <th>Choice-B-img</th>
                        <th>Choice-C</th>
                        <th>Choice-C-img</th>
                        <th>Choice-D</th>
                        <th>Choice-D-img</th>
                        <th>Answer</th>
                        <th>Answer-img</th>
                        <th>Date Created</th>
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
                                    
                                    $LessonID = $row['LessonID'];
                                    $sql1 = "SELECT lessonTitle FROM lessontbl WHERE lessonid = '$LessonID';";
                                    $result1 = mysqli_query($conn, $sql1);
                            
                                    if(mysqli_num_rows($result1) > 0){
                                        while($row1 = mysqli_fetch_assoc($result1)){
                                            $LessonTitle = $row1['lessonTitle'];
                                        }
                                    }

                                    echo '<td>'.$LessonTitle.'</td>';
                                    echo '<td>'.$row['Question'].'</td>';
                                    if($row['qpic'] != ''){echo '<td><img style="width:50px; height:50px; border-radius:4px;" src="'.$row['qpic'].'"></td>';}else{echo '<td>none</td>';}
                                    echo '<td>'.$row['ChoiceA'].'</td>';
                                    if($row['Apic'] != ''){echo '<td><img style="width:50px; height:50px; border-radius:4px;" src="'.$row['Apic'].'"></td>';}else{echo '<td>none</td>';}
                                    echo '<td>'.$row['ChoiceB'].'</td>';
                                    if($row['Bpic'] != ''){echo '<td><img style="width:50px; height:50px; border-radius:4px;" src="'.$row['Bpic'].'"></td>';}else{echo '<td>none</td>';}
                                    echo '<td>'.$row['ChoiceC'].'</td>';
                                    if($row['Cpic'] != ''){echo '<td><img style="width:50px; height:50px; border-radius:4px;" src="'.$row['Cpic'].'"></td>';}else{echo '<td>none</td>';}
                                    echo '<td>'.$row['ChoiceD'].'</td>';
                                    if($row['Dpic'] != ''){echo '<td><img style="width:50px; height:50px; border-radius:4px;" src="'.$row['Dpic'].'"></td>';}else{echo '<td>none</td>';}
                                    echo '<td>'.$row['Answer'].'</td>';
                                    if($row['Anspic'] != ''){echo '<td><img style="width:50px; height:50px; border-radius:4px;" src="'.$row['Anspic'].'"></td>';}else{echo '<td>none</td>';}
                                    echo '<td>'.$row['ExercisesDate'].'</td>';
                                    echo '<td class="text-center"> 
                                    <a href="addquestion.php?editquestion='.$row['ExerciseID'].'" class="btn btn-warning btn-sm rounded mb-2"><i class="fa-solid fa-pen-to-square"></i></a> 
                                    <a href="includes/process.php?deletequestion='.$row['ExerciseID'].'&deletelessonTitle='.$LessonTitle.'" class="btn btn-danger btn-sm rounded mb-2"><i class="fa-solid fa-trash"></i></a></td>';
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
                $sql = "SELECT * FROM lessontbl WHERE lessonid=$iddd;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $p = $row['lessonChapter'];
                        $k = $row['lessonTitle'];
                        $a = $row['category'];
                        $b = $row['dateCreated'];
                    }
                }
                echo '<script>
                let str = `<br>Chapter:&nbsp;&nbsp;&nbsp;&nbsp; '.$p.'<br>Lesson Title:&nbsp;&nbsp;&nbsp;&nbsp; '.$k.'<br>Category:&nbsp;&nbsp;&nbsp;&nbsp; '.$a.'<br>
                Date Created:&nbsp;&nbsp;&nbsp;&nbsp; '.$b.'<br>`
                Alert.render(str)
                </script>';
            }
        ?>
    </main>
<?php
    require 'footer1.php';
?>