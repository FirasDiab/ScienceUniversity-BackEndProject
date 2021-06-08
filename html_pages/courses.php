<?php
include('public_header.php');
include('../entity/course.php');
$id = $_GET['id'];
$course = new Course();
$gCourse = $course->getCourseById($id);
?>
<link rel="stylesheet" href="style/main-pages.css" />
<main>
    <h1 class="heading-title"><?php echo $gCourse[0]['title'] ?></h1>
    <div class="container">
      <p><?php echo $gCourse[0]['body'] ?></p>
    </div>
  </main>

<?php
include('public_footer.php');
?>