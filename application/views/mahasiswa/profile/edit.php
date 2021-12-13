<?php
//notifikasi
if ($this->session->flashdata('sukses')) {
  echo '<p class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<?php
//error upload
if(isset($error)){
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}

//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open_multipart(base_url('mahasiswa/profile/edit_profile'),' class="form-horizontal"');
 ?>
 <div class="form-group">
     <label class="col-md-2 control-label">Nama Fakultas</label>
     <div class="col-md-5">
       <select name="id_fakultas" class="form-control">
         <?php foreach ($fakultas as $fakultas ) { ?>
         <option value="<?php echo $fakultas->id_fakultas?>" <?php if( $mahasiswa->id_fakultas==$fakultas->id_fakultas){echo "selected";}?>>
           <?php echo $fakultas->nama_fakultas ?>
         </option>
         <?php } ?>
       </select>
     </div>
 </div>
 <div class="form-group">
     <label class="col-md-2 control-label">Nama Prodi</label>
     <div class="col-md-5">
       <select name="id_prodi" class="form-control">
         <?php foreach ($prodi as $prodi ) { ?>
         <option value="<?php echo $prodi->id_prodi?>" <?php if( $mahasiswa->id_prodi==$prodi->id_prodi){echo "selected";}?>>
           <?php echo $prodi->nama_prodi ?>
         </option>
         <?php } ?>
       </select>
     </div>
 </div>
 <div class="form-group">
       <label class="col-md-2 control-label">Foto</label>
       <div class="col-md-5">
         <input type="hidden" name="foto" class="form-control" value="<?php echo  $mahasiswa->foto ?>">
         <img src="<?php echo base_url('assets/upload/foto/'.$mahasiswa->foto)?>" class="img img-responsive img-thumbnail" width="200" >
       </div>
  </div>
    <div class="form-group">
          <label class="col-md-2 control-label">NIM</label>
          <div class="col-md-5">
            <input type="text" name="nim" class="form-control" value="<?php echo  $mahasiswa->nim ?>" required>
          </div>
     </div>
     <div class="form-group">
           <label class="col-md-2 control-label">Nama Mahasiswa</label>
           <div class="col-md-5">
             <input type="text" name="nama_mahasiswa" class="form-control" value="<?php echo  $mahasiswa->nama_mahasiswa ?>" required>
           </div>
      </div>
      <div class="form-group">
            <label class="col-md-2 control-label">Tempat Lahir</label>
            <div class="col-md-5">
              <input type="text" name="tempat_lahir" class="form-control" value="<?php echo  $mahasiswa->tempat_lahir ?>" required>
            </div>
       </div>
       <div class="form-group">
             <label class="col-md-2 control-label">Tanggal Lahir</label>
             <div class="col-md-5">
               <input type="text" name="tanggal_lahir" class="form-control" value="<?php echo  $mahasiswa->tanggal_lahir ?>" required>
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
