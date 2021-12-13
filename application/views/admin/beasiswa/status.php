<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#status-<?php echo $beasiswa->id_beasiswa ?>">
  <i class="fa fa-edit"></i> Status
</button>

<div class="modal fade" id="status-<?php echo $beasiswa->id_beasiswa ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Ubah Status Beasiswa</h4>
      </div>
      <div class="modal-body">
        <div class="callout callout-warning">
            <h4>Peringatan</h4>
            Tutup Periode Pengajuan Beasiswa
      </div>
      </div>
      <div class="modal-footer">
        <?php
        //notifikasi error
        echo validation_errors('<div class="alert alert-warning">','</div>');

        //form open
        echo form_open(base_url('admin/beasiswa/status/'.$beasiswa->id_beasiswa));
         ?>
          <input type="hidden" name="nama_beasiswa" value="<?php echo $beasiswa->nama_beasiswa ?>">
          <input type="hidden" name="periode" value="<?php echo $beasiswa->periode ?>">
          <input type="hidden" name="persyaratan" value="<?php echo $beasiswa->persyaratan ?>">
          <input type="hidden" name="tanggal_dibuka" value="<?php echo $beasiswa->tanggal_dibuka ?>">
          <input type="hidden" name="tanggal_ditutup" value="<?php echo $beasiswa->tanggal_ditutup ?>">
          <button name="submit" type="submit" class="btn btn-success"><i class="fa fa-edit"></i>Ubah Status Beasiswa</button>
        <?php echo form_close(); ?>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
