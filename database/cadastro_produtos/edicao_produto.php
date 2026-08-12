<?php

require_once 'conexao.php';

if($conexao == false){
    echo "Erro de conexão com o banco";
}
else{
    $sql = "UPDATE produtos 
        SET id=nextval('produtos_id_seq'::regclass), categoria_id='{$_POST['categoria_id']}', nome='{$_POST['nome']}', preco='{$_POST['preco']}', estoque='{$_POST['estoque']}', ativo=true, criado_em=now()
        WHERE sku='{$_POST['codigo']}';";
    $resultado = pg_query($conexao, $sql);
    if (!$resultado) {
        echo "Ocorreu um erro.\n";
    }
    else{

        while ($produto = pg_fetch_assoc($resultado)) {
            echo "Produto editado com sucesso!<br>";
            print_r($produto);
            echo "<br />\n";
        }
    }
}


?>

/*
UPDATE public.produtos
SET id=nextval('produtos_id_seq'::regclass), categoria_id=0, nome='', preco=0, estoque=0, ativo=true, criado_em=now()
WHERE sku='';
*/