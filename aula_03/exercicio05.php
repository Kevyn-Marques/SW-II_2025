<?php

 function somaLista($lista){
    $lista = [2,5,7,8];
    for($i = 0 ;$i <= count($lista);$i++){
        array_sum($lista);
    }
 }
 somaLista();
 ?>