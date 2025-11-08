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
        <h1>Booking</h1>
        <!-- <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p> -->
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Booking</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Travel Booking Section -->
    <section id="travel-booking" class="travel-booking section">

      <div class="container">

        <div class="row">
          <?php /*
       

          */?>

<form action="<?php echo base_url('booking/submit_booking'); ?>" method="post">

          <div class="col-lg-12">
            <div class="booking-summary">
              <div class="summary-header">
                <h4>My Booking Details</h4>
              </div>

              <div class="summary-content">
                <div class="selected-tour">
                  <img src="<?php echo base_url($package['cover_photo']);?>" alt="Tour" class="img-fluid">
                  <div class="tour-info">
                    <h5>Package Name : <?php echo $package['package_name']; ?></h5>
                    <p><?php echo $package['duration']; ?></p>
                  </div>
                </div>


                <input type="hidden" name="package_id" value="<?php echo $package['id']; ?>">
                <input type="hidden" name="preferred_date" value="<?php echo $booking['preferred_date']; ?>">
                <input type="hidden" name="adults" value="<?php echo $booking['adults']; ?>">
                <input type="hidden" name="children" value="<?php echo $booking['children']; ?>">
                <input type="hidden" name="first_name" value="<?php echo $booking['first_name']; ?>">
                <input type="hidden" name="last_name" value="<?php echo $booking['last_name']; ?>">
                <input type="hidden" name="email" value="<?php echo $booking['email']; ?>">
                <input type="hidden" name="phone" value="<?php echo $booking['phone']; ?>">
                <input type="hidden" name="special_requests" value="<?php echo $booking['special_requests']; ?>">
                <input type="hidden" name="card_number" value="<?php echo $booking['card_number']; ?>">
                <input type="hidden" name="card_name" value="<?php echo $booking['card_name']; ?>">
                <input type="hidden" name="card_expiry" value="<?php echo $booking['card_expiry']; ?>">
                <input type="hidden" name="card_cvv" value="<?php echo $booking['card_cvv']; ?>">



                <div class="booking-details">
                  <div class="detail-row">
                    <!-- <span>Details : </span> -->
                    <!-- <span><?php echo $package['description']; ?></span>  -->
                  </div>
                  <?php /*
                  <?php foreach ($package_items as $item) { ?>
                  <div class="inclusion-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span><?php echo $item['item']; ?></span>
                  </div> <br>
                  <?php } ?>
                  */?>
                  <div class="detail-row">
                    <span>Check-in Date:</span>
                    <span><?php echo dmy($booking['preferred_date']); ?></span>
                  </div>
                  <div class="detail-row">
                    <span>Number of Adults:</span>
                    <span><?php echo $booking['adults']; ?></span>
                  </div>
                  <div class="detail-row">
                    <span>Number of Children:</span>
                    <span><?php echo $booking['children']; ?></span>
                  </div>
                </div>


                <div class="price-breakdown">
                  <h6>Traveler Information</h6>
                  <div class="price-row">
                    <span>First Name</span>
                    <span><?php echo $booking['first_name']; ?></span>
                  </div>

                  
                  <div class="price-row">
                    <span>Last Name</span>
                    <span><?php echo $booking['last_name']; ?></span>
                  </div>
                  <div class="price-row">
                    <span>Email Address</span>
                    <span><?php echo $booking['email']; ?></span>
                  </div>
                  <div class="price-row">
                    <span>Phone Number</span>
                    <span><?php echo $booking['phone']; ?></span>
                  </div>

                </div>


            

                <div class="price-breakdown">
                  <h6>Payment Information</h6>
                  <div class="price-row">
                    <span>Card Number</span>
                    <span><?php echo $booking['card_number']; ?></span>
                  </div>
                  <div class="price-row">
                    <span>Cardholder Name</span>
                    <span><?php echo $booking['card_name']; ?></span>
                  </div>
                  <div class="price-row">
                    <span>Expiry Date</span>
                    <span><?php echo $booking['card_expiry']; ?></span>
                  </div>
                  <div class="price-row">
                    <span>CVV</span>
                    <span><?php echo $booking['card_cvv']; ?></span>
                  </div>
                  <div class="price-total">
                    <span>Total Amount</span>
                    <span>RM<?php echo number_format($package['price'], 2); ?></span>
                  </div>
                </div>

                <div class="payment-security">
                  <div class="security-badges">
                    <i class="bi bi-shield-check"></i>
                    <span>SSL Secured</span>
                  </div>
                  <div class="accepted-cards">
                    <i class="bi bi-credit-card"></i>
                    <span>All major cards accepted</span>
                  </div>
                </div>
              </div>

              <div class="form-actions">
                  <a class="btn btn-primary btn-lg" href="<?php echo base_url('user/bookings'); ?>">
                    <i class="bi bi-arrow-left"></i>
                    Back
</a>
                </div>

            </div>
          </div>


</form>
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

  <script>
    // Calculate end date based on preferred date and package duration
    // document.getElementById('departure-date').addEventListener('change', function() {
    //   var preferredDate = new Date(this.value);
    //   var durationText = "<?php echo $package['duration']; ?>"; // e.g., "3 Days"
    //   var durationDays = parseInt(durationText); // Extract number of days

    //   if (!isNaN(preferredDate.getTime()) && !isNaN(durationDays)) {
    //     var endDate = new Date(preferredDate);
    //     endDate.setDate(endDate.getDate() + durationDays - 1); // Subtract 1 to include start date

    //     var day = ("0" + endDate.getDate()).slice(-2);
    //     var month = ("0" + (endDate.getMonth() + 1)).slice(-2);
    //     var year = endDate.getFullYear();

    //     document.getElementById('end-date').value = year + "-" + month + "-" + day;
    //   } else {
    //     document.getElementById('end-date').value = "";
    //   }
    // });
  </script>

</body>

</html>