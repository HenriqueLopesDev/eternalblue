<?php
session_start();
    
    if (!isset($_SESSION['usuario']) && !isset($_SESSION['status'])){
        
        header("Location: login.php");
        die();
    }    
    else{
            
        include 'classes/funcionario.php';
        $novo = new funcionario;
        $novo->setId_funcionario($_POST['idfuncionario']);
        $novo->setNome_funcionario($_POST['nome']);
        if (mb_strlen($_POST['senha']) == 32){
            $novo->setSenha_banco($_POST['senha']);
        }
        else{
            $novo->setSenha($_POST['senha']);
        }
        $novo->setStatus($_POST['status']);
        $novo->setIdade($_POST['idade']);
        $novo->setCargo($_POST['cargo']);
        $data = str_replace("-", "/", $_POST['data_adm']);
        $novo->setData_admissao($data);
        $novo->setTelefone($_POST['telefone']);
        $novo->alterarFuncionario();
        header("Location: tabela_funcionario.php");
    }
?>