<?php
    include('conexao.php');

    if(!isset($_SESSION)) {
        session_start();
    }

    if(!($_SESSION['funcao'] == "comissaoTecnica")) {
        header("Location: inicio");
        die();
    } else {
        $nomeEquipe = $_SESSION["equipe"];
        $emblema = $_SESSION["emblema"];

        $sql_nomesJogadoresEquipe = "SELECT cpf, fotoPerfil, nomeUsuario, numeroCamisa, gols, cartaoAmareloAtual, cartaoVermelhoAtual FROM usuarios WHERE equipe = '$nomeEquipe'";
        $query_dadosJogadoresEquipe = $mysqli->query($sql_nomesJogadoresEquipe) or die($mysqli->error);
    }

    if(count($_POST) > 0) {
        while($dadoJogador = $query_dadosJogadoresEquipe->fetch_assoc()) { 
            $cpf = $dadoJogador['cpf'];
            $nomeJogador = $dadoJogador['nomeUsuario'];

            $nroCamisa = $_POST['numeroCamisa'.$cpf];
            $numroCamisa = $mysqli->escape_string($nroCamisa);


        if($numroCamisa > 0 && $numroCamisa < 100) {
            $sql_codeNroCamisa = "UPDATE usuarios SET numeroCamisa = '$numroCamisa' WHERE nomeUsuario = '$nomeJogador'";
            $funcionou = $mysqli->query($sql_codeNroCamisa) or die($mysqli->error);
            }
        }
            if($funcionou) {
                header("Location: inicio");
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
    <link rel="stylesheet" href="ficha_atletasEquipe.css">
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
                            <li><a href="/citajag/inicio">Início</a></li>
                            <li><a href="/citajag/tabela_jogos">Tabela de Jogos</a></li>
                            <li><a href="/citajag/classificacao">Classificação</a></li>
                            <li><a href="/citajag/artilheiros">Artilheiros</a></li>
                            <li><a href="/citajag/login" <?php if(isset($_SESSION['usuario'])) { ?> style="display: none;" <?php } ?>>Login</a></li>
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

     <form action="" method="POST">
      <?php if(($_SESSION['funcao'] == "comissaoTecnica") || ($_SESSION['funcao'] == "comissaoTecnica,atleta")) { ?>
        <div class="div-numeroAtletas"> 
                <a>Ficha de Numeração dos Atletas: </a>
            <div class="container">
               <div class="cabecalho">
                <img class="emblemaEquipe" src=" <?php echo $emblema; ?> ">
                <a class="nomeEquipe"> <?php echo $nomeEquipe; ?> </a>
               </div>

                <?php if($query_dadosJogadoresEquipe->num_rows > 0) { 
                    while($dadoJogador = $query_dadosJogadoresEquipe->fetch_assoc()) { 
                        $cpf = $dadoJogador['cpf'];
                        $fotoPerfil = $dadoJogador['fotoPerfil'];
                        $nomeJogador = $dadoJogador['nomeUsuario'];
                        $numeroCamisa = $dadoJogador['numeroCamisa'];
                        $gols = $dadoJogador['gols'];
                        $cartaoAmarelo = $dadoJogador['cartaoAmareloAtual'];
                        $cartaoVermelho = $dadoJogador['cartaoVermelhoAtual'];
                ?>

                <p>
                    <div class="exterior">
                      <div class="interior">
                            <img class="fotoAtleta" src="<?php echo $fotoPerfil ?>">
                        
                            <div class="infos-atleta">
                                    <p <?php if($cartaoVermelho == 1) { ?> style="color: red;" <?php } ?> ><?php echo $nomeJogador ?> </p>
                                    <p class="p-gols"><?php echo $gols ?> <img class="gols" src="https://cdn.discordapp.com/attachments/750028167225540648/1111016853838504086/icons8-bola-de-futebol-2.gif"/></p>
                                    <p class="p-gols"><?php echo $cartaoAmarelo ?> <img class="cartao_amarelo" src="https://cdn.discordapp.com/attachments/750028167225540648/1056032748164350063/icons8-falta-48_1.png"/></p>
                                    <p class="p-gols"><?php echo $cartaoVermelho ?> <img class="cartao_vermelho" src="https://cdn.discordapp.com/attachments/750028167225540648/1056032624755351654/icons8-falta-48.png"/></p>
                                <label class="numero_label">Número da Camisa: </label>
                                <input class="numero_inputs" required type="number" name="numeroCamisa<?php echo $cpf?>" placeholder="Digite um número do 1 até 99" value="<?php echo $numeroCamisa ?>">
                            </div>
                      </div>
                </p>
                <?php } } ?>
            </div>
        </div>
        <?php } ?>
        <button class="button-salvar" type="submit">Salvar Numeração</button>
    </form>
</body>
</html>