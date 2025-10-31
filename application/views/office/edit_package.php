<div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Edit Package</h3>
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
                  <a href="#">Edit Package</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Package Details</div>
                  </div>
                  <form action="<?php echo base_url('office/do_edit_package'); ?>" method="post" enctype="multipart/form-data">
                  <div class="card-body">

                    <?php /* if ($this->session->flashdata('success')) { ?>
                      <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                      </div>
                    <?php } */?>
                    
                    <!-- validation error -->
                    <?php if ($this->session->flashdata('error')) { ?>
                      <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                      </div>
                    <?php } ?>
                    
                    <div class="row">
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="email2">Package Name </label> 
                          <input
                            type="text"
                            class="form-control"
                            id="package_name"
                            name="package_name"
                            placeholder="Enter Package Name"
                            value="<?php echo $package['package_name']; ?>"
                            required
                          />
                        </div>
                        


                        <input type="hidden" name="package_id" value="<?php echo $package['id']; ?>" />

                        <div class="form-group">
                          <label for="comment">Description </label>  
                          <textarea class="form-control" id="description" name="description" rows="5" required><?php echo $package['description']; ?></textarea>
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
                                <?php echo (in_array($category['id'], json_decode($package['categories'], true))) ? 'checked' : ''; ?>>
                            
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
                            value="<?php echo $package['tag']; ?>"
                          />
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-6">

                        <div class="form-group">
                          <label for="email2"><b>Update Cover Photo</b></label>
                          <div class="cover-upload" id="coverContainer">
                            <input type="file" name="cover_photo" id="coverInput" accept="image/*" />
                            <div class="cover-placeholder" id="coverText">Update Cover Photo</div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email2"><b>Current Cover Photo: </b></label>
                          <?php if (!empty($package['cover_photo'])): ?>
                            <img src="<?php echo base_url($package['cover_photo']); ?>" alt="Cover Photo" style="max-width: 100%; height: auto;" />
                          <?php else: ?>
                            <p>No cover photo uploaded.</p>
                          <?php endif; ?>

                      </div>
                    </div>
                    
                  </div>
                  <div class="card-action" align="right">
                    <button class="btn btn-success" type="submit">Submit</button>
                    <a class="btn btn-danger" href="<?php echo base_url('office/manage_package'); ?>">Back</a>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>



