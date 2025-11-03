<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Tour Details - TravelTime Bootstrap Template</title>
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

   <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="<?php echo base_url(); ?><?php echo base_url(); ?>assets22/img/logo.webp" alt=""> -->
        <h1 class="sitename">Pulau Perhentian Travel Package</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><a href="#">About</a></li>
          <!-- <li><a href="destinations.html">Destinations</a></li> -->
          <li><a href="<?php echo base_url('welcome/package'); ?>">Package</a></li>
          <li><a href="#">Gallery</a></li>
          <!-- <li><a href="blog.html">Blog</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>More Pages</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="destination-details.html">Destination Details</a></li>
              <li><a href="tour-details.html">Tour Details</a></li>
              <li><a href="booking.html">Booking</a></li>
              <li><a href="testimonials">Testimonials</a></li>
              <li><a href="faq.html">Frequently Asked Questions</a></li>
              <li><a href="blog-details.html">Blog Details</a></li>
              <li><a href="terms.html">Terms</a></li>
              <li><a href="privacy.html">Privacy</a></li>
              <li><a href="404.html">404</a></li>
            </ul>
          </li> -->
          <!-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li> -->
          <li><a href="#">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="index.html#about">Login</a>

    </div>
  </header>

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
                <a href="#booking" class="btn-reserve">Book Now</a>
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

          <div class="timeline-wrapper">
            <div class="timeline-item">
              <div class="timeline-marker">
                <span class="day-number">01</span>
              </div>
              <div class="timeline-content">
                <div class="day-header">
                  <h3>Roman Grandeur</h3>
                  <span class="location">Rome</span>
                </div>
                <p>Arrival at Rome Fiumicino Airport with private transfer to your centrally located boutique hotel. Evening aperitivo walking tour through Trastevere, discovering hidden local gems and authentic Roman cuisine at a family-owned trattoria.</p>
                <div class="day-features">
                  <span class="feature-tag">Hotel Del Greco</span>
                  <span class="feature-tag">Welcome Dinner</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Inclusions Overview -->
        <div class="inclusions-overview">
          <div class="row">
            <div class="col-lg-6">
              <div class="included-section">
                <h3>Package Includes</h3>
                <div class="inclusion-list">
                  <div class="inclusion-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>9 nights boutique hotel accommodation</span>
                  </div>
                  <div class="inclusion-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Daily breakfast and 4 specialty dinners</span>
                  </div>
                  <div class="inclusion-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Private transfers and high-speed rail</span>
                  </div>
                  <div class="inclusion-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Expert local guides and art historians</span>
                  </div>
                  <div class="inclusion-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Skip-the-line museum entries</span>
                  </div>
                  <div class="inclusion-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Curated cultural experiences</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

       

        <!-- Visual Gallery -->
        <div class="visual-gallery">
          <h2>Photo Gallery</h2>
          <div class="gallery-grid">
            <div class="gallery-piece large">
              <a href="<?php echo base_url(); ?>assets2/img/travel/destination-4.webp" class="glightbox">
                <img src="<?php echo base_url(); ?>assets2/img/travel/destination-4.webp" alt="Italian Countryside" class="img-fluid" loading="lazy">
              </a>
            </div>
            <div class="gallery-piece">
              <a href="<?php echo base_url(); ?>assets2/img/travel/destination-5.webp" class="glightbox">
                <img src="<?php echo base_url(); ?>assets2/img/travel/destination-5.webp" alt="Historic Architecture" class="img-fluid" loading="lazy">
              </a>
            </div>
            <div class="gallery-piece">
              <a href="<?php echo base_url(); ?>assets2/img/travel/destination-6.webp" class="glightbox">
                <img src="<?php echo base_url(); ?>assets2/img/travel/destination-6.webp" alt="Coastal Views" class="img-fluid" loading="lazy">
              </a>
            </div>
            <div class="gallery-piece">
              <a href="<?php echo base_url(); ?>assets2/img/travel/tour-8.webp" class="glightbox">
                <img src="<?php echo base_url(); ?>assets2/img/travel/tour-8.webp" alt="Cultural Experience" class="img-fluid" loading="lazy">
              </a>
            </div>
            <div class="gallery-piece">
              <a href="<?php echo base_url(); ?>assets2/img/travel/tour-9.webp" class="glightbox">
                <img src="<?php echo base_url(); ?>assets2/img/travel/tour-9.webp" alt="Local Cuisine" class="img-fluid" loading="lazy">
              </a>
            </div>
            <div class="gallery-piece medium">
              <a href="<?php echo base_url(); ?>assets2/img/travel/tour-10.webp" class="glightbox">
                <img src="<?php echo base_url(); ?>assets2/img/travel/tour-10.webp" alt="Scenic Landscapes" class="img-fluid" loading="lazy">
              </a>
            </div>
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