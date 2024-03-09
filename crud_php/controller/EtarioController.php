<?php

include_once(__DIR__."/../dao/EtarioDAO.php");

class EtarioController{

    private EtarioDAO $etarioDAO;

    public function __construct(){
        $this->etarioDAO = new EtarioDAO();
    }

    public function listar(){
        return $this->etarioDAO->list();
    }

}