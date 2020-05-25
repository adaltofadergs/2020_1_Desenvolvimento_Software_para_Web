<?php
    $action = "inserir";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja</title>
    <link rel="stylesheet" type="text/css" href="estilo.css" >
</head>
<body>

    <?php  require_once "menu.php"; ?>

    <h1>Bem-vindo a nossa Loja - Categorias</h1>

    <form method="POST" action="salvarCategoria.php?<?php echo $action; ?>">
        <label for="txtNome">Nome:</label>
        <input type="text" name="txtNome" required />
        <br>
        <input type="submit" value="Salvar" />
        <input type="reset" value="Limpar" />
    </form>

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
