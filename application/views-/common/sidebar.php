<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">PCR Test</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="<?php echo base_url();?>uploads/admin-pic/hospit.jpeg" alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">Alhammadi
            <strong>Hospital</strong>
          </span>
          <!--<span class="user-role">Administrator</span>-->
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
      <!-- <div class="sidebar-search">
        <div>
          <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
      </div> -->
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
         <?php  if ($this->session->userdata('dash') != 0) { ?>
          <li class="<?php if ($menu == "dash_board") { echo "active"; } ?>">
            <a href="<?php echo base_url; ?>dashboard">
              <i class="fa fa-book"></i>
              <span>Dashboard</span>
              <!-- <span class="badge badge-pill badge-primary">Beta</span> -->
            </a>
          </li>
          <?php } ?>
          <?php  if ($this->session->userdata('pcr_test') != 0) { ?>
          <li class="<?php if ($menu == "pcr_test") { echo "active"; } ?>">
            <a href="<?php echo base_url; ?>pcrtest">
              <i class="fa fa-calendar"></i>
              <span>PCR Test</span>
            </a>
          </li>
          <?php } ?>
          <?php  if ($this->session->userdata('ipc') != 0) { ?>
          <li class="<?php if ($menu == "ipc") { echo "active"; } ?>">
            <a href="<?php echo base_url; ?>ipc">
              <i class="fa fa-calendar"></i>
              <span>IPC</span>
            </a>
          </li>
          <?php } ?>
          <?php  if ($this->session->userdata('lab') != 0) { ?>
          <li class="<?php if ($menu == "lab") { echo "active"; } ?>">
            <a href="<?php echo base_url; ?>lab">
              <i class="fa fa-calendar"></i>
              <span>Lab</span>
            </a>
          </li>
          <?php } ?>
          <?php  if ($this->session->userdata('test_result') != 0) { ?>
          <li class="<?php if ($menu == "test_result") { echo "active"; } ?>">
            <a href="<?php echo base_url; ?>testresult">
              <i class="fa fa-folder"></i>
              <span>Test Result</span>
            </a>
          </li>
          <?php } ?>
          <?php  if ($this->session->userdata('user') != 0) { ?>
        <li class="<?php if ($menu == "user") { echo "active"; } ?>">
            <a href="<?php echo base_url; ?>dashboard/user">
              <i class="fa fa-folder"></i>
              <span>Users</span>
            </a>
          </li>
          <?php } ?>
      

          
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      
      <a href="#" class="bg-danger text-white"  style="z-index: 100"  data-toggle="modal" data-target="#logoutModal">
        Logout
      </a>
     
    </div>
  </nav>
  <!-- sidebar-wrapper  -->