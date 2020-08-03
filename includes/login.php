<?php

function gerarHash($senha){
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    return $hash;
}

function testerHash($senha, $hash){
    $ok = password_verify($senha, $hash);
    return $ok;
}

// echo testerHash('teste', '$2y$10$S7ssUABr8YuYbko7AL8HSuqMgzkLMlQMReYW3n4f3LXLqpDFy3rPC');

if(testerHash('teste', '$2y$10$S7ssUABr8YuYbko7AL8HSuqMgzkLMlQMReYW3n4f3LXLqpDFy3rPC')){
echo 'Senha correta';
}else{
    echo "Senha errada";
}