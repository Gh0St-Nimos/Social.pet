<?php include('./include/header.php'); ?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Patagram</title>
    <link rel="stylesheet" href="/Patagram/public/assets/css/styles.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/posts.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="/Patagram/public/assets/js/script.js" defer></script>

</head>
<body>
<div class="container" style="margin-left: 1px">
    <h1> Patagram!</h1>
    <p>Compartilhe fotos dos seus pets com o mundo.</p>
    <script src="https://cdn.jsdelivr.net/gh/umLusca/myTools@master/javascript/libraries/fontAwesome.min.js"></script>
    <div class="posts">
        <div class="post">
            <div class="post-header">
                <span class="username">João Pet</span>
                <button class="follow-btn">Seguir</button>
            </div>
            <div class="post-image">
                <img src="caminho-da-imagem-do-post.jpg" alt="Imagem do post">
            </div>
            <div class="post-footer">
                <button class="like-btn">Curtir</button>
                <button class="save-btn">Salvar</button>
            </div>
        </div>

        <div class="post">
            <div class="post-header">
                <span class="username">Maria Cat</span>
                <button class="follow-btn">Seguir</button>
            </div>
            <div class="post-image">
                <img src="caminho-da-imagem-do-post2.jpg" alt="Imagem do post">
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
    // Exibir o alerta assim que a página carregar
    window.onload = function() {
        document.getElementById('cookieAlert').style.display = 'block';
    };

    // Fechar o alerta quando o botão "Aceitar" ou "Recusar" for clicado
    document.getElementById('acceptBtn').addEventListener('click', function() {
        document.getElementById('cookieAlert').style.display = 'none';
    });

    document.getElementById('declineBtn').addEventListener('click', function() {
        document.getElementById('cookieAlert').style.display = 'none';
    });

</script>
</body>
</html>
