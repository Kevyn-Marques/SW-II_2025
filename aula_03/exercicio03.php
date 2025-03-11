<?php
    function ParImpar($num){
        if ($num % 2 == 0){
            return "Esse número é par :D";
        }
        else{
            return "Esse número é ímpar :P";
        }
    }

    $result = ParImpar(6);
    echo $result;
?>