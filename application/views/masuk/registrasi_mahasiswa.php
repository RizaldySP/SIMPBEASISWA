
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url() ?>"><b><?php echo $title?></a>
  </div>

  <!-- /.login -->
  <div class="register-box-body">
    <p class="login-box-msg">Registrasi Akun</p>

    <?php
    //notifikasi error
    echo validation_errors('<div class="alert alert-success">','</div');

    //notifikasi gagal cek_login
    if($this->session->flashdata('warning')){
      echo '<div class="alert alert-warning">';
      echo $this->session->flashdata('warning');
      echo '</div>';
    }

    //notifikasi logoutnya
    if($this->session->flashdata('sukses')){
      echo '<div class="alert alert-success">';
      echo $this->session->flashdata('sukses');
      echo '</div>';
    }

    //form open login
    echo form_open(base_url('masuk/registrasi_mahasiswa'));
    ?>
    <div class="form-group has-feedback">
      <select name="id_fakultas" id="fakultas" class="form-control">
        <option value="0">Fakultas</option>
      </select>
    </div>
    <div class="form-group has-feedback">
      <select name="id_prodi" id="prodi" class="form-control">
        <option value="0">Prodi</option>
        <?php foreach ($prodi as $prodi ) { ?>
        <?php echo "<option value='$prodi->id_prodi'> $prodi->nama_prodi</option>" ?>
        <?php } ?>
      </select>
    </div>
    <div class="form-group has-feedback">
      <input type="number" name="nim" class="form-control" placeholder="Masukkan NIM" value="<?php echo set_value('nim')?>" required>
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="text" name="nama_mahasiswa" class="form-control" placeholder="Masukkan Nama Anda" value="<?php echo set_value('nama_mahasiswa')?>" required>
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir Anda" value="<?php echo set_value('tempat_lahir')?>" required>
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="date" name="tanggal_lahir" class="form-control" placeholder="Masukkan Nama Anda" value="<?php echo set_value('tanggal_lahir')?>" required>
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="text" name="username" class="form-control" placeholder="Masukkan Username Anda" value="<?php echo set_value('username')?>" required>
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda" value="<?php echo set_value('password')?>" required>
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
      <div class="col-xs-8">
      </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrasi</button>
        </div>
        <!-- /.col -->
      </div>
  <?php echo form_close(); ?>

  <div class="social-auth-links text-center">
      <a href="<?php echo base_url('masuk/mahasiswa') ?>"><i class="fa fa-mail-reply"></i>
        Kembali</a>
  </div>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>/assets/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script>
$(document).ready(function(){
  $('#prodi').change(function(){
      var id = $(this).val();
      $.ajax({
        url: "<?= base_url(); ?>masuk/get_prodi",
        method: "POST",
        dataType: "JSON",
        data: {
          id:id
        },
        success: function(array){
          var html= '';
          for (let index = 0; index < array.length; index++){
            html += '<option value='+array[index].id_fakultas+'>' + array[index].nama_fakultas + '</option>'
          }
          $('#fakultas').html(html);
        }
      })
    })
  })
</script>
</body>
</html>
