<?php include('./include/header.php'); ?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Patagram/public/assets/css/styles.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/posts.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="/Patagram/public/assets/js/script.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
<div id="imageModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="modalImage">
</div>
<div class="container">

    <div class="container" style="margin-left: 1px">
        <h1 class="title">Patagram!</h1>
        <div class="users-wrapper">
            <div class="user-container">
                <div class="user-header">
                    <img src="https://i.pinimg.com/736x/94/43/c9/9443c9b65998a610b8e058f72cb8c0b6.jpg" alt="Foto do usuário" class="user-photo">
                    <span class="username">Maui_0Pa</span>
                    <button class="follow-btn" onclick="toggleFollow(this)">Seguir</button>
                </div>
                <div class="post-area">
                    <img src="https://i.pinimg.com/736x/89/47/3d/89473dc14d6c9b4751807946e5217cfb.jpg" alt="Foto do pet" class="post-image">
                    <div class="post-actions">
                        <button class="like-btn">Curtir</button>
                        <button class="save-btn">Salvar</button>
                    </div>
                </div>
            </div>
            <div class="user-container">
                <div class="user-header">
                    <img src="https://i.pinimg.com/736x/c3/e8/05/c3e80532e819f3a80363ef30048bebd6.jpg" alt="Foto do usuário" class="user-photo">
                    <span class="username">Moypop</span>
                    <button class="follow-btn" onclick="toggleFollow(this)">Seguir</button>
                </div>
                <div class="post-area">
                    <img src="https://i.pinimg.com/736x/c3/0e/d8/c30ed8883ff25fca18206ee887aacf4d.jpg" alt="Foto do pet" class="post-image">
                    <div class="post-actions">
                        <button class="like-btn">Curtir</button>
                        <button class="save-btn">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id="cookieAlert" class="alert">
    <div id="cookieContent">
        <span id="cookieEmoji">🍪🥛</span>
        <div id="cookieText">
            <p>Gostaria de aceitar cookies e leite?</p>
        </div>
        <div class="button-container">
            <button id="acceptBtn">Aceitar 😊</button>
            <button id="declineBtn">Recusar 😞</button>
        </div>
    </div>
</div>
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    #cookieAlert {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #f5deb3;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 9999;
        display: none; /* Inicialmente oculto */
        width: 250px;
        text-align: center;
    }

    #cookieEmoji {
        font-size: 24px;
        margin-bottom: 10px;
    }

    #cookieText p {
        font-size: 14px;
        margin-bottom: 15px;
    }

    .button-container {
        display: flex;
        justify-content: space-between;
        gap: 5px;
    }

    button {
        padding: 8px 12px;
        font-size: 14px;
        cursor: pointer;
        border-radius: 5px;
        border: none;
        background-color: #f4b898;
        width: 45%;
    }

    button:hover {
        background-color: #c17e55;
    }

</style>
<script>

    window.onload = function() {
        document.getElementById('cookieAlert').style.display = 'block';
    };


    document.getElementById('acceptBtn').addEventListener('click', function() {
        document.getElementById('cookieAlert').style.display = 'none';
    });

    document.getElementById('declineBtn').addEventListener('click', function() {
        document.getElementById('cookieAlert').style.display = 'none';

    });

</script>
    <script>

        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        const closeBtn = document.getElementsByClassName('close')[0];


        document.querySelectorAll('.post-image').forEach(image => {
            image.addEventListener('click', function () {
                modal.style.display = 'block';
                modalImg.src = this.src;
            });
        });


        closeBtn.onclick = function () {
            modal.style.display = 'none';
        };


        modal.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        };
        
    </script>
<script>

</body>
</html>
