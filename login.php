<?php
$erro_login = 0;
session_start();

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

                $_SESSION['id_usuario'] = $obj->id;
                $_SESSION['nome_usuario'] = $obj->nome;

                $result->close();
                if ($obj->id_org == 1) {
                    header("Location: ./home.php?sel=1");
                }
                else {
                    $_SESSION['id_organizacao'] = $obj->id_org;
                    header("Location: vendedor/home.php");
                }
            }
            else {
                // $erro_login = 1;
                $_SESSION['alertaW'] = 'Senha incorreta. Digite novamente.';
            }
        }
        else {
            // $erro_login = 2;
            $_SESSION['alertaW'] = 'Email incorreto. Digite novamente.';
        }
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include 'includes/header-externo.php' ?>
        
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
                    <!-- <center>
                    <?php
                        // if ($erro_login == 1) {
                        //     echo '<div id="erroLogin" class="card bg-danger text-white"><div class="card-body"><div class="erro_login">Senha incorreta. Digite novamente.</div></div></div>';
                        // }
                        // else if ($erro_login == 2) {
                        //     echo '<div id="erroLogin" class="card bg-danger text-white"><div class="card-body"><div class="erro_login">Email incorreto. Digite novamente.</div></div></div>';
                        // }
                        // else if ($erro_login == 3) {
                        //     echo '<div id="erroLogin" class="card bg-danger text-white"><div class="card-body"><div class="erro_login">Insira seus dados novamente.</div></div></div>';
                        // }                        
                    ?>
                    </center> -->
                    <div class="card">
                        <div class="card-body shadow">
                            <form id="formLog" action="#" method="post"> <!-- Redirecionamento depende de cada usuário, vai ter um header depois da verificação das credenciais -->
                                <div class="form-group">
                                    <label for="email" style="font-weight: bold;">Email</label><br>
                                    <input id="email" type="email" class="form-control shadow-sm bg-white" name="inputEmail" placeholder="exemplo@exemplo.com" pattern=".{1,100}" autofocus required>
                                </div>
                                <div class="form-group">
                                    <div class="divrow">
                                        <label class="divsenha" style="font-weight: bold;">Senha</label>
                                        <div class="divesq">
                                            <a href="./esqueceu.php">Esqueceu a sua senha?</a>
                                        </div>
                                    </div>
                                    <input id="senha" type="password" class="form-control shadow-sm bg-white" name="inputSenha" placeholder="De 5 a 30 caracteres" pattern=".{5,30}" required>
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
        <?php include 'includes/footer.php'; ?>

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

<?php
if (isset($_SESSION['alertaW'])) {
    ?><script>
	$(document).ready(function() {
		swal({title:'<?php echo $_SESSION['alertaW'];?>',
			type: 'error'});
	})</script><?php
    unset($_SESSION['alertaW']);
}
?>

<?php
if (isset($_SESSION['alertaH'])) {
    ?><script>
    $(document).ready(function() {
        swal({type: 'success',
                text: '<?php echo $_SESSION['alertaH'];?>'});
    })
    </script><?php
    unset($_SESSION['alertaH']);
}
?>