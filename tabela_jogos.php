<?php
    include('conexao.php');
    if(!isset($_SESSION)) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn.discordapp.com/attachments/750028167225540648/963110597187235870/icone_appcjagforeground.png">
    <link rel="stylesheet" href="tabela_jogos.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <title>CitaJAG - Tabela de Jogos do Campeonato</title>
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
                            <li><a href="/carteira_atletas">Verificar Atletas</a></li>
                            <hr>
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
                            <?php if($_SESSION['funcao'] == "admin") { ?>
                            <li><a href="/pesquisa_atletas">Cadastrar/Alterar Jogadores</a></li>
                            <?php } ?>
                            <li><a href="/logout" <?php if(isset($_SESSION['usuario'])) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>Sair</a></li>
                        </div>
                    </ul>
                </div>
            <?php } else if(!isset($_SESSION['usuario'])) {
            ?>
                <div class="menuPC">
                        <input type="checkbox" id="checkPC">
                    <label for="checkPC" class="checkbtnPC">
                        <div class="alinhar-verticalPC">
                            <i class="fa-solid fa-bars" style="color: white;"></i>
                        </div>
                    </label>
                    <ul class="menu-opcoesPC">
                        <li><a href="/carteira_atletas">Verificar Atletas</a></li>
                        <hr>
                        <div class="funcao-sairPC">
                            <li><a href="/login" <?php if(isset($_SESSION['usuario'])) { ?> style="display: none;" <?php } ?>>Login</a></li>
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
                </ul>
        </nav>    
</header>
<main>
    <div id="inicio" class="inicio">
        <div class="anuncios">
            <div class="espaco_anuncios">
                <div class="carrossel" id="img"> 
                    <img class="carrossel-img" src="https://cdn.discordapp.com/attachments/750028167225540648/1169477434899451924/Dani.png" alt="Dani Culinária Saudável">
                    <img class="carrossel-img" src="https://cdn.discordapp.com/attachments/750028167225540648/1169481070857695354/camisa10_modelo3.gif" alt="Camisa 10">
                    <img class="carrossel-img" src="https://cdn.discordapp.com/attachments/750028167225540648/1121457674102513754/brikZHAnuncio.png" alt="Anuncie Aqui">
                    <img class="carrossel-img" src="https://cdn.discordapp.com/attachments/750028167225540648/1063559920001220659/anuncio2.png" alt="Anuncie Aqui">
                    <img class="carrossel-img" src="https://cdn.discordapp.com/attachments/750028167225540648/1166780394486636636/logo.png" alt="Anuncie Aqui">
                </div>
            </div>
    </div>
    <hr class="hr_anuncio">
    <p style="color: yellow;">ATENÇÃO! JOGOS E HORÁRIOS PODEM SOFRER ALTERAÇÕES!</p>
    <br>
    <p style="color: #daa520;">Valor do Ingresso R$5,00 e Crianças até 12 Anos não pagam!</p>
    <?php
        $sql_repetir = "SELECT DISTINCT rodada FROM tabela_jogos";
        $query_repetir = $mysqli->query($sql_repetir) or die($mysqli->error);

        $nroRodadas = $query_repetir->num_rows;
        
        for($i = 1; $i <= $nroRodadas; $i++) {
        $sql_dadosCabecalho = "SELECT data, rodada, horaRodada FROM tabela_jogos WHERE rodada = '$i'";
        $query_dadosCabecalho = $mysqli->query($sql_dadosCabecalho) or die($mysqli->error);

        $dados = $query_dadosCabecalho->fetch_assoc();
        $data = $dados['data'];
        $rodada = $dados['rodada'];
        $horaRodada = $dados['horaRodada'];
        
        $dataEstilizada = str_replace("-", "/", $data);
        $dataDia = date('d', strtotime($dataEstilizada));
        $dataMes = date('m', strtotime($dataEstilizada));
        $dataAno = date('Y', strtotime($dataEstilizada));
        $dataMesExtenso = date('F', strtotime($dataEstilizada));

        if($dataMesExtenso == "January") {
            $mesExtenso = "Janeiro";
        } else if($dataMesExtenso == "February") {
            $mesExtenso = "Fevereiro";
        } else if($dataMesExtenso == "March") {
            $mesExtenso = "Março";
        } else if($dataMesExtenso == "April") {
            $mesExtenso = "Abril";
        } else if($dataMesExtenso == "May") {
            $mesExtenso = "Maio";
        } else if($dataMesExtenso == "June") {
            $mesExtenso = "Junho";
        } else if($dataMesExtenso == "July") {
            $mesExtenso = "Julho";
        } else if($dataMesExtenso == "August") {
            $mesExtenso = "Agosto";
        } else if($dataMesExtenso == "September") {
            $mesExtenso = "Setembro";
        } else if($dataMesExtenso == "October") {
            $mesExtenso = "Outubro";
        } else if($dataMesExtenso == "November") {
            $mesExtenso = "Novembro";
        } else if($dataMesExtenso == "December") {
            $mesExtenso = "Dezembro";
        }

        date_default_timezone_set("America/Sao_Paulo"); 
        if (strftime("%A",strtotime($data)) == "Sunday") {
            $diaSemana = "DOMINGO";
        } else if (strftime("%A",strtotime($data)) == "Monday") {
            $diaSemana = "SEGUNDA-FEIRA";
        } else if (strftime("%A",strtotime($data)) == "Tuesday") {
            $diaSemana = "TERÇA-FEIRA";
        } else if (strftime("%A",strtotime($data)) == "Wednesday") {
            $diaSemana = "QUARTA-FEIRA";
        } else if (strftime("%A",strtotime($data)) == "Thursday") {
            $diaSemana = "QUINTA-FEIRA";
        } else if (strftime("%A",strtotime($data)) == "Friday") {
            $diaSemana = "SEXTA-FEIRA";
        } else if (strftime("%A",strtotime($data)) == "Saturday") {
            $diaSemana = "SÁBADO";
        }

        ?>

        <div class="tabelaClassificacao" id="tabelaClassificacao" style="display: block;">
            <!--<p class="nro-rodada"><?php echo $rodada."ª" ?> Rodada</p>-->
            <br>
            <hr/>
            <br>
             <table>
                <thead>
                <tr>
                    <th class="dia"><?php echo "Dia ".$dataDia." de ".$mesExtenso." de ".$dataAno." - ".$diaSemana; ?></th>
                    <th class="hora">Horário de Início: <?php echo $horaRodada ?></th>
                </tr>
                </thead>
             </table>
            <table>
            <thead>
            <tr>
            <div class="tabela">
                <th>Jogo</th>
                <th class="nomeHora">Hora</th>
                <th class="nomeCategoria">Categoria</th>
                <th>Equipe</th>
                <th>Casa</th>
                <th>Resultado</th>
                <th>Fora</th>
                <th>Equipe</th>
                <th>Súmula</th>
              </div>
            </tr>
            </thead>
        <?php 
            $sql_dadosTabelaJogos = "SELECT numeroJogo, horaJogo, categoria, equipeCasa, golsCasa, golsFora, equipeFora, data, rodada, horaRodada FROM tabela_jogos WHERE rodada = '$i' ORDER BY numeroJogo ASC";
            $query_dadosTabelaJogos = $mysqli->query($sql_dadosTabelaJogos) or die($mysqli->error);
        while($dados = $query_dadosTabelaJogos->fetch_assoc()) { 
                $numeroJogo = $dados['numeroJogo'];
                $horaJogo = $dados['horaJogo'];
                $categoria = $dados['categoria'];
                $equipeCasa = $dados['equipeCasa'];
                $golsCasa = $dados['golsCasa'];
                $golsFora = $dados['golsFora'];
                $equipeFora = $dados['equipeFora'];
                ?>
         <div class="dados_tabela">
            <tr>
                <td><?php echo $numeroJogo ?></td>
                <td><?php echo $horaJogo ?></td>
                <td><?php echo $categoria ?></td>
                <td><?php echo $equipeCasa ?></td>
                <td><?php echo $golsCasa ?></td>
                <td>X</td>
                <td><?php echo $golsFora ?></td>
                <td><?php echo $equipeFora ?></td>
                <td><a href="/sumulas/<?php echo $equipeCasa.'_'.$equipeFora.$dataDia.$dataMes.$dataAno; ?>.pdf"><img class="imgPDF" src="https://cdn.discordapp.com/attachments/750028167225540648/1164256003701874770/icons8-pdf-64.png"></a></td>
            </tr>
         </div>
         <?php } ?>
            </table>
            <br>
        </div>
        <?php } ?>
    </main>
    <script src="codes.js"></script>
</body>
</html>