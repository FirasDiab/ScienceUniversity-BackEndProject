<?php
include('../entity/course.php');
$course = new Course();
$id = $_GET['id'];
$course->deleteCourse($id);
?>