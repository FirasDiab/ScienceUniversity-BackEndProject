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
    include('../entity/site_setting.php');
    $site = new SiteSet();
    ?>

<div class="row">
<div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                    Favicon
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Fav Icon</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="favIcon" placeholder="Text" class="form-control" value="favicon" readonly>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" name="file" class="form-control-file" required>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm" name="favSubmit">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                                <?php 
                                                    $count = $site->checkFav();
                                                    if($count[0]['COUNT(id)'] >= 1) {
                                                        echo "<a href='delete_favicon.php' class='btn btn-danger'>Delete</a>";
                                                    }
                                                ?>
                                            </div>
                                            <img src="<?php $count = $site->checkFav();
                                                    if($count[0]['COUNT(id)'] >= 1) {
                                                        echo $site->getFav()[0]['config_value'];
                                                    }
                                             ?>" >
                                        </form>
                                        <?php
                                        if(isset($_POST['favSubmit'])){
                                             // get image data
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


                                            $config             = $_POST['favIcon'];
                                            // $admin_id           = 1;
                                            $site->setSettingF($config,$admin_id,$fileDestination);
                                        }
                                        ?>
                                    </div>
                                    
                                </div>


                                </div>
                                
                                <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                    CopyRight
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Copy Right</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="copyRight" placeholder="Text" class="form-control" value="copyright" readonly>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Text</label>
                                                </div>

                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="copyRightValue" placeholder="Text" class="form-control" 
                                                    value= "<?php
                                                     $count = $site->checkCopy();
                                                    if($count[0]['COUNT(id)'] >= 1) {
                                                        echo $site->getCopy()[0]['config_value'];
                                                    } 
                                                     ?>
                                                    " required maxlength="100">
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm" name="copySubmit">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                                <?php 
                                                    $count = $site->checkCopy();
                                                    if($count[0]['COUNT(id)'] >= 1) {
                                                        echo "<a href='delete_copy.php' class='btn btn-danger'>Delete</a>";
                                                    }
                                                ?>
                                            </div>
                                        </form>
                                        <?php
                                        if(isset($_POST['copySubmit'])){
                                          
                                            $config                = $_POST['copyRight'];
                                            $copyRight             = $_POST['copyRightValue'];
                                            $admin_id              = 1;
                                            $site->setSettingC($copyRight,$admin_id,$config);
                                        }
                                        ?>
                                    </div>
                                    
                                </div>

<?php
}
?>
<?php
include('partials/footer_admin.php');
?>