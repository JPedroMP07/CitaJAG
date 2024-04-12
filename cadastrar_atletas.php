<?php 
include ('conexao.php'); 
if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['usuario'])) {
    header("Location: inicio");
    die();
}

if(!$_SESSION["funcao"] == "admin") {
    header("Location: inicio");
    die();
}

$nroAtletas = $_SESSION["nroAtletas"];
$equipe = $_SESSION["equipeAtleta"];
$categoria = $_SESSION["categoriaAtleta"];
$contador = 0;

if(count($_POST)>=2) {
    while($contador != $nroAtletas) {
        echo $contador . " Iniciou o looping";
        $contador = $contador + 1;
        echo $contador;
        if($_POST['nomeUsuario'.$contador] != '' && strlen($_POST['nomeUsuario'.$contador]) > 5 && $_POST['dataNascimento'.$contador] != '' && $_POST['docIdentidade'.$contador] != '') {
            $nomeUsuario = $mysqli->escape_string($_POST['nomeUsuario'.$contador]);
            $genero = $mysqli->escape_string($_POST['genero'.$contador]);
            $dataNascimento = $_POST['dataNascimento'.$contador];
            $docIdentidade = $mysqli->escape_string($_POST['docIdentidade'.$contador]);
            $equipe = $mysqli->escape_string($_POST['equipe'.$contador]);
            $funcao = $mysqli->escape_string($_POST['funcao'.$contador]);
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

        //Pega os arquivos das imagens!
        if(isset($_FILES['imagemDocIdentidade'.$contador]) || isset($_FILES['fotoPerfil'.$contador])) {
            $arquivoDocIdentidade = $_FILES['imagemDocIdentidade'.$contador];
            // $arquivorgVerso = $_FILES['rgVerso'];
            $arquivofotoPerfil = $_FILES['fotoPerfil'.$contador];

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

            
            if($extensaoDocIdentidade != "jpg" && $extensaoDocIdentidade != "png" && $extensaofotoPerfil != "jpg" && $extensaofotoPerfil != "png" && $extensaoDocIdentidade != "jpeg" && $extensaofotoPerfil != "jpeg") {
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
        }
    }
    header("Location: escolhe_nroAtletas");
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
   
    <link rel="stylesheet" href="cadastro.css">

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
         <?php if($nroAtletas >= 1) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario1" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade1" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento1">
            </p>
            <p>
                <label for="genero1">Gênero:</label>

                <select name="genero1" id="genero1">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade1" accept=".jpg, .jpeg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil1" accept=".jpg, .jpeg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe">Equipe:</label>

                <select name="equipe1" id="equipe1">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria1" id="categoria1">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao1">Função:</label>

                <select name="funcao1" id="funcao1">
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
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 2) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario2" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade2" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento2">
            </p>
            <p>
                <label for="genero2">Gênero:</label>

                <select name="genero2" id="genero2">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade2" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil2" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe2">Equipe:</label>

                <select name="equipe2" id="equipe2">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria2" id="categoria2">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao2" id="funcao">
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
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 3) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario3" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade3" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento3">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero3" id="genero">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade3" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil3" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe3">Equipe:</label>

                <select name="equipe3" id="equipe3">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria3" id="categoria">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao3" id="funcao">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          </div>
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 4) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario4" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade4" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento4">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero4" id="genero">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade4" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil4" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe4">Equipe:</label>

                <select name="equipe4" id="equipe4">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria4" id="categoria">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao4" id="funcao">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          </div>
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 5) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario5" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade5" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento5">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero5" id="genero5">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade5" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil5" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe5">Equipe:</label>

                <select name="equipe5" id="equipe5">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria5" id="categoria">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao5">Função:</label>

                <select name="funcao5" id="funcao5">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          </div>
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 6) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario6" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade6" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento6">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero6" id="genero">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade6" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil6" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe6">Equipe:</label>

                <select name="equipe6" id="equipe6">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria6" id="categoria6">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao6" id="funcao">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          </div>
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 7) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario7" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade7" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento7">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero7" id="genero">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade7" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil7" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe7">Equipe:</label>

                <select name="equipe7" id="equipe7">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria7" id="categoria7">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao7" id="funcao">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          </div>
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 8) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario8" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade8" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento8">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero8" id="genero">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade8" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil8" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe">Equipe:</label>

                <select name="equipe8" id="equipe">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria8" id="categoria">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao8" id="funcao">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          </div>
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 9) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario9" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade9" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento9">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero9" id="genero">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade9" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil9" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe">Equipe:</label>

                <select name="equipe9" id="equipe">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria9" id="categoria">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao9" id="funcao">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          </div>
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 10) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario10" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade10" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento10">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero10" id="genero">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade10" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil10" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe">Equipe:</label>

                <select name="equipe10" id="equipe">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria10" id="categoria">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao10" id="funcao">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          </div>
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 11) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario11" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade11" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento11">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero11" id="genero">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade11" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil11" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe">Equipe:</label>

                <select name="equipe11" id="equipe">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria11" id="categoria">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao11" id="funcao">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          </div>
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 12) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario12" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade12" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento12">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero12" id="genero">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade12" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil12" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe">Equipe:</label>

                <select name="equipe12" id="equipe">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria12" id="categoria">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao12" id="funcao">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          </div>
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 13) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario13" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade13" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento13">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero13" id="genero">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade13" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil13" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe">Equipe:</label>

                <select name="equipe13" id="equipe">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria13" id="categoria">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao13" id="funcao">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          </div>
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 14) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario14" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade14" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento14">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero14" id="genero">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade14" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil14" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe">Equipe:</label>

                <select name="equipe14" id="equipe">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria14" id="categoria">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao14" id="funcao">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          </div>
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 15) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario15" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade15" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento15">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero15" id="genero">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade15" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil15" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe">Equipe:</label>

                <select name="equipe15" id="equipe">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria15" id="categoria">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao15" id="funcao">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          </div>
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 16) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario16" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade16" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento16">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero16" id="genero">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade16" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil16" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe">Equipe:</label>

                <select name="equipe16" id="equipe">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria16" id="categoria">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao16" id="funcao">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          </div>
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 17) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario17" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade17" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento17">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero17" id="genero">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade17" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil17" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe">Equipe:</label>

                <select name="equipe17" id="equipe">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="equipe">Categoria:</label>
                 <select name="categoria17" id="categoria">
                    <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao17" id="funcao">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          </div>
          <hr>
          <?php } ?>

          <?php if($nroAtletas >= 18) { ?>
         <div class="organizador">
          <div class="divInfoPessoais"> 
            <a>Informações Pessoais: </a>
            <p>
                <label class="cadastro_label">Nome Completo:</label>
                <input class="cadastro_inputs" required type="text" name="nomeUsuario18" placeholder="Digite seu nome completo">
            </p>
            <p>
                <label class="cadastro_label">Número do Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="text" name="docIdentidade18" placeholder="Digite seu Nº do Documento de Identidade">
            </p>
            <p>
                <label class="cadastro_label">Data de Nascimento:</label>
                <input id="dataNascimento" required class="cadastro_inputs" type="date" min="1923-01-01" max="2023-12-31" name="dataNascimento18">
            </p>
            <p>
                <label for="genero">Gênero:</label>

                <select name="genero18" id="genero">
                <option value="">Selecione o Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
            </p>
            <p>
                <label class="cadastro_label">Envie uma imagem do seu Documento de Identidade:</label>
                <input required class="cadastro_inputs" type="file" name="imagemDocIdentidade18" accept=".jpg, .png">
            </p>
            <p class="atencao">*Atenção: Envie uma imagem legível do documento aberto(com Frente e Verso juntos)!</p>
            <p>
                <label class="cadastro_label">Envie a imagem para o Perfil:</label>
                <input required class="cadastro_inputs" type="file" name="fotoPerfil18" accept=".jpg, .png">
            </p>
          </div>
          <div class="divEquipe">
            <a>De qual equipe você faz parte?</a>
            <p>
                <label for="equipe">Equipe:</label>

                <select name="equipe18" id="equipe">
                <option value="<?php echo $equipe ?>"><?php echo $equipe ?></option>
                </select>
            </p>
            <p>
                <label for="categoria">Categoria:</label>
                 <select name="categoria18" id="categoria">
                 <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                 </select>
            </p>
          </div>

          <div class="divFuncao">
            <a>Qual sua função?</a>
            <p>
                <label for="funcao">Função:</label>

                <select name="funcao18" id="funcao">
                <option value="atleta">Atleta</option>
                <option value="comissaoTecnica">Comissão Técnica</option>
                </select>
            </p>
          </div>
          </div>
          <hr>
          <?php } ?>

          <button class="button-cadastrar" type="submit">Cadastrar</button>
        </form>
        <script src="codes.js"></script>
    </main>
    <footer>
        <!-- <a href="#teste">Encontrou algum erro? Contate-nos</a> -->
    </footer>
    
</body>
</html>