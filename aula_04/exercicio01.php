<?php
    $dados = ["Nome" => "Cleiton Ximenes", "idade" => 24, "Cidade" => "Santos", "Profissao" => "Uber"];
    $amigos = ["Otavio", "Carlos da Shell", "Marcos"];

    $ficha = array_merge($dados, $amigos);

    print_r($ficha);
?>