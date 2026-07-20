<?php

$nomes = ["João", "Pedro", "Maria", "Carlos", "Ana", "Lucas"];
$i = 0;
$s = 0;

foreach($nomes as $v){
    if($v == "Maria"){
        echo "O nome Maria existe nesta lista e está na posição ".$i ." do array.<br>";
        $s ++;
    }
    $i ++;
}

if($s == 0){
    echo "O nome Maria não está presente nesta lista.<br>";
}

?>