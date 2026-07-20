<form method="POST" action="aula4exercicio10.php">
    <label>CALCULADORA DE OPERAÇÕES</label><br><br><br>
    <label>Número 1: </label>
    <input type="text" name="num1"> <br><br>
    <label>Número 2: </label>
    <input type="text" name="num2"> <br><br>
    <label>Operação: </label>
    <select name="op">
        <option value=""></option>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select><br><br>
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
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $op = $_POST["op"];
        $result = 0;

        switch($op) {
        case "+":
            $result = $num1 + $num2;
            echo "<br>Resultado da Operação: " . $result;
            break;
        case "-":
            $result = $num1 - $num2;
            echo "<br>Resultado da Operação: " . $result;
            break;
        case "*":
            $result = $num1 * $num2;
            echo "<br>Resultado da Operação: " . $result;
            break;
        case "/":
            $result = $num1 / $num2;
            echo "<br>Resultado da Operação: " . $result;
            break;
        default:
            echo "<br>Operação inválida.<br>";
        }
    }
?>