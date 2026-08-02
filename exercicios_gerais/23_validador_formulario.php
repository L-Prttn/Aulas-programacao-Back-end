<form method="post" action="23_validador_formulario.php">
<label for="nome">Nome:</label>
<input type="text" name="nome" id="nome">

<label for="email">E-mail:</label>
<input type="text" name="email" id="email">

<label for="senha">Senha:</label>
<input type="password" name="senha" id="senha">

<label for="confirmarSenha">Confirmar senha:</label>
<input type="password" name="confirmarSenha" id="confirmarSenha">

<button type="submit">Cadastrar</button>
</form>

<?php

class ValidadorFormulario{

    private $erros;

    public function __construct(){
        $this->erros=[];
    }

    public function validarNome($nome): void{

        if(strlen($nome)<3){
            $this->erros[]="O nome deve possuir pelo menos 3 caracteres.";
        }

    }

    public function validarEmail($email): void{

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $this->erros[]="E-mail inválido.";
        }

    }

    public function validarSenhas($senha,$confirmacao): void{

        if($senha!==$confirmacao){
            $this->erros[]="As senhas não são iguais.";
        }

    }

    public function temErros(){

        if(count($this->erros)>0){
            return true;
        }
        else{
            return false;
        }

    }

    public function listarErros(): void{

        foreach($this->erros as $erro){
            echo $erro."<br>";
        }

    }

}

if(!isset($_POST) || empty($_POST)){
    echo "<br>";
}
else{

    $nome=$_POST["nome"];
    $email=$_POST["email"];
    $senha=$_POST["senha"];
    $confirmarSenha=$_POST["confirmarSenha"];

    $validador=new ValidadorFormulario();

    $validador->validarNome($nome);
    $validador->validarEmail($email);
    $validador->validarSenhas($senha,$confirmarSenha);

    if($validador->temErros()){
        echo "<br>Foram encontrados os seguintes erros:<br>";
        $validador->listarErros();
    }
    else{
        echo "<br>Cadastro realizado com sucesso!";
    }

}

?>