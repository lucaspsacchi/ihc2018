<?php
$erro_login = 0;

if (isset($_POST['inputEmail']) && isset($_POST['inputSenha']) && isset($_POST['inputConfSenha'])) {

    include('connection/connection.php');

    if ($_POST['op2']) {
        echo 'OIE';
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
            <div class="container">
                <div class="col-8 col-md-8 col-sm-4 mx-auto">
                    <form id="formCad" class="border border-dark rounded" method="post">
                        <div class="row">
                            <div id="barravertical" class="col-6 col-md-6 col-sm-12">
                                <center>
                                    <div class="">
                                        <label class="divusuario" style="font-weight: bold;">Usuário</label>
                                    </div>
                                    <input type="text" name="inputUsuario" pattern=".{5,30}" required autofocus>
                                </center>                                   
                            </div>
                            <div class="col-6 col-md-6 col-sm-12">
                                <center>
                                    <div class="">
                                        <label for="email" style="font-weight: bold;">Email</label>
                                    </div>
                                    <input type="email" name="inputEmail" pattern=".{5,30}" autofocus required>
                                </center>
                            </div>                            
                        </div>
                        <div class="row">
                            <div id="barravertical" class="col-6 col-md-6 col-sm-12">
                                <center>
                                    <div class="">
                                        <label class="divsenha" style="font-weight: bold;">Senha</label>
                                    </div>
                                    <input type="password" name="inputSenha" pattern=".{5,30}" required>
                                </center>
                            </div>
                            <div class="col-6 col-md-6 col-sm-12">
                                <center>
                                    <div class="">
                                        <label class="divconfsenha" style="font-weight: bold;">Confirme a senha</label>
                                    </div>
                                    <input type="password" name="inputConfSenha" pattern=".{5,30}" required>
                                </center>   
                            </div>                            
                        </div>
                        <div class="row">
                            <div id="barravertical" class="col-6 col-md-6 col-sm-12">
                                <center>
                                    <div class="">
                                        <label class="divradio" style="font-weight: bold;">Quem é você?</label>
                                    </div>
                                    <input type="radio" name="op" id="op1" value="op1"> Comprador
                                    <input type="radio" name="op" id="op2" value="op2"> Vendedor
                                </center>
                            </div>
                            <div class="col-6 col-md-6 col-sm-12 align-self-center">
                                <center>
                                    <div class="botaocad">
                                        <button type="submit" class="btn btn-secondary">Salvar</button>
                                    </div>
                                </center>
                            </div>
                        </div>
                        <!-- Telefone e select aparecem depois que escolher comprador no radio-->
                        <div class="row">
                            <div id="barravertical" class="col-6 col-md-6 col-sm-12">
                                <center>
                                    <div class="">
                                        <label class="divtel" style="font-weight: bold;">Telefone</label>
                                    </div>
                                    <input type="text" name="inputTed" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" placeholder="(01) 2345-6789">
                                </center>
                            </div>
                            <div class="col-6 col-md-6 col-sm-12">
                                <center>
                                    <div class="">
                                        <label class="divcomp" style="font-weight: bold;">Escolha um opção abaixo</label>                                     
                                    </div>
                                    <select id="vouc">
                                        <option value="CABCC">Centro Acadêmico Ciência da Computação</option>
                                        <option value="ATBCC">Atlética Ciência da Computação</option>
                                    </select>
                                </center>   
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>
<script>
    $(document).ready(function(){
        if ($("#op2").prop("checked",true)) {

        }
    })    

</script>