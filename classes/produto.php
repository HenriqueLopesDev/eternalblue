<?php

include "modelo.php";
include "db.php";

    class produto{
        
        private $id_produto;
        private $marca_produto;
        private $tamanho_produto;
        private $quantidade;
        private $cor;
        private $genero;
        private $cadastrante;
        private $modelo;
        
    
        public function __construct(){
            
        }
        
        public function setID_produto($id_produto){
            $this->id_produto = $id_produto;
        }
        
        public function setMarca_produto($marca_produto){
            $this->marca_produto = $marca_produto;
        }        
        
        public function setTamanho_produto($tamanho_produto){
            $this->tamanho_produto = $tamanho_produto;
        }
        
        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }  
        
        public function setCor($cor){
            $this->cor = $cor;
        }   
        
        public function setGenero($genero){
            $this->genero = $genero;
        }  
        
        public function setCadastrante($cadastrante){
            $this->cadastrante = $cadastrante;
        } 
        
        public function setModelo($modelo){
            
            $this->modelo = $modelo;
        }           
        
        public function getID_produto(){
            return $this->id_produto;
        }
        
        public function getMarca_produto(){
            return $this->marca_produto;
        }        
        
        public function getTamanho_produto(){
            return $this->tamanho_produto;
        }        
        
        public function getQuantidade(){
            return $this->quantidade;
        }        
        
        public function getCor(){
            return $this->cor;
        }    
        
        public function getGenero(){
            return $this->genero;
        }         
        
        public function getCadastrante(){
            return $this->cadastrante;
        }         
        
        public function getModelo(){
            return $this->modelo;
        }         
       
        public function findAll(){
            
            $sql = "select * FROM produtos ";
            $stmt = db::prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            
            return $resultado;
            
        }
        
        public function findById(){
            
            $sql = "select * FROM produtos WHERE id = " . $this->id_produto . "";
            $stmt = db::prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            
            return $resultado;            
            
        }
        
        public function findGenerico($campo, $valor){
            
            $sql = "select * FROM produtos $campo = '$valor' ";
            $stmt = db::prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            
            return $resultado;            
            
        } 
        
        public function insereProduto(){
            
                $sql = "INSERT INTO produtos (marca, tamanho, quantidade, cor, genero, cadastrante, modelo) VALUES ('$this->marca_produto', $this->tamanho_produto, $this->quantidade, '$this->cor', '$this->genero', $this->cadastrante, $this->modelo)";
                $stmt = DB::prepare($sql);
                $stmt->execute();
                return "<script>alert('Produto cadastrado com sucesso!');</script>";
            
        }
        
        public function alterarProduto(){
            
                $sql  = "UPDATE produtos SET marca = '" . $this->marca_produto . "', tamanho = " . $this->tamanho_produto . ", quantidade = " . $this->quantidade . ", cor = '" . $this->cor . "', genero =  '" . $this->genero . "', cadastrante = " . $this->cadastrante . ", modelo = " . $this->modelo . " WHERE id = " . $this->id_produto . "";
    		    $stmt = DB::prepare($sql);
    		    $stmt->execute();
        }        
        
        public function excluirProduto(){
            
            try{
                $sql  = "DELETE FROM produtos WHERE id = " . $this->id_produto;
    		    $stmt = DB::prepare($sql);
    		    $stmt->execute();
            } catch (Exception $e) {
                return $e.message();
            }
            
        }
        
    }
?>