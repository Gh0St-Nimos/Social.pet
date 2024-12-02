<?php
//Isso aqui resolve o problema de incluir as coisas!
define("ROOT", dirname(__FILE__));

require ROOT."/config/config.php";
$con = con();

error_reporting(E_ERROR);

if (empty($_GET["perfil"])) {
	$editar = true;
}
if (strtolower($_GET["perfil"] === $_SESSION["login"])) {
	$editar = true;
}

//deus me livre neogico ruim de fazer isso


$query = $con->prepare("

SELECT
    posts.*,
    userphotopath,
    userlogin,
    !isnull(like.id) as 'liked',
    !isnull(save.id) as 'save',
    !isnull(follow.id) as 'follow'
    
FROM posts
    INNER JOIN users ON posts.userid = users.id
    LEFT JOIN actions `like` ON like.userid = ".((int) $_SESSION['id'] ?: 0)." AND like.targetId = posts.id AND like.type = 'like'
    LEFT JOIN actions save ON save.userid = ".((int) $_SESSION['id'] ?: 0)." AND save.targetId = posts.id AND save.type = 'save'
    LEFT JOIN actions follow ON follow.userid = ".((int) $_SESSION['id'] ?: 0)." AND follow.targetId = users.id AND follow.type = 'follow'

         WHERE users.userlogin = ? group by posts.id order by posts.id desc limit 100");
$query->execute([$_GET["perfil"] ?: $_SESSION["login"]]);
//resultado
$posts = $query->fetchAll(PDO::FETCH_ASSOC);


$user = $con->prepare("SELECT
    users.*,
    !ISNULL(follow.id) AS 'follow',
    COUNT(DISTINCT follows.id) AS follows,
    COUNT(DISTINCT likes.id) AS likes,
    COUNT(DISTINCT following.id) AS following
FROM users
LEFT JOIN posts ON posts.userid = users.id
LEFT JOIN actions likes ON likes.targetId = posts.id AND likes.type = 'like'

LEFT JOIN actions follow ON follow.targetId = users.id AND follow.userid = ".((int) $_SESSION['id'] ?: 0)." AND follow.type = 'follow'
LEFT JOIN actions follows ON follows.targetId = users.id AND follows.type = 'follow'

LEFT JOIN actions following ON following.userid = users.id AND following.type = 'follow'
WHERE users.userlogin = ? GROUP BY users.id");
$user->execute([$_GET["perfil"] ?: $_SESSION["login"]]);
//resultado
$userDAta = $user->fetch(PDO::FETCH_ASSOC);
//var_dump($userDAta); // Debug


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Patagram</title>
	<?php include(ROOT.'/components/head.php'); ?>

    <link rel="stylesheet" href="assets/css/perfil.css">
    <link rel="stylesheet" href="assets/css/posts.css">
</head>
<body>
<div class="page-container">
	<?php include(ROOT.'/components/header.php'); ?>

    <main class="profile">
        <!-- Cabeçalho do perfil -->
        <section class="profile-header">
            <div class="profile-user-picture" id="myProfile">
                <img src=".<?= $userDAta["userphotopath"] ?>" alt="">
            </div>
            <div class="profile-info">
                <div class="username-editable">
                    <h2 class="username"><?= $userDAta["userlogin"] ?></h2>
                </div>
                <div class="bio-editable">
                    <p class="bio"><?= $userDAta["resumo"] ?></p>
                    <button class="btn-edit-icon" style="<?= $editar ? "" : "display: none" ?>" onclick="editField('bio')"><i class="fa fa-pencil"></i></button>
                </div>
                <div class="profile-stats">
                    <p><strong>Seguidores:</strong> <?= $userDAta["follows"] ?></p>
                    <p><strong>Curtidas:</strong> <?= $userDAta["likes"] ?></p>
                    <p><strong>Seguindo:</strong> <?= $userDAta["following"] ?></p>
                </div>
                <div class="profile-actions">
                    <button class="btn-follow <?= $userDAta["follow"] ? 'active' : '' ?>" onclick="act(this,'follow','<?= $userDAta['id'] ?>','Seguindo')" style="<?= $editar ? "display: none" : "" ?>"><?= $userDAta["follow"] ? 'Seguindo' : 'Seguir' ?></button>

                    <button class="btn-edit" style="<?= $editar ? "" : "display: none" ?>">Editar Perfil</button>
                    <a class="btn-message" href="./direct.php" style="<?= $editar ? "" : "display: none" ?>">
                        <i class="fa-duotone fa-solid fa-message-dots"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Galeria de posts -->
        <section class="posts-gallery">
            <div class="row justify-content-center g-3 mt-3">
                <!-- Exemplo de post -->
				<?php foreach ($posts as $post) {
					?>

                    <div class="col-auto">

                        <div class="post">

                            <div class="post-body">
                                <img src="./..<?= $post["photopath"] ?>" alt="Foto do pet" class="post-picture abrirfoto">
                                <div class="post-actions">
                                    <button class="post-btn <?= $post['liked'] ? "active" : "" ?>" onclick="act(this,'like',<?= $post['id'] ?>)"><i class='fas fa-heart'></i></button>
                                    <button class="post-btn <?= $post['save'] ? "active" : "" ?>" onclick="act(this,'save',<?= $post['id'] ?>)"><i class='fas fa-star'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
				} ?>

                <!-- Adicione mais posts conforme necessário -->
            </div>
        </section>
    </main>
	<?php include(ROOT.'/components/footer.php'); ?>
</div>

<script>
	<?php if ($editar){ ?>
    document.addEventListener("DOMContentLoaded", function () {
        //dropzone
        const dropzone = document.getElementById("myProfile");

        //aki ele detecta qquando tem um arquivo no mouse emcima
        dropzone.addEventListener("dragover", function (event) {
            event.preventDefault();
            dropzone.classList.add("dragover");
        });

        //aki ele detecta qquando tem um arquivo no mouse e sai de cima
        dropzone.addEventListener("dragleave", function (event) {
            dropzone.classList.remove("dragover");
        });

        //aki ele detecta qquando tem um arquivo no mouse e joga emcima
        dropzone.addEventListener("drop", function (event) {
            event.preventDefault();
            dropzone.classList.remove("dragover");

            var files = event.dataTransfer.files;
            handleFiles(files);
        });


        // importante pra funcionar o click lá do dopzone
        dropzone.addEventListener("click", function () {
            //input file
            const fileInput = document.createElement("input");
            fileInput.type = "file";
            //apenas imagens
            fileInput.accept = "image/*";
            fileInput.multiple = false;

            //aki ele valida se teve algum arquivo selecionado
            fileInput.addEventListener("change", function (event) {
                const files = fileInput.files;
                //ele pega os arquivos e manda pro upload
                handleFiles(files);
            });
            //ele simula o click
            fileInput.click();
        });

        function handleFiles(files) {
            //envia os arquivo pro upload
            Array.from(files).forEach(uploadFile);
        }

        function uploadFile(file) {
            //aqui ele envia o arquivo pro
            const formData = new FormData();
            //envia o arquivo
            formData.append("file", file);

            //query
            formData.append("query", "photouser");

            fetch("/api.php", {
                method: "POST",
                body: formData,

            }).then(response => response.text()).then(result => {
                result = JSON.parse(result);
                if (result.status) {
                    alert(result.msg);
                } else if (result.msg) {
                    alert(result.msg);
                } else {
                    alert("Houve um erro ao fazer upload.")
                }
                console.log(result);
            }).catch(error => {
                console.error("Falha:", error);
            });
        }
    });
	<?php } ?>
</script>
</body>
</html>
