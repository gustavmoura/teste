<?php
    require_once "conexao.php";

    $unc = false;
    $sic = false;
    if(isset($_POST['email']) && isset($_POST['senha'])){
        $em = $_POST['email']; $se = $_POST['senha'];
        $sql_ver = "SELECT * FROM login WHERE email='$em'";
        $resultado = $db->query($sql_ver);

        if($resultado->num_rows == 1){
            $res = $resultado->fetch_assoc() or die($db->error);
            if(password_verify($se,$res['senha'])){
                if(!isset($_SESSION)) session_start();
                $_SESSION['id'] = $res['id'];
                header("Location:home.php");
            }else{$sic = true;}
        } else { $unc = true; unset($_POST);}
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Verificar</title>
</head>
<body>
    <main>
        <h1>Fazer login</h1>
        <form action="" method="POST">
            <div class="main">
                <div class="div_segura">
                    <label for="email">E-mail</label><input type="email" id="email" name="email" required>
                    <label for="senha">Senha</label><input type="password" id="senha" name="senha" required>
                </div>
            </div>
            <div class="main">
                <div class="div_segura">
                    <button type="submit">Login</button>
                </div>
            </div>
            <div class="main">
                <div class="div_segura">
                    <a href="cadastrar_login.php">Cadastrar</a>
                </div>
            </div>
            <?php if($unc){ ?>
                <div class="main">
                    <div class="div_segura">
                        <p>Usuario não cadastrado <a href="cadastrar_login.php">Clique aqui</a> para fazer cadastro</p>
                    </div>
                </div>
            <?php } ?>
            <?php if($sic){ ?>
                <div class="main">
                    <div class="div_segura">
                        <p>Senha incorreta</p>
                    </div>
                </div>
            <?php } ?>
        </form>
    </main>
</body>
</html>