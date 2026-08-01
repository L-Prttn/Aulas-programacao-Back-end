<form method="post" action="04_forca_senha.php">
<label for="senha">Digite uma senha:</label>
<input type="password" name="senha" id="senha" required>
<button type="submit">Verificar força</button>
</form>

<?php

if(!isset($_POST) || empty($_POST)){
    echo "<br>";
}
else{

    function avaliarSenha($senha){

        $criterios=0;

        if(strlen($senha)>=8){
            $criterios++;
        }

        if(preg_match('/[A-Z]/',$senha)){
            $criterios++;
        }

        if(preg_match('/[0-9]/',$senha)){
            $criterios++;
        }

        if(preg_match('/[\W]/',$senha)){
            $criterios++;
        }

        if($criterios<=2){
            return "Fraca";
        }
        elseif($criterios==3){
            return "Média";
        }
        else{
            return "Forte";
        }

    }

    $senha=$_POST["senha"];

    $resultado=avaliarSenha($senha);

    if($resultado=="Fraca"){
        echo "<br><span style='color:red;'>Força da senha: ".$resultado."</span>";
    }
    elseif($resultado=="Média"){
        echo "<br><span style='color:orange;'>Força da senha: ".$resultado."</span>";
    }
    else{
        echo "<br><span style='color:green;'>Força da senha: ".$resultado."</span>";
    }

}

?>