<form method="POST" action="aula5exercicio1.php">
    <label>CALCULADORA FATORIAL</label><br><br><br>
    <label>Número: </label>
    <input type="text" name="num"> <br><br>
    <input type="submit" name="Enviar">
</form>

<?php
    if (!isset($_POST) || empty($_POST)){
        echo "<br>";
    }
    else {
        $numero = $_POST["num"];
        $fatorial = 1;

        if($numero>0){
            for($numero ; $numero>0 ; $numero--){
                $fatorial = $fatorial * $numero;

            }
            echo "Fatorial de " . $_POST["num"] . " é : " . $fatorial;
        }
        elseif($numero==0){
            echo "Fatorial de 0 é: 1";
        }
        else{
            echo "Número inválido ou não possui fatorial.";
        }

    }
?>