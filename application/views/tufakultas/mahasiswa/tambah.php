<?php
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open(base_url('tufakultas/mahasiswa/tambah'),' class="form-horizontal"');
 ?>

 <!-- /.form-group -->
 <div class="form-group">
   <label class="col-md-2 control-label">Nama Fakultas</label>
   <div class="col-md-5">
   <select name="id_fakultas" id="fakultas" class="form-control">
     <option value="0">No Select</option>
   </select>
  </div>
 </div>
 <div class="form-group">
   <label class="col-md-2 control-label">Nama Prodi</label>
   <div class="col-md-5">
   <select name="id_prodi" id="prodi" class="form-control">
     <option value="0">No Select</option>
     <?php foreach ($prodi as $prodi ) { ?>
     <?php echo "<option value='$prodi->id_prodi'> $prodi->nama_prodi</option>" ?>
     <?php } ?>
   </select>
  </div>
 </div>
 <div class="form-group">
       <label class="col-md-2 control-label">NIM</label>
       <div class="col-md-5">
         <input type="number" name="nim" class="form-control" placeholder="Masukkan NIM" value="<?php echo set_value('nim')?>" required>
       </div>
  </div>
    <div class="form-group">
          <label class="col-md-2 control-label">Nama Mahasiswa</label>
          <div class="col-md-5">
            <input type="text" name="nama_mahasiswa" class="form-control" placeholder="Masukkan Nama Mahasiswa" value="<?php echo set_value('nama_mahasiswa')?>" required>
          </div>
     </div>
     <div class="form-group">
           <label class="col-md-2 control-label">Username</label>
           <div class="col-md-5">
             <input type="text" name="username" class="form-control" placeholder="Masukkan Username" value="<?php echo set_value('username')?>" required>
           </div>
      </div>
      <div class="form-group">
            <label class="col-md-2 control-label">Password</label>
            <div class="col-md-5">
              <input type="password" name="password" class="form-control" placeholder="Masukkan Password" value="<?php echo set_value('password')?>" required>
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

 <script>
 $(document).ready(function(){
   $('#prodi').change(function(){
       var id = $(this).val();
       $.ajax({
         url: "<?= base_url(); ?>tufakultas/mahasiswa/get_prodi",
         method: "POST",
         dataType: "JSON",
         data: {
           id:id
         },
         success: function(array){
           var html= '';
           for (let index = 0; index < array.length; index++){
             html += '<option value='+array[index].id_fakultas+'>' + array[index].nama_fakultas + '</option>'
           }
           $('#fakultas').html(html);
         }
       })
     })
   })
 </script>
