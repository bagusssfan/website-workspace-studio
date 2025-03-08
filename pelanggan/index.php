<?php
    include '../koneksi/koneksi.php';
    session_start();

    if($_SESSION['role'] == '')
    {
        echo "<script>
                alert('Maaf anda belom login, silahkan login terlebih dahulu');
                window.location='../login.php'
            </script>";
    }
?>

<?php
// Periksa apakah sesi sudah dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role'])) {
    header('location:../index.php');
    exit;
}

$greeting = ($_SESSION['role'] == 'Admin') ? 'Halo, Admin' : 'Halo, Pelanggan';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Workspace Studio | Pelanggan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: #f39c12;"></i></a>
      </li>
      <h2 class="ml-3"><?php echo $greeting; ?></h2>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">
          <i class="fas fa-power-off" style="color: #f39c12;"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4" style="background-color: #1e272e;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../assets/img/Workspace logo hitam.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-2" style="opacity: .8" >
      <span style="color: #f39c12;">STUDIO</span> 
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php?page=home" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=vendor" class="nav-link">
              <i class="nav-icon fas fa-box" style="color: #F79F1F;"></i>
              <p>
                Service
              </p>
            </a>
          </li>     
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box-open" style="color: #F79F1F;"></i>
              <p>
                Galeri
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=fotoanak" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #F79F1F;"></i>
                  <p>Foto Anak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=fotodigital" class="nav-link">
                  <i class="far fa-circle  nav-icon" style="color: #F79F1F;"></i>
                  <p>Foto Digital</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=orcestra" class="nav-link">
                  <i class="far fa-circle  nav-icon" style="color: #F79F1F;"></i>
                  <p>Orcestra</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=prewedding" class="nav-link">
                  <i class="far fa-circle  nav-icon" style="color: #F79F1F;"></i>
                  <p>prewedding</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=tunangan" class="nav-link">
                  <i class="far fa-circle  nav-icon" style="color: #F79F1F;"></i>
                  <p>Tunangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=wedding" class="nav-link">
                  <i class="far fa-circle  nav-icon" style="color: #F79F1F;"></i>
                  <p> Wedding</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=wisuda" class="nav-link">
                  <i class="far fa-circle  nav-icon" style="color: #F79F1F;"></i>
                  <p>Wisuda</p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
            <a href="index.php?page=tentang" class="nav-link">
              <i class="nav-icon fas fa-users" style="color: #F79F1F;"></i>
              <p>
                Tentang Kami
              </p>
            </a>
          </li> 
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">

    <?php
        if(isset($_GET['page'])) {

            switch($_GET['page']) {

                case 'barang';
                    include 'barang.php';
                break;
                case 'fotoanak';
                    include 'fotoanak.php';
                break;
                case 'fotodigital';
                    include 'fotodigital.php';
                break;
                case 'orcestra';
                    include 'orcestra.php';
                break;
                case 'prewedding';
                    include 'prewedding.php';
                break;
                case 'tunangan';
                include 'tunangan.php';
                break;
                case 'wedding';
                include 'wedding.php';
                break;
                case 'wisuda';
                include 'wisuda.php';
                break;
                case 'tentang';
                    include 'tentang.php';
                break;
                case 'vendor';
                include 'barang.php';
                break;
                default:
                    include 'home.php';
                break;

            }
        }
    ?>

        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023-2024</strong> <span>Workspace Studio</span>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/plugins/jszip/jszip.min.js"></script>
<script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
</body>
</html>