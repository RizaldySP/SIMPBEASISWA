<?php
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open(base_url('admin/fakultas/tambah'),' class="form-horizontal"');
 ?>
    <div class="form-group">
          <label class="col-md-2 control-label">Nama Fakultas</label>
          <div class="col-md-5">
            <input type="text" name="nama_fakultas" class="form-control" placeholder="Masukkan Nama fakultas" value="<?php echo set_value('nama_fakultas')?>" required>
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
