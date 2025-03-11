<?php
    function Tabuada($num){
        $lista = [];
        for ($i = 1; $i <= 10; $i++){
            $lista[$i - 1] = $num * $i;
        }
        return $list;
    }

    $Tabuada = Tabuada(7);
    foreach($Tabuada as $num){
        echo $num . "<br>";
    }
?>