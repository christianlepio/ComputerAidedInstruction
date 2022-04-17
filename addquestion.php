<?php
    session_start();
    $_SESSION['aktib'] = 'exer';
    require 'header1.php';
?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <?php
                if(isset($_GET['editquestion'])){
                    echo '<h1 class="h2"><i class="fa fa-pen-to-square"></i> Edit Question</h1>';
                }else{
                    echo '<h1 class="h2"><i class="fa-solid fa-circle-plus"></i> Add Question</h1>';
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
                        }elseif($_GET['error'] == 'nofile'){
                            echo '<div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <strong><i class="fa-solid fa-circle-check"></i> </strong>&nbsp;Don\'t forget to upload file...
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
                            <?php
                                $sql="SELECT * FROM lessontbl ORDER BY dateCreated DESC;";
                                $result = mysqli_query($conn, $sql);
                            ?>
                            <select class="form-select" name="lessonTitle" id="floatingSelectGrid" aria-label="Floating label select example" required>
                                <?php
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_assoc($result)){
                                ?>
                                            <option value="<?php echo $row['lessonTitle']; ?>" <?php if($LessonTitle == $row['lessonTitle']){ echo 'selected'; } ?>><?php echo $row['lessonTitle']; ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                            <label for="floatingSelectGrid">Select lesson title:</label>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="question" id="floatingInputGrid" placeholder="name@example.com" value="<?php echo $Question; ?>" required>
                            <label for="floatingInputGrid">Question:</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <label for="formFile" class="mb-1"> &nbsp;Upload Image:</label>
                        <input class="form-control form-control-sm" name="ques-file" type="file" id="formFile" <?php if(isset($_GET['editquestion'])){ echo 'disabled';} ?>>
                    </div>
                </div>

                <div class="row justify-content-center g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="choiceA" id="floatingInputGrid" placeholder="name@example.com" value="<?php echo $ChoiceA; ?>" required>
                            <label for="floatingInputGrid">Choice A:</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <label for="formFile" class="mb-1"> &nbsp;Upload Image:</label>
                        <input class="form-control form-control-sm" name="choiceA-file" type="file" id="formFile" <?php if(isset($_GET['editquestion'])){ echo 'disabled';} ?>>
                    </div>
                </div>

                <div class="row justify-content-center g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="choiceB" id="floatingInputGrid" placeholder="name@example.com" value="<?php echo $ChoiceB; ?>" required>
                            <label for="floatingInputGrid">Choice B:</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <label for="formFile" class="mb-1"> &nbsp;Upload Image:</label>
                        <input class="form-control form-control-sm" name="choiceB-file" type="file" id="formFile" <?php if(isset($_GET['editquestion'])){ echo 'disabled';} ?>>
                    </div>
                </div>

                <div class="row justify-content-center g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="choiceC" id="floatingInputGrid" placeholder="name@example.com" value="<?php echo $ChoiceC; ?>" required>
                            <label for="floatingInputGrid">Choice C:</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <label for="formFile" class="mb-1"> &nbsp;Upload Image:</label>
                        <input class="form-control form-control-sm" name="choiceC-file" type="file" id="formFile" <?php if(isset($_GET['editquestion'])){ echo 'disabled';} ?>>
                    </div>
                </div>

                <div class="row justify-content-center g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="choiceD" id="floatingInputGrid" placeholder="name@example.com" value="<?php echo $ChoiceD; ?>" required>
                            <label for="floatingInputGrid">Choice D:</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <label for="formFile" class="mb-1"> &nbsp;Upload Image:</label>
                        <input class="form-control form-control-sm" name="choiceD-file" type="file" id="formFile" <?php if(isset($_GET['editquestion'])){ echo 'disabled';} ?>>
                    </div>
                </div>

                <div class="row justify-content-center g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="answer" id="floatingInputGrid" placeholder="name@example.com" value="<?php echo $Answer; ?>" required>
                            <label for="floatingInputGrid">Answer:</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <label for="formFile" class="mb-1"> &nbsp;Upload Image:</label>
                        <input class="form-control form-control-sm" name="answer-file" type="file" id="formFile" <?php if(isset($_GET['editquestion'])){ echo 'disabled';} ?>>
                    </div>
                </div>
                <?php
                    if(isset($_GET['editquestion'])){
                ?>
                    <input type="hidden" name="exerciseid" value="<?php echo $_GET['editquestion']; ?>">
                <?php
                    }
                ?>

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <center>
                            <?php
                                if(isset($_GET['editquestion'])){
                                    echo '<a href="exercise.php" class="btn btn-danger btn-sm">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="submit" name="que-update" formaction="includes/process.php" class="btn btn-primary btn-sm">Save</button>';
                                }else{
                                    echo '<a href="exercise.php" class="btn btn-danger btn-sm">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="submit" name="que-submit" class="btn btn-primary btn-sm">Save</button>';
                                }
                            ?>
                        </center>    
                    </div>
                </div><br><br>
            </form>
        </div>
    </main>
<?php
    require 'footer1.php';
?>