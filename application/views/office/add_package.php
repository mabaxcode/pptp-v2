<div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Add New Package</h3>
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
                  <a href="#">Manage Package</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Add Package</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Package Form</div>
                  </div>
                  <form action="<?php echo base_url('office/save_package'); ?>" method="post">
                  <div class="card-body">

                    <?php if ($this->session->flashdata('success')) { ?>
                      <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                      </div>
                    <?php } ?>
                    
                    <!-- validation error -->
                    <?php if ($this->session->flashdata('error')) { ?>
                      <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                      </div>
                    <?php } ?>
                    
                    <div class="row">
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="email2">Package Name </label> <small class="text-danger">*</small>
                          <input
                            type="text"
                            class="form-control"
                            id="package_name"
                            name="package_name"
                            placeholder="Enter Package Name"
                            value="<?php echo set_value('package_name'); ?>"
                          />
                        </div>
                        
                        
                       
                        
                        
                        
                        <div class="form-group">
                          <label for="comment">Description </label>  <small class="text-danger">*</small>
                          <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                          <label class="form-label">Category <small>(optional)</small></label>
                          
                          <br>
                          <div class="selectgroup selectgroup-pills">

                            <?php foreach ($categories as $key => $category) { ?>
                                <label class="selectgroup-item">
                              <input
                                type="checkbox"
                                name="categories[]"
                                value="<?php echo $category['id']; ?>"
                                class="selectgroup-input"
                              />
                              <span class="selectgroup-button"><?php echo $category['name']; ?></span>
                            </label>
                            <?php } ?>
                            <!-- <button
                        class="btn btn-primary btn-round ms-auto btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#addRowModal"
                      >
                        <i class="fa fa-plus"></i>
                        Add New Category
                      </button> -->
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="email2">Tag <small>(optional)</small></label>
                          <input
                            type="text"
                            class="form-control"
                            id="tag"
                            name="tag"
                            placeholder="Enter Tag"
                          />
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-6">

                        <div class="form-group">
                          <label for="email2">Cover Photo</label>
                          <div class="cover-upload" id="coverContainer">
                            <input type="file" id="coverInput" accept="image/*" />
                            <div class="cover-placeholder" id="coverText">Click or Drop Image Here</div>
                            </div>
                        </div>

                      </div>
                    </div>
                    
                  </div>
                  <div class="card-action" align="right">
                    <button class="btn btn-success" type="submit">Submit</button>
                    <a class="btn btn-danger" href="<?php echo base_url('office/manage_package'); ?>">Cancel</a>
                  </div>
                  </form>
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