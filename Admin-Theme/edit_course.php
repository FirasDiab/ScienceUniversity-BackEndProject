<?php
include('partials/header_admin.php');
?>
<?php
if(isset($_SESSION['admin']) || isset($_SESSION['superAdmin'])){
    if(isset($_SESSION['admin'])) {
        $admin_id = $_SESSION['admin']['id'];
    } else {
        $admin_id = $_SESSION['superAdmin']['id'];
    }
    
include('../entity/course.php');
include('../entity/media.php');
$course = new Course();
$media = new Media();
$id = $_GET['id'];
$gCourse  = $course->getCourseById($id);    
?>

<div class="row">
<div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                     Edit Course
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="return editCourse()">
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Title</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="title" name="title" placeholder="Text" class="form-control" maxlength="100" value="<?php echo $gCourse[0]['title'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">body</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="body" id="editor1" rows="9"  class="form-control"><?php echo $gCourse[0]['body'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Alt Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="altImg" name="altImg" placeholder="Text" maxlength="100" class="form-control" value="<?php echo $gCourse[0]['alt_image'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Title Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="titleImg" name="imgTitle" placeholder="Text" maxlength="100" class="form-control" value="<?php echo $gCourse[0]['imgTitle'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" name="file" class="form-control-file">
                                                </div>
                                            </div>
                                            <?php 
                                            echo "<img src='{$gCourse[0]['path']}'>";
                                            ?>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm" name="submit">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                            </div>
                                        </form>
                                        <?php
                                        if(isset($_POST['submit'])) {
                                            if($_FILES['file']['size'] != 0 && $_FILES['file']['error'] == 0){
                                                $file = $_FILES['file'];
                                                $image_name = $_FILES['file']['name'];
                                                $tmp_name   = $_FILES['file']['tmp_name'];
                                                $fileError = $_FILES['file']['error'];
                                                $fileSize = $_FILES['file']['size'];
                                                $fileType = $_FILES['file']['type'];
        
                                                $fileExt = explode('.' , $image_name);
                                                $fileActualExt = strtolower(end($fileExt));
        
                                                $allowed = array('jpg' , 'jpeg' , 'png' , 'svg');
        
                                                if( in_array($fileActualExt , $allowed)) {
                                                    if($fileError === 0 ) {
                                                        if($fileSize < 500000) {
                                                            $fileDestination =  "../assets/" . $image_name;
                                                            move_uploaded_file($tmp_name, $fileDestination);
                                                        } else {
                                                            echo "Your image is too big";
                                                        }
                                                    } else {
                                                        echo "There was an error Uploading you file";
                                                    }
                                                } else {
                                                    echo "You can upload jpg,jpeg,png Files";
                                                } 
                                                $id                 = $_GET['id'];
                                                $title              = $_POST['title'];
                                                $body               = $_POST['body'];
                                                $alt                = $_POST['altImg'];
                                                $titleImg           = $_POST['imgTitle'];
                                                // $admin_id           = 1;
                                                $media->setMedia($alt , $fileDestination, $titleImg);
                                                $course->updateCourse($id,$admin_id,$title,$body);
                                            } else {
                                                $id                 = $_GET['id'];
                                                $media_id           = $gCourse[0]['media_id'];
                                                $title              = $_POST['title'];
                                                $body               = $_POST['body'];
                                                $alt                = $_POST['altImg'];
                                                $titleImg           = $_POST['imgTitle'];
                                                // $admin_id           = 1;
                                                $media->updateMedia($media_id,$alt, $titleImg);
                                                $course->updateCourseWithOutImage($id,$admin_id,$title,$body);
                                            }
                                        }
                                        ?>
                                    </div>
                                    
                                </div>
                                </div>
                                <script src="../html_pages/ckeditor/ckeditor.js"></script>
                                <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script> 
<?php
}
?>
<?php
include('partials/footer_admin.php');
?>