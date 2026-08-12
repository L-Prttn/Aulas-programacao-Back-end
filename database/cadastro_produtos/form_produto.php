<?php

require_once 'conexao.php';

if($conexao == false){
    echo "Erro de conexão com o banco";
}
else{
    $sqlCategorias = "SELECT id, nome from categorias order by nome asc";
    
    $resultado = pg_query($conexao, $sqlCategorias);
    if (!$resultado) {
        echo "Ocorreu um erro.\n";
    }
    /*else{

        while ($row = pg_fetch_assoc($resultado)) {
            print_r($row);
            echo "<br />\n";
        }
    }*/
}

?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Produto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card shadow-sm">
                    <div class="card-body p-4">

                        <h1 class="h4 mb-4">Cadastro de Produto</h1>

                        <form action="cadastro_produto.php" method="POST">

                            <!-- Categoria -->
                            <div class="mb-3">
                                <label for="categoria_id" class="form-label">
                                    Categoria
                                </label>

                                <select
                                    class="form-select"
                                    id="categoria_id"
                                    name="categoria_id"
                                    required
                                >
                                    <option value="">Selecione uma categoria</option>
                                    
                                    <?php
                                    while ($categoria = pg_fetch_assoc($resultado)):?>
                                            <option value="<?= $categoria['id'] ?>"> 
                                                <?= htmlspecialchars($categoria['nome']) ?>
                                            </option>    

                                        <?php endwhile; ?>

                                </select>
                            </div>

                            <!-- Nome -->
                            <div class="mb-3">
                                <label for="nome" class="form-label">
                                    Nome
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="nome"
                                    name="nome"
                                    placeholder="Digite o nome do produto"
                                    required
                                >
                            </div>

                            <!-- Código -->
                            <div class="mb-3">
                                <label for="codigo" class="form-label">
                                    Código
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="codigo"
                                    name="codigo"
                                    placeholder="Digite o código do produto"
                                    required
                                >
                            </div>

                            <!-- Preço -->
                            <div class="mb-3">
                                <label for="preco" class="form-label">
                                    Preço
                                </label>

                                <input
                                    type="number"
                                    class="form-control"
                                    id="preco"
                                    name="preco"
                                    placeholder="0,00"
                                    step="0.01"
                                    min="0"
                                    required
                                >
                            </div>

                            <!-- Estoque -->
                            <div class="mb-3">
                                <label for="estoque" class="form-label">
                                    Estoque
                                </label>

                                <input
                                    type="number"
                                    class="form-control"
                                    id="estoque"
                                    name="estoque"
                                    placeholder="Quantidade em estoque"
                                    min="0"
                                    required
                                >
                            </div>

                            <!-- Ativo -->
                            <div class="mb-4">
                                <label class="form-label d-block">
                                    Produto ativo?
                                </label>

                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="ativo"
                                        id="ativo_sim"
                                        value="1"
                                        checked
                                    >
                                    <label class="form-check-label" for="ativo_sim">
                                        Sim
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="ativo"
                                        id="ativo_nao"
                                        value="0"
                                    >
                                    <label class="form-check-label" for="ativo_nao">
                                        Não
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Cadastrar Produto
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
