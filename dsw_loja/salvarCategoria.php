<?php

$nome = $_POST['txtNome'];

include "model/clsConexao.php";

if( isset( $_REQUEST['inserir']) ){
    $query = "INSERT INTO categorias (nome) VALUES ( '$nome' )";
    Conexao::executar( $query );
    header("Location: categorias.php");
}