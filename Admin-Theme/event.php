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
?>    

<div class="row">
<div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                    Event Panel
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Title Event</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="title" placeholder="Text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Body</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="body" id="editor1" rows="9" placeholder="Content..." class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Start Event Time</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="time" id="text-input" name="STime" placeholder="Text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">End Event Time</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="time" id="text-input" name="ETime" placeholder="Text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Event Date</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="text-input" name="date" placeholder="Text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Event Location</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="location" placeholder="Text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Alt Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="altImg" placeholder="Text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Title Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="titleImg" placeholder="Text" class="form-control">
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
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm" name="submit">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                            </div>
                                        </form>
                                        <?php
                                        if(isset($_POST['submit'])){
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


                                            $title                  = $_POST['title'];
                                            $body                   = $_POST['body'];
                                            $STime                  = $_POST['STime'];
                                            $ETime                  = $_POST['ETime'];
                                            $date                   = $_POST['date'];
                                            $location               = $_POST['location'];
                                            $alt                    = $_POST['altImg'];
                                            $titleImg               = $_POST['titleImg'];
                                            // $admin_id               = 1;
                                            $media->setMedia($alt , $fileDestination, $titleImg);
                                            $event->setEvent($admin_id,$title,$body,$STime,$ETime,$date,$location);
                                        }
                                        ?>
                                    </div>
                                    
                                </div>
                                </div>
                                </div>
<div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Admin ID</th>
                                    <th>Media Image</th>
                                    <th>Event Title</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($event->getEvent() as $gEvent) {
                                echo "<tr>";
                                echo "<td>". $gEvent['id'] . "</td>";
                                echo "<td>". $gEvent['admin_id'] . "</td>";
                                echo "<td><img src='{$gEvent['path']}'></td>";
                                echo "<td>". $gEvent['title'] . "</td>";
                                echo "<td>". $gEvent['start_event_time'] . "</td>";
                                echo "<td>". $gEvent['end_event_time'] . "</td>";
                                echo "<td>". $gEvent['date'] . "</td>";
                                echo "<td>". $gEvent['event_location'] . "</td>";
                                echo "<td><a href='edit_event.php?id={$gEvent['id']}' class='btn btn-primary'>Edit</a></td>";
                                echo "<td><a href='delete_event.php?id={$gEvent['id']}' class='btn btn-danger'>Delete</a></td>";
                                echo "</tr>";
                            }

                            ?>
                            </tbody>
                        </table>
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