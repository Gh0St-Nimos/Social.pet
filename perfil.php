<?php include('include/header.php'); ?>

<div class="container">
    <h1>Meu Perfil</h1>
    <img src="img/user-profile.jpg" alt="Perfil">
    <form action="perfil.php" method="POST">
        <label for="name">Nome do Pet:</label>
        <input type="text" id="name" name="name">
        <label for="bio">Descrição:</label>
        <textarea id="bio" name="bio"></textarea>
        <button type="submit">Atualizar Perfil</button>
    </form>
</div>

<?php  ?>

