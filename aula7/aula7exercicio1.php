<?php

$numeros = [5, 8, 10, 3, 7, 12, 20, 1, 9, 6];
$soma = 0;

foreach($numeros as $v){
    echo "Número: ".$v."<br>";
    $soma = $soma + $v;
    echo "Soma dos números: ".$soma."<br>";
}

?>