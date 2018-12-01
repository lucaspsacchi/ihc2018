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
                        <div class="d-flex justify-content-end align-items-center">
                            <div id="nav-itemP" class="nav-item">
                                <a href="./home.php">Minha conta</a>
                            </div>
                            <div class="nav-item">
                                <a class="align-self-center" href="./login.php">Sair</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>    

        <!-- Estruturação da página -->
        <main>
            <div class="col-12 col-xl-12 col-lg-12 col-md-12">
                <div class="row justify-content-start">
                    <!-- Barra lateral -->
                    <div id="menu" class="col-2 col-xl-2 col-lg-2 col-md-2">
                        <div class="menuT">
							<!-- Título do collapse --><!-- Concatenar o at com id -->
							<button class="btn btn-light" data-toggle="collapse" data-target=".multi-collapse1" aria-expanded="true" aria-controls="at1 at2">Atléticas</button>
							<!-- Elementos do collapse -->
							<div class="">
								<div class="collapse multi-collapse1" id="at1">
									<button class="btn btn-light">Atlética Geral</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse1" id="at2">
									<button class="btn btn-light">Atlética Geral</button>
								</div>
							</div>
						</div>
                        <div class="menuT">
							<!-- Título do collapse --><!-- Concatenar o at com id -->
							<button class="btn btn-light" data-toggle="collapse" data-target=".multi-collapse2" aria-expanded="true" aria-controls="ca1 ca2">Centros Acadêmicos</button>
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
							<button class="btn btn-light" data-toggle="collapse" data-target=".multi-collapse3" aria-expanded="true" aria-controls="et1 et2">Entidades</button>
							<!-- Elementos do collapse -->
							<div class="">
								<div class="collapse multi-collapse3" id="et1">
									<button class="btn btn-light">Atlética Geral</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse3" id="et2">
									<button class="btn btn-light">Atlética Geral</button>
								</div>
							</div>
						</div>
                        <div class="menuT">
							<!-- Título do collapse --><!-- Concatenar o at com id -->
							<button class="btn btn-light" data-toggle="collapse" data-target=".multi-collapse4" aria-expanded="true" aria-controls="c1 c2">Atléticas</button>
							<!-- Elementos do collapse -->
							<div class="">
								<div class="collapse multi-collapse4" id="c1">
									<button class="btn btn-light">Atlética Geral</button>
								</div>
							</div>
							<div class="">
								<div class="collapse multi-collapse4" id="c2">
									<button class="btn btn-light">Atlética Geral</button>
								</div>
							</div>
						</div>						
						<br>
						<hr>
						<br>
						<center><h2>Copyright</h2></center><br>
                    </div>

                    <!-- Main -->
                    <div id="conteudo" class="col-10 col-xl-10 col-lg-10 col-md-10">
                        <div class="testeB">
                            B
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </body>
</html>