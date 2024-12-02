<?php
//Isso aqui resolve o problema de incluir as coisas!
define("ROOT", dirname(__FILE__));
require ROOT."/config/config.php";


// aletrsfdszxfd


$con = con();

//Pega um post de cada usuário aaa
$query = $con->prepare("
SELECT
    posts.*,
    userphotopath,
    userlogin,
    !isnull(like.id) as 'liked',
    !isnull(save.id) as 'save',
    !isnull(follow.id) as 'follow'
    
FROM posts
    INNER JOIN users ON posts.userid = users.id
    LEFT JOIN actions `like` ON like.userid = ".((int) $_SESSION['id'] ?: 0)." AND like.targetId = posts.id AND like.type = 'like'
    LEFT JOIN actions save ON save.userid = ".((int) $_SESSION['id'] ?: 0)." AND save.targetId = posts.id AND save.type = 'save'
    LEFT JOIN actions follow ON follow.userid = ".((int) $_SESSION['id'] ?: 0)." AND follow.targetId = users.id AND follow.type = 'follow'

    
    GROUP BY posts.userid");


$query->execute();

//resultado
$posts = $query->fetchAll(PDO::FETCH_ASSOC);

//var_dump($posts) //debug
?>
<html lang="pt-br">
<head>
    <title>Patagram!</title>
    <link rel="stylesheet" href="./assets/css/posts.css">
	<?php include(ROOT.'/components/head.php'); ?>
<body>


<div class="page-container">
	<?php include(ROOT.'/components/header.php'); ?>

    <main>

        <h1 class="title">Patagram!</h1>


        <div class="row justify-content-center g-3">
            <!-- Container de Postagem -->
	        <?php foreach ($posts as $post) {
		        //var_dump($post);//debug
		        ?>
                <div class="col-auto">

                    <div class="post">
                        <div class="post-header">
                            <img src=".<?= $post["userphotopath"] ?>" alt="Foto do usuário" class="post-user-profile">
                            <a href="./perfil.php?perfil=<?= $post["userlogin"] ?>" class="post-user-nick"><?= $post["userlogin"] ?></a>
                            <button class="post-btn follow <?= $post['follow'] ? "active" : "" ?>" onclick="act(this,'follow','<?= $post['userid'] ?>','Seguindo')"><?= $post['follow'] ? "Seguindo" : "Seguir" ?></button>
                        </div>
                        <div class="post-body">
                            <img src="./..<?= $post["photopath"] ?>" alt="Foto do pet" class="post-picture abrirfoto">
                            <div class="post-actions">
                                <button class="post-btn <?= $post['liked'] ? "active" : "" ?>" onclick="act(this,'like',<?= $post['id'] ?>)"><i class='fas fa-heart'></i></button>
                                <button class="post-btn <?= $post['save'] ? "active" : "" ?>" onclick="act(this,'save',<?= $post['id'] ?>)"><i class='fas fa-star'></i></button>
                            </div>
                        </div>
                    </div>
                </div>
	        
	        <?php } ?>

        </div>


    </main>
	<?php include(ROOT.'/components/footer.php'); ?>

</div>

</body>
</html>
