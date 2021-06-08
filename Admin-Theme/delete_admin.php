<?php
include('../entity/admin.php');
$admin = new Admin();
$id = $_GET['id'];
$admin->deleteAdmin($id);
?>