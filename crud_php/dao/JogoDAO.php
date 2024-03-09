<?php

    include_once(__DIR__."/../util/Connection.php");
    include_once(__DIR__."/../model/Jogo.php");

class JogoDAO{

    public function list(){

        $conn = Connection::getConnection();

        $sql =  "SELECT j.*, c.nome AS nome_console, c.fabricante AS fabricante_console ,g.nome AS nome_genero, e.nome AS nome_etaria FROM jogos j".
                " JOIN console c ON (C.id = j.id_console)".
                " JOIN genero g ON (g.id = j.id_genero)".
                " JOIN class_etaria e ON (e.id = j.id_etaria)".
                " ORDER BY j.nome";

        $stm = $conn->prepare($sql);
        $stm->execute();

        $result = $stm->fetchAll();
        return $this->mapDBtoObject($result);

    }

    public function findById(int $idJogo){

        $conn = Connection::getConnection();

        $sql =  "SELECT j.*, c.nome AS nome_console, c.fabricante AS fabricante_console, g.nome AS nome_genero, e.nome AS nome_etaria FROM jogos j".
                " JOIN console c ON (C.id = j.id_console)".
                " JOIN genero g ON (g.id = j.id_genero)".
                " JOIN class_etaria e ON (e.id = j.id_etaria)".
                " WHERE j.id = ?".
                " ORDER BY j.nome";

        $stm = $conn->prepare($sql);
        $stm->execute(array($idJogo));

        $result = $stm->fetchAll();
        
        $jogos = $this->mapDBtoObject($result);

        if($jogos) return $jogos[0];
        else return null;

    }

    public function deleteById(int $idJogo){
        $conn = Connection::getConnection();

        $sql = "DELETE FROM jogos WHERE id = ?";

        $stm = $conn->prepare($sql);
        $stm->execute(array($idJogo));
    }


    public function insert(Jogo $jogo){
        $conn = Connection::getConnection();

        $sql = "INSERT INTO jogos (nome,ano,preco,id_console,id_etaria,id_genero)".
                " VALUES(?,?,?,?,?,?)";

        $stm = $conn->prepare($sql);
        $stm->execute(array($jogo->getNome(), 
                            $jogo->getAno(), 
                            $jogo->getPreco(), 
                            $jogo->getConsole()->getId(),
                            $jogo->getEtario()->getId(),
                            $jogo->getGenero()->getId()));
    }

    public function update(Jogo $jogo){
        $conn = Connection::getConnection();

        $sql = "UPDATE jogos SET nome=?,ano=?,preco=?,id_console=? ,id_etaria=? ,id_genero=? WHERE id=?";

        $stm = $conn->prepare($sql);
        $stm->execute(array($jogo->getNome(), 
                            $jogo->getAno(), 
                            $jogo->getPreco(), 
                            $jogo->getConsole()->getId(),
                            $jogo->getEtario()->getId(),
                            $jogo->getGenero()->getId(),
                            $jogo->getId()));
    }

    private function mapDBtoObject(array $result) {

        $jogos = array();

        foreach($result as $res){

            $jogo = new Jogo();
            $jogo->setId($res['id']);
            $jogo->setNome($res['nome']);
            $jogo->setAno($res['ano']);
            $jogo->setPreco($res['preco']);

            $console =new Console();
            $console->setId($res['id_console']);
            $console->setNome($res['nome_console']);
            $console->setFabricante($res['fabricante_console']);

            $jogo->setConsole($console);

            $genero =new Genero();
            $genero->setId($res['id_genero']);
            $genero->setNome($res['nome_genero']);

            $jogo->setGenero($genero);

            $etario =new Etario();
            $etario->setId($res['id_etaria']);
            $etario->setNome($res['nome_etaria']);

            $jogo->setEtario($etario);

            array_push($jogos,$jogo);

        }

        return $jogos;

    }
}