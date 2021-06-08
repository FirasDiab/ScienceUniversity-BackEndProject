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
    
include('../entity/news.php');
$news = new News();
?>
<div class="row">
 <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        Create News
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return newsForm()" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Title</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="title" placeholder="Text" class="form-control" maxlength="255" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Body</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="body" id="editor1" rows="9" placeholder="Content..." class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Publish Date</label>
                                                </div>
                                                <input type="date" name="date" id="myDate" required>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" name="create_news" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="errorHandle" style="color: red;"> </div>
                                </div>
                                </div>
                                </div>
                                <?php
                                    if(isset($_POST['create_news'])){
                                        $title              = $_POST['title'];
                                        $body               = $_POST['body'];
                                        $date               = $_POST['date'];
                                        // $admin_id              = 1;
                                        $news->setNews($title  , $body , $date , $admin_id);
                                    }
                                ?>

<div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Admin ID</th>
                                    <th>title</th>
                                    <!-- <th>body</th> -->
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    foreach($news->getNews() as $new) {
                                        echo "<tr>";
                                        echo "<td>" . $new['id'] . "</td>";
                                        echo "<td>" . $new['admin_id'] . "</td>";
                                        echo "<td>" . $new['title'] . "</td>";
                                        echo "<td><a href='edit_news.php?id={$new['id']}' class='btn btn-primary'>Edit</a></td>";
                                        echo "<td><a href='delete_news.php?id={$new['id']}' class='btn btn-danger'>Delete</a></td>";
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
include('partials/footer_admin.php');
?>
<?php 
} else { echo "<h1>Please Login</h1>";
}
?>