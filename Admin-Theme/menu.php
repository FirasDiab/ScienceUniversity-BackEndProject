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
include('../entity/menu.php');
$menu = new Menu();
// $gMenu = $menu->getMenu();
?>    
 <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        Create Menu
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Title</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="title" placeholder="Text" class="form-control" maxlength="60" required>
                                                    <small class="help-block form-text">Max Character 60</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">path</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="path" placeholder="Text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label" required>Radios</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="radio1" class="form-check-label">
                                                                <input type="radio" id="radio1" name="type" value="header" class="form-check-input" checked>Header
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="radio2" name="type" value="footer" class="form-check-input">Footer
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="header-select" class=" form-control-label">Header</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <select name="header-select" id="multiple-select" multiple="" class="form-control">
                                                        <?php
                                                        foreach($menu->getMenuHeader() as $gMenu) {
                                                            
                                                        ?>
                                                        <option value="<?php echo $gMenu['id'] ?>"><?php echo $gMenu['title'] ?></option>
                                                        <?php
                                                        
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="footer-select" class=" form-control-label">Footer</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <select name="footer-select" id="multiple-select" multiple="" class="form-control">
                                                        <?php
                                                        foreach($menu->getMenuFooter() as $gMenu) {
                                                            
                                                        ?>
                                                        <option value="<?php echo $gMenu['id'] ?>"><?php echo $gMenu['title'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="row form-group mt-4 ml-1">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Body</label>
                                                </div>
                                                <div class="col col-md-12 mt-4 ml-5">
                                                    <textarea name="body" id="editor1" rows="9" placeholder="Content..." class="form-control mt-4"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                                <?php
                                    if(isset($_POST['submit'])){
                                        $title                  = $_POST['title'];
                                        $path                   = $_POST['path'];
                                        $type                   = $_POST['type'];
                                        $body                   = $_POST['body'];
                                        $sub_header             = $_POST['header-select'];
                                        $sub_footer             = $_POST['footer-select'];
                                        $menu->checkMenu($title  , $path , $type ,$body, $admin_id,$sub_header,$sub_footer);
                                    }
                                ?>
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