<?php

class Funcionario{
    public $nome;
    public $salario;

    public function __construct($n,$s){
        $this->nome=$n;
        $this->salario=$s;
    }
}

class Desenvolvedor extends Funcionario{
    public $funcao = "Desenvolvedor";
    public function descricaoCargo(): void{
        echo "{$this->nome} exerce a função de {$this->funcao} na empresa, recebe R$ {$this->salario} de salário.<br><br>";
    }
}

class Gerente extends Funcionario{
    public $funcao = "Gerente";
    public function descricaoCargo(): void{
        echo "{$this->nome} exerce a função de {$this->funcao} na empresa, recebe R$ {$this->salario} de salário.<br><br>";
    }
}

$f1 = new Desenvolvedor("Joao",5000);
$f2 = new Gerente("Jose",10000);

$f1->descricaoCargo();
$f2->descricaoCargo();

?>