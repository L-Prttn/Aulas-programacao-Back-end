<?php

class Usuario {
    public $nome;
    public $email;
    public $perfil;

    public function __construct($n,$e,$p){
        $this->nome=$n;
        $this->email=$e;
        $this->perfil=$p;
    }

    public function MostrarInformacoes(){
        echo "Perfil de ".$this->perfil."<br>";
        echo "Nome: ".$this->nome."<br>";
        echo "Email: ".$this->email."<br><br>";
    }
}

$u1 = new Usuario ("Joao","joaozinho@gmail.com","Administrador");
$u2 = new Usuario ("Maria","maria123@gmail.com","Administrador");
$u3 = new Usuario ("Jose","ze@gmail.com","Cliente");

$u1->MostrarInformacoes();
$u2->MostrarInformacoes();
$u3->MostrarInformacoes();
?>