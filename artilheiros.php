<?php 
    include('conexao.php');

    if(!isset($_SESSION)) {
        session_start();
    }

    $sql_code = "SELECT DISTINCT categoria FROM equipes ORDER BY categoria='Veterano 50', categoria='Veterano 40', categoria='Feminino', categoria='Bronze', categoria='Prata', categoria='Ouro', categoria='Sub15', categoria='Sub13', categoria='Sub11', categoria='Sub9', categoria='Sub7'";
    $query_todasCategorias = $mysqli->query($sql_code) or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn.discordapp.com/attachments/750028167225540648/963110597187235870/icone_appcjagforeground.png">
    <link rel="stylesheet" href="artilheiros.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <title>CitaJAG - Artilheiros do Campeonato</title>
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
                    <img class="carrossel-img" src="https://cdn.discordapp.com/attachments/750028167225540648/1169481070857695354/camisa10_modelo3.gif" alt="Camisa 10">
                    <img class="carrossel-img" src="https://cdn.discordapp.com/attachments/750028167225540648/1121457674102513754/brikZHAnuncio.png" alt="Anuncie Aqui">
                    <img class="carrossel-img" src="https://cdn.discordapp.com/attachments/750028167225540648/1169477434899451924/Dani.png" alt="Dani Culinária Saudável">
                    <img class="carrossel-img" src="https://cdn.discordapp.com/attachments/750028167225540648/1063559920001220659/anuncio2.png" alt="Anuncie Aqui">
                    <img class="carrossel-img" src="https://cdn.discordapp.com/attachments/750028167225540648/1166780394486636636/logo.png" alt="Anuncie Aqui">
                </div>
              </div>
        </div>
        <hr class="hr_anuncios">
        <form action="" method="POST">
                    <div class="select">
                        <label>Escolha uma Categoria: </label>
                        <select class="select-categoria" id="nomeCategoria">
                            <option value="">Escolha uma Categoria</option>
                        <?php while($select = $query_todasCategorias->fetch_assoc()) { 
                            $name = $select['categoria'];
                        ?>
                            <option value="<?php echo $name ?>">
                            <?php echo $name ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
            </form>

        <div id="divPrincipal-artilheiros" style="display: none;">
        <div class="infos">
            <div class="infoArtilheiro">
            <p>Artilheiros</p>
            </div>
            <div class="infoGols">
            <p>Gols</p>
            </div>
        </div>
            <hr>
        <div class="div-artilheiros" id="artilheiros">
            <div class="correcao">
                <div class="valores">
                    <p class="posicao"><b></b></p>
                    <img class="fotoAtleta" src="">
                    <img Class="emblema" src="">
                <div class="nomes">
                    <p></p>
                    <p class="nomeEquipe"></p>
                </div>
                </div>
                    <p class="gols"></p>
                </div>
                <hr>
        </div>
        </div>
        <script src="funcao_artilheiros.js"></script>
        <script src="codes.js"></script>
    </main>
</body>
</html>