<?php
session_start();
unset($_SESSION['admin']);
unset($_SESSION['status']);

header("Location:../Admin-Theme/login.php");

?>