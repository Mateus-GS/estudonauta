<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Listagem de jogos</title>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
        $ordem = $_GET['o'] ?? "n";
        $chave = $_GET['c'] ?? "";
    ?>
	<div id="corpo">
        <?php include_once "topo.php";?>
        <h1>Escolha seu jogo!</h1>
        <form method="get" id="busca" action="index.php">
            Ordenar: 
            <a href="index.php?o=n&c=<?php echo $chave;?>"> Nome |</a>
            <a href="index.php?o=p&c=<?php echo $chave;?>">Produtora |</a>
            <a href="index.php?o=n1&c=<?php echo $chave;?>"> Nota Alta |</a>
            <a href="index.php?o=n2&c=<?php echo $chave;?>">Nota baixa |</a>
            <a href="index.php">Mostrar todos</a>
            Buscar: <input type="text" name="c" size="10" maxlength="40"/>
            <input type="submit" value="OK">
        </form>
        <table class="listagem">
            <?php
            $q = "select j.cod, j.nome, g.genero,p.produtora ,j.capa from jogos j join generos g on j.genero = g.cod join produtoras p on j.produtora = p.cod  ";
            if(!empty($chave)) {
                $q .= "WHERE j.nome like '%$chave%' or p.produtora like '%$chave%' or g.genero like '%$chave%' ";
            }
            switch ($ordem) {
                case "p":
                    $q .= "ORDER BY p.produtora";
                    break;
                case "n1":
                    $q .= "ORDER BY j.nota DESC";
                    break;
                case "n2":
                    $q .= "ORDER BY j.nota ASC";
                    break;
                default:
                    $q .= "ORDER BY j.nome";
                    break;
            }
                $busca = $banco->query($q);
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
                            echo "$reg->genero";
                            echo "<br> $reg->produtora";
                            echo "<td> Adm";
                        }
                    }
                }
            ?>
        </table>
    </div>
    <?php include_once "rodape.php";?>
<body>
</html>