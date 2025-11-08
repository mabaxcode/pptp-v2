<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="<?php echo base_url(); ?>" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="<?php echo base_url(); ?>assets2/img/logo.webp" alt=""> -->
        <h1 class="sitename">Pulau Perhentian Travel Package</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?php echo base_url(); ?>" <?php if($this->uri->segment(2) == ""){ echo 'class="active"'; } ?>>Home</a></li>
          <!-- <li><a href="#">About</a></li> -->
          <!-- <li><a href="destinations.html">Destinations</a></li> -->
          <li><a href="<?php echo base_url('welcome/package'); ?>" <?php if($this->uri->segment(2) == "package"){ echo 'class="active"'; } ?>>Package <?//php echo $this->uri->segment(2); ?></a></li>
          <li><a href="<?php echo base_url('welcome/gallery'); ?>" <?php if($this->uri->segment(2) == "gallery"){ echo 'class="active"'; } ?>>Gallery</a></li>
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
          <?php if($this->session->userdata('user_id')): ?>
            <li><a href="<?php echo base_url('user/bookings'); ?>" <?php if($this->uri->segment(2) == "bookings"){ echo 'class="active"'; } ?>>My Booking</a></li>
            <?php /* <li><a href="#">Welcome, <?php echo ucfirst($this->session->userdata('user_name')); ?></a></li> */ ?>
            <li class="dropdown"><a href="#"><span>Welcome, <?php echo ucfirst($this->session->userdata('user_name')); ?></span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="<?php echo base_url('user/profile'); ?>">Profile</a></li>
              <li><a href="<?php echo base_url('user/change_password_form'); ?>">Change Password</a></li>

              <!-- <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li> -->
            </ul>
          <!-- </li> -->
          <?php endif; ?>
          
          <!-- <li><a href="#">Contact</a></li> -->
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      
    <?php if(!$this->session->userdata('user_id')): ?>
        <a class="btn-getstarted" href="<?php echo base_url('auth/login'); ?>">Login</a>
    <?php else: ?>
        <a class="btn-getstarted" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
    <?php endif; ?>
      

    </div>
  </header>