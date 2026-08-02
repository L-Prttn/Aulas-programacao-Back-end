<?php

$horasTrabalhadas=46;
$valorHora=18.50;

function calcularPagamento($horasTrabalhadas,$valorHora): array{

    if($horasTrabalhadas>44){

        $horasNormais=44;
        $horasExtras=$horasTrabalhadas-44;

        $valorNormais=$horasNormais*$valorHora;
        $valorExtras=$horasExtras*($valorHora*1.5);

        $valorTotal=$valorNormais+$valorExtras;

    }
    else{

        $horasNormais=$horasTrabalhadas;
        $horasExtras=0;

        $valorTotal=$horasNormais*$valorHora;

    }

    $resultado=[
        "horas_normais"=>$horasNormais,
        "horas_extras"=>$horasExtras,
        "valor_total"=>$valorTotal
    ];

    return $resultado;

}

$resultado=calcularPagamento($horasTrabalhadas,$valorHora);

echo "Horas normais: ".$resultado["horas_normais"]."<br>";
echo "Horas extras: ".$resultado["horas_extras"]."<br>";
echo "Valor total: R$ ".number_format($resultado["valor_total"],2,",",".");

?>