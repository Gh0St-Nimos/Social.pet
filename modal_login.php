<div id="loginModal" class="form-modal" style="">
    <form method="POST" class="form" action="./api.php" ajax>
        <h2>Login</h2>
        <input type="text" class="form-input" name="login" placeholder="Login" required>
        <input type="password" class="form-input" name="senha" placeholder="Senha" required>
        <input type="hidden" name="query" value="login">
        <button type="submit">Entrar</button>
        <div class="return" style="display:none;"></div>
        <div class="link">
            <p>Não tem uma conta? <a onclick="register()">Cadastre-se</a></p>
        </div>
    </form>
</div>
