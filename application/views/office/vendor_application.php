<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Vendor Applications</h3>
        <ul class="breadcrumbs mb-3">
        <li class="nav-home">
            <a href="#">
            <i class="icon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Home</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Vendor Application</a>
        </li>
        </ul>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="line-home-tab" data-bs-toggle="pill" href="#line-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            Pending Approval
                            <?php if($pending_count > 0): ?>
                                <span class="badge bg-danger"><?php echo $pending_count; ?></span>
                            <?php endif; ?>
                            <!-- <span class="badge bg-warning"><?php echo $pending_count; ?></span> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="line-profile-tab" data-bs-toggle="pill" href="#line-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Approved
                            <!-- <span class="badge bg-primary"><?php echo $approved_count; ?></span> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="line-contact-tab" data-bs-toggle="pill" href="#line-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                            Rejected
                            <!-- <span class="badge bg-danger"><?php echo $rejected_count; ?></span> -->
                        </a>
                    </li>
                </ul>
                <div class="tab-content mt-3 mb-3" id="line-tabContent">
                    <div class="tab-pane fade show active" id="line-home" role="tabpanel" aria-labelledby="line-home-tab">
                        <div class="table-responsive">
                            <table
                                id="basic-datatables"
                                class="display table table-striped table-hover"
                            >
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>IC No.</th>
                                    <th>Company Name</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($applications as $application): ?>
                                <?php $user = get_any_table_row(array('id' => $application['user_id']), 'users'); ?>
                                <tr>
                                    <td><?php echo strtoupper($user['name']); ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $application['nric']; ?></td>
                                    <td><?php echo strtoupper($application['company_name']); ?></td>

                                    <td align="center">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-process-vendor" data-init="<?php echo $application['id']; ?>">Process</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="line-profile" role="tabpanel" aria-labelledby="line-profile-tab">
                        <?php //print_r($approved_applications); ?>
                        <div class="table-responsive">
                            <table
                                id="basic-datatables-approved"
                                class="display table table-striped table-hover"
                            >
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>IC No.</th>
                                    <th>Company Name</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($approved_applications as $approved_application): ?>
                                <?php $user = get_any_table_row(array('id' => $approved_application['user_id']), 'users'); ?>
                                <tr>
                                    <td><?php echo strtoupper($user['name']); ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $approved_application['nric']; ?></td>
                                    <td><?php echo strtoupper($approved_application['company_name']); ?></td>

                                    <td align="center">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-view-vendor" data-init="<?php echo $approved_application['id']; ?>">Details</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="line-contact" role="tabpanel" aria-labelledby="line-contact-tab">
                        <div class="table-responsive">
                            <table
                                id="basic-datatables-rejected"
                                class="display table table-striped table-hover"
                            >
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>IC No.</th>
                                    <th>Company Name</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($rejected_applications as $rejected_application): ?>
                                <?php $user = get_any_table_row(array('id' => $rejected_application['user_id']), 'users'); ?>
                                <tr>
                                    <td><?php echo strtoupper($user['name']); ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $rejected_application['nric']; ?></td>
                                    <td><?php echo strtoupper($rejected_application['company_name']); ?></td>

                                    <td align="center">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-view-vendor" data-init="<?php echo $rejected_application['id']; ?>">Details</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>