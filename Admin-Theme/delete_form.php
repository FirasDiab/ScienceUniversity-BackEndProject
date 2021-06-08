<?php
include('../entity/form.php');
$form = new Form();
$id = $_GET['id'];
$form->deleteForm($id);
?>