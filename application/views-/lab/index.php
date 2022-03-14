<?php $this->load->view("common/header"); ?>

<?php $this->load->view("common/sidebar"); ?>

<link href="<?php echo base_url(); ?>skin/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

  <main class="page-content">
    <div class="container-fluid p-3">
      
  <!---content Area [ Please Put content in here ]-->
    <div class="row">
        <div class="col-md-12 pb-2">
          <section class="statistics mt-4">
            <div class="row">
                <div class="col-lg-4">
                    <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
                        <i class="fa fa-file  fa-2x text-center bg-primary rounded-circle"></i>
                        <div class="ms-3" style="padding-left: 15px;">
                            <div class="d-flex align-items-center">
                                <h3 class="mb-0"><?php echo $today_totalentry; ?></h3> <span class="d-block ms-2"> &nbsp;Patients</span>
                            </div>
                            <p class="fs-normal mb-0"><h6>Today's Lab Entries</h6></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box d-flex rounded-2 align-items-center p-3">
                        <i class="fa fa-file fa-2x text-center bg-success rounded-circle"></i>
                        <div class="ms-3" style="padding-left: 15px;">
                            <div class="d-flex align-items-center">
                                <h3 class="mb-0"><?php echo $todaylab_complete; ?></h3> <span class="d-block ms-2"> &nbsp;Patients</span>
                            </div>
                            <p class="fs-normal mb-0"><h6>Today's Lab Test Completed</h6></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
                        <i class="fa fa-file fa-2x text-center bg-danger rounded-circle"></i>
                        <div class="ms-3" style="padding-left: 15px;">
                            <div class="d-flex align-items-center">
                                <h3 class="mb-0"><?php echo $todaylab_pending; ?></h3> <span class="d-block ms-2"> &nbsp;Patients</span>
                            </div>
                            <p class="fs-normal mb-0"><h6>Today's Lab Test Pending</h6></p>
                        </div>
                    </div>
                </div>
            </div>
          </section>
        </div>
    </div>

        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#lab_pending" data-id="lab_pendg">Pending</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#lab_complete" data-id="lab_complt">Completed</a>
          </li>
          
        </ul>
        <div class="tab-content mt-1">
          <div class="tab-pane active" id="lab_pending">
            <h4></h4>
            <table id="table_labpendng" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>System ID</th>
                        <th>ID No</th>
                        <th>Patient Name</th>
                        <th>Gender</th>
                        <th>Phone No</th>
                        <th>Sample ID</th>
                        <th>HESN ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                
            </table>
          </div>
          <div class="tab-pane fade" id="lab_complete">
            <h4></h4>
            <table id="table_labcomplt" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>System ID</th>
                        <th>ID No</th>
                        <th>Patient Name</th>
                        <th>Gender</th>
                        <th>Phone No</th>
                        <th>Sample ID</th>
                        <th>HESN ID</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                
            </table>
          </div>
          
        </div>
        
<!---/content Area [ Please Put content in here ]-->

<?php $this->load->view("common/footer"); ?>

<script src="<?php echo base_url(); ?>skin/assets/plugins/custom/datatables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>skin/assets/plugins/custom/datatables/dataTables.buttons.min.js"></script>

<script src="<?php echo base_url(); ?>skin/assets/plugins/custom/datatables/buttons.flash.min.js"></script>

<script src="<?php echo base_url(); ?>skin/assets/plugins/custom/datatables/jszip.min.js"></script>

<script src="<?php echo base_url(); ?>skin/assets/plugins/custom/datatables/pdfmake.min.js"></script>

<script src="<?php echo base_url(); ?>skin/assets/plugins/custom/datatables/vfs_fonts.js"></script>

<script src="<?php echo base_url(); ?>skin/assets/plugins/custom/datatables/buttons.html5.min.js"></script>

<script src="<?php echo base_url(); ?>skin/assets/plugins/custom/datatables/buttons.print.min.js"></script>

<script src="<?php echo base_url(); ?>skin/custom/js/lab.js"></script>

<script src="<?php echo base_url(); ?>skin/assets/plugins/sweetalert/dist/sweetalert2.all.min.js"></script>