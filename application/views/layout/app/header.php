<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="<?php echo base_url(); ?>assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="<?php echo base_url(); ?>assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["<?php echo base_url(); ?>assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/demo.css" />
    <script src="<?php echo base_url(); ?>assets/js/plugin/datatables/datatables.min.js"></script>
  </head>

  <style>
    .cover-upload {
    position: relative;
    width: 100%;
    max-width: 1200px;
    height: 400px;
    border: 2px dashed #ccc;
    border-radius: 12px;
    background-size: cover;
    background-position: center;
    overflow: hidden;
    cursor: pointer;
    transition: border-color 0.3s ease;
  }

  .cover-upload:hover {
    border-color: #007bff;
  }

  .cover-upload input[type="file"] {
    opacity: 0;
    position: absolute;
    width: 100%;
    height: 100%;
    cursor: pointer;
  }

  .cover-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    color: #888;
    font-weight: 500;
  }
  </style>