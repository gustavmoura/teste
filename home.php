<?php
    if(!isset($_SESSION)) session_start();
    if(isset($_POST['btn'])){ if(!isset($_SESSION)) session_start(); session_destroy();}
    if(!isset($_SESSION['id'])){header("Location: login.php");die();}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Voce esta na pagina HOME</h1>
    <a href="cadastrar_produto.php">Cadastrar produtos</a>
    <form action="" method="POST"><button type="submit" name="btn">Sair</button></form>
</body>
</html>