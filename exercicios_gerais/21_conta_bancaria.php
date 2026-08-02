<?php

class ContaBancaria{

    private $titular;
    private $saldo;
    private $historico=[];

    public function __construct($titular,$saldoInicial){
        $this->titular=$titular;
        $this->saldo=$saldoInicial;
    }

    public function sacar($valor): void{

        if($valor>$this->saldo){
            echo "Saldo insuficiente para saque de R$ ".$valor."<br>";
        }
        else{
            $this->saldo=$this->saldo-$valor;
            $this->historico[]="Saque de R$ ".$valor;
        }

    }

    public function depositar($valor): void{

        if($valor<=0){
            echo "O valor do depósito deve ser positivo.<br>";
        }
        else{
            $this->saldo=$this->saldo+$valor;
            $this->historico[]="Depósito de R$ ".$valor;
        }

    }

    public function extrato(): void{

        echo "Titular: ".$this->titular."<br>";
        echo "Saldo atual: R$ ".number_format($this->saldo,2,",",".")."<br><br>";

        echo "Histórico de movimentações:<br>";

        foreach($this->historico as $mov){
            echo $mov."<br>";
        }

    }

}

$conta=new ContaBancaria("Carlos",500.00);

$conta->sacar(200);
$conta->sacar(1000);
$conta->depositar(300);
$conta->extrato();

?>