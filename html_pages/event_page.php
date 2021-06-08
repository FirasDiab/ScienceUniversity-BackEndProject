<?php
include('public_header.php');
include('../entity/event.php');
$id = $_GET['id'];
$event = new Event();
$gEvent = $event->getEventById($id);
?>
    <link rel="stylesheet" href="style/sub-pages.css" />

<main>
    <div class="container">
      <h1 class="title"><?php echo $gEvent[0]['title'] ?></h1>
      <p> <?php echo $gEvent[0]['body'] ?> </p>
    </div>
  </main>
<?php
include('public_footer.php');
?>