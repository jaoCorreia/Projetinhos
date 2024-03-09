<?php

include_once(__DIR__."/../../model/Jogo.php");
include_once(__DIR__."/../../model/Console.php");
include_once(__DIR__."/../../model/Genero.php");
include_once(__DIR__."/../../model/Etario.php");
include_once(__DIR__."/../../controller/JogoController.php");

$msgErros = "";
$jogo=null;

if(isset($_POST['submetido'])){
    $nome = trim($_POST['nome']);
    $preco = is_numeric($_POST['preco'])?$_POST['preco'] : NULL;
    $ano = trim($_POST['ano']);
    $idgenero = is_numeric($_POST['genero'])?$_POST['genero'] : NULL;
    $idconsole = is_numeric($_POST['console'])?$_POST['console'] : NULL;
    $idetario = is_numeric($_POST['etario'])?$_POST['etario'] : NULL;

    $jogo = new Jogo();
    $jogo->setNome($nome)->setAno($ano)->setPreco($preco);

    if($idconsole){
        $console = new Console();
        $console->setId($idconsole);
        $jogo->setConsole($console);
    }

    if($idgenero){
        $genero = new Genero();
        $genero->setId($idgenero);
        $jogo->setGenero($genero);
    }

    if($idetario){
        $etario = new Etario();
        $etario->setId($idetario);
        $jogo->setEtario($etario);
    }

    $jogoCont = new JogoController();
    $erros=$jogoCont->inserir($jogo);

    if(!$erros){
    header("location:listar.php");
    exit;}

    $msgErros = implode("<br>",$erros);
}

include_once (__DIR__ . "/form.php");