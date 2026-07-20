<?php

$metodo = $_SERVER["REQUEST_METHOD"];

echo "<h3>Dados Recebidos</h3>";
echo "<p>Método utilizado: $metodo</p>";

if ($metodo == "POST") {
    $dados = $_POST;
} else {
    $dados = $_GET;
}

echo "<p><strong>Arquivo responsável:</strong> " . $_SERVER["PHP_SELF"] . "</p>";

echo "<table>";
echo "<tr><th>Campo</th><th>Valor</th></tr>";
foreach ($dados as $campo => $valor) {
    if (empty($valor)) {
        $valor = "Não informado";
    }
    echo "<tr>";
    echo "<td>" . htmlspecialchars($campo) . "</td>";
    echo "<td>" . htmlspecialchars($valor) . "</td>";
    echo "</tr>";
}
echo "</table>";

?>