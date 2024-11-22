<?php
include 'conexao.php'; // aqui chama a conexao.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // aqui pega os dados do formulário
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario_id = 1; // prr enquanto, um ID fixo de usuário, depois podemos incluir um login

    // hashing da senha por segurança
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // preparando a consulta SQL com placeholders, com uso do '?'
    $sql = $conn->prepare("INSERT INTO projects (usuario, email, senha, usuario_id) 
                           VALUES (?, ?, ?, ?)");

    // ligando as variáveis aos placeholders
    $sql->bind_param("sssi", $usuario, $email, $senha_hash, $usuario_id);

    // executando a consulta
    if ($sql->execute()) {
        echo "Novo usuário adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql->error;
    }

    $sql->close();
    $conn->close();
}
?>
