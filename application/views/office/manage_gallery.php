<div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Manage Gallery</h3>
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
                  <a href="#">Manage Gallery</a>
                </li>
              </ul>
            </div>

          <!-- upload photo -->
          <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Add New Photo</div>
                  </div>
                  <form action="<?php echo base_url('office/save_gallery'); ?>" method="post" enctype="multipart/form-data">
                  <div class="card-body">

                    <?php if ($this->session->flashdata('success')) { ?>
                      <div class="alert alert-danger">
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
                      <center>
                        <div class="col-md-6 col-lg-6">

                          <div class="form-group">
                            <!-- <label for="email2">Photo</label> -->
                            <div class="cover-upload-galery" id="coverContainerGalery" style="background-image: url('<?php echo base_url(); ?>assets/img/placeholder-image.png');">
                              <input type="file" name="galery_photo" id="coverInputGalery" accept="image/*" />
                              <div class="cover-placeholder-galery" id="coverTextGalery">Click or Drop Image Here</div>
                              </div>
                          </div>

                        </div>
                    </center>
                    </div>
                    
                  </div>
                  <div class="card-action" align="right">
                    <button class="btn btn-success" type="submit">Add</button>
                    <a class="btn btn-danger" href="<?php echo base_url('office/manage_gallery'); ?>">Cancel</a>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="row row-demo-grid">
                  <h4 class="fw-bold mb-3">Gallery Photos</h4>
                  <?php foreach ($galleries as $gallery): ?>
                    <div class="col-sm-6 col-md-3">
                      <div class="card">
                          <img src="<?php echo base_url($gallery['image']); ?>" width="250" height="150">
                      </div>
                      <!-- <i class="fas fa-trash-alt fs-6 text-danger"></i> -->
                      <a href="<?php echo base_url('office/delete_gallery/' . $gallery['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this gallery photo?');">DELETE</a>
                    </div>
                  <?php endforeach; ?>

                  
                 
                 
                  
                </div>

              </div>
            </div>
          </div>


          <script>
            // Cover Photo Upload Preview
            const coverInputGalery = document.getElementById('coverInputGalery');
            const coverContainerGalery = document.getElementById('coverContainerGalery');
            const coverTextGalery = document.getElementById('coverTextGalery');

            coverInputGalery.addEventListener('change', function() {
              const file = this.files[0];
              if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                  coverContainerGalery.style.backgroundImage = `url('${e.target.result}')`;
                  coverTextGalery.style.display = 'none';
                }
                reader.readAsDataURL(file);
              } else {
                coverContainerGalery.style.backgroundImage = 'none';
                coverTextGalery.style.display = 'block';
              }
            });
          </script>