<?php
$erro_login = 0;

if (isset($_POST['inputEmail']) && isset($_POST['inputSenha']) && isset($_POST['inputConfSenha'])) {

    include('connection/connection.php');

    $email = addslashes($_POST['inputEmail']);
    $senha = addslashes($_POST['inputSenha']);
    $confsenha = addslashes($_POST['inputConfSenha']);

    // Caso as senhas sejam iguais
    if ($senha == $confsenha) {
        // Verifica se existe aquele email
        $script =   "SELECT *
                    FROM usuario
                    WHERE email='".$email."';";
        // Salva a nova senha no bd
        if ($result = $conn->query($script)) {
            if ($result->num_rows > 0) {

                // Criptografa com MD5
                $senhaMD5 = MD5($senha);

                //$obj = $result->fetch_object();
                // Script para fazer update
                $upd = "UPDATE `ihc`.`usuario`
                SET	`senha` = '".$senhaMD5."'
                WHERE email='".$email."';";

                // Faz o update no bd
                mysqli_query($conn, $upd);

                $result->close();
                // Redireciona para a tela de login
                header("Location: ./login.php");
            } else { // Não encontrou aquele email
                $erro_login = 1;
            }
        }
    }
    else { // Senhas informadas não são equivalentes
        $erro_login = 1;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

    <!--Header-->
    <?php include 'includes/header2.php' ?>


    <body class="site">

        <!-- Main -->
        <main  class="wrap">
            <!-- Logo -->
            <div class="logo">
                <a href="./login.php">
                    <img src="img/UFSell.png" alt="logo">
                </a>
            </div>
            <center>
                <div class="textoLogin">
                    <h4>Esqueceu a senha</h4>
                </div>
            </center>
            <br>
            <div class="site-row">
                <div class="site-column">
                    <div class="card">
                        <div class="card-body shadow">
                            <form id="formLog" method="post"> <!-- Redirecionamento depende de cada usuário, vai ter um header depois da verificação das credenciais -->
                                <div class="form-group">
                                    <label for="email" style="font-weight: bold;">Email</label><br>
                                    <input type="email" class="form-control shadow-sm bg-white" name="inputEmail" pattern=".{5,30}" autofocus required>
                                </div>
                                <div class="form-group">
                                    <div class="divrow">
                                        <label class="divsenha" style="font-weight: bold;">Nova senha</label>
                                    </div>
                                    <input type="password" class="form-control shadow-sm bg-white" name="inputSenha" pattern=".{5,30}" required>
                                </div>
                                <div class="form-group">
                                    <div class="divrow">
                                        <label class="divconfsenha" style="font-weight: bold;">Confirme a senha</label>
                                    </div>
                                    <input type="password" id="pass" class="form-control shadow-sm bg-white" name="inputConfSenha" pattern=".{5,30}" required>
                                </div>
                                <br>
                                <div class="erro">
                                </div>
                                <div class="">
                                    <!-- Confirmação da nova senha -->
                                    <button id="salvar" type="submit" class="btn btn-success">
                                    Salvar
                                    </button>
                                    <!-- <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                    Salvar
                                    </button>                                     -->
                                </div>

                                <!-- Modal -->
                                <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                Nova senha cadastrada com sucesso!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">OK</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                 -->
                            </form>
                            <hr>
                            <center><label>Voltar para <a href="./login.php">login</a></label></center>
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
    // Trigger para alterar o tab para Salvar
			//Campo nome
			var x = document.getElementById('pass');

			x.addEventListener("keydown",
			function(e) {
				//Verifica se o evento foi um enter
				if (e.keyCode == 9) {
					e.preventDefault();
					document.getElementById('salvar').focus();
				}
			}
			);
</script>
