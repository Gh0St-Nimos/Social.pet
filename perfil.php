<?php include('include/header.php'); ?>


    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil - Patagram</title>
        <link rel="stylesheet" href="/Patagram/public/assets/css/styles.css">
        <script src="/Patagram/public/assets/js/script.js" defer></script>
    </head>
    <body>
    <div class="container">

        <main class="profile-page">
            <section class="profile-header">
                <div class="profile-image">
                    <img src="img/user-profile.jpg" alt="Imagem de Perfil">
                </div>
                <div class="profile-info">
                    <h2 class="username">Pluto_elDiablo</h2>
                    <p class="bio">Insira sua bio</p>
                    <div class="profile-actions">
                        <button class="follow-btn">Seguir</button>
                        <button class="edit-profile-btn">Editar Perfil</button>
                    </div>
                </div>
            </section>
            <section class="posts-gallery">
                <div class="posts-container">
                    <!-- Post 1 -->
                    <div class="post">
                        <img src="img/pet1.jpg" alt="Pet 1">
                    </div>
                    <!-- Post 2 -->
                    <div class="post">
                        <img src="img/pet2.jpg" alt="Pet 2">
                    </div>
                    <!-- Post 3 -->
                    <div class="post">
                        <img src="img/pet3.jpg" alt="Pet 3">
                    </div>
                    <!-- Adicione mais posts conforme necessário -->
                </div>
            </section>
        </main>
    </div>
    </body>
    </html>

    <?php  ?>

