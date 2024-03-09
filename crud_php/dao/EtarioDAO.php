<?php
include_once(__DIR__."/../util/Connection.php");
include_once(__DIR__."/../model/Etario.php");

class EtarioDAO{
    
    public function list(){
        $conn = Connection::getConnection();

        $sql = "SELECT * FROM class_etaria ORDER BY nome";

        $stm = $conn->prepare($sql);
        $stm->execute();

        $result = $stm->fetchAll();

        $etarios=$this->mapDBToObject($result);
        return $etarios;

    }

    private function mapDBToObject($result){
        $etarios=array();

        foreach($result as $r){
            $etario = new Etario();
            $etario->setId($r['id'])
                  ->setNome($r['nome']);
            array_push($etarios,$etario);
        }
        return $etarios;
    }
}