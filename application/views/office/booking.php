<div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Booking</h3>
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
                  <a href="#">Menu</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Booking</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">All Booking List</h4>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class=" table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th width="1%">No.</th>
                            <th width="20%">Package</th>
                            <th width="5%">Check In</th>
                            <th width="20%">Cutomer Details</th>
                            <th width="10%">Booking Date</th>
                            <th width="2%">Status</th>
                            <th width="5%" style="text-align: center;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;foreach ($bookings as $booking): ?>
                              <?php
                                $package_detail = get_any_table_row(['id' => $booking['package_id']],'packages');  
                              ?>
                              <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $package_detail['package_name']; ?></td>
                                <td><?php echo dmy($booking['check_in_date']); ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4"><strong>Fullname</strong></div>
                                        <div class="col-md-8">: <?php echo $booking['first_name']; ?>&nbsp;<?php echo $booking['last_name']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"><strong>Phone No.</strong></div>
                                        <div class="col-md-8">: <?php echo $booking['phone']; ?></div>
                                    </div>
                                </td>
                                <td><?php echo dmy($booking['created_at']); ?></td>
                                <td><span class="badge badge-success">Confirmed</span></td>
                                <td style="text-align: center;">
                                  <a href="javascript:void(0);" class="btn btn-sm btn-primary view-booking-detail" data-initid="<?php echo $booking['id']; ?>" >View</a>
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

          

          

        




                    
