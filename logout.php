<?php
session_start();
session_destroy();  // desloga
header("Location: login.php");  // redireciona para a página de login
exit();
?>
