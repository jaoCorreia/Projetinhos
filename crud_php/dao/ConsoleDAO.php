<?php
//test
include_once(__DIR__."/../util/Connection.php");
include_once(__DIR__."/../model/Console.php");

class ConsoleDAO{

    public function list(){

        
        $conn = Connection::getConnection();

        $sql = "SELECT * FROM console ORDER BY nome";

        $stm = $conn->prepare($sql);
        $stm->execute();

        $result = $stm->fetchAll();

        $consoles=$this->mapDBToObject($result);
        return $consoles;

    }

    private function mapDBToObject($result){
        $consoles=array();

        foreach($result as $r){
            $console = new Console();
            $console->setId($r['id'])
                  ->setNome($r['nome'])
                  ->setFabricante($r['fabricante']) ;
            array_push($consoles,$console);
        }
        return $consoles;
    }
}
