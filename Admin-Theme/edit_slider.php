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

    include('../entity/slider.php');
    include_once('../entity/media.php');
    $slider = new Slider();
    $media = new Media();
    $id = $_GET['id'];
    $gSlider  = $slider->getSliderById($id);    
?>    

<div class="row">
<div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                    Edit Slider
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Body</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="body" placeholder="Text" class="form-control" value="<?php echo $gSlider[0]['body'] ?>" maxlength="40" required>
                                                    <small class="help-block form-text">Max Character 100</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Rank</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" max="5" min="1" id="text-input" name="rank" placeholder="Text" class="form-control" value="<?php echo $gSlider[0]['rank'] ?>">
                                                    <small class="help-block form-text">Max Rank 5, Don't Use an exist rank</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Alt Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="altImg" placeholder="Text" class="form-control" value="<?php echo $gSlider[0]['alt_image'] ?>" maxlength="100" required> 
                                                    <small class="help-block form-text">Max Character 100</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Title Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="title" placeholder="Text" class="form-control" value="<?php echo $gSlider[0]['title'] ?>" maxlength="100" required>
                                                    <small class="help-block form-text">Max Character 100</small>
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
                                            echo "<img src='{$gSlider[0]['path']}'>";
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
                                                $rank               = $_POST['rank'];
                                                $body               = $_POST['body'];
                                                $alt                = $_POST['altImg'];
                                                $titleImg           = $_POST['title'];
                                                // $admin_id           = 1;
                                                $media->setMedia($alt , $fileDestination, $titleImg);
                                                $slider->updateSlider($id,$admin_id,$rank,$body);
                                            } else {
                                                $id                 = $_GET['id'];
                                                $media_id           = $gSlider[0]['media_id'];
                                                $rank               = $_POST['rank'];
                                                $body               = $_POST['body'];
                                                $alt                = $_POST['altImg'];
                                                $titleImg           = $_POST['title'];
                                                // $admin_id           = 1;
                                                $media->updateMedia($media_id,$alt, $titleImg);
                                                $slider->updateSliderWithOutImage($id,$admin_id,$rank,$body);
                                            }
                                        }
                                        ?>
                                    </div>
                                    
                                </div>
                                </div>

<?php
}
?>                                
<?php
include('partials/footer_admin.php');
?>