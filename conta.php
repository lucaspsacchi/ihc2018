<?php
include('connection/connection.php');

include('includes/session.php');
// ini_set('session.gc_maxlifetime', 3600);
// session_set_cookie_params(3600);
//Cria a sessão e verifica se o usuário está logado
session_start();

// Busca as informações do usuário
$script = "SELECT nome, sobrenome, email, tel FROM usuario WHERE id='".$_SESSION['id_usuario']."';"; // Retorna os dados necessários do usuário

$result = $conn->query($script);
$pessoa = $result->fetch_object();

$flag = 0;
if (isset($_POST['salvar'])) {
	// Pega todos os valores
	$query = "SELECT nome, sobrenome, email, tel FROM usuario WHERE id='".$_SESSION['id_usuario']."';";
	$result = $conn->query($query);
	$row = $result->fetch_object();

	if (isset($_POST['inputNome'])) {
		$nome = $_POST['inputNome'];
		if ($nome != $row->nome) {
			$query = "UPDATE usuario SET nome=\"$nome\" WHERE id='".$_SESSION['id_usuario']."';";
			$conn->query($query);
			$flag = 1;
		}
	}

	if (isset($_POST['inputSobrenome'])) {
		$sobrenome = $_POST['inputSobrenome'];
		if ($sobrenome != $row->sobrenome) {
			$query = "UPDATE usuario SET sobrenome=\"$sobrenome\" WHERE id='".$_SESSION['id_usuario']."';";
			$conn->query($query);
			$flag = 1;
		}
	}

	if (isset($_POST['inputEmail'])) {
		$email = $_POST['inputEmail'];
		if ($email != $row->email) {
			$query = "UPDATE usuario SET email=\"$email\" WHERE id='".$_SESSION['id_usuario']."';";
			$conn->query($query);
			$flag = 1;
		}
	}

	// $result = $conn->query($script);
	// $pessoa = $result->fetch_object();
	if ($flag == 1) {
		$_SESSION['alertaC'] = 'Conta alterada com sucesso!';

		// Busca as informações do usuário
		$script = "SELECT nome, sobrenome, email, tel FROM usuario WHERE id='".$_SESSION['id_usuario']."';"; // Retorna os dados necessários do usuário

		$result = $conn->query($script);
		$pessoa = $result->fetch_object();		
	}
}

if (isset($_POST['salvarSen'])) {

	// Pega todos os valores
	$query = "SELECT senha FROM usuario WHERE id='".$_SESSION['id_usuario']."';";
	$result = $conn->query($query);
	$row = $result->fetch_object();

	if (isset($_POST['inputSenha'])) {
		$senha = $_POST['inputSenha'];
		$senhaMD5 = MD5($senha);
		$atualsenha = MD5($_POST['inputAtualSenha']);
		if ($atualsenha == $row->senha) {
			$query = "UPDATE usuario SET senha=\"$senhaMD5\" WHERE id='".$_SESSION['id_usuario']."';";
			$conn->query($query);
			$_SESSION['alertaC'] = 'Senha alterada com sucesso!';
			
			// Busca as informações do usuário
			$script = "SELECT nome, sobrenome, email, tel FROM usuario WHERE id='".$_SESSION['id_usuario']."';"; // Retorna os dados necessários do usuário

			$result = $conn->query($script);
			$pessoa = $result->fetch_object();				
		}
		else {
			$_SESSION['alertaW'] = 'Senha atual incorreta!';	
		}
	}
}

