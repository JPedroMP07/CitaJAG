<?php 
    include('conexao.php');

    if(!isset($_SESSION)) {
        session_start();
    }

    $cpf = $_SESSION['cpf'];

    if(isset($_SESSION)) {
        $sql_dadosPerfil = "SELECT fotoPerfil, nomeUsuario, dataNascimento, cpf, rgFrente, rgVerso, equipe, categoria, emblema FROM usuarios WHERE cpf = '$cpf'";
        $query_dadosPerfil = $mysqli->query($sql_dadosPerfil) or die($mysqli->error);
    }

    if(count($_POST)>0) {
        echo "teste";
        if(isset($_FILES['fotoPerfil'])) {
            echo "TESTE";
            $arquivoFotoPerfil = $_FILES['fotoPerfil'];

            if($arquivoFotoPerfil['error']) {
                die('Não foi possível atualizar sua foto de perfil, tente novamente!');
            }

            if($arquivoFotoPerfil['size'] > 4097152) {
                die("Arquivo muito grande! Máximo de 4MB!");
            }

            $pasta = "arquivos/";
            $nomeArquivoFotoPerfil = $arquivoFotoPerfil['name'];
            $novonomeArquivoFotoPerfil = uniqid();
            $extensaoFotoPerfil = strtolower(pathinfo($nomeArquivoFotoPerfil, PATHINFO_EXTENSION));

            echo $nomeArquivoFotoPerfil;
            echo $extensaoFotoPerfil;
            if($extensaoFotoPerfil != "jpg" && $extensaoFotoPerfil != "png") {
                die("Tipo de arquivo inválido!");
            }

            $pathFotoPerfil = $pasta . $novonomeArquivoFotoPerfil . "." . $extensaoFotoPerfil;
            $deu_certo = move_uploaded_file($arquivoFotoPerfil["tmp_name"], $pathFotoPerfil);
            echo $pathFotoPerfil;

            $sql_update = "UPDATE usuarios SET fotoPerfil = '$pathFotoPerfil' WHERE cpf = '$cpf'";
            $funcionou_update = $mysqli->query($sql_update) or die($mysqli->error);
            echo $funcionou_update;
                if($funcionou_update) {
                    $dados = $query_dadosPerfil->fetch_assoc();
                    $foto = $dados['fotoPerfil'];
                    $cpf = $dados['cpf'];
                    $imagemDeletada = $foto;
                    $deletaFoto = unlink($imagemDeletada);

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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="perfil.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="icon" href="https://cdn.discordapp.com/attachments/750028167225540648/963110597187235870/icone_appcjagforeground.png">
    <title>CitaJAG - Campeonato Citadino de Jaguarão</title>
</head>
<body>
    <header class="navigator-bar">
        <nav>

          <?php if(!isset($_SESSION['usuario'])) { ?>
                <div class="menu-deslogado" style="display: block;">
                    <input type="checkbox" id="check">
                    <label for="check" class="checkbtn-deslogado">
                            <i class="fa-solid fa-bars" style="color: white;"></i>
                    </label>
                    <ul class="menu-opcoes">
                        <div class="mais-opcoes">
                            <li><a href="/inicio">Início</a></li>
                            <li><a href="/tabela_jogos">Tabela de Jogos</a></li>
                            <li><a href="/classificacao">Classificação</a></li>
                            <li><a href="/artilheiros">Artilheiros</a></li>
                            <li><a href="/login" <?php if(isset($_SESSION['usuario'])) { ?> style="display: none;" <?php } ?>>Login</a></li>
                        </div>
                    </ul>
                </div>

          <?php } ?>

          <?php if(isset($_SESSION['usuario'])) { 
                $fotoPerfil = $_SESSION['fotoPerfil'];
            ?>
                <div class="menu">
                        <input type="checkbox" id="check">
                    <label for="check" class="checkbtn">
                        <div class="alinhar-vertical">
                            <i class="fa-solid fa-bars" style="color: white;"></i>
                            <img class="img-perfil" src="<?php echo $fotoPerfil; ?>">
                        </div>
                    </label>
                    <ul class="menu-opcoes">
                        <li><a href="/perfil"<?php if(isset($_SESSION['usuario'])) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>Perfil</a></li>
                        <hr <?php if(isset($_SESSION['usuario'])) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>
                    <div class="mais-opcoes">
                        <li><a href="/inicio">Início</a></li>
                        <li><a href="/tabela_jogos">Tabela de Jogos</a></li>
                        <li><a href="/classificacao">Classificação</a></li>
                        <li><a href="/artilheiros">Artilheiros</a></li>
                    </div>
                        <div class="funcao-sair">
                            <?php if($_SESSION['funcao'] == "comissaoTecnica" || $_SESSION['funcao'] == "admin" || $_SESSION['funcao'] == "comissaoTecnica,atleta") { ?>
                            <li><a href="/carteira_atletas">Verificar Atletas</a></li>
                            <?php } ?>
                            <?php if($_SESSION['funcao'] == "comissaoTecnica" || $_SESSION['funcao'] == "admin" || $_SESSION['funcao'] == "comissaoTecnica,atleta") { ?>
                            <li><a href="/numero_atletas">Número dos Atletas</a></li>
                            <?php } ?>
                            <?php if($_SESSION['funcao'] == "arbitragem" || $_SESSION['funcao'] == "admin") { ?>
                            <li><a href="/gerarSumula">Gerar Súmula</a></li>
                            <?php } ?>
                            <?php if($_SESSION['funcao'] == "admin") { ?>
                            <li><a href="/cadastrar_equipes">Cadastrar Equipes</a></li>
                            <?php } ?>
                            <li><a href="/logout" <?php if(isset($_SESSION['usuario'])) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>Sair</a></li>
                        </div>
                    </ul>
                </div>
            <?php } ?>
            <label>
                <img class="logo" src="https://cdn.discordapp.com/attachments/750028167225540648/963110573829128222/logocitajagtelaini.png">
            </label>
                <ul class="opcoes_navegacao">
                        <li><a href="/inicio">Início</a></li>
                        <li><a href="/tabela_jogos">Tabela de Jogos</a></li>
                        <li><a href="/classificacao">Classificação</a></li>
                        <li><a href="/artilheiros">Artilheiros</a></li>
                      <label class="btnlogin">
                        <li><a href="/login" <?php if(isset($_SESSION['usuario'])) { ?> style="display: none;" <?php } ?>>Login</a></li>
                      </label>
                </ul>                    
        </nav>
    </header>
<body>
    <?php
        while($carteira = $query_dadosPerfil->fetch_assoc()) { 
        $fotoPerfil = $carteira['fotoPerfil'];
        $nome = $carteira['nomeUsuario'];
        $dataNascimento = $carteira['dataNascimento'];

        //Calcula idade
        $anoNascimento = date("Y", strtotime($dataNascimento));
        $hoje = date('Y');
        $idade = $hoje - $anoNascimento;

        $cpf = $carteira['cpf'];
        $rgFrente = $carteira['rgFrente'];
        $rgVerso = $carteira['rgVerso'];
        $equipe = $carteira['equipe'];
        $categoria = $carteira['categoria'];
        $emblema = $carteira['emblema'];
    ?>
        <div class="carteira-atleta">
         <div class="valores">
                <div class="interior">
                    <img class="fotoAtleta" src="<?php echo $fotoPerfil; ?>">
                    <div class="infos-atleta">
                        <p><?php echo $nome; ?></p>
                    <div class="idade">
                        <p><?php echo $dataNascimento; ?></p>
                        <p>&nbsp;| <?php echo $idade; ?></p>
                    </div>
                        <p><?php echo $cpf; ?></p>
                    <div class="rg">
                        <a class="aRG" href="<?php echo $rgFrente; ?>">RG Frente&nbsp;</a>
                        <p>|</p>
                        <a class="aRG" href="<?php echo $rgVerso ?>">&nbsp;RG Verso</a>
                    </div>
                    </div>
                </div>
                <div class="equipe">
                <p><?php echo $equipe ?></p>
                <p>&nbsp;- <?php echo $categoria ?></p>
                <img class="fotoClube" src="<?php echo $emblema; ?>">
            </div>
         </div>
        </div>
    <?php } ?>

    <div class="container">
        <p>Alterar dados: </p>
        <form enctype="multipart/form-data" action="" method="POST">
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario" placeholder="Digite seu nome completo" value="<?php echo $nome; ?>">
            </p>
            <p>Alterar Foto de Perfil: </p>
            <p>
                <label class="cadastro_label">Envie a nova imagem:</label>
                <input class="alterar-fotoPerfil" required type="file" name="fotoPerfil" accept=".jpg, .png">
            </p>
            <button class="button-cadastrar" type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>