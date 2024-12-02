<?php
//Isso aqui resolve o problema de incluir as coisas!
define("ROOT", dirname(__FILE__));
require ROOT."/config/config.php";


// aletrsfdszxfd


$con = con();

//Pega um post de cada usuuário aaa
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

");
$query->execute();

//resultado
$posts = $query->fetchAll(PDO::FETCH_ASSOC);

//var_dump($posts) //debug
?>
<html lang="pt-br">
<head>
	<?php include(ROOT.'/components/head.php'); ?>
    <link rel="stylesheet" href="./assets/css/posts.css">

    <style>
        .upload-container {
            margin: auto auto;
            max-width: 300px;
            transition: all 0.3s ease;

        }

        .dz-message {
            text-align: center;
            padding: 50px 10px;
            border: 2px dashed #c17e55;
            border-radius: 20px;
            background-color: #FEE3CB;
            transition: all 0.3s ease;
        }

        .dz-message .icon {
            font-size: 50px;
            color: #333;
            transition: all 0.3s ease;
        }

        .dz-message h3 {
            margin-top: 15px;
            font-size: 18px;
            color: #444;
            transition: all 0.3s ease;
        }

        .dragover .dz-message {
            background-color: #c17e55;
            border: 2px dashed #FEE3CB;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>

<div class="page-container">
	
	<?php include(ROOT.'/components/header.php'); ?>
    <main>
        <h1 class="title">Poste uma Foto do Seu Pet</h1>


        <div class="row justify-content-center g-3">

            <div class="col-auto align-content-center">
                <div class="upload-container ">
                    <form class="dropzone" id="myDropzone">
                        <div class="dz-message">
                            <div class="icon"><i class="fa fa-cloud-upload" aria-hidden="true"></i></div>
                            <h3>Arraste e solte uma imagem aqui ou clique para fazer upload</h3>
                        </div>
                    </form>
                </div>


            </div>
            <!-- Container de Postagem 1 -->
	        <?php foreach ($posts as $post) {
		        ?>
                <div class="col-auto">

                    <div class="post">
                        <div class="post-header">
                            <img src=".<?= $post["userphotopath"] ?>" alt="Foto do usuário" class="post-user-profile">
                            <a href="./perfil.php?perfil=<?= $post["userlogin"] ?>" class="post-user-nick"><?= $post["userlogin"] ?></a>
                            <button class="post-btn follow <?= $post['follow'] ? "active" : "" ?>" onclick="act(this,'follow','<?= $post['userid'] ?>','Seguindo')"><?= $post['follow'] ? "Seguindo" : "Seguir" ?></button>
                        </div>
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

        </div>
    </main>
	<?php include(ROOT.'/components/footer.php'); ?>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        //dropzone
        const dropzone = document.getElementById("myDropzone");

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
            formData.append("query", "post");

            fetch("/api.php", {
                method: "POST",
                body: formData,

            }).then(response => response.text()).then(result => {
                result = JSON.parse(result);
                if (result.status) {
                    alert(result.msg);
                } else if (result.msg) {
		            <?php if (empty($_SESSION["id"])){?>
                    loginModal.style.display = 'block';
		            <?php } ?>
                    alert(result.msg);
                } else {
                    alert("Houve um erro ao fazer upload.")
                }
                console.log(result);
            }).catch(error => {
                console.error("Upload failed:", error);
            });
        }
    });
</script>

</body>
</html>

