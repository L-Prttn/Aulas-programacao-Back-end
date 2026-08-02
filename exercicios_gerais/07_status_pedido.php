<?php

$pedido=[
    "id"=>1024,
    "status"=>"pago",
    "valor"=>349.90
];

function mensagemStatus($status){

    switch($status){

        case "pendente":
            return "O pedido está aguardando pagamento.";

        case "pago":
            return "O pagamento foi confirmado.";

        case "cancelado":
            return "O pedido foi cancelado.";

        case "enviado":
            return "O pedido foi enviado para entrega.";

        case "entregue":
            return "O pedido foi entregue ao cliente.";

        default:
            return "Status inválido.";
    }

}

function podeCancelar($status){

    if($status=="pendente" || $status=="pago"){
        return true;
    }
    else{
        return false;
    }

}

echo "Pedido: ".$pedido["id"]."<br>";
echo "Valor: R$ ".number_format($pedido["valor"],2,",",".")."<br>";
echo mensagemStatus($pedido["status"])."<br>";

if(podeCancelar($pedido["status"])){
    echo "O pedido pode ser cancelado.";
}

?>