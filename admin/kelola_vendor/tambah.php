<div class="container-fluid">
    <div class="card" style="width: 50rem; margin-left:12%;">
        <h4 class="card-header"><i class="fas fa-clipboard-list" style="color: #f39c12;"></i> <small>Form Tambah</small> </h4>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Vendor</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_vendor">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">No Whatsapp</label>
                    <div class="col-sm-10">
                        <input type="number" name="no_wa">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Deskripsi Vendor</label>
                    <div class="col-sm-10">
                        <input type="text" name="deskripsi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Logo</label>
                    <div class="col-sm-10">
                        <input type="file" name="gambar">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-secondary" name="simpan">Simpan</button>
                        <a href="index.php?page=vendor" class="btn" style="background-color:#e84118; color:white;">Cancel</a>
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
    $nama_vendor = $_POST['nama_vendor'];
    $no_wa = $_POST['no_wa'];
    $deskripsi = $_POST['deskripsi'];
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
            $query = mysqli_query($koneksi, "INSERT INTO tb_vendor ( nama_vendor,no_wa,deskripsi, gambar) VALUES ('$nama_vendor','$no_wa','$deskripsi', '$nama_gambar_baru')");
            if($query) {
                echo "<script>
                        alert('Data Berhasil Ditambahkan');
                        window.location='index.php?page=vendor'
                    </script>";
            } else {
                echo "<script>
                        alert('Data Gagal Dimasukan');
                        window.location='index.php?page=tambah_vendor'
                    </script>";
            }
        } else {
            echo "<script>
                    alert('Extensi yang di perbolehkan jpg atau png');
                    window.location='index.php?page=tambah_vendor'
                </script>";
        }
    } else {
        // Jika gambar tidak dipilih
        $query = mysqli_query($koneksi, "INSERT INTO tb_vendor ( nama_vendor, no_wa) VALUES ('$nama_vendor','$no_wa')");
        if($query) {
            echo "<script>
                    alert('Data Berhasil Ditambahkan');
                    window.location='index.php?page=vendor'
                </script>";
        } else {
            echo "<script>
                    alert('Data Gagal Dimasukan');
                    window.location='index.php?page=tambah_vendor'
                </script>";
        }
    }       
} 
?>
