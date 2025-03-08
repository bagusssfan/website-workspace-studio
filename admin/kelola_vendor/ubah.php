<?php
    $id = $_GET['id_vendor'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_vendor where id_vendor ='$id'");
    $data  = mysqli_fetch_assoc($query); 
?>

<div class="container-fluid">
    <div class="card" style="width: 50rem; margin-left:12%;">
        <h4 class="card-header"><i class="fas fa-clipboard-list" style="color: #f39c12;"></i> <small>Form Ubah</small> </h4>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Vendor</label>
                    <div class="col-sm-10">
                    <input type="hidden" name="id_vendor" value="<?= $data['id_vendor'] ?>">
                    <input type="text" class="form-control" name="nama_vendor" value="<?= $data['nama_vendor'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">No Whatsapp</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_wa" value="<?= $data['no_wa'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="deskripsi" value="<?= $data['deskripsi'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Youtube</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="yt" value="<?= $data['yt'] ?>">
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
                    <img src="../assets/img/<?= $data['gambar'] ?>" style="width: 150px; margin-left:20%;">
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

    if(isset($_POST['simpan']))
    {   
        $id_vendor = $_POST['id_vendor'];
        $nama_vendor = $_POST['nama_vendor'];
        $no_wa = $_POST['no_wa'];
        $deskripsi = $_POST['deskripsi'];
        $yt = $_POST['yt'];
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
                $query = mysqli_query($koneksi, "UPDATE tb_vendor SET id_vendor='$id_vendor', nama_vendor='$nama_vendor', no_wa='$no_wa', deskripsi='$deskripsi', yt='$yt',  gambar='$nama_gambar_baru' where id_vendor='$id_vendor'");
                if($query)
                {
                    // Jika penyimpanan data berhasil, arahkan pengguna ke halaman data vendor
                    echo "<script>
                            alert('Data Berhasil Diubah');
                            window.location='index.php?page=vendor';
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
                            window.location='index.php?page=vendor'
                      </script>";
            }
        } else {
            $query = mysqli_query($koneksi, "UPDATE tb_vendor SET id_vendor='$id_vendor', nama_vendor='$nama_vendor', no_wa='$no_wa', deskripsi='$deskripsi', yt='$yt' where id_vendor='$id_vendor'");
            if($query)
            {
                // Jika penyimpanan data berhasil, arahkan pengguna ke halaman data vendor
                echo "<script>
                        alert('Data Berhasil Diubah');
                        window.location='index.php?page=vendor';
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