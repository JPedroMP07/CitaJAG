<?php 
include ('conexao.php'); 
if(!isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION['usuario'])) {
    header("Location: inicio");
    die();
}

if(count($_POST)>3) {
    if($_POST['nomeUsuario'] != '' && strlen($_POST['nomeUsuario']) > 5 && $_POST['dataNascimento'] != '' && $_POST['docIdentidade'] != '') {
        $nomeUsuario = $mysqli->escape_string($_POST['nomeUsuario']);
        $genero = $mysqli->escape_string($_POST['genero']);
        $dataNascimento = $_POST['dataNascimento'];
        $docIdentidade = $mysqli->escape_string($_POST['docIdentidade']);
        $equipe = $mysqli->escape_string($_POST['equipe']);
        $funcao = $mysqli->escape_string($_POST['funcao']);
        // $email = $mysqli->escape_string($_POST['email']);
        // $senha = $mysqli->escape_string(password_hash($_POST['senha'], PASSWORD_DEFAULT));
    } else {
        echo "Digite um nome válido!";
        die();
    }

    
    //Verifica a idade do atleta e já adiciona de forma automática a categoria correta
    $anoNascimento = date("Y", strtotime($dataNascimento));
    $hoje = date('Y');
    $idade = $hoje - $anoNascimento;

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


    

    //Pega os arquivos das imagens!
    if(isset($_FILES['imagemDocIdentidade']) || isset($_FILES['fotoPerfil'])) {
        $arquivoDocIdentidade = $_FILES['imagemDocIdentidade'];
        // $arquivorgVerso = $_FILES['rgVerso'];
        $arquivofotoPerfil = $_FILES['fotoPerfil'];

        if($arquivoDocIdentidade['error'] || $arquivofotoPerfil['error']){
            die('Erro ao enviar arquivo de imagem!');
        }

        if($arquivoDocIdentidade['size'] > 4097152 || $arquivofotoPerfil['size'] > 4097152) {
            die("Arquivo muito grande! Máximo 4MB!");
        }

        $pasta = "arquivos/";
        $nomeArquivoDocIdentidade = $arquivoDocIdentidade['name'];
        // $nomeArquivorgVerso = $arquivorgVerso['name'];
        $nomeArquivofotoPerfil = $arquivofotoPerfil['name'];

        $novonomeArquivoDocIdentidade = uniqid();
        // $novonomeArquivorgVerso = uniqid();
        $novonomeArquivofotoPerfil = uniqid();

        $extensaoDocIdentidade = strtolower(pathinfo($nomeArquivoDocIdentidade, PATHINFO_EXTENSION));
        // $extensaorgVerso = strtolower(pathinfo($nomeArquivorgVerso, PATHINFO_EXTENSION));
        $extensaofotoPerfil = strtolower(pathinfo($nomeArquivofotoPerfil, PATHINFO_EXTENSION));

        if($extensaoDocIdentidade != "jpg" && $extensaoDocIdentidade != "png" && $extensaofotoPerfil != "jpg" && $extensaofotoPerfil != "png") {
            die("Tipo de arquivo inválido!");
        }

        $pathDocIdentidade = $pasta . $novonomeArquivoDocIdentidade . "." . $extensaoDocIdentidade;
        $deu_certo = move_uploaded_file($arquivoDocIdentidade["tmp_name"], $pathDocIdentidade);

        // $pathrgVerso = $pasta . $novonomeArquivorgVerso . "." . $extensaorgVerso;
        // $deu_certo2 = move_uploaded_file($arquivorgVerso["tmp_name"], $pathrgVerso);

        $pathfotoPerfil = $pasta . $novonomeArquivofotoPerfil . "." . $extensaofotoPerfil;
        $deu_certo = move_uploaded_file($arquivofotoPerfil["tmp_name"], $pathfotoPerfil);

        if($equipe != " ") {
            $sql_emblemas = "SELECT emblema FROM equipes WHERE nomeEquipe = '$equipe'";
            $query_emblemas = $mysqli->query($sql_emblemas) or die($mysqli->error);
            $emblema = $query_emblemas->fetch_assoc();
            $emblema = $emblema['emblema'];
        }

        $sql_code = "INSERT INTO usuarios (docIdentidade, nomeUsuario, dataNascimento, genero, fotoPerfil, imagemDocIdentidade, equipe, emblema, categoria, funcao) 
        VALUES ('$docIdentidade', '$nomeUsuario', '$dataNascimento', '$genero', '$pathfotoPerfil', '$pathDocIdentidade', '$equipe', '$emblema', '$categoria', '$funcao')";
        $funcionou = $mysqli->query($sql_code) or die($mysqli->error);
        if($funcionou) {
            header("Location: login");
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
    <link rel="icon" href="https://cdn.discordapp.com/attachments/750028167225540648/963110597187235870/icone_appcjagforeground.png">
    <link rel="stylesheet" href="cadastro.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1561129739918528"
     crossorigin="anonymous"></script>
    <title>Cadastrar-se no CitaJAG</title>
</head>
<body>
            <div id="inicio" class="inicio">
            <div class="anuncios">
                <div class="espaco_anuncios">
                    <div class="carrossel" id="img">
                        
                        <!-- <img class="carrossel-img" src="https://cdn.discordapp.com/attachments/750028167225540648/1063559884517429359/anuncie1.png" alt="Anuncie Aqui">-->
                        <img class="carrossel-img" src="https://cdn.discordapp.com/attachments/750028167225540648/1126362246717640765/citadino2014.png" alt="Anuncie Aqui">

                        <img class="carrossel-img" src="https://cdn.discordapp.com/attachments/750028167225540648/1121457674102513754/brikZHAnuncio.png" alt="Anuncie Aqui">
                        <!-- <img class="carrossel-img" src="https://i.pinimg.com/originals/91/bf/1a/91bf1aa95a8876cb99bb1d1274f6a157.jpg" alt="Anuncie Aqui">
                        <img class="carrossel-img" src="https://cdn.discordapp.com/attachments/750028167225540648/1111374236909584394/images_6.jpg" alt="Anuncie Aqui"> -->
                        <img class="carrossel-img" src="https://cdn.discordapp.com/attachments/750028167225540648/1121457745468588084/daniCulinaria.png" alt="Anuncie Aqui">
                        <!--<img class="teste" src="" alt=""> -->
                        <img class="carrossel-img" src="https://cdn.discordapp.com/attachments/750028167225540648/1063559920001220659/anuncio2.png" alt="Anuncie Aqui">
                    </div>
                </div>
            </div>
            <hr>
        <div class="div-inicio">
                <img class="logo-cadastro" src="https://cdn.discordapp.com/attachments/750028167225540648/963110573829128222/logocitajagtelaini.png">
                <a><b>Cadastro Atleta/Comissão Técnica no CitaJAG</b></a>
        </div>
    <main>
        <form enctype="multipart/form-data" action="" method="POST">
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero" id="genero">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe">Equipe:</label>

                <select name="equipe" id="equipe">
                <option>Selecione sua Equipe</option>
                
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria" id="categoria">
                    <option>Selecione sua Categoria</option>
                    <option>Sub-7</option>
                    <option>Sub-9</option>
                    <option>Sub-11</option>
                    <option>Sub-13</option>
                    <option>Sub-15</option>
                    <option>Bronze</option>
                    <option>Prata</option>
                    <option>Ouro</option>
                    <option>Feminino</option>
                    <option>Veterano</option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao" id="funcao">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          <!-- <div class="divFuncao">
          <a>Informações de login: </a>
            <p>
                <label class="cadastro_label">E-mail:</label>
                <input class="cadastro_inputs" required type="email" name="email" placeholder="Digite seu e-mail">
            </p>
            <p>
                <label class="cadastro_label">Senha:</label>
                <input class="cadastro_inputs" required type="password" name="senha" placeholder="Digite sua senha">
            </p>
           </div> -->
          </div>
          <button class="button-cadastrar" type="submit">Cadastrar</button>
        </form>
        <script src="funcoes.js"></script>
        <script src="codes.js"></script>
    </main>
    <footer>
        <!-- <a href="#teste">Encontrou algum erro? Contate-nos</a> -->
    </footer>
    
</body>
</html>