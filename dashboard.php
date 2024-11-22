<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

// exemplo de como vai ser
<h1>Bem-vindo ao Painel!</h1>
<p>Você está logado e tem acesso à área restrita.</p>
<a href="logout.php">Sair</a>
