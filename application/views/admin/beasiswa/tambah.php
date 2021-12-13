<?php
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open(base_url('admin/beasiswa/tambah'),' class="form-horizontal"');
 ?>
    <div class="form-group">
          <label class="col-md-2 control-label">Nama Beasiswa</label>
          <div class="col-md-5">
            <input type="text" name="nama_beasiswa" class="form-control" placeholder="Masukkan Nama Kelas" value="<?php echo set_value('nama_beasiswa')?>" required>
          </div>
     </div>
     <div class="form-group">
           <label class="col-md-2 control-label">Periode</label>
           <div class="col-md-5">
             <input type="number" name="periode" class="form-control" placeholder="Masukkan Periode" value="<?php echo set_value('periode')?>" required>
           </div>
      </div>
     <div class="form-group">
           <label class="col-md-2 control-label">Tanggal Dibuka</label>
           <div class="col-md-5">
             <input type="date" name="tanggal_dibuka" class="form-control" value="<?php echo set_value('tanggal_dibuka')?>" required>
           </div>
      </div>
      <div class="form-group">
            <label class="col-md-2 control-label">Tanggal Ditutup</label>
            <div class="col-md-5">
              <input type="date" name="tanggal_ditutup" class="form-control" value="<?php echo set_value('tanggal_ditutup')?>" required>
            </div>
       </div>
       <div class="form-group">
             <label class="col-md-2 control-label">Persyaratan</label>
             <div class="col-md-5">
               <textarea type="text" style="height:200px" name="persyaratan" class="form-control" value="<?php echo set_value('persyaratan')?>" required></textarea>
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
