<?php

function TesteParOuImpar ($x){
    if($x % 2 == 0){
        echo "<p>Número ".$x." é par.</p>";
    }
    else{
        echo "<p>Número ".$x." é ímpar.</p>";
    }
}

function CalculaMedia($n){
    $media=array_sum($n)/count($n);
    echo "<p>Média: ".$media.".</p>";
}

function Operacao($num1, $num2, $op){
    $resultado=0;
    switch($op) {
        case "+":
            $resultado=$num1+$num2;
            return $resultado;
            break;
        case "-":
            $resultado=$num1-$num2;
            return $resultado;
            break;
        case "*":
            $resultado=$num1*$num2;
            return $resultado;
            break;
        case "/":
            $resultado=$num1/$num2;
            return $resultado;
            break;
    }
}

TesteParOuImpar(1);
TesteParOuImpar(2);
TesteParOuImpar(3);
TesteParOuImpar(4);
TesteParOuImpar(5);

$numeros=[7,6,7,8,10];
CalculaMedia($numeros);

echo Operacao(1,2,"+");


?>