<?php
    // Memeriksa apakah ada permintaan untuk menghapus data
    if (isset($_GET['page']) && $_GET['page'] == 'hapus_vendor' && isset($_GET['id_vendor'])) {
        $id = $_GET['id_vendor'];

        // Menyiapkan pesan konfirmasi
        $confirm_message = "Apakah Anda yakin ingin menghapus data vendor ini?";

        // Menampilkan konfirmasi dengan JavaScript
        echo "<script>
                if (confirm('$confirm_message')) {
                    window.location='hapus.php?id_vendor=$id';
                } else {
                    window.location='index.php?page=vendor';
                }
              </script>";
        exit; // Menghentikan eksekusi lebih lanjut setelah menampilkan konfirmasi
    }
?>

<div class="container-fluid">
    <div class="card">
        <h4 class="card-header"><i class="fas fa-server" style="color: #f39c12;"></i> <small>Data Vendor</small> </h4>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Vendor</th>
                        <th>No Whatsapp</th>
                        <th>Deskripsi</th>
                        <th>Youtube</th>
                        <th>Logo</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_vendor");
                        while ($data = mysqli_fetch_assoc($query)) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nama_vendor'] ?></td>
                            <td><?= $data['no_wa'] ?></td>
                            <td><?= $data['deskripsi'] ?></td>
                            <td><?= $data['yt'] ?></td>
                            <td><img src="../assets/img/<?= $data['gambar'] ?>" style="width: 50px;"></td>
                            <td>
                                <a href="index.php?page=hapus_vendor&id_vendor=<?= $data['id_vendor'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash" style="color:#d35400;"></i>
                                </a>
                                <a href="index.php?page=ubah_vendor&id_vendor=<?= $data['id_vendor'] ?>">
                                    <i class="fas fa-edit" style="color: #f39c12;"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>      
            </table>
            <a href="index.php?page=tambah_vendor" class="btn btn-sm btn-warning">
                <span style="color:#2f3640;"> <i class="fas fa-plus"></i> Tambah</span>
            </a>
        </div>
    </div>
</div>
