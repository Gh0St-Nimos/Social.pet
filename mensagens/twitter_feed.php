<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "patagram");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Inserir tweet no banco de dados
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $content = $_POST['tweet_content'];

    if (!empty($content)) {
        $stmt = $conn->prepare("INSERT INTO tweets (content) VALUES (?)");
        $stmt->bind_param("s", $content);
        $stmt->execute();
        $stmt->close();
    }
}

// Recuperar todos os tweets do banco de dados
$tweets = [];
$sql = "SELECT * FROM tweets ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tweets[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed de Mensagens - Twitter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <!-- Box para escrever um novo tweet -->
        <div class="tweet-box">
            <form method="POST" action="twitter_feed.php">
                <textarea name="tweet_content" placeholder="O que está acontecendo?" rows="4"></textarea>
                <button type="submit">Postar</button>
            </form>
        </div>

        <!-- Feed de tweets -->
        <div id="tweetFeed" class="tweet-feed">
            <?php foreach ($tweets as $tweet): ?>
                <div class="tweet">
                    <p><?php echo htmlspecialchars($tweet['content']); ?></p>
                    <span class="tweet-time"><?php echo $tweet['created_at']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>
