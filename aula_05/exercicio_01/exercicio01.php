<?php

$items = [
    "item" => "Ventilador",
    "preco" => 435,
    "quantidade" => 1005
];

$json = json_encode($items, JSON_PRETTY_PRINT);
file_put_contents("item.json", $json)

?>