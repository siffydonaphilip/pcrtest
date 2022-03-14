<?php $this->load->view("common/header"); ?>

<?php $this->load->view("common/sidebar"); ?>

 
    <!---content Area [ Please Put content in here ]-->
       
   <style type="text/css">
     
element.style {
}
.statistics .box i {
    width: 60px;
    height: 60px;
    line-height: 60px;
}
   </style>
  <main class="page-content">
    <div class="container-fluid p-0">
     

      <div class="row m-3">
        <div  style="width: 100%;">
    <div class="welcome">
      <div class="content rounded-3 p-3">
        <!--<h1 class="fs-3">Al Hammadi Hospital</h1>-->
        <p class="mb-0"><h4>PCR Test Application</h4></p>
      </div>
    </div>

    <section class="statistics mt-4">
      <div class="row">
        <div class="col-lg-4 today_postv" style="cursor: pointer;">
                <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
                  <i class="fa fa-users fa-2x text-center bg-danger rounded-circle"></i>
                  <div class="ms-3" style="padding-left: 20px;">
                    <div class="d-flex align-items-center">
                      <h3 class="mb-0"><?php echo $today_positive; ?></h3> <span class="d-block ms-2"> &nbsp;Patients</span>
                    </div>
                    <p class="fs-normal mb-0"><h5>Today's Positive Results</h5></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 today_negtv" style="cursor: pointer;">
                <div class="box d-flex rounded-2 align-items-center p-3">
                  <i class="fa fa-users fa-2x text-center bg-success rounded-circle"></i>
                  <div class="ms-3" style="padding-left: 20px;">
                    <div class="d-flex align-items-center">
                      <h3 class="mb-0"><?php echo $today_negative; ?></h3> <span class="d-block ms-2"> &nbsp;Patients</span>
                    </div>
                    <p class="fs-normal mb-0"><h5>Today's Negative Results</h5></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 today_samplerjct" style="cursor: pointer;">
                <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
                  <i class="fa fa-users  fa-2x text-center bg-warning rounded-circle"></i>
                  <div class="ms-3" style="padding-left: 20px;">
                    <div class="d-flex align-items-center">
                      <h3 class="mb-0"><?php echo $today_samplereject; ?></h3> <span class="d-block ms-2"> &nbsp;Patients</span>
                    </div>
                    <p class="fs-normal mb-0"><h5>Today's Samples Rejected</h5></p>
                  </div>
                </div>
              </div>
      </div>
    </section>

    <!-- <section class="charts mt-4">
      <div class="row">
        
        
      </div>
    </section> -->

    <section class="statis mt-4 text-center">
      <div class="row">
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 totsample" style="cursor: pointer;">
          <div class="box bg-primary p-3">
            <i class="fa fa-eye"></i>
            <h3><?php echo $totl_samples; ?></h3>
            <p class="lead">Total Samples</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 totpositv" style="cursor: pointer;">
          <div class="box bg-danger p-3">
            <i class="fa fa-user"></i>
            <h3><?php echo $totl_positive; ?></h3>
            <p class="lead">Total Positive Results</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 totnegatv" style="cursor: pointer;">
          <div class="box bg-success p-3">
            <i class="fa fa-user"></i>
            <h3><?php echo $totl_negative; ?></h3>
            <p class="lead">Total Negative Results</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4 mb-md-0 totsample_reject" style="cursor: pointer;">
          <div class="box bg-warning p-3">
            <i class="fa fa-user"></i>
            <h3><?php echo $totl_samplereject; ?></h3>
            <p class="lead">Total Samples Rejected</p>
          </div>
        </div>
      </div>
    </section>

  </div>
        
      </div>
      <div class="p-5"></div>
    <!---/content Area [ Please Put content in here ]-->
    
<?php $this->load->view("common/footer"); ?>

<script type="text/javascript">
  // Onclick Today's Positive Result
  $('.today_postv').on('click', function() {
    window.location = base_url+"testresult";
  });

  // Onclick Today's Negative Result
  $('.today_negtv').on('click', function() {
    window.location = base_url+"testresult";
  });

  // Onclick Today's Samples Rejected
  $('.today_samplerjct').on('click', function() {
    window.location = base_url+"testresult";
  });

  // Onclick Total Samples Box
  $('.totsample').on('click', function() {
    window.location = base_url+"pcrtest";
  });

  // Onclick Total POsitive Results Box
  $('.totpositv').on('click', function() {
    window.location = base_url+"testresult";
  });

  // Onclick Total Negative Results Box
  $('.totnegatv').on('click', function() {
    window.location = base_url+"testresult";
  });

  // Onclick Total Samples Rejected Box
  $('.totsample_reject').on('click', function() {
    window.location = base_url+"testresult";
  });
</script>