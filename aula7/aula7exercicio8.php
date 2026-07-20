<form method="POST" action="aula7exercicio8.php">
    <label>MAIOR IDADE</label><br><br>

    <label>Idade 1: </label>
    <input type="text" name="idade[]"> <br>
    <label>Idade 2: </label>
    <input type="text" name="idade[]"> <br>
    <label>Idade 3: </label>
    <input type="text" name="idade[]"> <br>
    <label>Idade 4: </label>
    <input type="text" name="idade[]"> <br>
    <label>Idade 5: </label>
    <input type="text" name="idade[]"> <br>
    
    <br>
    <input type="submit" name="Enviar">
</form>

<?php

if (!isset($_POST) || empty($_POST)){
        echo "<br>";
    }
    else {
        $idades = $_POST["idade"];

        echo"Idades: ";
        foreach($idades as $v){
            echo $v.", ";
        }
        echo "<br>Maior idade: ".max($idades);
    }

?>