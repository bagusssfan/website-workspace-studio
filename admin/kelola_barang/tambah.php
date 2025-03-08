<div class="container-fluid">
    <div class="card" style="width: 50rem; margin-left:12%;">
        <h4 class="card-header"><i class="fas fa-clipboard-list" style="color: #f39c12;"></i> <small>Form Tambah</small> </h4>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="kategori">
                            <option value="fotoanak">Foto Anak</option>
                            <option value="fotodigital">Foto Digital</option>
                            <option value="orcestra">Orcestra</option>
                            <option value="prewedding">Prewedding</option>
                            <option value="tunangan">Tunangan</option>
                            <option value="wedding">Wedding</option>
                            <option value="wisuda">Wisuda</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Gambar Barang</label>
                    <div class="col-sm-10">
                        <input type="file" name="gambar">
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
include('C:\xampp\htdocs\workspace\koneksi\koneksi.php'); // Pastikan file koneksi.php telah di-include di sini

if(isset($_POST['simpan']))
{
    $kategori = $_POST['kategori'];
    $gambar = $_FILES['gambar']['name'];

    // Upload gambar
    if($gambar != "") {
        $ekstensi_diperbolehkan = array('png','jpg','jpeg');
        $x = explode('.', $gambar); 
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];   
        $angka_acak = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$gambar;

        // Proses upload
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../assets/img/'.$nama_gambar_baru);

            // Proses penyimpanan data ke database
            $query = mysqli_query($koneksi, "INSERT INTO tb_barang ( kategori, gambar) VALUES ('$kategori', '$nama_gambar_baru')");
            if($query) {
                echo "<script>
                        alert('Data Berhasil Ditambahkan');
                        window.location='index.php?page=barang'
                    </script>";
            } else {
                echo "<script>
                        alert('Data Gagal Dimasukan');
                        window.location='index.php?page=tambah_barang'
                    </script>";
            }
        } else {
            echo "<script>
                    alert('Extensi yang di perbolehkan jpg atau png');
                    window.location='index.php?page=tambah_barang'
                </script>";
        }
    } else {
        // Jika gambar tidak dipilih
        $query = mysqli_query($koneksi, "INSERT INTO tb_barang ( kategori) VALUES ('$kategori')");
        if($query) {
            echo "<script>
                    alert('Data Berhasil Ditambahkan');
                    window.location='index.php?page=barang'
                </script>";
        } else {
            echo "<script>
                    alert('Data Gagal Dimasukan');
                    window.location='index.php?page=tambah_barang'
                </script>";
        }
    }       
} 
?>
