<form method="POST" action="aula4exercicio6.php">
    <label>VERIFICAR MAIORIDADE</label><br><br>
    <label>Idade: </label>
    <input type="text" name="idade"> <br><br>
    <input type="submit" name="Enviar">
</form>

<?php
    if (!isset($_POST)){
        echo "<br>";
    }
    elseif (empty($_POST)){
        echo "<br>";
    }
    else {
        $idade = $_POST["idade"];

        if($idade >= 0 && $idade < 200){
            if($idade >= 18){
                echo "Maior de idade.";
            }
            else{
                echo "Menor de idade.";
            }
        }
        else {
            echo "Idade inválida.";
        
        }
        
    }
?>