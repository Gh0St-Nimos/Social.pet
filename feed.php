<?php
//Isso aqui resolve o problema de incluir as coisas!
define("ROOT", dirname(__FILE__));
require ROOT."/config/config.php";


$c = con();
// Inserir tweet no banco de dados


// Recuperar todos os tweets do banco de dados
$tweets = [];
$sql = "SELECT tweets.*,users.username,users.userlogin FROM tweets INNER JOIN users ON userId = users.id ORDER BY created_at DESC";
$result = $c->query($sql)->fetchAll(2);
foreach ($result as $tweet) {
	$tweets[] = $tweet;
}


/**
 * Converte um datetime em tempo relativo.
 *
 * @param string $datetime O datetime a ser convertido.
 * @return string O tempo relativo formatado.
 */
function tempo_relativo ($datetime) {
	$agora = new DateTime();
	$data = new DateTime($datetime);
	$diferenca = $agora->diff($data);
	
	$periodos = [
		'ano'     => $diferenca->y,
		'mês'     => $diferenca->m,
		'dia'     => $diferenca->d,
		'hora'    => $diferenca->h,
		'minuto'  => $diferenca->i,
		'segundo' => $diferenca->s,
	];
	
	foreach ($periodos as $nome => $quantidade) {
		if ($quantidade > 0) {
			return ($quantidade === 1 ? "1 $nome" : "$quantidade {$nome}s").' atrás';
		}
	}
	
	return 'agora mesmo';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Feed de Mensagens - Twitter</title>
	<?php include(ROOT.'/components/head.php'); ?>
    <link rel="stylesheet" href="./assets/css/feed.css">
<body>


<div class="page-container">
	<?php include(ROOT.'/components/header.php'); ?>

    <main class="">
        <!-- Box para escrever um novo tweet -->

        <form class="tweet-box" ajax method="POST" action="./api.php">
            <div class="return" style="display: none"></div>
            <textarea class="tweet-input" name="tweet_content" placeholder="O que está pensando?" rows="4"></textarea>
            <input type="hidden" name="query" value="post_tweet"/>
            <button type="submit">Postar</button>
        </form>

        <!-- Feed de tweets -->
        <div id="tweetFeed" class="tweet-feed">
			<?php foreach ($tweets as $tweet): ?>
                <div class="tweet">
                    <h4 class="tweet-user"><?= $tweet["username"] ?> — <small onclick="window.location.href='./perfil.php?perfil=<?= $tweet["userlogin"] ?>'">@<?= $tweet["userlogin"] ?></small></h4>
                    <p class="tweet-body"><?= htmlspecialchars($tweet['content']); ?></p>
                    <span class="tweet-time"><?= tempo_relativo($tweet['created_at']) ?></span>
                </div>
			<?php endforeach; ?>
        </div>
    </main>
	<?php include(ROOT.'/components/footer.php'); ?>
</div>
</body>
</html>
