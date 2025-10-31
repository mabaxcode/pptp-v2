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
            <div class="card">
              <div class="card-body">
                <h4 class="card-title mt-3">XL Grid</h4>
                <div class="row row-demo-grid">
                  <?php foreach ($galleries as $gallery): ?>
                    <div class="col-sm-6 col-md-3">
                      <div class="card">
                          <img src="<?php echo base_url($gallery['image']); ?>" class="img-fluid" alt="Responsive image">
                      </div>
                      <i class="fas fa-trash-alt fs-5 text-danger"></i>
                    </div>
                  <?php endforeach; ?>

                  
                 
                 
                  
                </div>

              </div>
            </div>
          </div>