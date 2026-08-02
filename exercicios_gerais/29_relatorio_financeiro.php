<?php

class RelatorioFinanceiro{

    private $lancamentos;

    public function __construct(){
        $this->lancamentos=[];
    }

    public function adicionarLancamento($descricao,$valor,$tipo): void{

        if($tipo!="receita" && $tipo!="despesa"){
            echo "Tipo de lançamento inválido.<br>";
        }
        else{

            $lancamento=[
                "descricao"=>$descricao,
                "valor"=>$valor,
                "tipo"=>$tipo
            ];

            $this->lancamentos[]=$lancamento;

        }

    }

    public function saldoFinal(){

        $saldo=0;

        foreach($this->lancamentos as $lancamento){

            if($lancamento["tipo"]=="receita"){
                $saldo=$saldo+$lancamento["valor"];
            }
            else{
                $saldo=$saldo-$lancamento["valor"];
            }

        }

        return $saldo;

    }

    public function maiorDespesa(){

        $maior=0;
        $descricao="";

        foreach($this->lancamentos as $lancamento){

            if($lancamento["tipo"]=="despesa"){

                if($lancamento["valor"]>$maior){
                    $maior=$lancamento["valor"];
                    $descricao=$lancamento["descricao"];
                }

            }

        }

        return [
            "descricao"=>$descricao,
            "valor"=>$maior
        ];

    }

    public function gerarResumo(): void{

        echo "Relatório Financeiro<br><br>";

        foreach($this->lancamentos as $lancamento){

            echo "Descrição: ".$lancamento["descricao"]."<br>";
            echo "Tipo: ".$lancamento["tipo"]."<br>";
            echo "Valor: R$ ".number_format($lancamento["valor"],2,",",".")."<br><br>";

        }

        $saldo=$this->saldoFinal();

        echo "Saldo final: R$ ".number_format($saldo,2,",",".")."<br>";

        if($saldo>=0){
            echo "Situação: Superávit<br>";
        }
        else{
            echo "Situação: Déficit<br>";
        }

        $maiorDespesa=$this->maiorDespesa();

        echo "<br>Maior despesa: ".$maiorDespesa["descricao"]."<br>";
        echo "Valor: R$ ".number_format($maiorDespesa["valor"],2,",",".");

    }

}

$relatorio=new RelatorioFinanceiro();

$relatorio->adicionarLancamento("Venda de produto",1200.00,"receita");
$relatorio->adicionarLancamento("Aluguel",800.00,"despesa");
$relatorio->adicionarLancamento("Serviço prestado",450.00,"receita");
$relatorio->adicionarLancamento("Fornecedor",300.00,"despesa");

$relatorio->gerarResumo();

?>