
<div id="registerModal" class="form-modal">
    <form method="POST" class="form" action="./api.php" ajax>
		<h2>Cadastro</h2>
        <input type="text" class="form-input" minlength="4" maxlength="100" name="nome" placeholder="Seu Nome" required>
        <input type="text" class="form-input" minlength="4" maxlength="16" name="login" placeholder="Nome de usuário" required>
        <input type="password" class="form-input" name="password" minlength="8" maxlength="50" placeholder="Senha" required>
        <input type="hidden" name="query" value="registro">
		<button type="submit">Cadastrar</button>
        <div class="return" style="display: none"></div>
	</form>
</div>
<script>

</script>