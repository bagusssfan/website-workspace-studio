<?php
 require 'koneksi/koneksi.php';
 session_start();
 error_reporting(0);
  if (isset($_POST['register'])) {
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
            window.location='index.php'
          </script>";
    }
  }
  ?>