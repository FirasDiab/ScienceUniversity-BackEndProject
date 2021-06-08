<?php
include('public_header.php');
include('../entity/event.php');
$event   = new Event();
?>
    <link rel="stylesheet" href="style/events.css" />
    <link rel="stylesheet" href="style/main-pages.css" />

<main>
    <h1 class="heading-title">events</h1>
      <div class="events-container">
        <div class="container">
          <div class="card-deck">
          <?php
              foreach($event->getEvent() as $gEvent) {
                                                $st = strtotime($gEvent['start_event_time']);
                                                $st1 = date("h:ia" , $st);
                                                $et = strtotime($gEvent['end_event_time']);
                                                $et1 = date("h:ia" , $et);
                                                $date = strtotime($gEvent['date']);
                                                $day = date("d" , $date);
                                                $month = date("m" , $date);
                                                $monthName = date("F", mktime(0, 0, 0, $month, 10));
            ?>
            <div class="card">
              <img src="img/events1.png" class="card-img-top" alt="Postgraduate Drop-in Evening Ajloun Event">
              <div class="events-date">
                <img src="img/events-date.svg"/>
                <div class="number-date"><?php echo $day; ?></div>
                <div class="month-date"><?php echo $monthName; ?></div>
              </div>
              <div class="card-body">
                <span class="events-header"><?php echo $st1 . " - " . $et1; ?></span><span><?php echo $gEvent['event_location'] ?></span>
                <a href=<?php echo "event_page.php?id={$gEvent['id']}" ?>><h5 class="card-title sub-titles"><?php echo $gEvent['title'] ?></h5></a>
                <p class="card-text events-desc"><?php echo $gEvent['body'] ?></p>
                <a href=<?php echo "event_page.php?id={$gEvent['id']}" ?>><button class="section-buttons float-right">learn more</button></a>
              </div>
            </div>
            <?php
              }
            ?>
         </div>
        </div>
      </div>  
      <!-- Events Section End Here-->
  </main>

<?php
include('public_footer.php');
?>