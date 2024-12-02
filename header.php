<header class="sidebar">
    <img src="./assets/img/logo.png" alt="Logo" class="logo">
    <nav aria-label="Menu de navegação">
        <ul>
            <li><a href="./index.php" class="menu-item"><i class="fa-xl fa-sharp-duotone fa-solid fa-house"></i></a></li>
            <li><a href="./posts.php" class="menu-item"><i class="fa-xl fa-sharp-duotone fa-solid fa-camera-retro"></i></a></li>
            <li><a href="#" onclick="perfil('./perfil.php')" class="menu-item"><i class="fa-xl fa-sharp-duotone fa-solid fa-user"></i></a></li>
            <li><a href="#" onclick="perfil('./feed.php')" class="menu-item"><i class="fa-solid fa-paper-plane-top"></i></a></li>
            <li><a href="#" onclick="perfil('./curtidas.php')" class="menu-item"><i class="fa-xl fa-sharp fa-heart"></i></a></li>
            <li><a href="#" onclick="perfil('./stars.php')" class="menu-item"><i class="fa-xl fa-sharp fa-star"></i></a></li>
            <li><a href="#" onclick="perfil('./ajustes.php')" class="menu-item"><i class="fa-xl fa-sharp-duotone fa-gear"></i></a></li>
	        <?php if (!empty($_SESSION["id"])) { ?>
                <li><a href="./sair.php" class="menu-item"><i class="fa-xl fa-sharp-duotone fa-right-from-bracket"></i></a></li>
	        <?php } ?>
        </ul>
    </nav>
</header>
<?php require ROOT . "/components/modal_cookie.php"; ?>
<?php require ROOT . "/components/modal_register.php"; ?>
<?php require ROOT . "/components/modal_login.php"; ?>
<?php require ROOT . "/components/modal_foto.php"; ?>
<script defer>
    function perfil(url) {
        //   window.location.href = url;
		<?php if (!empty($_SESSION["id"])){?>
        window.location.href = url;
		<?php } else {?>
        loginModal.style.display = 'block';
		
		<?php } ?>
    }

    function register() {
        loginModal.style.display = 'none';
        registerModal.style.display = 'block';

    }

    function act(e, type, id, content = "") {
	    
	    <?php if (empty($_SESSION["id"])){?>
        loginModal.style.display = 'block';
	    
	    <?php } else { ?>
        if (!e.classList.contains("active")) {
            e.classList.add("active");
            if (content.length) {
                e.innerHTML = content;
            }

            // Send POST request to ./api.php
            fetch('./api.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({query: "act", id: id, type: type})
            }).then(response => response.json())
                .then(data => {
                    console.error(data);
                    if (data.success) {
                        console.log('Post liked successfully');
                    } else {
                    }
                })
                .catch(error => console.error('Error:', error));


        }
	    <?php }   ?>

    }
</script>