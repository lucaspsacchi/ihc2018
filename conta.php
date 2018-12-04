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
$script =   "SELECT *
FROM usuario
WHERE id='".$_SESSION['id_usuario']."';";

$result = $conn->query($script);
$pessoa = $result->fetch_object();

// No alterar, verifica a senha retornada do bd com a senha informada do usuário, está como padrão no html que é 12345678


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
                        <a href="./home.php"><img id="navLogo" src="img/UFSell.png" alt="logo"></a>
                        <span class="spanUfs align-self-center">UFSell</span>
                    </div>
                </div>
                <div class="col-10 col-xl-10 col-lg-10 col-md-10">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex justify-content-start">
                            <input id="inputNav" class="form-control form-control-dark" placeholder="Pesquisar no UFSell" type="text" aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Buscar</button>
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
									<button id="subitem" class="btn btn-light">Atlética ECAD</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse1" id="at2">
									<button id="subitem" class="btn btn-light">Atlética UFSCar Sorocaba</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse1" id="at3">
									<button id="subitem" class="btn btn-light">Atlética XXV de Maio</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse1" id="at4">
									<button id="subitem" class="btn btn-light">Atlética Raça Brisão</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse1" id="at5">
									<button id="subitem" class="btn btn-light">Atlética DFQM</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse1" id="at6">
									<button id="subitem" class="btn btn-light">Atlética Lumberjack</button>
								</div>
							</div>							
						</div>
						<div class="menuT">
							<!-- Título do collapse --><!-- Concatenar o at com id -->
							<button class="btn btn-light" data-toggle="collapse" data-target=".multi-collapse2" aria-expanded="true" aria-controls="ca1 ca2 ca3 ca4 ca5 ca6 ca7">Centros Acadêmicos</button>
							<!-- Elementos do collapse -->
							<div class="">
								<div class="collapse multi-collapse2" id="ca1">
									<button id="subitem" class="btn btn-light">CA Toca da Onça</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse2" id="ca2">
									<button id="subitem" class="btn btn-light">CACCS</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse2" id="ca3">
									<button id="subitem" class="btn btn-light">Cageos</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse2" id="ca4">
									<button id="subitem" class="btn btn-light">Caped</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse2" id="ca5">
									<button id="subitem" class="btn btn-light">Caeps</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse2" id="ca6">
									<button id="subitem" class="btn btn-light">CAEF</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse2" id="ca7">
									<button id="subitem" class="btn btn-light">CACTUS</button>
								</div>
							</div>																																			
						</div>
						<div class="menuT">
							<!-- Título do collapse --><!-- Concatenar o at com id -->
							<button class="btn btn-light" data-toggle="collapse" data-target=".multi-collapse3" aria-expanded="true" aria-controls="en1 en2 en3">Entidades</button>
							<!-- Elementos do collapse -->
							<div class="">
								<div class="collapse multi-collapse3" id="en1">
									<button id="subitem" class="btn btn-light">Share</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse3" id="en2">
									<button id="subitem" class="btn btn-light">Enactus</button>
								</div>
							</div>							
							<div class="">
								<div class="collapse multi-collapse3" id="en3">
									<button id="subitem" class="btn btn-light">ABU</button>
								</div>
							</div>										
						</div>
						<div class="menuT">
							<!-- Título do collapse --><!-- Concatenar o at com id -->
							<button class="btn btn-light" data-toggle="collapse" data-target=".multi-collapse4" aria-expanded="true" aria-controls="c1 c2 c3 c4 c5 c6 c7 c8 c9 c10 c11 c12">Cursos</button>
							<!-- Elementos do collapse -->
							<div class="">
								<div class="collapse multi-collapse4" id="c1">
									<button id="subitem" class="btn btn-light">Administração</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse4" id="c2">
									<button id="subitem" class="btn btn-light">Ciências Biológicas</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse4" id="c3">
									<button id="subitem" class="btn btn-light">Ciência da Computação</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse4" id="c4">
									<button id="subitem" class="btn btn-light">Ciências Econômicas</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse4" id="c5">
									<button id="subitem" class="btn btn-light">Engenharia de Produção</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse4" id="c6">
									<button id="subitem" class="btn btn-light">Engenharia Florestal</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse4" id="c7">
									<button id="subitem" class="btn btn-light">Física</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse4" id="c8">
									<button id="subitem" class="btn btn-light">Geografia</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse4" id="c9">
									<button id="subitem" class="btn btn-light">Matemática</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse4" id="c10">
									<button id="subitem" class="btn btn-light">Pedagogia</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse4" id="c11">
									<button id="subitem" class="btn btn-light">Química</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse4" id="c12">
									<button id="subitem" class="btn btn-light">Turismo</button>
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
							<li class="breadcrumb-item"><a href="./home.php">Home</a></li>
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
													<input type="password" class="form-control shadow-sm" value="12345678" name="inputSenha" pattern=".{5,30}" required>
												</div>
											</div>	
										</div>
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label class="divsenha" style="font-weight: bold;">Confirmar senha</label>
													<input type="password" class="form-control shadow-sm" value="12345678" name="inputConfSenha" pattern=".{5,30}" required>
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