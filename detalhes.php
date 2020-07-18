<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Título da página</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="estilo/estilo.css">
</head>

<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
    ?>
	<div id="corpo">
        <?php
            $id_cod = $_GET['cod'] ?? 0;
            $busca = $banco->query("select * from jogos where cod='$id_cod'");
        ?>
		<h1>Detalhes do jogo</h1>
        <table class='detalhes'>
            <?php
                if(!$busca) {
                    echo "Busca falhou! $banco->error";
                }else {
                    if($busca->num_rows == 1) {
                        $reg = $busca->fetch_object();
                        $t = thumb($reg->capa);
                        echo "<tr style='vertical-align:top'><td rowspan='3'><img src='$t' style='height: 400px; padding:10px;'>";
                        echo "<td><h2>$reg->nome</h2>";
                        echo "Nota:". number_format($reg->nota, 1)."/10.0";
                        echo "<tr><td><p>$reg->descricao</p>";
                        echo "<tr><td>Adm";
                    } else {
                        echo "Nenhuma informação encotrada";
                    }
                }
            ?>
        </table>
        <a href="index.php"><img src="icones/icoback.png"></a>
	</div>
<body>
</html>