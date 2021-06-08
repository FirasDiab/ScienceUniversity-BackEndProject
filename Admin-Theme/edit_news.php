<?php
include('partials/header_admin.php');
// session_start();
?>
<?php
if(isset($_SESSION['admin']) || isset($_SESSION['superAdmin'])){
    if(isset($_SESSION['admin'])) {
        $admin_id = $_SESSION['admin']['id'];
    } else {
        $admin_id = $_SESSION['superAdmin']['id'];
    }
include('../entity/news.php');
$news = new News();
$id = $_GET['id'];
?>
<div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        Edit News
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-horizontal" onsubmit="return editNews()">
                                        <?php $new = $news->getNewsById($id)[0]?>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Title</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="title" placeholder="Text" class="form-control" maxlength="255" value = "<?php echo $new['title'] ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Body</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="body" id="editor1" rows="9" placeholder="" class="form-control"> <?php echo $new['body'] ?> </textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Publish Date</label>
                                                </div>
                                                <input type="date" name="date" id="myDate" placeholder="12/12/2020" value="<?php echo $new['published'] ?>">
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" name="update_news" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                            </div>
                                        </form>
                                        <?php
                                        if(isset($_POST['update_news'])){
                                            $id                 = $_GET['id'];
                                            $title              = $_POST['title'];
                                            $body               = $_POST['body'];
                                            $date              = $_POST['date'];
                                            // $admin_id              = 1;
                                            $news->updateNews($id,$title,$body,$date,$admin_id);
                                        }
                                        ?>
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