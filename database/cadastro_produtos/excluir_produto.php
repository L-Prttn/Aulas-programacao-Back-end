<?php
require_once 'conexao.php';

$sql = "DELETE FROM produtos where id = {$_GET['id']}";


$resultado = pg_query($conexao, $sql);
if (!$resultado) {
    echo "Ocorreu um erro.\n";
}
else{
    header("Location: http://localhost:8080/aula/database/cadastro_produtos/listagem_produto.php");
    exit;
}


?>