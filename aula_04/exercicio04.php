<?php
    $numeros = [2,3,23,62,78,85,100,101,123,566,651,666,679,702,777];
    $pares = 0;
    $impares = 0;

    for($i = 0; $i < count($numeros); $i++){
        if($numeros[$i] % 2 == 0){
            $pares += 1;
        }
        else{
            $impares += 1;
        }
    }

    echo "Pares: " . $pares . "<br>";
    echo "Ímpares: " . $impares . "<br>";
?>