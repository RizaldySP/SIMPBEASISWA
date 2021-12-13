<!-- <?php
 $id_mahasiswa = $this->session->userdata('id_mahasiswa');
 $mahasiswa  = $this->mahasiswa_model->detail($id_mahasiswa);
?> -->
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('mahasiswa/dashboard')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SIMPB</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIMPBEASISWA</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/upload/foto/'.$mahasiswa->foto)?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama_mahasiswa');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/upload/foto/'.$mahasiswa->foto)?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nama_mahasiswa');?>
                  <small>Login <?php echo date('d-m-Y H:i:s') ?></small>
                </p>
              </li>

              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url('masuk/logout_mahasiswa')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
