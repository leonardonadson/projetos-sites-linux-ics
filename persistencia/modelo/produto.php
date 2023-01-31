<?php

class Produto {
    
    private $produto_id;
    private $nome;
    private $preco;
    
    public function __get($key){
        return $this->$key;
     }
     
    public function __set($key, $value){
        $this->$key = $value;
     }
}