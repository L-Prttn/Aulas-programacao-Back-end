<form method="post" action="03_nivel_usuario.php">
<label for="perfil">Perfil de acesso:</label>
<select name="perfil" id="perfil">
<option value="admin">Administrador</option>
<option value="editor">Editor</option>
<option value="autor">Autor</option>
<option value="assinante">Assinante</option>
</select>
<button type="submit">Consultar permissões</button>
</form>

<?php

if(!isset($_POST) || empty($_POST)){
    echo "<br>";
}
else{

    $logAcessos=[];

    function permissoes($perfil): array{
        global $logAcessos;

        $logAcessos[]=$perfil;

        switch($perfil){
            case "admin":
                return ["criar","editar","excluir","publicar"];

            case "editor":
                return ["editar","publicar"];

            case "autor":
                return ["criar","editar"];

            case "assinante":
                return ["visualizar"];

            default:
                return [];
        }
    }

    $perfil=$_POST["perfil"];

    $resultado=permissoes($perfil);

    echo "<br>Permissões do perfil ".$perfil.":<br>";

    foreach($resultado as $permissao){
        echo $permissao."<br>";
    }

    echo "<br>Log de acessos:<br>";

    foreach($logAcessos as $acesso){
        echo $acesso."<br>";
    }

}

?>