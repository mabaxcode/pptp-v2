<div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Manage Packages</h3>
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
                  <a href="#">Website Management</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Manage Packages</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Package List</h4>
                        <a
                        class="btn btn-primary btn-round ms-auto"
                        href="<?php echo base_url('office/add_package'); ?>"
                      >
                        <i class="fa fa-plus"></i>
                        Add Package
                        </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th width="20%">Package Name</th>
                            <th width="50%">Description</th>
                            <th width="20%">Cover Photo</th>
                            <th width="10%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Tiger Nixon</td>
                            <td>Experience breathtaking sunsets and pristine white-washed villages overlooking the azure Aegean Sea.</td>
                            <td>61</td>
                            <td>$320,800</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>