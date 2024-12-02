<?php
//Isso aqui resolve o problema de incluir as coisas!
define("ROOT", dirname(__FILE__));
require ROOT."/config/config.php";


?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Direct</title>
    <?php include ROOT."/components/head.php";?>
    <link rel="stylesheet" href="./assets/css/direct.css">
    
</head>
<body>

<div class="page-container">
	
	<?php include ROOT."/components/header.php";?>
    <div class="chat-container" style="margin-top: 15px">
        <div class="chat-header">
            <h2>Direct</h2>
        </div>


        <div class="contact-list">
            <div class="contact">
                <img src="img4.jpg" alt="Pluto" class="profile-img">
                <div class="message-info">
                    <span class="contact-name">Pluto</span>
                    <span class="message-preview">Eu odeio minha dona, ela não me deixa fazer nada</span>
                </div>
                <span class="message-time">5 min atrás</span>
            </div>
            <div class="contact">
                <img src="perfil2.jpg" alt="pipiu" class="profile-img">
                <div class="message-info">
                    <span class="contact-name">Oscar(periquito chato)</span>
                    <span class="message-preview">Para de latir cachorro pulguento.</span>
                </div>
                <span class="message-time">12 min atrás</span>
            </div>
            <div class="contact">
                <img src="perfil3.jpg" alt="pipiu" class="profile-img">
                <div class="message-info">
                    <span class="contact-name">Alvin(Difunto)</span>
                    <span class="message-preview">I'm back, I always come back.</span>
                </div>
                <span class="message-time">20 min atrás</span>
            </div>
            <div class="contact">
                <img src="perfil4.jpg" alt="Chihiro" class="profile-img">
                <div class="message-info">
                    <span class="contact-name">Chihiro</span>
                    <span class="message-preview">Para de tentar comer meus filhos</span>
                </div>
                <span class="message-time">30 min atrás</span>
            </div>
            <div class="contact">
                <img src="perfil5.jpg" alt="Piu" class="profile-img">
                <div class="message-info">
                    <span class="contact-name">Pinto 1(lanche)</span>
                    <span class="message-preview">Vem que eu te peito menó</span>
                </div>
                <span class="message-time">1 hora atrás</span>
            </div>
            <div class="contact">
                <img src="perfil6.jpg" alt="piu" class="profile-img">
                <div class="message-info">
                    <span class="contact-name">Pinto 2 (excluido da ninhada)</span>
                    <span class="message-preview">Acho que minha familia me odeia</span>
                </div>
                <span class="message-time">2 horas atrás</span>
            </div>
        </div>
    </div>
	<?php include(ROOT.'/components/footer.php'); ?>
</div>
</body>
</html>
