<?php
session_start();
require 'db_connection.php'; // conexão com o banco

$user_id = $_SESSION['user_id']; // ID do usuário logado
$post_id = $_POST['post_id'];    // ID do post enviado via formulário ou AJAX

// Verifica se o post já foi curtido
$query = "SELECT * FROM likes WHERE user_id = ? AND post_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $user_id, $post_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Remove a curtida
    $query = "DELETE FROM likes WHERE user_id = ? AND post_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $user_id, $post_id);
    $stmt->execute();
    echo "Curtida removida!";
} else {
    // Adiciona a curtida
    $query = "INSERT INTO likes (user_id, post_id) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $user_id, $post_id);
    $stmt->execute();
    echo "Curtido!";
}
?>

