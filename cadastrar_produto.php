<?php
    if(!isset($_SESSION)) session_start();
    if(!isset($_SESSION['id'])) die('Voce não esta logado. <a href="/docs-gustavo/sistema/login.php">Clique aqui</a> para fazer login');

    require_once "conexao.php";

    if(isset($_POST['codigo']) && isset($_POST['nome']) && isset($_POST['descricao']) && isset($_POST['preco']) && isset($_POST['estoque'])){
        //recebendo valores
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $estoque = $_POST['estoque'];

        $sql = "INSERT INTO produto (codigo,nome,descricao,preco,estoque) VALUES ('$codigo','$nome','$descricao','$preco','$estoque')";
        $verific = $db->query($sql) or die("Erro ao se comunicar com o banco de daodos");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de clientes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Cadastro de Produtos</h1>
        <form action="" method="POST">
            <div class="main">
                <div class="div_segura">
                    <label for="codigo">Codigo</label>
                    <input type="number" id="codigo" name="codigo" required>
                </div>
            </div>

            <div class="main">
                <div class="div_segura">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" required>
                </div>
            </div>

            <div class="main">
                <div class="div_segura">
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" id="descricao" required>
                </div>
            </div>

            <div class="main">
                <div class="div_segura">
                    <label for="preco">Preço</label>
                    <input type="number" name="preco" id="preco" required>
                </div>
            </div>

            <div class="main">
                <div class="div_segura">
                    <label for="estoque">Estoque</label>
                    <input type="text" name="estoque" id="estoque" required>
                </div>
            </div>

            <div class="main">
                <div class="div_segura">
                    <button type="submit">Cadastrar</button>
                </div>
            </div>
        </form>
    </main>
</body>
</html>