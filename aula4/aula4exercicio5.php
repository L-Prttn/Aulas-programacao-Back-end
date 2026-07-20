<form method="GET" action="aula4exercicio5.php">
    <label>DIA DA SEMANA COM SWITCH</label><br><br>
    <label>Dia da semana:</label>
    <input type="text" name="dia"> <br>
    <label>De 1 a 7, começando com domingo.<br><br></label>
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
        $dia = $_GET["dia"];

        switch($dia) {
        case "1":
            echo "<br>Dia da semana: Domingo";
            break;
        case "2":
            echo "<br>Dia da semana: Segunda";
            break;
        case "3":
            echo "<br>Dia da semana: Terça";
            break;
        case "4":
            echo "<br>Dia da semana: Quarta";
            break;
        case "5":
            echo "<br>Dia da semana: Quinta";
            break;
        case "6":
            echo "<br>Dia da semana: Sexta";
            break;
        case "7":
            echo "<br>Dia da semana: Sábado";
            break;
        
        default:
            echo "<br>Dia inválido.<br>";
        }
    }
?>