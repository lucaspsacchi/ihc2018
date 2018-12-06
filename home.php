<?php
include('connection/connection.php');

// ini_set('session.gc_maxlifetime', 3600);
// session_set_cookie_params(3600);
//Cria a sessão e verifica se o usuário está logado
include('includes/session.php');

if(isset($_GET['sel'])){
  $valSelect = $_GET['sel'];
}else {
  $valSelect = 1;
}
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

    <!--Header-->
    <?php include 'includes/header1.php' ?>


    <body>

        <!-- Navbar -->
        <?php include 'includes/nav1.php' ?>
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
						<div class="footer">
							<div class="hrFooter">
								<hr>
							</div>
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
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star"></span>
													</ul>
													<h6 class="avalCard">&nbsp(<?php echo $row->qt_votos;  ?> Avaliações)</h6>
												</div>
												<hr class="hrCard">
												<h4 class="titleCard" style="font-weight: bold;"><?php echo $row->nome;  ?></h4>
												<div class="row d-flex justify-content-between" style="padding-left: 15px; padding-right:15px;">
													<h5 class="d-flex align-self-end">R$ <?php echo $row->preco; ?> </h5>
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
