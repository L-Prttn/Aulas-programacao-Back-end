<?php

$host='127.0.0.1'; //localhost
$port='5432';
$dbname='postgres';
$user='postgres';
$password='postgres';

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if($conn == false){
    echo "Erro de conexão com o banco";
}
else{
    $sql = "INSERT INTO produtos (id, categoria_id, nome, sku, preco, estoque, ativo, criado_em)
        VALUES(nextval('produtos_id_seq'::regclass), '{$_POST['categoria_id']}', '{$_POST['nome']}', '{$_POST['codigo']}', '{$_POST['preco']}', '{$_POST['estoque']}', true, now()) returning *;";
    
    $resultado = pg_query($conn, $sql);
    if (!$resultado) {
        echo "Ocorreu um erro.\n";
    }
    else{

        while ($row = pg_fetch_row($resultado)) {
            echo "Produto cadastrado com sucesso!";
            print_r($row);
            echo "<br />\n";
        }
    }
}


?>

