<?php
session_start();
    
    if (!isset($_SESSION['usuario']) && !isset($_SESSION['status'])){
        
        header("Location: login.php");
        die();
    }

?>

<!doctype html>
<html lang="pt-br">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/gerente.css">
        <title>Bem vindo!</title>
        
    </head>
    <body>
        
        <?php
            date_default_timezone_set('America/Sao_Paulo');
        ?>
        <div class="container mt-3">
            <div class="area">
                <div class="conteudo">
                    <div class="mensagem">
                        <h2>Bem vindo <?php echo $_SESSION['usuario']?>, hoje é: <?php echo date('d/m/Y')?></h2>
                    </div>
                    <div class="mensagem">
                        <h2>Hora atual: <?php echo date('H:i')?></h2>
                    </div>
                    <div class="parte-cima">
                        <div class="botao">    
                            <a href="https://fatec-php.000webhostapp.com/formulario_login/cadastrar_funcionario.php" target="_blank" rel="noopener noreferrer"><button class="parte-interna">Cadastrar funcionários</button></a>
                        </div>
                       <div class="botao">
                            <a href="https://fatec-php.000webhostapp.com/formulario_login/tabela_funcionario.php" target="_blank" rel="noopener noreferrer"><button class="parte-interna">Visualizar funcionários</button></a>
                        </div>
                        <div class="botao">
                            <a href="https://fatec-php.000webhostapp.com/formulario_login/cadastrar_produto.php" target="_blank" rel="noopener noreferrer"><button class="parte-interna">Cadastrar produtos</button></a>
                        </div>
                    </div>
                    <div class="parte-baixo">
                        <div class="botao">
                            <a href="https://fatec-php.000webhostapp.com/formulario_login/tabela_produto.php" target="_blank" rel="noopener noreferrer"><button class="parte-interna">Visualizar produtos</button></a>
                        </div>
                        <div class="botao">
                            <a href="https://fatec-php.000webhostapp.com/formulario_login/desconectar.php"><button type="submit" class="parte-interna">Desconectar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        
    </body>
</html>