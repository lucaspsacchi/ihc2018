<?php
include('connection/connection.php');

// ini_set('session.gc_maxlifetime', 3600);
// session_set_cookie_params(3600);
//Cria a sessão e verifica se o usuário está logado
include('includes/session.php');

$valBusca = $_GET['busca'];

$isProd = true;
$query = "SELECT * FROM prod WHERE `nome`  LIKE \"%$valBusca%\" ORDER BY aval DESC";
$result = mysqli_query($conn, $query);
if ($result->num_rows == 0)
{
	$isProd = false;
	$query_temp = "SELECT id FROM org WHERE `alias`  LIKE \"%$valBusca%\" OR `nome`  LIKE \"%$valBusca%\"";
	$result_temp = mysqli_query($conn, $query_temp);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>

		<!--Header-->
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
                                <li class="breadcrumb-item active" aria-current="page">Resultados da busca</li>
                            </ol>
                        </nav>


						<div class="colD">
						<br>
							<?php
							if ($isProd)
							{ echo '<div class="row">';
							while ($row = $result->fetch_object())
							{
							?>
								<div class="col-lg-4 col-md-6 col-sm-12">
									<div class="card">
										<div class="product-image">
											<center>
												<img class="imgHome" src="img/<?php echo $row->img; ?>">
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
												<h6 class="avalCard">&nbsp( <?php echo $row->qt_votos;  ?> Avaliações)</h6>
											</div>
											<hr class="hrCard">
											<h4 class="titleCard" style="font-weight: bold;"><?php echo $row->nome;  ?></h4>
											<div class="row d-flex justify-content-between" style="padding-left: 15px; padding-right:15px;">
												<h5 class="d-flex align-self-end">R$ <?php echo number_format($row->preco, 2); ?> </h5>
												<a class="btn btn-outline-light btn-custom" href="produto.php?id_prod=<?php echo $row->id;  ?>">Detalhes</a>
											</div>
										</div>
									</div>
								</div>
							<?php } echo '</div>';
							} ?>
						<?php
							if($isProd == false)
							{ echo '<div class="row">';
							while ($row = $result_temp->fetch_object())
							{
								$id = $row->id;
								$query = "SELECT * FROM `prod` WHERE `id_org`=\"$id\" ORDER BY id DESC";
								$result = mysqli_query($conn, $query);
								while($row = $result->fetch_object())
								{
							?>
									<div class="col-lg-4 col-md-6 col-sm-12">
										<div class="card">
											<div class="product-image">
												<center>
													<img class="imgHome" src="img/<?php echo $row->img; ?>">
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
													<h6 class="avalCard">&nbsp( <?php echo $row->qt_votos;  ?> Avaliações)</h6>
												</div>
												<hr class="hrCard">
												<h4 class="titleCard" style="font-weight: bold;"><?php echo $row->nome;  ?></h4>
												<div class="row d-flex justify-content-between" style="padding-left: 15px; padding-right:15px;">
													<h5 class="d-flex align-self-end">R$ <?php echo number_format($row->preco, 2); ?> </h5>
													<a class="btn btn-outline-light btn-custom" href="produto.php?id_prod=<?php echo $row->id;  ?>">Detalhes</a>
												</div>
											</div>
										</div>
									</div>
						<?php } } } echo '</div>';
						?>

                    </div>
                </div>
            </div>

    </body>
</html>
