<?php
include('public_header.php');
include('../entity/news.php');
$news   = new News();
?>
<link rel="stylesheet" href="style/news.css" />

<main>
    <h1>News</h1>  
    <div class="container">
      <h2>Recently</h2>
      <?php
            foreach($news->getNews() as $new) {
            $x = strtotime($new['published']);
         ?>
     <div class="card">
        <div class="card-header">
        <?php echo date("Y-m-d", $x)?>
        </div>
        <div class="card-body">
          <a href=<?php echo "news_pages.php?id={$new['id']}" ?>><h5 class="card-title sub-titles"><?php echo $new['title'] ?></h5></a>
          <p class="card-text"><?php echo $new['body'] ?></p>
          <a href=<?php echo "news_pages.php?id={$new['id']}" ?> class="section-buttons float-right">Read More</a>
        </div>
      </div>
      <?php
            }
      ?>
      </div>
      <h2>Most Popular</h2>
      <div class="row">
      <?php
            foreach($news->getNews() as $new) {
            $x = strtotime($new['published']);
         ?>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <a href=<?php echo "news_pages.php?id={$new['id']}" ?>><h5 class="card-title sub-titles"><?php echo $new['title'] ?></h5></a>
              <p class="card-text"><?php echo $new['body'] ?></p>
              <a href=<?php echo "news_pages.php?id={$new['id']}" ?>><button class="section-buttons float-right">read more</button></a>
            </div>
          </div>
        </div>
        <?php
            }
      ?>
      </div>
    </div>
  </main>