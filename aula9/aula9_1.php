<?php

class carro 
{
    public string $modelo;
    public string $cor;
    public int $ano;

    public function buzinar(): string
    {
        return "($this->modelo diz fom!";
    }
}

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
}

$u = new usuario();
$u->nome="Joao";
$u->email="joaozinho@gmail.com";
$u->senha="";
$u->idade=15;
$u->ativo=true;
$u->SetSenha('senha123');

$maria = new usuario();
$maria->nome="Maria";
$maria->email="mariazinha@gmail.com";
$maria->senha="";
$maria->idade=20;
$u->ativo=true;
$maria->SetSenha('maria123');



?>