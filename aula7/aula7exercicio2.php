<?php

$numeros = [12,5,98,41,27,66,3,50];
$ultimo = 0;
$maior = 0;

foreach($numeros as $v){
    echo "Número: ".$v."<br>";
    if($v > $maior){
        $maior = $v;
    }
    echo "Maior número: ".$maior."<br>";
}

?>