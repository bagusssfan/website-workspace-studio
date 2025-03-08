<?php
include('../koneksi/koneksi.php');

// Pastikan hanya admin yang bisa mengakses halaman ini
$id_user = $_GET['id_user']; // Ambil id_user dari parameter URL

// Query untuk mengambil data pengguna berdasarkan id_user
$query_user = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
$data_user = mysqli_fetch_assoc($query_user);

// Query untuk mengambil pesan-pesan dari database
$query_messages = mysqli_query($koneksi, "SELECT * FROM messages WHERE id_user = '$id_user' ORDER BY id ASC");
$messages = [];
while ($row = mysqli_fetch_assoc($query_messages)) {
    $messages[] = $row;
}

// Fungsi untuk mengambil jumlah pesan baru untuk pengguna ini
function getNewMessagesCount($koneksi, $id_user) {
    $query = mysqli_query($koneksi, "SELECT COUNT(*) AS new_messages FROM messages WHERE id_user = '$id_user' AND is_read = 0 AND sender != 'admin'");
    $result = mysqli_fetch_assoc($query);
    return $result['new_messages'];
}

$new_messages_count = getNewMessagesCount($koneksi, $id_user);

// Tandai pesan sebagai telah dibaca ketika halaman dimuat
mysqli_query($koneksi, "UPDATE messages SET is_read = 1 WHERE id_user = '$id_user' AND sender != 'admin'");

// Fungsi untuk mengirim pesan balasan ke database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_name = 'admin'; // Ganti dengan nama admin sesuai kebutuhan
    $reply_message = $_POST['reply_message'];

    // Simpan pesan balasan ke database
    $stmt = $koneksi->prepare("INSERT INTO messages (id_user, sender, message) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $id_user, $admin_name, $reply_message);
    $stmt->execute();
    $stmt->close();

    // Redirect agar halaman tidak di-refresh dan mengirim ulang form
    echo "<script>
            alert('Pesan telah terkirim');
            window.location.href = 'index.php?page=kelola_chat&id_user=$id_user';
          </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Chat dengan <?= $data_user['nama']; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        .chat-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .chat-message {
            display: flex;
            margin: 10px 0;
        }
        .user-message {
            justify-content: flex-start;
            text-align: left;
        }
        .admin-message {
            justify-content: flex-end;
            text-align: right;
        }
        .chat-sender {
            font-weight: bold;
            color: #555;
            margin-right: 10px;
        }
        .chat-text {
            max-width: 60%;
            padding: 10px;
            border-radius: 5px;
            background-color: #f0f0f0;
        }
        .admin-message .chat-text {
            background-color: #d1ecf1;
        }
        form {
            margin-top: 20px;
        }
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        button:hover {
            background-color: #0056b3;
        }
        .yellow-button {
            background-color: #ffc107;
            float: right; /* Menggunakan float untuk posisi kanan */
        }
        .yellow-button:hover {
            background-color: #ffb400;
        }
        .chat-icon {
            color: <?= $new_messages_count > 0 ? 'red' : '#3498db'; ?>;
        }
        .admin-chat-button {
            position: fixed;
            right: 20px;
            top: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body>

    <h1>Chat dengan <?= $data_user['nama']; ?></h1>

    <div class="chat-box">
        <!-- Tampilkan pesan-pesan dari database -->
        <?php foreach ($messages as $message): ?>
            <p class="chat-message <?= $message['sender'] === 'admin' ? 'admin-message' : 'user-message'; ?>">
                <span class="chat-sender"><?= $message['sender']; ?>:</span>
                <span class="chat-text"><?= $message['message']; ?></span>
            </p>
        <?php endforeach; ?>
    </div>

    <form method="post">
        <textarea name="reply_message" placeholder="Ketik balasan anda..."></textarea>
        <button type="submit">Kirim Balasan</button>
        <a href="index.php?page=pelanggan" class="btn" style="background-color:#e84118; color:white;">Kembali</a>
    </form>

    <script>
        // Function to mark the message as read when the page loads
        window.onload = function() {
            const chatIcon = document.querySelector('.chat-icon');
            if (chatIcon.style.color === 'red') {
                chatIcon.style.color = '#3498db';
            }
        };
    </script>
</body>
</html>

<?php
// Tutup koneksi ke database
mysqli_close($koneksi);
?>
