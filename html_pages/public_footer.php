
<!-- Footer -->
<footer class="page-footer font-small indigo bottom-footer">
  
      <!-- Footer Links -->
      <div class="container text-left text-md-left footer">
        <!-- Grid row -->
        <div class="row">
          <!-- Grid column -->
          <?php
          $foot = 0;
          foreach($menu->getMenuFooter() as $gMenuF){
            // print_r($gMenuF);
            $id = $gMenuF['id'];
            $count = $menu->countSub($id);
            // print_r($count);
            if($gMenuF['title'] == "USING OUR SITE"){
              continue;
            }
          ?>
          <div class="col-lg-3 col-md-6 mx-auto border-footer">
          <?php if($count[0]['COUNT(id)'] > 4) {?>
            <!-- Links -->
            <ul class="list-unstyled first-col">
              <li class="titles-footer">
              <?php echo $gMenuF['title'] ?>
              </li>
              <?php
              foreach($menu->getSubMenuFooter($id) as $gSubMenu){
              ?>
              <li>
                <a href="inner_page.php?id=<?php echo $gSubMenu['id'] ?>"><?php echo $gSubMenu['title']; ?></a>
              </li>
              <?php
              }
              ?>
            </ul>
            <?php } elseif($count[0]['COUNT(id)'] == 4) { 
              // if($foot > 1) {
              //   continue;
              // }
              // $foot++;
              ?>
              <ul class="list-unstyled">
              <li class="titles-footer">
              <?php echo $gMenuF['title']; ?>
              </li>
              <?php
              foreach($menu->getMenuFooterPublic($id) as $gSubMenu){
              ?>
              <li>
                <a href="inner_page.php?id=<?php echo $gSubMenu['id'] ?>"><?php echo $gSubMenu['title']; ?></a>
              </li>
              
              <?php
              }
              ?>
              <li class="titles-footer mg-30">
                USING OUR SITE
              </li>
              <li>
                <a href="#!">Accessibilty</a>
              </li>
              <li class="free-margin">
                <a href="#!">Freedom of Information</a>
              </li>
              <!-- <li class="titles-footer mg-30">
                USING OUR SITE
              </li> -->
              <li>
                <?php  ?>
                <?php } elseif($count[0]['COUNT(id)'] < 3) { ?>
                  <li class="titles-footer">
                  <?php echo $gMenuF['title']; ?>
                  </li>
                  <?php
                  foreach($menu->getSubMenuFooter($id) as $gSubMenu){
                  ?>
                  <li>
                    <a href="#!"><?php echo $gSubMenu['title']; ?></a>
                  </li>
                  <li class="titles-footer mg-30">
                USING OUR SITE
              </li>
              <li>
                <a href="#!">Accessibilty</a>
              </li>
              <li class="free-margin">
                <a href="#!">Freedom of Information</a>
              </li>
                  <?php
                  }
                  ?>
                  <ul>
                  <?php 
                } ?>

            <!-- </ul> -->
          </div>
          <!-- Grid column -->
          <hr class="clearfix w-100 d-md-none horizontal-line">
          <?php
          }
          ?>
          <!-- Grid column -->
          <hr class="clearfix w-100 d-md-none horizontal-line">
          <!-- Grid column -->
          <div class="col-lg-3 col-md-6 mx-auto border-footer">
            <a href="index.php"><img src="../img/footer-logo.png" title="Sciences University" alt="<?php echo $gLogo[0]['alt_image']; ?>"/></a>
            <!-- Links -->
            <h5 class="font-weight-bold text-uppercase last-footer-title">FOLLOW US</h5>
            <span class="icons align-middle">
              <a href="https://www.linkedin.com/" title="linkedin"><i class="fab fa-linkedin-in"></i ></a>
              <a href="https://www.youtube.com/" title="youtube"><i class="fab fa-youtube"></i></a>
              <a href="https://www.instagram.com/" title="instagram"><i class="fab fa-instagram"></i></a>
              <a href="https://www.twitter.com/" title="twitter"><i class="fab fa-twitter"></i></a>
              <a href="https://www.facebook.com/" title="facebook"><i class="fab fa-facebook-f"></i></a>
            </span>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
      <!-- Footer Links -->
      <!-- Copyright -->
      <div class="footer-copyright text-center copy-right"><p>&copy; <script>document.write(new Date().getFullYear())</script><?php echo " " . $gCopy[0]['config_value']?> </p>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </body>
  <script src="js/header.js"></script>
  <script src="js/index.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
    if(isset($_SESSION['status_public']) && ($_SESSION['status_public'] != '')){
        ?>
        
        <script>
        swal({
      title: "<?php echo $_SESSION['status_public'] ?>",
      icon: "success",
      button: "Done",
    });
        </script>
    <?php
    unset($_SESSION['status_public']);
    }
    ?>
</html>