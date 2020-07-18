<?php
    echo "<footer>";
    echo "<p>Acessado por ".$_SERVER['REMOTE_ADDR'] ." em ". date('Y') ." </p>";
    echo "<p>Desenvolvido por Mateus Gonçalves &copy 2020 </p>";
    echo "</footer>";
    $banco->close();
?>