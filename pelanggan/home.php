
<div class="container-fluid">
    <!-- Logo hitam -->
    <div class="row">

            <div class="div">
                <div class="img">
                    <img src="../assets/img/Workspace logo hitam.png" style="width: 100%;  margin-bottom: 20px;">
                </div>
            </div>
    </div>
    <!-- Daftar foto -->
    <div class="row">
        <?php 
            // Mendapatkan daftar kategori yang unik
            $kategori_query = mysqli_query($koneksi, "SELECT DISTINCT kategori FROM tb_barang");
            while($kategori_data = mysqli_fetch_assoc($kategori_query)) :
        ?>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header" style="border:none;">
                    <?php 
                        // Ambil satu foto untuk setiap kategori
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE kategori = '{$kategori_data['kategori']}' LIMIT 1");
                        $data = mysqli_fetch_assoc($query);
                    ?>
                    <img src="../assets/img/<?= $data['gambar'] ?>" class="card-img-top img-thumbnail">
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
