<div class="div">
            <div class="img">
            <img src="../assets/img/orcestra.png" style="width: 100%;  margin-bottom: 20px;">
            </div>
</div>
<div class="row">
        <?php 
            $query = mysqli_query($koneksi, "SELECT * FROM tb_barang where kategori='orcestra'");
            while($data = mysqli_fetch_assoc($query)) :
        ?>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header" style="border:none;">
                    <img src="../assets/img/<?= $data['gambar'] ?>" class="card-img-top img-thumbnail">
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>