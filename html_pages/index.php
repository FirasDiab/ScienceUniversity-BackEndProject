<?php
include('public_header.php');
include('../entity/slider.php');
include('../entity/course.php');
include('../entity/news.php');
include('../entity/achi.php');
include('../entity/event.php');
include('../entity/form.php');

$slider = new Slider();
$course = new Course();
$news   = new News();
$achi   = new Achi();
$event  = new Event();
$form   = new Form();
?>

    <main>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active circ"></li>
        <?php $count = 1 ?>
        <?php foreach($slider->getSliderPublic() as $gSlider): ?>
        <?php if($count == count($slider->getSlider())) break; ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?= $count++ ?>" class="circ"></li>
          <?php endforeach; ?>
          <!-- <li data-target="#carouselExampleIndicators" data-slide-to="" class="circ"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="" class="circ"></li> -->
        </ol>
        <div class="carousel-inner">
        <?php $count = 0 ?>
      <?php foreach($slider->getSliderPublic() as $gSlider): ?>
        <?php $gSlider['id'];?> 
        <div class="carousel-item <?= $count++ == 1 ? 'active' : '' ?> container-img" id="carouselExampleIndicators" >
          <img src="<?php echo $gSlider['path'] ?>" style="max-width: 1908px; max-height:748.6px; " class="d-block w-100" class="d-block w-100" alt="<?php echo $gSlider['alt_image'] ?>">
          <div class="inside-hero"><p title="<?php echo $gSlider['title'] ?>"><?php echo $gSlider['body'] ?></p></div>
          <div class="after-slider">
          <?php echo $gSlider['body'] ?>
          </div>
        </div>
        <?php endforeach; ?>

        </div>
        <a class="carousel-control-prev arrow-width" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon arrow" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon arrow" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!-- Slider Section End Here-->
      <div class="container">
        <div class="news-images-section">
          <div class="row">
            <div class="col-lg-6">
              <div class="row first-row-img">
                  <?php

                  $count = 0;
                    foreach($course->getCoursePublic() as $courseF) {
                  ?>
                  <div class="col-md-6">
                    <div class="title-and-img news-img1 text-center">
                      <div class="news-sm">
                        <a href=<?php echo "courses.php?id={$courseF['id']}" ?> > <img src="<?php echo $courseF['path'] ?>" style="max-width: 254.5px; max-height:263px; " id="newsImage<?php echo $count ?>" class="news-images" alt="<?php echo $courseF['alt_image'] ?> "/></a>
                        <div class="title-for-img" id="newsimg<?php echo $count ?>"><a href=<?php echo "courses.php?id={$courseF['id']}" ?> > <?php echo $courseF['title'] ?></a></div>
                      </div>
                    </div>
                  </div>
                  <?php 
                  $count++;
                   } 
                   
                   ?>
              </div>
            </div>
            <!-- Course Section End Here-->
            <div class="col-lg-6 news-section">
              <div class="news">
                <a href="news.php" class="for-events-news-word"><h2 class="news-word main-titles">News</h2></a>
                <?php 
                  foreach($news->getNewsPublic() as $new) {
                    $x = strtotime($new['published']);
                ?>
                <p class="date"><?php echo date("Y-m-d", $x)?></p>
                <a href=<?php echo "news_pages.php?id={$new['id']}" ?>><p class="sub-titles"><?php echo $new['title'] ?></p></a>
                <p class="paragraph"><?php echo $new['body'] ?></p>
                <div class="section-buttons">
                  <a href=<?php echo "news_pages.php?id={$new['id']}" ?>><button class="float-right section-buttons">read more</button></a>
                </div>
                <hr>
                <?php 
                  }
                ?>
              </div>
            </div>
          </div>
        </div>  
      </div>
      <!-- News Section End Here-->
      <div class="records">
        <div class="container">
          <div class="cont-records">
            <div class="row text-center">
              <?php
                 foreach($achi->getAchiPublic() as $ach) {
              ?>
              <div class="col-lg-4">
                <div>
                  <img src="<?php echo $ach['path'] ?>" style="max-width: 100px; max-height:100px; "/>
                  <div class="number-records" id="nine"><?php echo $ach['number'] ?></div>
                  <div class="records-sentence">
                    <h3><?php echo $ach['body'] ?></h3>
                  </div>
                </div>
              </div>
              <hr class="clearfix w-100 d-lg-none horizontal-line"/>
              <?php 
                 }
              ?>
            </div>
          </div>
        </div>
      </div> 
      <!-- Records Section End Here-->
      <a href="events.php" class="for-events-news-word"><h2 class="events-word main-titles">Events</h2></a>
      <div class="events-container">
        <div class="container">
          <div class="card-deck">
            <?php
              foreach($event->getEventPublic() as $gEvent) {
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
              <img src="<?php echo $gEvent['path'] ?>" style="max-width: 348px; max-height:211; min-height:153px; " class="card-img-top" alt="Postgraduate Drop-in Evening Ajloun Event">
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
      <div class="bk-apply">
        <div class="container">
          <div class="row">
            <div class="col-12 apply-desc">
              ADMISSIONS ARE NOW OPEN FOR 2017/2018 INTAKE
            </div>
          </div>
          <div class="row">
            <div class="col-12 cont-apply-btn text-center">
              <a href="#"><button class="apply-btn-bg" ><span>apply now</span></button></a>
            </div>
          </div>
        </div>
      </div>
      <!-- Apply Section End Here-->
      <div class="contact-form">
        <div class="container">
          <div class="row">
            <div class="col-1"></div>
            <div class="col-10 cont-form">
              <h2>Get in touch</h2>
              <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                  <form id="contact-form" name="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Full Name" maxlength="100" required>
                            </div>
                            <p class="text-danger" id="nameValidation">Invalid Name - minimum 3 characters</p>
                        </div>
                        <!--Grid column-->
                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Phone Number" maxlength="15"  required>
                            </div>
                            <p class="text-danger" id="numberValidation">Invalid Mobile</p>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" maxlength="255"  required>
                            </div>
                            <p class="text-danger" id="emailValidation">Invalid Email</p>
                        </div>
                    </div>
                    <!--Grid row-->
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-md-12">
    
                            <div class="md-form">
                                <textarea type="text" id="message" name="message" rows="7" class="form-control md-textarea" placeholder="Message" required></textarea>
                            </div>
                            <p class="text-danger" id="msgValidation">Must be less Than 255 Character</p>
                        </div>
                    </div>
                    <!--Grid row-->
                    <div class="center-on-small-only text-center cont-btn-form">
                      <a><button class=" submit-btn form-btn" id="submitForm" onclick="contactForm()" name="submit">Submit</button></a>
                  </div>
                </form>
                <?php
                                    if(isset($_POST['submit'])){
                                        $name                 = $_POST['name'];
                                        $mobile               = $_POST['mobile'];
                                        $email                = $_POST['email'];
                                        $message              = $_POST['message'];
                                        $form->setForm($name  , $mobile , $email , $message);
                                    }
                                ?>
                <div class="status"></div>
                </div>
                <div class="col-1"></div>
              </div>
            </div>
            <div class="col-1"></div>
          </div>
        </div>
      </div>
      <!--Form Section End Here-->
    </main>
    <!-- Main end here-->

<?php
include('public_footer.php');

?>
   