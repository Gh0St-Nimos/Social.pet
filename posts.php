<?php include('include/header.php'); ?>

<div class="container">
    <h1>Poste uma Foto do Seu Pet</h1>
    <form action="posts.php" method="POST" enctype="multipart/form-data">
        <div class="post">
            <div class="post-header">
                <span class="username">João Pet</span>
                <button class="follow-btn">Seguir</button>
            </div>
            <div class="post-image">
                <img src="https://i.pinimg.com/736x/4a/9e/d2/4a9ed20abef312c246108ca768106b48.jpg" alt="Imagem do post">
            </div>
        </div>

        <!-- Post 2 -->
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
</main>
</div>

<?php ?>
