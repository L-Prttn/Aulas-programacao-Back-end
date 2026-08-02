<?php

class Funcionario{

    public $nome;
    public $salarioBase;

    public function __construct($nome,$salarioBase){
        $this->nome=$nome;
        $this->salarioBase=$salarioBase;
    }

    public function calcularSalario(){
        return $this->salarioBase;
    }

}

class FuncionarioCLT extends Funcionario{

    public function calcularSalario(){

        if($this->salarioBase<=1500){
            $desconto=$this->salarioBase*0.075;
        }
        elseif($this->salarioBase<=3000){
            $desconto=$this->salarioBase*0.09;
        }
        else{
            $desconto=$this->salarioBase*0.12;
        }

        return $this->salarioBase-$desconto;

    }

}

class FuncionarioComissionado extends Funcionario{

    public $vendas;

    public function __construct($nome,$salarioBase,$vendas){
        parent::__construct($nome,$salarioBase);
        $this->vendas=$vendas;
    }

    public function calcularSalario(){

        $totalVendas=0;

        foreach($this->vendas as $venda){
            $totalVendas=$totalVendas+$venda;
        }

        $comissao=$totalVendas*0.05;

        return $this->salarioBase+$comissao;

    }

}

$clt=new FuncionarioCLT("Ana",2500);

$comissionado=new FuncionarioComissionado(
    "Bruno",
    1200,
    [3000,4500,2100]
);

echo $clt->nome." recebe R$ ";
echo number_format($clt->calcularSalario(),2,",",".");
echo "<br><br>";

echo $comissionado->nome." recebe R$ ";
echo number_format($comissionado->calcularSalario(),2,",",".");

?>