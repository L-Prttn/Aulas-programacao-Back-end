<form method="GET" action="aula4exercicio2.php">
    <label>VERIFICAR APROVAÇÃO DE ALUNO</label><br><br>
    <label>Nota: </label>
    <input type="text" name="nota"> <br><br>
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
        $nota = $_GET["nota"];

        if($nota >= 0 && $nota <= 10){
            if($nota >= 7){
                echo "Aprovado.";
            }
            elseif($nota < 5){
                echo "Reprovado.";
            }
            else{
                echo "Recuperação.";
            }
        }
        else {
            echo "Nota inválida.";
        
        }
        
    }
?>