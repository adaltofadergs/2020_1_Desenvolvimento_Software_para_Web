<?php

class CategoriaDAO{

    public static function getCategorias(){
        $query = "SELECT id, nome FROM categorias ORDER BY nome";
        $result = Conexao::consultar($query);
        $lista = new ArrayObject();

        while( list($cod, $nome )= mysqli_fetch_row($result)){

                $cat = new Categoria();
                $cat->id = $cod;
                $cat->nome = $nome;
                
                $lista->append( $cat );
        }
        return $lista;
    }
    

}