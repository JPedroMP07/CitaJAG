<?php 
    include('conexao.php');

    if(!isset($_SESSION)) {
        session_start();
    }

    if(isset($_SESSION['funcao'])) {
        $funcao = $_SESSION['funcao'];
    } else {
        $funcao = "nada";
    }

    $equipe = $_GET['equipe'];
    $categoria = $_GET['categoria'];

    if(isset($equipe)) {
        $sql_dadosJogadores = "SELECT fotoPerfil, nomeUsuario, dataNascimento, docIdentidade, imagemDocIdentidade, equipe, categoria, emblema FROM usuarios WHERE equipe = '$equipe' AND categoria = '$categoria'";
        $query_dadosJogadores = $mysqli->query($sql_dadosJogadores) or die($mysqli->error);
    }

    while($carteira = $query_dadosJogadores->fetch_assoc()) { 
        $fotoPerfil = $carteira['fotoPerfil'];
        $nome = $carteira['nomeUsuario'];
        $dataNascimento = $carteira['dataNascimento'];

        //Calcula idade
        $anoNascimento = date("Y", strtotime($dataNascimento));
        $hoje = date('Y');
        $idade = $hoje - $anoNascimento;

        $docIdentidade = $carteira['docIdentidade'];
        $imagemDocIdentidade = $carteira['imagemDocIdentidade'];
        $equipe = $carteira['equipe'];
        $categoria = $carteira['categoria'];
        $emblema = $carteira['emblema'];
        ?>

        <div class="carteira-atleta">
         <div class="valores">
                <div class="interior">
                    <img class="fotoAtleta" src="<?php echo $fotoPerfil; ?>">
                    <div class="infos-atleta">
                        <p><?php echo $nome; ?></p>
                    <div class="idade">
                        <p><?php echo $dataNascimento; ?></p>
                        <p>&nbsp;| <?php echo $idade; ?></p>
                    </div>
                    <?php if($funcao == "admin" || $funcao == "arbitragem") { ?>
                        <p><?php echo $docIdentidade; ?> </p> 
                    <?php } ?>
                    <?php if($funcao == "admin" || $funcao == "arbitragem") { ?>
                    <div class="rg">
                        <a class="aRG" href="<?php echo $imagemDocIdentidade ?>">Documento de Identidade&nbsp;</a>
                    </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="equipe">
                <p><?php echo $equipe ?></p>
                <p>&nbsp;- <?php echo $categoria ?></p>
                <img class="fotoClube" src="<?php echo $emblema; ?>">
            </div>
         </div>
        </div>

    <?php } ?>