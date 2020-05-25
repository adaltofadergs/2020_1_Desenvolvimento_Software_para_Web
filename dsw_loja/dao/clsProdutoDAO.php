<?php

class ProdutoDAO{

    public static function inserir($produto){
        $query = "INSERT INTO produtos 
                (nome, preco, quantidade, codCategoria) VALUES (
                '".$produto->nome."' ,
                 ".$produto->preco."  ,
                 ".$produto->quantidade." ,
                 ".$produto->categoria->id."  )";
        Conexao::executar($query);
    }

    public static function editar($produto){
        $query = "UPDATE produtos SET
                nome = '".$produto->nome."' ,
                preco = ".$produto->preco."  ,
                quantidade = ".$produto->quantidade." ,
                codCategoria = ".$produto->categoria->id." 
                WHERE id =  ".$produto->id;

        Conexao::executar($query);
    }

    public static function excluir($id){
        $query = "DELETE FROM produtos WHERE id = ".$id;
        Conexao::executar($query);
    }

    public static function getProdutos(){
        $query = "SELECT p.id, p.nome, p.preco, p.quantidade, 
                         c.id AS codCat, c.nome AS nomeCat
                    FROM produtos p 
                    INNER JOIN categorias c ON c.id = p.codCategoria 
                    ORDER BY p.nome ";
        $result = Conexao::consultar($query);
        $lista = new ArrayObject();
        while( list($cod, $nome, $preco, $qtd, $codCat, $nomeCat )
            = mysqli_fetch_row($result)){
                $cat = new Categoria();
                $cat->id = $codCat;
                $cat->nome = $nomeCat;
                $prod = new Produto();
                $prod->id = $cod;
                $prod->nome = $nome;
                $prod->preco = $preco;
                $prod->quantidade = $qtd;
                $prod->categoria = $cat;

                $lista->append( $prod );
        }
        return $lista;
    }



}