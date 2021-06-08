<?php
include('../entity/slider.php');
$slider = new Slider();
$id = $_GET['id'];
$slider->deleteSlider($id);
?>