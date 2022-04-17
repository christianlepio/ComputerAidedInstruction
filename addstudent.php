<?php
    session_start();
    $_SESSION['aktib'] = 'stud';
    require 'header1.php';
?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <?php
                if(isset($_GET['editstudent'])){
                    echo '<h1 class="h2"><i class="fa fa-pen-to-square"></i> Edit Student</h1>';
                }else{
                    echo '<h1 class="h2"><i class="fa-solid fa-circle-plus"></i> Add Student</h1>';
                }
            ?>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == 'updated'){
                            echo '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                            <strong><i class="fa-solid fa-circle-check"></i> </strong>&nbsp;Lesson ID '.$_GET['lessonid'].' has been updated!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }elseif($_GET['error'] == 'pwdnotmatch'){
                            echo '<div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <strong><i class="fa-solid fa-circle-check"></i> </strong>&nbsp;Password not matched, please try again...
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }elseif($_GET['error'] == 'pdferror' || $_GET['error'] == 'viderror'){
                            echo '<div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <strong><i class="fa-solid fa-circle-check"></i> </strong>&nbsp;Incorrect file extension name, please try again!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }
                    }
                ?>
            </div>
        </div>
        <div class="container">
            <form action="includes/process.php" method="post" enctype="multipart/form-data">
                <div class="row justify-content-center g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="lrn" id="floatingInputGrid" placeholder="name@example.com" value="<?php echo $lrn; ?>" required>
                            <label for="floatingInputGrid">LRN:</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="lname" id="floatingInputGrid" placeholder="name@example.com" value="<?php echo $lname; ?>" required>
                            <label for="floatingInputGrid">Student's Lastname:</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="fname" id="floatingInputGrid" placeholder="name@example.com" value="<?php echo $fname; ?>" required>
                            <label for="floatingInputGrid">Student's Firstname:</label>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <select class="form-select" name="gender" id="floatingSelectGrid" aria-label="Floating label select example" required>
                                <option value="Male" <?php if($gender == 'Male'){ echo 'selected'; } ?>>Male</option>
                                <option value="Female" <?php if($gender == 'Female'){ echo 'selected'; } ?>>Female</option>
                            </select>
                            <label for="floatingSelectGrid">Gender:</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="section" id="floatingInputGrid" placeholder="name@example.com" value="<?php echo $section; ?>" required>
                            <label for="floatingInputGrid">Section:</label>
                        </div>
                    </div>
                    <div class="col-md">                        
                    <div class="form-floating">
                            <input type="text" class="form-control" name="contact" id="floatingInputGrid" placeholder="name@example.com" value="<?php echo $contact; ?>" required>
                            <label for="floatingInputGrid">Contact Number:</label>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center g-2 mb-3">
                    <div class="form-floating">
                        <textarea class="form-control" name="address" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 95px"><?php echo $address; ?></textarea>
                        <label for="floatingTextarea2">Address:</label>
                    </div>
                </div>
                <?php
                    if(!isset($_GET['editstudent'])){
                ?>
                <div class="row justify-content-center g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="password" class="form-control" name="pass1" id="floatingInputGrid" placeholder="name@example.com" value="<?php echo $lstitle; ?>" required>
                            <label for="floatingInputGrid">Password:</label>
                        </div>                        
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="password" class="form-control" name="pass2" id="floatingInputGrid" placeholder="name@example.com" value="<?php echo $lstitle; ?>" required>
                            <label for="floatingInputGrid">Confirm Password:</label>
                        </div>
                    </div>
                    <div class="col-md border rounded">                        
                        <label for="formFile" class="mb-0"><small> &nbsp;Upload profile picture (optional):</small></label>
                        <input class="form-control form-control-sm" name="pro-file" type="file" id="formFile" <?php if(isset($_GET['editstudent'])){echo 'disabled';} ?>>
                    </div>
                </div>
                <?php
                    }
                ?>
                <?php
                    if(isset($_GET['editstudent'])){
                ?>
                    <input type="hidden" name="studentid" value="<?php echo $_GET['editstudent']; ?>">
                <?php
                    }
                ?>

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <center>
                            <?php
                                if(isset($_GET['editstudent'])){
                                    echo '<a href="student.php" class="btn btn-danger btn-sm">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="submit" name="student-update" formaction="includes/process.php" class="btn btn-primary btn-sm">Save</button>';
                                }else{
                                    echo '<a href="student.php" class="btn btn-danger btn-sm">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="submit" name="student-submit" class="btn btn-primary btn-sm">Submit</button>';
                                }
                            ?>
                        </center>    
                    </div>
                </div>
            </form>
        </div>
    </main>
<?php
    require 'footer1.php';
?>