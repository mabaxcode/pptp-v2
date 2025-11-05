<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Pulau Perhentian Travel Package</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>assets2/img/favicon.png" rel="icon">
  <link href="<?php echo base_url(); ?>assets2/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?php echo base_url(); ?>assets2/css/main.css" rel="stylesheet">

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
    <div class="page-title dark-background" style="background-image: url(<?php echo base_url(); ?>assets2/img/travel/showcase-11.webp);">
      <div class="container position-relative">
        <h1>Change Password</h1>
        <!-- <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p> -->
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Change Password</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Travel Booking Section -->
    <section id="travel-booking" class="travel-booking section">

      <div class="container">

        <div class="row">
          <div class="col-lg-8">
            <div class="booking-form">

              <form action="<?php echo base_url('user/change_password'); ?>" method="post">

              

                <!-- Step 2: Traveler Information -->
                <div class="booking-step" id="step-2">
                  <div class="step-header">
                    <h3>Change Password</h3>
                    <!-- <p>Password at least 8 characters long</p> -->
                  </div>

                  <!-- success message -->
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                  <!-- error message -->
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                  <div class="step-content">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="first-name">Current Password</label>
                          <input type="password" name="current_password" id="first-name" class="form-control" required="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="email">New Password</label>
                          <input type="password" name="new_password" id="email" class="form-control" required="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="email">Confirm Password</label>
                          <input type="password" name="confirm_password" id="email" class="form-control" required="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary btn-lg">
                    <i class="bi bi-check-circle"></i>
                    Change Password
                    </button>
                </div>
              </form>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="booking-summary">
              <div class="summary-header">
                <h4>Profile Summary</h4>
              </div>

              <div class="summary-content">
                

                <div class="booking-details">
                  <div class="detail-row">
                    <span>Name:</span>
                    <span><?php echo $user['name']; ?></span>
                  </div>
                  <div class="detail-row">
                    <span>Email:</span>
                    <span><?php echo $user['email']; ?></span>
                  </div>
                  <!-- <div class="detail-row">
                    <span>Travelers:</span>
                    <span>2 Adults</span>
                  </div> -->
                </div>

                

                <div class="payment-security">
                  <div class="security-badges">
                    <i class="bi bi-shield-check"></i>
                    <span>Verified Account</span>
                  </div>
                  
                </div>
              </div>

              
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
  <script src="<?php echo base_url(); ?>assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets2/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url(); ?>assets2/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?php echo base_url(); ?>assets2/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets2/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url(); ?>assets2/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?php echo base_url(); ?>assets2/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="<?php echo base_url(); ?>assets2/js/main.js"></script>

</body>

</html>