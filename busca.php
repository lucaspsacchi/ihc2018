<?php
include('connection/connection.php');

// ini_set('session.gc_maxlifetime', 3600);
// session_set_cookie_params(3600);
//Cria a sessão e verifica se o usuário está logado
session_start();
if (!isset($_SESSION['id_usuario']) && !isset($_SESSION['nome_usuario'])) {
    header("Location: ./login.php?erro_login=1"); // Se não está logado, retorna para a página de login com uma mensagem de erro
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
										<a id="subitem" class="btn btn-light" href="produto.php?org=Atlética ECAD">Atlética ECAD</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse1" id="at2">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Atlética UFSCar Sorocaba">Atlética UFSCar Sorocaba</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse1" id="at3">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Atlética XXV de Maio">Atlética XXV de Maio</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse1" id="at4">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Atlética Raça Brisão">Atlética Raça Brisão</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse1" id="at5">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Atlética DFQM">Atlética DFQM</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse1" id="at6">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Atlética Lumberjack">Atlética Lumberjack</a>
									</div>
								</div>							
							</div>
							<div class="menuT">
								<!-- Título do collapse --><!-- Concatenar o at com id -->
								<button class="btn btn-light" data-toggle="collapse" data-target=".multi-collapse2" aria-expanded="true" aria-controls="ca1 ca2 ca3 ca4 ca5 ca6 ca7">Centros Acadêmicos</button>
								<!-- Elementos do collapse -->
								<div class="">
									<div class="collapse multi-collapse2" id="ca1">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Toca da Onça">CA Toca da Onça</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse2" id="ca2">
										<a id="subitem" class="btn btn-light" href="produto.php?org=CACCS">CACCS</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse2" id="ca3">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Cageos">Cageos</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse2" id="ca4">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Caped">Caped</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse2" id="ca5">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Caeps">Caeps</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse2" id="ca6">
										<a id="subitem" class="btn btn-light" href="produto.php?org=CAEF">CAEF</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse2" id="ca7">
										<a id="subitem" class="btn btn-light" href="produto.php?org=CACTUS">CACTUS</a>
									</div>
								</div>																																			
							</div>
							<div class="menuT">
								<!-- Título do collapse --><!-- Concatenar o at com id -->
								<button class="btn btn-light" data-toggle="collapse" data-target=".multi-collapse3" aria-expanded="true" aria-controls="en1 en2 en3">Entidades</button>
								<!-- Elementos do collapse -->
								<div class="">
									<div class="collapse multi-collapse3" id="en1">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Share">Share</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse3" id="en2">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Enactus">Enactus</a>
									</div>
								</div>							
								<div class="">
									<div class="collapse multi-collapse3" id="en3">
										<a id="subitem" class="btn btn-light" href="produto.php?org=ABU">ABU</a>
									</div>
								</div>										
							</div>
							<div class="menuT">
								<!-- Título do collapse --><!-- Concatenar o at com id -->
								<button class="btn btn-light" data-toggle="collapse" data-target=".multi-collapse4" aria-expanded="true" aria-controls="c1 c2 c3 c4 c5 c6 c7 c8 c9 c10 c11 c12">Cursos</button>
								<!-- Elementos do collapse -->
								<div class="">
									<div class="collapse multi-collapse4" id="c1">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Administração">Administração</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c2">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Ciências Biológicas">Ciências Biológicas</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c3">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Ciência de Computação">Ciência da Computação</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c4">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Ciências Econômicas">Ciências Econômicas</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c5">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Engenharia de Produção">Engenharia de Produção</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c6">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Engenharia Florestal">Engenharia Florestal</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c7">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Física">Física</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c8">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Geografia">Geografia</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c9">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Matemática">Matemática</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c10">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Pedagogia">Pedagogia</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c11">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Química">Química</a>
									</div>
								</div>
								<div class="">
									<div class="collapse multi-collapse4" id="c12">
										<a id="subitem" class="btn btn-light" href="produto.php?org=Turismo">Turismo</a>
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
                                <li class="breadcrumb-item active" aria-current="page">Resultados da busca</li>
                            </ol>
                        </nav>


						<div class="colD">
						<br>

							<div class="row">
								<div class="col-lg-4 col-md-6 col-sm-12">
									<div class="card">
											<div class="product-image">
												<center>
													<img class="imgHome" src="img/example.jpg">
												</center>
											</div>
											<div class="card-body">
												<div class="row">
													<ul class="rating">
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star"></span>
													</ul>
													<h6 class="avalCard">&nbsp(4 Avaliações)</h6>
												</div>
												<hr class="hrCard">
												<h4 class="titleCard" style="font-weight: bold;">Título</h4>
												<div class="row d-flex justify-content-between" style="padding-left: 15px; padding-right:15px;">
													<h5 class="d-flex align-self-end">R$ 20.00</h5>
													<a class="btn btn-outline-light btn-custom" href="produto.php?id_prod=1">Detalhes</a>
												</div>
											</div>
									</div>
								</div>						
							</div>								
						</div>
                    </div>
                </div>
            </div>

    </body>
</html>