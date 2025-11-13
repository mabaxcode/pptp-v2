
<style>
.is-invalid {
    border-color: #dc3545 !important;
    background-color: #ffe6e6;
}
</style>

<div class="page-inner">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Vendor Registration Application Form</h4>
            </div>

            <div class="card-body">
                <form id="wizardForm" enctype="multipart/form-data">
                    <!-- Nav Tabs -->
                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-pills-icons justify-content-center" id="wizardTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="step1-tab" data-bs-toggle="pill" href="#step1" role="tab" aria-controls="step1" aria-selected="true">
                                <i class="fas fa-user"></i>
                                Personal Information
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="step2-tab" data-bs-toggle="pill" href="#step2" role="tab" aria-controls="step2" aria-selected="false">
                            <i class="fas fa-university"></i>
                                Bank Information
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="step3-tab" data-bs-toggle="pill" href="#step3" role="tab" aria-controls="step3" aria-selected="false">
                                <i class="fas fa-file"></i>
                                Supporting Documents
                            </a>
                        </li>
                    </ul>

                    <!-- Tab Contents -->
                    <div class="tab-content mt-3 mb-3" id="wizardTabContent">
                        <!-- Step 1 -->
                        <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">
                            <h5 class="card-title">Personal Information</h5>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" value="<?php echo $user['name']; ?>" name="fullname" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="<?php echo $user['email']; ?>" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>NRIC</label>
                                <input type="number" class="form-control" name="nric" required>
                            </div>
                            <div class="form-group">
                                <label>Phone No.</label>
                                <input type="number" class="form-control" name="phone_no" required>
                            </div>
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" class="form-control" name="company_name" style="text-transform: uppercase;" required>
                            </div>
                            <button type="button" class="btn btn-primary next-step float-end">Next</button>
                        </div>

                        <!-- Step 2 -->
                        <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
                            <h5 class="card-title"> Bank Information</h5>
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input type="text" class="form-control" name="bank_name" style="text-transform: uppercase;" required>
                            </div>
                            <div class="form-group">
                                <label>Account No.</label>
                                <input type="number" class="form-control" name="account_no" required>
                            </div>
                            <button type="button" class="btn btn-secondary prev-step">Previous</button>
                            <button type="button" class="btn btn-primary next-step float-end">Next</button>
                        </div>

                        <!-- Step 3 -->
                        <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step3-tab">
                            <h5 class="card-title"> Business Information</h5>

                            <!-- <p>Review your information and click Submit.</p> -->
                            <div class="form-group">
                                <label>IC</label>
                                <input type="file" class="form-control" name="ic_file" required>
                            </div>

                            <div class="form-group">
                                <label>SSM/Business Certification</label>
                                <input type="file" class="form-control" name="ssm_file" required>
                            </div>

                            <button type="button" class="btn btn-secondary prev-step">Previous</button>
                            <button type="submit" class="btn btn-success float-end">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
var base_url_x = "<?php echo base_url(); ?>";
$(document).ready(function() {
    // Next button
    // $('.next-step').click(function() {
    //     let nextTab = $('.nav-pills .nav-link.active').parent().next('li').find('a');
    //     nextTab.removeClass('disabled');
    //     nextTab.tab('show');
    // });

    // required fields validation before moving to next step
    $('.next-step').click(function() {
        // Find the current active tab
        let currentTab = $('.tab-pane.active');
        let isValid = true;

        // Validate all required fields inside the current tab
        currentTab.find('input[required], select[required], textarea[required]').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid'); // Add Bootstrap error style
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (!isValid) {
            // Show alert or message if validation fails
            // alert('Please fill in all required fields before proceeding.');
            $.notify({
            	icon: 'icon-bell',
            	title: 'Alert',
            	message: 'Please fill in all required fields before go to the next.',
            },{
            	type: 'danger',
            	placement: {
            		from: "top",
            		align: "right"
            	},
            	time: 1000,
            });
            return; // Stop moving to the next step
        }

        // If valid, go to next tab
        let nextTab = $('.nav-pills .nav-link.active').parent().next('li').find('a');
        nextTab.removeClass('disabled');
        nextTab.tab('show');
    });


    // Previous button
    $('.prev-step').click(function() {
        let prevTab = $('.nav-pills .nav-link.active').parent().prev('li').find('a');
        prevTab.tab('show');
    });

    // Optional: Prevent clicking inactive tabs
    $('.nav-pills a').on('click', function(e) {
        if ($(this).hasClass('disabled')) {
            e.preventDefault();
            return false;
        }
    });

    // Initially disable all tabs except first
    $('.nav-pills .nav-link').not('.active').addClass('disabled');

    // Form submit
    // $('#wizardForm').on('submit', function(e) {
    //     e.preventDefault();
    //     // You can handle AJAX submission here
    //     // var formData = $('#wizardForm').serialize();
    //      var formData = new FormData(this);
    //     $.ajax({
    //         type: "POST",
    //         url: base_url_x + 'vendor/submit_vendor_application',
    //         data: formData,
    //         async: true,
    //         dataType: 'json',
    //         success: function(data) {
    //             console.log(data);

    //             if (data.status === 'error') {
    //                 $.notify({
    //                     icon: 'icon-close',
    //                     title: 'Error',
    //                     message: data.message,
    //                 },{
    //                     type: 'danger',
    //                     placement: {
    //                     from: "top",
    //                     align: "right"
    //                     },
    //                     time: 1000,
    //                 });
    //                 return;
    //             }
    //             $.notify({
    //                 icon: 'icon-bell',
    //                 title: 'Notification',
    //                 message: data.message,
    //                 },{
    //                 type: 'secondary',
    //                 placement: {
    //                     from: "top",
    //                     align: "right"
    //                 },
    //                 time: 1000,
    //             });
    //             // set timer to reload page after 1 second
    //             setTimeout(function() {
    //                 location.reload();
    //             }, 1000);
                
    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             console.log(textStatus, errorThrown);
    //         }
    //     });
    // });

    $('#wizardForm').on('submit', function(e) {
        e.preventDefault();

        // Use FormData to include files
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: base_url_x + 'vendor/submit_vendor_application',
            data: formData,
            processData: false, // prevent jQuery from converting data
            contentType: false, // prevent jQuery from overriding content type
            async: true,
            dataType: 'json',
            success: function(data) {
                console.log(data);

                if (data.status === 'error') {
                    $.notify({
                        icon: 'icon-close',
                        title: 'Error',
                        message: data.message,
                    },{
                        type: 'danger',
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        time: 1000,
                    });
                    return;
                }

                $.notify({
                    icon: 'icon-bell',
                    title: 'Notification',
                    message: data.message,
                },{
                    type: 'secondary',
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    time: 1000,
                });

                // Reload page after 1 second
                setTimeout(function() {
                    location.reload();
                }, 1000);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});
</script>
