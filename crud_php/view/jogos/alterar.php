<?php

include_once(__DIR__."/../../controller/JogoController.php");
include_once(__DIR__."/../../model/Jogo.php");

$msgErros = "";
$jogo=null;

if(isset($_POST['submetido'])){
    $idJogo = $_POST['id_jogo'];
    $nome = trim($_POST['nome']);
    $ano = trim($_POST['ano']);
    $preco = is_numeric($_POST['preco'])?$_POST['preco'] : NULL;
    $idgenero = is_numeric($_POST['genero'])?$_POST['genero'] : NULL;
    $idconsole = is_numeric($_POST['console'])?$_POST['console'] : NULL;
    $idetario = is_numeric($_POST['etario'])?$_POST['etario'] : NULL;

    $jogo = new Jogo();
    $jogo->setNome($nome)->setAno($ano)->setPreco($preco)->setId($idJogo);

    if($idgenero){
        $genero = new Genero();
        $genero->setId($idgenero);
        $jogo->setGenero($genero);
    }

    if($idconsole){
        $console = new Console();
        $console->setId($idconsole);
        $jogo->setConsole($console);
    }

    if($idetario){
        $etario = new Etario();
        $etario->setId($idetario);
        $jogo->setEtario($etario);
    }

    $jogoCont = new JogoController();
    $erros=$jogoCont->alterar($jogo);

    if(!$erros){
    header("location:listar.php");
    exit;}

    $msgErros = implode("<br>",$erros);
}

else{
$msgErros="";
$idJogo = 0;

if(isset ($_GET['id']))
    $idJogo = $_GET['id'];

$jogoCont = new JogoController();
$jogo = $jogoCont->buscarPorId($idJogo);

if(!$jogo){
    echo "jogo não encontrado<br>";
    echo "<a href='listar.php'>Voltar</a>";
}
}

include_once(__DIR__."/form.php");
