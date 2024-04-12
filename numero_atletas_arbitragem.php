<?php
    include('conexao.php');

    if(!isset($_SESSION)) {
        session_start();
    }

    if(!($_SESSION['funcao'] == "arbitragem") && !($_SESSION['funcao'] == "admin")) {
        header("Location: inicio");
        die();
    } else {
        $nomeEquipeCasa = $_SESSION["equipeCasa"];
        $emblemaCasa = $_SESSION["emblemaCasa"];
        $nomeEquipeVis = $_SESSION["equipeVisitante"];
        $emblemaVis = $_SESSION["emblemaVisitante"];
        $categoria = $_SESSION["categoria"];

        $sql_nomesJogadoresEquipeCasa = "SELECT docIdentidade, fotoPerfil, nomeUsuario, numeroCamisa, gols, cartaoAmareloAtual, cartaoVermelhoAtual, funcao FROM usuarios WHERE equipe = '$nomeEquipeCasa' AND categoria = '$categoria'";
        $query_dadosJogadoresEquipeCasa = $mysqli->query($sql_nomesJogadoresEquipeCasa) or die($mysqli->error);

        $sql_nomesJogadoresEquipeVis = "SELECT docIdentidade, fotoPerfil, nomeUsuario, numeroCamisa, gols, cartaoAmareloAtual, cartaoVermelhoAtual, funcao FROM usuarios WHERE equipe = '$nomeEquipeVis' AND categoria = '$categoria'";
        $query_dadosJogadoresEquipeVis = $mysqli->query($sql_nomesJogadoresEquipeVis) or die($mysqli->error);
    }

    if(count($_POST) > 0) {
        while($dadoJogador = $query_dadosJogadoresEquipeCasa->fetch_assoc()) { 
            $docIdentidade = $dadoJogador['docIdentidade'];
            $nomeJogador = $dadoJogador['nomeUsuario'];
            $funcao = $dadoJogador['funcao'];

            $nroCamisa = $_POST['numeroCamisa'.$docIdentidade];
            $numroCamisa = $mysqli->escape_string($nroCamisa);
            $joga = $_POST['joga'.$docIdentidade];

            if($funcao == "comissaoTecnica") {
                $funcao_comissao = $_POST['funcao'.$docIdentidade];
            } else {
                $funcao_comissao = "NA";
            }

        if(($numroCamisa >= 0 && $numroCamisa < 100) || $numeroCamisa == "comissao") {
            $sql_codeNroCamisa = "UPDATE usuarios SET numeroCamisa = '$numroCamisa', joga = '$joga', funcao_comissao = '$funcao_comissao' WHERE nomeUsuario = '$nomeJogador'";
            $funcionou = $mysqli->query($sql_codeNroCamisa) or die($mysqli->error);
            }
        }
    }

    if(count($_POST) > 0) {
        while($dadoJogador = $query_dadosJogadoresEquipeVis->fetch_assoc()) { 
            $docIdentidade = $dadoJogador['docIdentidade'];
            $nomeJogador = $dadoJogador['nomeUsuario'];
            $funcao = $dadoJogador['funcao'];

            $nroCamisa = $_POST['numeroCamisa'.$docIdentidade];
            $numroCamisa = $mysqli->escape_string($nroCamisa);
            $joga = $_POST['joga'.$docIdentidade];

            if($funcao == "comissaoTecnica") {
                $funcao_comissao = $_POST['funcao'.$docIdentidade];
            } else {
                $funcao_comissao = "NA";
            }

            echo "Vis".$joga;

            if(($numroCamisa >= 0 && $numroCamisa < 100) || $numeroCamisa == "comissao") {
                $sql_codeNroCamisa = "UPDATE usuarios SET numeroCamisa = '$numroCamisa', joga = '$joga', funcao_comissao = '$funcao_comissao' WHERE nomeUsuario = '$nomeJogador'";
                $funcionou = $mysqli->query($sql_codeNroCamisa) or die($mysqli->error);
                }
        }
            if($funcionou) {
                header("Location: sumula");
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
    <?php echo "Teste: ".$categoria; ?>
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
                        <li><a href="/citajag/perfil"<?php if(isset($_SESSION['usuario'])) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>Perfil</a></li>
                        <hr <?php if(isset($_SESSION['usuario'])) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>
                    <div class="mais-opcoes">
                        <li><a href="/citajag/inicio">Início</a></li>
                        <li><a href="/citajag/tabela_jogos">Tabela de Jogos</a></li>
                        <li><a href="/citajag/classificacao">Classificação</a></li>
                        <li><a href="/citajag/artilheiros">Artilheiros</a></li>
                    </div>
                        <div class="funcao-sair">
                            <?php if($_SESSION['funcao'] == "comissaoTecnica" || $_SESSION['funcao'] == "admin" || $_SESSION['funcao'] == "comissaoTecnica,atleta") { ?>
                            <li><a href="/citajag/carteira_atletas">Verificar Atletas</a></li>
                            <?php } ?>
                            <?php if($_SESSION['funcao'] == "comissaoTecnica" || $_SESSION['funcao'] == "admin" || $_SESSION['funcao'] == "comissaoTecnica,atleta") { ?>
                            <li><a href="/citajag/numero_atletas">Número dos Atletas</a></li>
                            <?php } ?>
                            <?php if($_SESSION['funcao'] == "arbitragem" || $_SESSION['funcao'] == "admin") { ?>
                            <li><a href="/citajag/gerarSumula">Gerar Súmula</a></li>
                            <?php } ?>
                            <?php if($_SESSION['funcao'] == "admin") { ?>
                            <li><a href="/citajag/cadastrar_equipes">Cadastrar Equipes</a></li>
                            <?php } ?>
                            <li><a href="/citajag/logout" <?php if(isset($_SESSION['usuario'])) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>Sair</a></li>
                        </div>
                    </ul>
                </div>
            <?php } ?>
            <label>
                <img class="logo" src="https://cdn.discordapp.com/attachments/750028167225540648/963110573829128222/logocitajagtelaini.png">
            </label>
                <ul class="opcoes_navegacao">
                        <li><a href="/citajag/inicio">Início</a></li>
                        <li><a href="/citajag/tabela_jogos">Tabela de Jogos</a></li>
                        <li><a href="/citajag/classificacao">Classificação</a></li>
                        <li><a href="/citajag/artilheiros">Artilheiros</a></li>
                      <label class="btnlogin">
                        <li><a href="/citajag/login" <?php if(isset($_SESSION['usuario'])) { ?> style="display: none;" <?php } ?>>Login</a></li>
                      </label>
                </ul>                    
        </nav>
    </header>
<body>

        <form action="" method="POST">
      <?php if(($_SESSION['funcao'] == "arbitragem" || $_SESSION['funcao'] == "admin")) { ?>
        <div class="div-numeroAtletas"> 
                <a>Ficha de Numeração dos Atletas da Equipe da Casa: </a>
            <div class="container">
               <div class="cabecalho">
                <img class="emblemaEquipe" src=" <?php echo $emblemaCasa; ?> ">
                <a class="nomeEquipe"> <?php echo $nomeEquipeCasa; ?> </a>
               </div>

                <?php if($query_dadosJogadoresEquipeCasa->num_rows > 0) { 
                    while($dadoJogador = $query_dadosJogadoresEquipeCasa->fetch_assoc()) { 
                        $docIdentidade = $dadoJogador['docIdentidade'];
                        $fotoPerfil = $dadoJogador['fotoPerfil'];
                        $nomeJogador = $dadoJogador['nomeUsuario'];
                        $numeroCamisa = $dadoJogador['numeroCamisa'];
                        $gols = $dadoJogador['gols'];
                        $cartaoAmarelo = $dadoJogador['cartaoAmareloAtual'];
                        $cartaoVermelho = $dadoJogador['cartaoVermelhoAtual'];
                        $funcao = $dadoJogador['funcao'];
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
                                <input class="numero_inputs" required type="number" name="numeroCamisa<?php echo $docIdentidade?>" placeholder="Digite um número do 1 até 99" value="<?php echo $numeroCamisa ?>">
                                <label class="joga">O atleta/membro da comissão está presente?</label>
                                <select class="select-joga" name="joga<?php echo $docIdentidade?>" id="joga<?php echo $docIdentidade ?>">
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                                <?php if($funcao == "comissaoTecnica") { ?>
                                <label for="funcao">Qual a função desse membro da comissão?</label>
                                <select class="select-funcao" name="funcao<?php echo $docIdentidade?>" id="funcao<?php echo $docIdentidade ?>">
                                    <option value=" ">Escolha uma opção</option>
                                    <option value="Tec">Técnico</option>
                                    <option value="Aux">Auxiliar</option>
                                    <option value="Mas">Massagista</option>
                                </select>
                                <?php } ?>
                            </div>
                      </div>
                </p>
                <?php } } ?>
            </div>
        </div>

        <div class="div-numeroAtletas"> 
                <a>Ficha de Numeração dos Atletas da Equipe Visitante: </a>
            <div class="container">
               <div class="cabecalho">
                <img class="emblemaEquipe" src=" <?php echo $emblemaVis; ?> ">
                <a class="nomeEquipe"> <?php echo $nomeEquipeVis; ?> </a>
               </div>

                <?php if($query_dadosJogadoresEquipeVis->num_rows > 0) { 
                    while($dadoJogador = $query_dadosJogadoresEquipeVis->fetch_assoc()) { 
                        $docIdentidade = $dadoJogador['docIdentidade'];
                        $fotoPerfil = $dadoJogador['fotoPerfil'];
                        $nomeJogador = $dadoJogador['nomeUsuario'];
                        $numeroCamisa = $dadoJogador['numeroCamisa'];
                        $gols = $dadoJogador['gols'];
                        $cartaoAmarelo = $dadoJogador['cartaoAmareloAtual'];
                        $cartaoVermelho = $dadoJogador['cartaoVermelhoAtual'];
                        $funcao = $dadoJogador['funcao'];
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
                                <input class="numero_inputs" required type="number" name="numeroCamisa<?php echo $docIdentidade?>" placeholder="Digite um número do 1 até 99" value="<?php echo $numeroCamisa ?>">
                                <label class="joga">O atleta/membro da comissão está presente?</label>
                                <select class="select-joga" name="joga<?php echo $docIdentidade?>" id="joga<?php echo $docIdentidade ?>">
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                                <?php if($funcao == "comissaoTecnica") { ?>
                                <label for="funcao">Qual a função desse membro da comissão?</label>
                                <select class="select-funcao" name="funcao<?php echo $docIdentidade?>" id="funcao<?php echo $docIdentidade ?>">
                                    <option value=" ">Escolha uma opção</option>
                                    <option value="Tec">Técnico</option>
                                    <option value="Aux">Auxiliar</option>
                                    <option value="Mas">Massagista</option>
                                </select>
                                <?php } ?>
                            </div>
                      </div>
                </p>
                <?php } } ?>
            </div>
        </div>
        <?php } ?>
        <button class="button-salvar" type="submit">Salvar Numeração</button>
    </form>
   <?php "teste".$categoria ?>
   </body>
</html>