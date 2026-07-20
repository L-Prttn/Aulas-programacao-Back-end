<form method="POST" action="aula4exercicio7.php">
    <label>CALCULADORA IMC</label><br><br>
    <label>Peso (Kg): </label>
    <input type="text" name="peso"> <br><br>
    <label>Altura (m): </label>
    <input type="text" name="altura"> <br><br>
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
        $peso = $_POST["peso"];
        $altura = $_POST["altura"];
        $imc = 0;

        if($peso > 0 && $altura > 0){
            $imc = $peso / ($altura * $altura);
            echo "<br>Seu IMC é: ".$imc;
            if($imc < 18.5){
                echo "<br>Abaixo do peso.<br>";
            }
            elseif($imc >= 18.5 && $imc < 25){
                echo "<br>Peso normal.<br>";
            }
            elseif($imc >= 25 && $imc < 30){
                echo "<br>Sobrepeso.<br>";
            }
            else{
                echo "<br>Obesidade.";
            }
        }
        else {
            echo "Idade inválida.";
        
        }
        
    }
?>