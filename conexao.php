<?php
$servername = "localhost";  // aqui vai dar acesso ao htdocs do sistema principoal a fim de acessar o banco de dados...
$username = "root";  / usuario que vamos logar
$password = "";  // 'senha' padrão do usuario que vamos logar.      Depois era legal mudar isso, e colocar com senha padrão mesmo.
$dbname = "meubanco";  // aqui é o nome do repositorio que vamos usar, por favor modificar para o nome do banco de dados que vamos usar.

// aqui crio a conexao
$conn = new mysqli($servername, $username, $password, $dbname);

// aqui checo se ta ok
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
