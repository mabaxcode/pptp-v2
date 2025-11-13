<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pulau Perhentian Travel Package</title>
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
    <link rel="stylesheet" href="<?php echo base_url(); ?>/node_modules/izimodal/css/iziModal.min.css">
  </head>

  <style>
    .cover-upload {
    position: relative;
    width: 100%;
    max-width: 1200px;
    height: 210px;
    border: 2px dashed #ccc;
    border-radius: 12px;
    background-size: cover;
    background-position: center;
    overflow: hidden;
    cursor: pointer;
    transition: border-color 0.3s ease;
  }

  table.dataTable thead th {
    background-color: #233e4b !important;
    color: #fff !important;
  }


  .bootstrap-notify-container,
  .notify,
  [data-notify="container"] {
    z-index: 99999 !important;
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

  /* galery */
  .cover-upload-galery:hover {
    border-color: #007bff;
  }

  .cover-upload-galery input[type="file"] {
    opacity: 0;
    position: absolute;
    width: 100%;
    height: 100%;
    cursor: pointer;
  }

  .cover-placeholder-galery {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    color: #888;
    font-weight: 500;
  }
  .cover-upload-galery {
    position: relative;
    width: 100%;
    max-width: 400px;
    height: 300px;
    border: 2px dashed #ccc;
    border-radius: 12px;
    background-size: cover;
    background-position: center;
    overflow: hidden;
    cursor: pointer;
    transition: border-color 0.3s ease;
  }

  .switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 25px;
  }

  .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
  }

  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 18px;
    width: 18px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #2196F3;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
</style>