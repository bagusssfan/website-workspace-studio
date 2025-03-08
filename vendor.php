<?php
include('C:\xampp\htdocs\workspace\koneksi\koneksi.php');

// Mengambil data gambar dari database
$images = [];
$query = mysqli_query($koneksi, "SELECT * FROM tb_vendor");
while ($data = mysqli_fetch_assoc($query)) {
    $images[] = [
        'nama_vendor' => $data['nama_vendor'],
        'gambar' => $data['gambar'],
        'deskripsi' => $data['deskripsi'],
        'no_wa' => $data['no_wa'],
        'yt' => $data['yt']
    ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Workspace Studio</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/Workspace.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <img src="assets/img/Workspace.png" alt="" width="100" height="150">
            </a>

            <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">Beranda</a></li>
          <li><a href="about.php">Tentang Kami</a></li>
          <li><a href="service.php">Service</a></li>
          <li><a href="vendor.php">Vendor</a></li>
          <li><a href="galeri.php">Gallery</a></li>


        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>

        </div>
        <style>
      .chat-button-container {
        position: fixed;
        bottom: 20px;
        left: 20px;
        z-index: 1000;
      }
      .chat-button {
        width: 60px;
        height: 60px;
        font-size: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 50%;
        cursor: pointer;
      }
      .chat-button:hover {
        background-color: #0056b3;
      }
      .popup {
        display: none;
        position: fixed;
        bottom: 20px;
        left: 20px;
        width: 300px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        z-index: 1000;
      }
      .form-container {
        padding: 20px;
      }
      .chat-box {
        height: 200px;
        overflow-y: auto;
        border: 1px solid #ddd;
        margin-bottom: 10px;
      }
      .chat-input {
        width: calc(100% - 60px);
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
      }
      .btn.cancel {
        background-color: #e74c3c;
        color: #fff;
      }
    </style>
    </header>

    <br />
    <br />

    <!-- Hero Section -->
    <input type="hidden" id="isLoggedIn" value="false">
    <section id="about" class="about section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Vendor Team</h2>
            <p>Tim fotografi kami, ahli dalam menangkap setiap momen indah menjadi kenangan yang tak terlupakan.</p>
        </div>

        <div class="container" data-aos="fade-up">
            <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-6">
                    <div class="about-img">
                        <!-- Gambar yang akan berubah berdasarkan tab yang diklik -->
                        <img id="aboutImage" src="assets/img/<?= $images[0]['gambar'] ?>" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-6">

                    <!-- Tabs -->
                    <ul class="nav nav-pills mb-3">
                        <?php foreach ($images as $index => $image) : ?>
                            <li><a class="nav-link <?= $index == 0 ? 'active' : '' ?>" data-bs-toggle="pill" href="#about-tab<?= $index ?>" onclick="changeImage('<?= $image['gambar'] ?>')"><?= $image['nama_vendor'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- End Tabs -->

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <?php foreach ($images as $index => $image) : ?>
                            <div class="tab-pane fade <?= $index == 0 ? 'show active' : '' ?>" id="about-tab<?= $index ?>">
                                <p class="fst-italic">Info: <?= $image['deskripsi'] ?></p>
                                
                                <!-- Menambahkan Channel YouTube dalam Iframe -->
<!-- Menambahkan Channel YouTube dalam Iframe -->
                                 <?php if (!empty($image['yt'])): ?>
                                    <div class="mt-3">
                                        <a href="<?= $image['yt'] ?>" target="_blank" class="btn btn-primary">
                                            Kunjungi Channel YouTube
                                        </a>
                                    </div>
                                <?php endif; ?>




                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- End Tab Content -->
                </div>

            </div>
        </div>
    </section>

    <footer id="footer" class="footer dark-background">

<div class="container footer-top">
  <div class="row gy-4">
    <div class="col-lg-4 col-md-6 footer-about">
      <a  class="logo d-flex align-items-center">
      <img src="assets/img/Workspace.png" alt="" width="100" height="150">
      </a>
      <div class="footer-contact pt-3">
        <p>  Jl. Payung Asri Slt II No.13</p>
        <p> Pudakpayung, Kec. Banyumanik</p>
        <p>  Kota Semarang, Provinsi Jawa Tengah</p>
        <p>   Indonesia</p>
        
      </div>
      <div class="social-links d-flex mt-4">

      <a href="https://www.instagram.com/workspace.studio?igsh=ZGZpeHoyaGJ4aDVo"><i class="bi bi-instagram"></i></a>
      </div>
    </div>

   
  </div>
</div>

<div class="container copyright text-center mt-4">
  <p>© <span>Copyright</span> <strong class="px-1 sitename">Workspace Studio</strong> <span>All Rights Reserved</span></p>
</div>
<div class="chat-button-container">
      <button class="chat-button" onclick="openChatForm()">
        <i class="fas fa-comments"></i>
      </button>
    </div>
    <div class="popup" id="myForm">
      <form class="form-container">
        <h2>Customer Service</h2>
        <div class="chat-box" id="chat-box"></div>
        <input type="text" id="chat-input" class="chat-input" placeholder="Ketik pesan...">
        <button type="button" class="btn" id="send-button">Kirim</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
    </div>
    <!-- Pop-up chat -->
    <div class="popup" id="myForm">
      <form class="form-container">
        <h2>Customer Service</h2>
        <div class="chat-box" id="chat-box"></div>
        <input type="text" id="chat-input" class="chat-input" placeholder="Ketik pesan...">
        <button type="button" class="btn" id="send-button">Kirim</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
    </div>
</footer>
<div class="popup" id="myForm">
      <form class="form-container">
        <h2>Customer Service</h2>
        <div class="chat-box" id="chat-box"></div>
        <input type="text" id="chat-input" class="chat-input" placeholder="Ketik pesan...">
        <button type="button" class="btn" id="send-button">Kirim</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
    </div>
  </footer>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="login_process.php" method="POST">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Username" name="nama" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user" style="color: #f39c12;"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" name="password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-key" style="color: #f39c12;"></span>
                </div>
              </div>
            </div>
            <div class="social-auth-links text-center mb-3">
              <button type="submit" class="btn btn-block" name="login" style="background-color: #e74c3c; color:#ecf0f1;">Login</button>
            </div>
            <div class="social-auth-links text-center mb-3">
              <p style="color:#000000;">- Belum Punya Akun? -</p>
              <button type="button" class="btn btn-block" style="background-color: #e67e22; color:#ecf0f1;" data-bs-toggle="modal" data-bs-target="#registerModal">
                <i class="fas fa-user-plus mr-2"></i>Mulai Buat Akun
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Register Modal -->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="registerModalLabel">Register</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="register_process.php" method="post">
          <div class="form-group  mb-3">
            <label for="inputUsername">Username</label>
            <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="nama" required>
          </div>
          <div class="form-group  mb-3">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
          </div>
          <div class="form-group  mb-3" >
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
          </div>
          <div class="form-group  mb-3">
            <label for="inputGender">Jenis Kelamin</label>
            <select id="inputGender" name="jk" class="form-control" required>
              <option value="" disabled selected>Jenis Kelamin</option>
              <option value="l">Laki - Laki</option>
              <option value="p">Perempuan</option>
            </select>
          </div>
          <div class="form-group  mb-3">
            <label for="inputPhone">No. Telpon</label>
            <input type="number" class="form-control" id="inputPhone" placeholder="No. Telpon" name="no_telp" required>
          </div>
          <div class="form-group  mb-3">
            <label for="inputAddress">Alamat</label>
            <textarea id="inputAddress" name="alamat" cols="30" rows="5" placeholder="Alamat" class="form-control" required></textarea>
          </div>

          <div class="social-auth-links text-center mb-3">
            <button type="submit" name="register" class="btn btn-block" style="background-color: #e67e22; color:#ecf0f1;">
              <i class="fas fa-save mr-2"></i> Simpan
            </button>
            <a href="index.php" class="btn btn-block" style="background-color: #e74c3c; color:#ecf0f1;">
              <i class="fas fa-address-card mr-2"></i> Sudah Punya Akun ?
            </a>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- Custom Script to Change Image -->
    <script>
        function changeImage(imageName) {
            document.getElementById('aboutImage').src = 'assets/img/' + imageName;
        }
    </script>
<script>
    function openChatForm() {
      const isLoggedIn = document.getElementById("isLoggedIn").value === "true";
      if (isLoggedIn) {
        document.getElementById("myForm").style.display = "block";
      } else {
        alert("Anda harus login terlebih dahulu.");
        const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
      }
    }

    document.getElementById('loginForm').addEventListener('submit', function(event) {
      event.preventDefault();
      // Simulate login process
      document.getElementById("isLoggedIn").value = "true";
      const loginModal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
      loginModal.hide();
      openChatForm();
    });

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }

    const chatBox = document.getElementById('chat-box');
    const chatInput = document.getElementById('chat-input');
    const sendButton = document.getElementById('send-button');

    sendButton.addEventListener('click', function() {
      const message = chatInput.value;
      if (message.trim() !== '') {
        fetch('send_message.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: 'message=' + encodeURIComponent(message)
        }).then(response => response.text()).then(data => {
          chatInput.value = '';
          loadMessages();
        });
      }
    });

    function loadMessages() {
      fetch('get_messages.php')
        .then(response => response.json())
        .then(messages => {
          chatBox.innerHTML = '';
          messages.forEach(message => {
            const div = document.createElement('div');
            div.textContent = message.text;
            chatBox.appendChild(div);
          });
        });
    }

    setInterval(loadMessages, 5000); // Load messages every 5 seconds
  </script>
</body>

</html>
