    
    <script>var base_url = "<?php echo base_url(); ?>";</script>
    <script src="<?php echo base_url(); ?>assets/js/jq.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/core/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?php echo base_url(); ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="<?php echo base_url(); ?>assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="<?php echo base_url(); ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="<?php echo base_url(); ?>assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="<?php echo base_url(); ?>assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="<?php echo base_url(); ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="<?php echo base_url(); ?>assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="<?php echo base_url(); ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="<?php echo base_url(); ?>assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="<?php echo base_url(); ?>assets/js/setting-demo.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>

    <script src="<?php echo base_url(); ?>node_modules/izimodal/js/iziModal.min.js" type="text/javascript"></script>

    <div id="modal-booking-details" class="iziModal"></div>
    <div id="modal-process-vendor" class="iziModal"></div>
    <div id="modal-view-vendor" class="iziModal"></div>

    <script>

      $('#modal-process-vendor').iziModal({
        title: "PROCESS VENDOR APPLICATION",
        headerColor: '#88A0B9',
        width: 900,
        zindex: 999,
        // zindex: 99999,
        // overlayClose: true,
      });

      $('#modal-view-vendor').iziModal({
        title: "VENDOR DETAILS",
        headerColor: '#88A0B9',
        width: 900,
        zindex: 999,
        // zindex: 99999,
        // overlayClose: true,
      });

      $(document).on('click', '.btn-process-vendor', function (event) {
          event.preventDefault();

          var id = $(this).data('init');

          // load content using ajax
          $.ajax({
            type: "POST",
            url: base_url + 'office/process_vendor_modal',
            async: true,
            dataType: 'html',
            data: {id:id},
            success: function(data) {
              // console.log(data);
              $('#modal-process-vendor').iziModal('setContent', data);
              $('#modal-process-vendor').iziModal('open');
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
            }
          });
        
      });

      $(document).on('click', '.btn-view-vendor', function (event) {
          event.preventDefault();

          var id = $(this).data('init');

          // load content using ajax
          $.ajax({
            type: "POST",
            url: base_url + 'office/view_vendor_modal',
            async: true,
            dataType: 'html',
            data: {id:id},
            success: function(data) {
              // console.log(data);
              $('#modal-view-vendor').iziModal('setContent', data);
              $('#modal-view-vendor').iziModal('open');
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
            }
          });
        
      });

  
      $(document).on('click', '.btn-delete-package', function (event) {
          event.preventDefault();

          var packageId = $(this).data('package-id');

          swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this package!",
              type: "warning",
              icon: "warning",
              buttons: {
                cancel: {
                  visible: true,
                  text: "Cancel",
                  className: "btn btn-danger",
                },
                confirm: {
                  text: "Yes, delete it!",
                  className: "btn btn-primary",
                },
              },
            }).then((willDelete) => {
              if (willDelete) {

                  $.ajax({
                  type: "POST",
                  url: base_url + 'vendor/delete_package',
                  async: true,
                  dataType: 'json',
                  data: {package_id: packageId},
                  success: function(data) {
                    console.log(data);
                    if (data.status === 'success') {
                      

                      swal(data.message, {
                      icon: "success",
                      title: "Success !",
                      text: data.message,
                      buttons: {
                        confirm: {
                          className: "btn btn-primary",
                        },
                      },
                    }).then((value) => {
                      // This runs when the confirm button is clicked
                      if (value) {
                          location.reload();
                      }
                    });


                    } else {
                      alert(data.message);
                    }
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                  }
                });

              }
            });
      });

      $(document).on('click', '#btn-proceed-vendor', function (event) {
          event.preventDefault();

          var vendor_form_id = $(this).data('init');
          var decision = $('#decision').val();
          var remark = $('textarea[name="remark_decision"]').val();

          // validate
          if (decision === '') {
            $("#decision").focus();
            $("#decision").css("border", "1px solid red");
              $.notify({
                icon: 'icon-close',
                title: 'Alert !',
                message: 'Please select a decision.',
              },{
                type: 'danger',
                placement: {
                  from: "top",
                  align: "center"
                },
                time: 1000,
              });
              return;
            return;
          }

          if(decision === 'reject'){
            // remark is required
            if (remark.trim() === '') {
              $("textarea[name='remark_decision']").focus();
              $("textarea[name='remark_decision']").css("border", "1px solid red");
                $.notify({
                  icon: 'icon-close',
                  title: 'Alert !',
                  message: 'Please provide a remark for rejection.',
                },{
                  type: 'danger',
                  placement: {
                    from: "top",
                    align: "center"
                  },
                  time: 1000,
                });
                return;
              return;
            }
          }


          swal({
              title: "Are you sure?",
              text: "Proceed this application.",
              type: "warning",
              icon: "warning",
              buttons: {
                cancel: {
                  visible: true,
                  text: "Cancel",
                  className: "btn btn-danger",
                },
                confirm: {
                  text: "Yes, Proceed!",
                  className: "btn btn-primary",
                },
              },
            }).then((willDelete) => {
              if (willDelete) {
                $.ajax({
                  type: "POST",
                  url: base_url + 'office/proceed_vendor_application',
                  async: true,
                  dataType: 'json',
                  data: {vendor_form_id:vendor_form_id, decision:decision, remarks:remark},
                  success: function(data) {
                    console.log(data);
                    if (data.status === 'success') {
                      $('#modal-process-vendor').iziModal('close');

                      swal(data.message, {
                      icon: "success",
                      title: "Success !",
                      buttons: {
                        confirm: {
                          className: "btn btn-primary",
                        },
                      },
                    }).then((value) => {
                      // This runs when the confirm button is clicked
                      if (value) {
                          location.reload();
                      }
                    });


                    } else {
                      alert(data.message);
                    }
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                  }
                });
              }
            });
      });

          

          
        
      

      $(document).on('click', '.view-booking-detail', function (event) {
          event.preventDefault();
          // init modal
          $('#modal-booking-details').iziModal({
            title: "BOOKING DETAILS",
            headerColor: '#88A0B9',
            width: 900,
            zindex: 999,
          });

          var bookingId = $(this).data('initid');

          // load content using ajax
          $.ajax({
            type: "POST",
            url: base_url + 'office/get_booking_details',
            async: true,
            dataType: 'html',
            data: {bookingId:bookingId},
            success: function(data) {
              console.log(data);
              $('#modal-booking-details').iziModal('setContent', data);
              $('#modal-booking-details').iziModal('open');
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
            }
          });
        
      });

      // alert(base_url);
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });

      $("#basic-datatables").DataTable({
        // remove sorting
        "ordering": false
      });

      $("#basic-datatables-approved").DataTable({
        // remove sorting
        "ordering": false
      });

      $("#basic-datatables-rejected").DataTable({
        "ordering": false
      });

      $(document).on('click', '.is-publish', function(e) {
          e.preventDefault;
          var isChecked = $(this).prev('input[type="checkbox"]').is(':checked');
          var packageId = $(this).data('package-id');
          // alert(packageId + ' is checked: ' + isChecked); return;


          // isChecked == false, consider as published

          $.ajax({
            type: "POST",
            url: base_url + 'vendor/toggle_publish_package',
            data: {package_id: packageId, is_published: isChecked},
            async: true,
            dataType: 'json',
            success: function(data) {
              console.log(data);
              if (data.status === 'success') {
                $.notify({
                  icon: 'icon-bell',
                  title: data.title,
                  message: data.message,
                },{
                  type: data.type,
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
                // location.reload();
              } else {
                alert(data.message);
              }
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
            }
      });
      });

      $(document).on('click', '.add-category', function(e) {
        e.preventDefault;
        var formData = $('#form-add-category').serialize();
        $.ajax({
          type: "POST",
          url: base_url + 'office/save_category',
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

      const coverInput = document.getElementById("coverInput");
      const coverContainer = document.getElementById("coverContainer");
      const coverText = document.getElementById("coverText");

      coverInput.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function (e) {
            coverContainer.style.backgroundImage = `url(${e.target.result})`;
            coverText.style.display = "none";
          };
          reader.readAsDataURL(file);
        }
      });



      
      

      

      <?php if ($this->session->flashdata('success')) { ?>
      $.notify({
          icon: 'icon-bell',
          title: 'Success !',
          message: "<?php echo $this->session->flashdata('success'); ?>",
        },{
          type: 'secondary',
          placement: {
            from: "top",
            align: "right"
          },
          time: 1000,
        });
    <?php } ?>
      $(document).on('click', '.edit-package-item-btn', function(e) {
        // show modal
        e.preventDefault();
        var itemId = $(this).data('id');
        // alert(itemId);
        // load form using ajax
        $.ajax({
          type: "GET",
          url: base_url + 'office/get_package_item/' + itemId,
          async: true,
          dataType: 'json',
          success: function(data) {
            console.log(data);

              $('#edit_package_item_id').val(data.id);
              $('#edit_package_item_item').val(data.item);

              $('#editPackageItemModal').modal('show');
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        });
    });

    $(document).on('click', '.edit-itinerary-btn', function(e) {
        // show modal
        e.preventDefault();
        var itineraryId = $(this).data('id');
        // alert(itineraryId);
        // load form using ajax
        $.ajax({
          type: "GET",
          url: base_url + 'office/get_itinerary/' + itineraryId,
          async: true,
          dataType: 'json',
          success: function(data) {
            console.log(data);

              $('#edit_itinerary_id').val(data.id);
              $('#edit_itinerary_seq').val(data.seq);
              $('#edit_itinerary_title').val(data.title);
              $('#edit_itinerary_description').val(data.description);

              $('#editItineraryModal').modal('show');
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        });
    });

    $(document).on('click', '.update-package-item', function(e) {
        e.preventDefault();
        var formData = $('#form-edit-package-item').serialize();
        $.ajax({
          type: "POST",
          url: base_url + 'office/update_package_item',
          data: formData,
          async: true,
          dataType: 'json',
          success: function(data) {
            console.log(data);
            
            $("#editPackageItemModal").modal('hide');
            location.reload();
            
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        });
      });

    $(document).on('click', '.save-itinerary-changes', function(e) {
        e.preventDefault();
        var formData = $('#form-edit-itinerary').serialize();
        $.ajax({
          type: "POST",
          url: base_url + 'office/update_itinerary',
          data: formData,
          async: true,
          dataType: 'json',
          success: function(data) {
            console.log(data);

          //   if (data.status === 'error') {
          //     $.notify({
          //       icon: 'icon-close',
          //       title: 'Error',
          //       message: data.message,
          //     },{
          //       type: 'danger',
          //       placement: {
          //         from: "top",
          //         align: "right"
          //       },
          //       time: 1000,
          //     });
          //     return;
          //   }else {
          //     $.notify({
          //       icon: 'icon-bell',
          //       title: 'Success !',
          //       message: data.message,
          //   },{
          //     type: 'secondary',
          //     placement: {
          //       from: "top",
          //       align: "right"
          //     },
          //     time: 1000,
          //   });
          // }
            
            $("#editItineraryModal").modal('hide');
            // reload page after 1 second
            // setTimeout(function() {
            //   location.reload();
            // }, 1000);
            location.reload();
            // window.location.href = base_url + 'office/edit_package/' + data.package_id;
            
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        });
      });

      

      $(document).on('click', '.add-itinerary-btn', function(e) {
        e.preventDefault;
        // alert ('clicked');
        var formData = $('#form-add-itinerary').serialize();
        $.ajax({
          type: "POST",
          url: base_url + 'office/save_itinerary',
          data: formData,
          async: true,
          dataType: 'json',
          success: function(data) {
            console.log(data);

            $("#addItineraryModal").modal('hide');
            location.reload();
            
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        });
      });

      $(document).on('click', '.add-package-item-btn', function(e) {
        e.preventDefault;
        // alert ('clicked');
        var formData = $('#form-add-package-item').serialize();
        $.ajax({
          type: "POST",
          url: base_url + 'office/save_package_item',
          data: formData,
          async: true,
          dataType: 'json',
          success: function(data) {
            console.log(data);

            $("#addPackageItemModal").modal('hide');
            location.reload();
            
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        });
      });
      
      

    </script>