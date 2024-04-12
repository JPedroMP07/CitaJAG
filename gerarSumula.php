<?php
    include('conexao.php');
    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION['usuario'])) {
        header("Location: inicio");
        die();
     }
    
     if(!($_SESSION['funcao'] == "arbitragem") && !($_SESSION['funcao'] == "admin")) {
        header("Location: inicio");
        die();
     }

     if ($_SESSION['funcao'] == "admin" || $_SESSION['funcao'] == "arbitragem") {
        $sql_todasCategorias = "SELECT DISTINCT categoria FROM equipes ORDER BY categoria='Veterano', categoria='Feminino', categoria='Bronze', categoria='Prata', categoria='Ouro', categoria='Sub15', categoria='Sub13', categoria='Sub11', categoria='Sub9', categoria='Sub7'";
        $query_todasCategorias = $mysqli->query($sql_todasCategorias) or die($mysqli->error);
     }

     if(count($_POST)>1) {
        if($_POST["nomeEquipeCasa"] != '' && $_POST["nomeEquipeVisitante"] != '') {
            $equipeCasa = $mysqli->escape_string($_POST["nomeEquipeCasa"]);
            $equipeVisitante = $mysqli->escape_string($_POST["nomeEquipeVisitante"]);
            $categoria = $mysqli->escape_string($_POST["categoria"]);

            $_SESSION["equipeCasa"] = $equipeCasa;
            $_SESSION["equipeVisitante"] = $equipeVisitante;
            $_SESSION["categoria"] = $categoria;

            $sql_codeEmblemaCasa = "SELECT emblema FROM equipes WHERE nomeEquipe = '$equipeCasa'";
            $query_emblemaCasa = $mysqli->query($sql_codeEmblemaCasa) or die($mysqli->error);
            $emblema = $query_emblemaCasa->fetch_assoc();
            $emblemaCasa = $emblema['emblema'];
            $_SESSION['emblemaCasa'] = $emblemaCasa;

            $sql_codeEmblemaVisitante = "SELECT emblema FROM equipes WHERE nomeEquipe = '$equipeVisitante'";
            $query_emblemaVisitante = $mysqli->query($sql_codeEmblemaVisitante) or die($mysqli->error);
            $emblemaVis = $query_emblemaVisitante->fetch_assoc();
            $emblemaVisitante = $emblemaVis['emblema'];
            $_SESSION['emblemaVisitante'] = $emblemaVisitante;

            header("Location: numero_atletas_arbitragem");
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
    <link rel="stylesheet" href="gerarSumula.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="icon" href="https://cdn.discordapp.com/attachments/750028167225540648/963110597187235870/icone_appcjagforeground.png">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1561129739918528"
     crossorigin="anonymous"></script>
    <title>CitaJAG - Súmula Online</title>
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
       <main>
        <form action="" method="POST">
                <div class="selectCategoria">
                        <label>Escolha uma Categoria: </label>
                        <select class="select-equipe" name="categoria" id="nomeCategoria">
                            <option value="">Escolha uma Categoria</option>
                            <?php if(isset($query_todasCategorias)) {
                                    while($select = $query_todasCategorias->fetch_assoc()) { 
                                        $categoria = $select['categoria'];
                            ?>
                            <option value="<?php echo $categoria ?>">
                            <?php echo $categoria ?>
                            </option>
                            <?php  } } ?>
                            <?php if(isset($query_equipesTreinador)) {
                                    while($select = $query_equipesTreinador->fetch_assoc()) { 
                                        $categoria = $select['categoria'];
                            ?>
                            <option value="<?php echo $categoria ?>">
                            <?php echo $categoria ?>
                            </option>
                            <?php  } } ?>
                    </select>
                </div>
            <div class="selectEquipes">
                <label>Consultar Equipes: </label>
                <div>
                <select class="select-equipeCasa" name="nomeEquipeCasa" id="nomeEquipeCasa">
                    <option value="">Escolha a Equipe Casa</option>
                    
                    <?php
                    if($query_equipesTreinador->num_rows == 1) {
                    while($select = $query_todasEquipes->fetch_assoc()) { 
                    $name = $select['nomeEquipe'];
                ?>
                    <option value="<?php echo $name ?>">
                    <?php echo $name ?>
                    </option>
                    <?php } } ?>
                </select>

                <select class="select-equipeFora" name="nomeEquipeVisitante" id="nomeEquipeVisitante">
                    <option value="">Escolha a Equipe Visitante</option>
                    
                    <?php
                    if($query_equipesTreinador->num_rows == 1) {
                    while($select = $query_todasEquipes->fetch_assoc()) { 
                    $name = $select['nomeEquipeVisitante'];
                ?>
                    <option value="<?php echo $name ?>">
                    <?php echo $name ?>
                    </option>
                    <?php } } ?>
                </select>
                </div>

                <button class="btn button-gerar" type="submit">Gerar Súmula</button>
            </div>
       </form>
       
       <div class="div-problemaTec">
            <?php if(isset($_SESSION["equipeCasa"]) && isset($_SESSION["equipeVisitante"])) { ?>
                        <p class="problemaTec">Houve algum problema técnico e deseja retornar à súmula anterior? <a class="problemaTec" href="/sumula" onClick="<?php $_SESSION["sumulaRecarregada"] = 'sumulaRecarregada'; ?>">Clique aqui</a></p>
            <?php } ?>
       </div>
       <br>
       <?php 
       date_default_timezone_set("America/Sao_Paulo");
       $hoje = date('Y-m-d');
       $sql_dadosCabecalho = "SELECT * FROM tabela_jogos WHERE data = '$hoje'";

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
            $sql_dadosTabelaJogos = "SELECT numeroJogo, horaJogo, categoria, equipeCasa, golsCasa, golsFora, equipeFora, data, rodada, horaRodada FROM tabela_jogos WHERE data = '$hoje' ORDER BY numeroJogo ASC";
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
    </main>
    <script type="text/javascript" src="select_sumula.js"></script>
</body>
</html>