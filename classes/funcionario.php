<?php
include "cargo.php";
include_once "db.php";

    class funcionario{
        
        private $id_funcionario;
        private $nome_funcionario;
        private $senha_funcionario;
        private $status;
        private $idade_funcionario;
        private $cargo;
        private $id_cargo;
        private $nome_cargo;
        private $data_admissao;
        private $telefone;
        
        public function __construct(){
            
        }        
        
        public function setID_funcionario($id_funcionario){
            $this->id_funcionario = $id_funcionario;
        }
        
        public function setNome_funcionario($nome_funcionario){
            $this->nome_funcionario = $nome_funcionario;
        }        
        
        public function setSenha($senha_funcionario){
            $this->senha_funcionario = md5($senha_funcionario);
        }
        
        public function setSenha_banco($senha_funcionario){
            $this->senha_funcionario = $senha_funcionario;
        }
        
        public function setStatus($status){
            $this->status = $status;
            
        }
        
        public function setIdade($idade_funcionario){
            $this->idade_funcionario = $idade_funcionario;
        }  
        
        public function setCargo($cargo){
            $this->cargo = $cargo;
        }   
        
        public function setData_admissao($data_admissao){
            $this->data_admissao = $data_admissao;
        }  
        
        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }        
        
        public function getId_funcionario(){
            return $this->id_funcionario;
        }
        
        public function getSenha_funcionario(){
            return $this->senha_funcionario;
        }
        
        public function getSenha_banco(){
            return $this->senha_funcionario;
        }
        
        public function getStatus(){
            return $this->status;
            
        }        
        
        public function getNome_funcionario(){
            return $this->nome_funcionario;
        }        
        
        public function getIdade(){
            return $this->idade_funcionario;
        }        
        
        public function getCargo(){
            return $this->cargo;
        }        
        
        public function getData_admissao(){
            return $this->data_admissao;
        }    
        
        public function getTelefone(){
            return $this->telefone;
        }         
        
        
        public function findAll(){
            
            try{
                
                $sql = "select * FROM funcionarios ";
                $stmt = db::prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll();
                return $resultado;
                
            } catch (Exception $e){
                
                return $e.message();
                
            }
            
        }
        
        public function findById(){
            
            try{
                
                $sql = "select * FROM funcionarios WHERE id = '" .  $this->id_funcionario . "'";
                $stmt = db::prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll();
                return $resultado;
                
            } catch (Exception $e){
                
                return $e.message();
            }
            
        }
        
        public function findByName(){
            
            try{
                
                $sql = "select * FROM funcionarios WHERE nome = '" .  $this->nome_funcionario . "'";
                $stmt = db::prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll();
                return $resultado;
                
            } catch (Exception $e){
                
                return $e->message();
            }
            
        }
        
        public function findGenerico($campo, $valor){
            
            try{
                
                $sql = "select * FROM funcionarios $campo = '$valor' ";
                $stmt = db::prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll();
                return $resultado;
            
            } catch (Exception $e){
                
                return $e.message();
            } 
            
        }
        
        public function insereFuncionario(){
            
                $sql = "INSERT INTO funcionarios (nome, senha, status, idade, cargo, data_adm, telefone) VALUES ('$this->nome_funcionario', '$this->senha_funcionario', '$this->status', $this->idade_funcionario, $this->cargo, STR_TO_DATE('$this->data_admissao', '%Y/%m/%d'), '$this->telefone')";
                $stmt = DB::prepare($sql);
                $stmt->execute();
                return "<script>alert('Usuário cadastrado com sucesso!');</script>";
            
        }
        
        public function alterarFuncionario(){
            
                $sql  = "UPDATE funcionarios SET nome = '" . $this->nome_funcionario . "', senha = '" . $this->senha_funcionario . "', status = '" . $this->status . "', idade = " . $this->idade_funcionario . ", cargo = " . $this->cargo . ", data_adm = STR_TO_DATE('" . $this->data_admissao . "', '%Y/%m/%d'), telefone = '" . $this->telefone . "' WHERE id = '" . $this->id_funcionario . "'";
    		    $stmt = DB::prepare($sql);
    		    $stmt->execute();
        }        
        
        
        public function excluirFuncionario(){
            
            try{
                $sql  = "DELETE FROM funcionarios WHERE id = " . $this->id_funcionario;
    		    $stmt = DB::prepare($sql);
    		    $stmt->execute();
            } catch (Exception $e) {
                return $e.message();
            }
            
        }
        
    }
?>