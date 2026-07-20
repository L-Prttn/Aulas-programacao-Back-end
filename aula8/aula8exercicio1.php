<?php

function CalcularFrete($peso){
    $frete=15+(2.5*$peso);
    return $frete;
}

echo "<p>Caixa 1: R$ ".CalcularFrete(2)."<br>";
echo "Caixa 2: R$ ".CalcularFrete(5)."<br>";
echo "Caixa 3: R$ ".CalcularFrete(12)."<br>";
echo "Caixa 4: R$ ".CalcularFrete(20)."</p>";

?>