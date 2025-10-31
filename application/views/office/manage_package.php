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
                            <th width="45%">Description</th>
                            <th width="15%">Cover Photo</th>
                            <th width="15%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($packages as $package): ?>
                          <tr>
                            <td><?php echo $package['package_name']; ?></td>
                            <td>
                              <?php echo $package['description']; ?>
                              <br>
                              <strong>Categories:</strong>
                              <?php
                              $category_names = array();
                              $category_ids = json_decode($package['categories'], true);
                              if (!empty($category_ids)) {
                                  foreach ($category_ids as $cat_id) {
                                      $this->db->where('id', $cat_id);
                                      $category = $this->db->get('categories')->row();
                                      if ($category) {
                                          $category_names[] = $category->name;
                                          echo '&nbsp;<span class="badge badge-primary">' . $category->name . '</span>';
                                      }
                                  }
                              }
                             
                              ?>
                              <?//php echo implode(', ', $category_names); ?>
                            </td>
                            <td align="center">
                              <?php if (!empty($package['cover_photo'])): ?>
                                <img src="<?php echo base_url($package['cover_photo']); ?>" alt="Cover Photo" width="100">
                              <?php else: ?>
                                No Photo
                              <?php endif; ?>
                            </td>
                            <td>
                              <a href="<?php echo base_url('office/edit_package/' . $package['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                              <a href="<?php echo base_url('office/delete_package/' . $package['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this package?');">Delete</a>
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