<form method="POST" action="aula7exercicio9.php">
    <label>CONTAGEM DE NÚMEROS POSITIVOS</label><br><br>

    <label>Número 1: </label>
    <input type="text" name="numero[]"> <br>
    <label>Número 2: </label>
    <input type="text" name="numero[]"> <br>
    <label>Número 3: </label>
    <input type="text" name="numero[]"> <br>
    <label>Número 4: </label>
    <input type="text" name="numero[]"> <br>
    <label>Número 5: </label>
    <input type="text" name="numero[]"> <br>
    <label>Número 6: </label>
    <input type="text" name="numero[]"> <br>
    <label>Número 7: </label>
    <input type="text" name="numero[]"> <br>
    <label>Número 8: </label>
    <input type="text" name="numero[]"> <br>

    <br>
    <input type="submit" name="Enviar">
</form>

<?php

if (!isset($_POST) || empty($_POST)){
        echo "<br>";
    }
    else {
        $numeros = $_POST["numero"];
        $positivos = 0;
        $negativos = 0;
        $zeros = 0;

        echo"Números: ";
        foreach($numeros as $v){
            echo $v.", ";

            if($v > 0){
                $positivos ++;
            }
            elseif($v < 0){
                $negativos ++;
            }
            else{
                $zeros ++;
            }
        }
        echo "<br><br>Números positivos: ".$positivos;
        echo "<br>Números negativos: ".$negativos;
        echo "<br>Números iguais a zero: ".$zeros;
    }

?>