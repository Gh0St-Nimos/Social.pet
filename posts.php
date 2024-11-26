<?php
//Isso aqui resolve o problema de incluir as coisas!
define("ROOT", dirname(__FILE__));

?>
<html lang="pt-br">
<head>
	<?php include(ROOT . '/components/head.php'); ?>

</head>
<body>

<div class="container">
	
	<?php include(ROOT . '/components/header.php'); ?>
    <main>
        <h1>Poste uma Foto do Seu Pet</h1>


        <div class="posts-container">
            <!-- Container de Postagem 1 -->
            <div class="post">
                <div class="post-header">
                    <img src="https://i.pinimg.com/736x/94/43/c9/9443c9b65998a610b8e058f72cb8c0b6.jpg" alt="Foto do usuário" class="post-user-profile">
                    <span class="post-user-nick">Maui_0Pa</span>
                    <button class="post-btn-follow" onclick="toggleFollow(this)">Seguir</button>
                </div>
                <div class="post-body">
                    <img src="https://i.pinimg.com/736x/89/47/3d/89473dc14d6c9b4751807946e5217cfb.jpg" alt="Foto do pet" class="post-picture">
                    <div class="post-actions">
                        <button class="post-btn-like">Curtir</button>
                        <button class="post-btn-save">Salvar</button>
                    </div>
                </div>
            </div>

            <!-- Container de Postagem 2 -->
            <div class="post">
                <div class="post-header">
                    <img src="https://i.pinimg.com/736x/c3/e8/05/c3e80532e819f3a80363ef30048bebd6.jpg" alt="Foto do usuário" class="post-user-profile">
                    <span class="post-user-nick">Moypop</span>
                    <button class="post-btn-follow" onclick="toggleFollow(this)">Seguir</button>
                </div>
                <div class="post-area">
                    <img src="https://i.pinimg.com/736x/c3/0e/d8/c30ed8883ff25fca18206ee887aacf4d.jpg" alt="Foto do pet" class="post-picture">
                    <div class="post-actions">
                        <button class="post-btn-like">Curtir</button>
                        <button class="post-btn-save">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>

