<?php

class ContaBancaria {
    public $titular;
    private $saldo;

    public function __construct($t){
        $this->titular=$t;
    }

    public function setSaldo($saldo1): void{
        $this->saldo = $saldo1;
    }

    public function setDepositar($deposito): void{
        $this->saldo = $this->saldo + $deposito;
        echo "Titular {$this->titular}, depósito de R$ ".$deposito." feito com sucesso.<br><br>";
    }    

    public function setSacar($saque): void{
        if ($this->saldo > 0 && $saque<$this->saldo){
            $this->saldo = $this->saldo - $saque;
            echo "Titular {$this->titular}, saque de R$ ".$saque." feito com sucesso.<br><br>";
        }
        else{
            echo"Titular {$this->titular}, saldo insuficiente para saque.<br><br>";
        }
    }
    
    public function getConsultaSaldo(): void{
        echo "Titular {$this->titular}, saldo de: R$ ".$this->saldo.".<br><br>";
    }
}

$t1 = new ContaBancaria ("Joao");
$t1->setSaldo(1000);

$t2 = new ContaBancaria ("Maria");
$t2->setSaldo(0);

$t3 = new ContaBancaria ("Jose");
$t3->setSaldo(100);



$t1->getConsultaSaldo();
$t1->setDepositar(5000);
$t1->setSacar(2000);
$t1->getConsultaSaldo();


$t2->getConsultaSaldo();
$t2->setSacar(200);

$t3->getConsultaSaldo();
$t3->setDepositar(200);
$t3->setSacar(500);
$t3->getConsultaSaldo();


?>