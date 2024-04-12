<?php
    include('conexao.php');
    include('send.php');
 
    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION['email']) && !isset($_SESSION['cod'])) {
        header("Location: login");
        die();
    }

    $cod = $_SESSION['cod'];

    if(isset($_POST['code']) && $_POST['code'] == $cod) {
        unset($_SESSION['cod']);
        header("Location: redefinir_senha");
        die();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn.discordapp.com/attachments/750028167225540648/963110597187235870/icone_appcjagforeground.png">

    <link rel="stylesheet" href="login.css">
    <title>Alterar Senha - CitaJAG</title>
</head>
<body>
<header class="navigator-bar">
    <nav>
        <p>
            <img class="logo" src="https://cdn.discordapp.com/attachments/750028167225540648/963110573829128222/logocitajagtelaini.png">
        </p>
            <div class="opcoes_navegacao">
                <a href="/login">Voltar</a>
            </div>
    </nav>
</header>
        <div class="container" id="container_cod" style="display: flex;">
            <img class="logo_login" src="https://cdn.discordapp.com/attachments/750028167225540648/963110573829128222/logocitajagtelaini.png">
                <div class="area_login">
                    <form action="" method="POST">
                        <p class="area_email">
                            <label>Digite o código enviado para seu e-mail:</label>
                            <input type="number" required name="code" placeholder="Digite o código"/>
                        </p>
                        <button class="button-cadastrar" type="submit">Verificar</button>
                        
                    </form>
                </div>
        </div>
</body>
</html>