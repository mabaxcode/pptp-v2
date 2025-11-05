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

<body class="tour-details-page">

   <?php $this->load->view('header'); ?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(<?php echo base_url(); ?>assets2/img/travel/showcase-11.webp);">
      <div class="container position-relative">
        <h1>Package Details</h1>
        <!-- <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p> -->
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Package Details</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Travel Tour Details Section -->
    <section id="travel-tour-details" class="travel-tour-details section">

      <div class="container">

        <!-- Hero Banner -->
        <div class="tour-hero">
          <div class="hero-image-wrapper">
            <img src="<?php echo base_url($package['cover_photo']); ?>" alt="Mediterranean Coast Adventure" class="hero-image">
            <div class="hero-overlay">
              <div class="hero-content">
                <?php if(!empty($package['tag'])): ?><span class="tour-type"><?php echo $package['tag']; ?></span><?php endif; ?>
                <h1><?php echo $package['package_name']; ?></h1>
                <!-- <p class="hero-subtitle"><?php echo $package['description']; ?></p> -->
                <div class="hero-stats">
                  <span class="stat-item">
                    <i class="bi bi-clock"></i>
                    <?php echo $package['duration']; ?>
                  </span>
                  <!-- <span class="stat-item">
                    <i class="bi bi-geo-alt"></i>
                    Rome • Florence • Amalfi
                  </span> -->
                  <!-- <span class="stat-item">
                    <i class="bi bi-people"></i>
                    Max 16 Guests
                  </span> -->
                </div> 
              </div>
            </div>
          </div>
        </div>

        <!-- Tour Essence -->
        <div class="tour-essence">
          <div class="row align-items-center">
            <div class="col-lg-8">
              <div class="essence-content">
                <h2><?php echo $package['package_name']; ?></h2>
                <p><?php echo $package['description']; ?></p>

                <!-- <div class="highlights-compact">
                  <div class="highlight-item">
                    <i class="bi bi-palette"></i>
                    <span>Renaissance Art Tours</span>
                  </div>
                  <div class="highlight-item">
                    <i class="bi bi-cup-hot"></i>
                    <span>Culinary Experiences</span>
                  </div>
                  <div class="highlight-item">
                    <i class="bi bi-building"></i>
                    <span>Boutique Accommodations</span>
                  </div>
                  <div class="highlight-item">
                    <i class="bi bi-car-front"></i>
                    <span>Private Transport</span>
                  </div>
                </div> -->
              </div>
            </div>
            <div class="col-lg-4">
              <div class="pricing-card">
                <div class="price-header">
                  <!-- <span class="price-label">From</span> -->
                  <span class="price-amount">RM<?php echo number_format($package['price'], 2); ?></span>
                </div>
                <!-- <p class="price-description">per person, twin accommodation</p> -->
                <a href="<?php echo base_url('booking/application/'.$package['id']); ?>" class="btn-reserve">Book Now</a>
                <!-- <div class="booking-notes">
                  <span><i class="bi bi-shield-check"></i>Free cancellation up to 48h</span>
                </div> -->
              </div>
            </div>
          </div>
        </div>

        <!-- Journey Timeline -->
        <div class="journey-timeline">
          <h2>Itinerary</h2>
          
          <?php foreach ($itinerarys as $itinerary) { ?>
          <div class="timeline-wrapper">
            <div class="timeline-item">
              <div class="timeline-marker">
                <span class="day-number"><?php echo $itinerary['seq']; ?></span>
              </div>
              <div class="timeline-content">
                <div class="day-header">
                  <h3><?php echo $itinerary['title']; ?></h3>
                  <?php /* <span class="location"><?php echo $itinerary['location']; ?></span> */ ?>
                </div>
                <p><?php echo $itinerary['description']; ?></p>
                <!-- <div class="day-features">
                  <span class="feature-tag">Hotel Del Greco</span>
                  <span class="feature-tag">Welcome Dinner</span>
                </div> -->
              </div>
            </div>
          </div>
            <?php } ?>
        </div>

        <!-- Inclusions Overview -->
        <div class="inclusions-overview">
          <div class="row">
            <div class="col-lg-6">
              <div class="included-section">
                <h3>Package Includes</h3>
                <div class="inclusion-list">
                  <?php foreach ($package_items as $item) { ?>
                  <div class="inclusion-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span><?php echo $item['item']; ?></span>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>

       

        <!-- Visual Gallery -->
        <div class="visual-gallery">
          <h2>Photo Gallery</h2>
          <div class="gallery-grid">
            <?php $no = 1; foreach ($gallery as $image) { ?>
              <?php 
                // determine image size class based on position
                if ($no == 1) {
                  $image_size = 'large';
                } else{
                  $image_size = '';
                }
                $no++;
              ?>
            <div class="gallery-piece <?php echo $image_size; ?>">
              <a href="<?php echo base_url($image['image']); ?>" class="glightbox">
                <img src="<?php echo base_url($image['image']); ?>" alt="Italian Countryside" class="img-fluid" loading="lazy">
              </a>
            </div>
            <?php } ?>
          </div>
        </div>

        

      </div>

    </section><!-- /Travel Tour Details Section -->

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