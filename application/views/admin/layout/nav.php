<!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">

     <!-- /.search form -->
     <!-- sidebar menu: : style can be found in sidebar.less -->
     <ul class="sidebar-menu" data-widget="tree">
       <li class="header">MAIN NAVIGATION</li>

       <!-- Menu Dashboard -->
      <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard text-aqua"></i> <span>Dashboard</span></a></li>
       <!-- Menu Admin -->
       <li class="treeview">
         <a href="#">
           <i class="fa fa-user"></i> <span>All Login</span>
           <span class="pull-right-container">
             <span class="label label-primary pull-right">1</span>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-list"></i> Data Akses Login</a></li>
         </ul>
       </li>
        <!-- Menu Master Pengajuan -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Pengajuan</span>
            <span class="pull-right-container">
              <span class="label label-danger pull-right">1</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/pengajuan') ?>"><i class="fa fa-list"></i> Data Pengajuan</a></li>
          </ul>
        </li>
        <!-- Menu Master Data Fakultas-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Fakultas & Prodi</span>
            <span class="pull-right-container">
              <span class="label label-danger pull-right">1</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/fakultas') ?>"><i class="fa fa-list"></i> Data Fakultas</a></li>
            <li><a href="<?php echo base_url('admin/prodi') ?>"><i class="fa fa-list"></i> Data Prodi</a></li>
          </ul>
        </li>
        <!-- Menu Master Data Beasiswa -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Beasiswa</span>
            <span class="pull-right-container">
              <span class="label label-danger pull-right">1</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/beasiswa') ?>"><i class="fa fa-list"></i> Data beasiswa</a></li>
          </ul>
        </li>
        

     </ul>
   </section>
   <!-- /.sidebar -->
  </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
       <h1>
        <?php echo $title ?>
       </h1>
       <ol class="breadcrumb">
         <li><a href="<?php echo base_url('admin/dashboard') ?>"><i></i><?php echo $this->session->userdata('nama') ?></a></li>
         <li><a>Tables</a></li>
         <li class="active"><?php echo $title ?></li>
       </ol>
     </section>

     <!-- Main content -->
     <section class="content">
       <div class="row">
         <div class="col-xs-12">
           <div class="box">

             <!-- /.box-header -->
             <div class="box-body">
