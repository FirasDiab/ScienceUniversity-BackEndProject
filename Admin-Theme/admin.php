<?php
include('partials/header_admin.php');
?>

<?php
if(isset($_SESSION['admin']) || isset($_SESSION['superAdmin'])){
    if(isset($_SESSION['admin'])) {
        $admin_id = $_SESSION['admin']['id'];
        $checkRole = $_SESSION['admin']['role'];
    } else {
        $admin_id = $_SESSION['superAdmin']['id'];
        $checkRole = $_SESSION['superAdmin']['role'];
    }
include('../entity/admin.php');
$admin = new Admin();
?>

<h1 style="margin-bottom : 50px;">Admin Panel</h1>
<?php ?>
<?php 
if($checkRole == 'superAdmin') {
?>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Create Admin</div>
                    <div class="card-body card-block">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return adminForm()">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Username</div>
                                    <input type="text" id="adminUser" name="name" class="form-control" required>
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                    <small class="help-block form-text">At least 4 Character</small>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Email</div>
                                    <input type="email" id="adminEmail" name="email" class="form-control" required>
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
                                                    <div class="form-check" required>
                                                        <div class="radio">
                                                            <label for="radio1" class="form-check-label ">
                                                                <input type="radio" id="radio1" name="role" value="superAdmin" class="form-check-input">SuperAdmin
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="radio2" name="role" value="admin" class="form-check-input" checked>Admin
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" name="create_admin" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </form>
                        <div id="errorHandle" style="color: red;"> </div>
                        <?php
                            if(isset($_POST['create_admin'])){
                                $name           = $_POST['name'];
                                $password       = $_POST['password'];
                                $email          = $_POST['email'];
                                $role           = $_POST['role'];
                                $activity       = 1;
                                $admin->setAdmin($name,$password,$email,$role,$activity);
                            }
                        ?>
                    </div>
                </div>
            </div>
<?php } ?>
            <div class="row">
                <div class="col-lg-9">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Admin ID</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>role</th>
                                    <th>activity</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php
                                    foreach($admin->getAdmin() as $adminD) {
                                        echo "<tr>";
                                        echo "<td>" . $adminD['id'] . "</td>";
                                        echo "<td>" . $adminD['name'] . "</td>";
                                        echo "<td>" . $adminD['email'] . "</td>";
                                        echo "<td>" . $adminD['role'] . "</td>";
                                        echo "<td>" . $adminD['activity'] . "</td>";
                                        if($admin_id == $adminD['id']){
                                            echo "<td><a href='edit_admin.php?id={$adminD['id']}' class='btn btn-primary'>Edit</a></td>";
                                        } else {
                                            echo "<td>" . "</td>";
                                        }
                                        if( ($admin_id != $adminD['id']) && ($adminD['role'] != 'superAdmin')  && ($checkRole != 'admin')){ 
                                            echo "<td><a href='delete_admin.php?id={$adminD['id']}' class='btn btn-danger'>Delete</a></td>";
                                        } else {
                                            echo "<td>" . "</td>";
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                
                          
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>

                <!-- </div>
                </div>
                </div> -->
        <!-- </main> -->
<?php
include('partials/footer_admin.php');
?>
<?php } else {
     header("Location:../Admin-Theme/login.php");
     }
     ?>
