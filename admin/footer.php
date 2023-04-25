</div>
<!--closes content-wrapper-->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.1
    </div>
    <strong>Copyright &copy; 2022 <?= (date('Y') != 2022) ? "-"  . date('Y') : ''; ?>
        <a href="">Vesen Computing</a>.
    </strong>
    All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>


<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    });
    $("#tb1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $("#tb2").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $("#tb3").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $("#tb4").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $("#tb5").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $("#tb6").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $("#tb7").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>

<script>
function image_preview(my_img, img_loader) {
    $(function() {
        $(my_img).change(function(event) {
            let img = URL.createObjectURL(event.target.files[0]);
            $(img_loader).attr("src", img);
            console.log(event);
        });
    });
}

image_preview("#my_img", "#img_loader");
image_preview("#my_image", "#image_loader");
image_preview("#my_image2", "#image_loader2");
image_preview("#my_vid", "#vid_loader");
image_preview("#menu", "#menu_loader");
</script>

</body>

</html>