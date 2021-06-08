<?php
include('../entity/news.php');
$news = new News();
$id = $_GET['id'];
$news->deleteNews($id);
?>