<?php
include('../connection/connection.php');

// ini_set('session.gc_maxlifetime', 3600);
// session_set_cookie_params(3600);
//Cria a sessão e verifica se o usuário está logado
session_start();
if (!isset($_SESSION['id_usuario']) && !isset($_SESSION['nome_usuario'])) {
    header("Location: ../login.php?erro_login=1"); // Se não está logado, retorna para a página de login com uma mensagem de erro
}

if (isset($_SESSION['alertaC'])) {
    ?><script>alert('<?php echo $_SESSION['alertaC'];?>');</script><?php
    unset($_SESSION['alertaC']);
}

// Busca as informações do produto
$script =   "SELECT * FROM usuario WHERE id='".$_SESSION['id_usuario']."';";

$result = $conn->query($script);
$pessoa = $result->fetch_object();

if (isset($_POST['salvar'])) {
	// Pega todos os valores
	$query = "SELECT nome, sobrenome, email, senha, tel FROM usuario WHERE id='".$_SESSION['id_usuario']."';";
	$result = $conn->query($query);
	$row = $result->fetch_object();

	if (isset($_POST['inputNome'])) {
		$nome = $_POST['inputNome'];
		if ($nome != $row->nome) {
			$query = "UPDATE usuario SET nome=\"$nome\" WHERE id='".$_SESSION['id_usuario']."';";
			$conn->query($query);
		}
	}

	if (isset($_POST['inputSobrenome'])) {
		$sobrenome = $_POST['inputSobrenome'];
		if ($sobrenome != $row->sobrenome) {
			$query = "UPDATE usuario SET sobrenome=\"$sobrenome\" WHERE id='".$_SESSION['id_usuario']."';";
			$conn->query($query);
		}
	}

	if (isset($_POST['inputEmail'])) {
		$email = $_POST['inputEmail'];
		if ($email != $row->email) {
			$query = "UPDATE usuario SET email=\"$email\" WHERE id='".$_SESSION['id_usuario']."';";
			$conn->query($query);
		}
	}

	if (isset($_POST['inputSenha'])) {
		$senha = $_POST['inputSenha'];
		$senhaMD5 = MD5($senha);
		if ($senhaMD5 != $row->senha) {
			$query = "UPDATE usuario SET senha=\"$senhaMD5\" WHERE id='".$_SESSION['id_usuario']."';";
			$conn->query($query);
		}
	}

	if (isset($_POST['inputTel'])) {
		$tel = $_POST['inputTel'];
		
		if ($tel != $row->tel) {
			$query = "UPDATE usuario SET tel=\"$tel\" WHERE id='".$_SESSION['id_usuario']."';";
			$conn->query($query);
			$result = $conn->query($script);
			$pessoa = $result->fetch_object();
		}
	}
	$_SESSION['alertaC'] = 'Conta alterada com sucesso!';
	header('Location: ./conta.php');
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
        <link rel="shortcut icon" type="image/png" href="../img/UFSell.png">

        <!-- Importando bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="../js/confSenha.js"></script>
       <!--
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		

        <!-- Importando estilo css -->
        <link type="text/css" rel="stylesheet" href="../css/comprador.css">
        <link type="text/css" rel="stylesheet" hred="../css/vendedor.css">
    </head>

    <body>
        <!-- Navbar -->
        <?php include '../includes/nav-comp.php';  ?>   
        <!-- Estruturação da página -->
		<div id="defCol" class="col-12 col-md-12">
                <div id="defRow" class="row">
                    
					<!-- Barra lateral -->
                    <?php include '../includes/menu-comp.php'; ?>

                    <!-- Main -->
                    <div id="conteudo" class="col-10 col-md-10">
						<!-- Bread Crumb -->
						<nav aria-label="breadcrumb" style="margin-top:5px; margin-left: -15px;">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./home.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Minha conta</li>
							</ol>
						</nav>


						<!-- Formulário -->
					<form id="formCad" class=""  name="salvar" method="post">
						<div class="colD d-flex justify-content-start">
							<div class="col-12 col-xl-12 col-lg-12 col-md-12">
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
												<label class="divsenha" style="font-weight: bold;">Senha</label>
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
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label class="divemail" style="font-weight: bold;">Email</label>
												<input type="email" class="form-control shadow-sm" value="<?php echo $pessoa->email; ?>" name="inputEmail" pattern=".{1,100}" required>
											</div>
										</div>										
										<div class="col-6">
											<div class="form-group">
												<label class="divtel" style="font-weight: bold;">Celular</label>
												<input type="text" class="form-control shadow-sm bg-white" value="<?php echo $pessoa->tel; ?>" name="inputTel" pattern="\([0-9]{2}\) ?[0-9]{4,6}-[0-9]{3,4}$" placeholder="(XX) XXXXX-XXXX">
											</div>
										</div>
									</div>
								</div>
							</div>											
						</div>
						<br>
						<div class="row">
							<div class="col-12">
								<div id="cadSalvar" class="botaocad float-right">
									<!-- Botão para salvar -->
									<button type="submit" name="salvar" class="btn btn-success">
										Salvar
									</button>
								</div>
							</div>
						</div>
					</form>

                </div>
            </div>

    </body>
</html>
