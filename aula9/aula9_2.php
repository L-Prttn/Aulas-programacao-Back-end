<?php

class usuario 
{
    public string $nome;
    public string $email;
    public string $senha;
    public int $idade;
    public bool $ativo;

    public function AtivarUsuario(): void{
        $this->ativo = true;
    }
    public function SetSenha($s): void{
        $this->senha = $s;
        echo "senha alterada<br>";
    }
    public function __construct(
        string $nome,
        string $email,
        string $senha,
    ){
        $this->nome=$nome;
        $this->email=$email;
        $this->senha=$senha;
    }
}

$u = new usuario("joao","joaozinho@gmail.com","senha123");


?>