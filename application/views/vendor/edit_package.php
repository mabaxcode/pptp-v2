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
                  <form action="<?php echo base_url('vendor/do_edit_package'); ?>" method="post" enctype="multipart/form-data">
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
                          <label for="email2">Price (RM)</label> 
                          <input
                            type="text"
                            class="form-control"
                            id="price"
                            name="price"
                            placeholder="Enter Price"
                            value="<?php echo $package['price']; ?>"
                            required
                          />
                        </div>

                        <div class="form-group">
                          <label for="email2">Duration</label> 
                          <?php //print_r($durations); ?>
                          <select name="duration" id="duration" class="form-control" required>
                            <option value="">-- Select Duration --</option>
                            <?php 
                              foreach ($durations as $duration_option) { 
                            ?>
                              <option value="<?php echo $duration_option['name']; ?>" <?php echo ($package['duration'] == $duration_option['name']) ? 'selected' : ''; ?>><?php echo $duration_option['name']; ?></option>
                            <?php } ?>

                          </select>
                        </div>

                        <div class="form-group">
                          <label for="email2"><b>Change Cover Photo</b></label>
                          <div class="cover-upload" id="coverContainer" style="background-image: url('<?php echo !empty($package['cover_photo']) ? base_url($package['cover_photo']) : base_url('assets/img/cover-placeholder.png'); ?>');">
                            <input type="file" name="cover_photo" id="coverInput" accept="image/*" />
                            <div class="cover-placeholder" id="coverText"></div>
                            </div>
                        </div>

                        
                        
                        <?php /*
                        <div class="form-group">
                            <label for="email2"><b>Current Cover Photo: </b></label>
                          <?php if (!empty($package['cover_photo'])): ?>
                            <img src="<?php echo base_url($package['cover_photo']); ?>" alt="Cover Photo" style="max-width: 100%; height: auto;" />
                          <?php else: ?>
                            <p>No cover photo uploaded.</p>
                          <?php endif; ?>

                      </div>
                      */?>
                      
                    </div>

                    
                    
                  </div>
                  
                  
                  <div class="card-action" align="right">
                    <button class="btn btn-success" type="submit">Update Package</button>
                    <a class="btn btn-danger" href="<?php echo base_url('vendor/manage_package'); ?>">Back</a>
                  </div>
                  </form>
                </div>
              </div>
            </div>



            <!-- intery -->
            
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Itinerary List</h4>
                        <button
                        class="btn btn-primary ms-auto btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#addItineraryModal"
                      >
                        <i class="fa fa-file"></i>
                        Add New Itinerary
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id=""
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th width="5%">No</th>
                            <th width="25%">Title</th>
                            <th width="45%">Description</th>
                            <th width="20%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($itinerarys as $itinerary): ?>
                          <tr>
                            <td><?php echo $itinerary['seq']; ?></td>
                            <td>
                              <?php echo $itinerary['title']; ?>
                            </td>
                            <td>
                              <?php echo $itinerary['description']; ?>
                            </td>
                            <td>
                              <a
                                class="btn btn-primary ms-auto btn-sm edit-itinerary-btn"
                                data-id="<?php echo $itinerary['id']; ?>"
                                href="javascript:void(0);"
                              >
                                <i class="fa fa-pen"></i>
                                Edit
                                </a>
                              <a href="<?php echo base_url('office/delete_itinerary/' . $itinerary['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this itinerary?');"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>


            <!-- package item -->
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Package Items</h4>
                        <button
                        class="btn btn-primary ms-auto btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#addPackageItemModal"
                      >
                        <i class="fa fa-file"></i>
                        Add New Package Item
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id=""
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th width="5%">No</th>
                            <th width="75%">Package Item</th>
                            <th width="20%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1; foreach ($package_items as $item): ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td>
                              <?php echo $item['item']; ?>
                            </td>
                            <td>
                              <a
                                class="btn btn-primary ms-auto btn-sm edit-package-item-btn"
                                data-id="<?php echo $item['id']; ?>"
                                href="javascript:void(0);"
                              >
                                <i class="fa fa-pen"></i>
                                Edit
                                </a>
                              <a href="<?php echo base_url('office/delete_package_item/' . $item['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this package item?');"><i class="fa fa-trash"></i> Delete</a>
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

          <div
                      class="modal fade"
                      id="editItineraryModal"
                      tabindex="-1"
                      role="dialog"
                      aria-labelledby="editItineraryModalLabel"
                      aria-hidden="true"
                    >
                      <div
                        class="modal-dialog modal-lg"
                        role="document"
                      >
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5
                              class="modal-title"
                              id="editItineraryModalLabel"
                            >
                              Edit Itinerary
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
                          <form id="form-edit-itinerary"
                          >
                            <div class="modal-body">
                              <input
                                type="hidden"
                                id="edit_itinerary_id"
                                name="itinerary_id"
                              />
                              
                              <div class="form-group">
                                <label for="edit_itinerary_title"
                                  >Title</label
                                >
                                <input
                                  type="text"
                                  class="form-control"
                                  id="edit_itinerary_title"
                                  name="title"
                                  required
                                />
                              </div>
                              <div class="form-group">
                                <label for="edit_itinerary_description"
                                  >Description</label
                                >
                                <textarea
                                  class="form-control"
                                  id="edit_itinerary_description"
                                  name="description"
                                  rows="4"
                                  required
                                ></textarea>
                              </div>
                            </div>
                            <div class="modal-footer">
                              
                              <button
                                type="submit"
                                class="btn btn-success save-itinerary-changes"
                              >
                                Save changes
                              </button>
                              <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                              >
                                Close
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>


