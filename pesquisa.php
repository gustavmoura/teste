<?php
    if(!isset($_SESSION)) session_start();
    if(!isset($_SESSION['id'])) die('Voce não esta logado. <a href="/docs-gustavo/sistema/login.php">Clique aqui</a> para fazer login');

    require_once "conexao.php";

    if(isset($_GET['pesquisa'])){
        $busca = $db->real_escape_string($_GET['pesquisa']);

        $sql_code = "SELECT * FROM produto WHERE nome LIKE '%$busca%' OR descricao LIKE '%$busca%'";
        $sql_query = $db->query($sql_code) or die("Erro na comunicação com o banco de dados");
        $num_produtos = $sql_query->num_rows;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de busca</title>
    <style>
        *{margin: 0;padding: 0;box-sizing: border-box;font-family: Arial, Helvetica, sans-serif;}
        body{width: 100vw;height: 100vh;display: flex;justify-content: center;}
        td{border: 1px solid black;}
        .main{min-width: 850px;}
        .dent{text-align: center; margin-top: 3vh;}
        .dentinline{display: inline-block;}
    </style>
</head>
<body>
    <div class="main">
    <div class="dent form">
        <div class="dentinline">
            <h1>Pesquisa de produtos</h1>
            <form action="" method="GET">
                <label for="pesquisar">Pesquisar</label>
                <input type="text" id="pesquisar" name="pesquisa">
                <button type="submit">Pesquisar</button>
            </form>
        </div>
    </div>
    <div class="dent table">
        <div class="dentinline">
            <table>
                <?php if(isset($_GET['pesquisa'])){if($num_produtos>0){ ?>
                <thead>
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                </thead>
                <?php }} ?>
                <tbody>
                    <?php if(isset($_GET['pesquisa'])){if($num_produtos==0){ ?>
                    <tr>
                        <td colspan="5">Nenhum produto encontrado</td>
                    </tr>
                    <?php }} ?>
                    <?php if(!isset($_GET['pesquisa'])){ ?>
                    <tr>
                        <td colspan="5">Digite algo para ser pesquisado</td>
                    </tr>
                    <?php } ?>
                    <?php if(isset($_GET['pesquisa'])){if($num_produtos>0){ while($produtos = $sql_query->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $produtos['codigo']; ?></td>
                        <td><?php echo $produtos['nome']; ?></td>
                        <td><?php echo $produtos['descricao']; ?></td>
                        <td><?php echo $produtos['preco']; ?></td>
                        <td><?php echo $produtos['estoque']; ?></td>
                    </tr>
                    <?php }}} ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>
</html>