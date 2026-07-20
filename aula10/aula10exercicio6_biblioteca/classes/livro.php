<?php

require_once "material.php";

class livro extends material{
    
    public function emprestar(): void{
        echo "Livro emprestado por 15 dias!<br>
        --------------------<br><br>";
    }
    
}

?>