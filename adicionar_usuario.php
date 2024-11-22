<?php
include 'conexao.php'; //aqui chama a conexao.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // é importante lembrar que aqui eu pego os dados do formulario!
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario_id = 1; // "por enquanto, um ID fixo de usuário, depois incluimos um login"

    // inserindo no banco
   $sql = "INSERT INTO projects (usuario, email, senha, usuario_id)
        VALUES ('$usuario', '$email', '$senha', '$usuario_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo projeto adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
