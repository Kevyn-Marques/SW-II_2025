<?php
    $numeros = [1,2,3,4,5,6,7,8,9,10];
    $soma = 0;

    for($i = 0; $i < count($numeros); $i++){
        $soma += $numeros[$i];
    }

    echo $soma;
?>