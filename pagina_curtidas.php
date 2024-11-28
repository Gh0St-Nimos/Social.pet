<?php
session_start();
require 'db_connection.php';

$user_id = $_SESSION['user_id']; // ID do usuário logado

// Busca os posts curtidos pelo usuário
$query = "
    SELECT posts.id, posts.title, posts.content, posts.image 
    FROM posts
    JOIN likes ON posts.id = likes.post_id
    WHERE likes.user_id = ?
";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postagens Curtidas</title>
    
</head>
<body>
    <h1>Seus Posts Curtidos</h1>
    <div class="liked-posts">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="post">
                <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                <p><?php echo htmlspecialchars($row['content']); ?></p>
                <?php if (!empty($row['image'])): ?>
                    <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Imagem do Post">
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
