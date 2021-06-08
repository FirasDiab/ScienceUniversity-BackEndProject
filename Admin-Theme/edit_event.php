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
include('../entity/event.php');
include('../entity/media.php');
$event = new Event();
$media = new Media();
$id = $_GET['id'];
$gEvent  = $event->getEventById($id);

?>


<div class="row">
<div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                    Edit Event
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Title Event</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="title" placeholder="Text" class="form-control" value="<?php echo $gEvent[0]['title'] ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Body</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="body" id="textarea-input" rows="9" placeholder="Content..." class="form-control"><?php echo $gEvent[0]['body'] ?></textarea>
                                                </div>
                                            </div>
                                            <?php 
                                                $st = strtotime($gEvent[0]['start_event_time']);
                                                $st1 = date("h:ia" , $st);
                                                echo $st1;
                                                ?>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Start Event Time</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="time" id="text-input" name="STime" placeholder="Text" class="form-control" value="<?php echo $st1;?>">
                                                </div>
                                            </div>
                                            <?php 
                                                $et = strtotime($gEvent[0]['end_event_time']);
                                                $et1 = date("h:ia" , $et);
                                                echo $et1;
                                                ?>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">End Event Time</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="time" id="text-input" name="ETime" placeholder="Text" class="form-control" value="<?php echo $gEvent[0]['ETime'] ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Event Date</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="text-input" name="date" placeholder="Text" class="form-control" value="<?php echo $gEvent[0]['date'] ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Event Location</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="location" placeholder="Text" class="form-control" value="<?php echo $gEvent[0]['event_location'] ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Alt Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="altImg" placeholder="Text" class="form-control" value="<?php echo $gEvent[0]['alt_image'] ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Title Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="titleImg" placeholder="Text" class="form-control" value="<?php echo $gEvent[0]['imgTitle'] ?>">
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
                                            echo "<img src='{$gEvent[0]['path']}'>";
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
                                                $id                     = $_GET['id'];
                                                $title                  = $_POST['title'];
                                                $body                   = $_POST['body'];
                                                $STime                  = $_POST['STime'];
                                                $ETime                  = $_POST['ETime'];
                                                $date                   = $_POST['date'];
                                                $location               = $_POST['location'];
                                                $alt                    = $_POST['altImg'];
                                                $titleImg               = $_POST['title'];
                                                // $admin_id               = 1;
                                                $media->setMedia($alt , $fileDestination, $titleImg);
                                                $event->updateEvent($id,$admin_id,$title,$body,$STime,$ETime,$date,$location);
                                            } else {
                                                $id                     = $_GET['id'];
                                                $media_id               = $gEvent[0]['media_id'];
                                                $title                  = $_POST['title'];
                                                $body                   = $_POST['body'];
                                                $STime                  = $_POST['STime'];
                                                $ETime                  = $_POST['ETime'];
                                                $date                   = $_POST['date'];
                                                $location               = $_POST['location'];
                                                $alt                    = $_POST['altImg'];
                                                $titleImg               = $_POST['title'];
                                                // $admin_id               = 1;
                                                $media->updateMedia($media_id,$alt, $titleImg);
                                                $event->updateEventWithOutImage($id,$admin_id,$title,$body,$STime,$ETime,$date,$location);
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