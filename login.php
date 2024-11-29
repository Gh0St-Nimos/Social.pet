<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "patagram");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            echo "<p class='success'>Login bem-sucedido! Bem-vindo, " . $user['username'] . ".</p>";
        } else {
            echo "<p class='error'>Senha incorreta.</p>";
        }
    } else {
        echo "<p class='error'>Usuário não encontrado.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <form method="POST" action="login.php">
        <h2>Login</h2>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Senha" required>
        <button type="submit">Entrar</button>
        <div class="link">
            <p>Não tem uma conta? <a href="register.php">Cadastre-se</a></p>
        </div>
    </form>
</body>
</html>
