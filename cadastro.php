<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // verifica se os campos estão preenchidos
    if (empty($usuario) || empty($email) || empty($senha)) {
        echo "Todos os campos são obrigatórios!";
    } else {
        // Hash da senha para segurança
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // aqui prepara a query para inserção
        $sql = $conn->prepare("INSERT INTO users (usuario, email, senha) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $usuario, $email, $senha_hash); // Bind das variáveis

      if ($sql->execute()) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar o usuário: " . $sql->error;
        }

        $sql->close();
        $conn->close();
    }
}
?>

<form action="cadastro.php" method="POST">
    <label for="usuario">Usuário:</label>
    <input type="text" id="usuario" name="usuario" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>

    <button type="submit">Cadastrar</button>
</form>
