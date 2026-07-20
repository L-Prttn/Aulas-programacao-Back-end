<?php

class Material{
    public $titulo;
    public $autor;

    public function exibir():void{
        echo "Titulo: ".$this->titulo.
            "<br>Autor: ".$this->autor."<br>";
    }

    public function emprestar():void{
        echo "Empréstimo realizado!<br>
        --------------------<br><br>";
    }


    public function __construct($t,$a){
        $this->titulo=$t;
        $this->autor=$a;
    }
}


?>