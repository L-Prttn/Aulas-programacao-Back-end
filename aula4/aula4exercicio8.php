<form method="POST" action="aula4exercicio8.php">
    <label>TURNO ESCOLAR</label><br><br><br>
    <label>Turno: </label>
    <select name="turno">
        <option value=""></option>
        <option value="M">M</option>
        <option value="T">T</option>
        <option value="N">N</option>
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
        $turno = $_POST["turno"];

        switch($turno) {
        case "M":
            echo "<br>Turno: manhã.";
            break;
        case "T":
            echo "<br>Turno: tarde.";
            break;
        case "N":
            echo "<br>Turno: noite.";
            break;

        default:
            echo "<br>Turno inválido.<br>";
        }
    }
?>