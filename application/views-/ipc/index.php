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
                      <h3 class="mb-0"><?php echo $today_totalpcr; ?></h3> <span class="d-block ms-2"> &nbsp;Patients</span>
                    </div>
                    <p class="fs-normal mb-0"><h6>Today's PCR Entries</h6></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="box d-flex rounded-2 align-items-center p-3">
                  <i class="fa fa-file fa-2x text-center bg-success rounded-circle"></i>
                  <div class="ms-3" style="padding-left: 15px;">
                    <div class="d-flex align-items-center">
                      <h3 class="mb-0"><?php echo $today_complete; ?></h3> <span class="d-block ms-2"> &nbsp;Patients</span>
                    </div>
                    <p class="fs-normal mb-0"><h6>Today's IPC Updation Completed</h6></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
                  <i class="fa fa-file fa-2x text-center bg-danger rounded-circle"></i>
                  <div class="ms-3" style="padding-left: 15px;">
                    <div class="d-flex align-items-center">
                      <h3 class="mb-0"><?php echo $today_pending; ?></h3> <span class="d-block ms-2"> &nbsp;Patients</span>
                    </div>
                    <p class="fs-normal mb-0"><h6>Today's IPC Updation Pending</h6></p>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>

        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#ipc_pending" data-id="ipc_pendg">Pending</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#ipc_complete" data-id="ipc_complt">Completed</a>
          </li>
          
        </ul>
        <div class="tab-content mt-1">
          <div class="tab-pane active" id="ipc_pending">
            <h4></h4>
            <table id="table_ipcpendng" class="table table-striped" style="width:100%">
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
          <div class="tab-pane fade" id="ipc_complete">
            <h4></h4>
            <table id="table_ipccomplt" class="table table-striped" style="width:100%">
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

  <!--Update Model-->
    <div class="modal fade" id="ipcupdate_Modal"  data-backdrop="static" data-keyboard="false">
    <form  id="ipcupdateForm" method="post" enctype='multipart/form-data'>
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update IPC</h4>
            
          </div>

          <!-- Modal body -->
          <div class="modal-body row">
            <input type="hidden" name="id" id="id" value="">
            <div class="form-group  col-md-6">
              <label for="hesnid">HESN ID: <span class="r_star">*</span></label>
              <input type="text" class="form-control form-control-sm" placeholder="HESN ID" name="ipc_hesnid" id="ipc_hesnid" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
              <label for="sampleid">Sample ID: <span class="r_star">*</span></label>
              <input type="text" class="form-control form-control-sm" placeholder="Sample ID" name="ipc_sampleid" id="ipc_sampleid" autocomplete="off">
            </div>
            <div class="col-6">
               <button type="button" class="btn btn-secondary btn-block btn-sm mt-2" data-dismiss="modal">Cancel</button>
            </div>
            <div class="col-6">
              <button type="submit" class="btn btn-primary  btn-block btn-sm mt-2" id="ipc_update">Update</button>
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

<script src="<?php echo base_url(); ?>skin/custom/js/ipc.js"></script>