<p>
  <a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-danger btn-small">
    <i class="fa fa-plus"></i> Tambah Akses Login
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
        <th>Nama</th>
        <th>Fakultas</th>
        <th>Username</th>
        <th>Password</th>
        <th>Akses Level</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($user as $user) {  ?>
      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $user->nama ?></td>
        <td><?php echo $user->nama_fakultas ?></td>
        <td><?php echo $user->username ?></td>
        <td><?php echo $user->password ?></td>
        <td><?php echo $user->akses_level ?></td>
        <td>
          <a href="<?php echo base_url('admin/user/edit/' .$user->id_user) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Detail </a>
          <a href="<?php echo base_url('admin/user/delete/' .$user->id_user) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
        </td>

      </tr>
    <?php $no++; } ?>
    </tbody>
  </table>
