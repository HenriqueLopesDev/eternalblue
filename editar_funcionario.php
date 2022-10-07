<?php
session_start();
    
    if (!isset($_SESSION['usuario']) && !isset($_SESSION['status'])){
        
        header("Location: login.php");
        die();
    }
    
    include "classes/funcionario.php";
    
    $func = new funcionario();
    $func->setId_funcionario($_GET['id']);
    $objeto = $func->findById();
    foreach($objeto as $chave => $valor){
        $nfuncionario = new funcionario();
        $nfuncionario->setId_funcionario($valor->id);
        $nfuncionario->setNome_funcionario($valor->nome);
        $nfuncionario->setSenha_banco($valor->senha);
        $nfuncionario->setStatus($valor->status);
        $nfuncionario->setIdade($valor->idade);
        $nfuncionario->setCargo($valor->cargo);
        $nfuncionario->setData_admissao($valor->data_adm);
        $nfuncionario->setTelefone($valor->telefone);
    }
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
      <title>Cadastro de Funcionarios</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    
    <div class="container">
      <h2>Alteração de Cadastro de Funcionários</h2>
      <form name='f1' id='f1' method='post' action="update_funcionario.php">
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nfuncionario->getNome_funcionario();?>" required>
        </div>
        <div class="form-group">
          <label for="senha">Senha:</label>
          <input type="text" class="form-control" id="senha" name="senha" value="<?php echo $nfuncionario->getSenha_banco();?>" required>
        </div>
        <div class="form-group">
          <label for="status">Status:</label>
          <input type="text" class="form-control" id="status" name="status" value="<?php echo $nfuncionario->getStatus();?>" required>
        </div>
        <div class="form-group">
          <label for="idade">Idade:</label>
          <input type="text" class="form-control" id="idade" name="idade" value="<?php echo $nfuncionario->getIdade();?>" required>
        </div>
        <div class="form-group">
          <label for="cargo">Cargo:</label>
          <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $nfuncionario->getCargo();?>" required>
        </div>
        <div class="form-group">
          <label for="data_adm">Data de admissão:</label>
          <input type="date" class="form-control" id="data_adm" name="data_adm" value="<?php echo $nfuncionario->getData_admissao();?>" required>
        </div>
        <div class="form-group">
          <label for="telefone">Fone:</label>
          <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $nfuncionario->getTelefone();?>" required>
        </div>
        <div class="form-group">
            <input type="hidden" id="idfuncionario" name="idfuncionario" value="<?php echo $nfuncionario->getId_funcionario();?>">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Enviar" />
        </div>
        
      </form>
    </div>
    </body>
</html>