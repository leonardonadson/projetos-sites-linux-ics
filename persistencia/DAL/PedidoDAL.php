<?php
require_once '../../Persistencia/db.php';

class PedidoDAL {
    private $pdo;
    
    public function __construct() {
        $conexao = new Conexao();
        $this->pdo = $conexao->getPDO();
    }

    private function cadastrarProdutos($pedido_id, $produtos)
    {
        foreach($produtos as $prod)
            {
                $produto_id = $prod->produto_id;
                $sql = "INSERT INTO pedido_produto (produto_id,pedido_id)"
                    . "VALUES (:produto_id, :pedido_id)";
                $retorno = $this->pdo->prepare($sql);
                $retorno->bindParam(":produto_id", $produto_id);
                $retorno->bindParam(":pedido_id", $pedido_id);

                $retorno->execute();
            }
        
    }
    
    public function inserir($obj)
    {
        $parametros = array(
            ':nome_cliente' => $obj -> nome_cliente,
            ':numero_cliente' => $obj -> numero_cliente,


        );
        
        $sql = "INSERT INTO pedido (nome_cliente, numero_cliente)"
                . "VALUES (:nome_cliente, :numero_cliente)";
        $retorno = $this->pdo->prepare($sql);
        $retorno->execute($parametros);
        
        if($retorno->rowCount()>0)
        {
            $pedido_id = $this->buscarCodigo();
            $this->cadastrarProdutos($pedido_id, $obj->produtos);
            return  1;
        }
        else
        {
            return 0;
        }
    }
    
    public function excluir($chavePrimaria)
    {
        //ANTES DE EXCLUIR O PEDIDO .. excluir todos os registro da pedido_produto que 
        //TEM O pedido QUE DESEJA-SE EXCLUIR
        $sql = "DELETE FROM pedido WHERE id = :id";
        $retorno = $this->pdo->prepare($sql);
        $retorno->bindParam(":id", $chavePrimaria);
        $retorno->execute();
        
        return $retorno->rowCount();
    }
    
    public function alterar($obj)
    {
        $parametros = array(
            ':id' => $obj -> id,
            ':nome_cliente' => $obj -> nome_cliente,
            ':numero_cliente' => $obj -> numero_cliente,

        );
        
        $sql = "UPDATE pedido SET nome_cliente = :nome_cliente, numero_cliente = :numero_cliente WHERE id = :id";
        $retorno = $this->pdo->prepare($sql);
        $retorno->execute($parametros);
        
        return $retorno->rowCount();
    }
    
    public function buscarPorChavePrimaria($chavePrimaria)
    {
        $sql=("SELECT * FROM pedido WHERE id = :id");
        $retorno = $this->pdo->prepare($sql);
        $retorno->bindParam(":id", $chavePrimaria);
        $retorno->execute();
       
        if($obj=$retorno->fetchObject())
        {
            $obj->produtos = $this->buscarProdutos($chavePrimaria);
            return $obj;
        }
        else
        {
            return null;
        }
    }
    
    public function buscarProdutos($chavePrimaria)
    {
        $sql = "select 
	produto.nome, 
	produto.produto_id
from 
	pedido_produto 

inner join produto ON produto.produto_id=pedido_produto.produto_id
where 
	pedido_id=:id";
        
        $retorno = $this->pdo->prepare($sql);
        $retorno->bindParam(":id", $chavePrimaria);
        $retorno->execute();
        $profs = array();
        while($obj=$retorno->fetchObject())
        {
            
            $profs[] = $obj;
        }
        
        return $profs;
        
        
    }
    
    private function buscarCodigo()
    {
        
        $sql = "select max(id) as codigo from pedido";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $obj = $query->fetchObject();
        return $obj->codigo;
    }
            
    
    public function listar($filtro=null, $ordenarPor=null)
    {
        $parametros = array();
        $sql = "SELECT * FROM pedido ";
        if(isset($filtro))
        {
            $sql .= " WHERE nome_cliente ilike :filtro";
            $parametros[":filtro"] = "%".$filtro."%";
        }
        $lista = array();
        $query = $this->pdo->prepare($sql);
        
        $query->execute($parametros);
        
        //Percorrer meus registros, tratando-os como objeto
        while ($obj = $query->fetchObject()){
            $obj->produtos = $this->buscarProdutos($obj->id);
            $lista[] = $obj;
        }
        
        return $lista;
    }
}
