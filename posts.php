<?php include('include/header.php'); ?>

<div class="container">
    <h1>Poste uma Foto do Seu Pet</h1>
    <form action="posts.php" method="POST" enctype="multipart/form-data">
        <label for="pet-photo">Escolha uma foto:</label>
        <input type="file" name="pet-photo" id="pet-photo" required>
        
        <label for="description">Descrição:</label>
        <textarea name="description" id="description"></textarea>
        
        <button type="submit">Postar</button>
    </form>
</div>

<?php ?>
