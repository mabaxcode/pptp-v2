<div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Setting Duration Package</h3>
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
                  <a href="#">Setting</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Duration Package</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Duration Package List</h4>
                        <button
                        class="btn btn-primary btn-round ms-auto"
                        data-bs-toggle="modal"
                        data-bs-target="#addRowModal"
                      >
                        <i class="fa fa-plus"></i>
                        Add New Duration
                      </button>
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
                            <th width="20%">Duration Name</th>
                            <th width="15%" style="text-align: right;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;foreach ($durations as $duration): ?>
                              <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $duration['name']; ?></td>
                                <td style="text-align: right;">
                                  <!-- edit using modal -->
                                  <button
                                    class="btn btn-sm btn-warning edit-duration"
                                    data-id="<?php echo $duration['id']; ?>"
                                    data-name="<?php echo $duration['name']; ?>"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editDurationModal"
                                  >Edit</button>
                                  <a href="<?php echo base_url('office/delete_duration/' . $duration['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this duration?');">Delete</a>
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

          <div
                      class="modal fade"
                      id="addRowModal"
                      tabindex="-1"
                      role="dialog"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-0">
                            <h5 class="modal-title">
                              <span class="fw-mediumbold"> New</span>
                              <span class="fw-light"> Duration </span>
                            </h5>
                            <button
                              type="button"
                              class="close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                            >
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            
                            <form id="form-add-duration">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Duration Name</label>
                                    <input
                                      id="duration_name"
                                      name="duration_name"
                                      type="text"
                                      class="form-control"
                                      placeholder="Enter Duration Name"
                                      required
                                    />
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer border-0">
                            <button
                              type="button"
                              id="addRowButton"
                              class="btn btn-primary add-duration"
                            >
                              Add
                            </button>
                            <button
                              type="button"
                              class="btn btn-danger"
                              data-bs-dismiss="modal"
                            >
                              Close
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div
                      class="modal fade"
                      id="editDurationModal"
                      tabindex="-1"
                      role="dialog"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-0">
                            <h5 class="modal-title">
                              <span class="fw-mediumbold"> Edit</span>
                              <span class="fw-light"> Duration </span>
                            </h5>
                            <button
                              type="button"
                              class="close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                            >
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <form id="form-edit-duration">
                              <input type="hidden" id="edit_duration_id" name="duration_id" />
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Duration Name</label>
                                    <input
                                      id="edit_duration_name"
                                      name="duration_name"
                                      type="text"
                                      class="form-control"
                                      placeholder="Enter Category Name"
                                      required
                                    />
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer border-0">
                            <button
                              type="button"
                              id="editRowButton"
                              class="btn btn-primary update-category"
                            >
                              Update
                            </button>
                            <button
                              type="button"
                              class="btn btn-danger"
                              data-bs-dismiss="modal"
                            >
                              Close
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>


                    
