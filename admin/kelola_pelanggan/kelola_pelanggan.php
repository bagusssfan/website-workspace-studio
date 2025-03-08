<?php
include('../koneksi/koneksi.php');

// Memeriksa apakah ada permintaan untuk menghapus data
if (isset($_GET['page']) && $_GET['page'] == 'hapus_pelanggan' && isset($_GET['id_user'])) {
    $id = $_GET['id_user'];

    // Menyiapkan pesan konfirmasi
    $confirm_message = "Apakah Anda yakin ingin menghapus data pelanggan ini?";

    // Menampilkan konfirmasi dengan JavaScript
    echo "<script>
            if (confirm('$confirm_message')) {
                window.location='hapus.php?id_user=$id';
            } else {
                window.location='index.php?page=pelanggan';
            }
          </script>";
    exit; // Menghentikan eksekusi lebih lanjut setelah menampilkan konfirmasi
}

// Fungsi untuk mengambil jumlah pesan baru untuk setiap pengguna
function getNewMessages($koneksi)
{
    $query = mysqli_query($koneksi, "SELECT id_user, COUNT(*) AS new_messages FROM messages WHERE is_read = 0 AND sender != 'admin' GROUP BY id_user");
    $new_messages = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $new_messages[$row['id_user']] = $row['new_messages'];
    }
    return $new_messages;
}

$new_messages = getNewMessages($koneksi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Pelanggan</title>
    <style>
        .badge {
            position: absolute;
            top: -10px;
            right: -10px;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <h4 class="card-header"><i class="fas fa-server" style="color: #f39c12;"></i> <small>Data Pelanggan</small> </h4>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No.Telpon</th>
                            <th>Alamat</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE nama != 'admin'");
                        while ($data = mysqli_fetch_assoc($query)) :
                            $id_user = $data['id_user'];
                            $has_new_messages = isset($new_messages[$id_user]) && $new_messages[$id_user] > 0;
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['no_telp'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td>
                                    <a href="index.php?page=detail_pelanggan&id_user=<?= $id_user; ?>"><i class="fas fa-search-plus" style="color:#636e72;"></i></a>
                                    <a href="index.php?page=hapus_pelanggan&id_user=<?= $id_user ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash" style="color:#d35400;"></i></a>
                                    <a href="index.php?page=ubah_pelanggan&id_user=<?= $id_user ?>"><i class="fas fa-edit" style="color: #f39c12;"></i></a>
                                    <a href="index.php?page=kelola_chat&id_user=<?= $id_user ?>" style="position: relative;" class="chat-link" data-id="<?= $id_user ?>">
                                        <i class="fas fa-comments chat-icon" id="chat-icon-<?= $id_user ?>" style="color: <?= $has_new_messages ? 'red' : '#3498db'; ?>;"></i>
                                        <?php if ($has_new_messages) : ?>
                                            <span id="badge-<?= $id_user ?>" class="badge"><?= $new_messages[$id_user]; ?></span>
                                        <?php endif; ?>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <a href="index.php?page=tambah_pelanggan" class="btn btn-sm btn-warning"> <span style="color:#2f3640;"> <i class="fas fa-plus"></i> Tambah</span> </a>
            </div>
        </div>
    </div>

    <script>
        function checkNewMessages() {
            fetch('data_pelanggan.php?check_messages=true')
                .then(response => response.json())
                .then(data => {
                    const newMessages = data.new_messages;
                    for (const id_user in newMessages) {
                        const count = newMessages[id_user];
                        const chatIcon = document.getElementById('chat-icon-' + id_user);
                        const badge = document.getElementById('badge-' + id_user);

                        if (count > 0) {
                            chatIcon.style.color = 'red';
                            if (badge) {
                                badge.style.display = 'block';
                                badge.textContent = count;
                            } else {
                                const newBadge = document.createElement('span');
                                newBadge.id = 'badge-' + id_user;
                                newBadge.className = 'badge';
                                newBadge.textContent = count;
                                chatIcon.parentElement.appendChild(newBadge);
                            }
                        } else {
                            chatIcon.style.color = '#3498db';
                            if (badge) {
                                badge.style.display = 'none';
                            }
                        }
                    }
                });
        }

        document.querySelectorAll('.chat-link').forEach(link => {
            link.addEventListener('click', function() {
                const id_user = this.dataset.id;
                const chatIcon = document.getElementById('chat-icon-' + id_user);
                const badge = document.getElementById('badge-' + id_user);

                chatIcon.style.color = '#3498db';
                if (badge) {
                    badge.style.display = 'none';
                }

                fetch('data_pelanggan.php?mark_as_read=' + id_user)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Messages marked as read');
                        }
                    });
            });
        });

        setInterval(checkNewMessages, 5000);
        checkNewMessages();
    </script>
</body>

</html>

<?php
if (isset($_GET['check_messages'])) {
    echo json_encode(['new_messages' => $new_messages]);
    exit;
}

if (isset($_GET['mark_as_read'])) {
    $id_user = intval($_GET['mark_as_read']);
    mysqli_query($koneksi, "UPDATE messages SET is_read = 1 WHERE id_user = $id_user AND sender != 'admin'");
    echo json_encode(['success' => true]);
    exit;
}

mysqli_close($koneksi);
?>