<?php require 'includes/login.php' ?>

<!DOCTYPE html>
<html lang="pt-br">

    <!--Header-->
    <?php include 'includes/header2.php' ?>


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
