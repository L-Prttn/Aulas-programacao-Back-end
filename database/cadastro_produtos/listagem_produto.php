<?php

require_once 'conexao.php';

// Busca os produtos e o nome da categoria
$sql = "
    SELECT
        p.id,
        p.nome,
        p.sku,
        p.preco,
        p.estoque,
        p.ativo,
        c.nome AS categoria_nome
    FROM produtos p
    INNER JOIN categorias c
        ON c.id = p.categoria_id
    ORDER BY p.id DESC
";

$resultado = pg_query($conexao, $sql);

if (!$resultado) {
    die("Erro ao buscar produtos: " . pg_last_error($conexao));
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Lista de Produtos</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="card shadow-sm">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h1 class="h4 mb-0">
                        Lista de Produtos
                    </h1>

                    <a
                        href="form_produto.php"
                        class="btn btn-primary"
                    >
                        Novo Produto
                    </a>

                </div>

                <div class="table-responsive">

                    <table class="table table-striped table-hover align-middle">

                        <thead class="table-dark">

                            <tr>

                                <th>ID</th>

                                <th>Categoria</th>

                                <th>Nome</th>

                                <th>Código</th>

                                <th>Preço</th>

                                <th>Estoque</th>

                                <th>Ativo</th>

                                <th class="text-center">
                                    Ações
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php if (pg_num_rows($resultado) > 0) { ?>

                                <?php while ($row = pg_fetch_assoc($resultado)) { ?>

                                    <tr>

                                        <td>
                                            <?= $row['id'] ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($row['categoria_nome']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($row['nome']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($row['sku']) ?>
                                        </td>

                                        <td>
                                            R$
                                            <?= number_format(
                                                $row['preco'],
                                                2,
                                                ',',
                                                '.'
                                            ) ?>
                                        </td>

                                        <td>
                                            <?= $row['estoque'] ?>
                                        </td>

                                        <td>

                                            <?php if ($row['ativo'] == true) { ?>

                                                <span class="badge bg-success">
                                                    Ativo
                                                </span>

                                            <?php } else { ?>

                                                <span class="badge bg-secondary">
                                                    Inativo
                                                </span>

                                            <?php } ?>

                                        </td>

                                        <td class="text-center">

                                            <a
                                                href="editar_produto.php?id=<?= $row['id'] ?>"
                                                class="btn btn-sm btn-warning"
                                            >
                                                Atualizar
                                            </a>

                                            <a
                                                href="excluir_produto.php?id=<?= $row['id'] ?>"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Tem certeza que deseja apagar este produto?');"
                                            >
                                                Apagar
                                            </a>

                                        </td>

                                    </tr>

                                <?php } ?>

                            <?php } else { ?>

                                <tr>

                                    <td
                                        colspan="8"
                                        class="text-center text-muted py-4"
                                    >
                                        Nenhum produto cadastrado.
                                    </td>

                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</body>

</html>