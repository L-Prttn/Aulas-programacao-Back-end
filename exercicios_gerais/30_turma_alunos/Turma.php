<?php

require_once("Aluno.php");

class Turma{

    public $alunos;

    public function __construct(){

        if(isset($_SESSION["turma"])){
            $this->alunos=$_SESSION["turma"];
        }
        else{
            $this->alunos=[];
        }

    }

    public function adicionarAluno($nome,array $notas): void{

        $aluno=new Aluno($nome,$notas);

        $this->alunos[]=$aluno;

        $_SESSION["turma"]=$this->alunos;

    }

    public function mediaGeralDaTurma(){

        $soma=0;

        foreach($this->alunos as $aluno){
            $soma=$soma+$aluno->media();
        }

        return $soma/count($this->alunos);

    }

    public function listarAprovados(): array{

        $aprovados=[];

        foreach($this->alunos as $aluno){

            if($aluno->media()>=7){
                $aprovados[]=$aluno;
            }

        }

        return $aprovados;

    }

    public function listarPorSituacao(): array{

        $situacoes=[
            "Aprovado"=>[],
            "Recuperação"=>[],
            "Reprovado"=>[]
        ];

        foreach($this->alunos as $aluno){

            if($aluno->media()>=7){
                $situacoes["Aprovado"][]=$aluno;
            }
            elseif($aluno->media()>=5){
                $situacoes["Recuperação"][]=$aluno;
            }
            else{
                $situacoes["Reprovado"][]=$aluno;
            }

        }

        return $situacoes;

    }

}

?>