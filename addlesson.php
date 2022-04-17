<?php
    session_start();
    $_SESSION['aktib'] = 'lesson';
    require 'header1.php';
?>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Disclaimer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 class="text-center fs-4">“COPYRIGHT DISCLAIMER UNDER SECTION 107 OF THE COPYRIGHT ACT 1976”</h4>
        <p class="text-center fs-6">Please note and abide by copyright laws. You should not upload a copyrighted content that is came from the published books otherwise you will be sanction to such action. The lessons and learning videos must not be uploaded without express permission of redistribution. Although an educational use exemption would apply.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <?php
                if(isset($_GET['editLesson'])){
                    echo '<h1 class="h2"><i class="fa fa-pen-to-square"></i> Edit Lesson</h1>';
                }else{
                    echo '<h1 class="h2"><i class="fa-solid fa-circle-plus"></i> Add Lesson</h1>';
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
                            <input type="text" class="form-control" name="lschapter" id="floatingInputGrid" placeholder="name@example.com" value="<?php echo $lschapter; ?>" required>
                            <label for="floatingInputGrid">Chapter:</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="lstitle" id="floatingInputGrid" placeholder="name@example.com" value="<?php echo $lstitle; ?>" required>
                            <label for="floatingInputGrid">Title:</label>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <select class="form-select" name="lsfiletp" id="floatingSelectGrid" aria-label="Floating label select example" required>
                                <option value="docs/pdf" <?php if($lsfiletp == 'docs/pdf'){ echo 'selected'; } ?>>Docs/PDF</option>
                                <option value="vid" <?php if($lsfiletp == 'vid'){ echo 'selected'; } ?>>Video</option>
                            </select>
                            <label for="floatingSelectGrid">Select File Type:</label>
                        </div>
                    </div>
                    <div class="col-md">                        
                        <label for="formFile" class="mb-1"> &nbsp;Upload file:</label>
                        <input class="form-control form-control-sm" name="content-file" type="file" id="formFile" <?php if(isset($_GET['editLesson'])){echo 'disabled';} ?>>
                    </div>
                </div>
                <?php
                    if(isset($_GET['editLesson'])){
                ?>
                    <input type="hidden" name="lessonid" value="<?php echo $_GET['editLesson']; ?>">
                <?php
                    }
                ?>

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <center>
                            <?php
                                if(isset($_GET['editLesson'])){
                                    echo '<a href="lesson.php" class="btn btn-danger btn-sm">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="submit" name="lesson-update" formaction="includes/process.php" class="btn btn-primary btn-sm">Save</button>';
                                }else{
                                    echo '<a href="lesson.php" class="btn btn-danger btn-sm">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="submit" name="lesson-submit" class="btn btn-primary btn-sm">Submit</button>';
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