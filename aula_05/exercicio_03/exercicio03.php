<?php

$conteudo = file_get_contents("item.json");
$dados = json_decode($conteudo, true);

$add_item = [
    "item" => "Micro-ondas",
    "preco" => 545,
    "quantidade"=> 225
];

$dados[] = $add_item;

file_put_contents("item.json", json_encode($dados, JSON_PRETTY_PRINT));

echo "item adicionado ao carrinho com sucesso";

?>