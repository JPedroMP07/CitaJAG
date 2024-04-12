<?php
    include('conexao.php');
    if(!isset($_SESSION)) {
      session_start();
    }

    if(!isset($_SESSION['usuario'])) {
        header("Location: inicio");
        die();
     }
    
     if(!($_SESSION['funcao'] == "arbitragem") && !($_SESSION['funcao'] == "admin")) {
        header("Location: inicio");
        die();
     }

     if(!isset($_SESSION["equipeCasa"]) && !isset($_SESSION["equipeVisitante"])) {
        header("Location: gerarSumula");
        die();
     }

         $equipeCasa = $_SESSION["equipeCasa"];
         $equipeVisitante = $_SESSION["equipeVisitante"];
         $categoria = $_SESSION["categoria"];

         date_default_timezone_set('America/Sao_Paulo');
         $dataAtual = date('Y-m-d');
        
         //Testa se uma súmula já foi criada hoje com as mesmas equipes e cria uma caso não esteja
         $sql_testaSumula = "SELECT criada FROM sumula WHERE equipeCasa = '$equipeCasa' AND equipeFora = '$equipeVisitante' AND dataPartida = '$dataAtual'";
         $query_criada = $mysqli->query($sql_testaSumula) or die($mysqli->error);
         if($query_criada->num_rows > 0) {
          $criada = $query_criada->fetch_assoc();
          $jaCriada = $criada['criada'];
         } else {
          $jaCriada = 0;
         }
         
         if($jaCriada != "1") {
            $sql_code = "INSERT INTO sumula (equipeCasa, equipeFora, criada) VALUES ('$equipeCasa', '$equipeVisitante', '1')";
            $funcionou = $mysqli->query($sql_code) or die($mysqli->error);
          }

          // Puxa todas as informações necessárias dos jogadores de ambas equipes
     if(isset($_SESSION["equipeCasa"]) && isset($_SESSION["equipeVisitante"])) { 
        $sql_nomesJogadoresCasa = "SELECT docIdentidade, fotoPerfil, nomeUsuario, numeroCamisa, gols, cartaoAmareloAtual, cartaoAmarelo, cartaoVermelhoAtual, cartaoVermelho, suspenso, joga, emblema, categoria, funcao FROM usuarios WHERE equipe = '$equipeCasa' AND categoria = '$categoria' AND joga = '1'";
        $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

        $sql_nomesJogadoresVisitante = "SELECT docIdentidade, fotoPerfil, nomeUsuario, numeroCamisa, gols, cartaoAmareloAtual, cartaoAmarelo, cartaoVermelhoAtual, cartaoVermelho, suspenso, joga, emblema, categoria, funcao FROM usuarios WHERE equipe = '$equipeVisitante' AND categoria = '$categoria' AND joga = '1'";
        $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);
     }

     if(isset($_SESSION["sumulaRecarregada"])) {
       $sql_sumulaRecarregada = "SELECT * FROM sumula WHERE equipeCasa = '$equipeCasa' AND equipeFora = '$equipeVisitante'";
       $query_sumulaRecarregada = $mysqli->query($sql_sumulaRecarregada) or die($mysqli->error);
     }

     if(count($_POST) > 0) {
        while($dadoJogador = $query_dadosJogadoresCasa->fetch_assoc()) { 
            $docIdentidade = $dadoJogador['docIdentidade'];
            $fotoPerfil = $dadoJogador['fotoPerfil'];
            $nomeJogador = $dadoJogador['nomeUsuario'];
            $numeroCamisa = $dadoJogador['numeroCamisa'];
            $gols = $dadoJogador['gols'];
            $cartaoAmareloAtual = $dadoJogador['cartaoAmareloAtual'];
            $cartaoAmarelo = $dadoJogador['cartaoAmarelo'];
            $cartaoVermelhoAtual = $dadoJogador['cartaoVermelhoAtual'];
            $cartaoVermelho = $dadoJogador['cartaoVermelho'];
            $suspenso = $dadoJogador['suspenso'];
            $emblema = $dadoJogador['emblema'];

            $amareloAtual = $_POST['cartaoAmarelo'.$docIdentidade];
            $vermelhoAtual = $_POST['cartaoVermelho'.$docIdentidade];

            $numeroCamisaGol1 = $_POST['gols1'];
            $numeroCamisaGol2 = $_POST['gols2'];
            $numeroCamisaGol3 = $_POST['gols3'];
            $numeroCamisaGol4 = $_POST['gols4'];
            $numeroCamisaGol5 = $_POST['gols5'];
            $numeroCamisaGol6 = $_POST['gols6'];
            $numeroCamisaGol7 = $_POST['gols7'];
            $numeroCamisaGol8 = $_POST['gols8'];
            $numeroCamisaGol9 = $_POST['gols9'];
            $numeroCamisaGol10 = $_POST['gols10'];
            $numeroCamisaGol11 = $_POST['gols11'];
            $numeroCamisaGol12 = $_POST['gols12'];
            $numeroCamisaGol13 = $_POST['gols13'];
            $numeroCamisaGol14 = $_POST['gols14'];
            $numeroCamisaGol15 = $_POST['gols15'];
            $numeroCamisaGol16 = $_POST['gols16'];
            $numeroCamisaGol17 = $_POST['gols17'];
            $numeroCamisaGol18 = $_POST['gols18'];
            $numeroCamisaGol19 = $_POST['gols19'];
            $numeroCamisaGol20 = $_POST['gols20'];
            $numeroCamisaGol21 = $_POST['gols21'];
            $numeroCamisaGol22 = $_POST['gols22'];

            $golsTotais = $gols;
            if($numeroCamisaGol1 > 0 && $numeroCamisaGol1 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol2 > 0 && $numeroCamisaGol2 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol3 > 0 && $numeroCamisaGol3 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol4 > 0 && $numeroCamisaGol4 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol5 > 0 && $numeroCamisaGol5 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol6 > 0 && $numeroCamisaGol6 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol7 > 0 && $numeroCamisaGol7 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol8 > 0 && $numeroCamisaGol8 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol9 > 0 && $numeroCamisaGol9 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol10 > 0 && $numeroCamisaGol10 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol11 > 0 && $numeroCamisaGol11 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol12 > 0 && $numeroCamisaGol12 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol13 > 0 && $numeroCamisaGol13 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol14 > 0 && $numeroCamisaGol14 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol15 > 0 && $numeroCamisaGol15 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol16 > 0 && $numeroCamisaGol16 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol17 > 0 && $numeroCamisaGol17 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol18 > 0 && $numeroCamisaGol18 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol19 > 0 && $numeroCamisaGol19 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol20 > 0 && $numeroCamisaGol20 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol21 > 0 && $numeroCamisaGol21 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            if($numeroCamisaGol22 > 0 && $numeroCamisaGol22 == $numeroCamisa) {
              $golsTotais = $golsTotais + 1;
            }
            
            if(($suspenso == 1) && ($amareloAtual == 0) && ($vermelhoAtual == 0)) {
              $suspenso = 0;
            } else if (($suspenso > 1) && ($amareloAtual == 0) && ($vermelhoAtual == 0)) {
              $suspenso = $suspenso - 1;
            }

            if($amareloAtual == 0) {
              $amareloRecebido = $cartaoAmareloAtual;
              $amarelo = $cartaoAmarelo;
            } else if($amareloAtual == 1) {
              $amareloRecebido = $cartaoAmareloAtual + 1;
              $amarelo = $cartaoAmarelo + 1;
              if($amareloRecebido == 3) {
                $suspenso = 1;
                $amareloRecebido = 0;
              }
            } else if($amareloAtual == 2) {
              $amareloRecebido = $cartaoAmareloAtual + 2;
              $amarelo = $cartaoAmarelo + 2;
              if($amareloRecebido >= 3 ) {
                $suspenso = 1;
                $amareloRecebido = 0;
              }
            }
            
            if($vermelhoAtual == 0) {
              $vermelhoRecebido = $cartaoVermelhoAtual;
              $vermelho = $cartaoVermelho;
            } else if($vermelhoAtual == 1) {
              $vermelhoRecebido = $cartaoVermelhoAtual + 1;
              $vermelho = $cartaoVermelho + 1;
              if($vermelhoRecebido == 1) {
                $suspenso = 1;
                $vermelhoRecebido = 0;
              }
            }
            
            $sql_codeSumula = "UPDATE usuarios SET gols = '$golsTotais', cartaoAmareloAtual = '$amareloRecebido', cartaoAmarelo = '$amarelo', cartaoVermelhoAtual = '$vermelhoRecebido', cartaoVermelho = '$vermelho', suspenso = '$suspenso' WHERE nomeUsuario = '$nomeJogador' AND equipe = '$equipeCasa'";
            $funcionou = $mysqli->query($sql_codeSumula) or die($mysqli->error);
            } 
          }      

     if(count($_POST) > 0) {
            while($dadoJogador = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                $docIdentidade = $dadoJogador['docIdentidade'];
                $fotoPerfil = $dadoJogador['fotoPerfil'];
                $nomeJogador = $dadoJogador['nomeUsuario'];
                $numeroCamisa = $dadoJogador['numeroCamisa'];
                $gols = $dadoJogador['gols'];
                $cartaoAmareloAtual = $dadoJogador['cartaoAmareloAtual'];
                $cartaoAmarelo = $dadoJogador['cartaoAmarelo'];
                $cartaoVermelhoAtual = $dadoJogador['cartaoVermelhoAtual'];
                $cartaoVermelho = $dadoJogador['cartaoVermelho'];
                $suspenso = $dadoJogador['suspenso'];
                echo $suspenso . " ," . $nomeJogador;
                $emblema = $dadoJogador['emblema'];

            $amareloAtual = $_POST['cartaoAmarelo'.$docIdentidade];
            $vermelhoAtual = $_POST['cartaoVermelho'.$docIdentidade];

            $numeroCamisaGol1 = $_POST['golsFora1'];
            $numeroCamisaGol2 = $_POST['golsFora2'];
            $numeroCamisaGol3 = $_POST['golsFora3'];
            $numeroCamisaGol4 = $_POST['golsFora4'];
            $numeroCamisaGol5 = $_POST['golsFora5'];
            $numeroCamisaGol6 = $_POST['golsFora6'];
            $numeroCamisaGol7 = $_POST['golsFora7'];
            $numeroCamisaGol8 = $_POST['golsFora8'];
            $numeroCamisaGol9 = $_POST['golsFora9'];
            $numeroCamisaGol10 = $_POST['golsFora10'];
            $numeroCamisaGol11 = $_POST['golsFora11'];
            $numeroCamisaGol12 = $_POST['golsFora12'];
            $numeroCamisaGol13 = $_POST['golsFora13'];
            $numeroCamisaGol14 = $_POST['golsFora14'];
            $numeroCamisaGol15 = $_POST['golsFora15'];
            $numeroCamisaGol16 = $_POST['golsFora16'];
            $numeroCamisaGol17 = $_POST['golsFora17'];
            $numeroCamisaGol18 = $_POST['golsFora18'];
            $numeroCamisaGol19 = $_POST['golsFora19'];
            $numeroCamisaGol20 = $_POST['golsFora20'];
            $numeroCamisaGol21 = $_POST['golsFora21'];
            $numeroCamisaGol22 = $_POST['golsFora22'];

            $golsTotais = $gols;
              if($numeroCamisaGol1 > 0 && $numeroCamisaGol1 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol2 > 0 && $numeroCamisaGol2 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol3 > 0 && $numeroCamisaGol3 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol4 > 0 && $numeroCamisaGol4 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol5 > 0 && $numeroCamisaGol5 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol6 > 0 && $numeroCamisaGol6 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol7 > 0 && $numeroCamisaGol7 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol8 > 0 && $numeroCamisaGol8 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol9 > 0 && $numeroCamisaGol9 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol10 > 0 && $numeroCamisaGol10 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol11 > 0 && $numeroCamisaGol11 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol12 > 0 && $numeroCamisaGol12 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol13 > 0 && $numeroCamisaGol13 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol14 > 0 && $numeroCamisaGol14 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol15 > 0 && $numeroCamisaGol15 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol16 > 0 && $numeroCamisaGol16 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol17 > 0 && $numeroCamisaGol17 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol18 > 0 && $numeroCamisaGol18 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol19 > 0 && $numeroCamisaGol19 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol20 > 0 && $numeroCamisaGol20 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol21 > 0 && $numeroCamisaGol21 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }
              if($numeroCamisaGol22 > 0 && $numeroCamisaGol22 == $numeroCamisa) {
                $golsTotais = $golsTotais + 1;
              }

            if(($suspenso == 1) && ($amareloAtual == 0) && ($vermelhoAtual == 0)) {
                $suspenso = 0;
            } else if (($suspenso > 1) && ($amareloAtual == 0) && ($vermelhoAtual == 0)) {
              $suspenso = $suspenso - 1;
            }

            if($amareloAtual == 0) {
                $amareloRecebido = $cartaoAmareloAtual;
                $amarelo = $cartaoAmarelo;
            } else if($amareloAtual == 1) {
                $amareloRecebido = $cartaoAmareloAtual + 1;
                $amarelo = $cartaoAmarelo + 1;
                if($amareloRecebido == 3) {
                    $suspenso = 1;
                    $amareloRecebido = 0;
                }
            } else if($amareloAtual == 2) {
                $amareloRecebido = $cartaoAmareloAtual + 2;
                $amarelo = $cartaoAmarelo + 2;
                if($amareloRecebido >= 3 ) {
                    $suspenso = 1;
                    $amareloRecebido = 0;
                }
            }
    
            if($vermelhoAtual == 0 && $amareloRecebido < 3) {
                $vermelhoRecebido = $cartaoVermelhoAtual;
                $vermelho = $cartaoVermelho;
            } else if($vermelhoAtual == 1) {
                $vermelhoRecebido = $cartaoVermelhoAtual + 1;
                $vermelho = $cartaoVermelho + 1;
                if($vermelhoRecebido == 1) {
                    $suspenso = 1;
                    $vermelhoRecebido = 0;
                }
            }                

            $sql_codeSumula = "UPDATE usuarios SET gols = '$golsTotais', cartaoAmareloAtual = '$amareloRecebido', cartaoAmarelo = '$amarelo', cartaoVermelhoAtual = '$vermelhoRecebido', cartaoVermelho = '$vermelho', suspenso = '$suspenso' WHERE nomeUsuario = '$nomeJogador' AND equipe = '$equipeVisitante'";
            $funcionou = $mysqli->query($sql_codeSumula) or die($mysqli->error);
          }

          //Consulta SQL da tabela classificação para puxar e armazenar os dados dos jogos nela
          $sql_dadosClassificacao = "SELECT nomeEquipe, pontos, jogos, vitorias, empates, derrotas, golsPro, golsSofridos, saldoGols, cartoesAmarelos, cartoesVermelhos FROM classificacao WHERE nomeEquipe = '$equipeCasa' AND categoria = '$categoria'";
          $query_dadosClassificacao = $mysqli->query($sql_dadosClassificacao) or die($mysqli->error);

          $dadosClassificacaoCasa = $query_dadosClassificacao->fetch_assoc();

            $pontos = $dadosClassificacaoCasa['pontos'];
            $jogos = $dadosClassificacaoCasa['jogos'];
            $vitoria = $dadosClassificacaoCasa['vitorias'];
            $empate = $dadosClassificacaoCasa['empates'];
            $derrota = $dadosClassificacaoCasa['derrotas'];
            $golsPro = $dadosClassificacaoCasa['golsPro'];
            $golsSofridos = $dadosClassificacaoCasa['golsSofridos'];
            $saldoGols = $dadosClassificacaoCasa['saldoGols'];

          $golsCasa = $_POST['golsCasa'];
          $golsVisitante = $_POST['golsVisitante'];

          //Somador empates, vitorias e derrotas + somador de partidas
          if($golsCasa > $golsVisitante) {
            $vitoria = $vitoria + 1;
            $pontos = $pontos + 3;
            $jogos = $jogos + 1;
          } else if($golsCasa < $golsVisitante) {
            $derrota = $derrota + 1;
            $pontos = $pontos + 0;
            $jogos = $jogos + 1;
          } else {
            $empate = $empate + 1;
            $pontos = $pontos + 1;
            $jogos = $jogos + 1;
          }

          //Contador de Saldo de Gols Geral
          if($golsCasa > 0 || $golsVisitante > 0) {
              $golsPro = $golsCasa + $golsPro;
              $golsSofridos = $golsSofridos + $golsVisitante;
              $saldoGols = $golsPro - $golsSofridos;
          } else {
              $golsPro = $golsPro;
              $golsSofridos = $golsSofridos;
              $saldoGols = $saldoGols;
          }

          $sql_cartoesEquipeCasa = "SELECT SUM(cartaoAmarelo) AS cartaoAmarelo, SUM(cartaoVermelho) AS cartaoVermelho FROM usuarios WHERE equipe = '$equipeCasa' AND categoria = '$categoria'";
          $query_cartoesEquipeCasa = $mysqli->query($sql_cartoesEquipeCasa) or die($mysqli->error);

          $cartoesCasa = $query_cartoesEquipeCasa->fetch_assoc();
          $cartoesAmarelosCasa = $cartoesCasa['cartaoAmarelo'];
          $cartoesVermelhosCasa = $cartoesCasa['cartaoVermelho'];
          
          if($cartoesAmarelosCasa > 0) {
            $cartaoAmareloCasa = $cartoesAmarelosCasa;
          } else {
            $cartaoAmareloCasa = 0;
          }

          if($cartoesVermelhosCasa > 0) {
            $cartaoVermelhoCasa = $cartoesVermelhosCasa;
          } else {
            $cartaoVermelhoCasa = 0;
          }
          
          $sql_codeClassificacaoCasa = "UPDATE classificacao SET pontos = '$pontos', jogos = '$jogos', vitorias = '$vitoria', empates = '$empate', derrotas = '$derrota', golsPro = '$golsPro', golsSofridos = '$golsSofridos', saldoGols = '$saldoGols', cartoesAmarelos = '$cartaoAmareloCasa', cartoesVermelhos = '$cartaoVermelhoCasa' WHERE nomeEquipe = '$equipeCasa' AND categoria = '$categoria'";
          $funcionou = $mysqli->query($sql_codeClassificacaoCasa) or die($mysqli->error);

          //Classificacao do Visitante
          //Consulta SQL da tabela classificação para puxar e armazenar os dados dos jogos nela
          $sql_dadosClassificacao = "SELECT nomeEquipe, pontos, jogos, vitorias, empates, derrotas, golsPro, golsSofridos, saldoGols, cartoesAmarelos, cartoesVermelhos FROM classificacao WHERE nomeEquipe = '$equipeVisitante' AND categoria = '$categoria'";
          $query_dadosClassificacao = $mysqli->query($sql_dadosClassificacao) or die($mysqli->error);

          $dadosClassificacaoVisitante = $query_dadosClassificacao->fetch_assoc();

            $pontos = $dadosClassificacaoVisitante['pontos'];
            $jogos = $dadosClassificacaoVisitante['jogos'];
            $vitoria = $dadosClassificacaoVisitante['vitorias'];
            $empate = $dadosClassificacaoVisitante['empates'];
            $derrota = $dadosClassificacaoVisitante['derrotas'];
            $golsPro = $dadosClassificacaoVisitante['golsPro'];
            $golsSofridos = $dadosClassificacaoVisitante['golsSofridos'];
            $saldoGols = $dadosClassificacaoVisitante['saldoGols'];

          $golsCasa = $_POST['golsCasa'];
          $golsVisitante = $_POST['golsVisitante'];

          //Somador empates, vitorias e derrotas + somador de partidas
          if($golsCasa < $golsVisitante) {
            $vitoria = $vitoria + 1;
            $pontos = $pontos + 3;
            $jogos = $jogos + 1;
          } else if($golsCasa > $golsVisitante) {
            $derrota = $derrota + 1;
            $pontos = $pontos + 0;
            $jogos = $jogos + 1;
          } else {
            $empate = $empate + 1;
            $pontos = $pontos + 1;
            $jogos = $jogos + 1;
          }

          //Contador de Saldo de Gols Geral
          $golsPro = $golsVisitante + $golsPro;
          $golsSofridos = $golsSofridos + $golsCasa;
          $saldoGols = $golsPro - $golsSofridos;

          $sql_cartoesEquipeVisitante = "SELECT SUM(cartaoAmarelo) AS cartaoAmarelo, SUM(cartaoVermelho) AS cartaoVermelho FROM usuarios WHERE equipe = '$equipeVisitante' AND categoria = '$categoria'";
          $query_cartoesEquipeVisitante = $mysqli->query($sql_cartoesEquipeVisitante) or die($mysqli->error);

          $cartoesVisitante = $query_cartoesEquipeVisitante->fetch_assoc();
          $cartoesAmarelosVisitante = $cartoesVisitante['cartaoAmarelo'];
          $cartoesVermelhosVisitante = $cartoesVisitante['cartaoVermelho'];

          if($cartoesAmarelosVisitante > 0) {
            $cartaoAmareloVisitante = $cartoesAmarelosVisitante;
          } else {
            $cartaoAmareloVisitante = 0;
          }

          if($cartoesVermelhosVisitante > 0) {
            $cartaoVermelhoVisitante = $cartoesVermelhosVisitante;
          } else {
            $cartaoVermelhoVisitante = 0;
          }

          $sql_codeClassificacaoVisitante = "UPDATE classificacao SET pontos = '$pontos', jogos = '$jogos', vitorias = '$vitoria', empates = '$empate', derrotas = '$derrota', golsPro = '$golsPro', golsSofridos = '$golsSofridos', saldoGols = '$saldoGols', cartoesAmarelos = '$cartaoAmareloVisitante', cartoesVermelhos = '$cartaoVermelhoVisitante' WHERE nomeEquipe = '$equipeVisitante' AND categoria = '$categoria'";
          $funcionou = $mysqli->query($sql_codeClassificacaoVisitante) or die($mysqli->error);
          echo $funcionou;
          $sql_update2 = "UPDATE jogoatual SET equipeCasa = 'EquipeCasa', golsCasa = '0', equipeFora = 'EquipeFora', golsFora = '0', categoria = 'Categoria' WHERE id_partida = '1'"; 
          $funcionou_update2 = $mysqli->query($sql_update2) or die($mysqli->error);
         
          header("Location: gerarPdfSumula");
          die();
        }
     ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="icon" href="https://cdn.discordapp.com/attachments/750028167225540648/963110597187235870/icone_appcjagforeground.png">
      <style>
        body {
          padding-top: 20px;
          padding-bottom: 20px;
        }

        #sig-canvas {
          border: 2px dotted #CCCCCC;
          border-radius: 5px;
          cursor: crosshair;
        }

        #sig-dataUrl {
          width: 100%;
        }
      </style>

      <style>
        body {
          padding-top: 20px;
          padding-bottom: 20px;
        }

        #sig-canvas1 {
          border: 2px dotted #CCCCCC;
          border-radius: 5px;
          cursor: crosshair;
        }

        #sig-dataUrl1 {
          width: 100%;
        }
      </style>

      <style>
        body {
          padding-top: 20px;
          padding-bottom: 20px;
        }

        #sig-canvas2 {
          border: 2px dotted #CCCCCC;
          border-radius: 5px;
          cursor: crosshair;
        }

        #sig-dataUrl2 {
          width: 100%;
        }
      </style>

      <style>
        body {
          padding-top: 20px;
          padding-bottom: 20px;
        }

        #sig-canvas3 {
          border: 2px dotted #CCCCCC;
          border-radius: 5px;
          cursor: crosshair;
        }

        #sig-dataUrl3 {
          width: 100%;
        }
      </style>

      <style>
        body {
          padding-top: 20px;
          padding-bottom: 20px;
        }

        #sig-canvasArb {
          border: 2px dotted #CCCCCC;
          border-radius: 5px;
          cursor: crosshair;
        }

        #sig-dataUrlArb {
          width: 100%;
        }
      </style>

      <style>
        body {
          padding-top: 20px;
          padding-bottom: 20px;
        }

        #sig-canvasArb1 {
          border: 2px dotted #CCCCCC;
          border-radius: 5px;
          cursor: crosshair;
        }

        #sig-dataUrlArb1 {
          width: 100%;
        }
      </style>

      <style>
        body {
          padding-top: 20px;
          padding-bottom: 20px;
        }

        #sig-canvasArb2 {
          border: 2px dotted #CCCCCC;
          border-radius: 5px;
          cursor: crosshair;
        }

        #sig-dataUrlArb2 {
          width: 100%;
        }
      </style>

      <style>
        body {
          padding-top: 20px;
          padding-bottom: 20px;
        }

        #sig-canvasArb3 {
          border: 2px dotted #CCCCCC;
          border-radius: 5px;
          cursor: crosshair;
        }

        #sig-dataUrlArb3 {
          width: 100%;
        }
      </style>
      <link rel="stylesheet" href="sumula.css">
    <title>CitaJAG - Súmula Online</title>
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
                            <li><a href="/gerarSumula">Voltar</a></li>
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
                    <div class="mais-opcoes">
                        <li><a href="/gerarSumula">Voltar</a></li>
                    </div>
                        <div class="funcao-sair">
                            
                            <?php if($_SESSION['funcao'] == "arbitragem" || $_SESSION['funcao'] == "admin") { ?>
                            <li><a>Atletas Suspensos: </a></li>
                            <!-- Algoritmo para gerar todos os atletas suspensos, ou seja, aqueles que não podem disputar a partida -->
                            <?php } ?>
                        </div>
                    </ul>
                </div>
            <?php } ?>
            <label>
                <img class="logo" src="https://cdn.discordapp.com/attachments/750028167225540648/963110573829128222/logocitajagtelaini.png">
            </label>
                <ul class="opcoes_navegacao">
                        <li><a href="/gerarSumula">Voltar</a></li>
                      <label class="btnlogin">
                        <li><a href="/login" <?php if(isset($_SESSION['usuario'])) { ?> style="display: none;" <?php } ?>>Login</a></li>
                      </label>
                </ul>                    
        </nav>
    </header>
    <main>
      <div class="div_sumula">           
            <form action="" method="POST">
                  <div class="parte_inicial">
                    <div class="titulo_sumula">
                        <img class="logo-sumula" src="https://cdn.discordapp.com/attachments/750028167225540648/1088666411783700541/logocitajagtelaini.png">
                        <h1>Campeonato Citadino de Jaguarão</h1>
                    </div>

                    <style>
                    <style>