<div
  class="modal fade"
  id="addItineraryModal"
  tabindex="-1"
  role="dialog"
  aria-labelledby="addItineraryModalLabel"
  aria-hidden="true"
>
  <div
    class="modal-dialog modal-lg"
    role="document"
  >
    <div class="modal-content">
      <div class="modal-header">
        <h5
          class="modal-title"
          id="addItineraryModalLabel"
        >
          Add Itinerary
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
      <form id="form-add-itinerary"
      >
        <div class="modal-body">
          <input
            type="hidden"
            id="package_id"
            name="package_id"
            value="<?php echo $package['id']; ?>"
          />
          
          <div class="form-group">
            <label for="edit_itinerary_title"
              >Title</label
            >
            <input
              type="text"
              class="form-control"
              id="add_itinerary_title"
              name="title"
              required
            />
          </div>
          <div class="form-group">
            <label for="add_itinerary_description"
              >Description</label
            >
            <textarea
              class="form-control"
              id="add_itinerary_description"
              name="description"
              rows="4"
              required
            ></textarea>
          </div>
        </div>
        <div class="modal-footer">
          
          <button
            type="submit"
            class="btn btn-success add-itinerary-btn"
          >
            Save Itinerary
          </button>
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >
            Close
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

          <!-- End Modal -->
           <!-- editPackageItemModal -->
          <div
                      class="modal fade"
                      id="editPackageItemModal"
                      tabindex="-1"
                      role="dialog"
                      aria-labelledby="editPackageItemModalLabel"
                      aria-hidden="true"
                    >
                      <div
                        class="modal-dialog modal-lg"
                        role="document"
                      >
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5
                              class="modal-title"
                              id="editPackageItemModalLabel"
                            >
                              Edit Package Item
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
                          <form id="form-edit-package-item"
                          >
                            <div class="modal-body">
                              <input
                                type="hidden"
                                id="edit_package_item_id"
                                name="package_item_id"
                              />
                              
                              <div class="form-group">
                                <label for="edit_package_item_item"
                                  >Package Item</label
                                >
                                <input
                                  type="text"
                                  class="form-control"
                                  id="edit_package_item_item"
                                  name="item"
                                  required
                                />
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button
                                type="submit"
                                class="btn btn-success update-package-item"
                              >
                                Save Changes
                              </button>
                              <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                              >
                                Close
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>


          <!-- End Modal -->
            <!-- addPackageItemModal -->
          <div
                      class="modal fade"
                      id="addPackageItemModal"
                      tabindex="-1"
                      role="dialog"
                      aria-labelledby="addPackageItemModalLabel"
                      aria-hidden="true"
                    >
                      <div
                        class="modal-dialog modal-lg"
                        role="document"
                      >
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5
                              class="modal-title"
                              id="addPackageItemModalLabel"
                            >
                              Add Package Item
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
                          <form id="form-add-package-item"
                          >
                            <div class="modal-body">
                              <input
                                type="hidden"
                                id="package_id"
                                name="package_id"
                                value="<?php echo $package['id']; ?>"
                              />
                              
                              <div class="form-group">
                                <label for="add_package_item_item"
                                  >Package Item</label
                                >
                                <input
                                  type="text"
                                  class="form-control"
                                  id="add_package_item_item"
                                  name="item"
                                  required
                                />
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button
                                type="submit"
                                class="btn btn-success add-package-item-btn"
                              >
                                Save Package Item
                              </button>
                              <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                              >
                                Close
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
