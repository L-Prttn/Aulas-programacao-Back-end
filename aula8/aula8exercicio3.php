<?php

function CalcularSalarioLiquido($bruto,$inss,$ir){
    $liquido=$bruto*(100-$inss-$ir)/100;
    return $liquido;
}

$funcionarios=[
    "João" => 2500, 
    "Maria" => 3500, 
    "Carlos" => 5000
];
$inss=8;
$ir=5;

foreach($funcionarios as $nome => $bruto){
    echo "Salarios líquido do funcionario ".$nome.": R$ ";
    echo CalcularSalarioLiquido($bruto,$inss,$ir);
    echo "<br>";
    }
?>