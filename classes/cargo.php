<?php

    class cargo{
        
        private $id_cargo;
        private $nome_cargo;
        
        public function __construct($id_cargo, $nome_cargo){
            
            $this->id_cargo = $id_cargo;
            $this->nome_cargo = $nome_cargo;
            
        }
        
        public function setID_cargo($id_cargo){
            $this->id_cargo = $id_cargo;
        }
        
        public function setNome_cargo($nome_cargo){
            $this->nome_cargo = $nome_cargo;
        }        
        
        public function getId_cargo(){
            return $this->id_cargo;
        }
        
        public function getNome_cargo(){
            return $this->nome_cargo;
        }        
        
    }
?>