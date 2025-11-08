<div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Payment Transaction</h3>
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
                  <a href="#">Payment Transaction</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">All Payment List</h4>
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
                            <th>ID</th>
                            <th width="30%">Payment</th>
                            <th>Amount</th>
                            <th>Pay Date</th>
                            <th>Status</th>
                            <!-- <th style="text-align: center;">Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;foreach ($transactions as $booking): ?>
                              <?php
                                $package_detail = get_any_table_row(['id' => $booking['package_id']],'packages');  
                              ?>
                              <tr>
                                <th>#<?php echo $booking['id'] ?></th>
                                <td>
                                <button
                                class="btn btn-icon btn-round btn-success btn-sm me-2"
                              >
                                <i class="fa fa-check"></i>
                              </button>
                              Payment from <b><?php echo strtoupper($booking['first_name']); ?> <?php echo strtoupper($booking['last_name']); ?></b>
                                </td>
                                <td>RM<?php echo number_format($package_detail['price'],2); ?></td>
                                <td><?php echo dmy($booking['created_at']); ?></td>
                                <td><span class="badge badge-success">Completed</span></td>
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

          

          

        




                    
