<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Pulau Perhentian Travel Package</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="<?php echo base_url();?>assets2/img/favicon.png" rel="icon">
  <link href="<?php echo base_url();?>assets2/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();?>assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?php echo base_url();?>assets2/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: TravelTime
  * Template URL: https://bootstrapmade.com/traveltime-bootstrap-travel-template/
  * Updated: Jul 28 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="booking-page">

  <?php $this->load->view('header'); ?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(<?php echo base_url();?>assets2/img/travel/showcase-11.webp);">
      <div class="container position-relative">
        <h1>My Booking</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">My Booking</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Travel Booking Section -->
    <section id="travel-booking" class="travel-booking section">

      <div class="container">

        <div class="row">
          <div class="col-lg-12">
            <div class="booking-form">

              <form action="forms/booking.php" class="php-email-form">

                


                <!-- Step 3: Additional Options -->
                <div class="booking-step" id="step-3">
                  <div class="step-header">
                    <h3>My Booking List</h3>
                    <p>This is your booking list</p>
                  </div>

                  <div class="step-content">
                    <div class="add-ons-grid">
                    
                    <?php foreach($bookings as $val){ ?>
                    <a href="<?php echo base_url('user/booking_details/'.$val['id']); ?>">
                    <div class="add-on-item">
                        <div class="add-on-header">
                          <label for="travel-insurance">
                            <i class="bi bi-shield-check"></i>
                            <?php $package = get_any_table_row(array('id' => $val['package_id']), 'packages'); ?>
                            <strong><?php echo strtoupper($package['package_name']); ?></strong>
                            <span class="price">Chek-In :  <?php echo dmy($val['check_in_date']); ?></span>
                          </label>
                        </div>
                        <p><b>Booking Date :  <?php echo dmy($val['created_at']); ?> </b></p>
                      </div>
                    </a>
                    <?php } ?>
                    </div>
                  </div>
                </div>

           
              </form>
            </div>
          </div>

         
        </div>

      </div>

    </section><!-- /Travel Booking Section -->

  </main>

  <?php $this->load->view('footer'); ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url();?>assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets2/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url();?>assets2/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?php echo base_url();?>assets2/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets2/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url();?>assets2/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?php echo base_url();?>assets2/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="<?php echo base_url();?>assets2/js/main.js"></script>

</body>

</html>