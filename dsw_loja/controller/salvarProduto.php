<?php

include_once "../model/clsCategoria.php";
include_once "../model/clsProduto.php";
include_once "../dao/clsProdutoDAO.php";
include_once "../model/clsConexao.php";

function salvarFoto(){
    $nome_arquivo = "";

    if( isset( $_FILES['foto']['name'] ) && $_FILES['foto']['name'] != "" ){
        $nome_arquivo = date("YmdHis") . basename( $_FILES['foto']['name'] ); 
        $diretorio = "../fotos_produtos/";
        $caminho = $diretorio.$nome_arquivo;

        if(  ! move_uploaded_file( $_FILES['foto']['tmp_name']  , $caminho )  ){
            $nome_arquivo = "sem_foto.png";
        }

    }else{
        $nome_arquivo = "sem_foto.png";
    }
    return $nome_arquivo;
}


if( isset($_REQUEST["inserir"])){
    $nome = $_POST["txtNome"];
    $preco = $_POST["txtPreco"];
    $quantidade = $_POST["txtQuantidade"];
    $idCategoria = $_POST["categoria"];

    $preco = str_replace(",", ".", $preco);
    $quantidade = str_replace(",", ".", $quantidade);

    $cat = new Categoria();
    $cat->id = $idCategoria;

    $produto = new Produto();
    $produto->nome = $nome;
    $produto->preco = $preco;
    $produto->quantidade = $quantidade;
    $produto->categoria = $cat;
    $produto->foto = salvarFoto();

    ProdutoDAO::inserir($produto);

    header("Location: ../produtos.php");

}

if( isset($_REQUEST["excluir"])){
    $id = $_GET['idProduto'];
    ProdutoDAO::excluir($id);
    header("Location: ../produtos.php");
}
