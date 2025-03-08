<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WORKSPACE</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <style>
    .login-box {
      width: 100%;
      max-width: 500px;
      margin: auto;
      padding: 50px 0;
    }

    .card {
      background-color: rgba(44, 62, 80, 0.8);
      /* semi-transparent background for card */
      color: #dfe6e9;
    }

    .card-header {
      border-bottom: none;
      text-align: center;
      background-color: rgba(44, 62, 80, 0.8);
      /* adjust header background color */
    }

    .form-control {
      background-color: rgba(44, 62, 80, 0.8);
      /* adjust form input background color */
      border: 1px solid #485460;
      /* adjust form input border color */
      color: #dfe6e9;
    }

    .form-control:focus {
      border-color: #f39c12;
      /* adjust form input focus border color */
      box-shadow: none;
    }

    .btn {
      border-radius: 9px;
    }

    .btn-block {
      margin-top: 10px;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b style="color: #f39c12;"> WORKSPACE STUDIO</b> </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <h6 class="card-header">Daftar Sebagai Member Baru</h6>
      <div class="card-body">
        <form action="" method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputEmail3">Username</label>
                <input type="hidden" name="id_user">
                <input type="text" class="form-control" placeholder="Username" name="nama" required>
              </div>
              <div class="form-group">
                <label for="inputPassword3">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputPassword3">Jenis Kelamin</label>
                <select name="jk" class="form-control" required>
                  <option value="" disabled selected>Jenis Kelamin</option>
                  <option value="l">Laki - Laki</option>
                  <option value="p">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputPassword3">No. Telpon</label>
                <input type="number" class="form-control" placeholder="No. Telpon" name="no_telp" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3">Alamat</label>
            <textarea name="alamat" cols="30" rows="5" placeholder="Alamat" class="form-control" required></textarea>
          </div>

          <div class="social-auth-links text-center mb-3">
            <button type="submit" name="simpan" class="btn btn-block" style="background-color: #e67e22; color:#ecf0f1;">
              <i class="fas fa-save mr-2"></i> Simpan
            </button>
            <a href="index.php" class="btn btn-block" style="background-color: #e74c3c; color:#ecf0f1;">
              <i class="fas fa-address-card mr-2"></i> Sudah Punya Akun ?
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  include('C:\xampp\htdocs\workspace\koneksi\koneksi.php');
  if (isset($_POST['simpan'])) {
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $jk = $_POST['jk'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "INSERT INTO user VALUES('$id_user', '$nama', '$password', '$jk',  '$no_telp', '$alamat')");
    if ($query) {
      echo "<script>
                    alert('Akun Anda Berhasil Dibuat');
                    window.location='index.php'
                  </script>";
    } else {
      echo "<script>
            alert('Gagal Membuat Akun');
            window.location='regis.php'
          </script>";
    }
  }
  ?>
  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>