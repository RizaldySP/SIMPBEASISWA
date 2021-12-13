<p>
  <a href="<?php echo base_url('admin/fakultas/tambah') ?>" class="btn btn-success btn-small">
    <i class="fa fa-plus"></i> Tambah Baru
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
        <th>Nama Fakultas</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($fakultas as $fakultas) {  ?>
      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $fakultas->nama_fakultas ?></td>
        <td>
          <a href="<?php echo base_url('admin/fakultas/edit/' .$fakultas->id_fakultas) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit </a>
          <a href="<?php echo base_url('admin/fakultas/delete/' .$fakultas->id_fakultas) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
        </td>

      </tr>
    <?php $no++; } ?>
    </tbody>
  </table>
