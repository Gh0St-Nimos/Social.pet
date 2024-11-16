<?php include('./include/header.php'); ?>

<div class="container" style="margin-left: 100px">
    <h1>Bem-vindo ao Patagram!</h1>
    <p>Compartilhe fotos dos seus pets com o mundo.</p>
    <script src="https://cdn.jsdelivr.net/gh/umLusca/myTools@master/javascript/libraries/fontAwesome.min.js"></script>
    <div class="posts">
        <!-- colocar aqui os posts vindos do banco de dados futuramente -->
        <div class="post-header">
            <span class="username">João Pet</span>
            <button class="follow-btn">Seguir</button>
        </div>
        <div class="post-image">
            <img src="caminho-da-imagem-do-post.jpg" alt="Imagem do post">
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

<?php  ?>
