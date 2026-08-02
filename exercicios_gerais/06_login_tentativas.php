<form method="post" action="06_login_tentativas.php">
<label for="usuario">Usuário:</label>
<input type="text" name="usuario" id="usuario" required><br>

<label for="senha">Senha:</label>
<input type="password" name="senha" id="senha" required>

<button type="submit">Entrar</button>
</form>

<?php

$tentativas=0;

if(!isset($_POST) || empty($_POST)){
    echo "<br>";
}
else{

    function autenticar($usuario,$senha){
        global $tentativas;

        $usuarioCorreto="admin";
        $senhaCorreta="admin123";

        if($usuario==$usuarioCorreto && $senha==$senhaCorreta){
            echo "<br>Login realizado com sucesso";
        }
        else{
            $tentativas++;

            if($tentativas>=3){
                echo "<br>Conta bloqueada temporariamente";
            }
            else{
                echo "<br>Usuário ou senha incorretos.<br>";
                echo "Tentativas restantes: ".(3-$tentativas);
            }
        }

    }

    $usuario=$_POST["usuario"];
    $senha=$_POST["senha"];

    autenticar($usuario,$senha);

}

/*
Como cada envio do formulário gera uma nova requisição,
a variável $tentativas volta para 0 a cada atualização da página.
Em um sistema real, esse controle seria armazenado em sessão ou em um banco de dados.
*/

?>