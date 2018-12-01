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
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
            <div class="flexCustom d-flex justify-content-between">
                <div class="d-flex flex-row">
                    <a href="./home.php"><img id="navLogo" src="img/UFSell.png" alt="logo"></a>
                    <label>UFSell</label>
                    <input id="inputNav" class="form-control form-control-dark" type="text" placeholder="Buscar" aria-label="Search">
                </div>
                <div class="d-flex flex-row align-self-center">
                    <div class="">
                        <a href="./home.php">Minha Conta</a>
                    </div>
                    <div class="">
                        <a href="./login.php">Sair</a>
                    </div>
                </div>
            </div>
        </nav>        
    
        <!-- Conteúdo da página -->
<!--        <main class="wrap">
            <div class="container-fluid">
                <div class="row">
                    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                        <div class="sidebar-sticky">
                            <ul class="nav flex-column">
                                <li id="navItemFirst" class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#multiCollapse1" role="button" aria-expanded="false" aria-controls="multiCollapse1">Atléticas</a>
                                    <div class="collapse multi-collapse" id="multiCollapse1">
                                        <a class="" href="#">Teste</a><br>
                                        <a class="" href="#">Teste</a>
                                    </div>                          
                                </li>
                            </ul>
                        </div>
                    </nav>
--><!-- <div role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"><div style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div> --><!--
                <div role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    <center><h2>Título?</h2></center>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3"> 
                        <div class="card">
                            <div class="card-body">
                                AAAAAAAAAAAA
                            </div>
                        </div>                    
                    </div>
                </div>
                <div role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                        <div id="cardItem" class="card">
                            <div class="card-body">
                                <h1>AAAAAAAAAAAA</h1>
                                <center><h1>AAAAAAAAAAAA</h1></center>
                                <div class="d-flex justify-content-end">
                                    <h1>AAAAAAAAAAAA</h1>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
                <div role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                        <div class="card">
                            <div class="card-body">
                                AAAAAAAAAAAA
                            </div>
                        </div>                    
                    </div>
                </div>                
            </div>
        </main>
-->

    <!-- Estruturação da página -->
    <div class="row">
        <!-- Barra lateral -->
        <div class="col-2 col-md-3 col-sm-3">
            <div class="card">
                <div class="card-body">
                    OPA
                </div>
            </div>
        </div>

        <!-- Main -->
        <div class="col-10 col-md-9 col-sm-9">
            <div class="card">
                <div class="card-body">
                    APO
                </div>
            </div>
        </div>
    </div>

    </body>
</html>