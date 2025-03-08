<!DOCTYPE html>
<html>
<head>
    <title>Workspace</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; }
        .chat-box { width: 100%; height: 400px; border: 1px solid #ccc; overflow-y: scroll; padding: 10px; }
        .chat-input { width: calc(100% - 60px); padding: 10px; }
        .send-button { width: 50px; }
        .popup { display: none; position: fixed; bottom: 0; right: 15px; border: 3px solid #f1f1f1; z-index: 9; }
        .form-container { max-width: 300px; padding: 10px; background-color: white; }
        .form-container .btn { background-color: #04AA6D; color: white; padding: 16px 20px; border: none; cursor: pointer; width: 100%; margin-bottom:10px; opacity: 0.8; }
        .form-container .btn:hover { opacity: 1; }
        .form-container .cancel { background-color: red; }
        .chat-button { position: fixed; bottom: 20px; right: 20px; background-color: #04AA6D; color: white; border: none; border-radius: 50%; width: 60px; height: 60px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1); cursor: pointer; display: flex; justify-content: center; align-items: center; }
        .chat-button i { font-size: 24px; }
        .chat-message { margin: 10px 0; font-size: 12px; } /* Mengubah ukuran font menjadi lebih kecil */
        .chat-message p { padding: 10px; border-radius: 5px; }
        .chat-message.user { text-align: left; }
        .chat-message.user p { background-color: #f1f1f1; }
        .chat-message.admin { text-align: right; }
        .chat-message.admin p { background-color: #04AA6D; color: white; }
    </style>
</head>
<body>
    <div class="row">
        <div class="div">
            <div class="img">
                <img src="../assets/img/Workspace logo hitam.png" style="width: 100%; margin-bottom: 20px;">
            </div>
        </div>
    </div>
    <p style="font-family: Arial, sans-serif; font-size: 16px; color: #333; text-align: center;">
        <strong>Workspace</strong> adalah sebuah website yang memberikan layanan utama berupa jasa foto dan video untuk kenangan pernikahan Anda. Kami membantu Anda mencari solusi kemudahan untuk konsep yang diinginkan. Untuk melengkapi kebutuhan Anda, kami akan memberikan hasil yang terbaik karena kepuasan Anda sangat berarti bagi kami.
    </p>
    <hr style="border: 0; border-top: 1px solid #ccc; margin: 20px 0;">
    <div style="display: flex; justify-content: space-between; margin-top: 20px; margin-right: 40px; margin-left: 40px; margin-bottom: 20px; align-items: stretch; height: 100px;">
        <div style="width: 45%; text-align: left;">
            <p style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
                <strong>Alamat Kami:</strong><br>
                Jl. Payung Asri Slt II No.13 <br>
                Pudakpayung, Kec. Banyumanik<br>
                Kota Semarang, Provinsi Jawa Tengah<br>
                Indonesia
            </p>
        </div>
        <div style="border-left: 1px solid #ccc; height: 100%;"></div>
        <div style="width: 45%; text-align: right;">
            <p style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
                <strong>Hubungi Kami:</strong>
            </p>
            <ul style="list-style: none; padding: 0; display: flex; justify-content: flex-end; flex-direction: column;">
                <li style="margin-bottom: 10px;">
                    <a href="https://www.instagram.com/workspace.studio?igsh=ZGZpeHoyaGJ4aDVo"><img src="../assets/img/ig.png" alt="Instagram" style="width: 30px; height: 30px;"></a>
                    <a href="https://wa.me/+62895632482303"><img src="../assets/img/wa.png" alt="WhatsApp" style="width: 30px; height: 30px;"></a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Tombol untuk membuka pop-up chat -->
    <button class="chat-button" onclick="openForm()"><i class="fas fa-comments"></i></button>

    <!-- Pop-up chat -->
    <div class="popup" id="myForm">
        <form class="form-container">
            <h2>Customer Service </h2>
            <div class="chat-box" id="chat-box"></div>
            <input type="text" id="chat-input" class="chat-input" placeholder="Ketik pesan...">
            <button type="button" class="btn" id="send-button">Kirim</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>

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
