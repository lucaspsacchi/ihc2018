<?php
if (isset($_SESSION['erro'])) {
    echo 'ENTROUU';
}

if (isset($_POST['inputEmail']) && isset($_POST['inputSenha'])) {

    include('connection/connection.php');

    $email = addslashes($_POST['inputEmail']);
    $senha = addslashes($_POST['inputSenha']);
    

    // Verifica se existe aquele email e a senha é a mesma do bd
    $script =   "SELECT *
                FROM usuario
                WHERE email='".$email."';";
    // Se encontrou algum resultado com os valores informados
    if ($result = $conn->query($script)) {
        if ($result->num_rows > 0) {
            $obj = $result->fetch_object();
            if ($obj->senha == MD5($senha)) {
                // Permissão concedida

                // Configurações de session
                ini_set('session.gc_maxlifetime', 3600);
                session_set_cookie_params(3600);

                session_start();            

                $result->close();

                header("Location: ./home.php");
            }
            else {
                $_SESSION['erro'] = 'Senha incorreta';
            }
        }
        else {
            $_SESSION['erro'] = 'Email incorreto';
        }

    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Metas básicos -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Título e ícone da aba -->
        <title>UFSell</title>
        <link rel="shortcut icon" type="image/png" href="img/UFSell.png">

        <!-- Importando bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <!-- Importando estilo css -->
        <link type="text/css" rel="stylesheet" href="css/cadastro.css">
    </head>
    <body class="site">

        <!-- Main -->
        <main class="wrap">
            <!-- Logo -->
            <div class="logo">
                <a href="./login.php">
                    <img src="img/UFSell.png" alt="logo">
                </a>
            </div>
            <center>
                <div class="textoLogin">
                    <h4>Acesse a sua conta</h4>
                </div>
            </center>
            <br>
            <div class="site-row">
                <div class="site-column">
                    <div class="card">
                        <div class="card-body shadow">
                            <form id="formLog" action="#" method="post"> <!-- Redirecionamento depende de cada usuário, vai ter um header depois da verificação das credenciais -->
                                <div class="form-group">
                                    <label for="email" style="font-weight: bold;">Email</label><br>
                                    <input type="email" class="form-control shadow-sm bg-white" name="inputEmail" pattern=".{5,30}" autofocus required>
                                </div>
                                <div class="form-group">
                                    <div class="divrow">
                                        <label class="divsenha" style="font-weight: bold;">Senha</label>
                                        <div class="divesq">
                                            <a href="./esqueceu.php">Esqueceu a sua senha?</a>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control shadow-sm bg-white" name="inputSenha" pattern=".{5,30}" required>
                                </div>
                                <br>
                                <div class="">
                                    <button type="submit" class="btn btn-success">Entrar</button>
                                </div>
                                <hr>
                                <div class="">
                                    <label>Não possui conta?&nbsp</label>
                                    <a href="./cadastro.php">Cadastre-se</a>.                     
                                </div>   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer -->
        <footer class="card-footer">
            <div class="text-right">
                <span  id="foot" class="text-muted">©2018 UFSell&nbsp&nbsp</span>
                <a href="#">Termos de uso&nbsp&nbsp</a>
                <a href="#">Privacidade</a>
            </div>
        </footer>        
    </body>
</html>