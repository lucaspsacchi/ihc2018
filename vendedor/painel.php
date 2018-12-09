<?php
include('../connection/connection.php');

// ini_set('session.gc_maxlifetime', 3600);
// session_set_cookie_params(3600);
//Cria a sessão e verifica se o usuário está logado
session_start();
if (!isset($_SESSION['id_usuario']) && !isset($_SESSION['nome_usuario'])) {
    header("Location: ../login.php?erro_login=3"); // Se não está logado, retorna para a página de login com uma mensagem de erro
}

// Quantidade de pessoas por organização
$script = "SELECT count(id) as c
            FROM usuario
            WHERE id_org = '".$_SESSION['id_organizacao']."'";
$count = $conn->query($script);
$qtP = $count->fetch_object();

// Quantidade de anúncios por organização
$script = "SELECT count(id) as c
            FROM prod
            WHERE id_org = '".$_SESSION['id_organizacao']."'";
$count = $conn->query($script);
$qtA = $count->fetch_object();

// Quantidade dos mais bem avaliados (mais que 4)
$script = "SELECT count(id) as c
            FROM prod
            WHERE id_org = '".$_SESSION['id_organizacao']."' and aval >= 4";
$count = $conn->query($script);
$qt4 = $count->fetch_object();

// Pessoas relacionadas a aquela organização
$script = "SELECT *
            FROM usuario
            WHERE id_org = '".$_SESSION['id_organizacao']."'
            ORDER BY nome ASC";
$tabela = $conn->query($script);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Metas básicos -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Título e ícone da aba -->
        <title>UFSell</title>
        <link rel="shortcut icon" type="image/png" href="../img/UFSell.png">

        <!-- Importando bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
       <!--
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        -->
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		

        <!-- Importando estilo css -->
        <link type="text/css" rel="stylesheet" href="../css/comprador.css">
        <link type="text/css" rel="stylesheet" href="../css/vendedor.css">
    </head>

    <body>
        <!-- Navbar -->
        <?php include '../includes/nav-vend.php';  ?>
        <!-- Estruturação da página -->
		<div id="defCol" class="col-12 col-md-12">
                <div id="defRow" class="row">
                    
					<!-- Barra lateral -->
                    <?php include '../includes/menu-vend.php'; ?>

                    <!-- Main -->
                    <div id="conteudo" class="col-10 col-md-10">
						<!-- Bread Crumb -->
						<nav aria-label="breadcrumb" style="margin-top:5px; margin-left: -15px;">
							<ol class="breadcrumb">
							    <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
							    <li class="breadcrumb-item active" aria-current="page">Painel de controle</li>
							</ol>
						</nav>


						<div class="colD">
							<div class="row" style="margin-top: 30px;">
                                <div class="col-12 col-md-12">
                                    <div class="d-flex justify-content-around">
                                        <div class="card" style="background: linear-gradient(#2395a9, #4dc5da, #80d6e5); border: none;">
                                            <div class="card-body" style="width: 250px;">
                                                <center>
                                                    <i class="fas fa-users fa-4x"></i>
                                                    <h3 style="margin-top: 10px;"><?php echo $qtP->c?> membros</h3>
                                                    <h3>cadastrados</h3>
                                                    <h3>no UFSell</h3>
                                                </center>
                                            </div>
                                        </div>
                                        <div class="card" style="background: linear-gradient(#2395a9, #4dc5da, #80d6e5); border: none;">
                                            <div class="card-body" style="width: 250px;">
                                                <center>
                                                    <i class="fas fa-tags fa-4x"></i>
                                                    <h3 style="margin-top: 10px;"><?php echo $qtA->c?> anúncios</h3>
                                                    <h3>cadastrados</h3>
                                                    <h3>no UFSell</h3>
                                                </center>
                                            </div>
                                        </div>
                                        <div class="card" style="background: linear-gradient(#2395a9, #4dc5da, #80d6e5); border: none;">
                                            <div class="card-body" style="width: 250px;">
                                                <center>
                                                    <i class="fas fa-heart fa-4x"></i>
                                                    <h3 style="margin-top: 10px;"><?php echo $qt4->c?> anúncios</h3>
                                                    <h3>com mais de</h3>
                                                    <h3>4 estrelas</h3>
                                                </center>                                            
                                            </div>
                                        </div>  
                                    </div>
                                </div>
							</div>
                            <br>
                            <div class="row" style="margin-left: 10px; margin-right: 0px; margin-top: 30px;">
                                <div class="col-12">
                                    <div class="d-flex justify-content-around">
                                        <div class="col-6">
                                            <img src="../img/anunciospormes.png" alt="graficos" width="450" height="280"> 
                                        </div>
                                        <div class="col-6">
                                            <img src="../img/totalanuncios.png" alt="graficos" width="450" height="280"> 
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row" style="margin-left: 25px; margin-right: 25px; margin-top: 30px; margin-bottom: 40px;">
                                <div class="col-12">
                                    <div class="d-flex justify-content-center">
                                        <table>
                                            <tr>
                                                <th style="margin-right: 15px;">Nome Completo</th>
                                                <th>Email</th>
                                                <th>Telefone</th>
                                                <th>Data de Cadastro</th>
                                            </tr>
                                            <?php
                                            while ($row = $tabela->fetch_object()) {?>
                                            <tr>
                                                <td><?php echo $row->nome; ?>&nbsp<?php echo $row->sobrenome; ?></td>
                                                <td><?php echo $row->email; ?></td>
                                                <td><?php echo $row->tel; ?></td>
                                                <td><?php echo $row->mes; ?>/<?php echo $row->ano; ?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
						</div>
                    </div>
                </div>
            </div>

    </body>
</html>
