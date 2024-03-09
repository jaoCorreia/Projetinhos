<?php
include_once(__DIR__."/../util/Connection.php");
include_once(__DIR__."/../model/Genero.php");

class GeneroDAO{

    public function list(){
        $conn = Connection::getConnection();

        $sql = "SELECT * FROM genero ORDER BY nome";

        $stm = $conn->prepare($sql);
        $stm->execute();

        $result = $stm->fetchAll();

        $generos=$this->mapDBToObject($result);
        return $generos;

    }

    private function mapDBToObject($result){

        $generos=array();

        foreach($result as $r){
            $genero = new Genero();
            $genero->setId($r['id'])
                  ->setNome($r['nome']);
            array_push($generos,$genero);
        }
        return $generos;
    }
    
}