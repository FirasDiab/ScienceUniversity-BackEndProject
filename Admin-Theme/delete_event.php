<?php
include('../entity/event.php');
$event = new event();
$id = $_GET['id'];
$event->deleteEvent($id);
?>