@page { margin-left: 0in; margin-right: 0in; margin-top: 0in; margin-bottom: 0in; }
body { margin-left: 0in; margin-right: 0in; margin-top: 0in; margin-bottom: 0in; }
</style>

<div class="sumula-oficial">
    <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
        <col class="col0">
        <col class="col1">
        <col class="col2">
        <col class="col3">
        <col class="col4">
        <col class="col5">
        <col class="col6">
        <col class="col7">
        <col class="col8">
        <col class="col9">
        <col class="col10">
        <col class="col11">
        <col class="col12">
        <col class="col13">
        <col class="col14">
        <col class="col15">
        <col class="col16">
        <col class="col17">
        <col class="col18">
        <col class="col19">
        <col class="col20">
        <col class="col21">
        <col class="col22">
        <col class="col23">
        <col class="col24">
        <col class="col25">
        <col class="col26">
        <col class="col27">
        <col class="col28">
        <col class="col29">
        <col class="col30">
        <col class="col31">
        <col class="col32">
        <col class="col33">
        <col class="col34">
        <col class="col35">
        <tbody>
          <tr class="row1">
            <td class="column0 style1 null"></td>
            <td class="column1 style167 null"></td>
            <td class="column2 style1 null"></td>
            <td class="column3 style1 null"></td>
            <td class="column4 style1 null"></td>
            <td class="column5 style1 null"></td>
            <td class="column6 style1 null"></td>
            <td class="column7 style1 null"></td>
            <td class="column8 style1 null"></td>
            <td class="column9 style1 null"></td>
            <td class="column10 style1 null"></td>
            <td class="column11 style1 null"></td>
            <td class="column12 style1 null"></td>
            <td class="column13 style1 null"></td>
            <td class="column14 style1 null"></td>
            <td class="column15 style1 null"></td>
            <td class="column16 style1 null"></td>
            <td class="column17 style1 null"></td>
            <td class="column18 style1 null"></td>
            <td class="column19 style1 null"></td>
            <td class="column20 style1 null"></td>
            <td class="column21 style1 null"></td>
            <td class="column22 style1 null"></td>
            <td class="column23 style1 null"></td>
            <td class="column24 style1 null"></td>
            <td class="column25 style1 null"></td>
            <td class="column26 style1 null"></td>
            <td class="column27 style1 null"></td>
            <td class="column28 style1 null"></td>
            <td class="column29 style1 null"></td>
            <td class="column30 style1 null"></td>
            <td class="column31 style1 null"></td>
            <td class="column32 style1 null"></td>
          </tr>
          <tr class="row3">
            <td class="column0 style187 s style189" colspan="35">SÚMULA DE JOGO</td>
          </tr>
          <!-- Puxando dados já escritos da súmula caso seja recarregada -->
          <?php if(isset($_SESSION["sumulaRecarregada"])) {
                  $dadosSumula = $query_sumulaRecarregada->fetch_assoc();

                  $dataPartida = $dadosSumula["dataPartida"];

                  $golsCasa = $dadosSumula["golsCasa"];
                  $golsFora = $dadosSumula["golsFora"];
                  
                  $nome1Arbitro = $dadosSumula["nome1Arbitro"];
                  $nome2Arbitro = $dadosSumula["nome2Arbitro"];
                  $nomeAnotador = $dadosSumula["nomeAnotador"];
                  $nomeCronometrista = $dadosSumula["nomeCronometrista"];

                  $ass1Arb = $dadosSumula["ass1Arb"];
                  $ass2Arb = $dadosSumula["ass2Arb"];
                  $assAnotador = $dadosSumula["assAnotador"];
                  $assCronometrista = $dadosSumula["assCronometrista"];
              
                  $assTecCasa = $dadosSumula["assTecCasa"];
                  $assCapCasa = $dadosSumula["assCapCasa"];
                  $assTecFora = $dadosSumula["assTecFora"];
                  $assCapFora = $dadosSumula["assCapFora"];

                  $placar1Periodo1 = $dadosSumula["placar1Periodo1"];
                  $placar1Periodo2 = $dadosSumula["placar1Periodo2"];
                  $horarioInicio1Periodo1 = $dadosSumula["horarioInicio1Periodo1"];
                  $horarioInicio1Periodo2 = $dadosSumula["horarioInicio1Periodo2"];
                  $placar2Periodo1 = $dadosSumula["placar2Periodo1"];
                  $placar2Periodo2 = $dadosSumula["placar2Periodo2"];
                  $horarioInicio2Periodo1 = $dadosSumula["horarioInicio2Periodo1"];
                  $horarioInicio2Periodo2 = $dadosSumula["horarioInicio2Periodo2"];
                  $placarProrrogacao1 = $dadosSumula["placarProrrogacao1"];
                  $placarProrrogacao2 = $dadosSumula["placarProrrogacao2"];
                  $horarioInicioProrrogacao1 = $dadosSumula["horarioInicioProrrogacao1"];
                  $horarioInicioProrrogacao2 = $dadosSumula["horarioInicioProrrogacao2"];
                  $placarPenaltis1 = $dadosSumula["placarPenaltis1"];
                  $placarPenaltis2 = $dadosSumula["placarPenaltis2"];
                  $horarioFinal1 = $dadosSumula["horarioFinal1"];
                  $horarioFinal2 = $dadosSumula["horarioFinal2"];
                  $placarFinal1 = $dadosSumula["placarFinal1"];
                  $placarFinal2 = $dadosSumula["placarFinal2"];

                  $amareloCasa1 = $dadosSumula["amareloCasa1"];
                  $amareloCasa2 = $dadosSumula["amareloCasa2"];
                  $amareloCasa3 = $dadosSumula["amareloCasa3"];
                  $amareloCasa4 = $dadosSumula["amareloCasa4"];
                  $amareloCasa5 = $dadosSumula["amareloCasa5"];
                  $amareloCasa6 = $dadosSumula["amareloCasa6"];
                  $amareloCasa7 = $dadosSumula["amareloCasa7"];
                  $amareloCasa8 = $dadosSumula["amareloCasa8"];
                  $amareloCasa9 = $dadosSumula["amareloCasa9"];
                  $amareloCasa10 = $dadosSumula["amareloCasa10"];
                  $amareloCasa11 = $dadosSumula["amareloCasa11"];
                  $amareloCasa12 = $dadosSumula["amareloCasa12"];
                  $amareloCasa13 = $dadosSumula["amareloCasa13"];
                  $amareloCasa14 = $dadosSumula["amareloCasa14"];
                  $amareloCasa15 = $dadosSumula["amareloCasa15"];

                  $minAmareloCasa1 = $dadosSumula["minAmareloCasa1"];
                  $secAmareloCasa1 = $dadosSumula["secAmareloCasa1"];
                  $minAmareloCasa2 = $dadosSumula["minAmareloCasa2"];
                  $secAmareloCasa2 = $dadosSumula["secAmareloCasa2"];
                  $minAmareloCasa3 = $dadosSumula["minAmareloCasa3"];
                  $secAmareloCasa3 = $dadosSumula["secAmareloCasa3"];
                  $minAmareloCasa4 = $dadosSumula["minAmareloCasa4"];
                  $secAmareloCasa4 = $dadosSumula["secAmareloCasa4"];
                  $minAmareloCasa5 = $dadosSumula["minAmareloCasa5"];
                  $secAmareloCasa5 = $dadosSumula["secAmareloCasa5"];
                  $minAmareloCasa6 = $dadosSumula["minAmareloCasa6"];
                  $secAmareloCasa6 = $dadosSumula["secAmareloCasa6"];
                  $minAmareloCasa7 = $dadosSumula["minAmareloCasa7"];
                  $secAmareloCasa7 = $dadosSumula["secAmareloCasa7"];
                  $minAmareloCasa8 = $dadosSumula["minAmareloCasa8"];
                  $secAmareloCasa8 = $dadosSumula["secAmareloCasa8"];
                  $minAmareloCasa9 = $dadosSumula["minAmareloCasa9"];
                  $secAmareloCasa9 = $dadosSumula["secAmareloCasa9"];
                  $minAmareloCasa10 = $dadosSumula["minAmareloCasa10"];
                  $secAmareloCasa10 = $dadosSumula["secAmareloCasa10"];
                  $minAmareloCasa11 = $dadosSumula["minAmareloCasa11"];
                  $secAmareloCasa11 = $dadosSumula["secAmareloCasa11"];
                  $minAmareloCasa12 = $dadosSumula["minAmareloCasa12"];
                  $secAmareloCasa12 = $dadosSumula["secAmareloCasa12"];
                  $minAmareloCasa13 = $dadosSumula["minAmareloCasa13"];
                  $secAmareloCasa13 = $dadosSumula["secAmareloCasa13"];
                  $minAmareloCasa14 = $dadosSumula["minAmareloCasa14"];
                  $secAmareloCasa14 = $dadosSumula["secAmareloCasa14"];
                  $minAmareloCasa15 = $dadosSumula["minAmareloCasa15"];
                  $secAmareloCasa15 = $dadosSumula["secAmareloCasa15"];

                  $vermelhoCasa1 = $dadosSumula["vermelhoCasa1"];
                  $vermelhoCasa2 = $dadosSumula["vermelhoCasa2"];
                  $vermelhoCasa3 = $dadosSumula["vermelhoCasa3"];
                  $vermelhoCasa4 = $dadosSumula["vermelhoCasa4"];
                  $vermelhoCasa5 = $dadosSumula["vermelhoCasa5"];
                  $vermelhoCasa6 = $dadosSumula["vermelhoCasa6"];
                  $vermelhoCasa7 = $dadosSumula["vermelhoCasa7"];
                  $vermelhoCasa8 = $dadosSumula["vermelhoCasa8"];
                  $vermelhoCasa9 = $dadosSumula["vermelhoCasa9"];
                  $vermelhoCasa10 = $dadosSumula["vermelhoCasa10"];
                  $vermelhoCasa11 = $dadosSumula["vermelhoCasa11"];
                  $vermelhoCasa12 = $dadosSumula["vermelhoCasa12"];
                  $vermelhoCasa13 = $dadosSumula["vermelhoCasa13"];
                  $vermelhoCasa14 = $dadosSumula["vermelhoCasa14"];
                  $vermelhoCasa15 = $dadosSumula["vermelhoCasa15"];

                  $minVermelhoCasa1 = $dadosSumula["minVermelhoCasa1"];
                  $secVermelhoCasa1 = $dadosSumula["secVermelhoCasa1"];
                  $minVermelhoCasa2 = $dadosSumula["minVermelhoCasa2"];
                  $secVermelhoCasa2 = $dadosSumula["secVermelhoCasa2"];
                  $minVermelhoCasa3 = $dadosSumula["minVermelhoCasa3"];
                  $secVermelhoCasa3 = $dadosSumula["secVermelhoCasa3"];
                  $minVermelhoCasa4 = $dadosSumula["minVermelhoCasa4"];
                  $secVermelhoCasa4 = $dadosSumula["secVermelhoCasa4"];
                  $minVermelhoCasa5 = $dadosSumula["minVermelhoCasa5"];
                  $secVermelhoCasa5 = $dadosSumula["secVermelhoCasa5"];
                  $minVermelhoCasa6 = $dadosSumula["minVermelhoCasa6"];
                  $secVermelhoCasa6 = $dadosSumula["secVermelhoCasa6"];
                  $minVermelhoCasa7 = $dadosSumula["minVermelhoCasa7"];
                  $secVermelhoCasa7 = $dadosSumula["secVermelhoCasa7"];
                  $minVermelhoCasa8 = $dadosSumula["minVermelhoCasa8"];
                  $secVermelhoCasa8 = $dadosSumula["secVermelhoCasa8"];
                  $minVermelhoCasa9 = $dadosSumula["minVermelhoCasa9"];
                  $secVermelhoCasa9 = $dadosSumula["secVermelhoCasa9"];
                  $minVermelhoCasa10 = $dadosSumula["minVermelhoCasa10"];
                  $secVermelhoCasa10 = $dadosSumula["secVermelhoCasa10"];
                  $minVermelhoCasa11 = $dadosSumula["minVermelhoCasa11"];
                  $secVermelhoCasa11 = $dadosSumula["secVermelhoCasa11"];
                  $minVermelhoCasa12 = $dadosSumula["minVermelhoCasa12"];
                  $secVermelhoCasa12 = $dadosSumula["secVermelhoCasa12"];
                  $minVermelhoCasa13 = $dadosSumula["minVermelhoCasa13"];
                  $secVermelhoCasa13 = $dadosSumula["secVermelhoCasa13"];
                  $minVermelhoCasa14 = $dadosSumula["minVermelhoCasa14"];
                  $secVermelhoCasa14 = $dadosSumula["secVermelhoCasa14"];
                  $minVermelhoCasa15 = $dadosSumula["minVermelhoCasa15"];
                  $secVermelhoCasa15 = $dadosSumula["secVermelhoCasa15"];

                  $vermelhoTreinadorCasa = $dadosSumula["vermelhoTreinadorCasa"];
                  $minVerTreinadorCasa = $dadosSumula["minVerTreinadorCasa"];
                  $secVerTreinadorCasa = $dadosSumula["secVerTreinadorCasa"];
                  
                  $vermelhoAuxiliarCasa = $dadosSumula["vermelhoAuxiliarCasa"];
                  $minVerAuxiliarCasa = $dadosSumula["minVerAuxiliarCasa"];
                  $secVerAuxiliarCasa = $dadosSumula["secVerAuxiliarCasa"];

                  $vermelhoMassagistaCasa = $dadosSumula["vermelhoMassagistaCasa"];
                  $minVerMassagistaCasa = $dadosSumula["minVerMassagistaCasa"];
                  $secVerMassagistaCasa = $dadosSumula["secVerMassagistaCasa"];

                  $minTempoCasa1Periodo = $dadosSumula["minTempoCasa1Periodo"];
                  $secTempoCasa1Periodo = $dadosSumula["secTempoCasa1Periodo"];
                  $minTempoCasa2Periodo = $dadosSumula["minTempoCasa2Periodo"];
                  $secTempoCasa2Periodo = $dadosSumula["secTempoCasa2Periodo"];

                  $golsCasa1 = $dadosSumula["golsCasa1"];
                  $golsCasa2 = $dadosSumula["golsCasa2"];
                  $golsCasa3 = $dadosSumula["golsCasa3"];
                  $golsCasa4 = $dadosSumula["golsCasa4"];
                  $golsCasa5 = $dadosSumula["golsCasa5"];
                  $golsCasa6 = $dadosSumula["golsCasa6"];
                  $golsCasa7 = $dadosSumula["golsCasa7"];
                  $golsCasa8 = $dadosSumula["golsCasa8"];
                  $golsCasa9 = $dadosSumula["golsCasa9"];
                  $golsCasa10 = $dadosSumula["golsCasa10"];
                  $golsCasa11 = $dadosSumula["golsCasa11"];
                  $golsCasa12 = $dadosSumula["golsCasa12"];
                  $golsCasa13 = $dadosSumula["golsCasa13"];
                  $golsCasa14 = $dadosSumula["golsCasa14"];
                  $golsCasa15 = $dadosSumula["golsCasa15"];
                  $golsCasa16 = $dadosSumula["golsCasa16"];
                  $golsCasa17 = $dadosSumula["golsCasa17"];
                  $golsCasa18 = $dadosSumula["golsCasa18"];
                  $golsCasa19 = $dadosSumula["golsCasa19"];
                  $golsCasa20 = $dadosSumula["golsCasa20"];
                  $golsCasa21 = $dadosSumula["golsCasa21"];
                  $golsCasa22 = $dadosSumula["golsCasa22"];

                  $minGolsCasa1 = $dadosSumula["minGolsCasa1"];
                  $secGolsCasa1 = $dadosSumula["secGolsCasa1"];
                  $minGolsCasa2 = $dadosSumula["minGolsCasa2"];
                  $secGolsCasa2 = $dadosSumula["secGolsCasa2"];
                  $minGolsCasa3 = $dadosSumula["minGolsCasa3"];
                  $secGolsCasa3 = $dadosSumula["secGolsCasa3"];
                  $minGolsCasa4 = $dadosSumula["minGolsCasa4"];
                  $secGolsCasa4 = $dadosSumula["secGolsCasa4"];
                  $minGolsCasa5 = $dadosSumula["minGolsCasa5"];
                  $secGolsCasa5 = $dadosSumula["secGolsCasa5"];
                  $minGolsCasa6 = $dadosSumula["minGolsCasa6"];
                  $secGolsCasa6 = $dadosSumula["secGolsCasa6"];
                  $minGolsCasa7 = $dadosSumula["minGolsCasa7"];
                  $secGolsCasa7 = $dadosSumula["secGolsCasa7"];
                  $minGolsCasa8 = $dadosSumula["minGolsCasa8"];
                  $secGolsCasa8 = $dadosSumula["secGolsCasa8"];
                  $minGolsCasa9 = $dadosSumula["minGolsCasa9"];
                  $secGolsCasa9 = $dadosSumula["secGolsCasa9"];
                  $minGolsCasa10 = $dadosSumula["minGolsCasa10"];
                  $secGolsCasa10 = $dadosSumula["secGolsCasa10"];
                  $minGolsCasa11 = $dadosSumula["minGolsCasa11"];
                  $secGolsCasa11 = $dadosSumula["secGolsCasa11"];
                  $minGolsCasa12 = $dadosSumula["minGolsCasa12"];
                  $secGolsCasa12 = $dadosSumula["secGolsCasa12"];
                  $minGolsCasa13 = $dadosSumula["minGolsCasa13"];
                  $secGolsCasa13 = $dadosSumula["secGolsCasa13"];
                  $minGolsCasa14 = $dadosSumula["minGolsCasa14"];
                  $secGolsCasa14 = $dadosSumula["secGolsCasa14"];
                  $minGolsCasa15 = $dadosSumula["minGolsCasa15"];
                  $secGolsCasa15 = $dadosSumula["secGolsCasa15"];
                  $minGolsCasa16 = $dadosSumula["minGolsCasa16"];
                  $secGolsCasa16 = $dadosSumula["secGolsCasa16"];
                  $minGolsCasa17 = $dadosSumula["minGolsCasa17"];
                  $secGolsCasa17 = $dadosSumula["secGolsCasa17"];
                  $minGolsCasa18 = $dadosSumula["minGolsCasa18"];
                  $secGolsCasa18 = $dadosSumula["secGolsCasa18"];
                  $minGolsCasa19 = $dadosSumula["minGolsCasa19"];
                  $secGolsCasa19 = $dadosSumula["secGolsCasa19"];
                  $minGolsCasa20 = $dadosSumula["minGolsCasa20"];
                  $secGolsCasa20 = $dadosSumula["secGolsCasa20"];
                  $minGolsCasa21 = $dadosSumula["minGolsCasa21"];
                  $secGolsCasa21 = $dadosSumula["secGolsCasa21"];
                  $minGolsCasa22 = $dadosSumula["minGolsCasa22"];
                  $secGolsCasa22 = $dadosSumula["secGolsCasa22"];

                  $amareloFora1 = $dadosSumula["amareloFora1"];
                  $amareloFora2 = $dadosSumula["amareloFora2"];
                  $amareloFora3 = $dadosSumula["amareloFora3"];
                  $amareloFora4 = $dadosSumula["amareloFora4"];
                  $amareloFora5 = $dadosSumula["amareloFora5"];
                  $amareloFora6 = $dadosSumula["amareloFora6"];
                  $amareloFora7 = $dadosSumula["amareloFora7"];
                  $amareloFora8 = $dadosSumula["amareloFora8"];
                  $amareloFora9 = $dadosSumula["amareloFora9"];
                  $amareloFora10 = $dadosSumula["amareloFora10"];
                  $amareloFora11 = $dadosSumula["amareloFora11"];
                  $amareloFora12 = $dadosSumula["amareloFora12"];
                  $amareloFora13 = $dadosSumula["amareloFora13"];
                  $amareloFora14 = $dadosSumula["amareloFora14"];
                  $amareloFora15 = $dadosSumula["amareloFora15"];

                  $minAmareloFora1 = $dadosSumula["minAmareloFora1"];
                  $secAmareloFora1 = $dadosSumula["secAmareloFora1"];
                  $minAmareloFora2 = $dadosSumula["minAmareloFora2"];
                  $secAmareloFora2 = $dadosSumula["secAmareloFora2"];
                  $minAmareloFora3 = $dadosSumula["minAmareloFora3"];
                  $secAmareloFora3 = $dadosSumula["secAmareloFora3"];
                  $minAmareloFora4 = $dadosSumula["minAmareloFora4"];
                  $secAmareloFora4 = $dadosSumula["secAmareloFora4"];
                  $minAmareloFora5 = $dadosSumula["minAmareloFora5"];
                  $secAmareloFora5 = $dadosSumula["secAmareloFora5"];
                  $minAmareloFora6 = $dadosSumula["minAmareloFora6"];
                  $secAmareloFora6 = $dadosSumula["secAmareloFora6"];
                  $minAmareloFora7 = $dadosSumula["minAmareloFora7"];
                  $secAmareloFora7 = $dadosSumula["secAmareloFora7"];
                  $minAmareloFora8 = $dadosSumula["minAmareloFora8"];
                  $secAmareloFora8 = $dadosSumula["secAmareloFora8"];
                  $minAmareloFora9 = $dadosSumula["minAmareloFora9"];
                  $secAmareloFora9 = $dadosSumula["secAmareloFora9"];
                  $minAmareloFora10 = $dadosSumula["minAmareloFora10"];
                  $secAmareloFora10 = $dadosSumula["secAmareloFora10"];
                  $minAmareloFora11 = $dadosSumula["minAmareloFora11"];
                  $secAmareloFora11 = $dadosSumula["secAmareloFora11"];
                  $minAmareloFora12 = $dadosSumula["minAmareloFora12"];
                  $secAmareloFora12 = $dadosSumula["secAmareloFora12"];
                  $minAmareloFora13 = $dadosSumula["minAmareloFora13"];
                  $secAmareloFora13 = $dadosSumula["secAmareloFora13"];
                  $minAmareloFora14 = $dadosSumula["minAmareloFora14"];
                  $secAmareloFora14 = $dadosSumula["secAmareloFora14"];
                  $minAmareloFora15 = $dadosSumula["minAmareloFora15"];
                  $secAmareloFora15 = $dadosSumula["secAmareloFora15"];

                  $vermelhoFora1 = $dadosSumula["vermelhoFora1"];
                  $vermelhoFora2 = $dadosSumula["vermelhoFora2"];
                  $vermelhoFora3 = $dadosSumula["vermelhoFora3"];
                  $vermelhoFora4 = $dadosSumula["vermelhoFora4"];
                  $vermelhoFora5 = $dadosSumula["vermelhoFora5"];
                  $vermelhoFora6 = $dadosSumula["vermelhoFora6"];
                  $vermelhoFora7 = $dadosSumula["vermelhoFora7"];
                  $vermelhoFora8 = $dadosSumula["vermelhoFora8"];
                  $vermelhoFora9 = $dadosSumula["vermelhoFora9"];
                  $vermelhoFora10 = $dadosSumula["vermelhoFora10"];
                  $vermelhoFora11 = $dadosSumula["vermelhoFora11"];
                  $vermelhoFora12 = $dadosSumula["vermelhoFora12"];
                  $vermelhoFora13 = $dadosSumula["vermelhoFora13"];
                  $vermelhoFora14 = $dadosSumula["vermelhoFora14"];
                  $vermelhoFora15 = $dadosSumula["vermelhoFora15"];

                  $minVermelhoFora1 = $dadosSumula["minVermelhoFora1"];
                  $secVermelhoFora1 = $dadosSumula["secVermelhoFora1"];
                  $minVermelhoFora2 = $dadosSumula["minVermelhoFora2"];
                  $secVermelhoFora2 = $dadosSumula["secVermelhoFora2"];
                  $minVermelhoFora3 = $dadosSumula["minVermelhoFora3"];
                  $secVermelhoFora3 = $dadosSumula["secVermelhoFora3"];
                  $minVermelhoFora4 = $dadosSumula["minVermelhoFora4"];
                  $secVermelhoFora4 = $dadosSumula["secVermelhoFora4"];
                  $minVermelhoFora5 = $dadosSumula["minVermelhoFora5"];
                  $secVermelhoFora5 = $dadosSumula["secVermelhoFora5"];
                  $minVermelhoFora6 = $dadosSumula["minVermelhoFora6"];
                  $secVermelhoFora6 = $dadosSumula["secVermelhoFora6"];
                  $minVermelhoFora7 = $dadosSumula["minVermelhoFora7"];
                  $secVermelhoFora7 = $dadosSumula["secVermelhoFora7"];
                  $minVermelhoFora8 = $dadosSumula["minVermelhoFora8"];
                  $secVermelhoFora8 = $dadosSumula["secVermelhoFora8"];
                  $minVermelhoFora9 = $dadosSumula["minVermelhoFora9"];
                  $secVermelhoFora9 = $dadosSumula["secVermelhoFora9"];
                  $minVermelhoFora10 = $dadosSumula["minVermelhoFora10"];
                  $secVermelhoFora10 = $dadosSumula["secVermelhoFora10"];
                  $minVermelhoFora11 = $dadosSumula["minVermelhoFora11"];
                  $secVermelhoFora11 = $dadosSumula["secVermelhoFora11"];
                  $minVermelhoFora12 = $dadosSumula["minVermelhoFora12"];
                  $secVermelhoFora12 = $dadosSumula["secVermelhoFora12"];
                  $minVermelhoFora13 = $dadosSumula["minVermelhoFora13"];
                  $secVermelhoFora13 = $dadosSumula["secVermelhoFora13"];
                  $minVermelhoFora14 = $dadosSumula["minVermelhoFora14"];
                  $secVermelhoFora14 = $dadosSumula["secVermelhoFora14"];
                  $minVermelhoFora15 = $dadosSumula["minVermelhoFora15"];
                  $secVermelhoFora15 = $dadosSumula["secVermelhoFora15"];

                  $faltasCasa1Periodo = $dadosSumula["faltasCasa1Periodo"];
                  $faltasCasa2Periodo = $dadosSumula["faltasCasa2Periodo"];
                  $faltasFora1Periodo = $dadosSumula["faltasFora1Periodo"];
                  $faltasFora2Periodo = $dadosSumula["faltasFora2Periodo"];

                  $vermelhoTreinadorFora = $dadosSumula["vermelhoTreinadorFora"];
                  $minVerTreinadorFora = $dadosSumula["minVerTreinadorFora"];
                  $secVerTreinadorFora = $dadosSumula["secVerTreinadorFora"];
                  $vermelhoAuxiliarFora = $dadosSumula["vermelhoAuxiliarFora"];
                  $minVerAuxiliarFora = $dadosSumula["minVerAuxiliarFora"];
                  $secVerAuxiliarFora = $dadosSumula["secVerAuxiliarFora"];
                  $vermelhoMassagistaFora = $dadosSumula["vermelhoMassagistaFora"];
                  $minVerMassagistaFora = $dadosSumula["minVerMassagistaFora"];
                  $secVerMassagistaFora = $dadosSumula["secVerMassagistaFora"];

                  $minTempoFora1Periodo = $dadosSumula["minTempoFora1Periodo"];
                  $secTempoFora1Periodo = $dadosSumula["secTempoFora1Periodo"];
                  $minTempoFora2Periodo = $dadosSumula["minTempoFora2Periodo"];
                  $secTempoFora2Periodo = $dadosSumula["secTempoFora2Periodo"];

                  $golsFora1 = $dadosSumula["golsFora1"];
                  $golsFora2 = $dadosSumula["golsFora2"];
                  $golsFora3 = $dadosSumula["golsFora3"];
                  $golsFora4 = $dadosSumula["golsFora4"];
                  $golsFora5 = $dadosSumula["golsFora5"];
                  $golsFora6 = $dadosSumula["golsFora6"];
                  $golsFora7 = $dadosSumula["golsFora7"];
                  $golsFora8 = $dadosSumula["golsFora8"];
                  $golsFora9 = $dadosSumula["golsFora9"];
                  $golsFora10 = $dadosSumula["golsFora10"];
                  $golsFora11 = $dadosSumula["golsFora11"];
                  $golsFora12 = $dadosSumula["golsFora12"];
                  $golsFora13 = $dadosSumula["golsFora13"];
                  $golsFora14 = $dadosSumula["golsFora14"];
                  $golsFora15 = $dadosSumula["golsFora15"];
                  $golsFora16 = $dadosSumula["golsFora16"];
                  $golsFora17 = $dadosSumula["golsFora17"];
                  $golsFora18 = $dadosSumula["golsFora18"];
                  $golsFora19 = $dadosSumula["golsFora19"];
                  $golsFora20 = $dadosSumula["golsFora20"];
                  $golsFora21 = $dadosSumula["golsFora21"];
                  $golsFora22 = $dadosSumula["golsFora22"];

                  $minGolsFora1 = $dadosSumula["minGolsFora1"];
                  $secGolsFora1 = $dadosSumula["secGolsFora1"];
                  $minGolsFora2 = $dadosSumula["minGolsFora2"];
                  $secGolsFora2 = $dadosSumula["secGolsFora2"];
                  $minGolsFora3 = $dadosSumula["minGolsFora3"];
                  $secGolsFora3 = $dadosSumula["secGolsFora3"];
                  $minGolsFora4 = $dadosSumula["minGolsFora4"];
                  $secGolsFora4 = $dadosSumula["secGolsFora4"];
                  $minGolsFora5 = $dadosSumula["minGolsFora5"];
                  $secGolsFora5 = $dadosSumula["secGolsFora5"];
                  $minGolsFora6 = $dadosSumula["minGolsFora6"];
                  $secGolsFora6 = $dadosSumula["secGolsFora6"];
                  $minGolsFora7 = $dadosSumula["minGolsFora7"];
                  $secGolsFora7 = $dadosSumula["secGolsFora7"];
                  $minGolsFora8 = $dadosSumula["minGolsFora8"];
                  $secGolsFora8 = $dadosSumula["secGolsFora8"];
                  $minGolsFora9 = $dadosSumula["minGolsFora9"];
                  $secGolsFora9 = $dadosSumula["secGolsFora9"];
                  $minGolsFora10 = $dadosSumula["minGolsFora10"];
                  $secGolsFora10 = $dadosSumula["secGolsFora10"];
                  $minGolsFora11 = $dadosSumula["minGolsFora11"];
                  $secGolsFora11 = $dadosSumula["secGolsFora11"];
                  $minGolsFora12 = $dadosSumula["minGolsFora12"];
                  $secGolsFora12 = $dadosSumula["secGolsFora12"];
                  $minGolsFora13 = $dadosSumula["minGolsFora13"];
                  $secGolsFora13 = $dadosSumula["secGolsFora13"];
                  $minGolsFora14 = $dadosSumula["minGolsFora14"];
                  $secGolsFora14 = $dadosSumula["secGolsFora14"];
                  $minGolsFora15 = $dadosSumula["minGolsFora15"];
                  $secGolsFora15 = $dadosSumula["secGolsFora15"];
                  $minGolsFora16 = $dadosSumula["minGolsFora16"];
                  $secGolsFora16 = $dadosSumula["secGolsFora16"];
                  $minGolsFora17 = $dadosSumula["minGolsFora17"];
                  $secGolsFora17 = $dadosSumula["secGolsFora17"];
                  $minGolsFora18 = $dadosSumula["minGolsFora18"];
                  $secGolsFora18 = $dadosSumula["secGolsFora18"];
                  $minGolsFora19 = $dadosSumula["minGolsFora19"];
                  $secGolsFora19 = $dadosSumula["secGolsFora19"];
                  $minGolsFora20 = $dadosSumula["minGolsFora20"];
                  $secGolsFora20 = $dadosSumula["secGolsFora20"];
                  $minGolsFora21 = $dadosSumula["minGolsFora21"];
                  $secGolsFora21 = $dadosSumula["secGolsFora21"];
                  $minGolsFora22 = $dadosSumula["minGolsFora22"];
                  $secGolsFora22 = $dadosSumula["secGolsFora22"];

                  $anotacoesPartida = $dadosSumula["anotacoesPartida"];
                } ?>

          <tr class="row4">
            <td class="column0 nomeEquipes2" colspan="9"><a class="equipeCasa"> <?php echo $equipeCasa ?> </a></td>
            <td class="column11 style268 s style268" colspan="6"><select class="select-equipe" name="golsCasa" id="golsCasa">
                                    <option value=""></option>
                                    <?php if(isset($_SESSION["sumulaRecarregada"])) { ?>
                                    <option selected value = "<?php echo $golsCasa ?>"> <?php echo $golsCasa ?> </option>
                                    <?php } ?>
                                    <option value="0">0</option>
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
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                             </select>
                           <a>X</a>
                             <select class="select-equipe" name="golsVisitante" id="golsVisitante">
                                    <option value=""></option>
                                    <?php if(isset($_SESSION["sumulaRecarregada"])) { ?>
                                    <option selected value = "<?php echo $golsFora ?>"> <?php echo $golsFora ?> </option>
                                    <?php } ?>
                                    <option value="0">0</option>
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
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                             </select></td>
            <td class="column15 nomeEquipes2" colspan="11"><a class="equipeVisitante"> <?php echo $equipeVisitante ?> </a></td>
            <td class="column26 style216 s style217" colspan="9">RESULTADO</td>
          </tr>
          <tr class="row5">
            <td class="column0 style272 s style273" colspan="10">LOCAL: Dario de Almeida Neves</td>
            <td class="column13 style273 s style273" colspan="9">DATA: <input id="dataPartida" required class="cadastro_inputs" type="date" min="2023-07-01" max="2023-12-31" name="dataPartida" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $dataPartida ?>" <?php } ?>></td>
            <td class="column19 style274 s style274" colspan="7">HORÁRIO DE ÍNICIO</td>
            <td class="column26 style275 s style275" colspan="4">1º PERÍODO</td>
            <td class="column30 style246 s style247" colspan="5"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="placar1Periodo1" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $placar1Periodo1 ?>" <?php } ?>>x<input id="placar1Periodo2" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $placar1Periodo2 ?>" <?php } ?> class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
          </tr>
          <tr class="row6">
            <td class="column0 style262 s style263" colspan="6">1º ÁRBITRO</td>
            <td class="column6 style256 null style256" colspan="5"><input class="numero_inputs" type="text" id="nome1Arbitro" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $nome1Arbitro ?>" <?php } ?>></td>
            <td class="column14 style227 null style227" colspan="8">
            <?php if(isset($equipeCasa)) { ?>
                        <div class="container4">
                          <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                            <div class="canvasDivArb" id="canvasDivArb">
                              <canvas id="sig-canvasArb" width="150" height="70">
                              </canvas>
                            </div>
                          </div>
                          <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                            <div class="col-md-12">
                              <button type="button" class="btn btn-primary" id="sig-submitBtnArb" onclick="ocultarAssinatura()" style="display: block;">Salvar Assinatura</button>
                              <button type="button" class="btn btn-default" id="sig-clearBtnArb" style="display: block;">Refazer Assinatura</button>
                            </div>
                          </div>
                          <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                            <div class="col-md-12" style="display: none;">
                              <textarea id="sig-dataUrlArb" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <img id="sig-imageArb" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> src=".<?php echo $ass1Arb ?>"  <?php } else { ?> src="" <?php } ?> />
                            </div>
                          </div>
                        </div>
                  <?php } ?>
            </td>
            <td class="column19 style259 s style259" colspan="4">1º PERÍODO</td>
            <td class="column23 style251 s style251" colspan="3"><input class="numero_1Periodo" type="tel" style="width: 1.5rem;" id="horarioInicio1Periodo1" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $horarioInicio1Periodo1 ?>" <?php } ?>>:<input id="horarioInicio1Periodo2" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $horarioInicio1Periodo2 ?>" <?php } ?> class="numero_1Periodo" type="tel" style="width: 1.5rem;"></td>
            <td class="column26 style259 s style259" colspan="4">2º PERÍODO</td>
            <td class="column30 style246 s style247" colspan="5"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="placar2Periodo1" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $placar2Periodo1 ?>" <?php } ?>>x<input id="placar2Periodo2" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $placar2Periodo2 ?>" <?php } ?> class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
          </tr>
          <tr class="row7">
            <td class="column0 style254 s style255" colspan="6">2º ÁRBITRO</td>
            <td class="column6 style256 null style256" colspan="5"><input class="numero_inputs" type="text" id="nome2Arbitro" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $nome2Arbitro ?>" <?php } ?>></td>
            <td class="column14 style257 null style257" colspan="8">
            <?php if(isset($equipeCasa)) { ?>
                        <div class="container4">
                          <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                            <div class="canvasDivArb1" id="canvasDivArb1">
                              <canvas id="sig-canvasArb1" width="150" height="70">
                              </canvas>
                            </div>
                          </div>
                          <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                            <div class="col-md-12">
                              <button type="button" class="btn btn-primary" id="sig-submitBtnArb1" onclick="ocultarAssinatura()" style="display: block;">Salvar Assinatura</button>
                              <button type="button" class="btn btn-default" id="sig-clearBtnArb1" style="display: block;">Refazer Assinatura</button>
                            </div>
                          </div>
                          <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                            <div class="col-md-12" style="display: none;">
                              <textarea id="sig-dataUrlArb1" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                            </div>
                          </div>
                          <div class="row" >
                            <div class="col-md-12">
                              <img id="sig-imageArb1" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> src=".<?php echo $ass2Arb ?>"  <?php } else { ?> src="" <?php } ?>/>
                            </div>
                          </div>
                        </div>
                  <?php } ?>
                </td>
            <td class="column19 style259 s style259" colspan="4">2º PERÍODO</td>
            <td class="column23 style251 s style251" colspan="3"><input class="numero_2Periodo" type="tel" style="width: 1.5rem;" id="horarioInicio2Periodo1" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $horarioInicio2Periodo1 ?>" <?php } ?>>:<input id="horarioInicio2Periodo2" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $horarioInicio2Periodo2 ?>" <?php } ?> class="numero_2Periodo" type="tel" style="width: 1.5rem;"></td>
            <td class="column26 style258 s style258" colspan="4">PRORROGAÇÃO</td>
            <td class="column30 style246 s style247" colspan="5"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="placarProrrogacao1" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $placarProrrogacao1 ?>" <?php } ?>>x<input id="placarProrrogacao2" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $placarProrrogacao2 ?>" <?php } ?> class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
          </tr>
          <tr class="row8">
            <td class="column0 style254 s style255" colspan="6">ANOTADOR</td>
            <td class="column6 style256 null style256" colspan="5"><input class="numero_inputs" type="text" id="nomeAnotador" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $nomeAnotador ?>" <?php } ?>></td>
            <td class="column14 style257 null style257" colspan="8">
            <?php if(isset($equipeCasa)) { ?>
                        <div class="container4">
                          <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                            <div class="canvasDivArb2" id="canvasDivArb2">
                              <canvas id="sig-canvasArb2" width="150" height="70">
                              </canvas>
                            </div>
                          </div>
                          <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                            <div class="col-md-12">
                              <button type="button" type="button" class="btn btn-primary" id="sig-submitBtnArb2" onclick="ocultarAssinatura()" style="display: block;">Salvar Assinatura</button>
                              <button type="button" class="btn btn-default" id="sig-clearBtnArb2" style="display: block;">Refazer Assinatura</button>
                            </div>
                          </div>
                          <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                            <div class="col-md-12" style="display: none;">
                              <textarea id="sig-dataUrlArb2" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <img id="sig-imageArb2" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> src=".<?php echo $assAnotador ?>"  <?php } else { ?> src="" <?php } ?>/>
                            </div>
                          </div>
                        </div>
                  <?php } ?>
            </td>
            <td class="column19 style258 s style258" colspan="4">PRORROGAÇÃO</td>
            <td class="column23 style251 s style251" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="horarioInicioProrrogacao1" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $horarioInicioProrrogacao1 ?>" <?php } ?>>:<input id="horarioInicioProrrogacao2" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $horarioInicioProrrogacao2 ?>" <?php } ?> class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column26 style259 s style259" colspan="4">PENALTIS</td>
            <td class="column30 style246 s style247" colspan="5"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="placarPenaltis1" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $placarPenaltis1 ?>" <?php } ?>>x<input id="placarPenaltis2" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $placarPenaltis2 ?>" <?php } ?> class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
          </tr>
          <tr class="row9">
            <td class="column0 style248 s style249" colspan="6">CRONOMETRISTA</td>
            <td class="column6 style230 null style230" colspan="5"><input class="numero_inputs" type="text" id="nomeCronometrista" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $nomeCronometrista ?>" <?php } ?>></td>
            <td class="column14 style231 null style231" colspan="8">
                  <?php if(isset($equipeCasa)) { ?>
                        <div class="container4">
                          <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                            <div class="canvasDivArb3" id="canvasDivArb3">
                              <canvas id="sig-canvasArb3" width="150" height="70">
                              </canvas>
                            </div>
                          </div>
                          <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                            <div class="col-md-12">
                              <button type="button" class="btn btn-primary" id="sig-submitBtnArb3" onclick="ocultarAssinatura()" style="display: block;">Salvar Assinatura</button>
                              <button type="button" class="btn btn-default" id="sig-clearBtnArb3" style="display: block;">Refazer Assinatura</button>
                            </div>
                          </div>
                          <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                            <div class="col-md-12" style="display: none;">
                              <textarea id="sig-dataUrlArb3" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <img id="sig-imageArb3" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> src=".<?php echo $assCronometrista ?>"  <?php } else { ?> src="" <?php } ?>/>
                            </div>
                          </div>
                        </div>
                  <?php } ?>
            </td>
            <td class="column19 style250 s style250" colspan="4">FINAL</td>
            <td class="column23 style251 s style251" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="horarioFinal1" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $horarioFinal1 ?>" <?php } ?>>:<input id="horarioFinal2" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $horarioFinal2 ?>" <?php } ?> class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column26 style250 s style250" colspan="4">FINAL</td>
            <td class="column30 style246 s style247" colspan="5"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="placarFinal1" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $placarFinal1 ?>" <?php } ?>>x<input id="placarFinal2" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> value= "<?php echo $placarFinal2 ?>" <?php } ?> class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
          </tr>
          <tr class="row10">
            <td class="column0 nomeEquipes" colspan="19">EQUIPE A: <a><?php echo $equipeCasa; ?></a> </td>
            <td class="column19 style216 s style217" colspan="16">FALTAS ACUMULATIVAS</td>
          </tr>
          <tr class="row11">
            <td class="column0 style166 s">Nº</td>
            <td class="column1 style235 s style235" colspan="14">ATLETAS</td>
            <td class="column15 style245 s style245" colspan="2">C.A.</td>
            <td class="column17 style216 s style216" colspan="2">C.V.</td>
            <td class="column19 style236 s style236" colspan="4">1º PERÍODO</td>
            <td class="column23 style237 null style237" colspan="2"><input type="checkbox" id="faltaCasa1Periodo1" name="falta1" onclick="checkedFaltaCasa1Periodo1()" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasCasa1Periodo >= "1") { ?> checked <?php } } ?> value="1"></td>
            <td class="column25 style226 null style226" colspan="2"><input type="checkbox" id="faltaCasa1Periodo2" name="falta2" onclick="checkedFaltaCasa1Periodo2()" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasCasa1Periodo >= "2") { ?> checked <?php } } ?> value="2"></td>
            <td class="column27 style226 null style226" colspan="2"><input type="checkbox" id="faltaCasa1Periodo3" name="falta3" onclick="checkedFaltaCasa1Periodo3()" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasCasa1Periodo >= "3") { ?> checked <?php } } ?> value="3"></td>
            <td class="column29 style226 null style226" colspan="2"><input type="checkbox" id="faltaCasa1Periodo4" name="falta4" onclick="checkedFaltaCasa1Periodo4()" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasCasa1Periodo >= "4") { ?> checked <?php } } ?> value="4"></td>
            <td class="column31 style227 null style228" colspan="4"><input type="checkbox" id="faltaCasa1Periodo5" name="falta5" onclick="checkedFaltaCasa1Periodo5()" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasCasa1Periodo == "5") { ?> checked <?php } } ?> value="5"></td>
          </tr>

          <?php if($query_dadosJogadoresCasa->num_rows > 0) { 
                $contador = 1;
                $aux = 0;
                $linhas = $query_dadosJogadoresCasa->num_rows;

                while($dadoJogador = $query_dadosJogadoresCasa->fetch_assoc()) { 
                    $docIdentidade = $dadoJogador['docIdentidade'];
                    $fotoPerfil = $dadoJogador['fotoPerfil'];
                    $nomeJogador = $dadoJogador['nomeUsuario'];
                    $numeroCamisa = $dadoJogador['numeroCamisa'];
                    $gols = $dadoJogador['gols'];
                    $cartaoAmareloAtual = $dadoJogador['cartaoAmareloAtual'];
                    $cartaoAmarelo = $dadoJogador['cartaoAmarelo'];
                    $cartaoVermelhoAtual = $dadoJogador['cartaoVermelhoAtual'];
                    $cartaoVermelho = $dadoJogador['cartaoVermelho'];
                    $suspenso = $dadoJogador['suspenso'];
                    $emblema = $dadoJogador['emblema'];
                    $funcao = $dadoJogador['funcao'];

                    if($funcao == "atleta") {
                    $aux = $aux + 1;
                    $amarelo = "amareloCasa" . $aux;
                    $amareloMinCasa = "minAmareloCasa" . $aux;
                    $amareloSecCasa = "secAmareloCasa" . $aux;
                    $vermelho = "vermelhoCasa" . $aux;
                    $vermelhoMinCasa = "minVermelhoCasa" . $aux;
                    $vermelhoSecCasa = "secVermelhoCasa" . $aux;
                ?>
                    <tr class="row12">
                        <td class="column0 style173 null"><p><?php echo $numeroCamisa ?></p></td>
                        <td class="column2 style164 null" colspan="14"><p <?php if($suspenso == 1) {  ?> style="color: red;" <?php } ?>> <?php echo $nomeJogador ?> </p></td>
                        <td class="column15 style211 s style212" colspan="2">
                          <select class="select-dadosSumula" name="cartaoAmarelo<?php echo $docIdentidade?>" id="amareloCasa<?php echo $aux ?>">
                            <option value="0">0</option>
                            <option <?php if(isset($_SESSION["sumulaRecarregada"])) { if($$amarelo == "1") { ?> selected <?php } } ?> value="1" >1</option>
                          </select>
                              <input class="numero_inputs" type="tel" style="width: 1.5rem;" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($$amareloMinCasa > "0") { ?> value = "<?php echo $$amareloMinCasa ?>" <?php } } ?> id="minAmareloCasa<?php echo $aux ?>">:<input class="numero_inputs" type="tel" style="width: 1.5rem;" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($$amareloSecCasa > "0") { ?> value = "<?php echo $$amareloSecCasa ?>" <?php } } ?> id="secAmareloCasa<?php echo $aux ?>">
                        </td>
                        <td class="column17 style213 s style212" colspan="2">
                          <select class="select-dadosSumula" name="cartaoVermelho<?php echo $docIdentidade?>" id="vermelhoCasa<?php echo $aux ?>">
                              <option value="0">0</option>
                              <option <?php if(isset($_SESSION["sumulaRecarregada"])) { if($$vermelho == "1") { ?> selected <?php } } ?> value="1">1</option>
                          </select>
                          <input class="numero_inputs" type="tel" style="width: 1.5rem;" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($$vermelhoMinCasa > "0") { ?> value = "<?php echo $$vermelhoMinCasa ?>" <?php } } ?> id="minVermelhoCasa<?php echo $aux ?>">:<input class="numero_inputs" type="tel" style="width: 1.5rem;" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($$vermelhoSecCasa > "0") { ?> value = "<?php echo $$vermelhoSecCasa ?>" <?php } } ?> id="secVermelhoCasa<?php echo $aux ?>">
                        </td>
                          <?php if($contador == 1) {
                          $contador = $contador + 1;
                          ?>
                            <td class="column19 style240 s style240" colspan="4">2º PERÍODO</td>
                            <td class="column23 style237 null style237" colspan="2"><input type="checkbox" id="faltaCasa2Periodo1" name="faltaCasa21" onclick="checkedFaltaCasa2Periodo1()" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasCasa2Periodo >= "1") { ?> checked <?php } } ?> value="1"></td>
                            <td class="column25 style226 null style226" colspan="2"><input type="checkbox" id="faltaCasa2Periodo2" name="faltaCasa22" onclick="checkedFaltaCasa2Periodo2()" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasCasa2Periodo >= "2") { ?> checked <?php } } ?> value="2"></td>
                            <td class="column27 style226 null style226" colspan="2"><input type="checkbox" id="faltaCasa2Periodo3" name="faltaCasa23" onclick="checkedFaltaCasa2Periodo3()" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasCasa2Periodo >= "3") { ?> checked <?php } } ?> value="3"></td>
                            <td class="column29 style226 null style226" colspan="2"><input type="checkbox" id="faltaCasa2Periodo4" name="faltaCasa24" onclick="checkedFaltaCasa2Periodo4()" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasCasa2Periodo >= "4") { ?> checked <?php } } ?> value="4"></td>
                            <td class="column31 style227 null style228" colspan="4"><input type="checkbox" id="faltaCasa2Periodo5" name="faltaCasa25" onclick="checkedFaltaCasa2Periodo5()" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasCasa2Periodo == "5") { ?> checked <?php } } ?> value="5"></td>
                          <?php } else if($contador == 2) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column32 style135 null" colspan="16"></td>
                            <?php } else if($contador == 3) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column32 style135 null" colspan="16"></td>
                            <?php } else if($contador == 4) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style238 s style239" colspan="16">ASSINATURAS</td>
                            <?php } else if($contador == 5) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style218 s style219" colspan="16">TÉCNICO</td>
                            <?php } else if($contador == 6) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style142 null" colspan="16"></td>
                            <?php } else if($contador == 7) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style142 null" colspan="16">
                                <?php if(isset($equipeCasa)) { ?>
                                  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
                                  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
                                <div class="container">
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="canvasDiv" id="canvasDiv">
                                      <canvas id="sig-canvas" width="300px" height="70px">
                                      </canvas>
                                    </div>
                                  </div>
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="col-md-12">
                                      <button type="button" class="btn btn-primary" id="sig-submitBtn" onclick="ocultarAssinatura()" style="display: block;">Salvar Assinatura</button>
                                      <button type="button" class="btn btn-default" id="sig-clearBtn" style="display: block;">Refazer Assinatura</button>
                                    </div>
                                  </div>
      
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="col-md-12" style="display: none;">
                                      <textarea id="sig-dataUrl" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                                    </div>
                                  </div>
      
                                  <div class="row">
                                    <div class="col-md-12">
                                      <img id="sig-image" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> src=".<?php echo $assTecCasa ?>"  <?php } else { ?> src="" <?php } ?>/>
                                    </div>
                                  </div>
                              </div>
                                <?php } ?>
                              </td>
                            <?php } else if($contador == 8) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style142 null" colspan="16"></td>
                            <?php } else if($contador == 9) {
                              $contador = $contador + 1;
                              ?>
                              <td class="column19 style218 s style219" colspan="16">CAPITÃO</td>
                            <?php } else if($contador == 10) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style142 null" colspan="16"></td>
                            <?php } else if($contador == 11) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style142 null" colspan="16">
                              <?php if(isset($equipeCasa)) { ?>
                                <div class="container1">
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="canvasDiv1" id="canvasDiv1">
                                      <canvas id="sig-canvas1" width="300px" height="70px">
                                      </canvas>
                                    </div>
                                  </div>
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="col-md-12">
                                      <button type="button" class="btn btn-primary" id="sig-submitBtn1" onclick="ocultarAssinatura()" style="display: block;">Salvar Assinatura</button>
                                      <button type="button" class="btn btn-default" id="sig-clearBtn1" style="display: block;">Refazer Assinatura</button>
                                    </div>
                                  </div>
      
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="col-md-12" style="display: none;">
                                      <textarea id="sig-dataUrl1" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                                    </div>
                                  </div>
      
                                  <div class="row">
                                    <div class="col-md-12">
                                      <img id="sig-image1" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> src=".<?php echo $assCapCasa ?>"  <?php } else { ?> src="" <?php } ?>/>
                                    </div>
                                  </div>
                              </div>
                                <?php } ?>
                              </td>
                            <?php } else if($contador == 12) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style8 null" colspan="16"></td>
                            <?php } else if($contador == 13) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column32 style141 null" colspan="16"></td>
                            <?php } else if($contador == 14) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style220 s style221" colspan="16">PEDIDOS DE TEMPO</td>
                            <?php } else if($contador == 15) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style223 s style223" colspan="7">1º PERÍODO</td>
                              <td class="column26 style224 s style225" colspan="9">2º PERÍODO</td>
                            <?php } ?>
                    </tr>
                      <?php } } }?>
                      <!-- Lógica de quando não possui pelo menos 15 inscritos no time -->
                      <?php if($linhas < 15) { ?>
                      <tr class="row12" <?php if($contador > 5) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 5 && $contador < 6) { 
                            $contador = $contador + 1;
                            ?> 
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style218 s style219" colspan="16">TÉCNICO</td>
                            <?php  } ?>
                      </tr>
                      <tr class="row12" <?php if($contador > 6) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 6 && $contador < 7) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style142 null" colspan="16"></td>
                            <?php  } ?>
                      </tr>
                      <tr class="row12" <?php if($contador > 7) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 7 && $contador < 8) { 
                            $contador = $contador + 1; 
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style142 null" colspan="16">
                                <?php if(isset($equipeCasa)) { ?>
                                  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
                                  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
                                <div class="container">
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="canvasDiv" id="canvasDiv">
                                      <canvas id="sig-canvas" width="300px" height="70px">
                                      </canvas>
                                    </div>
                                  </div>
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="col-md-12">
                                      <button type="button" class="btn btn-primary" id="sig-submitBtn" onclick="ocultarAssinatura()" style="display: block;">Salvar Assinatura</button>
                                      <button type="button" class="btn btn-default" id="sig-clearBtn" style="display: block;">Refazer Assinatura</button>
                                    </div>
                                  </div>
      
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="col-md-12" style="display: none;">
                                      <textarea id="sig-dataUrl" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                                    </div>
                                  </div>
      
                                  <div class="row">
                                    <div class="col-md-12">
                                      <img id="sig-image" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> src=".<?php echo $assTecCasa ?>"  <?php } else { ?> src="" <?php } ?>/>
                                    </div>
                                  </div>
                              </div>
                                <?php } ?>
                              </td>
                            <?php  } ?>
                      </tr>
                      <tr class="row12" <?php if($contador > 8) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 8 && $contador < 9) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style142 null" colspan="16"></td>
                            <?php  } ?>
                      </tr>
                      <tr class="row12" <?php if($contador > 9) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 9 && $contador < 10) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style218 s style219" colspan="16">CAPITÃO</td>
                            <?php  } ?>
                      </tr>
                      <tr class="row12" <?php if($contador > 10) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 10 && $contador < 11) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style142 null" colspan="16"></td>
                            <?php  } ?>
                      </tr>
                      <tr class="row12" <?php if($contador > 11) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 11 && $contador < 12) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style142 null" colspan="16">
                              <?php if(isset($equipeCasa)) { ?>
                                <div class="container1">
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="canvasDiv1" id="canvasDiv1">
                                      <canvas id="sig-canvas1" width="300px" height="70px">
                                      </canvas>
                                    </div>
                                  </div>
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="col-md-12">
                                      <button type="button" class="btn btn-primary" id="sig-submitBtn1" onclick="ocultarAssinatura()" style="display: block;">Salvar Assinatura</button>
                                      <button type="button" class="btn btn-default" id="sig-clearBtn1" style="display: block;">Refazer Assinatura</button>
                                    </div>
                                  </div>
      
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="col-md-12" style="display: none;">
                                      <textarea id="sig-dataUrl1" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                                    </div>
                                  </div>
      
                                  <div class="row">
                                    <div class="col-md-12">
                                      <img id="sig-image1" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> src=".<?php echo $assCapCasa ?>"  <?php } else { ?> src="" <?php } ?>/>
                                    </div>
                                  </div>
                              </div>
                                <?php } ?>
                              </td>
                            <?php  } ?>
                      </tr>
                      <tr class="row12" <?php if($contador > 12) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 12 && $contador < 13) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style8 null" colspan="16"></td>
                            <?php  } ?>
                      </tr>
                      <tr class="row12" <?php if($contador > 13) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 13  && $contador < 14) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column32 style141 null" colspan="16"></td>
                            <?php  } ?>
                      </tr>
                      <tr class="row12">
                          <?php if($contador == 14 && $contador < 15) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style220 s style221" colspan="16">PEDIDOS DE TEMPO</td>
                            <?php  } ?>
                      </tr>
                      <tr class="row12">
                          <?php if($contador == 15) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style223 s style223" colspan="7">1º PERÍODO</td>
                                <td class="column26 style224 s style225" colspan="9">2º PERÍODO</td>
                            <?php  } ?>
                      </tr>
                    <?php } ?>
          
            <?php 
              $sql_nomesTecnicosCasa = "SELECT docIdentidade, fotoPerfil, nomeUsuario, cartaoVermelhoAtual, cartaoVermelho, suspenso, emblema, funcao, funcao_comissao FROM usuarios WHERE equipe = '$equipeCasa' AND categoria = '$categoria' AND funcao = 'comissaoTecnica' ORDER BY funcao_comissao = 'Mas', funcao_comissao='Aux', funcao_comissao='Tec'";
              $query_dadosTecnicosCasa = $mysqli->query($sql_nomesTecnicosCasa) or die($mysqli->error);
              if($query_dadosTecnicosCasa->num_rows > 0) {
              $contador = 1;
              $aux = 0;
              $linhasComissaoCasa = $query_dadosTecnicosCasa->num_rows;

              while($dadoJogador = $query_dadosTecnicosCasa->fetch_assoc()) { 
                  $docIdentidade = $dadoJogador['docIdentidade'];
                  $fotoPerfil = $dadoJogador['fotoPerfil'];
                  $nomeJogador = $dadoJogador['nomeUsuario'];
                  $cartaoVermelhoAtual = $dadoJogador['cartaoVermelhoAtual'];
                  $cartaoVermelho = $dadoJogador['cartaoVermelho'];
                  $suspenso = $dadoJogador['suspenso'];
                  $emblema = $dadoJogador['emblema'];
                  $funcao = $dadoJogador['funcao'];
                  
                  if($funcao == "comissaoTecnica") {
                  $aux = $aux + 1;
            ?>
              <?php if($contador == 1) {
                $contador = $contador + 1;
                ?>
              <tr class="row27">
                <td class="column0 style157 s">TEC</td>
                <td class="column2 style160 null" colspan="13"><p <?php if($suspenso == 1) {  ?> style="color: red;" <?php } ?>> <?php echo $nomeJogador ?> </p></td>
                <td class="column3 style163 null" colspan="1"></td>
                <td class="column15 style153 null"></td>
                <td class="column16 style152 null"></td>
                <td class="column17 style206 s style205" colspan="2">
                <select class="select-dadosSumula" name="cartaoVermelho<?php echo $docIdentidade?>" id="vermelhoTreinadorCasa">
                    <option value="0">0</option>
                    <option <?php if(isset($_SESSION["sumulaRecarregada"])) { if($vermelhoTreinadorCasa > "0") { ?> selected <?php } } ?> value="1">1</option>
                </select>
                <input class="numero_inputs" type="tel" style="width: 1.5rem;" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minVerTreinadorCasa > "0") { ?> value = "<?php echo $minVerTreinadorCasa ?>" <?php } } ?> id="minVerTreinadorCasa">:<input id="secVerTreinadorCasa" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secVerTreinadorCasa > "0") { ?> value = "<?php echo $secVerTreinadorCasa ?>" <?php } } ?> class="numero_inputs" type="tel" style="width: 1.5rem;">
                </td>
                <td class="column19 style209 s style209" colspan="7"><input class="numero_inputs" type="tel" style="width: 30px;" id="minTempoCasa1Periodo" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minTempoCasa1Periodo > "0") { ?> value = "<?php echo $minTempoCasa1Periodo ?>" <?php } } ?>>:<input id="secTempoCasa1Periodo" class="numero_inputs" type="tel" style="width: 30px;" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secTempoCasa1Periodo > "0") { ?> value = "<?php echo $secTempoCasa1Periodo ?>" <?php } } ?>></td>
                <td class="column26 style214 s style215" colspan="9"><input class="numero_inputs" type="tel" style="width: 30px;" id="minTempoCasa2Periodo" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minTempoCasa2Periodo > "0") { ?> value = "<?php echo $minTempoCasa2Periodo ?>" <?php } } ?>>:<input id="secTempoCasa2Periodo" class="numero_inputs" type="tel" style="width: 30px;" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secTempoCasa2Periodo > "0") { ?> value = "<?php echo $secTempoCasa2Periodo ?>" <?php } } ?>></td>
              <?php } else if($contador == 2) {
                            $contador = $contador + 1;
                            ?>             
                <td class="column0 style157 s">AUX</td>
                <td class="column2 style160 null" colspan="13"><p <?php if($suspenso == 1) {  ?> style="color: red;" <?php } ?>> <?php echo $nomeJogador ?> </p></td>
                <td class="column3 style163 null" colspan="1"></td>
                <td class="column15 style153 null"></td>
                <td class="column16 style152 null"></td>
                <td class="column17 style206 s style205" colspan="2">
                <select class="select-dadosSumula" name="cartaoVermelho<?php echo $docIdentidade?>" id="vermelhoAuxiliarCasa">
                    <option value="0">0</option>
                    <option <?php if(isset($_SESSION["sumulaRecarregada"])) { if($vermelhoAuxiliarCasa > "0") { ?> selected <?php } } ?> value="1">1</option>
                </select>
                <input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minVerAuxiliarCasa" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minVerAuxiliarCasa > "0") { ?> value = "<?php echo $minVerAuxiliarCasa ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secVerAuxiliarCasa > "0") { ?> value = "<?php echo $secVerAuxiliarCasa ?>" <?php } } ?> id="secVerAuxiliarCasa" class="numero_inputs" type="tel" style="width: 1.5rem;">
              </td>
              <td class="column19 style143 null" colspan="19"></td>
              <?php } else if($contador == 3) {
                            $contador = $contador + 1;
                            ?>
                <td class="column0 style157 s">MAS</td>
                <td class="column2 style160 null" colspan="13"><p <?php if($suspenso == 1) {  ?> style="color: red;" <?php } ?>> <?php echo $nomeJogador ?> </p></td>
                <td class="column3 style163 null" colspan="1"></td>
                <td class="column15 style153 null"></td>
                <td class="column16 style152 null"></td>
                <td class="column17 style207 s style208" colspan="2">
                <select class="select-dadosSumula" name="cartaoVermelho<?php echo $docIdentidade?>" id="vermelhoMassagistaCasa">
                    <option value="0">0</option>
                    <option <?php if(isset($_SESSION["sumulaRecarregada"])) { if($vermelhoMassagistaCasa > "0") { ?> selected <?php } } ?> value="1">1</option>
                </select>
                <input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minVerMassagistaCasa" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minVerMassagistaCasa > "0") { ?> value = "<?php echo $minVerMassagistaCasa ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secVerMassagistaCasa > "0") { ?> value = "<?php echo $secVerMassagistaCasa ?>" <?php } } ?> id="secVerMassagistaCasa" class="numero_inputs" type="tel" style="width: 1.5rem;">
              </td>
              <td class="column19 style143 null" colspan="19"></td>
              <?php } ?>
              </tr>              
            <?php } } }?>
            <?php if($linhasComissaoCasa <= 1) { ?>
              <tr class="row27">
                  <td class="column0 style157 s">AUX</td>
                  <td class="column2 style160 null" colspan="13"><p>Vago</p></td>
                  <td class="column3 style163 null" colspan="1"></td>
                  <td class="column15 style153 null"></td>
                  <td class="column16 style152 null"></td>
                  <td class="column17 style206 s style205" colspan="2">
                  --
                  </td>
                  <td class="column19 style143 null" colspan="19"></td>
                </tr>
                <?php } if ($linhasComissaoCasa <= 2) { ?>
                    <tr class="row27">
                    <td class="column0 style157 s">MAS</td>
                    <td class="column2 style160 null" colspan="13"><p>Vago</p></td>
                    <td class="column3 style163 null" colspan="1"></td>
                    <td class="column15 style153 null"></td>
                    <td class="column16 style152 null"></td>
                    <td class="column17 style207 s style208" colspan="2">
                    --
                    </td>
                    <td class="column19 style143 null" colspan="19"></td>
                    </tr>
                <?php } ?>
          
            <?php
              $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
              $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

              if($query_dadosJogadoresCasa->num_rows > 0) { 
              ?>
            <tr class="row30">
              <td class="column0 style177 s style196" colspan="3">01|
                <select class="select-dadosSumula" name="gols1" id="gols1">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa1 != "0") { ?>
                          <option selected value="<?php echo $golsCasa1 ?>"><?php echo $golsCasa1 ?></option>
                  <?php } } ?> 
                  <?php
                    while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                      $numeroCamisa = $select['numeroCamisa'];
                      $docIdentidade = $select['docIdentidade'];
                  ?>
                <option value="<?php echo $numeroCamisa?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

            if($query_dadosJogadoresCasa->num_rows > 0) {
            ?>
            <td class="column3 style197 s style196" colspan="3">02|
              <select class="select-dadosSumula" name="gols2" id="gols2">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa2 != "0") { ?>
                          <option selected value="<?php echo $golsCasa2 ?>"><?php echo $golsCasa2 ?></option>
                  <?php } } ?> 
              <?php
              while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                  $numeroCamisa = $select['numeroCamisa'];
                  $docIdentidade = $select['docIdentidade'];
              ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
             $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
             $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);
 
             if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column6 style197 s style196" colspan="3">03|
              <select class="select-dadosSumula" name="gols3" id="gols3">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa3 != "0") { ?>
                          <option selected value="<?php echo $golsCasa3 ?>"><?php echo $golsCasa3 ?></option>
                  <?php } } ?> 
                <?php
                while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);
            
            if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column9 style197 s style196" colspan="3">04|
             <select class="select-dadosSumula" name="gols4" id="gols4">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa4 != "0") { ?>
                          <option selected value="<?php echo $golsCasa4 ?>"><?php echo $golsCasa4 ?></option>
                  <?php } } ?> 
                <?php
                  while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                      $numeroCamisa = $select['numeroCamisa'];
                      $docIdentidade = $select['docIdentidade'];
                  ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa;?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

            if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column12 style197 s style196" colspan="3">05|
             <select class="select-dadosSumula" name="gols5" id="gols5">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa5 != "0") { ?>
                          <option selected value="<?php echo $golsCasa5 ?>"><?php echo $golsCasa5 ?></option>
                  <?php } } ?> 
                <?php
                while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

            if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column15 style180 s style179" colspan="3">06|
             <select class="select-dadosSumula" name="gols6" id="gols6">
                <option value="0">0</option>
                <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa6 != "0") { ?>
                          <option selected value="<?php echo $golsCasa6 ?>"><?php echo $golsCasa6 ?></option>
                  <?php } } ?> 
                <?php
                while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

            if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column18 style180 s style179" colspan="3">07|
              <select class="select-dadosSumula" name="gols7" id="gols7">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa7 != "0") { ?>
                          <option selected value="<?php echo $golsCasa7 ?>"><?php echo $golsCasa7 ?></option>
                  <?php } } ?> 
                <?php
                while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

            if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column21 style180 s style179" colspan="3">08|
              <select class="select-dadosSumula" name="gols8" id="gols8">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa8 != "0") { ?>
                          <option selected value="<?php echo $golsCasa8 ?>"><?php echo $golsCasa8 ?></option>
                  <?php } } ?> 
                <?php
                  while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                      $numeroCamisa = $select['numeroCamisa'];
                      $docIdentidade = $select['docIdentidade'];
                  ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

            if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column24 style180 s style179" colspan="3">09|
             <select class="select-dadosSumula" name="gols9" id="gols9">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa9 != "0") { ?>
                          <option selected value="<?php echo $golsCasa9 ?>"><?php echo $golsCasa9 ?></option>
                  <?php } } ?> 
                <?php
                while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

            if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column27 style180 s style179" colspan="3">10|
              <select class="select-dadosSumula" name="gols10" id="gols10">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa10 != "0") { ?>
                          <option selected value="<?php echo $golsCasa10 ?>"><?php echo $golsCasa10 ?></option>
                  <?php } } ?> 
                <?php
                while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

            if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column30 style180 s style190" colspan="5">11|
              <select class="select-dadosSumula" name="gols11" id="gols11">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa11 != "0") { ?>
                          <option selected value="<?php echo $golsCasa11 ?>"><?php echo $golsCasa11 ?></option>
                  <?php } } ?> 
              <?php
                while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
          </tr>

          <tr class="row31">
            <td class="column0 style181 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa1" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa1 > "0") { ?> value = "<?php echo $minGolsCasa1 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa1 > "0") { ?>  value = "<?php echo $secGolsCasa1 ?>" <?php } } ?> id="secGolsCasa1" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column3 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa2" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa2 > "0") { ?> value = "<?php echo $minGolsCasa2 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa2 > "0") { ?>  value = "<?php echo $secGolsCasa2 ?>" <?php } } ?> id="secGolsCasa2" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column6 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa3" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa3 > "0") { ?> value = "<?php echo $minGolsCasa3 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa3 > "0") { ?>  value = "<?php echo $secGolsCasa3 ?>" <?php } } ?> id="secGolsCasa3" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column9 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa4" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa4 > "0") { ?> value = "<?php echo $minGolsCasa4 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa4 > "0") { ?>  value = "<?php echo $secGolsCasa4 ?>" <?php } } ?> id="secGolsCasa4" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column12 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa5" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa5 > "0") { ?> value = "<?php echo $minGolsCasa5 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa5 > "0") { ?> value = "<?php echo $secGolsCasa5 ?>" <?php } } ?> id="secGolsCasa5" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column15 style201 s style203" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa6" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa6 > "0") { ?> value = "<?php echo $minGolsCasa6 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa6 > "0") { ?> value = "<?php echo $secGolsCasa6 ?>" <?php } } ?> id="secGolsCasa6" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column18 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa7" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa7 > "0") { ?> value = "<?php echo $minGolsCasa7 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa7 > "0") { ?> value = "<?php echo $secGolsCasa7 ?>" <?php } } ?> id="secGolsCasa7" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column21 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa8" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa8 > "0") { ?> value = "<?php echo $minGolsCasa8 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa8 > "0") { ?> value = "<?php echo $secGolsCasa8 ?>" <?php } } ?> id="secGolsCasa8" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column24 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa9" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa9 > "0") { ?> value = "<?php echo $minGolsCasa9 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa9 > "0") { ?> value = "<?php echo $secGolsCasa9 ?>" <?php } } ?> id="secGolsCasa9" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column27 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa10" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa10 > "0") { ?> value = "<?php echo $minGolsCasa10 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa10 > "0") { ?> value = "<?php echo $secGolsCasa10 ?>" <?php } } ?> id="secGolsCasa10" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column30 style184 s style198" colspan="5"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa11" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa11 > "0") { ?> value = "<?php echo $minGolsCasa11 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa11 > "0") { ?> value = "<?php echo $secGolsCasa11 ?>" <?php } } ?> id="secGolsCasa11" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
          </tr>
            <?php
              $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
              $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

              if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
          <tr class="row32">
              <td class="column0 style177 s style196" colspan="3">12|
                <select class="select-dadosSumula" name="gols12" id="gols12">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa12 != "0") { ?>
                          <option selected value="<?php echo $golsCasa1 ?>"><?php echo $golsCasa12 ?></option>
                  <?php } } ?> 
                  <?php
                    while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                      $numeroCamisa = $select['numeroCamisa'];
                      $docIdentidade = $select['docIdentidade'];
                  ?>
                <option value="<?php echo $numeroCamisa?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

            if($query_dadosJogadoresCasa->num_rows > 0) {
            ?>
            <td class="column3 style197 s style196" colspan="3">13|
              <select class="select-dadosSumula" name="gols13" id="gols13">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa13 != "0") { ?>
                          <option selected value="<?php echo $golsCasa13 ?>"><?php echo $golsCasa13 ?></option>
                  <?php } } ?> 
              <?php
              while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                  $numeroCamisa = $select['numeroCamisa'];
                  $docIdentidade = $select['docIdentidade'];
              ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
             $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
             $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);
 
             if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column6 style197 s style196" colspan="3">14|
              <select class="select-dadosSumula" name="gols14" id="gols14">
                <option value="0">0</option>
                <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa14 != "0") { ?>
                          <option selected value="<?php echo $golsCasa14 ?>"><?php echo $golsCasa14 ?></option>
                  <?php } } ?> 
                <?php
                while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);
            
            if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column9 style197 s style196" colspan="3">15|
             <select class="select-dadosSumula" name="gols15" id="gols15">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa15 != "0") { ?>
                          <option selected value="<?php echo $golsCasa15 ?>"><?php echo $golsCasa15 ?></option>
                  <?php } } ?> 
                <?php
                  while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                      $numeroCamisa = $select['numeroCamisa'];
                      $docIdentidade = $select['docIdentidade'];
                  ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa;?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

            if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column12 style197 s style196" colspan="3">16|
             <select class="select-dadosSumula" name="gols16" id="gols16">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa16 != "0") { ?>
                          <option selected value="<?php echo $golsCasa16 ?>"><?php echo $golsCasa16 ?></option>
                  <?php } } ?> 
                <?php
                while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

            if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column15 style180 s style179" colspan="3">17|
             <select class="select-dadosSumula" name="gols17" id="gols17">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa17 != "0") { ?>
                          <option selected value="<?php echo $golsCasa17 ?>"><?php echo $golsCasa17 ?></option>
                  <?php } } ?> 
                <?php
                while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

            if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column18 style180 s style179" colspan="3">18|
              <select class="select-dadosSumula" name="gols18" id="gols18">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa18 != "0") { ?>
                          <option selected value="<?php echo $golsCasa18 ?>"><?php echo $golsCasa18 ?></option>
                  <?php } } ?>
                <?php
                while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

            if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column21 style180 s style179" colspan="3">19|
              <select class="select-dadosSumula" name="gols19" id="gols19">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa19 != "0") { ?>
                          <option selected value="<?php echo $golsCasa19 ?>"><?php echo $golsCasa19 ?></option>
                  <?php } } ?> 
                <?php
                  while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                      $numeroCamisa = $select['numeroCamisa'];
                      $docIdentidade = $select['docIdentidade'];
                  ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

            if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column24 style180 s style179" colspan="3">20|
             <select class="select-dadosSumula" name="gols20" id="gols20">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa20 != "0") { ?>
                          <option selected value="<?php echo $golsCasa20 ?>"><?php echo $golsCasa20 ?></option>
                  <?php } } ?> 
                <?php
                while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

            if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column27 style180 s style179" colspan="3">21|
              <select class="select-dadosSumula" name="gols21" id="gols21">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa21 != "0") { ?>
                          <option selected value="<?php echo $golsCasa21 ?>"><?php echo $golsCasa21 ?></option>
                  <?php } } ?>
                <?php
                while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresCasa = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeCasa'";
            $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

            if($query_dadosJogadoresCasa->num_rows > 0) { 
            ?>
            <td class="column30 style180 s style190" colspan="5">22|
              <select class="select-dadosSumula" name="gols22" id="gols22">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsCasa22 != "0") { ?>
                          <option selected value="<?php echo $golsCasa22 ?>"><?php echo $golsCasa22 ?></option>
                  <?php } } ?> 
              <?php
                while($select = $query_dadosJogadoresCasa->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
          </tr>
          <tr class="row33">
            <td class="column0 style181 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa12" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa12 > "0") { ?> value = "<?php echo $minGolsCasa12 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa12 > "0") { ?>  value = "<?php echo $secGolsCasa12 ?>" <?php } } ?> id="secGolsCasa12" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column3 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa13" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa13 > "0") { ?> value = "<?php echo $minGolsCasa13 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa13 > "0") { ?>  value = "<?php echo $secGolsCasa13 ?>" <?php } } ?> id="secGolsCasa13" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column6 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa14" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa14 > "0") { ?> value = "<?php echo $minGolsCasa14 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa14 > "0") { ?>  value = "<?php echo $secGolsCasa14 ?>" <?php } } ?> id="secGolsCasa14" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column9 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa15" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa15 > "0") { ?> value = "<?php echo $minGolsCasa15 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa15 > "0") { ?>  value = "<?php echo $secGolsCasa15 ?>" <?php } } ?> id="secGolsCasa15" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column12 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa16" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa16 > "0") { ?> value = "<?php echo $minGolsCasa16 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa16 > "0") { ?> value = "<?php echo $secGolsCasa16 ?>" <?php } } ?> id="secGolsCasa16" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column15 style201 s style203" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa17" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa17 > "0") { ?> value = "<?php echo $minGolsCasa17 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa17 > "0") { ?> value = "<?php echo $secGolsCasa17 ?>" <?php } } ?> id="secGolsCasa17" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column18 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa18" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa18 > "0") { ?> value = "<?php echo $minGolsCasa18 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa18 > "0") { ?> value = "<?php echo $secGolsCasa18 ?>" <?php } } ?> id="secGolsCasa18" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column21 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa19" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa19 > "0") { ?> value = "<?php echo $minGolsCasa19 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa19 > "0") { ?> value = "<?php echo $secGolsCasa19 ?>" <?php } } ?> id="secGolsCasa19" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column24 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa20" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa20 > "0") { ?> value = "<?php echo $minGolsCasa20 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa20 > "0") { ?> value = "<?php echo $secGolsCasa20 ?>" <?php } } ?> id="secGolsCasa20" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column27 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa21" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa21 > "0") { ?> value = "<?php echo $minGolsCasa21 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa21 > "0") { ?> value = "<?php echo $secGolsCasa21 ?>" <?php } } ?> id="secGolsCasa21" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column30 style184 s style198" colspan="5"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsCasa22" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsCasa22 > "0") { ?> value = "<?php echo $minGolsCasa22 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsCasa22 > "0") { ?> value = "<?php echo $secGolsCasa22 ?>" <?php } } ?> id="secGolsCasa22" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
          </tr>
          <tr class="row34">
            <td class="column0 style145 null"></td>
            <td class="column1 style169 null" colspan="30"></td>
            <td class="column32 style147 null" colspan="4"></td>
          </tr>
          <tr class="row35">
            <td class="column0 nomeEquipes" colspan="19">EQUIPE B: <?php echo $equipeVisitante; ?></td>
            <td class="column19 style216 s style217" colspan="16">FALTAS ACUMULATIVAS</td>
          </tr>
          <tr class="row36">
            <td class="column0 style166 s">Nº</td>
            <td class="column1 style235 s style235" colspan="14">ATLETAS</td>
            <td class="column15 style216 s style216" colspan="2">C.A.</td>
            <td class="column17 style216 s style216" colspan="2">C.V.</td>
            <td class="column19 style236 s style236" colspan="4">1º PERÍODO</td>
            <td class="column23 style237 null style237" colspan="2"><input type="checkbox" id="faltaFora1Periodo1" name="faltaFora11" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasFora1Periodo >= "1") { ?> checked <?php } } ?> value="1" onclick="checkedFaltaFora1Periodo1()"></td>
            <td class="column25 style226 null style226" colspan="2"><input type="checkbox" id="faltaFora1Periodo2" name="faltaFora12" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasFora1Periodo >= "2") { ?> checked <?php } } ?> value="2" onclick="checkedFaltaFora1Periodo2()"></td>
            <td class="column27 style226 null style226" colspan="2"><input type="checkbox" id="faltaFora1Periodo3" name="faltaFora13" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasFora1Periodo >= "3") { ?> checked <?php } } ?> value="3" onclick="checkedFaltaFora1Periodo3()"></td>
            <td class="column29 style226 null style226" colspan="2"><input type="checkbox" id="faltaFora1Periodo4" name="faltaFora14" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasFora1Periodo >= "4") { ?> checked <?php } } ?> value="4" onclick="checkedFaltaFora1Periodo4()"></td>
            <td class="column31 style227 null style228" colspan="4"><input type="checkbox" id="faltaFora1Periodo5" name="faltaFora15" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasFora1Periodo == "5") { ?> checked <?php } } ?> value="5" onclick="checkedFaltaFora1Periodo5()"></td>
          </tr>

            <?php if($query_dadosJogadoresVisitante->num_rows > 0) { 
                  $contador = 1;
                  $aux = 0;
                  $linhas = $query_dadosJogadoresVisitante->num_rows;
                  while($dadoJogador = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                      $docIdentidade = $dadoJogador['docIdentidade'];
                      $fotoPerfil = $dadoJogador['fotoPerfil'];
                      $nomeJogador = $dadoJogador['nomeUsuario'];
                      $numeroCamisa = $dadoJogador['numeroCamisa'];
                      $gols = $dadoJogador['gols'];
                      $cartaoAmareloAtual = $dadoJogador['cartaoAmareloAtual'];
                      $cartaoAmarelo = $dadoJogador['cartaoAmarelo'];
                      $cartaoVermelhoAtual = $dadoJogador['cartaoVermelhoAtual'];
                      $cartaoVermelho = $dadoJogador['cartaoVermelho'];
                      $suspenso = $dadoJogador['suspenso'];
                      $emblema = $dadoJogador['emblema'];
                      $funcao = $dadoJogador['funcao'];

                      if($funcao == "atleta") {
                      $aux = $aux + 1;
                      $amareloFora = "amareloFora" . $aux;
                      $amareloMinFora = "minAmareloFora" . $aux;
                      $amareloSecFora = "secAmareloFora" . $aux;
                      $vermelhoFora = "vermelhoFora" . $aux;
                      $vermelhoMinFora = "minVermelhoFora" . $aux;
                      $vermelhoSecFora = "secVermelhoFora" . $aux;
                  ?>
                  <tr class="row37">
                        <td class="column0 style173 null"><p><?php echo $numeroCamisa ?></p></td>
                        <td class="column2 style164 null" colspan="14"><p <?php if($suspenso == 1) {  ?> style="color: red;" <?php } ?>> <?php echo $nomeJogador ?> </p></td>
                        <td class="column15 style211 s style212" colspan="2">
                            <select class="select-dadosSumula" name="cartaoAmarelo<?php echo $docIdentidade?>" id="amareloFora<?php echo $aux ?>">
                              <option value="0">0</option>
                              <option <?php if(isset($_SESSION["sumulaRecarregada"])) { if($$amareloFora == "1") { ?> selected <?php } } ?> value="1">1</option>
                            </select>
                                <input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minAmareloFora<?php echo $aux ?>" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($$amareloMinFora > "0") { ?> value = "<?php echo $$amareloMinFora ?>" <?php } } ?>>:<input id="secAmareloFora<?php echo $aux ?>" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($$amareloSecFora > "0") { ?> value = "<?php echo $$amareloSecFora ?>" <?php } } ?> class="numero_inputs" type="tel" style="width: 1.5rem;">
                        </td>

                        <td class="column17 style213 s style212" colspan="2">
                            <select class="select-dadosSumula" name="cartaoVermelho<?php echo $docIdentidade?>" id="vermelhoFora<?php echo $aux ?>">
                                <option value="0">0</option>
                                <option <?php if(isset($_SESSION["sumulaRecarregada"])) { if($$vermelhoFora == "1") { ?> selected <?php } } ?> value="1">1</option>
                            </select>
                            <input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minVermelhoFora<?php echo $aux ?>" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($$vermelhoMinFora > "0") { ?> value = "<?php echo $$vermelhoMinFora ?>" <?php } } ?>>:<input id="secVermelhoFora<?php echo $aux ?>" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($$vermelhoSecFora > "0") { ?> value = "<?php echo $$vermelhoSecFora ?>" <?php } } ?> class="numero_inputs" type="tel" style="width: 1.5rem;">
                        </td>
                          <?php if($contador == 1) {
                          $contador = $contador + 1;
                          ?>
                            <td class="column19 style240 s style240" colspan="4">2º PERÍODO</td>
                            <td class="column23 style237 null style237" colspan="2"><input type="checkbox" id="faltaFora2Periodo1" name="faltaFora21" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasFora2Periodo >= "1") { ?> checked <?php } } ?> value="1" onclick="checkedFaltaFora2Periodo1()"></td>
                            <td class="column25 style226 null style226" colspan="2"><input type="checkbox" id="faltaFora2Periodo2" name="faltaFora22" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasFora2Periodo >= "2") { ?> checked <?php } } ?> value="2" onclick="checkedFaltaFora2Periodo2()"></td>
                            <td class="column27 style226 null style226" colspan="2"><input type="checkbox" id="faltaFora2Periodo3" name="faltaFora23" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasFora2Periodo >= "3") { ?> checked <?php } } ?> value="3" onclick="checkedFaltaFora2Periodo3()"></td>
                            <td class="column29 style226 null style226" colspan="2"><input type="checkbox" id="faltaFora2Periodo4" name="faltaFora24" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasFora2Periodo >= "4") { ?> checked <?php } } ?> value="4" onclick="checkedFaltaFora2Periodo4()"></td>
                            <td class="column31 style227 null style228" colspan="4"><input type="checkbox" id="faltaFora2Periodo5" name="faltaFora25" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($faltasFora2Periodo == "5") { ?> checked <?php } } ?> value="5" onclick="checkedFaltaFora2Periodo5()"></td>
                          <?php } else if($contador == 2) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column32 style135 null" colspan="16"></td>
                            <?php } else if($contador == 3) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column32 style135 null" colspan="16"></td>
                            <?php } else if($contador == 4) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style238 s style239" colspan="16">ASSINATURAS</td>
                            <?php } else if($contador == 5) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style218 s style219" colspan="16">TÉCNICO</td>
                            <?php } else if($contador == 6) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style142 null" colspan="16"></td>
                            <?php } else if($contador == 7) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style142 null" colspan="16">
                              <?php if(isset($equipeCasa)) { ?>
                                <div class="container4">
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="canvasDiv2" id="canvasDiv2">
                                      <canvas id="sig-canvas2" width="300px" height="70px">
                                      </canvas>
                                    </div>
                                  </div>
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="col-md-12">
                                      <button type="button" class="btn btn-primary" id="sig-submitBtn2" onclick="ocultarAssinatura()" style="display: block;">Salvar Assinatura</button>
                                      <button type="button" class="btn btn-default" id="sig-clearBtn2" style="display: block;">Refazer Assinatura</button>
                                    </div>
                                  </div>
      
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="col-md-12" style="display: none;">
                                      <textarea id="sig-dataUrl2" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                                    </div>
                                  </div>
      
                                  <div class="row">
                                    <div class="col-md-12">
                                      <img id="sig-image2" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> src=".<?php echo $assTecFora ?>"  <?php } else { ?> src="" <?php } ?>/>
                                    </div>
                                  </div>
                              </div>
                                <?php } ?>
                              </td>
                            <?php } else if($contador == 8) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style142 null" colspan="16"></td>
                            <?php } else if($contador == 9) {
                              $contador = $contador + 1;
                              ?>
                              <td class="column19 style218 s style219" colspan="16">CAPITÃO</td>
                            <?php } else if($contador == 10) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style142 null" colspan="16"></td>
                            <?php } else if($contador == 11) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style142 null" colspan="16">
                              <?php if(isset($equipeCasa)) { ?>
                                <div class="container4">
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="canvasDiv3" id="canvasDiv3">
                                      <canvas id="sig-canvas3" width="300px" height="70px">
                                      </canvas>
                                    </div>
                                  </div>
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="col-md-12">
                                      <button type="button" class="btn btn-primary" id="sig-submitBtn3" onclick="ocultarAssinatura()" style="display: block;">Salvar Assinatura</button>
                                      <button type="button" class="btn btn-default" id="sig-clearBtn3" style="display: block;">Refazer Assinatura</button>
                                    </div>
                                  </div>
      
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="col-md-12" style="display: none;">
                                      <textarea id="sig-dataUrl3" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                                    </div>
                                  </div>
      
                                  <div class="row">
                                    <div class="col-md-12">
                                      <img id="sig-image3" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> src=".<?php echo $assCapFora ?>"  <?php } else { ?> src="" <?php } ?>/>
                                    </div>
                                  </div>
                              </div>
                                <?php } ?>
                              </td>
                            <?php } else if($contador == 12) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style8 null" colspan="16"></td>
                            <?php } else if($contador == 13) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column32 style141 null" colspan="16"></td>
                            <?php } else if($contador == 14) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style220 s style221" colspan="16">PEDIDOS DE TEMPO</td>
                            <?php } else if($contador == 15) {
                            $contador = $contador + 1;
                            ?>
                              <td class="column19 style223 s style223" colspan="7">1º PERÍODO</td>
                              <td class="column26 style224 s style225" colspan="9">2º PERÍODO</td>
                            <?php } ?>
                          </tr>
                  <?php } } }?>

                     <!-- Lógica de quando não possui pelo menos 15 inscritos no time -->
                      <?php if($linhas < 15) { ?>
                      <tr class="row37" <?php if($contador > 5) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 5 && $contador < 6) { 
                            $contador = $contador + 1;
                            ?> 
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style218 s style219" colspan="16">TÉCNICO</td>
                            <?php  } ?>
                      </tr>
                      <tr class="row37" <?php if($contador > 6) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 6 && $contador < 7) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style142 null" colspan="16"></td>
                            <?php  } ?>
                      </tr>
                      <tr class="row37" <?php if($contador > 7) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 7 && $contador < 8) { 
                            $contador = $contador + 1; 
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style142 null" colspan="16">
                              <?php if(isset($equipeCasa)) { ?>
                                <div class="container4">
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="canvasDiv2" id="canvasDiv2">
                                      <canvas id="sig-canvas2" width="300px" height="70px">
                                      </canvas>
                                    </div>
                                  </div>
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="col-md-12">
                                      <button type="button" class="btn btn-primary" id="sig-submitBtn2" onclick="ocultarAssinatura()" style="display: block;">Salvar Assinatura</button>
                                      <button class="btn btn-default" id="sig-clearBtn2" style="display: block;">Refazer Assinatura</button>
                                    </div>
                                  </div>
      
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="col-md-12" style="display: none;">
                                      <textarea id="sig-dataUrl2" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                                    </div>
                                  </div>
      
                                  <div class="row">
                                    <div class="col-md-12">
                                      <img id="sig-image2" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> src=".<?php echo $assTecFora ?>"  <?php } else { ?> src="" <?php } ?>/>
                                    </div>
                                  </div>
                              </div>
                                <?php } ?>
                              </td>
                            <?php  } ?>
                      </tr>
                      <tr class="row37" <?php if($contador > 8) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 8 && $contador < 9) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style142 null" colspan="16"></td>
                            <?php  } ?>
                      </tr>
                      <tr class="row37" <?php if($contador > 9) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 9 && $contador < 10) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style218 s style219" colspan="16">CAPITÃO</td>
                            <?php  } ?>
                      </tr>
                      <tr class="row37" <?php if($contador > 10) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 10 && $contador < 11) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style142 null" colspan="16"></td>
                            <?php  } ?>
                      </tr>
                      <tr class="row37" <?php if($contador > 11) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 11 && $contador < 12) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style142 null" colspan="16">
                              <?php if(isset($equipeCasa)) { ?>
                                <div class="container4">
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="canvasDiv3" id="canvasDiv3">
                                      <canvas id="sig-canvas3" width="300px" height="70px">
                                      </canvas>
                                    </div>
                                  </div>
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="col-md-12">
                                      <button type="button" class="btn btn-primary" id="sig-submitBtn3" onclick="ocultarAssinatura()" style="display: block;">Salvar Assinatura</button>
                                      <button type="button" class="btn btn-default" id="sig-clearBtn3" style="display: block;">Refazer Assinatura</button>
                                    </div>
                                  </div>
      
                                  <div class="row" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> style="display:none;" <?php } ?>>
                                    <div class="col-md-12" style="display: none;">
                                      <textarea id="sig-dataUrl3" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                                    </div>
                                  </div>
      
                                  <div class="row">
                                    <div class="col-md-12">
                                      <img id="sig-image3" <?php if(isset($_SESSION["sumulaRecarregada"])) { ?> src=".<?php echo $assCapFora ?>"  <?php } else { ?> src="" <?php } ?>/>
                                    </div>
                                  </div>
                              </div>
                                <?php } ?>
                              </td>
                            <?php  } ?>
                      </tr>
                      <tr class="row37" <?php if($contador > 12) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 12 && $contador < 13) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style8 null" colspan="16"></td>
                            <?php  } ?>
                      </tr>
                      <tr class="row37" <?php if($contador > 13) { ?> style="display: none;" <?php } ?>>
                          <?php if($contador == 13  && $contador < 14) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column32 style141 null" colspan="16"></td>
                            <?php  } ?>
                      </tr>
                      <tr class="row37">
                          <?php if($contador == 14 && $contador < 15) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style220 s style221" colspan="16">PEDIDOS DE TEMPO</td>
                            <?php  } ?>
                      </tr>
                      <tr class="row37">
                          <?php if($contador == 15) { 
                            $contador = $contador + 1;
                            ?>
                                <td class="column0 style173 null"><p>0</p></td>
                                <td class="column2 style164 null" colspan="14"><p>Vago</p></td>
                                <td class="column15 style211 s style212" colspan="2">
                                      --:--
                                </td>
                                <td class="column17 style213 s style212" colspan="2">
                                  --:--
                                </td>
                                <td class="column19 style223 s style223" colspan="7">1º PERÍODO</td>
                                <td class="column26 style224 s style225" colspan="9">2º PERÍODO</td>
                            <?php  } ?>
                      </tr>
                    <?php } ?>

          <?php 
              $sql_nomesTecnicosVisitante = "SELECT docIdentidade, fotoPerfil, nomeUsuario, cartaoVermelhoAtual, cartaoVermelho, suspenso, emblema, funcao, funcao_comissao FROM usuarios WHERE equipe = '$equipeVisitante' AND categoria = '$categoria' AND funcao = 'comissaoTecnica' ORDER BY funcao_comissao = 'Mas', funcao_comissao='Aux', funcao_comissao='Tec'";
              $query_dadosTecnicosVisitante = $mysqli->query($sql_nomesTecnicosVisitante) or die($mysqli->error);
              if($query_dadosTecnicosVisitante->num_rows > 0) {
              $contador = 1;
              $linhasComissaoVisitante = $query_dadosTecnicosVisitante->num_rows;
              while($dadoJogador = $query_dadosTecnicosVisitante->fetch_assoc()) { 
                  $docIdentidade = $dadoJogador['docIdentidade'];
                  $fotoPerfil = $dadoJogador['fotoPerfil'];
                  $nomeJogador = $dadoJogador['nomeUsuario'];
                  $cartaoVermelhoAtual = $dadoJogador['cartaoVermelhoAtual'];
                  $cartaoVermelho = $dadoJogador['cartaoVermelho'];
                  $suspenso = $dadoJogador['suspenso'];
                  $emblema = $dadoJogador['emblema'];
                  $funcao = $dadoJogador['funcao'];
                  
                  if($funcao == "comissaoTecnica") {
            ?>
              <?php if($contador == 1) {
                $contador = $contador + 1;
                ?>
              <tr class="row52">
                <td class="column0 style157 s">TEC</td>
                <td class="column2 style160 null" colspan="13"><p <?php if($suspenso == 1) {  ?> style="color: red;" <?php } ?>> <?php echo $nomeJogador ?> </p></td>
                <td class="column3 style163 null" colspan="1"></td>
                <td class="column15 style153 null"></td>
                <td class="column16 style152 null"></td>
                <td class="column17 style206 s style205" colspan="2">
                <select class="select-dadosSumula" name="cartaoVermelho<?php echo $docIdentidade?>" id="vermelhoTreinadorFora">
                    <option value="0">0</option>
                    <option <?php if(isset($_SESSION["sumulaRecarregada"])) { if($vermelhoTreinadorFora > "0") { ?> selected <?php } } ?> value="1">1</option>
                </select>
                <input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minVerTreinadorFora" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minVerTreinadorFora > "0") { ?> value = "<?php echo $minVerTreinadorFora ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secVerTreinadorFora > "0") { ?> value = "<?php echo $secVerTreinadorFora ?>" <?php } } ?> id="secVerTreinadorFora" class="numero_inputs" type="tel" style="width: 1.5rem;">
                </td>
                <td class="column19 style209 s style209" colspan="7"><input class="numero_inputs" type="tel" style="width: 30px;" id="minTempoFora1Periodo" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minTempoFora1Periodo > "0") { ?> value = "<?php echo $minTempoFora1Periodo ?>" <?php } } ?> >:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secTempoFora1Periodo > "0") { ?> value = "<?php echo $secTempoFora1Periodo ?>" <?php } } ?> id="secTempoFora1Periodo" class="numero_inputs" type="tel" style="width: 30px;"></td>
                <td class="column26 style214 s style215" colspan="9"><input class="numero_inputs" type="tel" style="width: 30px;" id="minTempoFora2Periodo" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minTempoFora2Periodo > "0") { ?> value = "<?php echo $minTempoFora2Periodo ?>" <?php } } ?> >:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secTempoFora2Periodo > "0") { ?> value = "<?php echo $secTempoFora2Periodo ?>" <?php } } ?> id="secTempoFora2Periodo" class="numero_inputs" type="tel" style="width: 30px;"></td>
              <?php } else if($contador == 2) {
                            $contador = $contador + 1;
                            ?>             
                <td class="column0 style157 s">AUX</td>
                <td class="column2 style160 null" colspan="13"><p <?php if($suspenso == 1) {  ?> style="color: red;" <?php } ?>> <?php echo $nomeJogador ?> </p></td>
                <td class="column3 style163 null" colspan="1"></td>
                <td class="column15 style153 null"></td>
                <td class="column16 style152 null"></td>
                <td class="column17 style206 s style205" colspan="2">
                <select class="select-dadosSumula" name="cartaoVermelho<?php echo $docIdentidade?>" id="vermelhoAuxiliarFora">
                    <option value="0">0</option>
                    <option <?php if(isset($_SESSION["sumulaRecarregada"])) { if($vermelhoAuxiliarFora > "0") { ?> selected <?php } } ?> value="1">1</option>
                </select>
                <input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minVerAuxiliarFora" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minVerAuxiliarFora > "0") { ?> value = "<?php echo $minVerAuxiliarFora ?>" <?php } } ?>>:<input id="secVerAuxiliarFora" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secVerAuxiliarFora > "0") { ?> value = "<?php echo $secVerAuxiliarFora ?>" <?php } } ?> class="numero_inputs" type="tel" style="width: 1.5rem;">
              </td>
              <td class="column19 style143 null" colspan="19"></td>
              <?php } else if($contador == 3) {
                            $contador = $contador + 1;
                            ?>
                <td class="column0 style157 s">MAS</td>
                <td class="column2 style160 null" colspan="13"><p <?php if($suspenso == 1) {  ?> style="color: red;" <?php } ?>> <?php echo $nomeJogador ?> </p></td>
                <td class="column3 style163 null" colspan="1"></td>
                <td class="column15 style153 null"></td>
                <td class="column16 style152 null"></td>
                <td class="column17 style207 s style208" colspan="2">
                <select class="select-dadosSumula" name="cartaoVermelho<?php echo $docIdentidade?>" id="vermelhoMassagistaFora">
                    <option value="0">0</option>
                    <option <?php if(isset($_SESSION["sumulaRecarregada"])) { if($vermelhoMassagistaFora > "0") { ?> selected <?php } } ?> value="1">1</option>
                </select>
                <input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minVerMassagistaFora" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minVerMassagistaFora > "0") { ?> value = "<?php echo $minVerMassagistaFora ?>" <?php } } ?>>:<input id="secVerMassagistaFora" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secVerMassagistaFora > "0") { ?> value = "<?php echo $secVerMassagistaFora ?>" <?php } } ?> class="numero_inputs" type="tel" style="width: 1.5rem;">
              </td>
              <td class="column19 style143 null" colspan="19"></td>
              <?php } ?>
              </tr>
            <?php } } }?>
            <?php if($linhasComissaoVisitante <= 1) { ?>
            <tr class="row27">
                  <td class="column0 style157 s">AUX</td>
                  <td class="column2 style160 null" colspan="13"><p>Vago</p></td>
                  <td class="column3 style163 null" colspan="1"></td>
                  <td class="column15 style153 null"></td>
                  <td class="column16 style152 null"></td>
                  <td class="column17 style206 s style205" colspan="2">
                  --
                  </td>
                  <td class="column19 style143 null" colspan="19"></td>
                </tr>
                <?php } if ($linhasComissaoVisitante <= 2) { ?>
                    <tr class="row27">
                    <td class="column0 style157 s">MAS</td>
                    <td class="column2 style160 null" colspan="13"><p>Vago</p></td>
                    <td class="column3 style163 null" colspan="1"></td>
                    <td class="column15 style153 null"></td>
                    <td class="column16 style152 null"></td>
                    <td class="column17 style207 s style208" colspan="2">
                    --
                    </td>
                    <td class="column19 style143 null" colspan="19"></td>
                    </tr>
                  <?php } ?>

            <?php
              $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
              $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

              if($query_dadosJogadoresVisitante->num_rows > 0) { 
              ?>
            <tr class="row55">
              <td class="column0 style177 s style196" colspan="3">01|
                <select class="select-dadosSumula" name="golsFora1" id="golsFora1">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora1 != "0") { ?>
                          <option selected value="<?php echo $golsFora1 ?>"><?php echo $golsFora1 ?></option>
                  <?php } } ?>
                <?php
                  while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

            if($query_dadosJogadoresVisitante->num_rows > 0) {
            ?>
            <td class="column3 style197 s style196" colspan="3">02|
              <select class="select-dadosSumula" name="golsFora2" id="golsFora2">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora2 != "0") { ?>
                          <option selected value="<?php echo $golsFora2 ?>"><?php echo $golsFora2 ?></option>
                  <?php } } ?> 
              <?php
              while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                  $numeroCamisa = $select['numeroCamisa'];
                  $docIdentidade = $select['docIdentidade'];
              ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
             $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
             $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);
 
             if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column6 style197 s style196" colspan="3">03|
              <select class="select-dadosSumula" name="golsFora3" id="golsFora3">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora3 != "0") { ?>
                          <option selected value="<?php echo $golsFora3 ?>"><?php echo $golsFora3 ?></option>
                  <?php } } ?> 
                <?php
                while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);
            
            if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column9 style197 s style196" colspan="3">04|
             <select class="select-dadosSumula" name="golsFora4" id="golsFora4">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora4 != "0") { ?>
                          <option selected value="<?php echo $golsFora4 ?>"><?php echo $golsFora4 ?></option>
                  <?php } } ?> 
                <?php
                  while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                      $numeroCamisa = $select['numeroCamisa'];
                      $docIdentidade = $select['docIdentidade'];
                  ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa;?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

            if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column12 style197 s style196" colspan="3">05|
             <select class="select-dadosSumula" name="golsFora5" id="golsFora5">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora5 != "0") { ?>
                          <option selected value="<?php echo $golsFora5 ?>"><?php echo $golsFora5 ?></option>
                  <?php } } ?> 
                <?php
                while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

            if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column15 style180 s style179" colspan="3">06|
             <select class="select-dadosSumula" name="golsFora6" id="golsFora6">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora6 != "0") { ?>
                          <option selected value="<?php echo $golsFora6 ?>"><?php echo $golsFora6 ?></option>
                  <?php } } ?> 
                <?php
                while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

            if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column18 style180 s style179" colspan="3">07|
              <select class="select-dadosSumula" name="golsFora7" id="golsFora7">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora7 != "0") { ?>
                          <option selected value="<?php echo $golsFora7 ?>"><?php echo $golsFora7 ?></option>
                  <?php } } ?> 
                <?php
                while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

            if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column21 style180 s style179" colspan="3">08|
              <select class="select-dadosSumula" name="golsFora8" id="golsFora8">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora8 != "0") { ?>
                          <option selected value="<?php echo $golsFora8 ?>"><?php echo $golsFora8 ?></option>
                  <?php } } ?> 
                <?php
                  while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                      $numeroCamisa = $select['numeroCamisa'];
                      $docIdentidade = $select['docIdentidade'];
                  ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

            if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column24 style180 s style179" colspan="3">09|
             <select class="select-dadosSumula" name="golsFora9" id="golsFora9">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora9 != "0") { ?>
                          <option selected value="<?php echo $golsFora9 ?>"><?php echo $golsFora9 ?></option>
                  <?php } } ?>
                <?php
                while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

            if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column27 style180 s style179" colspan="3">10|
              <select class="select-dadosSumula" name="golsFora10" id="golsFora10">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora10 != "0") { ?>
                          <option selected value="<?php echo $golsFora10 ?>"><?php echo $golsFora10 ?></option>
                  <?php } } ?>
                <?php
                while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

            if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column30 style180 s style190" colspan="5">11|
              <select class="select-dadosSumula" name="golsFora11" id="golsFora11">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora11 != "0") { ?>
                          <option selected value="<?php echo $golsFora11 ?>"><?php echo $golsFora11 ?></option>
                  <?php } } ?>
              <?php
                while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
          </tr>
