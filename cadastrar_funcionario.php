<?php
session_start();
    
    if (!isset($_SESSION['usuario']) && !isset($_SESSION['status'])){
        
        header("Location: login.php");
        die();
    }

    include "classes/funcionario.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
          <title>Cadastro de funcionários</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
<body>

    <div class="container mt-3">
        <h2>Cadastro</h2>
        <form name="form1" id="form1" action="cadastrar_funcionario.php" method="POST">
            <div class="mb-3 mt-3">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" id="nome" placeholder="Informe o nome" name="nome" required>
            </div>
            <div class="mb-3">
              <label for="senha">Senha:</label>
              <input type="text" class="form-control" id="senha" placeholder="Informe a senha" name="senha" required>
            </div>
            <div class="mb-3">
            <label for="status">Status:</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" id="botaostatus" name="botaostatus" value="ativo" required>
              <label class="form-check-label" for="status">Ativo</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" id="botaostatus" name="botaostatus" value="inativo" required>
              <label class="form-check-label" for="status">Inativo</label>
            </div>
            <div class="mb-3">
              <label for="idade">Idade:</label>
              <input type="text" class="form-control" id="idade" placeholder="Informe a idade" name="idade" required>
            </div>
            <div class="mb-3">
              <label for="cargo">Cargo:</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" id="botaocargo" name="botaocargo" value="gerente" required>
              <label class="form-check-label" for="radio1">Gerente</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" id="botaocargo" name="botaocargo" value="funcionario" required>
              <label class="form-check-label" for="radio1">Funcionário</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" id="botaocargo" name="botaocargo" value="jovem_aprendiz" required>
              <label class="form-check-label" for="radio1">Jovem Aprendiz</label>
            </div>
            <div class="mb-3">
              <label for="data_adm">Data de admissão:</label>
              <input type="date" class="form-control" id="data_adm" placeholder="Informe a data de admissão" name="data_adm" required>
            </div>
            <div class="mb-3">
              <label for="telefone">Telefone:</label>
              <input type="text" class="form-control" id="telefone" placeholder="Informe o telefone" name="telefone" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="reset" class="btn btn-primary">Limpar dados</button>
        </form>
    </div>
    
    <?php
    
        if(isset($_POST['nome']) && isset($_POST['senha']) && isset($_POST['botaostatus']) && isset($_POST['idade']) && isset($_POST['botaocargo']) && isset($_POST['data_adm']) && isset($_POST['telefone']) && $_POST['nome'] != "" && $_POST['senha'] != "" && $_POST['botaostatus'] && $_POST['idade'] != "" && $_POST['botaocargo'] != "" && $_POST['data_adm'] != "" && $_POST['telefone'] != ""){
            
            extract($_POST);
            $nome = filter_var($nome,FILTER_SANITIZE_STRING);
            $data_adm = str_replace("-", "/", $data_adm);
            
            if($botaocargo == "gerente"){
                $botaocargo = 1;
            }
            elseif($botaocargo == "funcionario"){
                $botaocargo = 2;
            }
            else{
                $botaocargo = 3;
            }
            
            
            $novo = new funcionario();
            
            $novo->setNome_funcionario($nome);
            $novo->setSenha($senha);
            $novo->setStatus($botaostatus);
            $novo->setIdade($idade);
            $novo->setCargo($botaocargo);
            $novo->setData_admissao($data_adm);
            $novo->setTelefone($telefone);
            echo $novo->insereFuncionario();
            
        }
    
    ?>

</body>
</html>
