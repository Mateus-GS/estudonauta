<!DOCTYPE html>
<?php 
require_once "includes/banco.php";
require_once "includes/funcoes.php"; 
?>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="style/style.css"/>
		<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
		<title>Detalhes do Jogo</title>
	</head>
	<body>
		<div id="corpo">
			<?php include "topo.php"; ?>
			<?php echo msg_sucesso('Arquivo arberto com sucesso');?>
			<?php echo msg_aviso('Arquivo arberto com sucesso');?>
			<?php echo msg_erro('Arquivo arberto com sucesso');?>
			<table class="detalhes">
			<?php
				$cod = $_GET['cod'] ?? 0;
				$q = "SELECT * FROM jogos j WHERE j.cod = '$cod'";
				$busca = $banco->query($q);
				if (!$busca) {
					echo "Falhou! $banco->error";
				} else {
					if ($busca->num_rows > 0) {
						$reg = $busca->fetch_object();
						$thumb = thumb($reg->capa);
						echo "<tr><td rowspan='3'><img class='grande' src='$thumb'/>";
						echo "<td><h1>$reg->nome</h1>";
						echo "Nota: $reg->nota / 10.0";
						echo "<tr><td><p>$reg->descricao</p>";
					} else {
						echo "<p>Jogo não encontrado</p>";
					}		
				}
			?>
			</table>
			<?php echo voltar() ?>
		</div>
		<?php include "rodape.php"; ?>
	</body>
</html>