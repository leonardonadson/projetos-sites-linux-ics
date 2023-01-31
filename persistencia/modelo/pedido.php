<?php

class Pedido {
    
    private $id;
    private $nome_cliente;
    private $numero_cliente;
    private $total;
    private $produtos;
    
    public function __construct(){
        $this->produtos = array();
    }
    
    public function __get($key){
        return $this->$key;
     }
     
    public function __set($key, $value){
        $this->$key = $value;
     }
}