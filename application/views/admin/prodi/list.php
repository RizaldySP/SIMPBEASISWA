<p>
  <a href="<?php echo base_url('admin/prodi/tambah') ?>" class="btn btn-success btn-small">
    <i class="fa fa-plus"></i> Tambah Prodi
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
        <th>Fakultas</th>
        <th>Prodi</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($prodi as $prodi) {  ?>
      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $prodi->nama_fakultas ?></td>
        <td><?php echo $prodi->nama_prodi ?></td>
        <td>
          <a href="<?php echo base_url('admin/prodi/edit/' .$prodi->id_prodi) ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
          <a href="<?php echo base_url('admin/prodi/delete/' .$prodi->id_prodi) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
        </td>

      </tr>
    <?php $no++; } ?>
    </tbody>
  </table>
