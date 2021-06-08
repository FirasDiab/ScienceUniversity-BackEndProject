<?php
include('public_header.php');
include('../entity/news.php');
$id = $_GET['id'];
$news = new News();
$gNews = $news->getNewsById($id);
?>
<link rel="stylesheet" href="style/sub-pages.css" />
<main>
    <div class="container">
      <h1 class="title"><?php echo $gNews[0]['title'] ?></h1>
      <p><?php echo $gNews[0]['body'] ?></p>
    </div>
  </main>

<?php
include('public_footer.php');
?>