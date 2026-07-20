<form method="POST" action="aula5exercicio2.php">
    <label>SEQUÊNCIA DE FIBONACCI</label><br><br><br>
    <label>Quantidade de termos da sequencia: </label>
    <input type="text" name="quant"> <br><br>
    <input type="submit" name="Enviar">
</form>

<?php
    if (!isset($_POST) || empty($_POST)){
        echo "<br>";
    }
    else {
        $quant = $_POST["quant"];
        $x = 1;
        $y = 1;
        $z = 0;

        if($quant>0){
            echo "Sequência de Fibonacci: 0 1 ";
            for($i=1 ; $i<=$quant ; $i++){
                $x = $y + $z;
                echo $x . " ";
                $z = $y;
                $y = $x;
            }
        }
        else{
            echo "Quantidade inválida.";
        }

    }
?>