<?php
include('../entity/achi.php');
$achi = new Achi();
$id = $_GET['id'];
$achi->deleteAchi($id);
?>