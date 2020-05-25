<?php
    include_once "model/clsConexao.php";
// $usuario_cadastrado = "admin";
// $senha_cadastrada = "123";
    $user = $_POST['user'];
    $senha = $_POST['senha'];

    $query = "SELECT id, nome, email FROM usuarios WHERE email = '$user' AND senha = '$senha' ";
    $result = Conexao::consultar( $query );

    if(  mysqli_num_rows($result) > 0 ){
        session_start();

        $usuario = mysqli_fetch_assoc($result);

        $_SESSION["logado"] = TRUE;
        $_SESSION["id_usuario"] = $usuario['id'];
        $_SESSION["nome_usuario"] = $usuario['nome'];

        header( "Location: login.php" );
    }else{
        header( "Location: login.php?erroNoLogin" );
    }
?>