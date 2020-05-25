<?php
    class Produto{
        // Atributos ou características
        public $id;
        public $nome, $preco, $quantidade, $foto;
        public $categoria;


        // Métodos ou ações
        public function __construct($_id = NULL, $nome = NULL, $preco = NULL, $qtd = NULL, $categoria = NULL, $foto = NULL)
        {
            $this->id = $_id;
            $this->nome = $nome;
            $this->preco = $preco;
            $this->quantidade = $qtd;   
            $this->categoria = $categoria;   
            $this->foto = $foto;
        }

        public function imprimirNomePreco(){
            echo "Nome: ".$this->nome."<br>";
            echo "Preço: ".$this->preco."<br>";
        }
        public function atualizarPreco($percentual = 0){
            $novo_preco = $this->preco + ($this->preco * $percentual / 100);
            $this->preco = $novo_preco; 
        }

        public function consultarNovoPreco($percentual = 0){
            $novo_preco = $this->preco + ($this->preco * $percentual / 100);
            return $novo_preco;
        }
    }
?>