<?php

$numeros = [5,8,11,14,20,35,44,18,9,7,60,70,3,1,22];
$pares = 0;
$impares = 0;

foreach($numeros as $v){
    if($v % 2 == 0){
        $pares ++;
        echo "Número ".$v." é par.<br>";
    }
    else{
        $impares ++;
        echo "Número ".$v." é ímpar.<br>";
    }
}
echo "Total de números pares: ".$pares."<br>";
echo "Total de números ímpares: ".$impares."<br>";


?>