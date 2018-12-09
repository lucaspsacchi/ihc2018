<?php
include('connection/connection.php');

// ini_set('session.gc_maxlifetime', 3600);
// session_set_cookie_params(3600);
//Cria a sessão e verifica se o usuário está logado
include 'includes/session.php';

$valSelect = $_GET['sel'];

if ($valSelect == 1)
{
	$query = 'SELECT * FROM prod ORDER BY id DESC';
	$result = mysqli_query($conn, $query);
}
elseif ($valSelect == 2)
{
	$query = 'SELECT * FROM prod ORDER BY aval DESC';
	$result = mysqli_query($conn, $query);
}
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
						<nav aria-label="breadcrumb" style="margin-top:5px; margin-left: -15px;">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active" aria-current="page">Home</li>
							</ol>
						</nav>


						<div class="colD">
						<br>
							<!-- Select para ordenar -->
							<div class="row d-flex justify-content-end">
								<select class="form-control" id="selectHome" style="width: 200px; margin-right: 15px;">
									<option value="1" <?php if($valSelect == 1) {echo 'selected';} ?>>Mais recentes</option>
									<option value="2" <?php if($valSelect == 2) {echo 'selected';} ?>>Maior classificação</option>
								</select>
							</div>
							<br>

							<div class="row">
								<?php
								while ($row = $result->fetch_object())
								{
								?>
									<div class="col-lg-4 col-md-6 col-sm-12">
										<div class="card">
											<center>
												<img class="imgHome" src="img/<?php echo $row->img; ?>">
											</center>
											<div class="card-body">
												<div class="row">
													<ul class="rating">
														<?php
														$i = 0;
														$x = intval($row->aval);
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
													<h6 class="avalCard">&nbsp(<?php echo $row->qt_votos;  ?> Avaliações)</h6>
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
						<?php	}   ?>
							</div>
						</div>
                    </div>
                </div>
            </div>

    </body>
</html>

<script>
	$('#selectHome').on('change', function() {
		window.location.href = "./home.php?sel=" + this.value;
	})
</script>
