<p>
  <a href="<?php echo base_url('admin/beasiswa/tambah') ?>" class="btn btn-success btn-small">
    <i class="fa fa-plus"></i> Tambah Informasi Beasiswa
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
        <th>Nama Beasiswa</th>
        <th>Periode</th>
        <th>Tanggal Dibuka</th>
        <th>Tanggal Ditutup</th>
        <th>Persyaratan</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($beasiswa as $beasiswa) {  ?>
      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $beasiswa->nama_beasiswa ?></td>
        <td><?php echo $beasiswa->periode ?></td>
        <td><?php echo $beasiswa->tanggal_dibuka ?></td>
        <td><?php echo $beasiswa->tanggal_ditutup ?></td>
        <td><?php echo $beasiswa->persyaratan ?></td>
        <td><?php echo $beasiswa->status ?></td>

        <td>
          <?php include('status.php') ?>
          <a href="<?php echo base_url('admin/beasiswa/edit/' .$beasiswa->id_beasiswa) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit </a>
          <a href="<?php echo base_url('admin/beasiswa/delete/' .$beasiswa->id_beasiswa) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
        </td>

      </tr>
    <?php $no++; } ?>
    </tbody>
  </table>
