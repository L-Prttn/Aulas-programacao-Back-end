<form method="POST" action="aula7exercicio7.php">
    <label>MEDIA DE NOTAS</label><br><br>

    <label>Nota 1: </label>
    <input type="text" name="notas[]"> <br>
    <label>Nota 2: </label>
    <input type="text" name="notas[]"> <br>
    <label>Nota 3: </label>
    <input type="text" name="notas[]"> <br>
    <label>Nota 4: </label>
    <input type="text" name="notas[]"> <br>
    
    <br>
    <input type="submit" name="Enviar">
</form>

<?php

if (!isset($_POST) || empty($_POST)){
        echo "<br>";
    }
    else {
        $notas = $_POST["notas"];
        $media = array_sum($notas)/count($notas);

        echo"Notas: ";
        foreach($notas as $v){
            echo $v.", ";
        }
        echo "<br>Média: ".$media;

        if($media >= 7){
            echo"<br>Aluno aprovado.";
        }
        else{
            echo"<br>Aluno reprovado.";
        }
    }

?>