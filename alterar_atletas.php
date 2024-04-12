<?php 
include ('conexao.php'); 
if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['usuario'])) {
    header("Location: inicio");
    die();
}

if(!($_SESSION['funcao'] == "admin")) {
    header("Location: inicio");
    die();
}

$nomeAtleta = $_SESSION["nomeAtleta"];
$dataNascimentoAtleta = $_SESSION["dataNascimentoAtleta"];
$generoAtleta = $_SESSION["generoAtleta"];
$fotoAtleta = $_SESSION["fotoAtleta"];
$rgFrenteAtleta = $_SESSION["rgFrenteAtleta"];
$rgVersoAtleta = $_SESSION["rgVersoAtleta"];

//Verifica a idade do atleta e já adiciona de forma automática a categoria correta
$anoNascimento = date("Y", strtotime($dataNascimentoAtleta));
$hoje = date('Y');
$idade = $hoje - $anoNascimento;

if($nomeAtleta != "" && $idade != "") {
    if($generoAtleta == "Feminino" && $idade > 14) {
        $sql_todasEquipes = "SELECT nomeEquipe FROM equipes WHERE categoria = '$genero'";
        $query_todasEquipes = $mysqli->query($sql_todasEquipes) or die($mysqli->error);
    } else if($generoAtleta == "Masculino" && $idade > 4 && $idade < 8) {
        $categoria = "Sub7";
    } else if($generoAtleta == "Masculino" && $idade > 7 && $idade < 10) {
        $categoria = "Sub9";
    } else if($generoAtleta == "Masculino" && $idade > 9 && $idade < 12) {
        $categoria = "Sub11";
    } else if($generoAtleta == "Masculino" && $idade > 11 && $idade < 14) {
        $categoria = "Sub13";
    } else if($generoAtleta == "Masculino" && $idade > 13 && $idade < 16) {
        $categoria = "Sub15";
    } else if($generoAtleta == "Masculino" && $idade >= 16 && $idade < 40) {
        $categoria = "Adulto";

        $sql_todasEquipes = "SELECT nomeEquipe FROM equipes WHERE categoria = 'Bronze' OR categoria = 'Prata' OR categoria = 'Ouro' ORDER BY nomeEquipe ASC";
        $query_todasEquipes = $mysqli->query($sql_todasEquipes) or die($mysqli->error);
    } else if($generoAtleta == "Masculino" && $idade > 39) {
        $categoria = "Veterano";
    }

    if($generoAtleta == "Masculino" && $categoria != "Adulto") {
        $sql_todasEquipes = "SELECT nomeEquipe FROM equipes WHERE categoria = '$categoria'";
        $query_todasEquipes = $mysqli->query($sql_todasEquipes) or die($mysqli->error);
    }
}

