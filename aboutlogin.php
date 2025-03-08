<?php
session_start();
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: index.php"); // Arahkan ke halaman login jika belum login
    exit();
}

// Proses logout jika tombol logout diklik
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php"); // Arahkan ke halaman login setelah logout
    exit();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <img src="assets/img/Workspace.png" alt="" width="100" height="150">
            </a>

            <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="indexlogin.php">Beranda</a></li>
          <li><a href="aboutlogin.php">Tentang Kami</a></li>
          <li><a href="servicelogin.php">Service</a></li>
          <li><a href="vendorlogin.php">Vendor</a></li>
          <li><a href="galerilogin.php">Gallery</a></li>


        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="#" data-bs-toggle="modal" data-bs-target="#profilModal">Profil</a>

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

      
        .send-button { width: 50px;
          background-color: #00ffff; }
        .chat-message { margin: 10px 0; font-size: 12px; } /* Mengubah ukuran font menjadi lebih kecil */
        .chat-message p { padding: 10px; border-radius: 5px; }
        .chat-message.user { text-align: left; }
        .chat-message.user p { background-color: #ff7f00; }
        .chat-message.admin { text-align: right; }
        .chat-message.admin p { background-color: #04AA6D; color: white; }
    </style>


    </header>
    <input type="hidden" id="isLoggedIn" value="false">
    <br /><br />

    <main class="main">
    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Kami</h2>
        
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up">

        <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-6">
            <div class="about-img">
              <img src="assets/img/about.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-6">
            <h3 class="pt-0 pt-lg-5">Workspace Studio</h3>

            <!-- Tabs -->
            <ul class="nav nav-pills mb-3">
              <li><a class="nav-link active" data-bs-toggle="pill" href="#about-tab1">Selamat Datang</a></li>
            
            </ul><!-- End Tabs -->

            <!-- Tab Content -->
            <div class="tab-content">

              <div class="tab-pane fade show active" id="about-tab1">

                <p class="fst-italic">Selamat datang di Workspace, tempat di mana setiap momen berharga diabadikan dengan penuh seni dan keahlian. Kami adalah sebuah studio fotografi profesional yang berdedikasi untuk menangkap esensi dari setiap kisah melalui lensa kamera.
                </p>
                <p class="fst-italic">
Di Workspace, kami percaya bahwa setiap foto memiliki cerita unik untuk diceritakan. Dengan tim fotografer berpengalaman dan kreatif, kami berkomitmen untuk memberikan hasil yang tidak hanya indah secara visual tetapi juga menggugah emosi. Kami menggabungkan teknik fotografi terkini dengan sentuhan artistik untuk menciptakan gambar yang tidak hanya mengabadikan momen, tetapi juga menghidupkannya kembali.
</p>
                <p class="fst-italic">
Layanan kami mencakup berbagai jenis fotografi, mulai dari potret pribadi, pernikahan, acara korporat, hingga fotografi produk dan komersial. Kami bekerja sama dengan setiap klien untuk memahami visi dan kebutuhan mereka, memastikan bahwa setiap sesi foto mencerminkan kepribadian dan gaya yang diinginkan.
</p>
                <p class="fst-italic">
Dengan peralatan canggih dan studio yang dirancang khusus, Workspace siap membantu Anda mengabadikan momen-momen penting dalam hidup Anda dengan cara yang paling memukau. Kami bangga menjadi bagian dari perjalanan Anda dan bersemangat untuk menghadirkan hasil fotografi yang akan dikenang sepanjang masa.

Terima kasih telah mempercayakan momen berharga Anda kepada Workspace.
                </p>

                

              </div><!-- End Tab 1 Content -->

            

            </div>

          </div>

        </div>

      </div>

    </section><!-- /About Section -->
    </main>
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
    <button class="chat-button" onclick="openForm()"><i class="fas fa-comments"></i></button>
      </button>
    </div>
    <div class="popup" id="myForm">
      <form class="form-container">
      <h2>Customer Service </h2>
            <div class="chat-box" id="chat-box"></div>
            <input type="text" id="chat-input" class="chat-input" placeholder="Ketik pesan...">
            <button type="button" class="btn cancel" id="send-button">Kirim</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
    </div>
  </footer>
  <div class="modal fade" id="profilModal" tabindex="-1" aria-labelledby="profilModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="profilModalLabel">Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Content for the profile goes here -->
         
          <form method="post" action="aboutlogin.php" style="display: inline;">
          <?php if (isset($_SESSION['nama'])): ?>
            <p>Anda login sebagai: <?php echo $_SESSION['nama']; ?></p>
        <?php endif; ?>
        <button type="submit" name="logout" class="btn btn-block" style="background-color: #e67e22; color:#ecf0f1;">Logout</button>
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
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

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
                .then(data => {
                    chatBox.innerHTML = data.map(msg => 
                        `<div class="chat-message ${msg.sender === 'admin' ? 'admin' : 'user'}">
                            <p><strong>${msg.sender}</strong>: ${msg.message}</p>
                        </div>`
                    ).join('');
                    chatBox.scrollTop = chatBox.scrollHeight;
                });
        }

        setInterval(loadMessages, 1000);
        loadMessages();
    </script>
    </body>

</html>
