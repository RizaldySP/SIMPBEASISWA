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
    </thead>
    <tbody>
  </table>
