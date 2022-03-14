<div class="p-5 "></div>
    <span class="fixed-bottom">    
      <hr>

      <footer class="text-center ">
        <div class="mb-2 row">
          <div class="col-12">
             <small>
              © 2022 Powered <i class="fa fa-heart" style="color:red"></i> <a target="_blank" rel="noopener noreferrer" href="#">
                Qzolve IT Solutions Pvt. Ltd
              </a>
            </small>
          </div>
        </div>
      </footer>
    </span>
    </div>
  </main>
  <!-- page-content" -->
</div>

      <!--Logout Model-->

        <div class="modal fade" id="logoutModal" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Are You Sure to Logout?</h4>
                
              </div>

              <!-- Modal body -->
              <form action="<?php echo base_url; ?>login/logout" method="post">
              <div class="modal-body row">
                
                  <input type="hidden" name="">
                  <div class="col-12 text-center">
                  </div>
                  <div class="col-6">
                     <button type="button" class="btn btn-secondary btn-block btn-sm mt-2" data-dismiss="modal">Cancel</button>
                  </div>
                   <div class="col-6">
                     <button type="submit" class="btn btn-primary  btn-block btn-sm mt-2">Logout</button>
                  </div>
                
              </div>
              </form>

              <!-- Modal footer -->
              
            </div>
          </div>
        </div>
  <!--/Logout Model-->
  
<!-- page-wrapper -->
    <script src="<?php echo base_url(); ?>skin/assets/plugins/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>skin/assets/plugins/popper.js/1.12.9/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>skin/assets/plugins/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
</body>
<script type="text/javascript">

<?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php }else if($this->session->flashdata('error')){  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php }else if($this->session->flashdata('warning')){  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('info')){  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>

</script>
</html>