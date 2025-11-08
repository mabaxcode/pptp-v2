
<div class="modal-container p-4">
    <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="line-home-tab" data-bs-toggle="pill" href="#line-home" role="tab" aria-controls="pills-home" aria-selected="true">Booking Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="line-profile-tab" data-bs-toggle="pill" href="#line-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Customer Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="line-contact-tab" data-bs-toggle="pill" href="#line-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Payment Details</a>
        </li>
    </ul>
    <div class="tab-content mt-3 mb-3" id="line-tabContent">
        <div class="tab-pane fade show active" id="line-home" role="tabpanel" aria-labelledby="line-home-tab">
            <div class="row">
                <div class="col-md-2"><strong>Package Name</strong></div>
                <div class="col-md-10 mb-2">: <?php echo $package['package_name']; ?></div>
                <div class="col-md-2"><strong>Price</strong></div>
                <div class="col-md-10 mb-2">: RM<?php echo number_format($package['price'],2); ?></div>
                <div class="col-md-2"><strong>Check In</strong></div>
                <div class="col-md-10 mb-2">: <?php echo dmy($booking['check_in_date']); ?></div>
                <div class="col-md-2"><strong>Adults</strong></div>
                <div class="col-md-10 mb-2">: <?php echo $booking['adults']; ?></div>
                <div class="col-md-2"><strong>Adults</strong></div>
                <div class="col-md-10 mb-2">: <?php echo $booking['children']; ?></div>
                <div class="col-md-2"><strong>Special Requests : </strong></div>
                <div class="col-md-12"><?php echo $booking['special_requests']; ?></div>
            </div>
        </div>
        <div class="tab-pane fade" id="line-profile" role="tabpanel" aria-labelledby="line-profile-tab">
            <div class="row">
                <div class="col-md-2"><strong>Customer Name</strong></div>
                <div class="col-md-10 mb-2">: <?php echo $booking['first_name']; ?>&nbsp;<?php echo $booking['last_name']; ?></div>
                <div class="col-md-2"><strong>Email</strong></div>
                <div class="col-md-10 mb-2">: <?php echo $booking['email']; ?></div>
                <div class="col-md-2"><strong>Phone No.</strong></div>
                <div class="col-md-10 mb-2">: <?php echo $booking['phone']; ?></div>
            </div>
        </div>
        <div class="tab-pane fade" id="line-contact" role="tabpanel" aria-labelledby="line-contact-tab">
            <div class="row">
                <div class="col-md-2"><strong>Total Payment</strong></div>
                <div class="col-md-10 mb-2">: RM<?php echo number_format($package['price'],2); ?></div>
                <div class="col-md-2"><strong>Status</strong></div>
                <div class="col-md-10 mb-2">: <span class="badge badge-info">Paid</span></div>
            </div>
        </div>
    </div>
</div>
