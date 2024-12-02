<?php
//Isso aqui resolve o problema de incluir as coisas!
define("ROOT", dirname(__FILE__));
require ROOT."/config/config.php";

?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>acaba pela por de Deus</title>
	<?php require ROOT."/components/head.php" ?>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/config.css">
</head>
<body>

<div class="page-container">
	<?php include(ROOT.'/components/header.php'); ?>


    <!-- Área de Configurações -->
    <main>
        <div class="settings-content">
            <h1>Configurações</h1>

            <!-- Configurações de Tema -->
            <div class="setting-item">
                <h2>Tema</h2>
                <p>Escolha entre o modo claro e escuro.</p>
            </div>

            <!-- Configurações de Idioma -->
            <div class="setting-item">
                <h2>Idioma</h2>
                <p>Selecione o idioma do aplicativo.</p>
            </div>

            <!-- Configurações de Notificações -->
            <div class="setting-item">
                <h2>Notificações</h2>
                <p>Gerencie suas preferências de notificação.</p>
            </div>

            <!-- Configurações de Segurança -->
            <div class="setting-item">
                <h2>Segurança</h2>
                <p>Altere sua senha ou configure a autenticação de dois fatores.</p>
            </div>

            <!-- Configurações de Privacidade -->
            <div class="setting-item">
                <h2>Privacidade</h2>
                <p>Controle quem pode ver suas informações e postagens.</p>
            </div>

            <!-- Configurações de Conta -->
            <div class="setting-item">
                <h2>Conta</h2>
                <p>Gerencie suas configurações de conta, como e-mail e senha.</p>
            </div>

            <!-- Configurações de Integrações -->
            <div class="setting-item">
                <h2>Integrações</h2>
                <p>Conecte suas contas a outros aplicativos.</p>
            </div>

            <!-- Configurações de Acessibilidade -->
            <div class="setting-item">
                <h2>Acessibilidade</h2>
                <p>Ajuste as configurações de acessibilidade, como contraste e tamanho de texto.</p>
            </div>

            <!-- Suporte -->
            <div class="setting-item">
                <h2>Suporte</h2>
                <p>Entre em contato com o suporte caso precise de ajuda.</p>
            </div>

            <!-- Sobre o Aplicativo -->
            <div class="setting-item">
                <h2>Sobre</h2>
                <p>Informações sobre o aplicativo, termos de uso e políticas.</p>
            </div>
        </div>

    </main>
	<?php include(ROOT.'/components/footer.php'); ?>
</div>

</body>
</html>
