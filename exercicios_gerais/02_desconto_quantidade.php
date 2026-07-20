<?php

$quantidade = 10; 
$precoUnitario = 100; 
// Testar também com 3, 10 e 50 unidades.
$resultado=0;

function calcularDesconto($quantidade,$precoUnitario):array{
    if($quantidade<=5){
        $subtotal=$quantidade*$precoUnitario;
        $desconto=$subtotal*0;
        $resultado=[
            "subtotal"=>$subtotal,
            "desconto"=>$desconto,
            "total"=>$subtotal-$desconto
        ];
        return $resultado;
    }
    elseif($quantidade>5 && $quantidade<=10){
        $subtotal=$quantidade*$precoUnitario;
        $desconto=$subtotal*0.05;
        $resultado=[
            "subtotal"=>$subtotal,
            "desconto"=>$desconto,
            "total"=>$subtotal-$desconto
        ];
        return $resultado;
    }
    elseif($quantidade>10 && $quantidade<=20){
        $subtotal=$quantidade*$precoUnitario;
        $desconto=$subtotal*0.1;
        $resultado=[
            "subtotal"=>$subtotal,
            "desconto"=>$desconto,
            "total"=>$subtotal-$desconto
        ];
        return $resultado;
    }
    elseif($quantidade>20){
        $subtotal=$quantidade*$precoUnitario;
        $desconto=$subtotal*0.15;
        $resultado=[
            "subtotal"=>$subtotal,
            "desconto"=>$desconto,
            "total"=>$subtotal-$desconto
        ];
        return $resultado;
    }
    else{
        echo"Quantidade inválida";
    }
}

$resultado=calcularDesconto($quantidade,$precoUnitario);
echo "Subtotal: R$ " . number_format($resultado["subtotal"], 2, ",", ".") . "<br>";
echo "Desconto: R$ " . number_format($resultado["desconto"], 2, ",", ".") . "<br>";
echo "Total: R$ " . number_format($resultado["total"], 2, ",", ".");

?>