<form method="POST" action="aula8exercicio4.php">
    <label>CADASTRO DE ALUNOS</label><br>

    <p>
    <label>Informações do aluno: </label><br>
    <label>Nome: </label>
    <input type="text" name="nome[]"> <br>
    <label>Idade: </label>
    <input type="text" name="idade[]"> <br>
    <label>Curso: </label>
    <input type="text" name="curso[]"> <br>
    <label>Média: </label>
    <input type="text" name="media[]"> <br>
    </p>
    <input type="submit" name="Enviar">
</form>

<?php

function MostrarAluno($alunos){
    foreach($alunos as $aluno){
        echo "O aluno ".$aluno["nome"]." tem ".$aluno["idade"]." anos de idade. Cursa ".$aluno["curso"]." e tem média: ".$aluno["media"].".<br>";
    }
    
}

if (!isset($_POST) || empty($_POST)){
        echo "<br>";
    }
    else {
        $alunos=[
            [   "nome"=>$_POST["nome"][0],
                "idade"=>$_POST["idade"][0],
                "curso"=>$_POST["curso"][0],
                "media"=>$_POST["media"][0],
            ]
        ];
        MostrarAluno($alunos);
    }

?>