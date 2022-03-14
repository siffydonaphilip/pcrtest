<?php $this->load->view("common/header"); ?>

<?php $this->load->view("common/sidebar"); ?>

<style type="text/css">
  /*For Nationality Dropdown Added on 1-07-2021*/
  .select2-container {
    width: 100% !important;
  }
</style>

<link href="<?php echo base_url(); ?>skin/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>skin/assets/plugins/datepicker/jquery-ui.css" />

  <main class="page-content">
    <div class="container-fluid p-3">
      
  <!---content Area [ Please Put content in here ]-->

      <button class="btn btn-info float-right btn-sm mb-2" data-toggle="modal" data-target="#newpcr_Modal">+ New PCR Test</button>
      <br>

      <!-- begin : Datatable  -->
      <table id="table_pcrtest" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>ID No</th>
                <th>Patient Name</th>
                <th>Gender</th>
                <th>Phone No</th>
                <th>Passport Number</th>
                <th>Collection Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    <!-- begin : Datatable  -->

<!--create Model-->
    <div class="modal fade" id="newpcr_Modal"  data-backdrop="static" data-keyboard="false">
      <form id="newpcrForm" method="post" enctype='multipart/form-data' onsubmit="pcr_submit.disabled = true; return true;">
      <div class="modal-dialog  modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">New PCR Test</h4>
            
          </div>

          <!-- Modal body -->
          <div class="modal-body row">
            <div class="form-group  col-md-6">
              <label for="patientname">Patient Name: <span class="r_star">*</span></label>
              <input type="text" class="form-control form-control-sm" placeholder="Patient Name" name="pcr_ptname" id="pcr_ptname" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
              <label for="idnumber">National ID \ Iqama: <span class="r_star">*</span></label>
              <input type="text" class="form-control form-control-sm" placeholder="National ID" name="pcr_idno" id="pcr_idno" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
              <label for="dateofbirth">Date Of Birth: <span class="r_star">*</span></label>
              <input type="text" class="form-control form-control-sm" placeholder="dd-mm-yyyy" name="pcr_dob" id="pcr_dob" autocomplete="off">
            </div>
            <div class="form-group  col-md-6">
              <label for="gender">Gender: <span class="r_star">*</span></label><br>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="pcr_gender" id="pcrg_male" value="Male">Male
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="pcr_gender" id="pcrg_female" value="Female">Female
                </label>
              </div>
            </div>
            <div class="form-group  col-md-6">
              <label for="phoneno">Phone Number: <span class="r_star">*</span></label>
              <input type="number" class="form-control form-control-sm" placeholder="Enter Phone Number" name="pcr_phoneno" id="pcr_phoneno">
            </div>

            <!-- 01-07-2021 :: Begin -->
            <div class="form-group col-md-6">
              <label for="nationality">Nationality: <span class="r_star">*</span></label>
              <select class="form-control form-control-sm ctm-select2" name="pcr_nationality" id="pcr_nationality">
                <option value="">Select</option>
                <?php
                  foreach ($nationlty as $key => $nation) { 
                      echo '<option value="'.$nation->id.'">'.$nation->nt_name.'</option>';
                  } 
                ?>
              </select>
            </div>
            <div class="form-group  col-md-6">
              <label for="passportno">Passport Number:</label>
              <input type="text" class="form-control form-control-sm" placeholder="Enter Passport Number" name="pcr_passportno" id="pcr_passportno" autocomplete="off">
            </div>
            <!-- 01-07-2021 :: End -->

            <div class="form-group col-md-6">
              <label for="remarks">Remarks:</label>
              <textarea class="form-control form-control-sm" rows="1" name="pcr_remarks" id="pcr_remarks" placeholder="Remarks"></textarea>
            </div>

                

            <div class="form-group  col-md-6">
            <label for="collection_time">Collection Time:</label>
            <input type="text" class="form-control form-control-sm datetimepicker"  name="collection_time" id="collection_time" autocomplete="off">
            </div>


            <div class="form-group  col-md-6">
            </div>

            <div class="col-6">
              <button type="button" class="btn btn-secondary btn-block btn-sm mt-2" data-dismiss="modal">Cancel</button>
            </div>
            <div class="col-6">
              <button type="button" id="pcr_submit" class="btn btn-primary btn-block btn-sm mt-2" >Submit</button>
            </div>
          </div>
          <!-- Modal footer -->
         
        </div>
      </div>
    </form>
    </div>

  <!--/create Model-->


  <!--Update Model-->
    <div class="modal fade" id="updatepcr_Modal"  data-backdrop="static" data-keyboard="false">
      <form id="updatepcrForm" method="post" enctype='multipart/form-data'>
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update PCR Test</h4>
            
          </div>

          <!-- Modal body -->
          <div class="modal-body row">
            <input type="hidden" name="id" id="id" value="">
            <div class="form-group  col-md-6">
              <label for="patientname">Patient Name: <span class="r_star">*</span></label>
              <input type="text" class="form-control form-control-sm" placeholder="Patient Name" name="epcr_ptname" id="epcr_ptname" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
              <label for="idnumber">National ID \ Iqama: <span class="r_star">*</span></label>
              <input type="text" class="form-control form-control-sm" placeholder="National ID" name="epcr_idno" id="epcr_idno" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
              <label for="dateofbirth">Date Of Birth: <span class="r_star">*</span></label>
              <input type="text" class="form-control form-control-sm" placeholder="dd-mm-yyyy" name="epcr_dob" id="epcr_dob" autocomplete="off">
            </div>
            <div class="form-group  col-md-6">
              <label for="gender">Gender: <span class="r_star">*</span></label><br>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="epcr_gender" id="epcrg_male" value="Male">Male
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="epcr_gender" id="epcrg_female" value="Female">Female
                </label>
              </div>
            </div>
            <div class="form-group  col-md-6">
              <label for="phoneno">Phone Number: <span class="r_star">*</span></label>
              <input type="number" class="form-control form-control-sm" placeholder="Enter Phone Number" name="epcr_phoneno" id="epcr_phoneno">
            </div>

            <!-- 01-07-2021 :: Begin -->
            <div class="form-group col-md-6">
              <label for="nationality">Nationality: <span class="r_star">*</span></label>
              <select class="form-control form-control-sm ctm-select2" name="epcr_nationality" id="epcr_nationality">
                <option value="">Select</option>
                <?php
                  foreach ($nationlty as $key => $nation) { 
                      echo '<option value="'.$nation->id.'">'.$nation->nt_name.'</option>';
                  } 
                ?>
              </select>
            </div>
            <div class="form-group  col-md-6">
              <label for="passportno">Passport Number:</label>
              <input type="text" class="form-control form-control-sm" placeholder="Enter Passport Number" name="epcr_passportno" id="epcr_passportno" autocomplete="off">
            </div>
            <!-- 01-07-2021 :: End -->

            <div class="form-group col-md-6">
              <label for="remarks">Remarks:</label>
              <textarea class="form-control form-control-sm" rows="1" name="epcr_remarks" id="epcr_remarks" placeholder="Remarks"></textarea>
            </div>
            <div class="col-6">
              <button type="button" class="btn btn-secondary btn-block btn-sm mt-2" data-dismiss="modal">Cancel</button>
            </div>
            <div class="col-6">
              <button type="button" id="pcr_update" class="btn btn-primary btn-block btn-sm mt-2">Update</button>
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

