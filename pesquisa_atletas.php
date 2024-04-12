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
    <main>
        <form action="">
          <div class="divEquipe">  
            <p>Pesquise o Atleta pelo Nome Completo: </p>
            <p>
                <input name="busca" type="text" placeholder="Nome Completo do Atleta">
            </p>
          </div>
          <button class="btn button-cadastrar" type="submit">Pesquisar Atleta</button>
        </form>

        <div class="container-dados">
            <?php if(!isset($_GET['busca'])) { ?>
                    <p>Pesquise um Atleta pelo Nome Completo!<p>
            <?php } else { 
                $pesquisa = $mysqli->real_escape_string($_GET['busca']);
                $sql_codeBusca = "SELECT * FROM usuarios WHERE nomeUsuario LIKE '%$pesquisa%'";
                $sql_queryBusca = $mysqli->query($sql_codeBusca) or die($mysqli->error); 
                
                if($sql_queryBusca->num_rows == 0) { ?>
                    <p>Nenhum resultado encontrado</p>
                <?php } else { 
                    $dados = $sql_queryBusca->fetch_assoc();

                    $nome = $dados["nomeUsuario"];
                    $dataNascimento = $dados["dataNascimento"];
                    $genero = $dados["genero"];
                    $fotoAtleta = $dados["fotoPerfil"];
                    $rgFrenteAtleta = $dados["rgFrente"];
                    $rgVersoAtleta = $dados["rgVerso"];

                    $_SESSION["nomeAtleta"] = $nome;
                    $_SESSION["dataNascimentoAtleta"] = $dataNascimento;
                    $_SESSION["generoAtleta"] = $genero;
                    $_SESSION["fotoAtleta"] = $fotoAtleta;
                    $_SESSION["rgFrenteAtleta"] = $rgFrenteAtleta;
                    $_SESSION["rgVersoAtleta"] = $rgVersoAtleta;
                    ?>
                    <p>Atleta encontrado, confira o nome: </p>
                    <p> <?php echo $nome ?> </p>

                    <p>Está correto? <a class="btn-continuar" href="/cadastrar_atletas">Continuar</a>
                    </p>
                    <?php } } ?>
        </div>
             
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