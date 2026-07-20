<form method="POST" action="aula7exercicio6.php">
    <label>CADSTRO DE FRUTAS</label><br><br>

    <label>Fruta 1: </label>
    <input type="text" name="fruta[]"> <br><br>
    <label>Fruta 2: </label>
    <input type="text" name="fruta[]"> <br><br>
    <label>Fruta 3: </label>
    <input type="text" name="fruta[]"> <br><br>
    <label>Fruta 4: </label>
    <input type="text" name="fruta[]"> <br><br>
    <label>Fruta 5: </label>
    <input type="text" name="fruta[]"> <br><br>
    
    <input type="submit" name="Enviar">
</form>

<?php

if (!isset($_POST) || empty($_POST)){
        echo "<br>";
    }
    else {
        $fruta = $_POST["fruta"];
        echo "<pre>";
        print_r($fruta);
    }

?>