<?php

function CalcularSalarioLiquido($bruto,$inss,$ir){
    $liquido=$bruto*(100-$inss-$ir)/100;
    return $liquido;
}

$salarios=[2500,3500,5000];
$inss=8;
$ir=5;

foreach($salarios as $bruto){
    echo "Salarios líquidos: R$ ".CalcularSalarioLiquido($bruto,$inss,$ir)."<br>";
    }
?>