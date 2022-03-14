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
                  <i class="fa fa-users fa-2x text-center bg-danger rounded-circle"></i>
                  <div class="ms-3" style="padding-left: 15px;">
                    <div class="d-flex align-items-center">
                      <h3 class="mb-0"><?php echo $today_positive; ?></h3> <span class="d-block ms-2"> &nbsp;Patients</span>
                    </div>
                    <p class="fs-normal mb-0"><h6>Today's Positive Results</h6></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="box d-flex rounded-2 align-items-center p-3">
                  <i class="fa fa-users fa-2x text-center bg-success rounded-circle"></i>
                  <div class="ms-3" style="padding-left: 15px;">
                    <div class="d-flex align-items-center">
                      <h3 class="mb-0"><?php echo $today_negative; ?></h3> <span class="d-block ms-2"> &nbsp;Patients</span>
                    </div>
                    <p class="fs-normal mb-0"><h6>Today's Negative Results</h6></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
                  <i class="fa fa-users  fa-2x text-center bg-warning rounded-circle"></i>
                  <div class="ms-3" style="padding-left: 15px;">
                    <div class="d-flex align-items-center">
                      <h3 class="mb-0"><?php echo $today_samplereject; ?></h3> <span class="d-block ms-2"> &nbsp;Patients</span>
                    </div>
                    <p class="fs-normal mb-0"><h6>Today's Samples Rejected</h6></p>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>

        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#resultentry" data-id="rsltentry">Result Entry</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#positiverslt" data-id="positvrslt">Positive Results</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#negativerslt" data-id="negatvrslt">Negative Results</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#samplereject" data-id="samplerejct">Samples Rejected</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#allresults" data-id="allreslts">All Results</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#detailreport" data-id="detail_report">Detailed Report</a>
          </li>
          
        </ul>
        <div class="tab-content mt-1">
          <!-- Result Entry Tab -->
          <div class="tab-pane active" id="resultentry">
            <h4></h4>
            <table id="table_resultentry" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID No</th>
                        <th>Patient Name</th>
                        <th>Gender</th>
                        <th>Phone No</th>
                        <th>Sample ID</th>
                        <th>HESN ID</th>
                        <th>Collection Time</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                
            </table>
          </div>
          <!-- Positive Results Tab -->
          <div class="tab-pane fade" id="positiverslt">
            <h4></h4>
            <table id="table_positiverslt" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID No</th>
                        <th>Patient Name</th>
                        <th>Gender</th>
                        <th>Phone No</th>
                        <th>Sample ID</th>
                        <th>HESN ID</th>
                        <th>Collection Time</th>
                        <th>Result / Reporting Time</th>
                        <th>Result</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                
            </table>
          </div>
          <!-- Negative Results Tab -->
          <div class="tab-pane fade" id="negativerslt">
            <h4></h4>
            <table id="table_negativerslt" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID No</th>
                        <th>Patient Name</th>
                        <th>Gender</th>
                        <th>Phone No</th>
                        <th>Sample ID</th>
                        <th>HESN ID</th>
                        <th>Collection Time</th>
                        <th>Result / Reporting Time</th>
                        <th>Result</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                
            </table>
          </div>
          <!-- Samples Rejected Tab -->
          <div class="tab-pane fade" id="samplereject">
            <h4></h4>
            <table id="table_samplereject" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID No</th>
                        <th>Patient Name</th>
                        <th>Gender</th>
                        <th>Phone No</th>
                        <th>Sample ID</th>
                        <th>HESN ID</th>
                        <th>Collection Time</th>
                        <th>Result / Reporting Time</th>
                        <th>Result</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                
            </table>
          </div>
          <!-- All Results Tab -->
          <div class="tab-pane fade" id="allresults">
            <h4></h4>
            <table id="table_allresults" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID No</th>
                        <th>Patient Name</th>
                        <th>Gender</th>
                        <th>Phone No</th>
                        <th>Sample ID</th>
                        <th>HESN ID</th>
                        <th>Collection Time</th>
                        <th>Result / Reporting Time</th>
                        <th>Remarks</th>
                        <th>Result</th>
                    
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                
            </table>
          </div>
          <!-- Detailed Report -->
          <div class="tab-pane fade" id="detailreport">
            <h4></h4>
            <table id="table_detailreport" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID No</th>
                        <th>Patient Name</th>
                        <th>Gender</th>
                        <th>Phone No</th>
                        <th>Sample ID</th>
                        <th>HESN ID</th>
                        <th>PCR</th>
                        <th>IPC</th>
                        <th>LAB</th>
                        <th>Test Result</th>
                        <th>Remarks</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                
            </table>
          </div>
          
        </div>

  <!--Update Model-->
    <div class="modal fade" id="updaterslt_Modal"  data-backdrop="static" data-keyboard="false">
    <form  id="updatersltForm" method="post" enctype='multipart/form-data'>
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update PCR Result</h4>
            
          </div>

          <!-- Modal body -->
          <div class="modal-body row">
            <input type="hidden" name="id" id="id" value="">
            <div class="form-group  col-md-6">
              <label for="patientname">Patient Name:</label>
              <input type="text" class="form-control form-control-sm" placeholder="Patient Name" name="rsltentry_pname" id="rsltentry_pname" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="idnumber">ID No:</label>
              <input type="text" class="form-control form-control-sm" placeholder="ID No" name="rsltentry_idno" id="rsltentry_idno" readonly>
            </div>
            <div class="form-group  col-md-6">
              <label for="hesnid">HESN ID:</label>
              <input type="text" class="form-control form-control-sm" placeholder="HESN ID" name="rsltentry_hesn" id="rsltentry_hesn" readonly>
            </div>
            <div class="form-group  col-md-6">
              <label for="sampleid">Sample ID:</label>
              <input type="text" class="form-control form-control-sm" placeholder="Sample ID" name="rsltentry_sampleid" id="rsltentry_sampleid" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="collectiontime">Collection Time:</label>
              <input type="text" class="form-control form-control-sm" placeholder="Colletion Time" name="rsltentry_collectntime" id="rsltentry_collectntime" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="result">Result: <span class="r_star">*</span></label>
              <select class="form-control form-control-sm" name="rsltentry_result" id="rsltentry_result">
                <option value="">Select</option>
                <option value="1">Positive</option>
                <option value="2">Negative</option>
                <option value="3">Sample Rejected</option>
              </select>
            </div>
            <div class="col-6">
               <button type="button" class="btn btn-secondary btn-block btn-sm mt-2" data-dismiss="modal">Cancel</button>
            </div>
            <div class="col-6">
              <button type="submit" class="btn btn-primary  btn-block btn-sm mt-2" id="resultentry_submit">Update Result</button>
            </div>
          </div>

          <!-- Modal footer -->
         
        </div>
      </div>
    </form>
    </div>

  <!--/Update Model-->
        
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

<script src="<?php echo base_url(); ?>skin/custom/js/test_result.js"></script>

<script src="<?php echo base_url(); ?>skin/assets/plugins/sweetalert/dist/sweetalert2.all.min.js"></script>