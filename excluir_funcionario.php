<?php
session_start();
    
    if (!isset($_SESSION['usuario']) && !isset($_SESSION['status'])){
        
        header("Location: login.php");
        die();
    }
    else{
        
        include 'classes/funcionario.php';
        $novo = new funcionario();
        $novo->setID_funcionario($_GET['id']);
        $novo->excluirFuncionario();
        header("Location: tabela_funcionario.php");
        die();
    }
?>