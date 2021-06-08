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
    
    $logo = new Logo();
?>    
 <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        Upload Logo
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Image Alt</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="logoAlt" placeholder="Text" class="form-control" required maxlength="100">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Upload Logo</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" name="file" class="form-control-file" required>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm" name="create_logo">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                                <?php 
                                                    $count = $logo->checkLogo();
                                                    if($count[0]['COUNT(id)'] >= 1) {
                                                        echo "<a href='delete_logo.php' class='btn btn-danger'>Delete</a>";
                                                    }
                                                ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                                    if(isset($_POST['create_logo'])){
                                        
                                        // get image data
                                        $file = $_FILES['file'];
                                        $image_name = $_FILES['file']['name'];
                                        $tmp_name   = $_FILES['file']['tmp_name'];
                                        $fileError = $_FILES['file']['error'];
                                        $fileSize = $_FILES['file']['size'];
                                        $fileType = $_FILES['file']['type'];

                                        $fileExt = explode('.' , $image_name);
                                        $fileActualExt = strtolower(end($fileExt));

                                        $allowed = array('jpg' , 'jpeg' , 'png');

                                        if( in_array($fileActualExt , $allowed)) {
                                            if($fileError === 0 ) {
                                                if($fileSize < 500000) {
                                                    $fileDestination =  "../images/site_images/" . $image_name;
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
                                       
                                        $logoAlt              = $_POST['logoAlt'];
                                        // $admin_id              = 1;
                                        $logo->setLogo($logoAlt , $fileDestination, $admin_id);
                                    }
                                ?>
<img src="<?php echo $logo->getLogo()[0]['logo_image'] ?>" >

<?php
}
?>
<?php
include('partials/footer_admin.php');
?>