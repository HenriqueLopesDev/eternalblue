<?php
session_start();
    
    if (!isset($_SESSION['usuario']) && !isset($_SESSION['status'])){
        
        header("Location: login.php");
        die();
    }
    else{
        include 'classes/produto.php';
        $novo = new produto();
        $novo->setID_produto($_GET['id']);
        $novo->excluirProduto();
        header("Location: tabela_produto.php");
        die();
    }
?>