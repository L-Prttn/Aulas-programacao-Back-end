<?php

$frutas = ["Maçã","Uva","Morango","Manga","Laranja"];

foreach($frutas as $v){
    echo "Fruta: ".$v."<br>";
}

$quant=count($frutas);
echo "<br>Quantidade de frutas: ".$quant."<br>";

echo "<br>Primeira fruta: ".$frutas[0];
echo "<br>Última fruta: ".$frutas[$quant-1];


?>