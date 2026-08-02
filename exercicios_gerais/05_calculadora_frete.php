<form method="post" action="05_calculadora_frete.php">
<label for="cep">CEP de destino:</label>
<input type="text" name="cep" id="cep" placeholder="00000-000" required>

<label for="peso">Peso do pacote (kg):</label>
<input type="number" step="0.1" name="peso" id="peso" required>

<button type="submit">Calcular frete</button>
</form>

<?php

if(!isset($_POST) || empty($_POST)){
    echo "<br>";
}
else{

    function calcularFrete($cep,$peso): array{

        $inicioCep=substr($cep,0,2);

        if($inicioCep>=90 && $inicioCep<=99){
            $regiao="Sul";
            $prazo="5 dias";

            if($peso<=2){
                $frete=20;
            }
            elseif($peso<=10){
                $frete=35;
            }
            else{
                $frete=50;
            }
        }
        elseif($inicioCep>=1 && $inicioCep<=9){
            $regiao="SP Capital";
            $prazo="2 dias";

            if($peso<=2){
                $frete=15;
            }
            elseif($peso<=10){
                $frete=30;
            }
            else{
                $frete=45;
            }
        }
        elseif($inicioCep>=70 && $inicioCep<=79){
            $regiao="Centro-Oeste";
            $prazo="7 dias";

            if($peso<=2){
                $frete=25;
            }
            elseif($peso<=10){
                $frete=40;
            }
            else{
                $frete=60;
            }
        }
        else{
            $regiao="Outra região";
            $prazo="10 dias";

            if($peso<=2){
                $frete=30;
            }
            elseif($peso<=10){
                $frete=45;
            }
            else{
                $frete=70;
            }
        }

        $resultado=[
            "regiao"=>$regiao,
            "frete"=>$frete,
            "prazo"=>$prazo
        ];

        return $resultado;
    }

    $cep=$_POST["cep"];
    $peso=$_POST["peso"];

    $resultado=calcularFrete($cep,$peso);

    echo "<br>Região: ".$resultado["regiao"]."<br>";
    echo "Valor do frete: R$ ".number_format($resultado["frete"],2,",",".")."<br>";
    echo "Prazo estimado: ".$resultado["prazo"];

}

?>