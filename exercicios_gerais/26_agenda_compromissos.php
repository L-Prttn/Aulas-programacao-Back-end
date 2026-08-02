<?php

session_start();

?>

<form method="post" action="26_agenda_compromissos.php">
<label for="titulo">Título do compromisso:</label>
<input type="text" name="titulo" id="titulo" required>

<label for="data">Data:</label>
<input type="date" name="data" id="data" required>

<label for="hora">Hora:</label>
<input type="time" name="hora" id="hora" required>

<button type="submit">Adicionar compromisso</button>
</form>

<?php

class AgendaDeCompromissos{

    private $compromissos;

    public function __construct(){

        if(isset($_SESSION["agenda"])){
            $this->compromissos=$_SESSION["agenda"];
        }
        else{
            $this->compromissos=[];
        }

    }

    public function adicionarCompromisso($titulo,$data,$hora): void{

        foreach($this->compromissos as $compromisso){

            if($compromisso["data"]==$data && $compromisso["hora"]==$hora){
                echo "<br>Já existe um compromisso neste horário.<br>";
                return;
            }

        }

        $novoCompromisso=[
            "titulo"=>$titulo,
            "data"=>$data,
            "hora"=>$hora
        ];

        $this->compromissos[]=$novoCompromisso;

        $_SESSION["agenda"]=$this->compromissos;

        echo "<br>Compromisso adicionado com sucesso.<br>";

    }

    public function listarPorData($data): array{

        $lista=[];

        foreach($this->compromissos as $compromisso){

            if($compromisso["data"]==$data){
                $lista[]=$compromisso;
            }

        }

        return $lista;

    }

}

if(!isset($_POST) || empty($_POST)){
    echo "<br>";
}
else{

    $titulo=$_POST["titulo"];
    $data=$_POST["data"];
    $hora=$_POST["hora"];

    $agenda=new AgendaDeCompromissos();

    $agenda->adicionarCompromisso($titulo,$data,$hora);

    $compromissos=$agenda->listarPorData($data);

    echo "<br>Compromissos do dia ".$data.":<br>";

    foreach($compromissos as $compromisso){
        echo "Título: ".$compromisso["titulo"]."<br>";
        echo "Hora: ".$compromisso["hora"]."<br><br>";
    }

}

?>