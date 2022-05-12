<?php
    if(!isset($_SESSION)) session_start();
    if(!isset($_SESSION['id'])) die('Voce não esta logado. <a href="/docs-gustavo/sistema/login.php">Clique aqui</a> para fazer login');
    
    require_once "conexao.php";

    $sql_produto = "SELECT * FROM produto";
    $query_produto = $db->query($sql_produto) or die($db->error);
    $number_produto = $query_produto->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de produtos</title>
    <style>
        body {
            max-width: 100vw;
            max-height: 100vh;
            display: flex;
            justify-content: center;
            padding-top: 10vh;
        }
        h1 {text-align: center;}
        p{text-align: center;}
        td{border: 1px solid rgb(80, 75, 75); padding: 3px 5px;}
    </style>
</head>
<body>
    <main>
        <h1>Lista de Produtos</h1>
        <p>Este são os produtos cadastrados no seu sistema:</p>
        <table>
        <?php if($number_produto > 0){ ?>
            <thead>
                <th>CODIGO</th>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Preco</th>
                <th>Estoque</th>
                <th>Ações</th>
            </thead>
        <?php } ?>
            <tbody>
                <?php if($number_produto == 0){ ?>
                    <tr>
                        <td colspan="6">Nenhum produto foi cadastrado</td>
                    </tr>
                <?php } else{ 
                    while($produto = $query_produto->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $produto['codigo']; ?></td>
                    <td><?php echo $produto['nome']; ?></td>
                    <td><?php echo $produto['descricao']; ?></td>
                    <td><?php echo $produto['preco']; ?></td>
                    <td><?php echo $produto['estoque']; ?></td>
                    <td>
                        <a href="editar_produto.php?id=<?php echo $produto['id']; ?>">Editar</a>
                        <a href="deletar_produto.php?id=<?php echo $produto['id']; ?>">Deletar</a>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
    </main>
</body>
</html>