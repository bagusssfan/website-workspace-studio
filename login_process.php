<?php
require 'koneksi/koneksi.php';
session_start();
error_reporting(0);

if (isset($_SESSION['role'])) {
  echo "<script>
          alert('Silahkan logout terlebih dahulu');
          window.location='logout.php';
        </script>";
}

if (isset($_POST['login'])) {
  $username = $_POST['nama'];
  $password = $_POST['password'];

  // Cek panjang password
 
    // Pengecekan untuk admin
    if ($username === 'admin') {
      $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE nama='$username' AND password='$password'");
    } else {
      $query = mysqli_query($koneksi, "SELECT * FROM user WHERE nama='$username' AND password='$password'");
    }

    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
      $data = mysqli_fetch_assoc($query);
      $_SESSION['loggedin'] = true;
      $_SESSION['nama'] = $username;
      $_SESSION['id_user'] = $data['id_user'];

      // Cek apakah username adalah 'admin'
      if ($username === 'admin') {
        $_SESSION['role'] = 'Admin';
        header('location:admin/index.php?page=home');
      } else {
        $_SESSION['role'] = 'Pelanggan';
        header('location:indexlogin.php');
      }
    } else {
      echo "<script>
              alert('Maaf username dan password belum terdaftar, Silahkan melakukan registrasi terlebih dahulu');
              window.location='index.php';
            </script>";
    }
  
}
?>
