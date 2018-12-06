<?php
$erro_login = 0;

if (isset($_POST['inputEmail']) && isset($_POST['inputSenha']) && isset($_POST['inputConfSenha'])) {

    include('connection/connection.php');

    // Recebe os dados submetidos
    $nome = $_POST['inputNome'];
    $email = $_POST['inputEmail'];
    $senha = addslashes($_POST['inputSenha']);
    $senhaMD5 = MD5($senha);
    $radio = $_POST['op'];
    $org = $_POST['organizacao'];
    // Campos que são do comprador
    $tel = $_POST['inputTel'];

    if ($radio == 'op1')
    {
        // Insere um usuário comprador com as colunas id_org e tel inicializadas como n/a (not available)
        $ins = "INSERT INTO usuario (nome, email, senha, id_org, tel) VALUES('".$nome."',
        '".$email."', '".$senhaMD5."', 0, 'n/a')";

        mysqli_query($conn, $ins);
    }
    elseif ($radio == 'op2')
    {
        $result = mysqli_query($conn, "SELECT id FROM org WHERE nome='".$org."'");
        $row = $result->fetch_assoc();
        $id_org = $row['id'];
        // Insere um usuário vendedor com todos os campos preenchidos (obrigatoriamente)
        $ins  = $ins = "INSERT INTO usuario (nome, email, senha, id_org, tel) VALUES('".$nome."',
        '".$email."', '".$senhaMD5."', $id_org, '".$tel."')";

        mysqli_query($conn, $ins);
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
                    <h4>Crie nova conta</h4>
                </div>
            </center>
            <br>
            <div class="container">
                <div class="col-8 col-md-8 col-sm-4 mx-auto">
                    <div class="card">
                        <div class="card-body shadow">
                            <form id="formCad" name="formCad" method="post">
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
                                            <input type="text" class="form-control shadow-sm bg-white" name="inputSobrenome" pattern=".{5,30}" required>
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
                                            <input  type="password" class="form-control shadow-sm bg-white" id="inputSenha" name="inputSenha" pattern=".{5,30}" required>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="divconfsenha" style="font-weight: bold;">Confirme a senha</label>
                                            <input type="password" data-toggle="popover" title="As senhas precisam ser iguais" class="form-control shadow-sm bg-white" id="inputConfSenha"  name="inputConfSenha" pattern=".{5,30}" required>
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
                                            <input type="text" class="form-control shadow-sm bg-white" name="inputTel" pattern="\([0-9]{2}\) ?[0-9]{4,6}-[0-9]{3,4}$" placeholder="(XX) XXXXX-XXXX">
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="divcomp" style="font-weight: bold;">Escolha um opção abaixo</label>
                                            <select name="organizacao" id="organizacao" class="custom-select">
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
                                            <button type="button" class="btn btn-success" onClick="validarSenha()">
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
            <div class="text-right">
                <span  id="foot" class="text-muted">©2018 UFSell&nbsp&nbsp</span>
                <a href="#">Termos de uso&nbsp&nbsp</a>
                <a href="#">Privacidade</a>
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

// Confirmar senha

    // function validarSenha() {
    //     senha = document.getElementById('senhajs').value;
    //     conf = document.getElementById('confjs').value;
    //     if(senha != conf) {
    //         alert('Senhas não batem');
    //     }
    //     else {
    //         alert('passou?');
    //         document.getElementById('formCad').submit();
    //     }
    // }
</script>
