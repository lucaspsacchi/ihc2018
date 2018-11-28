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

                $obj = $result->fetch_object();
                $upd = "UPDATE `ihc`.`usuario`
                SET	`senha` = '".$senhaMD5."'
                WHERE email='".$email."';";               

                $result->close();
    
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
    <head>
        <!-- Metas básicos -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Título e ícone da aba -->
        <title>IHC - MUDAR NOME E ICONE</title>
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
        <main  class="wrap">
            <div class="logo">
                <img src="img/UFSell.png" alt="logo">
            </div>            
            <div class="site-row">
                <div class="site-column">
                    <form class="border border-dark rounded" method="post"> <!-- Redirecionamento depende de cada usuário, vai ter um header depois da verificação das credenciais -->
                        <div class="">
                            <label for="email" style="font-weight: bold;">Email</label><br>
                            <input type="email" name="inputEmail" pattern=".{5,30}" autofocus required>
                        </div>
                        <div class="">
                            <div class="divrow">
                                <label class="divsenha" style="font-weight: bold;">Senha</label>
                            </div>
                            <input type="password" name="inputSenha" pattern=".{5,30}" required>
                        </div>
                        <div class="">
                            <div class="divrow">
                                <label class="divconfsenha" style="font-weight: bold;">Confirme a senha</label>
                            </div>
                            <input type="password" name="inputConfSenha" pattern=".{5,30}" required>
                        </div>                        
                        <br>
                        <div class="erro">
<!-- FALTOU ALGUM BOTÃO DE VOLTAR -->
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-secondary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>    