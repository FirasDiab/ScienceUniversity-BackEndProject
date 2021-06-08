<?php
include('../entity/admin.php');
include('partials/header_admin.php');
$admin = new Admin();
$id = $_GET['id'];
?>

            <h1>Edit Admin </h1>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Admin Form</div>
                    <div class="card-body card-block">
                        <?php $adminD = $admin->getAdminById($id)[0]?>
                        <form action="edit_admin.php?id=<?php echo $adminD['id'] ?>" method="post" onsubmit="return editAdminForm()">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Username</div>
                                    <input type="text" id="adminUser" name="name" class="form-control" value = "<?php echo $adminD['name'] ?>" required>
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <small class="help-block form-text">At least 4 Character</small>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Email</div>
                                    <input type="email" id="adminEmail" name="email" class="form-control" value = "<?php echo $adminD['email'] ?>" required>
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Password</div>
                                    <input type="password" id="adminPassword" name="password" class="form-control" required>
                                    <div class="input-group-addon">
                                        <i class="fa fa-asterisk"></i>
                                    </div>
                                </div>
                                <small class="help-block form-text">The password length must be between 8-32 </small>
                            </div>
                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Role</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="radio1" class="form-check-label ">
                                                                <input type="radio" id="radio1" name="role" value="superAdmin" class="form-check-input"
                                                                <?php 
                                                                    if($adminD['role'] == 'superAdmin'){
                                                                        echo "checked";
                                                                    }
                                                                ?>
                                                                >SuperAdmin
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="radio2" name="role" value="admin" class="form-check-input"
                                                                <?php 
                                                                    if($adminD['role'] == 'admin'){
                                                                        echo "checked";
                                                                    }
                                                                ?>
                                                                >Admin
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" name="update_admin" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </form>
                        <div id="errorHandle" style="color: red;"> </div>
                        <?php
                            if(isset($_POST['update_admin'])){
                                $id             = $_GET['id'];
                                $name           = $_POST['name'];
                                $password       = $_POST['password'];
                                $email          = $_POST['email'];
                                $role           = $_POST['role'];
                                $activity       = 1;
                                $admin->updateAdmin($id,$name,$password,$email,$role,$activity);
                            }
                        ?>
                    </div>
                </div>
            </div>

<?php
include('partials/footer_admin.php');
?>