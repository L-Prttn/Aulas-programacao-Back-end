<form method="post" action="08_calculadora_imc.php">
<label for="peso">Peso (kg):</label>
<input type="number" step="0.1" name="peso" id="peso" required>

<label for="altura">Altura (m):</label>
<input type="number" step="0.01" name="altura" id="altura" required>

<button type="submit">Calcular IMC</button>
</form>

<?php

if(!isset($_POST) || empty($_POST)){
    echo "<br>";
}
else{

    function calcularIMC($peso,$altura){
        $imc=$peso/($altura*$altura);
        return $imc;
    }

    function classificarIMC($imc){

        if($imc<18.5){
            return "Abaixo do peso";
        }
        elseif($imc<25){
            return "Peso normal";
        }
        elseif($imc<30){
            return "Sobrepeso";
        }
        else{
            return "Obesidade";
        }

    }

    $peso=$_POST["peso"];
    $altura=$_POST["altura"];

    $imc=calcularIMC($peso,$altura);
    $classificacao=classificarIMC($imc);

    echo "<br>IMC: ".number_format($imc,2,",",".")."<br>";
    echo "Classificação: ".$classificacao;

}

?>