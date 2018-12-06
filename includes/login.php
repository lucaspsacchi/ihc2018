<?php
$erro_login = 0;

if (isset($_POST['inputEmail']) && isset($_POST['inputSenha'])) {

    include('connection/connection.php');

    $email = addslashes($_POST['inputEmail']);
    $senha = addslashes($_POST['inputSenha']);


    // Verifica se existe aquele email e a senha é a mesma do bd
    $script =   "SELECT *
                FROM usuario
                WHERE email='".$email."';";
    // Se encontrou algum resultado com os valores informados
    if ($result = $conn->query($script)) {
        if ($result->num_rows > 0) {
            $obj = $result->fetch_object();
            if ($obj->senha == MD5($senha)) {
                // Permissão concedida

                // Configurações de session
                // ini_set('session.gc_maxlifetime', 3600);
                // session_set_cookie_params(3600);

                session_start();

                $_SESSION['id_usuario'] = $obj->id;
                $_SESSION['nome_usuario'] = $obj->nome;

                $result->close();
                if ($obj->id_org == 1) {
                    header("Location: ./home.php?sel=1");
                }
                else {
                    header("Location: vendedor/home.php");
                }
            }
            else {
                $erro_login = 1;
            }
        }
        else {
            $erro_login = 2;
        }
    }
    $conn->close();
}
?>
