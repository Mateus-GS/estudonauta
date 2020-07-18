<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Listagem de jogos</title>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="estilo/estilo.css">
</head>

<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
    ?>
	<div id="corpo">
		<h1>Escolha seu jogo!</h1>
        <table class="listagem">
            <?php
                $busca = $banco->query("select * from jogos order by nome");
                if(!$busca){
                    echo "<tr><td>Infelismente a busca deu errado";
                }else{
                    if($busca->num_rows == 0){
                        echo "<tr><td>Nenhum registro encontrado";
                    }else{
                        while($reg =$busca->fetch_object()){
                            $resultado_caminho = thumb($reg->capa);
                            echo "<tr><td>  <img style='width:50px' src='$resultado_caminho'/>";
                            echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                            echo "<td> Adm";
                        }
                    }
                }
            ?>
        </table>
    </div>
    <?php $banco->close();?>
<body>
</html>