<form method="post" action="28_sistema_login.php">
<label for="usuario">Usuário:</label>
<input type="text" name="usuario" id="usuario" required>

<label for="senha">Senha:</label>
<input type="password" name="senha" id="senha" required>

<button type="submit">Entrar</button>
</form>

<?php

class SistemaDeLogin{

    private $usuarios;
    private $tentativasPorUsuario;

    public function __construct($usuarios){
        $this->usuarios=$usuarios;
        $this->tentativasPorUsuario=[];
    }

    public function autenticar($usuario,$senha): void{

        if(!isset($this->usuarios[$usuario])){
            echo "<br>Usuário não encontrado.";
            return;
        }

        if(!isset($this->tentativasPorUsuario[$usuario])){
            $this->tentativasPorUsuario[$usuario]=0;
        }

        if($this->tentativasPorUsuario[$usuario]>=3){
            echo "<br>Usuário bloqueado.";
            return;
        }

        if($this->usuarios[$usuario]==$senha){

            $this->tentativasPorUsuario[$usuario]=0;
            echo "<br>Login realizado com sucesso.";

        }
        else{

            $this->tentativasPorUsuario[$usuario]++;

            if($this->tentativasPorUsuario[$usuario]>=3){
                echo "<br>Usuário bloqueado.";
            }
            else{
                echo "<br>Senha incorreta.<br>";
                echo "Tentativas restantes: ".(3-$this->tentativasPorUsuario[$usuario]);
            }

        }

    }

}

if(!isset($_POST) || empty($_POST)){
    echo "<br>";
}
else{

    $usuarios=[
        "admin"=>"admin123",
        "joao"=>"senha456"
    ];

    $usuario=$_POST["usuario"];
    $senha=$_POST["senha"];

    $login=new SistemaDeLogin($usuarios);

    $login->autenticar($usuario,$senha);

}

/*
Como cada envio do formulário gera uma nova requisição,
o array de tentativas é recriado e volta a ficar vazio.
Em um sistema real, essas tentativas seriam armazenadas
em sessão ou em um banco de dados.
*/

?>