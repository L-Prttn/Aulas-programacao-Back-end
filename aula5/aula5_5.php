<label>SORTEAR DADO</label><br><br><br>

<?php

$i=10;

while($i > 0){
    $i = rand(1,6);
    echo "Número sorteado: " . $i . "<br>";
    if($i == 6){
        break;
    }
}

?>