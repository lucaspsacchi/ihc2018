<?php
include('connection/connection.php');

// ini_set('session.gc_maxlifetime', 3600);
// session_set_cookie_params(3600);
//Cria a sessão e verifica se o usuário está logado
include 'includes/session.php';


// Busca as informações do produto
$script = "SELECT * FROM prod WHERE id='".$_GET['id_prod']."';"; // Pega o id por GET
$result = $conn->query($script);
$prod = $result->fetch_object();

$query = "SELECT * FROM `usu_prod` WHERE `id_prod`='".$_GET['id_prod']."';"; //Pega a tupla de usu_prod
$result = $conn->query($query);
$usu_prod = $result->fetch_object();

$query = "SELECT nome, tel, id_org FROM `usuario` WHERE `id`=\"$usu_prod->id_usu\"";
$result = $conn->query($query);
$usu = $result->fetch_object();

$vend = $usu->nome;
$tel = $usu->tel;

$query = "SELECT nome FROM `org` WHERE `id`=\"$usu->id_org\"";
$result = $conn->query($query);
$row = $result->fetch_object();

$org = $row->nome;

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
      <?php include 'includes/header-interno.php';  ?>
    </head>

    <body>
      
        <!-- Navbar -->
        <?php include 'includes/nav1.php'; ?>

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
								<li class="breadcrumb-item active" aria-current="page">Detalhes do produto</li>
							</ol>
						</nav>

						<div class="colD">
							<div class="col-12 col-xl-12 col-lg-12 col-md-12" style="margin-top: 25px;">
								<div class="row">
									<div class="col-5 col-xl-5 col-lg-5 col-md-5">
										<img class="imgProd" src="img/<?php echo $prod->img; ?>"> <!-- COLOCAR A IMAGEM AQUI -->
									</div>
									<div class="col-7 col-xl-7 col-lg-7 col-md-7">
										<div class="row">
											<h3><?php echo $prod->nome; ?></h3>
										</div>
										<div class="row justify-content-between">
												<div class="obj1">
													Ref.:&nbsp<?php echo $prod->id; ?>
												</div>
												<div class="row">
													<ul class="rating ratingCustom">
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star"></span>
													</ul>
													<h6 class="avalCard" style="margin-right:15px;">&nbsp(<?php echo $prod->qt_votos; ?> Avaliações)</h6>
												</div>
										</div>
										<div class="row">
											<h4>R$&nbsp<?php echo number_format($prod->preco,2); ?></h4>
										</div>
										<hr class="hrProd">
										<div class="row">
											<h5><b>Produto</b>&nbsp<?php echo $org; ?></h5> <!-- EXIBE NOME DA ORGANIZAÇÃO QUE FAZ PARTE -->
										</div>
										<hr class="hrProd">
										<div class="row">
											<label><b>Vendedor</b>:&nbsp<?php echo  $vend; ?></label>
										</div>
										<div class="row">
											<label><b>Entre em contato:</b>&nbsp <?php echo $tel; ?></label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="descricao" style="margin-left: 15px;">
										<br><label><b>Descrição</b></label><br>
										<div class="card-block">
											<p class="card-text text-justify"><?php echo nl2br($prod->descr);?></p>
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
