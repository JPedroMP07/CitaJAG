<?php
include('conexao.php');

if(!isset($_SESSION)) {
    session_start();
}

 $sql_jogoAtual = "SELECT equipeCasa, golsCasa, equipeFora, golsFora, categoria FROM jogoatual WHERE id_partida = '1'";
 $query_jogoAtual = $mysqli->query($sql_jogoAtual) or die($mysqli->error);

 while($jogoAtual = $query_jogoAtual->fetch_assoc()) {
   $equipeCasa = $jogoAtual['equipeCasa'];
   $golsCasa = $jogoAtual['golsCasa'];
   $equipeVisitante = $jogoAtual['equipeFora'];
   $golsVisitante = $jogoAtual['golsFora'];
   $categoria = $jogoAtual['categoria'];

if($equipeCasa != "EquipeCasa" && $equipeVisitante != "EquipeFora") { 
 $sql_equipeCasa = "SELECT emblema FROM equipes WHERE nomeEquipe = '$equipeCasa'";
 $query_dadosEquipeCasa = $mysqli->query($sql_equipeCasa) or die($mysqli->error);

 $dadosEquipeCasa = $query_dadosEquipeCasa->fetch_assoc();
 $emblemaCasa = $dadosEquipeCasa['emblema'];


 $sql_equipeVisitante = "SELECT emblema FROM equipes WHERE nomeEquipe = '$equipeVisitante'";
 $query_dadosEquipeVisitante = $mysqli->query($sql_equipeVisitante) or die($mysqli->error);

 $dadosEquipeVisitante = $query_dadosEquipeVisitante->fetch_assoc();
 $emblemaVisitante = $dadosEquipeVisitante['emblema'];

//if era aqui

    $sql_dadosJogo = "SELECT equipeCasa, golsCasa, equipeFora, golsFora FROM jogoatual WHERE equipeCasa = '$equipeCasa' AND equipeFora = '$equipeVisitante'";
    $query_dadosJogo = $mysqli->query($sql_dadosJogo) or die($mysqli->error);
    
    $sql_atletasEquipeCasa = "SELECT nomeUsuario, numeroCamisa, gols, funcao FROM usuarios WHERE equipe = '$equipeCasa' AND joga = '1' AND categoria = '$categoria' AND (numeroCamisa > '0' OR funcao = 'comissaoTecnica')";
    $query_dadosAtletasCasa = $mysqli->query($sql_atletasEquipeCasa) or die($mysqli->error);
    
    $sql_atletasEquipeFora = "SELECT nomeUsuario, numeroCamisa, gols, funcao FROM usuarios WHERE equipe = '$equipeVisitante' AND joga = '1' AND categoria = '$categoria' AND (numeroCamisa > '0' OR funcao = 'comissaoTecnica')";
    $query_dadosAtletasFora = $mysqli->query($sql_atletasEquipeFora) or die($mysqli->error);
    
while($dadoJogo = $query_dadosJogo->fetch_assoc()) {
    $equipeCasa = $dadoJogo['equipeCasa'];
    $golsCasa = $dadoJogo['golsCasa'];
    $equipeVisitante = $dadoJogo['equipeFora'];
    $golsVisitante = $dadoJogo['golsFora'];
?>
    <div class="organiza_bonecos" id="div-placar">
                <div class="container-externo">
                <div class="container-interno">
                  <img class="boneco_placar" id="boneco_casa" src="https://cdn.discordapp.com/attachments/750028167225540648/965848166853402624/bonecosTelaInicialFeliz.png">
                    <div class="placar">
                        <img class="clube_logo" id="time_casa" src="<?php echo $emblemaCasa ?>">
                            <a id="placar_timeCasa"><?php echo $golsCasa ?></a>
                              <a class="versus">X</a>
                            <a id="placar_timeFora"><?php echo $golsVisitante ?></a>
                        <img class="clube_logo" id="time_fora" src="<?php echo $emblemaVisitante ?>">
                    </div>
                  <img class="boneco_placar" id="boneco_fora" src="https://cdn.discordapp.com/attachments/750028167225540648/965848166853402624/bonecosTelaInicialFeliz.png">
                  </div>
                  <hr/>
                   <div class="container-relacao">
                      <p>Relação das Equipes: </p>
                     <div class="container-nomes">
                      <div class="div-nomesCasa">
                          <p class="nome-equipe"><?php echo $equipeCasa ?>: </p>
                         <?php while($dadosAtletaCasa = $query_dadosAtletasCasa->fetch_assoc()) { 
                          $nomeAtletaCasa = $dadosAtletaCasa['nomeUsuario'];
                          $nroCamisaAtletaCasa = $dadosAtletaCasa['numeroCamisa'];
                          $golsAtletaCasa = $dadosAtletaCasa['gols'];
                          $funcaoCasa = $dadosAtletaCasa['funcao'];
                         ?>
                          <p><?php if($funcaoCasa == "atleta") { echo $nroCamisaAtletaCasa." - ".$nomeAtletaCasa. " - Gols Totais: ".$golsAtletaCasa; } else { echo "Comissão Técnica - ".$nomeAtletaCasa; } ?></p>
                          <?php } ?>
                      </div>
                      <div class="div-nomesFora">
                          <p class="nome-equipe"><?php echo $equipeVisitante ?>: </p>
                          <?php while($dadosAtletaFora = $query_dadosAtletasFora->fetch_assoc()) { 
                          $nomeAtletaFora = $dadosAtletaFora['nomeUsuario'];
                          $nroCamisaAtletaFora = $dadosAtletaFora['numeroCamisa'];
                          $golsAtletaFora = $dadosAtletaFora['gols'];
                          $funcaoFora = $dadosAtletaFora['funcao'];
                         ?>
                          <p><?php if($funcaoFora == "atleta") { echo $nroCamisaAtletaFora." - ".$nomeAtletaFora. " - Gols Totais: ".$golsAtletaFora; } else { echo "Comissão Técnica - ".$nomeAtletaFora; } ?></p>
                          <?php } ?>
                      </div>
                      </div>
                   </div>
                  </div>
                </div>
<?php } } else { ?>
    <div class="organiza_bonecos">
        <img class="boneco_placar" id="boneco_casa" src="https://cdn.discordapp.com/attachments/750028167225540648/965848166853402624/bonecosTelaInicialFeliz.png">
    <div class="placar" id="div-placar">
        <img class="clube_logo" id="time_casa" src="https://cdn.discordapp.com/attachments/750028167225540648/963110573829128222/logocitajagtelaini.png">
            <a id="placar_timeCasa">0</a>
                <a class="versus">X</a>
            <a id="placar_timeFora">0</a>
        <img class="clube_logo" id="time_fora" src="https://cdn.discordapp.com/attachments/750028167225540648/963110573829128222/logocitajagtelaini.png">
    </div>
        <img class="boneco_placar" id="boneco_fora" src="https://cdn.discordapp.com/attachments/750028167225540648/965848166853402624/bonecosTelaInicialFeliz.png">
    </div>
<?php } } ?>