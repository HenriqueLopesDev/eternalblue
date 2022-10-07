<?php

    class modelo{
        
        private $id_modelo;
        private $nome_modelo;
        
        public function __construct($id_modelo, $nome_modelo){
            
            $this->id_modelo = $id_modelo;
            $this->nome_modelo = $nome_modelo;
            
        }
        
        public function setID_modelo($id_modelo){
            $this->id_modelo = $id_modelo;
        }
        
        public function setNome_modelo($nome_modelo){
            $this->nome_modelo = $nome_modelo;
        }        
        
        public function getId_modelo(){
            return $this->id_modelo;
        }
        
        public function getNome_modelo(){
            return $this->nome_modelo;
        }        
        
    }
?>