<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // recebe os dados do formulário de login
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // verifica se os campos estão preenchidos
    if (empty($email) || empty($senha)) {
        echo "Todos os campos são obrigatórios!";
    } else {
        // consulta o banco para verificar se o email existe
        $sql = $conn->prepare("SELECT id, senha FROM users WHERE email = ?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {
            // confirma se o usuario existe
            $user = $result->fetch_assoc();
            
            // verifica se a senha fornecida é válida
            if (password_verify($senha, $user['senha'])) {
                // se o login for bem sucedido vai direcionar para o doc
                header("Location: dashboard.php");
                exit();  // parte mais importante!
            } else {
                echo "Senha incorreta!";
            }
        } else {
            echo "Usuário não encontrado!";
        }

        $sql->close();
        $conn->close();
    }
}
?>

<form action="login.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>

    <button type="submit">Entrar</button>
</form>
