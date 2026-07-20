<?php
session_start();

if (!isset($_SESSION["alunos"])) {
    $_SESSION["alunos"] = [];
}
?>

<form method="POST" action="aula8exercicio4.php">
    <label>CADASTRO DE ALUNOS</label><br>

    <p>
        <label>Informações do aluno:</label><br>

        <label>Nome:</label>
        <input type="text" name="nome"><br>

        <label>Idade:</label>
        <input type="text" name="idade"><br>

        <label>Curso:</label>
        <input type="text" name="curso"><br>

        <label>Média:</label>
        <input type="text" name="media"><br>
    </p>

    <input type="submit" name="Enviar" value="Cadastrar">
</form>

<?php

function MostrarAluno($alunos){
    foreach($alunos as $aluno){
        echo "O aluno <strong>".$aluno["nome"]."</strong> tem "
            .$aluno["idade"]." anos de idade. Cursa "
            .$aluno["curso"]." e tem média "
            .$aluno["media"].".<br><br>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION["alunos"][] = [
        "nome" => $_POST["nome"],
        "idade" => $_POST["idade"],
        "curso" => $_POST["curso"],
        "media" => $_POST["media"]
    ];
}

if (!empty($_SESSION["alunos"])) {
    echo "<h3>Alunos cadastrados:</h3>";
    MostrarAluno($_SESSION["alunos"]);
}
?>