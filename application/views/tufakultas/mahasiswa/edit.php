<?php
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open(base_url('tufakultas/mahasiswa/edit/'.$mahasiswa->id_mahasiswa),' class="form-horizontal"');
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
