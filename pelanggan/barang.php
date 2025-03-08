<h4 class="card-header"><i class="fas fa-clipboard-list" style="color: #f39c12;"></i> <small>Jasa Vendor</small> </h4>
<div class="container-fluid">
   
    <div class="row">
    <?php 
            $query = mysqli_query($koneksi, "SELECT * FROM tb_vendor ");
            while($data = mysqli_fetch_assoc($query)) :
        ?>
        <div class="col-sm-4">
            <div class="card">
            <br>
            <center class="card-title"><?= $data['nama_vendor']; ?></center>
            <br\>
            <div class="card-header" style="border:none; height: 200px;  overflow: hidden;">
            <img src="../assets/img/<?= $data['gambar'] ?>" class="card-img-top img-fluid" style="object-fit: cover; height: 100%;">
            </div>

            <div class="card-body">
            <center><?= $data['deskripsi']; ?></center>
            <a href="https://wa.me/+<?= $data['no_wa'] ?>" class="btn social-auth-links text-center mb-3 btn-block" style="background-color: #25D366; color:#fff; border-radius:9px;">
            &#9742; Hubungi via WhatsApp
            </a>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    </div>
</div>