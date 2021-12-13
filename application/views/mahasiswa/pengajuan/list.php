
  <p>
    <a href="<?php echo base_url('mahasiswa/pengajuan/tambah') ?>" class="btn btn-success btn-small">
      <i class="fa fa-plus"></i> Tambah Pengajuan
    </a>
  </p>

  <?php
  //notifikasi
  if ($this->session->flashdata('sukses')) {
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
  }
  ?>

  <table class="table table-bordered" id="example1">
    <thead>
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama Mahasiswa</th>
        <th>Nama Beasiswa</th>
        <th>Periode</th>
        <th>Tanggal Pengajuan</th>
        <th>Tanggal Verifikasi</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($pengajuan as $pengajuan) {  ?>
      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $pengajuan->nim ?></td>
        <td><?php echo $pengajuan->nama_mahasiswa ?></td>
        <td><?php echo $pengajuan->nama_beasiswa ?></td>
        <td><?php echo $pengajuan->periode ?></td>
        <td><?php echo $pengajuan->tanggal_pengajuan ?></td>
        <td><?php echo $pengajuan->tanggal_verifikasi ?></td>
        <td><?php echo $pengajuan->status ?></td>
        <td><?php echo $pengajuan->keterangan ?></td>
        <td>
          <a href="<?php echo base_url("/assets/upload/file/$pengajuan->berkas")?>" download class="btn btn-danger btn-xs"><i class="fa fa-download"></i> Download File </a>
        </td>

      </tr>
    <?php $no++; } ?>
    </tbody>
  </table>
