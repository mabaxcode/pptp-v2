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

<body class="tours-page">

  <?php $this->load->view('header'); ?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(<?php echo base_url(); ?>assets2/img/travel/showcase-11.webp);">
      <div class="container position-relative">
        <h1>Package</h1>
        <p>Explore breathtaking destinations and create unforgettable memories with our expertly crafted package</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Tours</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Travel Tours Section -->
    <section id="travel-tours" class="travel-tours section">

      <div class="container">

       


        <!-- Tours Grid -->
        <div class="row mb-5">
          <div class="col-12">
            <div class="tours-header">
              <h3 class="section-subtitle">All Packages</h3>
              
            </div>

            <div class="tours-grid">

              <?php foreach($packages as $package){ ?>
              <a href="<?php echo base_url('welcome/package_details/'.$package['id']); ?>" class="tour-link">
                <div class="tour-item">
                  <div class="tour-image">
                    <img src="<?php echo base_url($package['cover_photo']); ?>" alt="Norwegian Fjords" class="img-fluid">
                    <?php if($package['tag']): ?><div class="tour-availability"><?php echo $package['tag']; ?></div><?php endif; ?>
                  </div>
                  <div class="tour-details">
                    <h4><?php echo $package['package_name']; ?></h4>
                    <p><?php $desc = $package['description'];
    echo strlen($desc) > 100 ? substr($desc, 0, 100) . '...' : $desc; ?></p>
                    <div class="tour-highlights">
                      <span><i class="bi bi-clock"></i> <?php echo $package['duration']; ?></span>
                      <!-- <span><i class="bi bi-people"></i> Small Group</span> -->
                      <!-- <span><i class="bi bi-star-fill"></i> 4.8</span> -->
                    </div>
                    <div class="tour-pricing">
                      <span class="per">From</span>
                      <span class="price"><?php echo $package['price']; ?></span>
                    </div>
                  </div>
                </div>
              </a>
              <?php } ?>
            </div>
          </div>
        </div>

      


      </div>

    </section><!-- /Travel Tours Section -->

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