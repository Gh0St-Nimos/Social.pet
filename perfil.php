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
    
    <link rel="stylesheet" href="./assets/perfil.css" >
</head>
<body>
<div class="container">
	<?php include(ROOT . '/components/header.php'); ?>

    <main class="profile">
        <!-- Cabeçalho do perfil -->
        <section class="profile-header">
            <div class="profile-user-picture">
                <img src="img/user-profile.jpg" alt="">
            </div>
            <div class="profile-info">
                <div class="username-editable">
                    <h2 class="username">Pluto_elDiablo</h2>
                    <button class="btn-edit-icon" onclick="editField('username')"><i class="fa fa-pencil" style="color: orange"></i></button>
                </div>
                <div class="bio-editable">
                    <p class="bio">Insira sua bio</p>
                    <button class="btn-edit-icon" onclick="editField('bio')"><i class="fa fa-pencil" style="color: orange"></i></button>
                </div>
                <div class="profile-stats">
                    <p><strong>Seguidores:</strong> 120</p>
                    <p><strong>Curtidas:</strong> 320</p>
                    <p><strong>Seguindo:</strong> 50</p>
                </div>
                <div class="profile-actions">
                    <button class="btn-follow">Seguir</button>
                    <button class="btn-edit">Editar Perfil</button>
                </div>
            </div>
        </section>

        <!-- Galeria de posts -->
        <section class="posts-gallery">
            <div class="pictures-container">
                <!-- Exemplo de post -->
                <div class="picture">
                    <img src="img/pet1.jpg" alt="Pet 1">
                </div>
                <div class="picture">
                    <img src="img/pet2.jpg" alt="Pet 2">
                </div>
                <div class="picture">
                    <img src="img/pet3.jpg" alt="Pet 3">
                </div>
                <div class="picture">
                    <img src="img/pet1.jpg" alt="Pet 1">
                </div>
                <div class="picture">
                    <img src="img/pet2.jpg" alt="Pet 2">
                </div>
                <div class="picture">
                    <img src="img/pet3.jpg" alt="Pet 3">
                </div>
                <div class="picture">
                    <img src="img/pet3.jpg" alt="Pet 3">
                </div>
                <!-- Adicione mais posts conforme necessário -->
            </div>
        </section>
    </main>
</div>

</body>
</html>
