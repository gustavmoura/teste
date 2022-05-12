<?php
    require_once "conexao.php";

    if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])){
        $n = $_POST['nome']; $e = $_POST['email']; $s = $_POST['senha'];
        $sc = password_hash($s,PASSWORD_DEFAULT);

        $sql = "INSERT INTO login (nome,email,senha) VALUES ('$n','$e','$sc')";
        $verific = $db->query($sql) or die("Erro na comunicação com o banco de dados");
        if($verific){
            unset($_POST);
            header("Location: login.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastrar usuario</title>
</head>
<body>
    <main>
        <h1>Cadastar user</h1>
        <form action="" method="POST">
            <div class="main">
                <div class="div_segura">
                    <label for="nome">Nome</label><input type="text" id="nome" name="nome" required>
                    <label for="email">E-mail</label><input type="email" id="email" name="email" required>
                    <label for="senha">Senha</label><input type="password" id="senha" name="senha" required>
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