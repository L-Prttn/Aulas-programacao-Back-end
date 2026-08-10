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
    $resultado= pg_query($conn, "SELECT * from produtos where ativo is true");
    if(!$resultado){
        echo "Ocorreu um erro";
    }
    else{
        while ($row = pg_fetch_row($resultado)) {
            print_r($row);
            echo "<br />\n";
        };
    }
}


?>