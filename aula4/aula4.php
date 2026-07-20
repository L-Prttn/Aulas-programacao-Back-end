<form method="GET" action="aula4.php">
    <label>Número 1:</label>
    <input type="text" name="num1"> <br><br>
    <label>Número 2:</label>
    <input type="text" name="num2"> <br><br>
    <label>Operação:</label>
    <input type="text" name="op"> <br><br>
    <input type="submit" name="Enviar">
</form>

<?php
    if (!isset($_GET)){
        echo "<br>";
    }
    elseif (empty($_GET)){
        echo "<br>Preencha a operação!<br>";
    }
    else {
        $num1 = $_GET["num1"];
        $num2 = $_GET["num2"];
        $op = $_GET["op"];
        $result = 0;

        switch($op) {
        case "+":
            $result = $num1 + $num2;
            break;
        case "-":
            $result = $num1 - $num2;
            break;
        case "*":
            $result = $num1 * $num2;
            break;
        case "/":
            $result = $num1 / $num2;
            break;
        default:
            echo "<br>Operação inválida.<br>";
        }
        echo "<br>Resultado da Operação: " . $result;
    }
?>