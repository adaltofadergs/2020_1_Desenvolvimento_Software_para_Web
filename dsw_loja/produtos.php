<?php
    $action = "inserir";

    include_once 'model/clsCategoria.php';
    include_once 'model/clsProduto.php';
    include_once 'model/clsConexao.php';
    include_once 'dao/clsCategoriaDAO.php';
    include_once 'dao/clsProdutoDAO.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Produtos</title>
    <link rel="stylesheet" type="text/css" href="estilo.css" >
</head>
<body>

    <?php  require_once "menu.php"; ?>

    <h1>Bem-vindo a nossa Loja - Produtos</h1>

<?php
if (  isset( $_SESSION['logado']) && $_SESSION['logado'] ){ 
?>

    <form method="POST" action="controller/salvarProduto.php?<?php echo $action; ?>">
        <label for="txtNome">Nome:</label>
        <input type="text" name="txtNome" required />
        <br>
        <label for="txtPreco">Preço:</label>
        <input type="text" name="txtPreco" required />
        <br>
        <label for="txtQuantidade">Quantidade:</label>
        <input type="text" name="txtQuantidade" required />
        <br>

        <label for="categoria">Categoria:</label>
        <select name="categoria">
            <option value="0">Selecione a categoria...</option>
            <?php
                $lista = CategoriaDAO::getCategorias();

                foreach($lista as $cat){
                    echo '<option value="'   . $cat->id.  '">'  .$cat->nome. '</option>';
                }
            ?>
        </select>
        <br>

        <label for="foto">Foto:</label>
        <input type="file" name="foto" required />
        <br>
        <input type="submit" value="Salvar" />
        <input type="reset" value="Limpar" />
    </form>
<?php
}
?>

    <hr>

    <table id="tbl_categorias">
        <tr>
            <th>Código</th>
            <th>Nome</th>
        </tr>

        <?php
            include_once 'model/clsConexao.php';
            $query = "SELECT * FROM categorias";
            $result = Conexao::consultar( $query );

            while( $cat = mysqli_fetch_array($result)){
                echo '<tr>'; 
                echo '    <td>'.$cat['id'].'</td>';
                echo '    <td>'.$cat['nome'].'</td>';
                echo '</tr>';
            }
        ?>
        
    </table>


    
</body>
</html>
