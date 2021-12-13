<?php
//notifikasi
if ($this->session->flashdata('sukses')) {
  echo '<p class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}

//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open(base_url('mahasiswa/profile/edit_username_password'),' class="form-horizontal"');
 ?>
     <input type="hidden" name="nama_mahasiswa" value="<?php echo $mahasiswa->nama_mahasiswa ?>">
     <input type="hidden" name="tempat_lahir" value="<?php echo $mahasiswa->tempat_lahir ?>">
     <input type="hidden" name="tanggal_lahir" value="<?php echo $mahasiswa->tanggal_lahir ?>">
     <input type="hidden" name="nama_prodi" value="<?php echo $mahasiswa->nama_prodi ?>">
     <input type="hidden" name="nama_fakultas" value="<?php echo $mahasiswa->nama_fakultas ?>">
     <input type="hidden" name="st" value="<?php echo $mahasiswa->st ?>">
      <div class="form-group">
            <label class="col-md-2 control-label">Username</label>
            <div class="col-md-5">
              <input type="text" name="username" class="form-control" value="<?php echo  $mahasiswa->username ?>" required>
            </div>
       </div>
       <div class="form-group">
             <label class="col-md-2 control-label">Password</label>
             <div class="col-md-5">
               <input type="password" name="password" class="form-control" value="<?php echo  $mahasiswa->password ?>" required>
               <p class="label label-warning">Ubah password apabila diperlukan saja dan jangan klik simpan apabila password tidak diedit</p>
             </div>
        </div>
      <div class="form-group">
            <label class="col-md-2 control-label"></label>
            <div class="col-md-5">
              <button class="btn btn-success btn-lg" name="submit" type="submit">
              <i class="fa fa-save"></i>Simpan
              </button>
              <button class="btn btn-info btn-lg" name="reset" type="reset">
              <i class="fa fa-times"></i>Reset
              </button>
            </div>
       </div>
 <?php echo form_close();
