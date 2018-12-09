<?php
//Cria a sessão e verifica se o usuário está logado
session_start();
if (!isset($_SESSION['id_usuario']) && !isset($_SESSION['nome_usuario'])) {
    header("Location: ../login.php?erro_login=1"); // Se não está logado, retorna para a página de login com uma mensagem de erro
}
include('../connection/connection.php');
// Busca as informações do produto
$script = "SELECT * FROM prod WHERE id='".$_GET['id_prod']."';"; // Pega o id por GET

$result = $conn->query($script);
$prod = $result->fetch_object();

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
            if ($flag_img != TRUE) {
                ?>
                <script>
                    alert("Ocorreu um erro inesperado com a imagem");
                </script>
                <?php
	        }

	    }
    }
}
//End Imagem

//Titulo
if (isset($_POST['salvar'])) {

    if (isset($_POST['inputTitu']))
    {
        $titulo = $_POST['inputTitu'];
        if ($titulo != $prod->nome)
        {
            $query = "UPDATE prod SET nome=\"$titulo\" WHERE id=\"$prod->id\"";
            $result = $conn->query($query);
        }
    }

    if (isset($_POST['inputPrec']))
    {
        $preco = str_replace(',','.',$_POST['inputPrec']);
        if ($preco != $prod->preco)
        {
            $query = "UPDATE prod SET preco=\"$preco\" WHERE id=\"$prod->id\"";
            $result = $conn->query($query);
        }
    }


    if (isset($_POST['inputDesc']))
    {
        $desc = $_POST['inputDesc'];
        if ($desc != $prod->descr)
        {
            $query = "UPDATE prod SET descr=\"$desc\" WHERE id=\"$prod->id\"";
            $result = $conn->query($query);
        }
    }

    if ($novoNome != $prod->img && $novoNome != 0) // Diferente de 0 porque se não insere nova imagem, o valor retornado é 0
    {
        $query = "UPDATE prod SET img=\"$novoNome\" WHERE id=\"$prod->id\"";
        $result = $conn->query($query);
    }
    $result = $conn->query($script);
    $prod = $result->fetch_object();

    $_SESSION['alertaV'] = "Anúncio alterado com sucesso!";
    header('Location: ./home.php');
}

if (isset($_POST['deletar'])) {

    // Apaga todos os produtos vinculados a essa pessoa
    $script = "DELETE FROM usu_prod WHERE id_prod ='".$prod->id."'";
    $conn->query($script);


    // Apaga o usuário
    $script = "DELETE FROM prod WHERE id = '".$prod->id."'";
    $conn->query($script);

    $_SESSION['alertaV'] = "Anúncio excluído com sucesso!";
    header('Location: ./home.php');
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
        <?php include '../includes/nav-vend.php';  ?>
        <!-- Estruturação da página -->
		<div id="defCol" class="col-12 col-md-12">
                <div id="defRow" class="row">
                    
					<!-- Barra lateral -->
                    <?php include '../includes/menu-vend.php'; ?>

                    <!-- Main -->
                    <div id="conteudo" class="col-10 col-md-10">
						<!-- Bread Crumb -->
						<nav aria-label="breadcrumb" style="margin-top:5px; margin-left: -15px;">
							<ol class="breadcrumb">
						    	<li class="breadcrumb-item"><a href="./home.php">Home</a></li>
					    		<li class="breadcrumb-item active" aria-current="page">Alteração anúncio</li>
							</ol>
						</nav>


						<div class="colD">
							<div class="top" style="margin-top: 30px;">
                                <form id="formAnuncio" class="" method="POST" enctype="multipart/form-data">
                                    <div class="col-12 col-md-12">
                                        <div class="row">
                                            <div class="col-5 col-md-5">
                                                <div class="form-group">
                                                    <img id="photo" src="../img/<?php echo $prod->img; ?>" class="img-rounded" width="300px" height="300px">
                                                    <br>
                                                    <label for="comment">Imagem do anúncio<span class="ast"></span> </label>
                                                    <input type="file" name="file" id="file">
                                                </div>
                                            </div>
                                            <div class="col-7 col-md-7">
                                                <div class="">
                                                    <div class="form-group">
                                                        <label class="divnome" style="font-weight: bold;">Título do anúncio</label>
                                                        <input type="text" class="form-control shadow-sm" name="inputTitu" value="<?php echo $prod->nome; ?>" maxlength="50" required>
                                                    </div>
                                                    <div class="form-group" style="width: 30%;">
                                                        <label class="divpreco" style="font-weight: bold;">Preço</label>
                                                        <div class="d-flex flex-row align-items-end">
                                                            <label style="font-size: 1rem;"><b>R$&nbsp</b></label>
                                                            <input type="text" class="form-control shadow-sm" name="inputPrec" value="<?php echo str_replace('.',',',number_format($prod->preco, 2)); ?>" placeholder="Ex: 00,00" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="form-group">
                                                        <label class="divdesc" style="font-weight: bold;">Descrição</label>
                                                        <textarea type="text" name="inputDesc" class="form-control" rows="6" required maxlength="500" id="description" placeholder="Insira a descrição do anúncio"><?php echo $prod->descr; ?></textarea>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end" style="">
                                        <div style="margin-right: 20px;">
                                            <button class="btn btn-secondary" name="deletar">Excluir</button>
                                        </div>
                                        <div>
                                            <button class="btn btn-success" name="salvar">Salvar</button>
                                        </div>
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
