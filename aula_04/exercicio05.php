<?php
    $notas = ["Felipe" => 9, "Paulo" => 7, "Jhonatam" => 5];
    $soma = 0;
    
    foreach ($notas as $nome => $valor) {
        $soma += $valor;
    }
    $resul = $soma / count($notas);
    echo "Média: " . $resul;
?>