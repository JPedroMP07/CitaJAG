<?php 
    include('conexao.php');
    include('send.php');
    if(!isset($_SESSION)) {
        session_start();
    }

    if(isset($_SESSION['usuario'])) {
        header("Location: inicio");
        die();
    }

    if(isset($_POST['email'])) {
        $email = $mysqli->escape_string($_POST['email']);

        $sql_code = "SELECT nomeUsuario, email FROM usuarios WHERE email = '$email'";
        $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

        $usuario = $sql_query->fetch_assoc();

        if($sql_query->num_rows == 0) {
            echo "E-mail não Cadastrado";
        } else {
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['nome'] = $usuario['nomeUsuario'];
            $email = $_SESSION['email'];
            $nome = $_SESSION['nome'];

            $cod = rand(100000, 999999);
            $_SESSION['cod'] = $cod;

            $assunto = "Código para Redefinição de Senha - CitaJAG";
            $corpo = '<table align="center" style="background-color: #000; color: #FFF; padding: 16px;">
                      <tr>
                      <th><img class="logo" align="center" style="width: 180px;" src="https://cdn.discordapp.com/attachments/750028167225540648/963110573829128222/logocitajagtelaini.png"></th>
                      </tr>
                      <tr>
                          <td align="center"><p style="font-size: 1.4rem;">Olá ' . $nome . ', esse é o código para redefinir sua senha, insira-o na caixa de texto no CitaJAG e você será redirecionado para redefinir sua senha!</p></td>
                      </tr>
                      <tr>
                        <td align="center"><p style="font-size: 1.8rem; color: rgb(182, 182, 182); font-weight: 700 ;">' . $cod . '</p></td>
                      </tr>
                      <tr>
                        <td align="center"><p style="font-size: 1.2rem; color: red; font-weight: 500 ;">Atenção! Esse é um código único, portanto não o compartilhe com ninguém!</p></td>
                      </tr>
                      </table>';

            enviarEmail($email, $nome, $assunto, $corpo, $cod);

            unset($_SESSION['nome']);
            header("Location: confirmar_email");
            die();
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
    <div class="container" id="container_email" style="display: flex;">
        <img class="logo_login" src="https://cdn.discordapp.com/attachments/750028167225540648/963110573829128222/logocitajagtelaini.png">
            <div class="area_login">
                <form action="" method="POST">
                    <p class="area_email">                 
                        <label>Digite seu E-mail Cadastrado</label>
                        <input type="email" required name="email" placeholder="Digite seu E-mail"/>
                    </p>
                    <button class="button-cadastrar" id="button_email" type="submit">Continuar</button>                    
                </form>
            </div>
    </div>
</body>
</html>