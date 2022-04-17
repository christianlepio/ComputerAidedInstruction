<?php
    session_start();
    $_SESSION['aktib'] = 'lesson';
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
            <h1 class="h2"><i class="fa fa-book"></i> List of Lessons</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            <a href="addlesson.php" class="btn btn-sm btn-outline-secondary">
                <i class="fa-solid fa-circle-plus"></i>
                Add Lesson
            </a>
            </div>
        </div>
        <?php
            $sql = "SELECT * FROM lessontbl ORDER BY dateCreated DESC;";
            $result = mysqli_query($conn, $sql);
        ?>

        <div class="container">
            <div class="row justify-content-center">
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == 'updated'){
                            echo '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                            <strong><i class="fa-solid fa-circle-check"></i> </strong>&nbsp;Lesson ID '.$_GET['lessonid'].' has been updated!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }elseif($_GET['error'] == 'noerror'){
                            echo '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <strong><i class="fa-solid fa-circle-check"></i> </strong>&nbsp;Lesson entitled "'.$_GET['lessontitle'].'" has been successfully added to the system!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }elseif($_GET['error'] == 'deleted'){
                            echo '<div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <strong><i class="fa-solid fa-circle-check"></i> </strong>&nbsp;Lesson entitled "'.$_GET['lessonTitle'].'", chapter '.$_GET['lessonChapter'].' has been successfully deleted!
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
                        <th>Chapter</th>
                        <th>Title</th>
                        <th>File</th>
                        <th>File Type</th>
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
                                    echo '<td>'.$row['lessonChapter'].'</td>';
                                    echo '<td>'.$row['lessonTitle'].'</td>';
                                    echo '<td><a href="'.$row['fileLoc'].'">'.$row['fileLoc'].'</a></td>';
                                    echo '<td>'.$row['category'].'</td>';
                                    echo '<td>'.$row['dateCreated'].'</td>';
                                    echo '<td class="text-center"><a href="lesson.php?view='.$row['lessonid'].'" class="btn btn-primary btn-sm rounded mb-2"><i class="fa-solid fa-eye"></i></a> 
                                    <a href="addlesson.php?editLesson='.$row['lessonid'].'" class="btn btn-warning btn-sm rounded mb-2"><i class="fa-solid fa-pen-to-square"></i></a> 
                                    <a href="includes/process.php?deletelesson='.$row['lessonid'].'&deletelessonTitle='.$row['lessonTitle'].'&deletelessonChapter='.$row['lessonChapter'].'" class="btn btn-danger btn-sm rounded mb-2"><i class="fa-solid fa-trash"></i></a></td>';
                                echo '</tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
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