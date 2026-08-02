<?php

class ItemPedido{

    public $nome;
    public $preco;
    public $quantidade;

    public function __construct($nome,$preco,$quantidade){
        $this->nome=$nome;
        $this->preco=$preco;
        $this->quantidade=$quantidade;
    }

    public function subtotal(){
        return $this->preco*$this->quantidade;
    }

}

class Pedido{

    public $identificacao;
    public $itens;

    public function __construct($identificacao){
        $this->identificacao=$identificacao;
        $this->itens=[];
    }

    public function adicionarItem($nome,$preco,$quantidade): void{

        $item=new ItemPedido($nome,$preco,$quantidade);

        $this->itens[]=$item;

    }

    public function valorTotal(){

        $total=0;

        foreach($this->itens as $item){
            $total=$total+$item->subtotal();
        }

        return $total;

    }

    public function aplicarTaxaServico(){

        $total=$this->valorTotal();

        if(str_contains($this->identificacao,"Mesa")){
            $total=$total+($total*0.10);
        }

        return $total;

    }

    public function imprimirComanda(): void{

        echo "Comanda: ".$this->identificacao."<br><br>";

        foreach($this->itens as $item){

            echo "Item: ".$item->nome."<br>";
            echo "Preço: R$ ".number_format($item->preco,2,",",".")."<br>";
            echo "Quantidade: ".$item->quantidade."<br>";
            echo "Subtotal: R$ ".number_format($item->subtotal(),2,",",".")."<br><br>";

        }

        echo "Total: R$ ".number_format($this->valorTotal(),2,",",".")."<br>";
        echo "Total com taxa: R$ ".number_format($this->aplicarTaxaServico(),2,",",".");

    }

}

$pedido=new Pedido("Mesa 5");

$pedido->adicionarItem("Pizza Margherita",45.00,1);
$pedido->adicionarItem("Refrigerante",8.00,2);
$pedido->adicionarItem("Sobremesa",15.00,1);

$pedido->imprimirComanda();

?>