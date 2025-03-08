<?php
include('koneksi/koneksi.php');

session_start();

$sender = $_SESSION['nama'];
$id_user = $_SESSION['id_user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle sending a message
    $message = $_POST['message'];
    if (!empty($id_user) && !empty($sender) && !empty($message)) {
        $stmt = $koneksi->prepare("INSERT INTO messages (id_user, sender, message) VALUES (?,?, ?)");
        $stmt->bind_param("iss",$id_user, $sender, $message); // Assuming sender and message are strings
        $stmt->execute();
        $stmt->close();
    }
}

$koneksi->close();
?>
