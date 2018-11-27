<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Metas básicos -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Título e ícone da aba -->
        <title>IHC - MUDAR NOME E ICONE</title>
        <link rel="shortcut icon" type="image/png" href="img/pngtree-gray-man---machine-interaction-png-clipart_2906340.jpg">

        <!-- Importando bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <!-- Importando estilo css -->
        <link type="text/css" rel="stylesheet" href="css/cadastro.css">
    </head>
    <body class="site">
        <!-- Logo -->


        <!-- Main -->
        <main  class="wrap">
            <div class="site-row">
                <div class="site-column">
                    <form class="border border-dark rounded"> <!-- Redirecionamento depende de cada usuário, vai ter um header depois da verificação das credenciais -->
                        <div class="">                        
                            <label for="email" style="font-weight: bold;">Email</label><br><!-- Pattern -->
                            <input type="text" name="inputEmail" pattern=".{5,30}" required> <!-- Autofocus? -->
                        </div>
                        <div class="">
                            <div class="divrow">
                                <label class="divsenha" style="font-weight: bold;">Senha</label>
                                <div class="divesq">
                                    <a href="#">Esqueceu a sua senha?</a>
                                </div>
                            </div>
                            <input type="password" name="inputSenha" pattern=".{5,30}" required>
                        </div>
                        <br>
                        <div class="">
                            <button type="submit" class="btn btn-secondary">Entrar</button>
                        </div>
                    </form>

                    <div class="cardCad rounded">
                        <a href="./cadastro.php">Crie uma nova conta</a>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>