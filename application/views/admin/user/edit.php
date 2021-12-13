<?php
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open(base_url('admin/user/edit/'.$user->id_user),' class="form-horizontal"');
 ?>
 <div class="form-group">
       <label class="col-md-2 control-label">Nama Pengguna</label>
       <div class="col-md-5">
         <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo $user->nama ?>" required>
       </div>
  </div>
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
         <label class="col-md-2 control-label">Username</label>
         <div class="col-md-5">
           <input type="text" name="username" class="form-control" placeholder="Masukkan Username" value="<?php echo $user->username ?>" required>
         </div>
    </div>
    <div class="form-group">
          <label class="col-md-2 control-label">Password</label>
          <div class="col-md-5">
            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" value="<?php echo $user->password ?>" required>
            <p class="label label-warning">Ubah password apabila diperlukan saja dan jangan klik simpan apabila password tidak diedit</p>
          </div>
     </div>
     <div class="form-group">
           <label class="col-md-2 control-label">Level Hak Akses</label>
           <div class="col-md-5">
             <input type="akses_level" name="akses_level" class="form-control" placeholder="Masukkan Password" value="<?php echo $user->akses_level ?>" required>
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
