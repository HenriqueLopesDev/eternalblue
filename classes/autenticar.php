<?php
    
    include "db.php";
    
    class autenticar{
        
        private $usuario;
        private $senha;
        
        public function __construct(){
            
        }
        
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }
        
        public function setSenha($senha){
            $this->senha = md5($senha);
        }
        
        public function getUsuario(){
            return $this->usuario;
        }
        
        public function getSenha(){
            return $this->senha;
        }        
        
        public function autenticarUsuario(){
            
             $sql = "select * from funcionarios where nome = '" . $this->usuario . "' and senha = '" . $this->senha . "' and status = 'ativo'";
             $stmt = DB::prepare($sql);
             $stmt->execute();
             $linhas = $stmt->rowCount();
             if($linhas)
                return TRUE;
             else 
                return FALSE;
            }
        }

?>