<?php
    header("Content-type:application/vnd.ms-excel");

    $filename = "student_score.xls";

    header('Content-Disposition: attachment; filename='. $filename);

?>    
<?php
        require 'dbh.inc.php';
        ?>
        
        <center><h4>Student Score</h4></center>
        <?php
        $no = 0;
      $sql = "SELECT DISTINCT(lessonid), lesson FROM tblsummary ORDER BY lesson ASC;";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $distlessid = $row['lessonid'];
                $sample = 'example'. ++$no;
                echo '<h4><i class="fa fa-book"></i> LESSON: '.$row['lesson'].'</h4>';
                $sql1 = "SELECT * FROM tblsummary WHERE lessonid = '$distlessid';";
                $result1 = mysqli_query($conn, $sql1);
                ?>
                <div class="table-responsive">
                <table id="<?php echo $sample; ?>" class="table table-hover table-striped">
                    <thead class = "bg-dark">
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
                                     echo '</tr>';
                                }
                           }
                        ?>
                    </tbody>
                </table><br><br><br>
                </div>
                <?php
            }
        }
        ?>