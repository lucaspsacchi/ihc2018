<?php
include('connection/connection.php');

// ini_set('session.gc_maxlifetime', 3600);
// session_set_cookie_params(3600);
//Cria a sessão e verifica se o usuário está logado
session_start();
if (!isset($_SESSION['id_usuario']) && !isset($_SESSION['nome_usuario'])) {
    header("Location: ./login.php?erro_login=1"); // Se não está logado, retorna para a página de login com uma mensagem de erro
}

// Busca as informações do usuário
$script =   "SELECT nome, sobrenome, email, tel FROM usuario WHERE id='".$_SESSION['id_usuario']."';"; // Retorna os dados necessários do usuário

$result = $conn->query($script);
$pessoa = $result->fetch_object();


if (isset($_POST['inputNome']))
{
	$nome = $_POST['inputNome'];
	$query = "SELECT nome FROM `usuario` WHERE `id`='".$_SESSION['id_usuario']."';";
	$result = $conn->query($query);
	$row = $result->fetch_object();
	if ($nome != $row->nome)
	{
		$query = "UPDATE usuario SET "
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

        <!-- Importando bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="js/confSenha.js"></script>
       <!--
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Importando estilo css -->
        <link type="text/css"  rel="stylesheet" href="./css/comprador.css">
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0">
            <div class="flexCustom d-flex justify-content-start">
                <div class="col-2 col-xl-2 col-lg-2 col-md-2">
                    <div class="d-flex flex-row">
                        <a href="./home.php?sel=1"><img id="navLogo" src="img/UFSell.png" alt="logo"></a>
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
		<div id="defCol" class="col-12 col-xl-12 col-lg-12 col-md-12">
                <div id="defRow" class="row">
					<!-- Barra lateral -->
                    <div id="menu" class="col-2 col-xl-2 col-lg-2 col-md-2">
						<div class="divWrap">
							<div id="btn-itemP" class="menuT">
								<!-- Título do collapse --><!-- Concatenar o at com id -->
								<button class="btn btn-light" data-toggle="collapse" data-target=".multi-collapse1" aria-expanded="true" aria-controls="at1 at2 at3 at4 at5 at6">Atléticas</button>
								<!-- Elementos do collapse -->
								<div class="">
									<div class="collapse multi-collapse1" id="at1">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Atlética ECAD">Atlética ECAD</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse1" id="at2">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Atlética UFSCar Sorocaba">Atlética UFSCar Sorocaba</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse1" id="at3">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Atlética XXV de Maio">Atlética XXV de Maio</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse1" id="at4">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Atlética Raça Brisão">Atlética Raça Brisão</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse1" id="at5">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Atlética DFQM">Atlética DFQM</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse1" id="at6">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Atlética Lumberjack">Atlética Lumberjack</a>
									</div>
								</div>							
							</div>
							<div class="menuT">
								<!-- Título do collapse --><!-- Concatenar o at com id -->
								<button class="btn btn-light" data-toggle="collapse" data-target=".multi-collapse2" aria-expanded="true" aria-controls="ca1 ca2 ca3 ca4 ca5 ca6 ca7">Centros Acadêmicos</button>
								<!-- Elementos do collapse -->
								<div class="">
									<div class="collapse multi-collapse2" id="ca1">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Toca da Onça">CA Toca da Onça</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse2" id="ca2">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=CACCS">CACCS</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse2" id="ca3">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Cageos">Cageos</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse2" id="ca4">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Caped">Caped</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse2" id="ca5">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Caeps">Caeps</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse2" id="ca6">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=CAEF">CAEF</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse2" id="ca7">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=CACTUS">CACTUS</a>
									</div>
								</div>																																			
							</div>
							<div class="menuT">
								<!-- Título do collapse --><!-- Concatenar o at com id -->
								<button class="btn btn-light" data-toggle="collapse" data-target=".multi-collapse3" aria-expanded="true" aria-controls="en1 en2 en3">Entidades</button>
								<!-- Elementos do collapse -->
								<div class="">
									<div class="collapse multi-collapse3" id="en1">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Share">Share</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse3" id="en2">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Enactus">Enactus</a>
									</div>
								</div>							
								<div class="">
									<div class="collapse multi-collapse3" id="en3">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=ABU">ABU</a>
									</div>
								</div>										
							</div>
							<div class="menuT">
								<!-- Título do collapse --><!-- Concatenar o at com id -->
								<button class="btn btn-light" data-toggle="collapse" data-target=".multi-collapse4" aria-expanded="true" aria-controls="c1 c2 c3 c4 c5 c6 c7 c8 c9 c10 c11 c12">Cursos</button>
								<!-- Elementos do collapse -->
								<div class="">
									<div class="collapse multi-collapse4" id="c1">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Administração">Administração</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c2">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Ciências Biológicas">Ciências Biológicas</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c3">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Ciência de Computação">Ciência da Computação</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c4">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Ciências Econômicas">Ciências Econômicas</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c5">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Engenharia de Produção">Engenharia de Produção</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c6">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Engenharia Florestal">Engenharia Florestal</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c7">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Física">Física</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c8">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Geografia">Geografia</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c9">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Matemática">Matemática</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c10">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Pedagogia">Pedagogia</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c11">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Química">Química</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c12">
										<a id="subitem" class="btn btn-light" href="busca.php?busca=Turismo">Turismo</a>
									</div>
								</div>
							</div>
						</div>
						<div class="hrFooter">
							<hr>
						</div>
						<div class="footer">
							<div class="row">
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
				<div id="conteudo" class="col-10 col-xl-10 col-lg-10 col-md-10">
					<!-- Bread Crumb -->
					<nav aria-label="breadcrumb" style="margin-top:5px; margin-left:-15px;">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="./home.php?sel=1">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Minha conta</li>
						</ol>
					</nav>
					
					<!-- Formulário -->
					<form id="formCad" class="" method="post">
						<div class="colD d-flex justify-content-start">
							<div class="col-6 col-xl-6 col-lg-6 col-md-6">
								<div id="cardAlterar" class="">
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label class="divnome" style="font-weight: bold;">Nome</label>
													<input type="text" class="form-control shadow-sm" value="<?php echo $pessoa->nome; ?>" name="inputNome" pattern=".{5,30}" required autofocus>
												</div>                              
											</div>                    
										</div>
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label class="divsobrenome" style="font-weight: bold;">Sobrenome</label>
													<input type="text" class="form-control shadow-sm" value="<?php echo $pessoa->sobrenome; ?>" name="inputSobrenome" pattern=".{5,30}" required>
												</div>
											</div>
										</div> 
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label class="divemail" style="font-weight: bold;">Email</label>
													<input type="email" class="form-control shadow-sm" value="<?php echo $pessoa->email; ?>" name="inputEmail" pattern=".{5,30}" required>
												</div>
											</div>
										</div>                                
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label class="divsenha" style="font-weight: bold;">Senha</label>
													<input type="password" class="form-control shadow-sm" id="inputSenha" placeholder="Alterar senha" name="inputSenha" pattern=".{5,30}" required>
												</div>
											</div>	
										</div>
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label class="divsenha" style="font-weight: bold;">Confirmar senha</label>
													<input type="password" class="form-control shadow-sm" data-toggle="popover" id="inputConfSenha" title="As senhas precisam ser iguais" placeholder="Confirme a nova senha" name="inputConfSenha" pattern=".{5,30}" required>
												</div>
											</div>	
										</div>
								</div>
							</div>	
							<div class="col-1 col-xl-1 col-lg-1 col-md-1" style="border-right: 1px solid; margin-top:10px; border-color:#b9c0bd;"></div>
							<div class="col-1 col-xl-1 col-lg-1 col-md-1"></div>
							<div class="col-4 col-xl-4 col-lg-4 col-md-4">
								<label style="font-weight: bold; margin-top:10px;">
									Você tem interesse em produtos de quais cursos?
								</label>
								<div class="form-group">
									<div class="form-check">
										<input type="checkbox" class="form-check-input">
										<label class="form-check-label">Administração</label><br>
										<input type="checkbox" class="form-check-input">
										<label class="form-check-label">Ciências Biológicas</label><br>
										<input type="checkbox" class="form-check-input">
										<label class="form-check-label">Ciência da Computação</label><br>
										<input type="checkbox" class="form-check-input">
										<label class="form-check-label">Ciências Economicas</label><br>
										<input type="checkbox" class="form-check-input">
										<label class="form-check-label">Engenharia de Produção</label><br>
										<input type="checkbox" class="form-check-input">
										<label class="form-check-label">Engenharia Florestal</label><br>
										<input type="checkbox" class="form-check-input">
										<label class="form-check-label">Física</label><br>
										<input type="checkbox" class="form-check-input">
										<label class="form-check-label">Geografia</label><br>		
										<input type="checkbox" class="form-check-input">
										<label class="form-check-label">Matemática</label><br>
										<input type="checkbox" class="form-check-input">
										<label class="form-check-label">Pedagogia</label><br>
										<input type="checkbox" class="form-check-input">
										<label class="form-check-label">Química</label><br>
										<input type="checkbox" class="form-check-input">
										<label class="form-check-label">Turismo</label><br>																										
									</div>								
								</div>
								<br>
								<label>
									Deseja receber emails novos anuncios?
								</label><br>
								<input type="radio" value="Sim"> Sim<br>
								<input type="radio" value="Não"> Não<br>
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
		</div>
    </body>
</html>