<tr class="row56">
            <td class="column0 style181 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora1" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora1 > "0") { ?> value = "<?php echo $minGolsFora1 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora1 > "0") { ?> value = "<?php echo $secGolsFora1 ?>" <?php } } ?> id="secGolsFora1" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column3 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora2" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora2 > "0") { ?> value = "<?php echo $minGolsFora2 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora2 > "0") { ?> value = "<?php echo $secGolsFora2 ?>" <?php } } ?> id="secGolsFora2" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column6 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora3" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora3 > "0") { ?> value = "<?php echo $minGolsFora3 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora3 > "0") { ?> value = "<?php echo $secGolsFora3 ?>" <?php } } ?> id="secGolsFora3" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column9 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora4" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora4 > "0") { ?> value = "<?php echo $minGolsFora4 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora4 > "0") { ?> value = "<?php echo $secGolsFora4 ?>" <?php } } ?> id="secGolsFora4" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column12 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora5" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora5 > "0") { ?> value = "<?php echo $minGolsFora5 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora5 > "0") { ?> value = "<?php echo $secGolsFora5 ?>" <?php } } ?> id="secGolsFora5" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column15 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora6" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora6 > "0") { ?> value = "<?php echo $minGolsFora6 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora6 > "0") { ?> value = "<?php echo $secGolsFora6 ?>" <?php } } ?> id="secGolsFora6" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column18 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora7" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora7 > "0") { ?> value = "<?php echo $minGolsFora7 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora7 > "0") { ?> value = "<?php echo $secGolsFora7 ?>" <?php } } ?> id="secGolsFora7" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column21 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora8" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora8 > "0") { ?> value = "<?php echo $minGolsFora8 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora8 > "0") { ?> value = "<?php echo $secGolsFora8 ?>" <?php } } ?> id="secGolsFora8" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column24 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora9" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora9 > "0") { ?> value = "<?php echo $minGolsFora9 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora9 > "0") { ?> value = "<?php echo $secGolsFora9 ?>" <?php } } ?> id="secGolsFora9" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column27 style184 s style183" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora10" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora10 > "0") { ?> value = "<?php echo $minGolsFora10 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora10 > "0") { ?> value = "<?php echo $secGolsFora10 ?>" <?php } } ?> id="secGolsFora10" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column30 style184 s style198" colspan="5"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora11" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora11 > "0") { ?> value = "<?php echo $minGolsFora11 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora11 > "0") { ?> value = "<?php echo $secGolsFora11 ?>" <?php } } ?> id="secGolsFora11" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
          </tr>
          <?php
              $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
              $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

              if($query_dadosJogadoresVisitante->num_rows > 0) { 
              ?>
<tr class="row57">
              <td class="column0 style177 s style196" colspan="3">12|
                <select class="select-dadosSumula" name="golsFora12" id="golsFora12">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora12 != "0") { ?>
                          <option selected value="<?php echo $golsFora12 ?>"><?php echo $golsFora12 ?></option>
                  <?php } } ?>
                  <?php
                    while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                      $numeroCamisa = $select['numeroCamisa'];
                      $docIdentidade = $select['docIdentidade'];
                  ?>
                <option value="<?php echo $numeroCamisa?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

            if($query_dadosJogadoresVisitante->num_rows > 0) {
            ?>
            <td class="column3 style197 s style196" colspan="3">13|
              <select class="select-dadosSumula" name="golsFora13" id="golsFora13">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora13 != "0") { ?>
                          <option selected value="<?php echo $golsFora13 ?>"><?php echo $golsFora13 ?></option>
                  <?php } } ?>
              <?php
              while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                  $numeroCamisa = $select['numeroCamisa'];
                  $docIdentidade = $select['docIdentidade'];
              ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
             $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
             $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);
 
             if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column6 style197 s style196" colspan="3">14|
              <select class="select-dadosSumula" name="golsFora14" id="golsFora14">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora14 != "0") { ?>
                          <option selected value="<?php echo $golsFora14 ?>"><?php echo $golsFora14 ?></option>
                  <?php } } ?>
                <?php
                while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);
            
            if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column9 style197 s style196" colspan="3">15|
             <select class="select-dadosSumula" name="golsFora15" id="golsFora15">
                <option value="0">0</option>
                <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora15 != "0") { ?>
                          <option selected value="<?php echo $golsFora15 ?>"><?php echo $golsFora15 ?></option>
                  <?php } } ?>
                <?php
                  while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                      $numeroCamisa = $select['numeroCamisa'];
                      $docIdentidade = $select['docIdentidade'];
                  ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa;?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

            if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column12 style197 s style196" colspan="3">16|
             <select class="select-dadosSumula" name="golsFora16" id="golsFora16">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora16 != "0") { ?>
                          <option selected value="<?php echo $golsFora16 ?>"><?php echo $golsFora16 ?></option>
                  <?php } } ?>
                <?php
                while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

            if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column15 style180 s style179" colspan="3">17|
             <select class="select-dadosSumula" name="golsFora17" id="golsFora17">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora17 != "0") { ?>
                          <option selected value="<?php echo $golsFora17 ?>"><?php echo $golsFora17 ?></option>
                  <?php } } ?>
                <?php
                while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

            if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column18 style180 s style179" colspan="3">18|
              <select class="select-dadosSumula" name="golsFora18" id="golsFora18">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora18 != "0") { ?>
                          <option selected value="<?php echo $golsFora18 ?>"><?php echo $golsFora18 ?></option>
                  <?php } } ?>
                <?php
                while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

            if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column21 style180 s style179" colspan="3">19|
              <select class="select-dadosSumula" name="golsFora19" id="golsFora19">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora19 != "0") { ?>
                          <option selected value="<?php echo $golsFora19 ?>"><?php echo $golsFora19 ?></option>
                  <?php } } ?>
                <?php
                  while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                      $numeroCamisa = $select['numeroCamisa'];
                      $docIdentidade = $select['docIdentidade'];
                  ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

            if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column24 style180 s style179" colspan="3">20|
             <select class="select-dadosSumula" name="golsFora20" id="golsFora20">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora20 != "0") { ?>
                          <option selected value="<?php echo $golsFora20 ?>"><?php echo $golsFora20 ?></option>
                  <?php } } ?>
                <?php
                while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

            if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column27 style180 s style179" colspan="3">21|
              <select class="select-dadosSumula" name="golsFora21" id="golsFora21">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora21 != "0") { ?>
                          <option selected value="<?php echo $golsFora21 ?>"><?php echo $golsFora21 ?></option>
                  <?php } } ?>
                <?php
                while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
            <?php
            $sql_nomesJogadoresVisitante = "SELECT docIdentidade, nomeUsuario, numeroCamisa, gols FROM usuarios WHERE equipe = '$equipeVisitante'";
            $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

            if($query_dadosJogadoresVisitante->num_rows > 0) { 
            ?>
            <td class="column30 style180 s style190" colspan="5">22|
              <select class="select-dadosSumula" name="golsFora22" id="golsFora22">
                <option value="0">0</option>
                  <?php
                    if(isset($_SESSION["sumulaRecarregada"])) {
                      if($golsFora22 != "0") { ?>
                          <option selected value="<?php echo $golsFora22 ?>"><?php echo $golsFora22 ?></option>
                  <?php } } ?>
              <?php
                while($select = $query_dadosJogadoresVisitante->fetch_assoc()) { 
                    $numeroCamisa = $select['numeroCamisa'];
                    $docIdentidade = $select['docIdentidade'];
                ?>
                <option value="<?php echo $numeroCamisa ?>"><?php echo $numeroCamisa; ?></option>
                <?php } } ?>
              </select>
            </td>
          </tr>
            
          <tr class="row58">
            <td class="column0 style199 s style193" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora12" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora12 > "0") { ?> value = "<?php echo $minGolsFora12 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora12 > "0") { ?>  value = "<?php echo $secGolsFora12 ?>" <?php } } ?> id="secGolsFora12" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column3 style191 s style193" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora13" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora13 > "0") { ?> value = "<?php echo $minGolsFora13 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora13 > "0") { ?>  value = "<?php echo $secGolsFora13 ?>" <?php } } ?> id="secGolsFora13" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column6 style191 s style193" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora14" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora14 > "0") { ?> value = "<?php echo $minGolsFora14 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora14 > "0") { ?>  value = "<?php echo $secGolsFora14 ?>" <?php } } ?> id="secGolsFora14" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column9 style191 s style193" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora15" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora15 > "0") { ?> value = "<?php echo $minGolsFora15 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora15 > "0") { ?>  value = "<?php echo $secGolsFora15 ?>" <?php } } ?> id="secGolsFora15" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column12 style191 s style193" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora16" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora16 > "0") { ?> value = "<?php echo $minGolsFora16 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora16 > "0") { ?> value = "<?php echo $secGolsFora16 ?>" <?php } } ?> id="secGolsFora16" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column15 style191 s style193" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora17" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora17 > "0") { ?> value = "<?php echo $minGolsFora17 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora17 > "0") { ?> value = "<?php echo $secGolsFora17 ?>" <?php } } ?> id="secGolsFora17" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column18 style191 s style193" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora18" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora18 > "0") { ?> value = "<?php echo $minGolsFora18 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora18 > "0") { ?> value = "<?php echo $secGolsFora18 ?>" <?php } } ?> id="secGolsFora18" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column21 style191 s style193" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora19" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora19 > "0") { ?> value = "<?php echo $minGolsFora19 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora19 > "0") { ?> value = "<?php echo $secGolsFora19 ?>" <?php } } ?> id="secGolsFora19" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column24 style191 s style193" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora20" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora20 > "0") { ?> value = "<?php echo $minGolsFora20 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora20 > "0") { ?> value = "<?php echo $secGolsFora20 ?>" <?php } } ?> id="secGolsFora20" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column27 style191 s style193" colspan="3"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora21" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora21 > "0") { ?> value = "<?php echo $minGolsFora21 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora21 > "0") { ?> value = "<?php echo $secGolsFora21 ?>" <?php } } ?> id="secGolsFora21" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
            <td class="column30 style191 s style194" colspan="5"><input class="numero_inputs" type="tel" style="width: 1.5rem;" id="minGolsFora22" <?php if(isset($_SESSION["sumulaRecarregada"])) { if($minGolsFora22 > "0") { ?> value = "<?php echo $minGolsFora22 ?>" <?php } } ?>>:<input <?php if(isset($_SESSION["sumulaRecarregada"])) { if($secGolsFora22 > "0") { ?> value = "<?php echo $secGolsFora22 ?>" <?php } } ?> id="secGolsFora22" class="numero_inputs" type="tel" style="width: 1.5rem;"></td>
          </tr>
        </tbody>
    </table> 
    <p class="container_anotacoes">
      <a class="label_anotacoes">Anotações:</a>
      <textarea name="anotacoes" id="anotacoesPartida" style="width: 80%; height: 50vh; margin-top: 8px"><?php if(isset($_SESSION["sumulaRecarregada"])) { ?> <?php echo $anotacoesPartida ?> <?php } ?></textarea>
    </p>
    </div>
             <button class="button-salvarSumula" type="submit">Salvar Dados da Súmula</button>
            </form>
          </div>
        </main>

    <script src="placar_function.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="canvasArb.js"></script>
    <script src="canvasArb1.js"></script>
    <script src="canvasArb2.js"></script>
    <script src="canvasArb3.js"></script>
    <script src="canvas.js"></script>
    <script src="canvas1.js"></script>
    <script src="canvas2.js"></script>
    <script src="canvas3.js"></script>
    <script src="corInputs.js"></script>
</body>
</html>