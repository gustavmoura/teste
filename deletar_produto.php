<?php
    if(!isset($_SESSION)) session_start();
    if(!isset($_SESSION['id'])) die('Voce não esta logado. <a href="/docs-gustavo/sistema/login.php">Clique aqui</a> para fazer login');

    require_once "conexao.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql_code = "DELETE FROM produto WHERE id='$id'";
        $db->query($sql_code) or die("Erro ao se comunicar com o banco de dados");
        header("Location: visualizar_produto.php");
        die();
    }else{
        header("Location: visualizar_produto.php");
        die();
    }
?>