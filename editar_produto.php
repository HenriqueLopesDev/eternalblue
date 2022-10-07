<?php
session_start();
    
    if (!isset($_SESSION['usuario']) && !isset($_SESSION['status'])){
        
        header("Location: login.php");
        die();
    }
    
    include "classes/produto.php";
    
    $func = new produto();
    $func->setId_produto($_GET['id']);
    $objeto = $func->findById();
    foreach($objeto as $chave => $valor){
        
        $nfuncionario = new produto();
        $nfuncionario->setId_produto($valor->id);
        $nfuncionario->setMarca_produto($valor->marca);
        $nfuncionario->setTamanho_produto($valor->tamanho);
        $nfuncionario->setQuantidade($valor->quantidade);
        $nfuncionario->setCor($valor->cor);
        $nfuncionario->setGenero($valor->genero);
        $nfuncionario->setCadastrante($valor->cadastrante);
        $nfuncionario->setModelo($valor->modelo);
    }
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
      <title>Cadastro de Produtos</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    
    <div class="container">
      <h2>Alteração de Cadastro de Produtos</h2>
      <form name='f1' id='f1' method='post' action="update_produto.php">
        <div class="form-group">
          <label for="marca">Marca:</label>
          <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $nfuncionario->getMarca_produto();?>" required>
        </div>
        <div class="form-group">
          <label for="tamanho">Tamanho:</label>
          <input type="text" class="form-control" id="tamanho" name="tamanho" value="<?php echo $nfuncionario->getTamanho_Produto();?>" required>
        </div>
        <div class="form-group">
          <label for="quantidade">Quantidade:</label>
          <input type="text" class="form-control" id="quantidade" name="quantidade" value="<?php echo $nfuncionario->getQuantidade();?>" required>
        </div>
        <div class="form-group">
          <label for="cor">Cor:</label>
          <input type="text" class="form-control" id="cor" name="cor" value="<?php echo $nfuncionario->getCor();?>" required>
        </div>
        <div class="form-group">
          <label for="genero">Gênero:</label>
          <input type="text" class="form-control" id="genero" name="genero" value="<?php echo $nfuncionario->getGenero();?>" required>
        </div>
        <div class="form-group">
          <label for="telefone">Cadastrante:</label>
          <input type="text" class="form-control" id="cadastrante" name="cadastrante" value="<?php echo $nfuncionario->getCadastrante();?>" required>
        </div>
        <div class="form-group">
          <label for="modelo">Modelo:</label>
          <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $nfuncionario->getModelo();?>" required>
        </div>
        <div class="form-group">
            <input type="hidden" id="idproduto" name="idproduto" value="<?php echo $nfuncionario->getId_produto();?>">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Enviar" />
        </div>
        
      </form>
    </div>
    </body>
</html>