<?php

class ProdutoDAO{

    public static function inserir($produto){
        $query = "INSERT INTO produtos 
                (nome, preco, quantidade, codCategoria, foto) VALUES (
                '".$produto->nome."' ,
                 ".$produto->preco."  ,
                 ".$produto->quantidade." ,
                 ".$produto->categoria->id." , 
                '".$produto->foto."'   )";
        Conexao::executar($query);
    }

    public static function editar($produto){
        $query = "UPDATE produtos SET
                nome = '".$produto->nome."' ,
                preco = ".$produto->preco."  ,
                quantidade = ".$produto->quantidade." ,
                codCategoria = ".$produto->categoria->id." ,
                foto = '".$produto->foto."' 
                WHERE id =  ".$produto->id;

        Conexao::executar($query);
    }

    public static function excluir($id){
        $query = "DELETE FROM produtos WHERE id = ".$id;
        Conexao::executar($query);
    }

    public static function getProdutos(){
        $query = "SELECT p.id, p.nome, p.preco, p.quantidade, 
                         c.id AS codCat, c.nome AS nomeCat, p.foto
                    FROM produtos p 
                    INNER JOIN categorias c ON c.id = p.codCategoria 
                    ORDER BY p.nome ";
        $result = Conexao::consultar($query);
        $lista = new ArrayObject();
        while( list($cod, $nome, $preco, $qtd, $codCat, $nomeCat, $foto )
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
                $prod->foto = $foto;
                $lista->append( $prod );
        }
        return $lista;
    }


    public static function getProdutoById($idProduto){
        $query = "SELECT p.id, p.nome, p.preco, p.quantidade, 
                         c.id AS codCat, c.nome AS nomeCat, p.foto
                    FROM produtos p 
                    INNER JOIN categorias c ON c.id = p.codCategoria 
                    WHERE p.id = ". $idProduto ;
        $result = Conexao::consultar($query);

        list($cod, $nome, $preco, $qtd, $codCat, $nomeCat, $foto ) = mysqli_fetch_row($result) ;
        $cat = new Categoria();
        $cat->id = $codCat;
        $cat->nome = $nomeCat;

        $prod = new Produto();
        $prod->id = $cod;
        $prod->nome = $nome;
        $prod->preco = $preco;
        $prod->quantidade = $qtd;
        $prod->categoria = $cat;
        $prod->foto = $foto;

        return $prod;
    }



}