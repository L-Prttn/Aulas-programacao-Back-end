<label>COMANDO FOR<br>com continue e break</label><br><br><br>


<?php

for($i=1 ; $i<=20 ; $i++){
    
    if($i == 5 || $i == 10){
        echo "Repetição " . $i . " inválida.<br>";
        continue;
    }
    
    if($i == 14){
        break;
    }

    echo "Repetição número: " . $i . "<br>";
}
?>

<br><br><br>
<label>Par ou ímpar até 100</label>
<br><br>

<?php

for($p=0 ; $p<=100 ; $p++){

    if(($p % 2)==0){
        echo $p . " é par.<br>";
    }
    else{
        echo $p . " é ímpar.<br>";
    }

}

?>