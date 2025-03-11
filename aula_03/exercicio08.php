<?php
function RandomNumb(){
    $random_number = [];

    for($i = 0;$i <10;$i++){
        $random_number[$i] = rand(0,100);
    }
    return $random_number;
}
    $receba_vetor = RandomNumb();
    print_r($receba_vetor);
?>