<?php
    $id = $_GET['id_vendor'];
    $query = mysqli_query($koneksi, "DELETE FROM tb_vendor WHERE id_vendor = '$id'");
    if($query)
        {
            echo "<script>
                    alert('Data Berhasil Dihapus');
                    window.location='index.php?page=vendor'
                  </script>";
        } else {
            echo "<script>
            alert('Data Gagal Dihapus');
            window.location='index.php?page=vendor'
          </script>";
        }
?>