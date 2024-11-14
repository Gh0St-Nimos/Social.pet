<?php include('include/header.php'); ?>

<div class="container">
    <h1>Mensagens</h1>
    <div class="chat-box">
        <div class="message">
            <p><strong>Usuário:</strong> Olá, gostei do seu pet!</p>
        </div>
        <div class="message">
            <p><strong>Você:</strong> Obrigado! Ele adora receber carinho.</p>
        </div>
    </div>

    <form action="mensagem.php" method="POST">
        <textarea name="message" placeholder="Digite uma mensagem..."></textarea>
        <button type="submit">Enviar</button>
    </form>
</div>

<?php ?>
