<?php

require_once "classes/livro.php";
require_once "classes/revista.php";
require_once "classes/ebook.php";

$livro1 = new livro("Clean Code","Robert C. Martin");
$revista1 = new revista("PHP Magazine","Editora Tech");
$ebook1 = new ebook("PHP Moderno","João Silva");

$material=[$livro1,$revista1,$ebook1];

foreach($material as $m){
    $m->exibir();
    $m->emprestar();
}


?>