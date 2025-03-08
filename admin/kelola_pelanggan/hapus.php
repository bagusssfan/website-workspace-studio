<?php
$id = $_GET['id_user'];
$query = mysqli_query($koneksi, "DELETE FOR user WHERE id_user=' $id'");
if ($query) {
  echo "<script> alert = ('data berhasil dihapus')
  windows.locatin = 'index.php?page=pelanggan';
  </script>";
} else {
  echo "<script> alert = ('gagal dihapus')
  windows.location = 'index.php?page=pelanggan';
  </script>";
}
