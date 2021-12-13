<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#status-<?php echo $mahasiswa->id_mahasiswa ?>">
  <i class="fa fa-edit"></i> Upload Foto
</button>

<div class="modal fade" id="status-<?php echo $mahasiswa->id_mahasiswa ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Upload Foto</h4>
      </div>
      <div class="modal-body">
        <div class="callout callout-info">
            Upload Foto Anda Disini
      </div>
      </div>
      <div class="modal-footer">
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
        echo form_open_multipart(base_url('mahasiswa/profile/edit_profile_foto/'.$mahasiswa->id_mahasiswa));
         ?>
         <div class="form-group">
               <label class="col-md-2 control-label">Foto</label>
               <div class="col-md-5">
                 <input type="file" name="foto" class="form-control" value="<?php echo $mahasiswa->foto ?>">
                 Foto Lama : <br> <img src="<?php echo base_url('assets/upload/foto/'.$mahasiswa->foto)?>" class="img img-responsive img-thumbnail" width="200" >
               </div>
          </div>
          <input type="hidden" name="nama_mahasiswa" value="<?php echo $mahasiswa->nama_mahasiswa ?>">
          <input type="hidden" name="tempat_lahir" value="<?php echo $mahasiswa->tempat_lahir ?>">
          <input type="hidden" name="tanggal_lahir" value="<?php echo $mahasiswa->tanggal_lahir ?>">
          <input type="hidden" name="username" value="<?php echo $mahasiswa->username ?>">
          <input type="hidden" name="password" value="<?php echo $mahasiswa->password ?>">
          <input type="hidden" name="nama_prodi" value="<?php echo $mahasiswa->nama_prodi ?>">
          <input type="hidden" name="nama_fakultas" value="<?php echo $mahasiswa->nama_fakultas ?>">
          <input type="hidden" name="st" value="<?php echo $mahasiswa->st ?>">
          <button name="submit" type="submit" class="btn btn-success"><i class="fa fa-edit"></i>Upload Foto</button>

        <?php echo form_close(); ?>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
