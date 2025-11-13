<div class="page-inner">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Application Details : 
                    <?php if($application['status'] == 'pending'){ ?>
                    <span class="badge badge-warning"><b>In Review</b></span>
                    <?php } elseif($application['status'] == 'approved'){ ?>
                    <span class="badge badge-success"><b>Approved</b></span>
                    <?php } elseif($application['status'] == 'rejected'){ ?>
                    <span class="badge badge-danger"><b>Rejected</b></span>
                    <?php } ?>
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab-with-icon" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab-icons" data-bs-toggle="pill" href="#v-pills-home-icons" role="tab" aria-controls="v-pills-home-icons" aria-selected="true">
                            <i class="fas fa-user"></i>
                            Personal Information
                            </a>
                            <a class="nav-link" id="v-pills-profile-tab-icons" data-bs-toggle="pill" href="#v-pills-profile-icons" role="tab" aria-controls="v-pills-profile-icons" aria-selected="false">
                            <i class="fas fa-university"></i>
                            Bank Information
                            </a>
                            <a class="nav-link" id="v-pills-bisnes-tab-icons" data-bs-toggle="pill" href="#v-pills-bisnes-icons" role="tab" aria-controls="v-pills-bisnes-icons" aria-selected="false">
                            <i class="fas fa-file"></i>
                                Supporting Documents
                            </a>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="tab-content" id="v-pills-with-icon-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home-icons" role="tabpanel" aria-labelledby="v-pills-home-tab-icons">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th width="40%">Full Name</th>
                                            <td><?php echo htmlspecialchars($user['name']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>IC No.</th>
                                            <td><?php echo htmlspecialchars($application['nric']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td><?php echo htmlspecialchars($application['phone_no']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Company Name</th>
                                            <td><?php echo htmlspecialchars($application['company_name']); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile-icons" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">
                                <table class="table">
                                    <tr>
                                        <th width="40%">Bank Name</th>
                                        <td><?php echo htmlspecialchars($application['bank_name']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Account No.</th>
                                        <td><?php echo htmlspecialchars($application['account_no']); ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="v-pills-bisnes-icons" role="tabpanel" aria-labelledby="v-pills-bisnes-tab-icons">
                                <table class="table">
                                    <tr>
                                        <th width="40%">IC</th>
                                        <td><a href="<?php echo base_url('vendor/view_document/'.$ic_file['id']); ?>" target="_blank"><?php echo htmlspecialchars($ic_file['original_filename']); ?></a></td>
                                    </tr>
                                    <tr>
                                        <th>SSM/Business Certification</th>
                                        <td><a href="<?php echo base_url('vendor/view_document/'.$ssm_file['id']); ?>" target="_blank"><?php echo htmlspecialchars($ssm_file['original_filename']); ?></a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>