<?php
    
    session_start();
    
    include "classes/autenticar.php";
    
    if(isset($_POST['nome']) && isset($_POST['senha']) && $_POST['nome'] != "" && $_POST['senha'] != ""){
    
        extract($_POST);
        
        $_SESSION['usuario'] = filter_var($nome, FILTER_SANITIZE_STRING);
        $_SESSION['senha'] = $senha;
        
        $login = new autenticar();
        
        $login->setUsuario($_SESSION['usuario']);
        $login->setSenha($_SESSION['senha']);
        
        if($login->autenticarUsuario()){
            
            $_SESSION['status'] = TRUE;
            header('Location: gerente.php');
            die();
        }
        else{

            session_destroy();
            $msg = "Usuário e/ou senha inválidos!";

        }
    }
    else{
        
        if(isset($_SESSION['status'])){
            
            header('Location: gerente.php');
        }
    }

    
?>

<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/estilo.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Painel de Administração</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <section class="area-login">
            <div class="login">
                <form class="formulario" method="POST" action="login.php">
                    <div>
                        <img src="imagens/adm-logo">
                    </div>
                    <span class="titulo-form">
                        Bem -Vindo
                    </span>
                    <div class="entradas">
                        <span class="label-form">Usuário</span>
                        <input class="login2" type="text" name="nome" placeholder="Digite seu nome de usuário" autofocus required>
                        <span class="label-form">Senha</span>
                        <input class="login2" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>
                    <div class="recuperar">
                        <a href="https://fatec-php.000webhostapp.com/formulario_login/redefinir.html">Esqueci minha senha</a>
                    </div>
                    <?php
                        if(isset($msg)){
                            echo "<div class='msg'>$msg</div>";
                        }
                    ?>                    
                    <div class="botao">
                        <button class="parte-interna" type="submit">Logar</button>
                    </div>
                </form>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>
