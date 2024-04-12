<?php 
include('conexao.php');

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['email']) && !isset($_SESSION['cod'])) {
    header("Location: login");
    die();
}

if(isset($_POST['senha'])) {
    $email = $_SESSION['email'];
    $senha = $mysqli->escape_string(password_hash($_POST['senha'], PASSWORD_DEFAULT));

    $sql_code = "UPDATE usuarios SET senha = '$senha' WHERE email = '$email'";
    $funcionou = $mysqli->query($sql_code) or die($mysqli->error);
    if($funcionou) {
        if(session_destroy()) {
            header("Location: login");
            die();
        }
    } else {
        echo "Erro Inesperado";
    }
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
                            <label>Insira sua nova senha: </label>
                            <input type="password" required name="senha" placeholder="Nova senha"/>
                        </p>
                        <button class="button-cadastrar" type="submit">Alterar</button>
                    </form>
                </div>
        </div>
</body>
</html>