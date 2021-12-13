<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#status-<?php echo $pengajuan->id_pengajuan ?>">
  <i class="fa fa-edit"></i> Status
</button>

<div class="modal fade" id="status-<?php echo $pengajuan->id_pengajuan ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Ubah Status pengajuan</h4>
      </div>
      <div class="modal-body">
        <div class="callout callout-warning">
            <h4>Peringatan</h4>
            Validasi data beasiswa mahasiswa, Yakin ingin mengubah status pengajuan ?
            Sebelum memvalidasi data beasiswa, lihat berkas terlebih dahulu
      </div>
      </div>
      <div class="modal-footer">
        <?php
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
          <div class="form-group">
                <label class="col-md-5 control-label">Ubah Status Pengajuan</label>
                <div class="col-md-5">
                  <select name="status" class="form-control">
                    <option value="Berkas Diterima">Berkas Diterima</option>
                    <option value="Berkas Ditolak">Berkas Ditolak</option>
                    <option value="Mendapat Beasiswa">Mendapat Beasiswa</option>
                  </select>
                </div>
           </div>
          <button name="submit" type="submit" class="btn btn-success"><i class="fa fa-edit"></i>Ubah Status Pengajuan</button>
        <?php echo form_close(); ?>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
