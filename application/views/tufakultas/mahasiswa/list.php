<p>
  <a href="<?php echo base_url('tufakultas/mahasiswa/tambah') ?>" class="btn btn-success btn-small">
    <i class="fa fa-plus"></i> Tambah Mahasiswa
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
        <th>NIM</th>
        <th>Nama Mahasiswa</th>
        <th>Username</th>
        <th>Password</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($mahasiswa as $mahasiswa) {  ?>
      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $mahasiswa->nama_fakultas ?></td>
        <td><?php echo $mahasiswa->nama_prodi ?></td>
        <td><?php echo $mahasiswa->nim ?></td>
        <td><?php echo $mahasiswa->nama_mahasiswa ?></td>
        <td><?php echo $mahasiswa->username ?></td>
        <td><?php echo $mahasiswa->password ?></td>
        <td>
          <a href="<?php echo base_url('tufakultas/mahasiswa/edit/' .$mahasiswa->id_mahasiswa) ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
          <a href="<?php echo base_url('tufakultas/mahasiswa/delete/' .$mahasiswa->id_mahasiswa) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
        </td>

      </tr>
    <?php $no++; } ?>
    </tbody>
  </table>
