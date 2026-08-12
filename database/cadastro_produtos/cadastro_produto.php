<?php

require_once 'conexao.php';

if($conexao == false){
    echo "Erro de conexão com o banco";
}
else{
    $sql = "INSERT INTO produtos (id, categoria_id, nome, sku, preco, estoque, ativo, criado_em)
        VALUES(nextval('produtos_id_seq'::regclass), '{$_POST['categoria_id']}', '{$_POST['nome']}', '{$_POST['codigo']}', '{$_POST['preco']}', '{$_POST['estoque']}', true, now()) returning *;";
    
    $resultado = pg_query($conexao, $sql);
    if (!$resultado) {
        echo "Ocorreu um erro.\n";
    }
    else{

        while ($produto = pg_fetch_assoc($resultado)) {
            echo "Produto cadastrado com sucesso!<br>";
            print_r($produto);
            echo "<br />\n";
        }
    }
}


?>

