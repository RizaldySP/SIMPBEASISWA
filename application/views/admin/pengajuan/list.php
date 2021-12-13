

  <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admin/pengajuan/cari_pengajuan'); ?>">
    <div class="box-body">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <select name="nama_mahasiswa" class="form-control select2" style="width: 100%;">
            <option disabled selected="selected">Cari Pengajuan Nama Mahasiswa</option>
            <?php foreach ($cari_pengajuan as $cari_pengajuan ) { ?>
            <option value="<?php echo $cari_pengajuan->nama_mahasiswa?>">
              <?php echo $cari_pengajuan->nama_mahasiswa ?>
            </option>
            <?php } ?>
            </select>
          </div>
        </div>
          <input type="submit" class="btn btn-info"></input>
      </div>
    </div>
  </form>

  <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admin/pengajuan/export_laporan_data_beasiswa'); ?>">
    <div class="box-body">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <select name="nama_beasiswa" class="form-control select2" style="width: 100%;">
            <option disabled selected="selected">Cari Berdasarkan Nama Beasiswa</option>
            <?php foreach ($cari_pengajuan_bakm as $cari_pengajuan_bakm ) { ?>
            <option value="<?php echo $cari_pengajuan_bakm->nama_beasiswa?>">
              <?php echo $cari_pengajuan_bakm->nama_beasiswa ?>
            </option>
            <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <select name="periode" class="form-control select2" style="width: 100%;">
            <option disabled selected="selected">Cari Berdasarkan Periode</option>
            <?php foreach ($cari_periode_bakm as $cari_periode_bakm ) { ?>
            <option value="<?php echo $cari_periode_bakm->periode?>">
              <?php echo $cari_periode_bakm->periode ?>
            </option>
            <?php } ?>
            </select>
          </div>
        </div>
        <button class="btn btn-success btn-md" name="submit" type="submit">
        <i class="fa fa-print"></i> Export Data Penerima Beasiswa
        </button>
      </div>
    </div>
  </form>

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
        <td><?php echo $pengajuan->nama_mahasiswa ?></td>
        <td><?php echo $pengajuan->nama_beasiswa ?></td>
        <td><?php echo $pengajuan->periode ?></td>
        <td><?php echo $pengajuan->tanggal_pengajuan ?></td>
        <td><?php echo $pengajuan->tanggal_verifikasi ?></td>
        <td><?php echo $pengajuan->status ?></td>
        <td><?php echo $pengajuan->keterangan ?></td>
        <td>
          <?php include('status.php') ?>
          <a href="<?php echo base_url('admin/pengajuan/detail/' .$pengajuan->id_pengajuan) ?>" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> Lihat Detail </a>

      </tr>
    <?php $no++; } ?>
    </tbody>
  </table>
