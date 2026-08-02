<?php

require_once("Aluno.php");
require_once("Turma.php");

session_start();

?>

<form method="post" action="30_turma_alunos.php">

<label for="nome">Nome do aluno:</label>
<input type="text" name="nome" id="nome" required>

<label for="nota1">Nota 1:</label>
<input type="number" step="0.1" name="nota1" id="nota1" required>

<label for="nota2">Nota 2:</label>
<input type="number" step="0.1" name="nota2" id="nota2" required>

<label for="nota3">Nota 3:</label>
<input type="number" step="0.1" name="nota3" id="nota3" required>

<button type="submit">Adicionar aluno</button>

</form>

<?php

$turma=new Turma();

if(!isset($_POST) || empty($_POST)){
    echo "<br>";
}
else{

    $nome=$_POST["nome"];

    $notas=[
        $_POST["nota1"],
        $_POST["nota2"],
        $_POST["nota3"]
    ];

    $turma->adicionarAluno($nome,$notas);

}

$situacoes=$turma->listarPorSituacao();

echo "<br>Aprovados:<br>";

foreach($situacoes["Aprovado"] as $aluno){
    echo $aluno->nome." - Média: ".number_format($aluno->media(),2,",",".")."<br>";
}

echo "<br>Recuperação:<br>";

foreach($situacoes["Recuperação"] as $aluno){
    echo $aluno->nome." - Média: ".number_format($aluno->media(),2,",",".")."<br>";
}

echo "<br>Reprovados:<br>";

foreach($situacoes["Reprovado"] as $aluno){
    echo $aluno->nome." - Média: ".number_format($aluno->media(),2,",",".")."<br>";
}

if(count($turma->alunos)>0){
    echo "<br>Média geral da turma: ";
    echo number_format($turma->mediaGeralDaTurma(),2,",",".");
}

?>