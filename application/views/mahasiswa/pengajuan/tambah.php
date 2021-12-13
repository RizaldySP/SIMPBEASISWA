<?php
//error upload
if(isset($error)){
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}

//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open //multipart adalah syarat untuk mengupload data
echo form_open_multipart(base_url('mahasiswa/pengajuan/tambah'),' class="form-horizontal"');
 ?>
 <div class="form-group">
       <label class="col-md-2 control-label">NIM</label>
       <div class="col-md-5">
         <input readonly type="text" class="form-control" value="<?php echo $this->session->userdata('nim') ?>" required>
       </div>
 </div>
 <div class="form-group">
       <label class="col-md-2 control-label">Nama Mahasiswa</label>
       <div class="col-md-5">
         <input readonly type="text" class="form-control" value="<?php echo $this->session->userdata('nama_mahasiswa') ?>" required>
       </div>
 </div>
 <div class="form-group">
   <label class="col-md-2 control-label">Nama Fakultas</label>
   <div class="col-md-5">
   <select name="periode" id="periode" class="form-control">
     <option value="0">No Select</option>
   </select>
  </div>
 </div>
 <div class="form-group">
   <label class="col-md-2 control-label">Nama Beasiswa</label>
   <div class="col-md-5">
   <select name="nama_beasiswa" id="nama_beasiswa" class="form-control">
     <option value="0">No Select</option>
     <?php foreach ($beasiswa as $beasiswa ) { ?>
     <?php echo "<option value='$beasiswa->nama_beasiswa'> $beasiswa->nama_beasiswa</option>" ?>
     <?php } ?>
   </select>
  </div>
 </div>
  <div class="form-group">
        <label class="col-md-2 control-label">Upload Berkas</label>
        <div class="col-md-5">
          <input type="file" name="berkas" class="form-control" value="<?php echo set_value('berkas')?>" required>
          <p class="label label-warning">Upload Berkas hanya bisa PDF dan DOCX</p>
        </div>
  </div>
  <div class="form-group">
        <label class="col-md-2 control-label"></label>
      <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
        <i class="fa fa-save"></i> Upload Pengajuan
        </button>
        <button class="btn btn-info btn-lg" name="reset" type="reset">
        <i class="fa fa-times"></i> Reset
        </button>
      </div>
    </div>
<?php echo form_close(); ?>

<script>
$(document).ready(function(){
  $('#nama_beasiswa').change(function(){
      var id = $(this).val();
      $.ajax({
        url: "<?= base_url(); ?>mahasiswa/pengajuan/get_beasiswa",
        method: "POST",
        dataType: "JSON",
        data: {
          id:id
        },
        success: function(array){
          var html= '';
          for (let index = 0; index < array.length; index++){
            html += '<option value='+array[index].periode+'>' + array[index].periode + '</option>'
          }
          $('#periode').html(html);
        }
      })
    })
  })
</script>
