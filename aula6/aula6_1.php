<?php

$array = ["indice 0","indice 1","indice 2"];
$pares = [0,2,4,6,8,10];

echo $pares[1];

$pares[1]=4;

echo $pares[1];
echo "<br>__________________________________________________________<br>";


$usuario=[
    "nome"=>"João",
    "idade"=>25,
    "matricula"=>222,
    "email"=>"joaozinho123@gmail.com",
];
echo "<br><br>Nome: ".$usuario["nome"];
echo "<br>Matricula: ".$usuario["matricula"];
echo "<br>Idade: ".$usuario["idade"];
echo "<br>email: ".$usuario["email"];

$usuario["email"]="joao@hotmail.com";
$usuario["idade"]=26;

echo "<pre>";
print_r($usuario);


foreach($usuario as $chave => $valor){
    echo "<br>". $chave.": ".$valor;
}



$clientes=[
    [   "nome"=>"ANA",
        "credito"=>100,
        "idade"=>30,
        "email"=>"ana@gmail.com",
    ],
    [   "nome"=>"CARLOS",
        "credito"=>200,
        "idade"=>45,
        "email"=>"carlos@gmail.com",
    ],
    [   "nome"=>"VINICIUS",
        "credito"=>50,
        "idade"=>18,
        "email"=>"vinicius@gmail.com",
    ]
];

echo "<br>__________________________________________________________<br><br>";
foreach($clientes as $v){
    foreach($v as $chave => $valor){
        echo "<br>". $chave.": ".$valor;
    }
    echo "<br>__________________________<br>";
}


?>