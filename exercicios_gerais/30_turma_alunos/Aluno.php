<?php

class Aluno{

    public $nome;
    public $notas;

    public function __construct($nome,$notas){
        $this->nome=$nome;
        $this->notas=$notas;
    }

    public function media(){
        return array_sum($this->notas)/count($this->notas);
    }

}

?>