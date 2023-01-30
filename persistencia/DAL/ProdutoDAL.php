<?php
require_once 'C:\xampp\htdocs\Persistencia\db.php';

class ProdutoDAL {
    private $pdo;
    
    public function __construct() {
        $conexao = new Conexao();
        $this->pdo = $conexao->getPDO();
    }
    
    
    public function inserir($obj)
    {
        $parametros = array(
            ':produto_id' => $obj -> produto_id,
            ':nome' => $obj -> nome,
            ':preco' => $obj -> preco
        );
        
        $sql = "INSERT INTO produto (produto_id, nome, preco)"
                . "VALUES (:produto_id, :nome, :preco)";
        $retorno = $this->pdo->prepare($sql);
        $retorno->execute($parametros);
        
        return $retorno->rowCount();
    }
    
    public function excluir($chavePrimaria)
    {
        
        $sql = "DELETE FROM produto WHERE produto_id = :produto_id";
        $retorno = $this->pdo->prepare($sql);
        $retorno->bindParam(":produto_id", $chavePrimaria);
        $retorno->execute();
        
        return $retorno->rowCount();
    }
    
    public function alterar($obj)
    {
        $parametros = array(
            ':produto_id' => $obj -> produto_id,
            ':nome' => $obj -> nome,
            ':preco' => $obj -> preco,
        );
        
        $sql = "UPDATE produto SET "
                . "nome = :nome, preco = :preco WHERE produto_id = :produto_id";
        $retorno = $this->pdo->prepare($sql);
        $retorno->execute($parametros);
        
        return $retorno->rowCount();
    }
    
    public function buscarPorChavePrimaria($chavePrimaria)
    {
        $sql=("SELECT * FROM produto WHERE produto_id = :produto_id");
        $retorno = $this->pdo->prepare($sql);
        $retorno->bindParam(":produto_id", $chavePrimaria);
        $retorno->execute();
       
        if($obj=$retorno->fetchObject())
        {
            return $obj;
        }
        else
        {
            return null;
        }
    }
    
    public function listar($filtro=null,$ordenarPor=null)
    {
        $parametros = array();
        $sql = "SELECT * FROM produto ";
        if(isset($filtro))
        {
            $sql .= " WHERE nome ilike :filtro OR produto_id ilike :filtro";
            $parametros[":filtro"] = "%".$filtro."%";
        }
        $lista = array();
        $query = $this->pdo->prepare($sql);
        
        $query->execute($parametros);
        
        //Percorrer meus registros, tratando-os como objeto
        while ($obj = $query->fetchObject()){
            $lista[] = $obj;
        }
        
        return $lista;
    }
}