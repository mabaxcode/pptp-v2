<!DOCTYPE html>
<html lang="en">
  <!-- header -->
  <?php $this->load->view('layout/app/header'); ?>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <?php $this->load->view('office/sidebar'); ?>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="<?php echo base_url(); ?>assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <?php $this->load->view('layout/app/navbar'); ?>
          <!-- End Navbar -->
        </div>

        <div class="container">
          <?php $this->load->view($page_name); ?>
        </div>

        <?php $this->load->view('layout/app/footer'); ?>
      </div>

    </div>
    <!--   Core JS Files   -->
    <?php $this->load->view('layout/app/core_js'); ?>
    <script>
      $(document).on('click', '.edit-category', function(e) {
        e.preventDefault();
        var categoryId = $(this).data('id');
        var categoryName = $(this).data('name');

        $('#edit_category_id').val(categoryId);
        $('#edit_category_name').val(categoryName);
      });

      $(document).on('click', '.update-category', function(e) {
        e.preventDefault();
        var formData = $('#form-edit-category').serialize();
        $.ajax({
          type: "POST",
          url: base_url + 'office/update_category',
          data: formData,
          async: true,
          dataType: 'json',
          success: function(data) {
            console.log(data);

            
            $("#editCategoryModal").modal('hide');
            window.location.href = base_url + 'office/manage_category';
            
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        });
      });

      $(document).on('click', '.add-duration', function(e) {
        e.preventDefault;
        // alert ('clicked');
        var formData = $('#form-add-duration').serialize();
        $.ajax({
          type: "POST",
          url: base_url + 'office/save_duration',
          data: formData,
          async: true,
          dataType: 'json',
          success: function(data) {
            console.log(data);

            if (data.status === 'error') {
              $.notify({
                icon: 'icon-close',
                title: 'Error',
                message: data.message,
              },{
                type: 'danger',
                placement: {
                  from: "top",
                  align: "right"
                },
                time: 1000,
              });
              return;
            }
            $("#addRowModal").modal('hide');
            $.notify({
              icon: 'icon-bell',
              title: 'Notification',
              message: data.message,
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            // set timer to reload page after 1 second
            setTimeout(function() {
              
              location.reload();
            }, 1000);
            
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        });
      });

      
    </script>
  </body>
</html>
