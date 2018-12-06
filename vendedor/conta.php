<?php
include('../connection/connection.php');

// ini_set('session.gc_maxlifetime', 3600);
// session_set_cookie_params(3600);
//Cria a sessão e verifica se o usuário está logado
session_start();
if (!isset($_SESSION['id_usuario']) && !isset($_SESSION['nome_usuario'])) {
    header("Location: ../login.php?erro_login=1"); // Se não está logado, retorna para a página de login com uma mensagem de erro
}

// Busca as informações do produto
$script =   "SELECT *
FROM usuario
WHERE id='".$_SESSION['id_usuario']."';";

$result = $conn->query($script);
$pessoa = $result->fetch_object();

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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		

        <!-- Importando estilo css -->
        <link type="text/css" rel="stylesheet" href="../css/comprador.css">
        <link type="text/css" rel="stylesheet" hred="../css/vendedor.css">
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0">
            <div class="flexCustom d-flex justify-content-start">
                <div class="col-2 col-xl-2 col-lg-2 col-md-2">
                    <div class="d-flex flex-row">
                        <a href="./home.php"><img id="navLogo" src="../img/UFSell.png" alt="logo"></a>
                        <span class="spanUfs align-self-center">UFSell</span>
                    </div>
                </div>
                <div class="col-10 col-xl-10 col-lg-10 col-md-10">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex justify-content-start">
                            <form action="./busca.php" method="get" id="formBusca">
								<input id="inputNav" class="form-control form-control-dark" name="busca" placeholder="Pesquisar no UFSell" type="text" aria-label="Search">
							</form>
							<button class="btn btn-outline-light" form="formBusca" type="submit">Buscar</button>
                        </div>
                        <div class="d-flex justify-content-end" style="margin-top: 15px;">
                            <div id="nav-itemP" class="nav-item">
                                <a href="./conta.php">Minha conta</a>
                            </div>
                            <div class="nav-item">
                                <a class="" href="./sair.php">Sair</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>    
        <!-- Estruturação da página -->
		<div id="defCol" class="col-12 col-md-12">
                <div id="defRow" class="row">
                    
					<!-- Barra lateral -->
                    <div id="menu" class="col-2 col-md-2" style="padding-left:0px;">
						<div class="divWrap">                           
                            <div id="btn-itemP" class="d-flex justify-content-center">
                                <a class="btn btn-light btnBorder" href="./adicionar.php">Criar anúncio</a>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-light btnBorder" href="./painel.php">Painel de Controle</a>
                            </div>
                        </div>
                        
						<div class="footer">
                            <div class="hrFooter">
                                <hr>
                            </div>
							<div id="textFooter" class="row">
								<a href="#">Termos de uso</a>
								<label style="color: #6c706e;">&nbsp&middot&nbsp</label>
								<a href="#">Privacidade</a>
							</div>
							<div class="row" style="margin-bottom: 30px;">
								<span id="foot" class="text-muted">©2018 UFSell</span>
							</div>							
						</div>
                    </div>

                    <!-- Main -->
                    <div id="conteudo" class="col-10 col-md-10">
						<!-- Bread Crumb -->
						<nav aria-label="breadcrumb" style="margin-top:5px; margin-left: -15px;">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./home.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Minha conta</li>
							</ol>
						</nav>


						<!-- Formulário -->
					<form id="formCad" class="" method="post">
						<div class="colD d-flex justify-content-start">
							<div class="col-12 col-xl-12 col-lg-12 col-md-12">
								<div id="cardAlterar" class="">
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label class="divnome" style="font-weight: bold;">Nome</label>
												<input type="text" class="form-control shadow-sm" value="<?php echo $pessoa->nome; ?>" name="inputNome" pattern=".{5,30}" required autofocus>
											</div>                              
										</div>
										<div class="col-6">
											<div class="form-group">
												<label class="divsobrenome" style="font-weight: bold;">Sobrenome</label>
												<input type="text" class="form-control shadow-sm" value="<?php echo $pessoa->sobrenome; ?>" name="inputSobrenome" pattern=".{5,30}" required>
											</div>
										</div>
									</div> 
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label class="divsenha" style="font-weight: bold;">Senha</label>
												<input type="password" class="form-control shadow-sm" value="12345678" name="inputSenha" pattern=".{5,30}" required>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label class="divsenha" style="font-weight: bold;">Confirmar senha</label>
												<input type="password" class="form-control shadow-sm" value="12345678" name="inputConfSenha" pattern=".{5,30}" required>
											</div>
										</div>										
									</div>
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label class="divemail" style="font-weight: bold;">Email</label>
												<input type="email" class="form-control shadow-sm" value="<?php echo $pessoa->email; ?>" name="inputEmail" pattern=".{5,30}" required>
											</div>
										</div>										
										<div class="col-6">
											<div class="form-group">
												<label class="divtel" style="font-weight: bold;">Celular</label>
												<input type="text" class="form-control shadow-sm bg-white" value="<?php echo $pessoa->tel; ?>" name="inputTel" pattern="\([0-9]{2}\) ?[0-9]{4,6}-[0-9]{3,4}$" placeholder="(XX) XXXXX-XXXX">
											</div>
										</div>
									</div>
								</div>
							</div>											
						</div>
						<br>
						<div class="row">
							<div class="col-12">
								<div id="cadSalvar" class="botaocad float-right">
									<!-- Botão para salvar -->
									<button type="submit" class="btn btn-success">
										Salvar
									</button>
								</div>
							</div>
						</div>
					</form>

                </div>
            </div>

    </body>
</html>