if (isset($_POST['salvarDel'])) {

	// Pega todos os valores
	$query = "SELECT senha FROM usuario WHERE id='".$_SESSION['id_usuario']."';";
	$result = $conn->query($query);
	$row = $result->fetch_object();
	
	if (isset($_POST['inputAtualSenhaDel'])) {
		$atualsenha = MD5($_POST['inputAtualSenhaDel']);
		if ($atualsenha == $row->senha) {
			$query = "DELETE FROM usuario WHERE id ='".$_SESSION['id_usuario']."'";
			$conn->query($query);
		
		
			$_SESSION['alertaD'] = 'Conta excluída com sucesso!';
			header('Location: ./sair.php');
		}
		else {
			$_SESSION['alertaW'] = 'Senha incorreta!';
		}
	}
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
					<nav aria-label="breadcrumb" style="margin-top:5px; margin-left:-15px;">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="./home.php?sel=1">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Minha conta</li>
						</ol>
					</nav>

					<!-- Formulário -->
					<form id="formCad" class=""  name="salvar" method="post">
						<div class="colD d-flex justify-content-start">
							<div class="col-12 col-xl-12 col-lg-12 col-md-12">
								<br>
								<center><h2>Minhas informações</h2></center>
								<hr>
								<div id="cardAlterar" class="">
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label class="divnome" style="font-weight: bold;">Nome</label>
												<input type="text" class="form-control shadow-sm" value="<?php echo $pessoa->nome; ?>" name="inputNome" pattern=".{1,100}" required autofocus>
											</div>                              
										</div>
										<div class="col-6">
											<div class="form-group">
												<label class="divsobrenome" style="font-weight: bold;">Sobrenome</label>
												<input type="text" class="form-control shadow-sm" value="<?php echo $pessoa->sobrenome; ?>" name="inputSobrenome" pattern=".{1,100}" required>
											</div>
										</div>
									</div> 
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label class="divemail" style="font-weight: bold;">Email</label>
												<input type="email" class="form-control shadow-sm" value="<?php echo $pessoa->email; ?>" name="inputEmail" pattern=".{1,100}" required>
											</div>
										</div>
									</div>									
								</div>
							</div>											
						</div>
						<br>
						<div class="row">
							<div class="col-12">
								<div id="cadSalvar" class="botaocad float-right" style="margin-right:25px;">
									<!-- Botão para salvar -->
									<button type="submit" name="salvar" class="btn btn-success">
										Salvar
									</button>
								</div>
							</div>
						</div>
					</form>					
					<form id="formNao" class="" method="post">
						<br>
						<center><h2>Preferências</h2></center>
						<hr>
						<div class="d-flex justify-content-start">
							<div class="col-6 col-xl-6 col-lg-6 col-md-6">
								<div id="cardAlterar" class="">
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
									</div>
								</div>
							<div class="col-6 col-xl-6 col-lg-6 col-md-6">
								<label style="font-weight: bold; margin-top:10px;">
									Deseja receber emails novos anuncios?
								</label><br>
								<input type="radio" value="Sim"> Sim<br>
								<input type="radio" value="Não"> Não<br>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-12">
								<div id="cadSalvar" class="botaocad float-right" style="margin-right:25px;">
									<!-- Botão para salvar -->
									<button type="submit" name="nsalvar" class="btn btn-success">
										Salvar
									</button>
								</div>
							</div>
						</div>
					</form>
					<br>
					<center><h2>Alterar senha</h2></center>
					<hr>
					<form id="formSen" class=""  name="salvarSen" method="post">
						<div class="d-flex justify-content-start">
							<div class="col-12 col-xl-12 col-lg-12 col-md-12">
								<div id="cardAlterar" class="">
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label class="divsenhaatual" style="font-weight: bold;">Senha atual</label>
												<input type="password" class="form-control shadow-sm" placeholder="Digite a senha atual" data-toggle="popover" id="inputAtualSenha" name="inputAtualSenha" pattern=".{5,30}">
											</div>
										</div>
										<div class="col-6"></div>										
									</div>								
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label class="divsenha" style="font-weight: bold;">Nova senha</label>
												<input type="password" class="form-control shadow-sm" placeholder="Alterar senha" id="inputSenha" name="inputSenha" pattern=".{5,30}">
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label class="divsenha" style="font-weight: bold;">Confirmar senha</label>
												<input type="password" class="form-control shadow-sm" placeholder="Confirme a nova senha" data-toggle="popover" id="inputConfSenha" name="inputConfSenha" pattern=".{5,30}">
											</div>
										</div>										
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-12">
								<div id="cadSalvar" class="botaocad float-right" style="margin-right:25px;">
									<!-- Botão para salvar -->
									<button type="submit" name="salvarSen" class="btn btn-success">
										Salvar
									</button>
								</div>
							</div>
						</div>						
					</form>
					<center><h2>Deletar conta</h2></center>
					<hr>
					<form id="formDel" class=""  name="salvarDel" method="post">
						<div class="d-flex justify-content-start">
							<div class="col-12 col-xl-12 col-lg-12 col-md-12">
								<div id="cardAlterar" class="">
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label class="divsenhaatual" style="font-weight: bold;">Senha</label>
												<input type="password" class="form-control shadow-sm" placeholder="Digite a sua senha" id="inputAtualSenhaDel" name="inputAtualSenhaDel" pattern=".{5,30}">
												<label style="font-size:13px;">Se você deletar sua conta, não será possível recuperá-la.</label>
											</div>
										</div>
										<div class="col-6">
										</div>										
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div id="cadSalvar" class="botaocad float-right" style="margin-right:25px;">
									<!-- Botão para salvar -->
									<button type="submit" name="salvarDel" class="btn btn-danger">
										Deletar conta
									</button>
								</div>
							</div>
						</div>						
					</form>									
				<br>					
				</div>
			</div>
		</div>
    </body>
</html>

<?php
if (isset($_SESSION['alertaC'])) {
    ?><script>
	$(document).ready(function() {
		swal({title:'<?php echo $_SESSION['alertaC'];?>',
			type: 'success'});
	})</script><?php
    unset($_SESSION['alertaC']);
}

if (isset($_SESSION['alertaW'])) {
    ?><script>
	$(document).ready(function() {
		swal({title:'<?php echo $_SESSION['alertaW'];?>',
			type: 'error'});
	})</script><?php
    unset($_SESSION['alertaW']);
}
?>