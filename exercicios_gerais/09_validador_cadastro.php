<form method="post" action="09_validador_cadastro.php">
<label for="nome">Nome completo:</label>
<input type="text" name="nome" id="nome">

<label for="email">E-mail:</label>
<input type="text" name="email" id="email">

<label for="telefone">Telefone:</label>
<input type="text" name="telefone" id="telefone" placeholder="(00) 00000-0000">

<button type="submit">Cadastrar</button>
</form>

<?php

if(!isset($_POST) || empty($_POST)){
    echo "<br>";
}
else{

    function validarCadastro($nome,$email,$telefone): array{

        $erros=[];

        if(empty($nome)){
            $erros[]="Nome não informado.";
        }

        if(!str_contains($email,"@")){
            $erros[]="E-mail inválido.";
        }

        $telefone=str_replace(["(",")","-"," "],"",$telefone);

        if(!is_numeric($telefone)){
            $erros[]="Telefone inválido.";
        }

        return $erros;
    }

    $nome=$_POST["nome"];
    $email=$_POST["email"];
    $telefone=$_POST["telefone"];

    $erros=validarCadastro($nome,$email,$telefone);

    if(empty($erros)){
        echo "<br>Cadastro válido!";
    }
    else{

        echo "<br>Foram encontrados os seguintes erros:<br>";

        foreach($erros as $erro){
            echo $erro."<br>";
        }

    }

}

?>