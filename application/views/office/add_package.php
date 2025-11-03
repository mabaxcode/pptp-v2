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
                  <form action="<?php echo base_url('office/save_package'); ?>" id="packageForm" method="post" enctype="multipart/form-data">
                  <div class="card-body">

                    <?php /* if ($this->session->flashdata('success')) { ?>
                      <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                      </div>
                    <?php } */?>
                    
                    <!-- validation error -->
                    <?php if ($this->session->flashdata('error')) { ?>
                      <div class="alert alert-danger" style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;">
                        <?php echo $this->session->flashdata('error'); ?>
                      </div>
                    <?php } ?>

                    <div class="alert alert-danger" style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;" id="formError" hidden>
                      <!-- Error messages will be displayed here -->
                    </div>
                    
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
                            value="<?php echo set_value('package_name'); ?>"
                          />
                        </div>
                        
                        
                       
                        
                        
                        
                        <div class="form-group">
                          <label for="comment">Description </label>  
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
                          <label for="email2">Price </label> 
                          <input
                            type="number"
                            class="form-control"
                            id="price"
                            name="price"
                            placeholder="Enter Price"
                            value="<?php echo set_value('price'); ?>"
                          />
                        </div>


                        <div class="form-group">
                          <label for="email2">Duration </label> 
                          <select name="duration" id="duration" class="form-control">
                            <option value="">-- Select Duration --</option>
                            <option value="3 Days 2 Nights">3 Days 2 Nights</option>
                          </select>
                        </div>


                        
                        <div class="form-group">
                          <label for="email2">Cover Photo</label>
                          <div class="cover-upload" id="coverContainer">
                            <input type="file" name="cover_photo" id="coverInput" accept="image/*" />
                            <div class="cover-placeholder" id="coverText">Click or Drop Image Here</div>
                            </div>
                        </div>

                      </div>
                    </div>

                    <!-- make section for itinerary -->
                    <h5 class="m-3">Itinerary Details <small style="color: red;"><i>(at least one item is required)</i></small></h5>
                    <hr>

                    <!-- Itinerary table-->
                    <table class="table"> 
                      <thead> 
                        <tr> 
                          <th>Day</th> 
                          <th>Title</th> 
                          <th>Description</th> 
                          <th>Action</th> 
                        </tr> 
                      </thead> 
                      <tbody id="itineraryBody"> 
                        <!-- Itinerary rows will be added here dynamically --> 
                      </tbody> 
                    </table>
                    <button type="button" class="btn btn-sm btn-info" id="addItineraryBtn" style="float: right;">Add Itinerary Day</button>
                    
                    <br><br>
                    
                    <!-- <hr>   -->

                    <!-- package item -->
                    <h5 class="m-3">Package Items <small style="color: red;"><i>(at least one item is required)</i></small></h5>
                    <hr>
                              <!-- multiple items -->
                              <div id="packageItemsContainer">
                                <div class="form-group">
                                  <!-- <label for="package_item">Package Item</label> -->
                                  <input type="text" class="form-control" id="package_item" name="package_item[]" placeholder="Enter Package Item" />
                                </div>
                              </div>
                              <button type="button" class="btn btn-sm btn-info" id="addPackageItemBtn" style="float: right;">Add Package Item</button>
                  

                  

                  <!-- add photo gallery / multiple uploads -->
                   <h5 class="m-3">Photo Gallery</h5>
                   <hr>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="photo_gallery">Upload Photos</label>
                        <input
                          type="file"
                          class="form-control"
                          id="photo_gallery"
                          name="photo_gallery[]"
                          multiple
                          accept="image/*"
                        />
                      </div>
                    </div>

                    </div>
                    

                    <div id="hiddenUploads" style="display:none;"></div>

                    <!-- Preview area -->
                    <div id="show_back" class="mt-3 d-flex flex-wrap gap-2 form-group"></div>
                   


                  <div class="card-action" align="right">
                    <button class="btn btn-success" type="submit">Create</button>
                    <a class="btn btn-danger" href="<?php echo base_url('office/manage_package'); ?>">Cancel</a>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <script>
            // JavaScript to handle adding itinerary rows
            document.getElementById('addItineraryBtn').addEventListener('click', function() {
              var tableBody = document.getElementById('itineraryBody');
              var rowCount = tableBody.rows.length;
              var row = tableBody.insertRow(rowCount);

              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              var cell4 = row.insertCell(3);

              cell1.innerHTML = '<input type="text" disabled name="itinerary_day[]" class="form-control" placeholder="Day ' + (rowCount + 1) + '" required />';
              cell2.innerHTML = '<input type="text" name="itinerary_title[]" class="form-control" placeholder="Title" required />';
              cell3.innerHTML = '<textarea name="itinerary_description[]" class="form-control" placeholder="Description" required></textarea>';
              cell4.innerHTML = '<button type="button" class="btn btn-danger btn-sm removeItineraryBtn">Remove</button>';

              // Add event listener to the remove button
              cell4.querySelector('.removeItineraryBtn').addEventListener('click', function() {
                tableBody.deleteRow(row.rowIndex - 1);
              });
            });

            // JavaScript to handle adding package item fields
            document.getElementById('addPackageItemBtn').addEventListener('click', function() {
              var container = document.getElementById('packageItemsContainer');
              var div = document.createElement('div');
              div.className = 'form-group';
              div.innerHTML = '<input type="text" class="form-control" name="package_item[]" placeholder="Enter Package Item" style="display: inline-block; width: calc(100% - 100px);" /> <button type="button" class="btn btn-danger btn-sm removePackageItemBtn">Remove</button>';
              container.appendChild(div);
              // Add event listener to the remove button
              div.querySelector('.removePackageItemBtn').addEventListener('click', function() {
                container.removeChild(div);
              });
            });



            // JavaScript to handle cover photo upload preview
            // const input = document.getElementById("photo_gallery");
            // const preview = document.getElementById("show_back");

            // input.addEventListener("change", function () {
            //   preview.innerHTML = ""; // clear preview
            //   Array.from(this.files).forEach((file) => {
            //     if (!file.type.startsWith("image/")) return;

            //     const reader = new FileReader();
            //     reader.onload = function (e) {
            //       const wrapper = document.createElement("div");
            //       wrapper.classList.add("position-relative", "m-1");
            //       wrapper.style.display = "inline-block";

            //       const img = document.createElement("img");
            //       img.src = e.target.result;
            //       img.style.width = "120px";
            //       img.style.height = "120px";
            //       img.style.objectFit = "cover";

            //       wrapper.appendChild(img);
            //       preview.appendChild(wrapper);
            //     };
            //     reader.readAsDataURL(file);
            //   });
            // });

            let allFiles = [];

            const input = document.getElementById("photo_gallery");
            const preview = document.getElementById("show_back");
            const form = document.getElementById("packageForm");
            const hiddenUploads = document.getElementById("hiddenUploads");

            input.addEventListener("change", function () {
              Array.from(this.files).forEach((file) => {
                if (!file.type.startsWith("image/")) return;
                allFiles.push(file);

                const reader = new FileReader();
                reader.onload = function (e) {
                  const wrapper = document.createElement("div");
                  wrapper.classList.add("position-relative", "m-1");
                  wrapper.style.display = "inline-block";

                  const img = document.createElement("img");
                  img.src = e.target.result;
                  img.style.width = "120px";
                  img.style.height = "120px";
                  img.style.objectFit = "cover";
                  img.style.borderRadius = "8px";

                  const delBtn = document.createElement("button");
                  delBtn.innerHTML = "✕";
                  delBtn.type = "button";
                  Object.assign(delBtn.style, {
                    position: "absolute",
                    top: "5px",
                    right: "5px",
                    background: "rgba(0,0,0,0.6)",
                    color: "white",
                    border: "none",
                    borderRadius: "50%",
                    cursor: "pointer",
                    width: "24px",
                    height: "24px"
                  });

                  delBtn.addEventListener("click", function () {
                    wrapper.remove();
                    allFiles = allFiles.filter(f => f !== file);
                  });

                  wrapper.appendChild(img);
                  wrapper.appendChild(delBtn);
                  preview.appendChild(wrapper);
                };
                reader.readAsDataURL(file);
              });

              // clear so new selection can be made
              this.value = "";
            });

            // Before form submit, attach all files into hidden inputs
            form.addEventListener("submit", function (e) {
              e.preventDefault(); // stop normal submit first

              // alert ('Validating form...');

              const formError = document.getElementById("formError");
              
              // validate all required fields
              formError.hidden = true;
              // Package Name, Description, Duration, Cover Photo, Itinerary, Price, Package Items
              const packageName = document.getElementById("package_name").value.trim();
              // alert (packageName);
              const description = document.getElementById("description").value.trim();
              const duration = document.getElementById("duration").value;
              const price = document.getElementById("price").value;
              const coverInput = document.getElementById("coverInput").files;
              const itineraryRows = document.querySelectorAll("#itineraryBody tr");
              const packageItems = document.getElementsByName("package_item[]");
              let errorMessages = [];
              if (packageName === "") {
                errorMessages.push("Package name is required.");
              }
              if (description === "") {
                errorMessages.push("Description is required.");
              }
              if (duration === "") {
                errorMessages.push("Duration is required.");
              }
              if (price === "") {
                errorMessages.push("Price is required.");
              }
              if (coverInput.length === 0) {
                errorMessages.push("Cover photo is required.");
              }
              if (itineraryRows.length === 0) {
                errorMessages.push("At least one Itinerary Day is required.");
              }
              let hasItineraryError = false;
              itineraryRows.forEach(row => {
                const title = row.querySelector('input[name="itinerary_title[]"]').value.trim();
                const desc = row.querySelector('textarea[name="itinerary_description[]"]').value.trim();
                if (title === "" || desc === "") {
                  hasItineraryError = true;
                }
              });
              if (hasItineraryError) {
                errorMessages.push("All Itinerary Days must have Title and Description.");
              }
              let hasPackageItem = false;
              for (let i = 0; i < packageItems.length; i++) {
                if (packageItems[i].value.trim() !== "") {
                  hasPackageItem = true;
                  break;;
                }
              }
              if (!hasPackageItem) {
                errorMessages.push("At least one Package Item is required.");
              }

              if (errorMessages.length > 0) {
                formError.innerHTML = errorMessages.join("<br>");
                formError.hidden = false;
                // scroll to top of form
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return;
              }

              // alert ('Submitting form with ' + allFiles.length + ' files.');
              hiddenUploads.innerHTML = ""; // clear any previous
              if (allFiles.length === 0) return; // nothing to do

              // Use DataTransfer API to reattach files
              const dt = new DataTransfer();
              allFiles.forEach(file => dt.items.add(file));

              // Recreate a single hidden file input
              const hiddenInput = document.createElement("input");
              hiddenInput.type = "file";
              hiddenInput.name = "photo_gallery[]";
              hiddenInput.multiple = true;
              hiddenInput.files = dt.files;

              hiddenUploads.appendChild(hiddenInput);
              form.submit();
            });

          </script>



          


