<?php
//Isso aqui resolve o problema de incluir as coisas!
define("ROOT", dirname(__FILE__));
require ROOT."/config/config.php";

// pra evitar aqueles avisos chatos
$_DATA = json_decode(file_get_contents("php://input"), true);
$retorno = [
	"status" => false,
	"msg"    => "Não foi encontrado a rota",


];

switch ($_DATA["query"] ?: $_POST["query"]) {
	default:
		$retorno["status"] = false;
		$retorno["msg"] = "Nenhum resultado encontrado";
		break;
	
	case "registro":
		$nome = $_DATA["nome"];
		$senha = $_DATA["password"];
		$login = $_DATA["login"];
		if (empty($nome) || empty($login) || empty($senha)) {
			$retorno["status"] = false;
			$retorno["msg"] = "Preencha todos os campos";
			break;
		}
		
		$c = con();
		
		
		$s = $c->prepare("SELECT * FROM users WHERE userlogin = ?");
		$s->execute([$login]);
		if ($s->rowCount()) {
			$retorno["status"] = false;
			$retorno["msg"] = "Já existe um usuário com esse login";
			break;
		}
		
		
		$add = $c->prepare("INSERT INTO users(username,userlogin,password) VALUES (?,?,?)");
		if ($add->execute([$nome, $login, password_hash($senha, PASSWORD_BCRYPT)])) {
			$retorno["status"] = true;
			$retorno["msg"] = "Cadastro realizado com sucesso";
			
			//adiociona na sessão aki
			session_start();
			$_SESSION["id"] = $c->lastInsertId();
			$_SESSION["nome"] = $nome;
			$_SESSION["login"] = $login;
			
		} else {
			$retorno["status"] = false;
			$retorno["msg"] = "Falha ao cadastrar";
		}
		break;
	case "login":
		$login = $_DATA["login"];
		$senha = $_DATA["senha"];
		if (empty($login) || empty($senha)) {
			$retorno["status"] = false;
			$retorno["msg"] = "Preencha todos os campos";
			break;
		}
		
		$c = con();
		$a = $c->prepare("SELECT * FROM users WHERE userlogin = ? ");
		$a->execute([$login]);
		if (!$a->rowCount()) {
			$retorno["status"] = false;
			$retorno["msg"] = "Nenhuma conta encontrada";
			break;
		}
		//pega os dados da conta
		$user = $a->fetch(PDO::FETCH_ASSOC);
		
		//valida se a senha está correta
		if (password_verify($senha, $user["password"])) {
			$retorno["status"] = true;
			$retorno["msg"] = "Login realizado com sucesso";
			$retorno["refresh"] = true;
			
			session_start();
			$_SESSION["id"] = $user["id"];
			$_SESSION["nome"] = $user["username"];
			$_SESSION["login"] = $user["userlogin"];
			
		} else {
			$retorno["status"] = false;
			$retorno["msg"] = "Senha incorreta";
		}
		
		
		break;
	case "act":
		$id = $_DATA["id"];
		$c = con();
		$a = $c->prepare("INSERT INTO actions(type, userid, targetId, actDate) VALUES (?,?,?,?);");
		$a->execute([$_DATA["type"], $_SESSION["id"], $id, date("Y-m-d H:i:s")]);
		
		break;
	case "post_tweet":
		if (empty($_SESSION["id"])) {
			$retorno["status"] = false;
			$retorno["msg"] = "Você precisa estar logado para postar";
			break;
		}
		$content = trim($_DATA["tweet_content"]);
		if (empty($content)) {
			$retorno["status"] = false;
			$retorno["msg"] = "Preencha com alguma mensagem";
			break;
		}
		
		$c = con();
		
		$stmt = $c->prepare("INSERT INTO tweets (content,userId) VALUES (?,?)");
		if ($stmt->execute([$content, $_SESSION["id"]])) {
			
			$retorno["status"] = true;
			$retorno["msg"] = "Enviado";
			$retorno["refresh"] = true;
		} else {
			
			$retorno["status"] = false;
			$retorno["msg"] = "Falha ao salvar no banco";
		}
		
		
		break;
	case "post":
		if (empty($_SESSION["id"])) {
			$retorno["status"] = false;
			$retorno["msg"] = "Você precisa estar logado";
			break;
		}
		
		$img = $_FILES["file"];
		if (empty($img["name"])) {
			$retorno["status"] = false;
			$retorno["msg"] = "Selecione uma imagem";
			break;
		}
		
		
		$localImg = "/assets/img/";
		
		
		if (!is_dir($localImg)) {
			mkdir($localImg, 0755, true);
		}
		$hashfile = hash_file("xxh32", $img["tmp_name"]);
		
		$localImg .= $hashfile.time().".jpg";
		
		if (move_uploaded_file($img["tmp_name"], ROOT.$localImg)) {
			$retorno["status"] = true;
			$retorno["msg"] = "Imagem enviada com sucesso";
		} else {
			$retorno["status"] = false;
			$retorno["msg"] = "Falha ao mover a imagem";
		}
		
		$c = con();
		$a = $c->prepare("INSERT INTO posts( photopath, userid) VALUES (?,?);");
		if ($a->execute([$localImg, $_SESSION["id"]])) {
			$retorno["status"] = true;
			$retorno["msg"] = "Enviado";
		} else {
			$retorno["status"] = false;
			$retorno["msg"] = "Falha ao salvar no banco";
		}
		
		break;
	case "photouser":
		if (empty($_SESSION["id"])) {
			$retorno["status"] = false;
			$retorno["msg"] = "Você precisa estar logado";
			break;
		}
		
		$img = $_FILES["file"];
		if (empty($img["name"])) {
			$retorno["status"] = false;
			$retorno["msg"] = "Selecione uma imagem";
			break;
		}
		
		
		$localImg = "/assets/img/";
		
		
		if (!is_dir($localImg)) {
			mkdir($localImg, 0755, true);
		}
		$hashfile = hash_file("xxh32", $img["tmp_name"]);
		
		$localImg .= $hashfile.time().".jpg";
		
		if (move_uploaded_file($img["tmp_name"], ROOT.$localImg)) {
			$retorno["status"] = true;
			$retorno["msg"] = "Imagem enviada com sucesso";
		} else {
			$retorno["status"] = false;
			$retorno["msg"] = "Falha ao mover a imagem";
		}
		
		$c = con();
		$a = $c->prepare("UPDATE users SET userphotopath = ? WHERE id = ?");
		if ($a->execute([$localImg, $_SESSION["id"]])) {
			$retorno["status"] = true;
			$retorno["msg"] = "Enviado";
		} else {
			$retorno["status"] = false;
			$retorno["msg"] = "Falha ao salvar no banco";
		}
		
		break;
}

exit(json_encode($retorno));