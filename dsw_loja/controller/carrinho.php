<?php

session_start();

$idProduto = $_GET['idProduto'];

if( isset($_REQUEST['adicionar'])){
    if( isset($_SESSION['carrinho'][$idProduto])){
        $_SESSION['carrinho'][$idProduto] ++;
    }else{
        $_SESSION['carrinho'][$idProduto] = 1;
    }
}

if( isset($_REQUEST['remover'])){
    if( isset($_SESSION['carrinho'][$idProduto])){
        if( $_SESSION['carrinho'][$idProduto] > 1 ){
            $_SESSION['carrinho'][$idProduto] --;
        }else{
            unset( $_SESSION['carrinho'][$idProduto] );
        }
    }
}

if( isset($_REQUEST['excluir'])){
    if( isset($_SESSION['carrinho'][$idProduto])){
       unset( $_SESSION['carrinho'][$idProduto] );
    }
}

header("Location: ../meuCarrinho.php");