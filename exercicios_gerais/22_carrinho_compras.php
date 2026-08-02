<?php

class CarrinhoDeCompras{

    private $itens;

    public function __construct(){
        $this->itens=[];
    }

    public function adicionarItem($nome,$preco,$quantidade): void{

        $item=[
            "nome"=>$nome,
            "preco"=>$preco,
            "quantidade"=>$quantidade
        ];

        $this->itens[]=$item;

    }

    public function calcularTotal(){

        $total=0;

        foreach($this->itens as $item){
            $total=$total+($item["preco"]*$item["quantidade"]);
        }

        if($total>200){
            $total=$total-($total*0.10);
        }

        return $total;

    }

    public function listarItens(): void{

        echo "Itens do carrinho:<br>";

        foreach($this->itens as $item){
            echo "Produto: ".$item["nome"]."<br>";
            echo "Preço: R$ ".number_format($item["preco"],2,",",".")."<br>";
            echo "Quantidade: ".$item["quantidade"]."<br><br>";
        }

    }

    public function removerItem($nome): void{

        foreach($this->itens as $indice => $item){

            if($item["nome"]==$nome){
                unset($this->itens[$indice]);
            }

        }

    }

}

$carrinho=new CarrinhoDeCompras();

$carrinho->adicionarItem("Livro PHP",79.90,2);
$carrinho->adicionarItem("Caneca",25.00,1);
$carrinho->adicionarItem("Mochila",150.00,1);

$carrinho->removerItem("Caneca");

$carrinho->listarItens();

echo "Total da compra: R$ ".number_format($carrinho->calcularTotal(),2,",",".");

?>