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

if(count($_POST)>1) {
    if($_POST['nomeEquipe'] != '' && strlen($_POST['nomeEquipe']) > 3) {
        $nomeEquipe = $mysqli->escape_string($_POST['nomeEquipe']);
        $categoria = $mysqli->escape_string($_POST['categoria']);

        echo $nomeEquipe;
        echo $categoria;
    } else {
        echo "Digite um nome válido!";
        die();
    }

//Pega os arquivos das imagens!
if(isset($_FILES['emblema'])) {
    $arquivoemblema = $_FILES['emblema'];

    if($arquivoemblema['error']) {
        die('Erro ao enviar arquivo de imagem!');
    }

    if($arquivoemblema['size'] > 4097152) {
        die("Arquivo muito grande! Máximo 4MB!");
    }

    $pasta = "arquivos/";
    $nomeArquivoemblema = $arquivoemblema['name'];

    $novonomeArquivoemblema = uniqid();

    $extensaoemblema = strtolower(pathinfo($nomeArquivoemblema, PATHINFO_EXTENSION));

    if($extensaoemblema != "jpg" && $extensaoemblema != "png") {
        die("Tipo de arquivo inválido!");
    }

    $pathemblema = $pasta . $novonomeArquivoemblema . "." . $extensaoemblema;
    $deu_certo = move_uploaded_file($arquivoemblema["tmp_name"], $pathemblema);

    $sql_code = "INSERT INTO equipes (nomeEquipe, emblema, categoria) VALUES ('$nomeEquipe', '$pathemblema', '$categoria')";
    $funcionou = $mysqli->query($sql_code) or die($mysqli->error);
    if($funcionou) {
        $sql_code2 = "INSERT INTO classificacao (nomeEquipe, categoria) 
        VALUES ('$nomeEquipe', '$categoria')";
        $funcionou2 = $mysqli->query($sql_code2) or die($mysqli->error);
        if($funcionou2) {
            header("Location: cadastrar_equipes");
            die();
        } else {
            die();
        }
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
    <link rel="icon" href="https://cdn.discordapp.com/attachments/750028167225540648/963110597187235870/icone_appcjagforeground.png">
    <link rel="stylesheet" href="cadastrar_equipe.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1561129739918528"
     crossorigin="anonymous"></script>
    <title>CitaJAG - Cadastrar Equipes</title>
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
         <form enctype="multipart/form-data" action="" method="POST">
            <div class="div-cadastro">
                <a class="titulo">Informações da Equipe: </a>
                <p>
                    <label class="cadastro_label">Nome da Equipe:</label>
                    <input class="cadastro_inputs" required type="nomeEquipe" name="nomeEquipe" placeholder="Digite o nome da Equipe">
                </p>

                <p>
                    <label for="categoria">Escolha a Categoria:</label>

                    <select name="categoria" id="categoria">
                    <option value="">Selecione a Categoria</option>
                    <option value="Sub7">Sub7</option>
                    <option value="Sub9">Sub9</option>
                    <option value="Sub11">Sub11</option>
                    <option value="Sub13">Sub13</option>
                    <option value="Sub15">Sub15</option>
                    <option value="Bronze">Bronze</option>
                    <option value="Prata">Prata</option>
                    <option value="Ouro">Ouro</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Veterano">Veterano</option>
                    <option value="Master">Veterano 50+</option>
                    </select>
                </p>
                <p>
                    <label class="cadastro_label">Insira o Emblema da Equipe:</label>
                    <input required class="cadastro_inputs" type="file" name="emblema" accept=".jpg, .png">
                </p>
                <button class="btn button-cadastrar" type="submit">Cadastrar Equipe</button>
            </div>
        </form>
    </main>
</body>
</html>