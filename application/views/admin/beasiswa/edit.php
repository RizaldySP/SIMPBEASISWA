<?php
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open(base_url('admin/beasiswa/edit/'.$beasiswa->id_beasiswa),' class="form-horizontal"');
 ?>
    <div class="form-group">
          <label class="col-md-2 control-label">Nama Beasiswa</label>
          <div class="col-md-5">
            <input type="text" name="nama_beasiswa" class="form-control" value="<?php echo  $beasiswa->nama_beasiswa ?>" required>
          </div>
     </div>
     <div class="form-group">
           <label class="col-md-2 control-label">Periode</label>
           <div class="col-md-5">
             <input type="number" name="periode" class="form-control" value="<?php echo  $beasiswa->periode ?>" required>
           </div>
      </div>
     <div class="form-group">
           <label class="col-md-2 control-label">Nama Tanggal Dibuka</label>
           <div class="col-md-5">
             <input type="text" name="tanggal_dibuka" class="form-control" value="<?php echo  $beasiswa->tanggal_dibuka ?>" required>
           </div>
      </div>
      <div class="form-group">
            <label class="col-md-2 control-label">Nama Tanggal Ditutup</label>
            <div class="col-md-5">
              <input type="text" name="tanggal_ditutup" class="form-control" value="<?php echo  $beasiswa->tanggal_ditutup ?>" required>
            </div>
       </div>
       <div class="form-group">
             <label class="col-md-2 control-label">Persyaratan</label>
             <div class="col-md-5">
               <input type="text" name="persyaratan" class="form-control" value="<?php echo  $beasiswa->persyaratan ?>" required>
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