if(count($_POST)>0) {
    if($_POST['equipe'] != '') {
        $equipe = $mysqli->escape_string($_POST['equipe']);
    }

    echo $equipe;

    if($idade <= 7) {
        $categoria = 'Sub7';
    } else if($idade > 7 && $idade <= 9) {
        $categoria = 'Sub9';
    } else if($idade > 9 && $idade <= 11) {
        $categoria = 'Sub11';
    } else if($idade > 11 && $idade <= 13) {
        $categoria = 'Sub13';
    } else if($idade > 13 && $idade <= 15) {
        $categoria = 'Sub15';
    } else if($idade > 15 && $idade <= 17) {
        $categoria = 'Sub17';
    } else if($idade > 15 && $genero == 'feminino') {
        $categoria = 'Feminino';
    } else if($idade > 17 && $idade <= 39) {
        $categoria = 'adulto';
    } else if($idade > 39) {
        $categoria = 'Veterano';
    }

    if($categoria == 'adulto') {
        //Puxar equipe escolhida pelo nome e verificar qual a categoria dela puxando da tabela equipes.
        $sql_equipes = "SELECT categoria FROM equipes WHERE nomeEquipe = '$equipe'";
        $query_equipes = $mysqli->query($sql_equipes) or die($mysqli->error);

        $categoria = $query_equipes->fetch_assoc();
        $categoria = $categoria['categoria'];
    }

        if($equipe != " ") {
            $sql_emblemas = "SELECT emblema FROM equipes WHERE nomeEquipe = '$equipe'";
            $query_emblemas = $mysqli->query($sql_emblemas) or die($mysqli->error);
            $emblema = $query_emblemas->fetch_assoc();
            $emblema = $emblema['emblema'];
        }

        $sql_updateEquipe = "UPDATE usuarios SET equipe = '$equipe', emblema = '$emblema', categoria = '$categoria' WHERE nomeUsuario = '$nomeAtleta'";
        $funcionou = $mysqli->query($sql_updateEquipe) or die($mysqli->error);

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
    <link rel="icon" href="https://cdn.discordapp.com/attachments/750028167225540648/963110597187235870/icone_appcjagforeground.png">
   
    <link rel="stylesheet" href="style.css">

    <title>Cadastrar/Alterar Equipe de um Atleta</title>
</head>
<body>
        <div class="div-inicio">
                <img class="logo-cadastro" src="https://cdn.discordapp.com/attachments/750028167225540648/963110573829128222/logocitajagtelaini.png">
                <a><b>Cadastro de Atletas nas Equipes - CitaJAG</b></a>
        </div>

        <div class="divDadosAtleta">
               <div class="organizador1">
                <img class="fotoAtleta" src="<?php echo $fotoAtleta ?>" alt="Foto do Atleta">
               <div class="organizador2">
                <a><?php echo $nomeAtleta ?></a>
                <a><?php echo $dataNascimentoAtleta ?> - <?php echo $idade ?> Anos</a>
                <a><?php echo $generoAtleta ?></a>
               </div>
               </div>
                 <div class="identidadeAtleta">  
                  <img class="rgFrente" src="<?php echo $rgFrenteAtleta ?>" alt="Identidade Frente">
                  <img class="rgVerso" src="<?php echo $rgVersoAtleta ?>" alt="Identidade Verso">
                 </div>
            </div>
    <main>
        <form enctype="multipart/form-data" action="" method="POST">
          <div class="divEquipe">  
            <a>De qual equipe o Atleta faz parte?</a>
            <p>
                <label for="equipe">Equipe:</label>

                <select name="equipe" id="equipe">
                <option>Selecione a Equipe</option>
                <?php
                    if($query_todasEquipes->num_rows > 0) {
                    while($select = $query_todasEquipes->fetch_assoc()) { 
                    $nomeEquipe = $select['nomeEquipe'];
                ?>
                    <option value="<?php echo $nomeEquipe ?>">
                    <?php echo $nomeEquipe ?>
                    </option>
                    <?php } } ?>
                </select>
            </p>
          </div>
         
          <button class="btn button-cadastrar" type="submit">Cadastrar</button>
        </form>
        <script src="funcoes.js"></script>
    </main>
    <footer>
        <!-- Cookie Consent by TermsFeed https://www.TermsFeed.com -->
        <script type="text/javascript" src="//www.termsfeed.com/public/cookie-consent/4.1.0/cookie-consent.js" charset="UTF-8"></script>
        <script type="text/javascript" charset="UTF-8">
        document.addEventListener('DOMContentLoaded', function () {
        cookieconsent.run({"notice_banner_type":"headline","consent_type":"express","palette":"dark","language":"pt","page_load_consent_levels":["strictly-necessary"],"notice_banner_reject_button_hide":false,"preferences_center_close_button_hide":false,"page_refresh_confirmation_buttons":false,"website_name":"CitaJAG"});
        });
        </script>
        <!-- Google Analytics -->
        <script type="text/plain" data-cookie-consent="targeting" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1561129739918528"
            crossorigin="anonymous"></script>
        <!-- end of Google Analytics-->
        <noscript>Free cookie consent management tool by <a href="https://www.termsfeed.com/">TermsFeed</a></noscript>
        <!-- End Cookie Consent by TermsFeed https://www.TermsFeed.com -->

        <section class="footer">
            <div class="container">
                <img class="prefaJag" src="https://cdn.discordapp.com/attachments/750028167225540648/1118632420657352745/Prefeitura-de-JaguarC3A3o-gestC3A3o-2017.png">
                <img class="jpcDev" src="https://cdn.discordapp.com/attachments/750028167225540648/952069007639461928/logo-jpcDev2.png">
                <div class="divisor"></div>
                <div class="politicas">
                    <p class="sobreRodape" onclick="mostrarModalSobre()">Sobre</p>
                    <p class="politicasRodape" onclick="mostrarModalPoliticas()">Política de Privacidade</p>
                    <a class="politica-cookies" href="#" id="open_preferences_center">Políticas de Cookies</a>
                </div>
            </div>
            <div class="direitos">
                <p>© Todos os Direitos Reservados - JPC Desenvolvedora</p>
            </div>
        </section>
            
        <div id="modal-sobre" class="modal-sobre">
            <div class="modalSobre">
                <button class="fecharSobre">X</button>
                <h4>Sobre Nós</h4><br>
                <p>Seja bem vindo ao site CitaJAG!<br><br>Esse site foi desenvolvido pela JPC Desenvolvedora e tem o foco em dar transparência, visibilidade e uma ótima experiência para todos os amantes do Campeonato Citadino de Jaguarão. Neste site possuem diversas ferramentas que auxiliam e permitem um melhor acompanhamento de tudo que está acontecendo no Citadino de Jaguarão.
                    <br><br>Sobre a JPC Desenvolvedora:
                    Somos uma empresa de desenvolvimento de software com foco em inovação e no bem estar dos nossos usuários, buscamos sempre a inovação como forma de auxílio e qualidade de vida para todos aqueles que utilizam nossos serviços! 
                    <br><br>
                    Att.: Equipe JPC Desenvolvedora.
                    </p>
            </div>
        </div>

        <div id="modal-politicas" class="modal-politicas">
            <div class="modalPoliticas">
                <button class="fecharPoliticas">X</button>
                <h4>Políticas e Privacidade</h4><br>
                <p>&nbsp;CitaJAG, com domínio "citajag.com.br" de autoria da JPC Desenvolvedora, respeita e prioriza a privacidade de seus usuários, dessa forma, utiliza seus dados e informações pessoais apenas para consultas internas a respeito dos respectivos participantes do campeonato, portanto, apenas coleta e salva dados importantes para a organização do evento, além de divulgar somente aqueles dados que são permitidos e foram previamente cedidos a permissão do uso pelos usuários para os responsáveis pela organização do evento. Além disso, a JPC Desenvolvedora não envia tais informações para terceiros. Definimos como "usuários" aqueles que utilizam do serviço e informações oferecidas pelo nosso site.</p>
                <br><br><h4>Políticas de Cookies</h4><br>
                <p>&nbsp;Nosso site utiliza cookies pessoais e também cookies do Google Adsense:<br><br>O Google pode utilizar cookies para veicular anúncios mais relevantes e limitar o número de vezes que um anúncio é exibido para você. Os cookies do Google não são criados pela JPC Desenvolvedora e postos na Calculadora JPC, então, este site não possui controle sobre os cookies utilizados pela Google Adsense ou sobre os dados que os cookies do Google possam conter. Para mais informações sobre o Google AdSense, consulte as FAQs oficiais de privacidade do AdSense.</p>
            </div>
        </div>
    </footer>
</body>
</html>