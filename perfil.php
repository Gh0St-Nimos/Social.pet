<?php
//Isso aqui resolve o problema de incluir as coisas!
define("ROOT", dirname(__FILE__));

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Patagram</title>
	<?php include(ROOT . '/components/head.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/perfil.css" >
</head>
<body>
<div class="container">
	<?php include(ROOT . '/components/header.php'); ?>

    <main class="profile">
        <!-- Cabeçalho do perfil -->
        <section class="profile-header">
            <div class="profile-user-picture">
                <img src="./assets/img/imagem7.jpeg" alt="">
            </div>
            <div class="profile-info">
                <div class="username-editable">
                    <h2 class="username">Spike_1</h2>
                </div>

                <div class="profile-stats">
                    <p><strong>Seguidores:</strong> 120</p>
                    <p><strong>Curtidas:</strong> 320</p>
                    <p><strong>Seguindo:</strong> 50</p>
                </div>

        </section>

        <!-- Galeria de posts -->
        <section class="posts-gallery">
            <div class="pictures-container">
                <!-- Exemplo de post -->
                <div class="picture">
                    <img src="./assets/img/imagem7.jpeg" alt="Pet 1">
                </div>
                <div class="picture">
                    <img src="./assets/img/imagem8.jpeg" alt="Pet 2">
                </div>
                <div class="picture">
                    <img src="./assets/img/imagem9.jpeg" alt="Pet 3">
                </div>
                <div class="picture">
                    <img src="./assets/img/imagem4.jpeg" alt="Pet 1">
                </div>
                <div class="picture">
                    <img src="./assets/img/imagem5.jpeg" alt="Pet 2">
                </div>
                <div class="picture">
                    <img src="./assets/img/imagem6.jpeg" alt="Pet 3">
                </div>
                <div class="picture">
                    <img src="./assets/img/imagem10.jpeg" alt="Pet 3">
                </div>
                <!-- Adicione mais posts conforme necessário -->
            </div>
        </section>
    </main>
</div>

</body>
</html>
