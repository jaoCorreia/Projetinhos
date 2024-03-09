<?php

include_once(__DIR__ . "/../model/Jogo.php");


class JogoService {


    public function validarDados (Jogo $jogo){

        $erros = array(); 

        //Validação do campo nome do jogo 

        if(! $jogo->getNome())
                array_push($erros,"<div class='alert alert-warning alert-dismissible col-sm-12' style='padding:10px; margin-bottom:0; color:red'><strong>Informe</strong> o nome do jogo!</div>");

        //Validação do campo genero

        if(! $jogo->getGenero())

            array_push($erros, "<div class='alert alert-warning' style='padding:10px; margin:0; color:red'><strong>Informe</strong> o gênero!</div>");

        //Validação do campo faixa etaria

        if(! $jogo->getEtario())
            array_push($erros, "<div class='alert alert-warning' style='padding:10px; margin:0; color:red'><strong>Informe</strong> a faixa etária!</div>");

        //Validação do campo console

        if(! $jogo->getConsole())

        array_push($erros, "<div class='alert alert-warning' style='padding:10px; margin:0; color:red'><strong>Informe</strong> o console!</div>" );


        //Validação do campo ano de lançamento

        if(! $jogo->getAno())

            array_push($erros, "<div class='alert alert-warning' style='padding:10px; margin:0; color:red'><strong>Informe</strong> o ano de lançamento!</div>");


            //Validação do campo preco
            
        if(! $jogo->getPreco())
            array_push($erros,"<div class='alert alert-warning' style='padding:10px; margin:0; color:red'><strong>Informe</strong> preço!</div>");

            
        return $erros;

    }
}




?>