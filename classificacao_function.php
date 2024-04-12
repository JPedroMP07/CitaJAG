<?php 
    include('conexao.php');

    $categoria = $_GET['categoria'];
    $_SESSION['categoria'] = $categoria;
    if(isset($categoria)) {
        if($categoria != "Bronze") {
            $sql_dadosEquipes = "SELECT nomeEquipe, pontos, jogos, vitorias, empates, derrotas, golsPro, golsSofridos, saldoGols, cartoesAmarelos, cartoesVermelhos FROM classificacao WHERE categoria = '$categoria' ORDER BY pontos DESC, saldoGols DESC, golsPro DESC, golsSofridos ASC";
            $query_dadosEquipes = $mysqli->query($sql_dadosEquipes) or die($mysqli->error);
        } else if($categoria == "Bronze") {
            $sql_dadosEquipesA = "SELECT nomeEquipe, pontos, jogos, vitorias, empates, derrotas, golsPro, golsSofridos, saldoGols, cartoesAmarelos, cartoesVermelhos FROM classificacao WHERE categoria = '$categoria' AND grupo = 'A' ORDER BY pontos DESC, saldoGols DESC, golsPro DESC, golsSofridos ASC";
            $query_dadosEquipesA = $mysqli->query($sql_dadosEquipesA) or die($mysqli->error);

            $sql_dadosEquipesB = "SELECT nomeEquipe, pontos, jogos, vitorias, empates, derrotas, golsPro, golsSofridos, saldoGols, cartoesAmarelos, cartoesVermelhos FROM classificacao WHERE categoria = '$categoria' AND grupo = 'B' ORDER BY pontos DESC, saldoGols DESC, golsPro DESC, golsSofridos ASC";
            $query_dadosEquipesB = $mysqli->query($sql_dadosEquipesB) or die($mysqli->error);

            $sql_dadosEquipesC = "SELECT nomeEquipe, pontos, jogos, vitorias, empates, derrotas, golsPro, golsSofridos, saldoGols, cartoesAmarelos, cartoesVermelhos FROM classificacao WHERE categoria = '$categoria' AND grupo = 'C' ORDER BY pontos DESC, saldoGols DESC, golsPro DESC, golsSofridos ASC";
            $query_dadosEquipesC = $mysqli->query($sql_dadosEquipesC) or die($mysqli->error);
            
            $sql_dadosEquipesGeral = "SELECT nomeEquipe, pontos, jogos, vitorias, empates, derrotas, golsPro, golsSofridos, saldoGols, cartoesAmarelos, cartoesVermelhos FROM classificacao WHERE categoria = '$categoria' ORDER BY pontos DESC, saldoGols DESC, golsPro DESC, golsSofridos ASC";
            $query_dadosEquipesGeral = $mysqli->query($sql_dadosEquipesGeral) or die($mysqli->error);
        }
    } 
    
    if($categoria != "Bronze") { ?>
    <div class="tabelaClassificacao" id="tabelaClassificacao" style="display: block;">
    <table>
    <thead>
    <tr>
        <th class="nomeEquipe">Classificação<?php if($categoria == "Feminino" || $categoria == "Veterano"){ 
            $frase = " do $categoria";
         } else { 
            $frase = " da $categoria";
          } echo $frase; ?> </th>
      <div class="tabela">
        <th>P</th>
        <th>J</th>
        <th>V</th>
        <th>E</th>
        <th>D</th>
        <th>GP</th>
        <th>GS</th>
        <th>SG</th>
        <th class="espacoAmarelo"><img class="cartao_amarelo" src="https://cdn.discordapp.com/attachments/750028167225540648/1056032748164350063/icons8-falta-48_1.png"/></th>
        <th class="espacoVermelho"><img class="cartao_vermelho" src="https://cdn.discordapp.com/attachments/750028167225540648/1056032624755351654/icons8-falta-48.png"/></th>
      </div>
    </tr>
    </thead>

<?php
    $posicao = 0;
    while($classificacao = $query_dadosEquipes->fetch_assoc()) { 
        //"Calcula" a posição do time
        $posicao = $posicao + 1;

        $nomeEquipe = $classificacao['nomeEquipe'];
        $pontos = $classificacao['pontos'];
        $jogos = $classificacao['jogos'];
        $vitorias = $classificacao['vitorias'];
        $empates = $classificacao['empates'];
        $derrotas = $classificacao['derrotas'];
        $golsPro = $classificacao['golsPro'];
        $golsSofridos = $classificacao['golsSofridos'];
        $saldoGols = $classificacao['saldoGols'];
        $cartoesAmarelos = $classificacao['cartoesAmarelos'];
        $cartoesVermelhos = $classificacao['cartoesVermelhos'];
        ?>
            <div class="dados_tabela">
            <tr>
                <td><p class="separar"><?php echo $posicao ?>&nbsp;&nbsp;&nbsp;<?php echo $nomeEquipe ?></p></td>
                <td><?php echo $pontos ?></td>
                <td><?php echo $jogos ?></td>
                <td><?php echo $vitorias ?></td>
                <td><?php echo $empates ?></td>
                <td><?php echo $derrotas ?></td>
                <td><?php echo $golsPro ?></td>
                <td><?php echo $golsSofridos ?></td>
                <td><?php echo $saldoGols ?></td>
                <td><?php echo $cartoesAmarelos ?></td>
                <td><?php echo $cartoesVermelhos ?></td>
            </tr>
            </div>
                <?php } ?>
            </table>
        </div>
        <?php } else { ?>
        </div>
        <div class="tabelaClassificacaoB" id="tabelaClassificacaoB" style="display: block;">
            <table>
            <thead>
            <tr>
                <th class="nomeEquipeB">Classificação GERAL da Série Bronze</th>
              <div class="tabelaB">
                <th>P</th>
                <th>J</th>
                <th>V</th>
                <th>E</th>
                <th>D</th>
                <th>GP</th>
                <th>GS</th>
                <th>SG</th>
                <th class="espacoAmareloB"><img class="cartao_amareloB" src="https://cdn.discordapp.com/attachments/750028167225540648/1056032748164350063/icons8-falta-48_1.png"/></th>
                <th class="espacoVermelhoB"><img class="cartao_vermelhoB" src="https://cdn.discordapp.com/attachments/750028167225540648/1056032624755351654/icons8-falta-48.png"/></th>
              </div>
            </tr>
            </thead>
        <?php $posicao = 0;
        while($classificacaoGeral = $query_dadosEquipesGeral->fetch_assoc()) { 
        //"Calcula" a posição do time
        $posicao = $posicao + 1;

        $nomeEquipe = $classificacaoGeral['nomeEquipe'];
        $pontos = $classificacaoGeral['pontos'];
        $jogos = $classificacaoGeral['jogos'];
        $vitorias = $classificacaoGeral['vitorias'];
        $empates = $classificacaoGeral['empates'];
        $derrotas = $classificacaoGeral['derrotas'];
        $golsPro = $classificacaoGeral['golsPro'];
        $golsSofridos = $classificacaoGeral['golsSofridos'];
        $saldoGols = $classificacaoGeral['saldoGols'];
        $cartoesAmarelos = $classificacaoGeral['cartoesAmarelos'];
        $cartoesVermelhos = $classificacaoGeral['cartoesVermelhos'];
        ?>
         <div class="dados_tabelaB">
            <tr>
                <td><p class="separar"><?php echo $posicao ?>&nbsp;&nbsp;&nbsp;<?php echo $nomeEquipe ?></p></td>
                <td><?php echo $pontos ?></td>
                <td><?php echo $jogos ?></td>
                <td><?php echo $vitorias ?></td>
                <td><?php echo $empates ?></td>
                <td><?php echo $derrotas ?></td>
                <td><?php echo $golsPro ?></td>
                <td><?php echo $golsSofridos ?></td>
                <td><?php echo $saldoGols ?></td>
                <td><?php echo $cartoesAmarelos ?></td>
                <td><?php echo $cartoesVermelhos ?></td>
            </tr>
         </div>
         <?php } ?>
            </table>
            </div>
            <br><br>
            <div class="tabelaClassificacaoA" id="tabelaClassificacaoA" style="display: block;">
            <table>
            <thead>
            <tr>
                <th class="nomeEquipeA">Classificação Bronze - Grupo A</th>
              <div class="tabelaA">
                <th>P</th>
                <th>J</th>
                <th>V</th>
                <th>E</th>
                <th>D</th>
                <th>GP</th>
                <th>GS</th>
                <th>SG</th>
                <th class="espacoAmareloA"><img class="cartao_amareloA" src="https://cdn.discordapp.com/attachments/750028167225540648/1056032748164350063/icons8-falta-48_1.png"/></th>
                <th class="espacoVermelhoA"><img class="cartao_vermelhoA" src="https://cdn.discordapp.com/attachments/750028167225540648/1056032624755351654/icons8-falta-48.png"/></th>
              </div>
            </tr>
            </thead>
    
        <?php $posicao = 0;
        while($classificacaoA = $query_dadosEquipesA->fetch_assoc()) { 
        //"Calcula" a posição do time
        $posicao = $posicao + 1;

        $nomeEquipe = $classificacaoA['nomeEquipe'];
        $pontos = $classificacaoA['pontos'];
        $jogos = $classificacaoA['jogos'];
        $vitorias = $classificacaoA['vitorias'];
        $empates = $classificacaoA['empates'];
        $derrotas = $classificacaoA['derrotas'];
        $golsPro = $classificacaoA['golsPro'];
        $golsSofridos = $classificacaoA['golsSofridos'];
        $saldoGols = $classificacaoA['saldoGols'];
        $cartoesAmarelos = $classificacaoA['cartoesAmarelos'];
        $cartoesVermelhos = $classificacaoA['cartoesVermelhos'];
        ?>
         <div class="dados_tabelaA">
            <tr>
                <td><p class="separar"><?php echo $posicao ?>&nbsp;&nbsp;&nbsp;<?php echo $nomeEquipe ?></p></td>
                <td><?php echo $pontos ?></td>
                <td><?php echo $jogos ?></td>
                <td><?php echo $vitorias ?></td>
                <td><?php echo $empates ?></td>
                <td><?php echo $derrotas ?></td>
                <td><?php echo $golsPro ?></td>
                <td><?php echo $golsSofridos ?></td>
                <td><?php echo $saldoGols ?></td>
                <td><?php echo $cartoesAmarelos ?></td>
                <td><?php echo $cartoesVermelhos ?></td>
            </tr>
         </div>
         <?php } ?>
            </table>
        </div>
        <br><br><br>
        <div class="tabelaClassificacaoB" id="tabelaClassificacaoB" style="display: block;">
            <table>
            <thead>
            <tr>
                <th class="nomeEquipeB">Classificação Bronze - Grupo B</th>
              <div class="tabelaB">
                <th>P</th>
                <th>J</th>
                <th>V</th>
                <th>E</th>
                <th>D</th>
                <th>GP</th>
                <th>GS</th>
                <th>SG</th>
                <th class="espacoAmareloB"><img class="cartao_amareloB" src="https://cdn.discordapp.com/attachments/750028167225540648/1056032748164350063/icons8-falta-48_1.png"/></th>
                <th class="espacoVermelhoB"><img class="cartao_vermelhoB" src="https://cdn.discordapp.com/attachments/750028167225540648/1056032624755351654/icons8-falta-48.png"/></th>
              </div>
            </tr>
            </thead>
        <?php $posicao = 0;
        while($classificacaoB = $query_dadosEquipesB->fetch_assoc()) { 
        //"Calcula" a posição do time
        $posicao = $posicao + 1;

        $nomeEquipe = $classificacaoB['nomeEquipe'];
        $pontos = $classificacaoB['pontos'];
        $jogos = $classificacaoB['jogos'];
        $vitorias = $classificacaoB['vitorias'];
        $empates = $classificacaoB['empates'];
        $derrotas = $classificacaoB['derrotas'];
        $golsPro = $classificacaoB['golsPro'];
        $golsSofridos = $classificacaoB['golsSofridos'];
        $saldoGols = $classificacaoB['saldoGols'];
        $cartoesAmarelos = $classificacaoB['cartoesAmarelos'];
        $cartoesVermelhos = $classificacaoB['cartoesVermelhos'];
        ?>
         <div class="dados_tabelaB">
            <tr>
                <td><p class="separar"><?php echo $posicao ?>&nbsp;&nbsp;&nbsp;<?php echo $nomeEquipe ?></p></td>
                <td><?php echo $pontos ?></td>
                <td><?php echo $jogos ?></td>
                <td><?php echo $vitorias ?></td>
                <td><?php echo $empates ?></td>
                <td><?php echo $derrotas ?></td>
                <td><?php echo $golsPro ?></td>
                <td><?php echo $golsSofridos ?></td>
                <td><?php echo $saldoGols ?></td>
                <td><?php echo $cartoesAmarelos ?></td>
                <td><?php echo $cartoesVermelhos ?></td>
            </tr>
         </div>
         <?php } ?>
            </table>
        </div>
        <br><br><br>
        <div class="tabelaClassificacaoC" id="tabelaClassificacaoC" style="display: block;">
            <table>
            <thead>
            <tr>
                <th class="nomeEquipeC">Classificação Bronze - Grupo C</th>
              <div class="tabelaC">
                <th>P</th>
                <th>J</th>
                <th>V</th>
                <th>E</th>
                <th>D</th>
                <th>GP</th>
                <th>GS</th>
                <th>SG</th>
                <th class="espacoAmareloC"><img class="cartao_amareloC" src="https://cdn.discordapp.com/attachments/750028167225540648/1056032748164350063/icons8-falta-48_1.png"/></th>
                <th class="espacoVermelhoC"><img class="cartao_vermelhoC" src="https://cdn.discordapp.com/attachments/750028167225540648/1056032624755351654/icons8-falta-48.png"/></th>
              </div>
            </tr>
            </thead>
            <?php $posicao = 0;
        while($classificacaoC = $query_dadosEquipesC->fetch_assoc()) { 
        //"Calcula" a posição do time
        $posicao = $posicao + 1;

        $nomeEquipe = $classificacaoC['nomeEquipe'];
        $pontos = $classificacaoC['pontos'];
        $jogos = $classificacaoC['jogos'];
        $vitorias = $classificacaoC['vitorias'];
        $empates = $classificacaoC['empates'];
        $derrotas = $classificacaoC['derrotas'];
        $golsPro = $classificacaoC['golsPro'];
        $golsSofridos = $classificacaoC['golsSofridos'];
        $saldoGols = $classificacaoC['saldoGols'];
        $cartoesAmarelos = $classificacaoC['cartoesAmarelos'];
        $cartoesVermelhos = $classificacaoC['cartoesVermelhos'];
        ?>
         <div class="dados_tabelaC">
            <tr>
                <td><p class="separar"><?php echo $posicao ?>&nbsp;&nbsp;&nbsp;<?php echo $nomeEquipe ?></p></td>
                <td><?php echo $pontos ?></td>
                <td><?php echo $jogos ?></td>
                <td><?php echo $vitorias ?></td>
                <td><?php echo $empates ?></td>
                <td><?php echo $derrotas ?></td>
                <td><?php echo $golsPro ?></td>
                <td><?php echo $golsSofridos ?></td>
                <td><?php echo $saldoGols ?></td>
                <td><?php echo $cartoesAmarelos ?></td>
                <td><?php echo $cartoesVermelhos ?></td>
            </tr>
         </div>
         <?php } ?>
            </table>
        </div>
        <?php } ?>