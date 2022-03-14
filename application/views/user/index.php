<?php $this->load->view("common/header"); ?>

<?php $this->load->view("common/sidebar"); ?>

<link href="<?php echo base_url(); ?>skin/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

  <main class="page-content">
    <div class="container-fluid p-3">
      <button class="btn btn-info float-right btn-sm mb-2" data-toggle="modal" data-target="#updaterslt_Modal">+ New User</button>
      <br>
  <div class="tab-pane container active" id="resultentry">
            <h4></h4>
            <table id="tbl_user_dm" class="table table-striped" style="width:100%">
                <thead>
                    
    

                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Roll</th>
                        
                         <th>Action</th> 
                    </tr>
                </thead>
                <tbody>
                    
                    <?php foreach ($comp as $key => $v) { ?>
                    <tr>
                    <td><?php print_r($key+1); ?></td>
                    <td><?php print_r($v->f_name); ?></td>
                    <td><?php print_r($v->l_name); ?></td>
                    <td> <?php if ($v->id!=1) { ?> <a href="<?php echo base_url(); ?>/Testresult/delet_user?id=<?php print_r($v->id); ?>">Delete</a><?php } ?></td>
                    </tr>
                    <?php } ?>
                    
                </tbody>
                
            </table>
          </div>

  <!--Update Model-->
    <div class="modal fade" id="updaterslt_Modal"  data-backdrop="static" data-keyboard="false">
    <!--<form  id="updatersltForm" method="post" enctype='multipart/form-data'>-->
        <form action="<?php echo base_url(); ?>/Testresult/new_user"  method="post" enctype='multipart/form-data' style="padding: 7px;"  autocomplete="off">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add User</h4>
            
          </div>

          <!-- Modal body -->
          <div class="modal-body row">
            <input type="hidden" name="id" id="id" value="">
            <div class="form-group  col-md-6">
              <label for="patientname"> Name:</label>
              <input type="text" class="form-control form-control-sm" placeholder="Name" name="name" id="name">
            </div>
            <div class="form-group col-md-6">
              <label for="idnumber">Roll:</label>
              <input type="text" class="form-control form-control-sm" placeholder="Roll" name="roll" id="roll">
            </div>
           <div class="form-group col-md-6">
              <label for="idnumber">User Name:</label>
              <input type="text" class="form-control form-control-sm" placeholder="User Name" name="user_name" id="user_name">
            </div>
           <div class="form-group col-md-6">
              <label for="idnumber">Password:</label>
              <input type="text" class="form-control form-control-sm" placeholder="Password" name="password" id="password">
            </div>
           
            <div class="form-group col-md-6">
              <label for="result">Dash Board: <span class="r_star">*</span></label>
              <select class="form-control form-control-sm" name="dash" id="dash">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
<div class="form-group col-md-6">
              <label for="result">PCR Test: <span class="r_star">*</span></label>
              <select class="form-control form-control-sm" name="pcr_test" id="pcr_test">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>

<div class="form-group col-md-6">
              <label for="result">IPC: <span class="r_star">*</span></label>
              <select class="form-control form-control-sm" name="ipc" id="ipc">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
<div class="form-group col-md-6">
              <label for="result">Lab: <span class="r_star">*</span></label>
              <select class="form-control form-control-sm" name="lab" id="lab">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
<div class="form-group col-md-6">
              <label for="result">Test Result: <span class="r_star">*</span></label>
              <select class="form-control form-control-sm" name="test_result" id="test_result">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
<div class="form-group col-md-6">
              <label for="result">User: <span class="r_star">*</span></label>
              <select class="form-control form-control-sm" name="user" id="user">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>


            <div class="col-6">
               <button type="button" class="btn btn-secondary btn-block btn-sm mt-2" data-dismiss="modal">Cancel</button>
            </div>
            <div class="col-6">
              <button type="submit" class="btn btn-primary  btn-block btn-sm mt-2" >Add User</button>
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

<!--<script src="<?php echo base_url(); ?>skin/custom/js/user.js"></script>-->

<script type="text/javascript">
$(document).ready(function() {
    // alert(base_url+'testresult/user_disp')
dtable_resultentry = $('#tbl_user').DataTable({
		"bDestroy": true,
        "dom": 'Bfrtip',
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],

    	"pagingType": 'full_numbers',
        "iDisplayLength": 10,
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "order": [],

        "ajax": {
            url : base_url+'testresult/user_disp',
		    type: "POST",
		    data: { a_tab : 'target' }
        },
        "columnDefs": [
        { 
            "targets": [0],
            "orderable": false,
        },{ 
            "targets": [8],
            "orderable": false,
        }
        ],
        "fnDrawCallback": function(settings){
			$('[data-toggle="tooltip"]').tooltip();          
		}
    });
    });


  $("#user_submit").click(function(e){
        e.preventDefault();
      
        var name = $('#name').val();
        var roll = $('#roll').val();
        var user_name = $('#user_name').val();
        var password = $('#password').val();
        var dash = $('#dash').val();
        var pcr_test = $('#pcr_test').val();
        var ipc = $('#ipc').val();
        var lab = $('#lab').val();
        var test_result = $('#test_result').val();
        var user = $('#user').val();


        $.ajax({
            type: "POST",
            url : base_url+'testresult/new_user',
            dataType: 'text',
            data: { name:name, roll:roll, user_name:user_name, password:password, dash:dash, pcr_test:pcr_test, ipc:ipc, lab:lab, test_result:test_result, user:user },
            success: function(data) {
               location.reload();
            }
        }); // End ajax
    });
</script>

<script src="<?php echo base_url(); ?>skin/assets/plugins/sweetalert/dist/sweetalert2.all.min.js"></script>