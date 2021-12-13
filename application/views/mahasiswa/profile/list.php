          <?php
          //notifikasi
          if ($this->session->flashdata('sukses')) {
            echo '<p class="alert alert-success">';
            echo $this->session->flashdata('sukses');
            echo '</div>';
          }
          ?>
          <!-- Profile Image -->

          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-box" style="width: 200px;" src="<?php echo base_url('assets/upload/foto/'.$mahasiswa->foto)?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $mahasiswa->nama_mahasiswa ?></h3>
              <center><?php include('upload_foto.php') ?></center>
              <br>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nama Mahasiswa</b> <a class="pull-right"><?php echo $mahasiswa->nama_mahasiswa ?></a>
                </li>
                <li class="list-group-item">
                  <b>Tempat, Tanggal Lahir</b> <a class="pull-right"><?php echo $mahasiswa->tempat_lahir ?>, <?php echo $mahasiswa->tanggal_lahir ?></a>
                </li>
                <li class="list-group-item">
                  <b>Username</b> <a class="pull-right"><?php echo $mahasiswa->username ?></a>
                </li>
                <li class="list-group-item">
                  <b>Password</b> <a class="pull-right"><?php echo $mahasiswa->password ?></a>
                </li>
                <li class="list-group-item">
                  <b>Prodi</b> <a class="pull-right"><?php echo $mahasiswa->nama_prodi ?></a>
                </li>
                <li class="list-group-item">
                  <b>Fakultas</b> <a class="pull-right"><?php echo $mahasiswa->nama_fakultas ?></a>
                </li>
              </ul>

              <a href="<?php echo base_url('mahasiswa/profile/edit_profile') ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit Profile </a>
              <a href="<?php echo base_url('mahasiswa/profile/edit_username_password') ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit Username dan Password </a>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
