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
      <title>Tabela de funcionários</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    
    <body>
    
        <div class="container mt-3">
          <h2>Funcionários</h2>
          
        <?php
            include 'classes/funcionario.php';
            $usuario = new funcionario();
            $lista = $usuario->findAll();
        ?>
        
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Status</th>
                <th>Idade</th>
                <th>Cargo</th>
                <th>Data de admissão</th>
                <th>Telefone</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lista as $key => $value) {
                    
                    if ($value->cargo == 1){
                        $cargo = "Gerente";
                    }
                    elseif($value->cargo == 2){
                        $cargo = "Funcionário";
                    }
                    else{
                        $cargo = "Menor Aprendiz";
                    }
                    
                    echo "<tr>";
                        echo "<td> $value->nome </td>";
                        echo "<td> $value->status</td>";
                    	echo "<td> $value->idade </td>";
                    	echo "<td> $cargo </td>";
                    	echo "<td> $value->data_adm </td>";
                    	echo "<td> $value->telefone </td>";
                    	echo "<td><a href=editar_funcionario.php?id=" . $value->id . ">Editar</a>/<a href=excluir_funcionario.php?id=". $value->id . ">Excluir</a></td>";
                	echo "</tr>";
                }
                ?>
            </tbody>
          </table>
        </div>
    
    </body>
</html>