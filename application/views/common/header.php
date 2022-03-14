<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title><?php echo $title; ?> | PCR Test</title>

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url(); ?>skin/assets/plugins/fontawesome/all.css" rel="stylesheet"> -->
    <link href="<?php echo base_url(); ?>skin/assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="<?php echo base_url(); ?>skin/assets/plugins/jquery/3.2.1/jquery.min.js"></script>
    <link href="<?php echo base_url(); ?>skin/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>skin/assets/css/dash.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>skin/assets/js/script.js"></script>

    <!-- begin :: Toastr -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>skin/assets/plugins/toastr/toastr.css">
    <script src="<?php echo base_url();?>skin/assets/plugins/toastr/toastr.min.js"></script>
    <!-- end :: Toastr -->

    <!-- Dashboard -->
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
    <!-- Dashboard -->

    <style type="text/css">
      input[type=search] {
        padding: .25rem .5rem;
        font-size: .875rem;
        line-height: 1.5;
        border-radius: .2rem;
        display: block;
        width: 100%;
       
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
      }
      input[type=search]:focus {
        color: #495057;
        background-color: #fff;
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgb(0 123 255 / 25%);
      }
      .paging_full_numbers a.paginate_button, .paging_full_numbers a.paginate_active{
        background: #057182 !important;
      }
      a.paginate_button.current {
        background-color: #0abb87 !important;
      }
      .dt-buttons, .dataTables_filter
      {
        width: 50%; 
        float: left;
        display: inline;
      }
      .dt-button
      {
        color: #fff;
        background-color: #117a8b;
        border-color: #10707f;
        border: 0;
        padding: .25rem .5rem;
            border-radius: .2rem;
      }
      th, td{
        white-space: nowrap;
      }
      #myHiddenPage { 
    display: none;
} 
    </style>

    <script type="text/javascript">
      var base_url = "<?php echo base_url(); ?>";
    </script>
</head>

<body>
    <div id='myHiddenPage'></div>