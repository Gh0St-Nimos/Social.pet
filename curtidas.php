<?php
//Isso aqui resolve o problema de incluir as coisas!
define("ROOT", dirname(__FILE__));
require ROOT."/config/config.php";

$c = con();
$q = $c->prepare("SELECT * FROM actions
    INNER JOIN posts ON targetId = posts.id
    INNER JOIN users ON users.id = posts.userid
         WHERE actions.userid = ? AND actions.type = 'like' GROUP BY posts.id");
$q->execute([$_SESSION['id']]);
$posts = $q->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Publicações Curtidas</title>
    <link rel="stylesheet" href="./assets/css/likes.css">
	<?php include(ROOT.'/components/head.php'); ?>
</head>
<body>
<div class="page-container">
	<?php include(ROOT.'/components/header.php'); ?>
    <main class="">
        <div class="containerlikes">
			<?php
			if (!empty($posts)) {
				foreach ($posts as $post) {
					?>
                    <div class="postinho">
                        <div class="post-details">
                            <img src=".<?= $post["photopath"] ?>" alt="Foto ">
                            <span class="username"><?= $post["username"] ?> — <small onclick="window.location.href='./perfil.php?perfil=<?= $post["userlogin"] ?>'" role="button">@<?= $post["userlogin"] ?></small> </span>
                        </div>
                        <div class="post-actiono">
                            <i class="fas fa-heart"></i>
                            <p class="curtido">Você curtiu essa publicação</p>
                        </div>
                    </div>
					
					<?php
				}
				
			} else {
				?>
				
				<?php
			}
			?>
        </div>


    </main>
	
	<?php include(ROOT.'/components/footer.php'); ?>
</div>
</body>
</html>
