<?php

class GerenciadorDeEstoque{

    private $produtos;

    public function __construct(){
        $this->produtos=[];
    }

    public function adicionarProduto($nome,$quantidade): void{

        if(isset($this->produtos[$nome])){
            $this->produtos[$nome]=$this->produtos[$nome]+$quantidade;
        }
        else{
            $this->produtos[$nome]=$quantidade;
        }

    }

    public function removerProduto($nome,$quantidade): void{

        if(isset($this->produtos[$nome])){

            if($this->produtos[$nome]>=$quantidade){
                $this->produtos[$nome]=$this->produtos[$nome]-$quantidade;
            }
            else{
                echo "Estoque insuficiente para o produto ".$nome.".<br>";
            }

        }
        else{
            echo "Produto não encontrado.<br>";
        }

    }

    public function produtosEmFalta($limite=5): array{

        $falta=[];

        foreach($this->produtos as $nome => $quantidade){

            if($quantidade<$limite){
                $falta[$nome]=$quantidade;
            }

        }

        return $falta;

    }

    public function relatorioCompleto(): void{

        echo "Relatório de estoque:<br>";

        foreach($this->produtos as $nome => $quantidade){
            echo "Produto: ".$nome." - Quantidade: ".$quantidade."<br>";
        }

    }

}

$estoque=new GerenciadorDeEstoque();

$estoque->adicionarProduto("Mouse",20);
$estoque->adicionarProduto("Teclado",5);

$estoque->removerProduto("Mouse",3);
$estoque->removerProduto("Teclado",10);

echo "<br>";

$estoque->relatorioCompleto();

echo "<br>Produtos em falta:<br>";

$produtos=$estoque->produtosEmFalta();

foreach($produtos as $nome => $quantidade){
    echo "Produto: ".$nome." - Quantidade: ".$quantidade."<br>";
}

?>