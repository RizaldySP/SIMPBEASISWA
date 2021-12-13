
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2021-2022 <a href="#">Sistem Informasi Manajemen Penerimaan Beasiswa</a>.</strong> All rights
    reserved.
  </footer>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>/assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script href="https://code.jquery.com/jquery-3.5.1.js"></script>
<script href="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script href="https://cdn.datatables.net/1.10.24/js/dataTables.material.min.js"></script>
<script src="<?php echo base_url();?>/assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>/assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>/assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/assets/admin/dist/js/demo.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>assets/admin/bower_components/morris.js/morris.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/bower_components/raphael/raphael.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/jquery-bootstrap-scrolling/jquery.scrolling-tabs.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
<script>
  $(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
  } );
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>

</body>
</html>