<script src="<?php echo base_url(); ?>skin/custom/js/pcr_test.js"></script>

<script src="<?php echo base_url('skin/assets/plugins/datepicker/jquery-ui.js'); ?>"></script>

<link href="<?php echo base_url(); ?>skin/assets/plugins/select2/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>skin/assets/plugins/select2/select2.min.js"></script>




<link href="<?php echo base_url(); ?>skin/bootstrap-datetimepicker.css" rel="stylesheet" />


    <script src="<?php echo base_url(); ?>skin/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>skin/bootstrap-datetimepicker.js"></script>


<script type="text/javascript">
$(function() {
    $("#pcr_dob").datepicker({
      todayHighlight: true,
      dateFormat: 'dd-mm-yy',
      autoclose: true
    });
});

$(function() {
    $("#epcr_dob").datepicker({
      todayHighlight: true,
      dateFormat: 'dd-mm-yy',
      autoclose: true
    });
});

    var dateNow = new Date();
   $('.datetimepicker').datetimepicker({

    // format: 'DD-MM-YYYY HH:mm:ss',
    format: 'YYYY-MM-DD HH:mm',
           icons: {
               time: "fa fa-clock-o",
               date: "fa fa-calendar",
               up: "fa fa-chevron-up",
               down: "fa fa-chevron-down",
               previous: 'fa fa-chevron-left',
               next: 'fa fa-chevron-right',
               today: 'fa fa-screenshot',
               clear: 'fa fa-trash',
               close: 'fa fa-remove'
           },
          defaultDate:dateNow
        });
</script>