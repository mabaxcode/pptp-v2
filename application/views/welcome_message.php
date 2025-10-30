<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Pulau Perhentian Travel Package</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <!-- <link href="<?php echo base_url(); ?>assets2/img/favicon.png" rel="icon"> -->
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

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="<?php echo base_url(); ?>assets2/img/logo.webp" alt=""> -->
        <h1 class="sitename">Pulau Perhentian Travel Package</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#" class="active">Home</a></li>
          <li><a href="#">About</a></li>
          <!-- <li><a href="destinations.html">Destinations</a></li> -->
          <li><a href="#">Package</a></li>
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

    <!-- Travel Hero Section -->
    <section id="travel-hero" class="travel-hero section dark-background">

      <div class="container">

        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="content">
              <h1>Discover Pulau Perhentian with Us</h1>
              <p class="lead">Explore breathtaking destinations and create unforgettable memories with our expertly crafted package.</p>
              <div class="d-flex flex-wrap gap-3 mt-4">
                <a href="#" class="btn btn-primary">Start Exploring</a>
                <a href="#" class="btn btn-outline-light">View Package</a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 mt-5 mt-lg-0">
            <div class="booking-form">
              <form action="" method="post">
                <div class="row gy-3">
                  <!-- <div class="col-md-12">
                    <label for="destination">Destination</label>
                    <input type="text" name="destination" id="destination" class="form-control" placeholder="Where do you want to go?" required="">
                  </div> -->
                  <div class="col-md-6">
                    <label for="check-in">Check In</label>
                    <input type="date" name="checkin" id="check-in" class="form-control" required="">
                  </div>
                  <div class="col-md-6">
                    <label for="check-out">Check Out</label>
                    <input type="date" name="checkout" id="check-out" class="form-control" required="">
                  </div>
                  <div class="col-md-6">
                    <label for="adults">Adults</label>
                    <input type="number" name="adults" id="adults" class="form-control" min="1" max="20" value="2" required="">
                  </div>
                  <div class="col-md-6">
                    <label for="children">Children</label>
                    <input type="number" name="children" id="children" class="form-control" min="0" max="20" value="0">
                  </div>
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-accent w-100 mt-3">Search</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Travel Hero Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="why-us section">

      <div class="container">

        <!-- Main Content Grid -->
        <div class="content-grid">
          <div class="row g-4 align-items-stretch">

            <!-- About Section -->
            <div class="col-lg-6">
              <div class="about-block">
                <div class="about-header">
                  <span class="section-badge">About Us</span>
                  <h3>Creating Unforgettable Travel Experiences</h3>
                </div>
                <div class="about-content">
                  <p>Welcome to Pulau Perhentian Travel Package — your trusted travel partner to one of Malaysia’s most beautiful island destinations!</p>
                  <p>We specialize in helping travelers experience the magic of Pulau Perhentian, offering carefully curated travel packages that combine comfort, adventure, and authentic island charm. From crystal-clear waters and white sandy beaches to stunning coral reefs, we’re here to make your island dream a reality.</p>

                  <div class="feature-list">
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Comfortable Resorts – We partner with the best-rated resorts in Pulau Perhentian to ensure your stay is relaxing and worry-free.</span>
                    </div>
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>All-Inclusive Travel Packages – Enjoy convenient packages that cover accommodation, boat transfers, and exciting island activities.</span>
                    </div>
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Delicious Local & Western Cuisine – Savor fresh island flavors at our selected resort restaurants.</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Image Showcase -->
            <div class="col-lg-6">
              <div class="image-showcase">
                <div class="main-image">
                  <img src="<?php echo base_url(); ?>assets2/img/travel/showcase-7.webp" alt="Travel Adventure" class="img-fluid rounded-3">
                  <div class="overlay-badge">
                    <div class="badge-content">
                      <i class="bi bi-award-fill"></i>
                      <div class="badge-text">
                        <strong>Award Winner</strong>
                        <span>Best Travel Package 2025</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="floating-card">
                  <img src="<?php echo base_url(); ?>assets2/img/travel/misc-8.webp" alt="Happy Travelers" class="img-fluid rounded-2">
                  <div class="card-content">
                    <div class="rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <span>4.9/5</span>
                    </div>
                    <p>"Amazing experience!"</p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Main Content Grid -->

        <!-- Why Choose Us Section -->
        <div class="why-choose-wrapper">
          <div class="section-header text-center">
            <span class="section-badge">Why Choose Us</span>
            <h3>What Makes Us Different</h3>
            <!-- <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet consectetur adipisci velit</p> -->
          </div>

          <div class="features-container">
            <div class="row g-4">

              <div class="col-lg-3 col-md-6">
                <div class="feature-box">
                  <div class="feature-icon-wrapper">
                    <div class="feature-icon">
                      <i class="bi bi-compass"></i>
                    </div>
                  </div>
                  <h4>Exciting Snorkeling & Diving Trips</h4>
                  <p>Discover the colorful underwater world of Pulau Perhentian with our guided adventures.</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6">
                <div class="feature-box">
                  <div class="feature-icon-wrapper">
                    <div class="feature-icon">
                      <i class="bi bi-heart-fill"></i>
                    </div>
                  </div>
                  <h4>Breathtaking Island Experience</h4>
                  <p>Wake up to turquoise waters, golden beaches, and unforgettable sunsets.</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6">
                <div class="feature-box">
                  <div class="feature-icon-wrapper">
                    <div class="feature-icon">
                      <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                  </div>
                  <h4>All-Inclusive <br> Packages</h4>
                  <p>Enjoy a smooth experience with accommodation, boat transfers, and activities all arranged for you.</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6">
                <div class="feature-box">
                  <div class="feature-icon-wrapper">
                    <div class="feature-icon">
                      <i class="bi bi-globe-americas"></i>
                    </div>
                  </div>
                  <h4>Friendly Local <br> Support</h4>
                  <p>Our team is always ready to help you plan, book, and enjoy your island holiday hassle-free.</p>
                </div>
              </div>

            </div>
          </div>
        </div><!-- End Why Choose Us Section -->

      </div>

    </section><!-- /Why Us Section -->

    <!-- Featured Destinations Section -->
    <section id="featured-destinations" class="featured-destinations section">

      <!-- Section Title -->
      <div class="container section-title">
        <h2>Featured Destinations</h2>
        <div><span>Check Our</span> <span class="description-title">Featured Package</span></div>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6">
            <div class="destination-card">
              <div class="image-wrapper">
                <img src="<?php echo base_url(); ?>assets2/img/travel/img1.jpg" alt="Destination" class="img-fluid">
                <div class="overlay">
                  <div class="badge">Popular</div>
                </div>
              </div>
              <div class="content">
                <h4>Package 1</h4>
                <p>Experience breathtaking sunsets and pristine white-washed villages overlooking the azure Aegean Sea.</p>
                <div class="features">
                  <span class="feature-tag">Romantic</span>
                  <span class="feature-tag">Luxury</span>
                </div>
                <div class="card-footer">
                  <div class="tours-count">12 Tours Available</div>
                  <a href="#" class="explore-btn">
                    Explore <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div><!-- End Destination Card -->

          <div class="col-lg-4 col-md-6">
            <div class="destination-card">
              <div class="image-wrapper">
                <img src="<?php echo base_url(); ?>assets2/img/travel/img1.jpg" alt="Destination" class="img-fluid">
                <div class="overlay">
                  <div class="badge featured">Editor's Pick</div>
                </div>
              </div>
              <div class="content">
                <h4>Package 2</h4>
                <p>Discover tropical paradise with ancient temples, lush rice terraces, and world-class beaches.</p>
                <div class="features">
                  <span class="feature-tag">Adventure</span>
                  <span class="feature-tag">Culture</span>
                </div>
                <div class="card-footer">
                  <div class="tours-count">18 Tours Available</div>
                  <a href="#" class="explore-btn">
                    Explore <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div><!-- End Destination Card -->

          <div class="col-lg-4 col-md-6">
            <div class="destination-card">
              <div class="image-wrapper">
                <img src="<?php echo base_url(); ?>assets2/img/travel/img1.jpg" alt="Destination" class="img-fluid">
                <div class="overlay">
                  <div class="badge new">New</div>
                </div>
              </div>
              <div class="content">
                <h4>Package 3</h4>
                <p>Trek through ancient Incan ruins and witness one of the world's most spectacular archaeological sites.</p>
                <div class="features">
                  <span class="feature-tag">Adventure</span>
                  <span class="feature-tag">History</span>
                </div>
                <div class="card-footer">
                  <div class="tours-count">8 Tours Available</div>
                  <a href="#" class="explore-btn">
                    Explore <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div><!-- End Destination Card -->

          <div class="col-lg-4 col-md-6">
            <div class="destination-card">
              <div class="image-wrapper">
                <img src="<?php echo base_url(); ?>assets2/img/travel/img1.jpg" alt="Destination" class="img-fluid">
              </div>
              <div class="content">
                <h4>Package 4</h4>
                <p>Immerse yourself in traditional Japanese culture with beautiful temples, gardens, and historic districts.</p>
                <div class="features">
                  <span class="feature-tag">Culture</span>
                  <span class="feature-tag">Peaceful</span>
                </div>
                <div class="card-footer">
                  <div class="tours-count">15 Tours Available</div>
                  <a href="#" class="explore-btn">
                    Explore <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div><!-- End Destination Card -->

          <div class="col-lg-4 col-md-6">
            <div class="destination-card">
              <div class="image-wrapper">
                <img src="<?php echo base_url(); ?>assets2/img/travel/img1.jpg" alt="Destination" class="img-fluid">
              </div>
              <div class="content">
                <h4>Package 5</h4>
                <p>Adventure awaits in pristine mountain landscapes with world-class skiing and hiking opportunities.</p>
                <div class="features">
                  <span class="feature-tag">Adventure</span>
                  <span class="feature-tag">Nature</span>
                </div>
                <div class="card-footer">
                  <div class="tours-count">22 Tours Available</div>
                  <a href="#" class="explore-btn">
                    Explore <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div><!-- End Destination Card -->

          <div class="col-lg-4 col-md-6">
            <div class="destination-card">
              <div class="image-wrapper">
                <img src="<?php echo base_url(); ?>assets2/img/travel/img1.jpg" alt="Destination" class="img-fluid">
              </div>
              <div class="content">
                <h4>Package 6</h4>
                <p>Escape to paradise with crystal-clear waters, overwater bungalows, and unparalleled luxury.</p>
                <div class="features">
                  <span class="feature-tag">Luxury</span>
                  <span class="feature-tag">Honeymoon</span>
                </div>
                <div class="card-footer">
                  <div class="tours-count">6 Tours Available</div>
                  <a href="#" class="explore-btn">
                    Explore <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div><!-- End Destination Card -->

        </div>

        <!-- <div class="destinations-cta">
          <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
              <h3>Can't Decide Where to Go?</h3>
              <p>Our travel experts are here to help you find the perfect destination based on your preferences, budget, and travel style.</p>
              <div class="cta-buttons">
                <a href="destinations.html" class="btn btn-primary">View All Destinations</a>
                <a href="contact.html" class="btn btn-outline">Talk to Expert</a>
              </div>
            </div>
          </div>
        </div> -->

      </div>

    </section><!-- /Featured Destinations Section -->

    

    <!-- Testimonials Home Section -->
    <section id="testimonials-home" class="testimonials-home section">

      <!-- Section Title -->
      <div class="container section-title">
        <h2>Testimonials</h2>
        <div><span>What Our Customers</span> <span class="description-title">Are Saying</span></div>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>A wonderful experience from start to finish! Everything was so well-organized — from the boat transfer to the resort stay. The team made our trip to Pulau Perhentian so easy and memorable!</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Amira L</h3>
                      <h4>Kuala Lumpur</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <!-- <img src="<?php echo base_url(); ?>assets2/img/person/person-m-9.webp" class="img-fluid testimonial-img" alt=""> -->
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Best island trip ever! The snorkeling package was amazing. We saw turtles and colorful corals! Definitely booking again next year.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Daniel & Sarah</h3>
                      <h4>Singapore</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <!-- <img src="<?php echo base_url(); ?>assets2/img/person/person-f-5.webp" class="img-fluid testimonial-img" alt=""> -->
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->



          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Home Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section">

      <div class="container">

        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <h2>Ready to Start Your Next Adventure?</h2>
            <p>Discover breathtaking destinations, create unforgettable memories, and explore the world with our expertly crafted travel packages. From exotic beaches to mountain peaks, your perfect journey awaits.</p>
            <div class="cta-buttons">
              <a href="#" class="btn-primary">Explore</a>
              <!-- <a href="tours.html" class="btn-secondary">Plan Your Trip</a> -->
            </div>
          </div>
        </div>

        <div class="row mt-5">
          <div class="col-lg-3 col-md-6">
            <div class="feature-item text-center">
              <div class="icon">
                <i class="bi bi-globe"></i>
              </div>
              <h4>Comfortable Resorts</h4>
              <p>Known for their quality, cleanliness, and island hospitality</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="feature-item text-center">
              <div class="icon">
                <i class="bi bi-shield-check"></i>
              </div>
              <h4>Safe &amp; Secure</h4>
              <p>Travel with confidence with our safety guarantee</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="feature-item text-center">
              <div class="icon">
                <i class="bi bi-headset"></i>
              </div>
              <h4>24/7 Support</h4>
              <p>Round-the-clock assistance whenever you need it</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="feature-item text-center">
              <div class="icon">
                <i class="bi bi-percent"></i>
              </div>
              <h4>Best Prices</h4>
              <p>Competitive rates with exclusive deals and offers</p>
            </div>
          </div>
        </div>

        <!-- <div class="stats-section">
          <div class="row text-center">
            <div class="col-lg-3 col-md-6">
              <div class="stat-item">
                <span class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="15000" data-purecounter-duration="2"></span>
                <span class="stat-label">Happy Travelers</span>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="stat-item">
                <span class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="127" data-purecounter-duration="2"></span>
                <span class="stat-label">Countries Covered</span>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="stat-item">
                <span class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="98" data-purecounter-duration="2"></span>
                <span class="stat-label">Satisfaction Rate</span>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="stat-item">
                <span class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="2"></span>
                <span class="stat-label">Years Experience</span>
              </div>
            </div>
          </div>
        </div> -->

      </div>

    </section><!-- /Call To Action Section -->

  </main>

  <footer id="footer" class="footer position-relative dark-background">

    <div class="container">
      <div class="row gy-5">

        <div class="col-lg-4">
          <div class="footer-content">
            <a href="index.html" class="logo d-flex align-items-center mb-4">
              <span class="sitename">TravelTime</span>
            </a>
            <p class="mb-4">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae. Donec velit neque auctor sit amet aliquam vel ullamcorper sit amet ligula.</p>

            <div class="newsletter-form">
              <h5>Stay Updated</h5>
              <form action="forms/newsletter.php" method="post" class="php-email-form">
                <div class="input-group">
                  <input type="email" name="email" class="form-control" placeholder="Enter your email" required="">
                  <button type="submit" class="btn-subscribe">
                    <i class="bi bi-send"></i>
                  </button>
                </div>
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Thank you for subscribing!</div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-6">
          <div class="footer-links">
            <h4>Company</h4>
            <ul>
              <li><a href="#"><i class="bi bi-chevron-right"></i> About</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Careers</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Press</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Blog</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Contact</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-2 col-6">
          <div class="footer-links">
            <h4>Solutions</h4>
            <ul>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Digital Strategy</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Cloud Computing</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Data Analytics</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> AI Solutions</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Cybersecurity</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="footer-contact">
            <h4>Get in Touch</h4>
            <div class="contact-item">
              <div class="contact-icon">
                <i class="bi bi-geo-alt"></i>
              </div>
              <div class="contact-info">
                <p>2847 Maple Avenue<br>Los Angeles, CA 90210<br>United States</p>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-icon">
                <i class="bi bi-telephone"></i>
              </div>
              <div class="contact-info">
                <p>+1 (555) 987-6543</p>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-icon">
                <i class="bi bi-envelope"></i>
              </div>
              <div class="contact-info">
                <p>contact@example.com</p>
              </div>
            </div>

            <div class="social-links">
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-twitter-x"></i></a>
              <a href="#"><i class="bi bi-linkedin"></i></a>
              <a href="#"><i class="bi bi-youtube"></i></a>
              <a href="#"><i class="bi bi-github"></i></a>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="copyright">
              <p>© <span>Copyright</span> <strong class="px-1 sitename">Pulau Perhentian Travel Package</strong> <span>All Rights Reserved</span></p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="footer-bottom-links">
              <a href="#">Privacy Policy</a>
              <a href="#">Terms of Service</a>
              <a href="#">Cookie Policy</a>
            </div>
            <div class="credits">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you've purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
              <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>

  </footer>

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