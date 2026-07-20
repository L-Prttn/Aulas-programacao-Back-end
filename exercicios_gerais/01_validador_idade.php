
<form method="post" action="01_validador_idade.php"> 
<label for="idade">Idade:</label> 
<input type="number" name="idade" id="idade" min="0" required> 
<button type="submit">Cadastrar</button> 
</form>

<?php

if (!isset($_POST) || empty($_POST)){
        echo "<br>";
    }
    else {
        $totalCadastros=0;

        function verificarIdade($idade){
            global $totalCadastros;
            if($idade<18){
                echo "Menor de idade";
                $totalCadastros++;
            }
            elseif($idade>=18 && $idade<60){
                echo "Adulto";
                $totalCadastros++;
            }
            elseif($idade>=60){
                echo "Idoso";
                $totalCadastros++;
            }
            else{
                echo "Idade inválida";
            }
        }

        $idade = $_POST["idade"];
        
        verificarIdade($idade);
        echo "<br>Total de cadastros: ".$totalCadastros;

    }

?>