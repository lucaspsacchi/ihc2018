<?php
$erro_login = 0;

if (isset($_POST['inputEmail']) && isset($_POST['inputSenha']) && isset($_POST['inputConfSenha'])) {

    include('connection/connection.php');

    // Recebe os dados submetidos
    $nome = $_POST['inputNome'];
    $email = $_POST['inputEmail'];
    $senha = addslashes($_POST['inputSenha']);
    $confsenha = addslashes($_POST['inputConfSenha']);
    $radio = $_POST['op'];
    // Campos que são do comprador
    $tel = $_POST['inputTel'];

    if ($tel == NULL) {
        echo 'ae';
    }
    else {
        echo 'ea';
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

        <!-- Importando bootstrap, Ajax e JQuery -->
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
            <!-- Logo -->
            <div class="logo">
                <a href="./login.php">
                    <img src="img/UFSell.png" alt="logo">
                </a>
            </div>
            <center>
                <div class="textoLogin">
                    <h4>Crie nova conta</h4>
                </div>
            </center>
            <br>                     
            <div class="container">
                <div class="col-8 col-md-8 col-sm-4 mx-auto">
                    <div class="card">
                        <div class="card-body shadow">                    
                            <form id="formCad" class="" method="post">
                                <div class="row">
                                    <div id="" class="col-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="divnome" style="font-weight: bold;">Nome</label>
                                            <input type="text" class="form-control shadow-sm" name="inputNome" pattern=".{5,30}" required autofocus>
                                        </div>                                
                                    </div>
                                    <div id="" class="col-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="divsobrenome" style="font-weight: bold;">Sobrenome</label>
                                            <input type="text" class="form-control shadow-sm bg-white" name="inputSobrenome" pattern=".{5,30}" required autofocus>
                                        </div>                                
                                    </div>                        
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="divemail" style="font-weight: bold;">Email</label>
                                            <input type="email" class="form-control shadow-sm bg-white" name="inputEmail" pattern=".{5,30}" required>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div id="" class="col-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="divsenha" style="font-weight: bold;">Senha</label>
                                            <input type="password" class="form-control shadow-sm bg-white" name="inputSenha" pattern=".{5,30}" required>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="divconfsenha" style="font-weight: bold;">Confirme a senha</label>
                                            <input type="password" class="form-control shadow-sm bg-white" name="inputConfSenha" pattern=".{5,30}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="" class="col-12 col-md-12 col-sm-12">
                                        <div class="">
                                            <label class="divradio" style="font-weight: bold;">Quem é você?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="" class="col-12 col-md-12 col-sm-12">                                
                                        <div class="float-left">
                                            <input type="radio" class="" name="op" id="op1" value="op1" checked><label>&nbspComprador</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="" class="col-12 col-md-12 col-sm-12">
                                        <div class="float-left">
                                            <input type="radio" class="" name="op" id="op2" value="op2"><label>&nbspVendedor</label>
                                        </div>
                                    </div>
                                </div>                                    
                                <!-- Telefone e select aparecem depois que escolher comprador no radio-->
                                <div id="box" class="row">
                                    <div id="" class="col-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="divtel" style="font-weight: bold;">Celular</label>
                                            <input type="text" class="form-control shadow-sm bg-white" name="inputTel" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" placeholder="(XX) XXXXX-XXXX">
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="divcomp" style="font-weight: bold;">Escolha um opção abaixo</label>                                     
                                            <select id="organizacao" class="custom-select">
                                                <option value="CABCC">Centro Acadêmico Ciência da Computação</option>
                                                <option value="ATBCC">Atlética Ciência da Computação</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-12 col-sm-12 align-self-center">
                                        <div id="cadSalvar" class="botaocad float-right">
                                            <!-- Botão para salvar -->
                                            <button type="submit" class="btn btn-success">
                                                Salvar
                                            </button>
                                        </div>
                                    </div>
                                </div>                              
                            </form>
                            
                                <!-- Modal -->
                                <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                Nova senha cadastrada com sucesso!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary">OK</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                 -->
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
// Ajax para exibir ou não os campos para preencher do vendedor
$(function() {
    $('input[name=op]').on('click init-post-format', function() {
        $('#box').toggle($('#op2').prop('checked'));
    }).trigger('init-post-format');
});
</script>