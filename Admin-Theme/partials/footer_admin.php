                       
              </div>         
              </div>         
              </div>
                    </main>         
                       
                       <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2020 Toyzee . All rights reserved. </p>
                                </div>
                            </div>
                        </div>
                   
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
    if(isset($_SESSION['status']) && ($_SESSION['status'] != '')){
        ?>
        
        <script>
        swal({
      title: "<?php echo $_SESSION['status'] ?>",
      icon: "success",
      button: "Done",
    });
        </script>
    <?php
    unset($_SESSION['status']);
    }
    ?>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script src="js/validation.js"></script>

</body>

</html>
<!-- end document-->

<?php
if(isset($conn)){
    $conn = null;
} 
?>