<?php

class Produto{

    public $nomeproduto;
    public $preco;
    private $qtdestoque;

    public function MostrarInformacoes(){
        echo "Produto: ".$this->nomeproduto."<br>";
        echo "Preço: ".$this->preco."<br>";
        echo "Quantidade em estoque: ".$this->qtdestoque."<br><br>";
    }

    public function setEstoque($estoque): void{
        $this->qtdestoque = $estoque;

    }
}

$p1 = new Produto();
$p1->nomeproduto = "Notebook";
$p1->preco = "4200";
$p1->setEstoque(8);

$p2 = new Produto();
$p2->nomeproduto = "Mouse";
$p2->preco = "100";
$p2->setEstoque(22);

$p3 = new Produto();
$p3->nomeproduto = "Monitor";
$p3->preco = "800";
$p3->setEstoque(14);

$p1->MostrarInformacoes();
$p2->MostrarInformacoes();
$p3->MostrarInformacoes();

?>