<?php
session_start();
    
    if (!isset($_SESSION['usuario']) && !isset($_SESSION['status'])){
        
        header("Location: login.php");
        die();
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
      <title>Tabela de produtos</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    
    <body>
    
        <div class="container mt-3">
          <h2>Produtos</h2>
          
        <?php
            include 'classes/produto.php';
            include 'classes/funcionario.php';
            $produtos = new produto();
            $lista = $produtos->findAll();
        ?>
        
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Marca</th>
                <th>Tamanho</th>
                <th>Quantidade</th>
                <th>Cor</th>
                <th>Gênero</th>
                <th>Cadastrante</th>
                <th>Modelo</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lista as $key => $value) {
                    
                    $funcionario = new funcionario();
                    $funcionario->setID_funcionario($value->cadastrante);
                    $cadastrante = $funcionario->findbyId();
                    
                    if ($value->modelo == 1){
                        $modelo = "Chinelo";
                    }
                    elseif($value->modelo == 2){
                        $modelo = "Chuteira";
                    }
                    elseif($value->modelo == 3){
                        $modelo = "Tênis";
                    }
                    else{
                        $modelo = "Sapatênis";
                    }
                    
                    echo "<tr>";
                        echo "<td> $value->marca </td>";
                    	echo "<td> $value->tamanho </td>";
                    	echo "<td> $value->quantidade </td>";
                    	echo "<td> $value->cor </td>";
                    	echo "<td> $value->genero </td>";
                    	echo "<td> " . $cadastrante['0']->nome . " </td>";
                    	echo "<td> $modelo </td>";
                    	echo "<td><a href=editar_produto.php?id=" . $value->id . ">Editar</a>/<a href=excluir_produto.php?id=". $value->id . ">Excluir</a></td>";
                	echo "</tr>";
                }
                ?>
            </tbody>
          </table>
        </div>
    
    </body>
</html>
