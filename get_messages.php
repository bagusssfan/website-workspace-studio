<?php
include('koneksi/koneksi.php');

session_start();

$id_user = $_SESSION['id_user'];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle fetching messages
    if (!empty($id_user)) {
        $stmt = $koneksi->prepare("SELECT sender, message FROM messages WHERE id_user = ? ORDER BY id ASC");
        $stmt->bind_param("i", $id_user); // Bind id_user as integer
        $stmt->execute();
        $result = $stmt->get_result();
        $messages = [];
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
        echo json_encode($messages);
        $stmt->close();
    }
}

$koneksi->close();
?>
