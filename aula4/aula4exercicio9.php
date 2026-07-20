<form method="POST" action="aula4exercicio9.php">
    <label>SISTEMA DE LOGIN SIMPLES</label><br><br><br>
    <label>Usuário: </label>
    <input type="text" name="usuario"> <br><br>
    <label>Senha: </label>
    <input type="password" name="senha"> <br><br>
    <input type="submit" name="Enviar">
</form>

<?php
    if (!isset($_POST)){
        echo "<br>";
    }
    elseif (empty($_POST)){
        echo "<br>";
    }
    else {
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        if ($usuario == "admin" && $senha == "1234"){
            echo "<br>Login realizado com sucesso!";
        }
        else {
            echo "<br>Usuário ou senha inválidos.";
        }
    }
?>