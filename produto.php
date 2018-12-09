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
                    <?php include 'includes/menuesq.php'; ?>


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
													<?php
													$i = 0;
													$x = intval($prod->aval);
													while ($i < 5) {
														if ($i < $x) {
															echo '<span class="fa fa-star checked"></span>';
														}
														else {
															echo '<span class="fa fa-star"></span>';
														}

														$i = $i + 1;
													}
													?>
													</ul>
													<h6 class="avalCard" style="margin-right:15px;">&nbsp(<?php echo $prod->qt_votos; ?> Avaliações)</h6>
												</div>
										</div>
										<div class="row">
											<h4>R$&nbsp<?php echo str_replace('.',',',number_format($prod->preco,2)); ?></h4>
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
										<hr class="hrProd">
										<div class="row">
											<div class="descricao">
												<label><b>Descrição</b></label><br>
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
			</div>
		</div>

    </body>
</html>
