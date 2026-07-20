<?php

require_once "material.php";

class revista extends material{
    
    public function emprestar(): void{
        echo "Revista emprestada por 7 dias!<br>
        --------------------<br><br>";
    }
    
}

?>