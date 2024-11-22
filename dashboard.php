<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

// aqui é um exemplo da pag. de redirecionamento. futuramente vai por a pagina do 'feed'.
<h1>Bem-vindo ao Painel!</h1>
<p>Você está logado e tem acesso à área restrita.</p>

<!-- link para fazer o logout -->
<a href="logout.php">Sair</a>
