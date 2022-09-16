<?php
require_once 'Banco.php';
require_once 'Conexao.php';

class Galeria extends Banco{

    private $id;
    private $idImovel;
    private $foto;
    private $fotoTipo;
    private $path;
    
    //métodos de acesso

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdImovel()
    {
        return $this->idImovel;
    }

    public function setIdImovel($idImovel)
    {
        $this->idImovel = $idImovel;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function getFotoTipo(){
        return $this->$fotoTipo;
    }

    public function setFotoTipo($fotoTipo)
    {
        $this->fotoTipo = $fotoTipo;
    }

    public function getGaleria()
    {
        return $this->galeria;
    }
    public function setGaleria($galeria)
    {
        $this->galeria = $galeria;
    }


    public function save() {
        $result = false;
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        if($conn = $conexao->getConection()){
            
                //cria query de inserção passando os atributos que serão armazenados
                $query = "insert into galeria (id, idImovel , path) 
                values (null,:idImovel, :path)";
                //Prepara a query para execução
                $stmt = $conn->prepare($query);
                //executa a query
                if ($stmt->execute(array(':idImovel' => $this->idImovel,':path' => $this->path))) {
                    $result = $stmt->rowCount();
                }
            
        }
        return $result;
    }

    public function find($id) {

        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        //cria query de seleção
        $query = "SELECT * FROM imovel where id = :id";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        //executa a query
        if ($stmt->execute(array(':id'=> $id))) {
            //verifica se houve algum registro encontrado
            if ($stmt->rowCount() > 0) {
                //o resultado da busca será retornado como um objeto da classe
                $result = $stmt->fetchObject(Imovel::class);
            }else{
                $result = false;
            }
        }
        return $result;
    }

    public function remove($id) {

        $result = false;
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dadosgi
        $conn = $conexao->getConection();
        //cria query de remoção
        $query = "DELETE FROM galeria where id = :idImovel";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        //executa a query
        if ($stmt->execute(array(':idImovel'=> $id))) {
            $result = true;
        }
        return $result;
    }

    public function count() {
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        //cria query de seleção
        $query = "SELECT count(*) FROM galeria";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        $count = $stmt->execute();
        if (isset($count) && !empty($count)) {
            return $count;
        }
        return false;
    }

    public function listAll() {

        //cria um objeto do tipo conexao
        
    }
    public function listarGaleriaOne($Id)
    {
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        //cria query de seleção
        $query = "SELECT path FROM galeria WHERE Id = :idImovel";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        //Cria um array para receber o resultado da seleção
        $result = array();
        //executa a query
        if ($stmt->execute(array('idImovel'=>$Id))) {
            //o resultado da busca será retornado como um objeto da classe
            while ($rs = $stmt->fetchObject(Galeria::class)) {
                //armazena esse objeto em uma posição do vetor
                $result[] = $rs;
            }
        }else{
            $result = false;
        }

        return $result;
    }

    public function listAllTipo($tipo) {

        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        //cria query de seleção
        $query = "SELECT * FROM galeria where tipo = :tipo";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        //Cria um array para receber o resultado da seleção
        $result = array();
        //executa a query
        if ($stmt->execute(array(':tipo'=> $tipo))) {
            //o resultado da busca será retornado como um objeto da classe
            while ($rs = $stmt->fetchObject(Imovel::class)) {
                //armazena esse objeto em uma posição do vetor
                $result[] = $rs;
            }
        }else{
            $result = false;
        }

        return $result;
    }
  

    /**
     * Get the value of path
     */ 
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the value of path
     *
     * @return  self
     */ 
    public function setPath($path)
    {
        $this->path = $path;
    }
}
?>