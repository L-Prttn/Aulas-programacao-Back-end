<?php

class pagamento{

    public function processarPagamento(): void{
        echo "Pagamento em dinheiro, concluído!<br><br>";
    }
}

class pix extends pagamento{
    public function processarPagamento(): void{
        echo "Pagamento em pix, concluído!<br><br>";
    }
}

class credito extends pagamento{
    public function processarPagamento(): void{
        echo "Pagamento em cartão de crédito, concluído!<br><br>";
    }
}

class boleto extends pagamento{
    public function processarPagamento(): void{
        echo "Pagamento em boleto, concluído!<br><br>";
    }
}

$p1 = new pagamento();
$p1->processarPagamento();

$p2 = new pix();
$p2->processarPagamento();

$p3 = new credito();
$p3->processarPagamento();

$p4 = new boleto();
$p4->processarPagamento();



?>