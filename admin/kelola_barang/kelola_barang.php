<?php
    // Memeriksa apakah ada permintaan untuk menghapus data
    if (isset($_GET['page']) && $_GET['page'] == 'hapus_barang' && isset($_GET['id_barang'])) {
        $id = $_GET['id_barang'];
    
        // Menyiapkan pesan konfirmasi
        $confirm_message = "Apakah Anda yakin ingin menghapus data barang ini?";
    
        // Menampilkan konfirmasi dengan JavaScript
        echo "<script>
                if (confirm('$confirm_message')) {
                    window.location='hapus.php?id_user=$id';
                } else {
                    window.location='index.php?page=barang';
                }
              </script>";
        exit; // Menghentikan eksekusi lebih lanjut setelah menampilkan konfirmasi
    }
    
?>

<div class="container-fluid">
<div class="card">
    <h4 class="card-header"><i class="fas fa-server" style="color: #f39c12;"></i> <small>Data Barang</small> </h4>
        <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Foto</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $no = 1;
                $query = mysqli_query( $koneksi, "select * from tb_barang");
                while($data = mysqli_fetch_assoc($query)) :
            ?>
                <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['kategori'] ?></td>
                <td><img src="../assets/img/<?= $data['gambar'] ?>" style="width: 50px;"></td>
                    <td>
                        <a href="index.php?page=hapus_barang&id_barang=<?= $data['id_barang'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash" style="color:#d35400;"></i></a>
                        <a href="index.php?page=ubah_barang&id_barang=<?= $data['id_barang'] ?>"><i class="fas fa-edit" style="color: #f39c12;"></i></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>      
        </table>
        <a href="index.php?page=tambah_barang" class="btn btn-sm btn-warning"> <span style="color:#2f3640;"> <i class="fas fa-plus"></i> Tambah</span> </a>
        </div>
    </div>
</div>