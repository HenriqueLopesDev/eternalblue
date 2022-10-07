<?php
session_start();
    
    if (!isset($_SESSION['usuario']) && !isset($_SESSION['status'])){
        
        header("Location: login.php");
        die();
    }    
    else{
        
        include 'classes/produto.php';
        $novo = new produto;
        $novo->setId_produto($_POST['idproduto']);
        $novo->setMarca_produto($_POST['marca']);
        $novo->setTamanho_produto($_POST['tamanho']);
        $novo->setQuantidade($_POST['quantidade']);
        $novo->setCor($_POST['cor']);
        $novo->setGenero($_POST['genero']);
        $novo->setCadastrante($_POST['cadastrante']);
        $novo->setModelo($_POST['modelo']);
        $novo->alterarProduto();
        header("Location: tabela_produto.php");
    }
?>