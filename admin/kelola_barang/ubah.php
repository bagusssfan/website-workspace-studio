<?php
    $id = $_GET['id_barang'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_barang where id_barang ='$id'");
    $data  = mysqli_fetch_assoc($query); 
?>

<div class="container-fluid">
    <div class="card" style="width: 50rem; margin-left:12%;">
        <h4 class="card-header"><i class="fas fa-clipboard-list" style="color: #f39c12;"></i> <small>Form Ubah</small> </h4>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Tambahkan input tersembunyi untuk id_barang -->
                <input type="hidden" name="id_barang" value="<?= $data['id_barang'] ?>">
                
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="kategori">
                            <option value="fotoanak" <?php if($data['kategori'] == 'fotoanak') echo 'selected'; ?>>Foto Anak</option>
                            <option value="fotodigital" <?php if($data['kategori'] == 'fotodigital') echo 'selected'; ?>>Foto Digital</option>
                            <option value="orcestra" <?php if($data['kategori'] == 'orcestra') echo 'selected'; ?>>Orcestra</option>
                            <option value="prewedding" <?php if($data['kategori'] == 'prewedding') echo 'selected'; ?>>Prewedding</option>
                            <option value="tunangan" <?php if($data['kategori'] == 'tunangan') echo 'selected'; ?>>Tunangan</option>
                            <option value="wedding" <?php if($data['kategori'] == 'wedding') echo 'selected'; ?>>Wedding</option>
                            <option value="wisuda" <?php if($data['kategori'] == 'wisuda') echo 'selected'; ?>>Wisuda</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <input type="file" name="gambar">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <img src="../assets/img/<?= $data['gambar'] ?>" style="width: 150px; margin-left:20%;">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-secondary" name="simpan">Simpan</button>
                        <a href="index.php?page=barang" class="btn" style="background-color:#e84118; color:white;">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

    if(isset($_POST['simpan']))
    {   
        $id_barang = $_POST['id_barang']; // Mengambil nilai id_barang dari input tersembunyi
        $kategori = $_POST['kategori'];
        $gambar = $_FILES['gambar']['name'];

        if($gambar !="") {
            $ekstensi_diperbolehkan = array('png','jpg','jpeg');
            $x = explode('.', $gambar); 
            $ekstensi = strtolower(end($x));
            $file_tmp = $_FILES['gambar']['tmp_name'];   
            $angka_acak     = rand(1,999);
            $nama_gambar_baru = $angka_acak.'-'.$gambar;

            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                move_uploaded_file($file_tmp, '../assets/img/'.$nama_gambar_baru);
                $query = mysqli_query($koneksi, "UPDATE tb_barang SET id_barang='$id_barang', kategori='$kategori', gambar='$nama_gambar_baru' where id_barang='$id_barang'");
                if($query)
                {
                    // Jika penyimpanan data berhasil, arahkan pengguna ke halaman data barang
                    echo "<script>
                            alert('Data Berhasil Diubah');
                            window.location='index.php?page=barang';
                        </script>";
                } else {
                    // Jika penyimpanan data gagal, tampilkan pesan kesalahan dan tetap di halaman form ubah
                    echo "<script>
                            alert('Data Gagal Diubah');
                        </script>";
                }
            } else {
                echo "<script>
                            alert('Extensi yang di perbolehkan jpg atau png');
                            window.location='index.php?page=barang'
                      </script>";
            }
        } else {
            $query = mysqli_query($koneksi, "UPDATE tb_barang SET id_barang='$id_barang', kategori='$kategori' where id_barang='$id_barang'");
            if($query)
            {
                // Jika penyimpanan data berhasil, arahkan pengguna ke halaman data barang
                echo "<script>
                        alert('Data Berhasil Diubah');
                        window.location='index.php?page=barang';
                    </script>";
            } else {
                // Jika penyimpanan data gagal, tampilkan pesan kesalahan dan tetap di halaman form ubah
                echo "<script>
                        alert('Data Gagal Diubah');
                    </script>";
            }
        }
    } 
?>
