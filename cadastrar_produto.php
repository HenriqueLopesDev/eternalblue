<?php
session_start();

    include "classes/produto.php";
    include "classes/funcionario.php";
    
    if (!isset($_SESSION['usuario']) && !isset($_SESSION['status'])){
        
        header("Location: login.php");
        die();
    }
?>     

<!DOCTYPE html>
<html lang="pt-br">
    <head>
          <title>Cadastro de produtos</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
<body>

    <div class="container mt-3">
        <h2>Cadastro de produtos</h2>
        <form name="form1" id="form1" action="cadastrar_produto.php" method="POST">
            <div class="mb-3">
              <label for="marca">Marca:</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" id="botaomarca" name="botaomarca" value="Nike" required>
              <label class="form-check-label" for="Nike">Nike</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" id="botaomarca" name="botaomarca" value="Adidas" required>
              <label class="form-check-label" for="Adidas">Adidas</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" id="botaomarca" name="botaomarca" value="Havainas" required>
              <label class="form-check-label" for="Havaianas">Havainas</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" id="botaomarca" name="botaomarca" value="Converse" required>
              <label class="form-check-label" for="Converse">Converse</label>
            </div>
            <div class="mb-3">
              <label for="cargo">Modelo:</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" id="botaomodelo" name="botaomodelo" value="chinelo" required>
              <label class="form-check-label" for="chinelo">Chinelo</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" id="botaomodelo" name="botaomodelo" value="chuteira" required>
              <label class="form-check-label" for="chuteira">Chuteira</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" id="botaomodelo" name="botaomodelo" value="tenis" required>
              <label class="form-check-label" for="tenis">Tênis</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" id="botaomodelo" name="botaomodelo" value="sapatenis" required>
              <label class="form-check-label" for="sapatenis">Sapatênis</label>
            </div>
            <div class="mb-3">
              <label for="tamanho">Tamanho:</label>
              <input type="text" class="form-control" id="tamanho" placeholder="Informe o tamanho" name="tamanho" required>
            </div>
            <div class="mb-3">
              <label for="quantidade">Quantidade:</label>
              <input type="text" class="form-control" id="quantidade" placeholder="Informe a quantidade" name="quantidade" required>
            </div>            
            <div class="mb-3">
              <label for="cor">Cor:</label>
              <input type="text" class="form-control" id="cor" placeholder="Informe a cor" name="cor" required>
            </div>
            <div class="mb-3">
              <label for="genero">Gênero:</label>
              <input type="text" class="form-control" id="genero" placeholder="Informe o gênero" name="genero" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="reset" class="btn btn-primary">Limpar dados</button>
        </form>
    </div>
    
    <?php
    
        if(isset($_POST['botaomarca']) && isset($_POST['botaomodelo']) && isset($_POST['tamanho']) && isset($_POST['quantidade']) && isset($_POST['cor']) && isset($_POST['genero']) && $_POST['botaomarca'] != "" && $_POST['botaomodelo'] != "" && $_POST['tamanho'] != "" && $_POST['quantidade'] != "" && $_POST['cor'] != "" && $_POST['genero'] != ""){
            
            extract($_POST);
            
            if($botaomodelo == "chinelo"){
                $modelo = 1;
            }
            elseif($botaomodelo == "chuteira"){
                $modelo = 2;
            }
            elseif($botaomodelo == "tenis"){
                $modelo = 3;
            }
            else{
                $modelo = 4;
            }
            
            
            $novo = new produto();
            $funcionario = new funcionario();
            $funcionario->setNome_funcionario($_SESSION['usuario']);
            $funcionario = $funcionario->findByName();
            
            $novo->setMarca_produto($botaomarca);
            $novo->setTamanho_produto($tamanho);
            $novo->setCor($cor);
            $novo->setQuantidade($quantidade);
            $novo->setGenero($genero);
            $novo->setCadastrante($funcionario[0]->id);
            $novo->setModelo($modelo);
            echo $novo->insereProduto();
            
        }
    
    ?>

</body>
</html>
