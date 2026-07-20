<form method="GET" action="aula4exercicio3.php">
    <label>VERIFICAR SE UMA PESSOA PODE VOTAR</label><br><br>
    <label>Idade: </label>
    <input type="text" name="idade"> <br><br>
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
        $idade = $_GET["idade"];

        if($idade >= 0 && $idade < 200){
            if($idade >= 18 && $idade <= 69){
                echo "Voto obrigatório.";
            }
            elseif($idade>=16 && $idade<18 || $idade>=70){
                echo "Voto facultativo.";
            }
            else{
                echo "Não pode votar.";
            }
        }
        else {
            echo "Idade inválida.";
        
        }
        
    }
?>