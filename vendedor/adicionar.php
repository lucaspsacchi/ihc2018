<?php
include('../connection/connection.php');

// ini_set('session.gc_maxlifetime', 3600);
// session_set_cookie_params(3600);
//Cria a sessão e verifica se o usuário está logado
session_start();
if (!isset($_SESSION['id_usuario']) && !isset($_SESSION['nome_usuario'])) {
    header("Location: ../login.php?erro_login=1"); // Se não está logado, retorna para a página de login com uma mensagem de erro
}

//Imagem
if (isset($_FILES["file"]["type"])) {
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);

    if (in_array($file_extension, $validextensions)) {//Verifica se está de acordo com a extensão
        if ($_FILES["file"]["error"] > 0) {

        }
        else {
            $novoNome = uniqid(time()) . '.' . $file_extension;
            $destino = '../img/' . $novoNome;
            $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable

            $flag_img = move_uploaded_file($sourcePath, $destino); // Moving Uploaded file
            //if ($flag_img != TRUE) {
                ?>
                <script>
                    alert("Ocorreu um erro inesperado com a imagem");
                </script>
                <?php
            //}
        }
    }
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
        <nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0">
            <div class="flexCustom d-flex justify-content-start">
                <div class="col-2 col-xl-2 col-lg-2 col-md-2">
                    <div class="d-flex flex-row">
                        <a href="./home.php"><img id="navLogo" src="../img/UFSell.png" alt="logo"></a>
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
		<div id="defCol" class="col-12 col-md-12">
                <div id="defRow" class="row">
                    
					<!-- Barra lateral -->
                    <div id="menu" class="col-2 col-md-2" style="padding-left:0px;">
                    <div class="divWrap">                           
                            <div id="btn-itemP" class="d-flex justify-content-center">
                                <a class="btn btn-light btnBorder" href="./adicionar.php">Criar anúncio</a>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-light btnBorder" href="./painel.php">Painel de Controle</a>
                            </div>
                        </div>
                        
						<div class="footer">
                            <div class="hrFooter">
                                <hr>
                            </div>
							<div id="textFooter" class="row">
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
                    <div id="conteudo" class="col-10 col-md-10">
						<!-- Bread Crumb -->
						<nav aria-label="breadcrumb" style="margin-top:5px; margin-left: -15px;">
							<ol class="breadcrumb">
							    <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
							    <li class="breadcrumb-item active" aria-current="page">Novo anúncio</li>
							</ol>
						</nav>


						<div class="colD">
							<div class="top" style="margin-top: 30px;">
                                <form id="formAnuncio" class="" method="post">
                                    <div class="col-12 col-md-12">
                                        <div class="row">
                                            <div class="col-5 col-md-5">
                                                <div class="form-group">
                                                    <img id="photo" src="../img/semImg.png" class="img-rounded" width="300px" height="300px">
                                                    <br>
                                                    <label for="comment">Imagem do anúncio<span class="ast"></span> </label>
                                                    <input type="file" name="file" id="file" required/>
                                                </div>
                                            </div>
                                            <div class="col-7 col-md-7">
                                                <div class="">
                                                    <div class="form-group">
                                                        <label class="divnome" style="font-weight: bold;">Título do anúncio</label>
                                                        <input type="text" class="form-control shadow-sm" name="inputTitu" maxlength="50" required>
                                                    </div>
                                                    <div class="form-group" style="width: 40%;">
                                                        <label class="divpreco" style="font-weight: bold;">Preço</label>
                                                        <input type="text" class="form-control shadow-sm" name="inputPrec" placeholder="Digite no formato 00.00" required>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="form-group">
                                                        <label class="divdesc" style="font-weight: bold;">Descrição</label>
                                                        <textarea type="text" name="inputDesc" class="form-control" rows="6" required maxlength="500" id="description" placeholder="Insira a descrição do anúncio"></textarea>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-success" name="salvar">Salvar</button>
                                    </div>                                  
                                </form>
							</div>								
						</div>
                    </div>
                </div>
            </div>

    </body>
</html>


<script>
    // Ajax para a imagem
    $(document).ready(function (e) {
        // Function to preview image after validation
        $(function () {
            $("#file").change(function () {
                var file = this.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
                {
                    $('#photo').attr('src', 'noimage.png');
                    $("#message").html("<p id='error'>Por favor, selecione um formato de imagem válido</p>" + "<h4>Nota</h4>" + "<span id='error_message'>Apenas jpeg, jpg e png são suportados pelo site</span>");
                    return false;
                }
                else
                {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
        function imageIsLoaded(e) {
            $('#photo').attr('src', e.target.result);
            $('#photo').attr('width', '300px');
            $('#photo').attr('height', '300px');
        }
    });
</script>