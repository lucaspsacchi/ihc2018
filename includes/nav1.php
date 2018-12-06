<nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0">
    <div class="flexCustom d-flex justify-content-start">
        <div class="col-2 col-xl-2 col-lg-2 col-md-2">
            <div class="d-flex flex-row">
                <a href="./home.php?sel=1"><img id="navLogo" src="img/UFSell.png" alt="logo"></a>
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
