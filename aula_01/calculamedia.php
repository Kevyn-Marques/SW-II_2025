<?php
    $nota1=7;
    $nota2=8;
    $nota3=9;

    $media = ($nota1 + $nota2 + $nota3)/ 3;

 echo "Nota 1: " . $nota1."<br>";
 echo "Nota 2: " . $nota2."<br>";
 echo "Nota 3: " . $nota3."<br>";
 echo "Média: ". $media . "<br>". ($media >= 7 ? "Aprovado" : "Reprovado");
?>