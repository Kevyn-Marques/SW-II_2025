<?php
    $numeros = [1,2,3,4,5,6,7,8,9,10];
    rsort($numeros);
    $maior = $numeros[0];
    $menor = $numeros[count($numeros) - 1];

    echo $maior . "<br>";
    echo $menor . "<br>";
?>