<?php 
    include('conexao.php');

    $categoria = $_GET['categoria'];

    if(isset($categoria)) {
        $sql_dadosJogadores = "SELECT fotoPerfil, emblema, nomeUsuario, equipe, gols FROM usuarios WHERE categoria = '$categoria' AND funcao = 'atleta' ORDER BY gols DESC";
        $query_dadosJogadores = $mysqli->query($sql_dadosJogadores) or die($mysqli->error);
    }
    
    $posicao = 0;
    while($artilheiro = $query_dadosJogadores->fetch_assoc()) { 
        //"Calcula" a posição do atleta
        $posicao = $posicao + 1;

        $fotoPerfil = $artilheiro['fotoPerfil'];
        $emblema = $artilheiro['emblema'];
        $nome = $artilheiro['nomeUsuario'];
        $nomeEquipe = $artilheiro['equipe'];
        $gols = $artilheiro['gols'];
        ?>

<div class="div-artilheiros">
      <div class="correcao">
        <div class="valores">
            <p class="posicao"><b><?php echo $posicao; ?></b></p>
            <img class="fotoAtleta" src="<?php echo $fotoPerfil; ?>">
            <img Class="emblema" src="<?php echo $emblema; ?>">
           <div class="nomes">
            <p><?php echo $nome; ?></p>
            <p class="nomeEquipe"><?php echo $nomeEquipe; ?></p>
           </div>
        </div>
            <p class="gols"><?php echo $gols; ?></p>
        </div>
        <hr>
   </div>

    <?php } ?>