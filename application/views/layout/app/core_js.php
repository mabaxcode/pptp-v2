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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script>
      var base_url = "<?php echo base_url(); ?>";
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
      $("#basic-datatables").DataTable({});

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
              $("#addRowModal").modal('hide');
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

    </script>