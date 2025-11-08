<div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Setting Category</h3>
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
                  <a href="#">Category</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Category List</h4>
                        <button
                        class="btn btn-primary btn-round ms-auto"
                        data-bs-toggle="modal"
                        data-bs-target="#addRowModal"
                      >
                        <i class="fa fa-plus"></i>
                        Add New Category
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th width="1%">No.</th>
                            <th width="20%">Category Name</th>
                            <th width="15%" style="text-align: right;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;foreach ($categories as $category): ?>
                              <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $category['name']; ?></td>
                                <td style="text-align: right;">
                                  <!-- edit using modal -->
                                  <button
                                    class="btn btn-sm btn-warning edit-category"
                                    data-id="<?php echo $category['id']; ?>"
                                    data-name="<?php echo $category['name']; ?>"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editCategoryModal"
                                  >Edit</button>
                                  <a href="<?php echo base_url('office/delete_category/' . $category['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
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
                              <span class="fw-light"> Category </span>
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
                            
                            <form id="form-add-category">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Category Name</label>
                                    <input
                                      id="category_name"
                                      name="category_name"
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
                              id="addRowButton"
                              class="btn btn-primary add-category"
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
                      id="editCategoryModal"
                      tabindex="-1"
                      role="dialog"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-0">
                            <h5 class="modal-title">
                              <span class="fw-mediumbold"> Edit</span>
                              <span class="fw-light"> Category </span>
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
                            
                            <form id="form-edit-category">
                              <input type="hidden" id="edit_category_id" name="category_id" />
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Category Name</label>
                                    <input
                                      id="edit_category_name"
                                      name="category_name"
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


                    
