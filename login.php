<?php
$erro_login = 0;

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
                // ini_set('session.gc_maxlifetime', 3600);
                // session_set_cookie_params(3600);

                session_start();

                $_SESSION['id_usuario'] = $obj->id;
                $_SESSION['nome_usuario'] = $obj->nome;

                $result->close();
                if ($obj->id_org == 0) {
                    header("Location: ./home.php?sel=1");
                }
                else {
                    header("Location: connection/home.php");
                }
            }
            else {
                $erro_login = 1;
            }
        }
        else {
            $erro_login = 2;
        }
    }
    $conn->close();
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
                    <center>
                    <?php
                        if ($erro_login == 1) {
                            echo '<div id="erroLogin" class="card bg-danger text-white"><div class="card-body"><div class="erro_login">Senha incorreta. Digite novamente.</div></div></div>';
                        }
                        else if ($erro_login == 2) {
                            echo '<div id="erroLogin" class="card bg-danger text-white"><div class="card-body"><div class="erro_login">Email incorreto. Digite novamente.</div></div></div>';
                        }
                    ?>      
                    </center>                       
                    <div class="card">
                        <div class="card-body shadow">
                            <form id="formLog" action="#" method="post"> <!-- Redirecionamento depende de cada usuário, vai ter um header depois da verificação das credenciais -->
                                <div class="form-group">
                                    <label for="email" style="font-weight: bold;">Email</label><br>
                                    <input id="email" type="email" class="form-control shadow-sm bg-white" name="inputEmail" pattern=".{5,30}" autofocus required>
                                </div>
                                <div class="form-group">
                                    <div class="divrow">
                                        <label class="divsenha" style="font-weight: bold;">Senha</label>
                                        <div class="divesq">
                                            <a href="./esqueceu.php">Esqueceu a sua senha?</a>
                                        </div>
                                    </div>
                                    <input id="senha" type="password" class="form-control shadow-sm bg-white" name="inputSenha" pattern=".{5,30}" required>
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
            <div class="row float-right">
                <div class="footerCustom">
                    <span  id="foot" class="text-muted">©2018 UFSell</span>
                </div>
                <div class="footerCustom">
                    <a href="#">Termos de uso</a>
                </div>
                <div class="footerCustom">
                    <a href="#">Privacidade</a>
                </div>
            </div>
        </footer>        
    </body>
</html>

<script>
    // Trigger para alterar o tab de "Esqueceu a sua senha?" para Senha
			//Campo nome
			var x = document.getElementById('email');
			
			x.addEventListener("keydown",
			function(e) {
				//Verifica se o evento foi um enter
				if (e.keyCode == 9) {
					e.preventDefault();
					document.getElementById('senha').focus();
				}
			}
			);	    
</script>