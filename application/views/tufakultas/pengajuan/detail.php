<h1><?php echo $title?></h1>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th width="20%">NIM</th>
        <th> <?php echo $pengajuan->nim ?></th>
      </tr>
      <tr>
        <th width="20%">Nama Mahasiswa</th>
        <th> <?php echo $pengajuan->nama_mahasiswa ?></th>
      </tr>
      <tr>
        <th width="20%">Tempat, Tanggal Lahir</th>
        <th> <?php echo $pengajuan->tempat_lahir ?>, <?php echo $pengajuan->tanggal_lahir ?></th>
      </tr>
      <tr>
        <th width="20%">Fakultas</th>
        <th> <?php echo $pengajuan->nama_fakultas ?></th>
      </tr>
      <tr>
        <th width="20%">Prodi</th>
        <th> <?php echo $pengajuan->nama_prodi ?></th>
      </tr>
      <tr>
        <th width="20%">Foto</th>
        <th> <img src="<?php echo base_url('assets/upload/foto/'.$pengajuan->foto)?>" class="img img-responsive img-thumbnail" width="200" ></th>
      </tr>
      <tr>
        <th width="20%">Berkas</th>
        <th> <iframe src="<?php echo base_url("/assets/upload/file/$pengajuan->berkas")?>" width="800" height="500"></iframe></th>
      </tr>
      <tr>
        <th width="20%">Tanggal Pengajuan</th>
        <th> <?php echo $pengajuan->tanggal_pengajuan ?></th>
      </tr>
        <tr>
          <th>Status</th>
          <th><?php
          //notifikasi error
          echo validation_errors('<div class="alert alert-warning">','</div>');

          //form open
          echo form_open(base_url('tufakultas/pengajuan/status/'.$pengajuan->id_pengajuan));
           ?>
            <input type="hidden" name="id_mahasiswa" value="<?php echo $pengajuan->id_mahasiswa; ?>">
            <input type="hidden" name="nama_beasiswa" value="<?php echo $pengajuan->nama_beasiswa ?>">
            <input type="hidden" name="berkas" value="<?php echo $pengajuan->berkas ?>">
            <input type="hidden" name="st" value="<?php echo $pengajuan->st ?>">
            <input type="hidden" name="tanggal_pengajuan" value="<?php echo $pengajuan->tanggal_pengajuan ?>">
            <input type="hidden" name="tanggal_verifikasi" value="<?php echo $pengajuan->tanggal_verifikasi ?>">
            <div class="form-group" id="sesudahtambahketerangan">
              <div class="col-md-5">
                <select name="status" id="tambahketerangan" class="form-control">
                  <option value="0">Pilih Status Pengajuan</option>
                  <option value="Berkas Diterima">Berkas Diterima</option>
                  <option value="Berkas Ditolak">Berkas Ditolak</option>
                  <option value="Mendapat Beasiswa">Mendapat Beasiswa</option>
                </select>
              </div>
              <div class="hide" id="kolomketerangan">
                <label>Keterangan</label>
               <input type="text" name="keterangan" value="<?php echo set_value('keterangan') ?>">
              </div>
             </div>
            <button name="submit" type="submit" class="btn btn-success"><i class="fa fa-edit"></i>Ubah Status Pengajuan</button>
          <?php echo form_close(); ?></th>
        </tr>
    </thead>
    <tbody>
  </table>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#tambahketerangan').change(function() {
        var html = $('#kolomketerangan').html();
        $('#sesudahtambahketerangan').after(html);
      });
    });
  </script>
