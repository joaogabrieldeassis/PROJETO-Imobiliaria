<?php

require_once 'Banco.php';
require_once 'Conexao.php';

class Imovel extends Banco{

    private $id;
    private $descricao;
    private $foto;
    private $tipo;
    private $valor;

    //métodos de acesso

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($foto){
        $this->foto = $foto;
    }

    public function getTipo(){
        if($this->tipo == 'A'){
            $res = "Apartamento";
        }else{
            $res = "Casa";
        }
        return $res;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }


    public function save(){
        $result = false;

        $conexao = new Conexao();

        $query = "insert into imovel (descricao, tipo, valor, foto) values (:descricao, :tipo, :valor, :foto)";

        if($conn = $conexao->getConection()){
            $stmt = $conn->prepare($query);
            if($stmt->execute(array(':descricao'=>$this->descricao, ':tipo' => $this->tipo, ':valor' => $this->valor, ':foto' => $this->foto))){
                $result = $stmt->rowCount();
            }
        }else{
            //cadastro
            $query = "insert into imovel (descricao, foto, valor, tipo) values (:descricao, :foto, :valor, :tipo)";
            $stmt = $conn->prepare($query);
            if($stmt->execute(array(':descricao'=>$this->descricao, ':foto' => $this->foto, ':valor' => $this->valor, ':tipo' => $this->tipo))){
                $result = $stmt->rowCount();
            }
        }

        return $result;
    }

    public function edit(){
        
    }

    public function find($id){
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();

        $query = "select * from imovel where id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id' => $id))){
            if($stmt->rowCount() > 0){
                $result = $stmt->fetchObject(Imovel::class);
            }
        }
        return $result;
    }

    public function remove($id){
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "delete from imovel where id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id' => $id))){
            $result = true;
        }

        return $result;
    }

    public function count(){
        
    }

    public function listAll()
    {
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();

        $query = "select * from imovel";

        $stmt = $conn->prepare($query);

        $result = array();

        if($stmt->execute()){
            while ($rs = $stmt->fetchObject(Imovel::class)){
                $result[] = $rs;
            }
        }

        return $result;
    }
  
}

?>