<?php
    include('conexao.php');

    if(!isset($_SESSION)) {
        session_start();
    }
    
    if(!$_SESSION["funcao"] == "admin") {
        header("Location: inicio");
        die();
    }

    if(count($_POST)>=1) {
        $valor = $mysqli->escape_string($_POST['nroAtletas']);
        $nomeCategoria = $mysqli->escape_string($_POST['nomeCategoria']);
        $nomeEquipe = $mysqli->escape_string($_POST['nomeEquipe']);

        $_SESSION["nroAtletas"] = $valor;
        $_SESSION["categoriaAtleta"] = $nomeCategoria;
        $_SESSION["equipeAtleta"] = $nomeEquipe;

        header("Location: cadastrar_atletas");
        die();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nroCadastrar_atletas.css">
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
                            <li><a href="/escolhe_nroAtletas">Cadastrar Jogadores</a></li>
                            <?php } ?>
                            <?php if($_SESSION['funcao'] == "admin") { ?>
                            <li><a href="/pesquisa_atletas">Alterar Jogadores</a></li>
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
            <form action="" method="POST">
                <div class="nroAtletas">
                <label for="nomeCategoria">Escolha a Categoria: </label>
                <select name="nomeCategoria" id="nomeCategoria">
                    <option value="Sub7">Sub7</option>
                    <option value="Sub9">Sub9</option>
                    <option value="Sub11">Sub11</option>
                    <option value="Sub13">Sub13</option>
                    <option value="Sub15">Sub15</option>
                    <option value="Bronze">Bronze</option>
                    <option value="Prata">Prata</option>
                    <option value="Ouro">Ouro</option>
                    <option value="Veterano 40">Veterano 40</option>
                    <option value="Veterano 50">Veterano 50</option>
                    <option value="Feminino">Feminino</option>
                </select>

                <label for="nomeEquipe">Escolha uma Equipe: </label>
                <select name="nomeEquipe" id="nomeEquipe">
                    <option value="">Escolha a Categoria Primeiro</option>
                </select>

                <label for="nroAtletas">Escoha o número de Atletas/e ou Comissão que deseja cadastrar: </label>
                <select name="nroAtletas" id="nroAtletas">
                    <option value="0">Escolha um número</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                </select>
                </div>
                <button class="btn button-continuar" type="submit">Enviar</button>
            </form>
        </div>
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
                    <a class="btn-continuar" href="/manuais_de_uso">Manuais de Uso</a>
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
<script src="select_carteira.js"></script>
<script src="codes.js"></script>
</html>