<?php
include('conexao.php');

if(!isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION['usuario'])) {
    header("Location: inicio");
    die();
}

if(isset($_POST['email']) && isset($_POST['senha'])) {
    include('conexao.php');

    $email = $mysqli->escape_string($_POST['email']);
    $senha = $mysqli->escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

    $erro = false;
    if($sql_query->num_rows == 0) {
        echo "E-mail incorreto";
    } else {
        $usuario = $sql_query->fetch_assoc();
        if(!password_verify($senha, $usuario['senha'])){
            echo "Senha incorreta";
        } else {
            if(!isset($_SESSION)){
                session_start();
            }
                $_SESSION['usuario'] = $usuario['idUsuario'];
                $_SESSION['fotoPerfil'] = $usuario['fotoPerfil'];
                $_SESSION['funcao'] = $usuario['funcao'];
                $_SESSION['equipe'] = $usuario['equipe'];
                $_SESSION['emblema'] = $usuario['emblema'];
                $_SESSION['categoria'] = $usuario['categoria'];

                header("Location: inicio");
                die();
        }
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
    <title>Logar no CitaJAG</title>
</head>
<body>
<header class="navigator-bar">
    <nav>
        <p>
            <img class="logo" src="https://cdn.discordapp.com/attachments/750028167225540648/963110573829128222/logocitajagtelaini.png">
        </p>
            <div class="opcoes_navegacao">
                <a href="/inicio">Voltar ao Início</a>
            </div>
    </nav>
</header>
    <div class="container">
        <img class="logo_login" src="https://cdn.discordapp.com/attachments/750028167225540648/963110573829128222/logocitajagtelaini.png">
            <div class="area_login">
                <form action="" method="POST">
                    <p class="area_email">                 
                        <label>Digite seu E-mail</label>
                        <input type="email" name="email" placeholder="E-mail"/>
                    </p>
                    <p class="area_senha">
                        <label>Digite sua Senha</label>
                        <input type="password" name="senha" placeholder="Senha"/>
                    </p>
                    <button class="button-cadastrar" type="submit">Entrar</button>
                    <p class="redefinir-senha">Esqueceu sua senha? <a href="/esqueceu_senha">Redefinir Senha</a></p>
                </form>
            </div>

            <!--<p class="cadastrar">Não possui uma conta? <a href="/cadastro">Cadastre-se!</a></p>-->
    </div>
</body>
</html>