<?php
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open(base_url('admin/prodi/edit/'.$prodi->id_prodi),' class="form-horizontal"');
 ?>

 <div class="form-group">
    <label class="col-md-2 control-label">Nama Fakultas</label>
    <div class="col-md-5">
      <select name="id_fakultas" class="form-control" required>
        <?php foreach ($fakultas as $fakultas ) { ?>
       <?php $selected = $fakultas->id_fakultas == $quiz->id_fakultas ? 'selected':'' ?>
        <option value="<?php echo $fakultas->id_fakultas?>" <?php echo $selected ?>>
          <?php echo $fakultas->nama_fakultas ?>
        </option>
        <?php } ?>
      </select>
    </div>
  </div>
   <div class="form-group">
         <label class="col-md-2 control-label">Nama Prodi</label>
         <div class="col-md-5">
           <input type="text" name="nama_prodi" class="form-control" value="<?php echo $prodi->nama_prodi ?>" required>
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
 <?php echo form_close(); ?>
