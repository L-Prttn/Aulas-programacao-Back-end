<form method="GET" action="aula4exercicio1.php">
    <label>VERIFICAR SE NÚMERO É POSITIVO, NEGATIVO OU ZERO</label><br><br>
    <label>Número: </label>
    <input type="text" name="numero"> <br><br>
    <input type="submit" name="Enviar">
</form>

<?php
    if (!isset($_GET)){
        echo "<br>";
    }
    elseif (empty($_GET)){
        echo "<br>";
    }
    else {
        $numero = $_GET["numero"];

        if($numero > 0){
            echo "Número positivo.";
        }
        elseif($numero < 0){
            echo "Número negativo.";
        }
        else {
            echo "Número igual a zero.";
        
        }
        
    }
?>