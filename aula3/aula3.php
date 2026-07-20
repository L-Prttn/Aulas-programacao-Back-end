<form method="POST" action="aula3.php">
    <label>Nome:</label>
    <input type="text" name="nome"> <br><br>
    <label>Idade:</label>
    <input type="text" name="idade"> <br><br>
    <label>Email:</label>
    <input type="text" name="email"> <br><br>
    <label>Senha:</label>
    <input type="password" name="senha"> <br><br>
    <input type="submit" name="Enviar">
</form>


<?php

    if (!isset($_POST)){
        echo "Preencha seus dados!";
    }
    else {
        if (empty($_POST)){
            echo "Dados ainda não preenchidos.";
        }
        else {
            echo "Olá, " . $_POST["nome"] . "<br>";
            echo "Sua idade é: " . $_POST["idade"] . "<br><br>";    
            //comentário

            /*
            comentario
            em
            bloco
            */

            print_r ($_POST);

            $nome_completo = $_POST["nome"];
            $idade = $_POST["idade"];
            $senha = $_POST["senha"];
            echo "<br><br><br>Seja bem vindo ".$nome_completo."!<br>";
            if ($idade < 18){
                echo "Você é menor de idade.<br>";
            }
            else {
                echo "Você é maior de idade.<br>";
            }
        }
    }

?>