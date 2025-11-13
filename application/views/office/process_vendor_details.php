
<div class="iziModal-content p-4">
    <div class="card-body">
        <div class="card-sub">
            <b><i class="fas fa-user"></i>&nbsp;&nbsp;Personal Information</b>
        </div>
        <div class="row">
            <div class="col-md-4"><strong>Fullname</strong></div>
            <div class="col-md-8 mb-2">: <?php echo strtoupper($user['name']); ?></div>
            <div class="col-md-4"><strong>Email</strong></div>
            <div class="col-md-8 mb-2">: <?php echo $user['email']; ?></div>
            <div class="col-md-4"><strong>IC No.</strong></div>
            <div class="col-md-8 mb-2">: <?php echo $vendor_form['nric']; ?></div>
            <div class="col-md-4"><strong>Phone No.</strong></div>
            <div class="col-md-8 mb-2">: <?php echo $vendor_form['phone_no']; ?></div>
            <div class="col-md-4"><strong>Company Name</strong></div>
            <div class="col-md-8 mb-2">: <?php echo $vendor_form['company_name']; ?></div>
        </div>
        <div class="card-sub">
            <b><i class="fas fa-university"></i>&nbsp;&nbsp;Bank Information</b>
        </div>
        <div class="row">
            <div class="col-md-4"><strong>Bank Name</strong></div>
            <div class="col-md-8 mb-2">: <?php echo strtoupper($vendor_form['bank_name']); ?></div>
            <div class="col-md-4"><strong>Account No.</strong></div>
            <div class="col-md-8 mb-2">: <?php echo $vendor_form['account_no']; ?></div>
        </div>
        <div class="card-sub">
            <b><i class="fas fa-file"></i>&nbsp;&nbsp;Supporting Documents</b>
        </div>
        <div class="row">
            <div class="col-md-4"><strong>IC</strong></div>
            <div class="col-md-8 mb-2">: <a href="<?php echo base_url('office/view_document/'.$ic_file['id']); ?>" target="_blank"><?php echo htmlspecialchars($ic_file['original_filename']); ?></a></div>
            <div class="col-md-4"><strong>SSM/Business Certification</strong></div>
            <div class="col-md-8 mb-2">: <a href="<?php echo base_url('office/view_document/'.$ssm_file['id']); ?>" target="_blank"><?php echo htmlspecialchars($ssm_file['original_filename']); ?></a></div>
        </div>
        <div class="card-sub">
            <b><i class="fas fa-tasks"></i>&nbsp;&nbsp;Application Processing</b>
        </div>
        <div class="row">
            <div class="col-md-4"><strong>Status</strong></div>
            <div class="col-md-8 mb-2">
                :
                <?php if($vendor_form['status'] == 'pending'): ?>
                    <span class="badge bg-warning"><?php echo ucfirst($vendor_form['status']); ?></span>
                <?php elseif($vendor_form['status'] == 'approved'): ?>
                    <span class="badge bg-success"><?php echo ucfirst($vendor_form['status']); ?></span>
                <?php elseif($vendor_form['status'] == 'rejected'): ?>
                    <span class="badge bg-danger"><?php echo ucfirst($vendor_form['status']); ?></span>
                <?php endif; ?>
            </div>
            <div class="col-md-4 mt-4"><strong>Decision</strong></div>
            <div class="col-md-8 mb-2">
                <div class="form-group">
                    <select
                    class="form-select form-control"
                    id="decision"
                    name="decision"
                    >
                    <option value="">Select Decision</option>
                    <option value="approved">Approve</option>
                    <option value="rejected">Reject</option>
                    </select>
                    <p class="text-danger" id="decision-error"></p>
                </div>
                
            </div>
            <div class="col-md-4"><strong>Remark</strong></div>
            <div class="col-md-8 mb-2"><textarea class="form-control" name="remark_decision" rows="2"></textarea><p class="text-danger" id="decision-error"></p></div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-end">
                <button type="button" class="btn btn-primary btn-sm" id="btn-proceed-vendor" data-init="<?php echo $vendor_form['id']; ?>">Proceed</button>
            </div>
        </div>
    </div>
</div>
