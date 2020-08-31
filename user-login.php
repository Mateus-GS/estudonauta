<!DOCTYPE html>
<?php 
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/funcoes.php"; 
?>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="style/style.css"/>
		<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
		<title>Login de Usuário</title>
		<style>
			div#corpo {
				width: 270px;
				font-size: 15pt;
			}
			td {
				padding: 6px;
			}
		</style>
	</head>
	<body>
		<div id="corpo">
			<?php
				$u = $_POST['usuario'] ?? null;
				$s = $_POST['senha'] ?? null;

				if (is_null($u) || is_null($s)) {
					require "user-login-form.php";
				} else {
					$q = "SELECT usuario, nome, senha, tipo from usuarios WHERE usuario = '$u' LIMIT 1";
					$busca = $banco->query($q);
					if(!$busca)	{
						echo msg_erro('Falha ao acessar o banco!');
					} else {
						$reg = $busca->fetch_object();
						print_r($reg);
					}
				}
			?>
		</div>
	</body>
</html>