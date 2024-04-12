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

     $equipeCasa = $_SESSION["equipeCasa"];
     $equipeVisitante = $_SESSION["equipeVisitante"];
     $categoria = $_SESSION["categoria"];

     if(isset($_SESSION["equipeCasa"]) && isset($_SESSION["equipeVisitante"])) { 
      $sql_nomesJogadoresCasa = "SELECT docIdentidade, fotoPerfil, nomeUsuario, numeroCamisa, gols, cartaoAmareloAtual, cartaoAmarelo, cartaoVermelhoAtual, cartaoVermelho, suspenso, joga, emblema, categoria, funcao FROM usuarios WHERE equipe = '$equipeCasa' AND categoria = '$categoria' AND joga = '1'";
      $query_dadosJogadoresCasa = $mysqli->query($sql_nomesJogadoresCasa) or die($mysqli->error);

      $sql_nomesJogadoresVisitante = "SELECT docIdentidade, fotoPerfil, nomeUsuario, numeroCamisa, gols, cartaoAmareloAtual, cartaoAmarelo, cartaoVermelhoAtual, cartaoVermelho, suspenso, joga, emblema, categoria, funcao FROM usuarios WHERE equipe = '$equipeVisitante' AND categoria = '$categoria' AND joga = '1'";
      $query_dadosJogadoresVisitante = $mysqli->query($sql_nomesJogadoresVisitante) or die($mysqli->error);

      $sql_dadosSumula = "SELECT * FROM sumula WHERE equipeCasa = '$equipeCasa' AND equipeFora = '$equipeVisitante'";
      $query_dadosSumula = $mysqli->query($sql_dadosSumula) or die($mysqli->error);
    }

   if($query_dadosSumula->num_rows > 0) {
    $dadosSumula = $query_dadosSumula->fetch_assoc();

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
  }

 $html = "<!DOCTYPE html>
  <html lang='pt-BR'>
  <head>
  <meta charset='UTF-8'>
      <meta http-equiv='X-UA-Compatible' content='IE=edge'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
 $html.= "<style type='text/css'>
 @import url('https://fonts.googleapis.com/css2?family=Truculenta:wght@100&display=swap');
 @import url('https://fonts.googleapis.com/css2?family=Bungee+Outline&display=swap');
 
 /*font-family: 'Bungee Outline', cursive;*/
 
 *,
 *:before,
 *:after{
     padding: 0;
     margin: 0;
     text-decoration: none;
     list-style: none;
     box-sizing: border-box;
 }
 
 html {
     font-size: 62.5%;
     max-width: 100vw;
     color: #FFF;
 }
 
 body {
     font-family: 'Truculenta', sans-serif;
     font-weight: 400;
     background-color: rgb(54, 54, 54);
     font-size: 1.8rem;
 }
 
 main {
     margin-top: 100px;
     display: flex;
     flex-direction: column;
     align-items: center;
     justify-content: center;
 }
 
 /* Works on Firefox */
 * {
     scrollbar-width: thin;
     scrollbar-color: rgb(0, 0, 0) rgb(158, 158, 158);
   }
   
   /* Works on Chrome, Edge, and Safari */
   *::-webkit-scrollbar {
     width: 8px;
     height: 8px;
   }
   
   *::-webkit-scrollbar-track {
     background: rgb(0, 0, 0);
   }
   
   *::-webkit-scrollbar-thumb {
     background-color: rgb(158, 158, 158);
     border-radius: 20px;
   }
 
 nav {
     height: 8vh;
     width: 100vw;
     position: fixed;
     top: 0%;
     z-index: 99;
     background: black;
 }
 
 nav label img.logo {
     width: 65px;
     line-height: 8vh;
     margin-top: 6px;
     margin-left: 1.6rem;
 }
 
 nav ul.opcoes_navegacao {
     float: right;
     margin-right: 2rem;
 }
 
 nav ul li {
     display: inline-block;
     line-height: 8vh;
     margin: 0 5px;
 }
 
 nav ul li a {
     color: #FFF;
     font-size: 2.2rem;
     font-weight: 700;
 }
 
 nav a {
     position: relative;
     text-decoration: none;
     color: rgb(255, 255, 255);
     font-size: 2rem;
 }
 
 nav a:after {
     position: absolute;
     background-color: green;
     height: 3px;
     width: 0;
     left: 0;
     bottom: -0.3rem;
     transition: 0.3s;
 }
 
 nav a:hover {
     color: rgb(189, 189, 189);
 }
 
 nav a:hover:after{
     width: 100%;
 }
 
 .checkbtn {
     font-size: 25px;
     color: #FFF;
     float: right;
     cursor: pointer;
     line-height: 8vh;
 }
 
 .alinhar-vertical {
     display: flex;
     align-items: center;
     margin-top: 8px;
 }
 
 .img-perfil {
     width: 32px;
     height: 32px;
     top: 4px;
     object-fit: cover;
     border: solid 2px;
     border-color: rgb(179, 179, 179);
     border-radius: 100%;
     margin-left: 0.6vw;
     margin-right: 16px;
 }
 
 #check {
     display: none;
 }
 
 .mais-opcoes {
     display: none;
 }
 
 div.funcao-sair li {
     display: block;
 }
 
 .menu ul {
     position: fixed;
     width: 30%;
     height: 100vh;
     background: rgb(82, 82, 82);
     top: 8vh;
     right: -100%;
     text-align: center;
     transition: all .5s;
 }
 
 nav .menu-opcoes ul li {
     display: block;
     margin: 50px 0;
     line-height: 10px;
 }
 
 #check:checked ~ ul {
     right: 0;
 }
 
 .menu-deslogado {
     display: none;
 }
 
 .checkbtn-deslogado {
     font-size: 2.5rem;
     color: #FFF;
     float: right;
     margin-right: 2vw;
     cursor: pointer;
     line-height: 8vh;
     display: none;
 }
 
 .div_sumula {
     font-family: Arial, Helvetica, sans-serif;
     width: 80%;
     color: #000;
     padding: 16px;
     margin: 8px;
     background-color: #FFF;
     border-radius: 8px;
 }
 
 div .parte_inicial {
     display: flex;
     flex-direction: column;
     align-items: center;
     justify-content: center;
 }
 
 .logo-sumula {
     width: 80px;
     margin-right: 18px;
 }
 
 .titulo_sumula {
   display: flex;
   align-items: center;
   justify-content: center;
 }
 
 .parte_inicial h1 {
   font-size: 2.8rem;
 }
 
 .div_equipes {
     width: 100%;
     padding: 8px;
     border: solid 1px #000;
     border-radius: 2px;
     display: flex;
     align-items: center;
     justify-content: center;
 }
 
 .div_equipes a {
     margin-left: 8px;
     margin-right: 8px;
 }
 
 .dados_equipeCasa {
     margin-top: 16px;
     padding: 8px;
     border: 1px solid #000;
     font-size: 1.2rem;
 }
 
 .infos {
     display: flex;
     flex-direction: row;
     align-items: center;
     justify-content: space-between;
     color: #FFF;
     background-color: #000;
 }
 
 .infos p {
     padding: 8px;
     border-left: 1px solid #FFF;
     border-right: 1px solid #FFF;
 }
 
 .testeTabela {
     display: flex;
     flex-direction: row;
     align-items: center;
     justify-content: space-between;
 }
 
 .nomeJogador {
     padding: 4px;
     border: 1px solid #000;
 }
 
 .cartaoAmarelo {
     padding: 4px;
     border: 1px solid #000;
 }
 
 .cartaoVermelho {
     padding: 4px;
     border: 1px solid #000;
 }
 
 .gols {
     padding: 4px;
     border: 1px solid #000;
 }
 
 .dados_equipeVisitante {
     margin-top: 16px;
     padding: 8px;
     border: 1px solid #000;
     font-size: 1.2rem;
     margin-top: 16px;
 }
 
 .row {
     max-width: 18rem;
     max-height: 9rem;
 }
 
 .assinatura {
     max-width: 18rem;
     max-height: 9rem;
 }
 
 
 .sumula-oficial { font-family: Calibri, Arial, Helvetica, sans-serif; font-size:1.3rem; background-color:white }
 a.comment-indicator:hover + div.comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em }
 a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em }
 div.comment { display:none }
 table { border-collapse:collapse; page-break-after:always }
 .gridlines td { border:1px dotted black }
 .gridlines th { border:1px dotted black }
 .b { text-align:center }
 .e { text-align:center }
 .f { text-align:right }
 .inlineStr { text-align:left }
 .n { text-align:right }
 .s { text-align:left }
 td.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style1 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style1 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style2 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style2 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style3 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style3 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style4 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style4 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style5 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style5 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style6 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style6 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style7 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style7 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style8 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style8 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style9 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style9 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style10 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style10 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style11 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style11 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style12 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style12 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style13 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000080; font-family:'Arial'; font-size:11rem; background-color:white }
 th.style13 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000080; font-family:'Arial'; font-size:11rem; background-color:white }
 td.style14 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style14 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style15 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style15 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style16 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style16 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style17 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style17 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style18 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style18 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style19 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style19 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style20 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style20 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style21 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style21 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style22 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style22 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style23 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style23 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style24 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style24 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style25 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style25 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style26 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style26 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style27 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style27 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style28 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style28 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style29 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style29 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style30 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style30 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style31 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style31 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style32 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style32 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style33 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style33 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style34 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style34 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style35 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style35 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style36 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style36 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style37 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style37 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style38 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style38 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style39 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style39 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style40 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style40 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style41 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style41 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style42 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style42 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style43 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style43 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style44 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style44 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style45 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style45 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style46 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style46 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style47 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style47 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style48 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style48 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style49 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style49 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style50 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style50 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style51 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style51 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style52 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style52 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style53 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style53 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style54 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style54 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style55 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style55 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style56 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style56 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style57 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style57 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style58 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#008000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style58 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#008000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style59 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#008000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style59 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#008000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style60 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style60 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style61 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style61 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style62 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style62 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style63 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style63 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style64 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style64 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style65 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style65 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style66 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style66 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style67 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style67 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style68 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style68 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style69 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style69 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style70 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style70 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style71 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#008000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style71 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#008000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style72 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#008000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style72 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#008000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style73 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style73 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style74 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style74 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style75 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style75 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style76 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style76 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style77 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style77 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style78 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style78 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style79 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style79 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style80 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style80 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style81 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style81 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style82 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style82 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style83 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style83 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style84 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#808000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style84 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#808000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style85 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style85 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style86 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style86 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style87 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; text-decoration:underline; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style87 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; text-decoration:underline; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style88 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style88 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style89 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style89 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style90 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#808000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style90 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#808000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style91 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#008000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style91 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#008000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style92 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style92 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style93 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style93 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style94 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#008000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style94 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#008000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style95 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#008000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style95 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#008000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style96 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style96 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style97 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style97 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style98 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style98 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style99 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style99 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style100 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style100 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style101 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style101 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style102 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style102 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style103 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style103 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style104 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style104 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style105 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style105 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style106 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style106 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style107 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style107 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style108 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style108 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style109 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style109 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style110 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style110 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style111 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style111 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style112 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style112 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style113 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style113 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style114 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style114 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style115 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style115 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style116 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style116 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style117 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#808000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style117 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#808000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style118 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style118 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style119 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style119 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style120 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style120 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style121 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style121 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style122 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style122 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style123 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style123 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style124 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style124 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style125 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style125 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style126 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style126 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style127 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style127 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style128 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style128 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style129 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style129 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style130 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style130 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000080; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style131 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style131 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style132 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style132 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style133 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style133 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style134 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style134 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style135 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style135 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style136 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style136 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style137 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:16pt; background-color:white }
 th.style137 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:16pt; background-color:white }
 td.style138 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style138 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style139 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style139 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style140 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style140 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style141 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style141 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style142 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style142 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style143 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style143 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style144 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style144 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style145 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style145 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style146 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style146 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style147 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style147 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style148 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style148 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style149 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style149 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style150 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style150 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style151 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style151 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style152 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style152 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style153 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style153 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style154 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style154 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style155 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style155 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style156 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style156 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style157 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style157 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style158 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style158 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style159 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style159 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style160 { vertical-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style160 { vertical-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style161 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style161 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style162 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style162 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style163 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style163 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style164 { vertical-align:middle; text-align:left; padding-left:4px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style164 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style165 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style165 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style166 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style166 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style167 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style167 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style168 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:1.1rem; background-color:white }
 th.style168 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:1.1rem; background-color:white }
 td.style169 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style169 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style170 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style170 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style171 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:1.1rem; background-color:white }
 th.style171 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:1.1rem; background-color:white }
 td.style172 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style172 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style173 { vertical-align:middle; text-align:center; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:1.2rem; background-color:white }
 th.style173 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:1.2rem; background-color:white }
 td.style174 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:1.2rem; background-color:white }
 th.style174 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:1.2rem; background-color:white }
 td.style175 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style175 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style176 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style176 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style177 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style177 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style178 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style178 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style179 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style179 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style180 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style180 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style181 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style181 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style182 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style182 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style183 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style183 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style184 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style184 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style185 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style185 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style186 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style186 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style187 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:16pt; background-color:white }
 th.style187 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:16pt; background-color:white }
 td.style188 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:16pt; background-color:white }
 th.style188 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:16pt; background-color:white }
 td.style189 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:16pt; background-color:white }
 th.style189 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:16pt; background-color:white }
 td.style190 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style190 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style191 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style191 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style192 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style192 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style193 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style193 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style194 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style194 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style195 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style195 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style196 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style196 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style197 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style197 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style198 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style198 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style199 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style199 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style200 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style200 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style201 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style201 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style202 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style202 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style203 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style203 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style204 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style204 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style205 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style205 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style206 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style206 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style207 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style207 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style208 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style208 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style209 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style209 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style210 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style210 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style211 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style211 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style212 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style212 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style213 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style213 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style214 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style214 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style215 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style215 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style216 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style216 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style217 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style217 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style218 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style218 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style219 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style219 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style220 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style220 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style221 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style221 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style222 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style222 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style223 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style223 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style224 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style224 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style225 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style225 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style226 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style226 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style227 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style227 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style228 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style228 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style229 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style229 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style230 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style230 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style231 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style231 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style232 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style232 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style233 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style233 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style234 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style234 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style235 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style235 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style236 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style236 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style237 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style237 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style238 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style238 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style239 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style239 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style240 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style240 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style241 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style241 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style242 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style242 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style243 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style243 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style244 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style244 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style245 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style245 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style246 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style246 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style247 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style247 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style248 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style248 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style249 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style249 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style250 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style250 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style251 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style251 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style252 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style252 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style253 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style253 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style254 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style254 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style255 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style255 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style256 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style256 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style257 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style257 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style258 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style258 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style259 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style259 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style260 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style260 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style261 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style261 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style262 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style262 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style263 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style263 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style264 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style264 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style265 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style265 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style266 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style266 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style267 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style267 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style268 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style268 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style269 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style269 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style270 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style270 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style271 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style271 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style272 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style272 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style273 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style273 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style274 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style274 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style275 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 th.style275 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1rem; background-color:white }
 td.style276 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style276 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style277 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 th.style277 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.3rem; background-color:white }
 td.style278 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style278 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style279 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style279 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#FF0000; font-family:'Arial'; font-size:1.1rem; background-color:white }
 td.style280 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 th.style280 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Arial'; font-size:1.1rem; background-color:white }
 table.sheet0 col.col0 { width:18.29999971rem }
 table.sheet0 col.col1 { width:13.5555554pt }
 table.sheet0 col.col2 { width:12.87777763pt }
 table.sheet0 col.col3 { width:14.91111094pt }
 table.sheet0 col.col4 { width:12.87777763pt }
 table.sheet0 col.col5 { width:12.87777763pt }
 table.sheet0 col.col6 { width:14.91111094pt }
 table.sheet0 col.col7 { width:12.87777763pt }
 table.sheet0 col.col8 { width:16.26666641rem }
 table.sheet0 col.col9 { width:15.58888871pt }
 table.sheet0 col.col10 { width:12.87777763pt }
 table.sheet0 col.col11 { width:15.58888871pt }
 table.sheet0 col.col12 { width:15.58888871pt }
 table.sheet0 col.col13 { width:13.5555554pt }
 table.sheet0 col.col14 { width:19.65555533pt }
 table.sheet0 col.col15 { width:14.91111094pt }
 table.sheet0 col.col16 { width:17.62222202pt }
 table.sheet0 col.col17 { width:16.94444425pt }
 table.sheet0 col.col18 { width:14.91111094pt }
 table.sheet0 col.col19 { width:11.52222201rem }
 table.sheet0 col.col20 { width:14.23333317pt }
 table.sheet0 col.col21 { width:15.58888871pt }
 table.sheet0 col.col22 { width:16.26666641rem }
 table.sheet0 col.col23 { width:10.16666655pt }
 table.sheet0 col.col24 { width:15.58888871pt }
 table.sheet0 col.col25 { width:12.87777763pt }
 table.sheet0 col.col26 { width:12.87777763pt }
 table.sheet0 col.col27 { width:14.91111094pt }
 table.sheet0 col.col28 { width:12.87777763pt }
 table.sheet0 col.col29 { width:16.26666641rem }
 table.sheet0 col.col30 { width:15.58888871pt }
 table.sheet0 col.col31 { width:12.87777763pt }
 table.sheet0 col.col32 { width:10.84444432pt }
 table.sheet0 col.col33 { width:12.87777763pt }
 table.sheet0 col.col34 { width:12.87777763pt }
 table.sheet0 tr { height:12.75pt }
 table.sheet0 tr.row0 { height:12.75pt; display:none; visibility:hidden }
 table.sheet0 tr.row1 { height:12.75pt; display:none; visibility:hidden }
 table.sheet0 tr.row2 { height:1.2rem }
 table.sheet0 tr.row3 { height:23.1pt }
 table.sheet0 tr.row4 { height:14.1pt }
 table.sheet0 tr.row5 { height:14.1pt }
 table.sheet0 tr.row6 { height:14.1pt }
 table.sheet0 tr.row7 { height:14.1pt }
 table.sheet0 tr.row8 { height:14.1pt }
 table.sheet0 tr.row9 { height:14.1pt }
 table.sheet0 tr.row10 { height:14.1pt }
 table.sheet0 tr.row11 { height:14.1pt }
 table.sheet0 tr.row12 { height:14.1pt }
 table.sheet0 tr.row13 { height:14.1pt }
 table.sheet0 tr.row14 { height:14.1pt }
 table.sheet0 tr.row15 { height:14.1pt }
 table.sheet0 tr.row16 { height:14.1pt }
 table.sheet0 tr.row17 { height:14.1pt }
 table.sheet0 tr.row18 { height:14.1pt }
 table.sheet0 tr.row19 { height:14.1pt }
 table.sheet0 tr.row20 { height:14.1pt }
 table.sheet0 tr.row21 { height:14.1pt }
 table.sheet0 tr.row22 { height:14.1pt }
 table.sheet0 tr.row23 { height:14.1pt }
 table.sheet0 tr.row24 { height:14.1pt }
 table.sheet0 tr.row25 { height:14.1pt }
 table.sheet0 tr.row26 { height:14.1pt }
 table.sheet0 tr.row27 { height:14.1pt }
 table.sheet0 tr.row28 { height:14.1pt }
 table.sheet0 tr.row29 { height:14.1pt }
 table.sheet0 tr.row30 { height:12.95pt }
 table.sheet0 tr.row31 { height:12.95pt }
 table.sheet0 tr.row32 { height:12.95pt }
 table.sheet0 tr.row33 { height:12.95pt }
 table.sheet0 tr.row34 { height:9.75pt }
 table.sheet0 tr.row35 { height:14.1pt }
 table.sheet0 tr.row36 { height:14.1pt }
 table.sheet0 tr.row37 { height:14.1pt }
 table.sheet0 tr.row38 { height:14.1pt }
 table.sheet0 tr.row39 { height:14.1pt }
 table.sheet0 tr.row40 { height:14.1pt }
 table.sheet0 tr.row41 { height:14.1pt }
 table.sheet0 tr.row42 { height:14.1pt }
 table.sheet0 tr.row43 { height:14.1pt }
 table.sheet0 tr.row44 { height:14.1pt }
 table.sheet0 tr.row45 { height:14.1pt }
 table.sheet0 tr.row46 { height:14.1pt }
 table.sheet0 tr.row47 { height:14.1pt }
 table.sheet0 tr.row48 { height:14.1pt }
 table.sheet0 tr.row49 { height:14.1pt }
 table.sheet0 tr.row50 { height:14.1pt }
 table.sheet0 tr.row51 { height:14.1pt }
 table.sheet0 tr.row52 { height:14.1pt }
 table.sheet0 tr.row53 { height:14.1pt }
 table.sheet0 tr.row54 { height:14.1pt }
 table.sheet0 tr.row55 { height:12.95pt }
 table.sheet0 tr.row56 { height:12.95pt }
 table.sheet0 tr.row57 { height:12.95pt }
 table.sheet0 tr.row58 { height:12.95pt }
 
 .numero_inputs {
     font-size: 1.1rem;
 }
 
 .nomeEquipes {
  vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:1.5rem; background-color:white
 }
 
 .nomeEquipes2 {
     vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:1.5rem; background-color:white
 }
 
 .container_anotacoes {
     display: flex;
     flex-direction: column;
     align-items: center;
     justify-content: center;
     margin-top: 25px;
 }
 
 .label_anotacoes {
     font-size: 2rem;
     font-weight: 700;
 }
 
 .button-salvarSumula {
     margin-top: 1.6rem;
     color: #FFF;
     padding: 1rem;
     background-color: rgb(4, 109, 0);
     border: 1px solid white;
     border-radius: 4px;
 } 
 
 .button-salvarSumula:hover {
     background-color: rgb(0, 141, 0);
 }
 
 @media (max-width: 858px) {
     html {
         font-size: 52%;
     }
     
     .opcoes_navegacao {
         display: none;
     }
 
     .menu-deslogado ul {
         display: block;
         position: fixed;
         width: 30%;
         height: 100vh;
         background: rgb(82, 82, 82);
         top: 8vh;
         right: -100%;
         text-align: center;
         transition: all .5s;
     }
 
     .checkbtn-deslogado {
         display: block;
         margin-right: 32px;
     }
     
     .menu ul {
         position: fixed;
         width: 30%;
         height: 100vh;
         background: rgb(82, 82, 82);
         top: 8vh;
         right: -100%;
         text-align: center;
         transition: all .5s;
     }
     
     .mais-opcoes {
         display: block;
     }
 
     nav ul li {
         display: block;
         margin: 3.5rem 0;
         line-height: 1.1rem;
     }
 
     #check:checked ~ ul {
         right: 0;
     }
 }
 
 @media (max-width: 710px) {
     html {
         font-size: 45%;
     }
 
     .sumula-oficial {
         font-size: 0.6rem;
     }
 }
 
 @media (max-width: 575px) {
     html {
         font-size: 40%;
     }
 }
 
 @media (max-width: 470px) {
     html {
         font-size: 50%;
     }
 
     .menu ul {
         width: 100%;
         height: 100vh;
     }
 
     .menu-deslogado ul {
         width: 100%;
         height: 100vh;
     }
 
     .checkbtn-deslogado {
         margin-right: 32px;
     }
 
 }
 
 @media (max-width: 400px) {
 
 }
 
 @media (max-width: 320px) {
 
 }
 
 @media (max-width: 280px) {
     html {
         font-size: 40%;
     }
 }
          </style>";
 $html.= "<link rel='icon' href='https://cdn.discordapp.com/attachments/750028167225540648/963110597187235870/icone_appcjagforeground.png'>
      <title>CitaJAG - Súmula</title>
  </head>
  <body>
      <main>
        <div class='div_sumula' id='div_sumula'>           
              <form action='' method='POST'>
                    <div class='parte_inicial'>
                      <div class='titulo_sumula'>
                          <img class='logo-sumula' src='https://cdn.discordapp.com/attachments/750028167225540648/1088666411783700541/logocitajagtelaini.png'>
                          <h1>Campeonato Citadino de Jaguarão</h1>
                      </div>
  
                      <style>
  @page { margin-left: 0in; margin-right: 0in; margin-top: 0in; margin-bottom: 0in; }
  body { margin-left: 0in; margin-right: 0in; margin-top: 0in; margin-bottom: 0in; }
  </style>
  
  <div class='sumula-oficial'>
      <table border='0' cellpadding='0' cellspacing='0' id='sheet0' class='sheet0 gridlines'>
          <col class='col0'>
          <col class='col1'>
          <col class='col2'>
          <col class='col3'>
          <col class='col4'>
          <col class='col5'>
          <col class='col6'>
          <col class='col7'>
          <col class='col8'>
          <col class='col9'>
          <col class='col10'>
          <col class='col11'>
          <col class='col12'>
          <col class='col13'>
          <col class='col14'>
          <col class='col15'>
          <col class='col16'>
          <col class='col17'>
          <col class='col18'>
          <col class='col19'>
          <col class='col20'>
          <col class='col21'>
          <col class='col22'>
          <col class='col23'>
          <col class='col24'>
          <col class='col25'>
          <col class='col26'>
          <col class='col27'>
          <col class='col28'>
          <col class='col29'>
          <col class='col30'>
          <col class='col31'>
          <col class='col32'>
          <col class='col33'>
          <col class='col34'>
          <col class='col35'>
          <tbody>
            <tr class='row1'>
              <td class='column0 style1 null'></td>
              <td class='column1 style167 null'></td>
              <td class='column2 style1 null'></td>
              <td class='column3 style1 null'></td>
              <td class='column4 style1 null'></td>
              <td class='column5 style1 null'></td>
              <td class='column6 style1 null'></td>
              <td class='column7 style1 null'></td>
              <td class='column8 style1 null'></td>
              <td class='column9 style1 null'></td>
              <td class='column10 style1 null'></td>
              <td class='column11 style1 null'></td>
              <td class='column12 style1 null'></td>
              <td class='column13 style1 null'></td>
              <td class='column14 style1 null'></td>
              <td class='column15 style1 null'></td>
              <td class='column16 style1 null'></td>
              <td class='column17 style1 null'></td>
              <td class='column18 style1 null'></td>
              <td class='column19 style1 null'></td>
              <td class='column20 style1 null'></td>
              <td class='column21 style1 null'></td>
              <td class='column22 style1 null'></td>
              <td class='column23 style1 null'></td>
              <td class='column24 style1 null'></td>
              <td class='column25 style1 null'></td>
              <td class='column26 style1 null'></td>
              <td class='column27 style1 null'></td>
              <td class='column28 style1 null'></td>
              <td class='column29 style1 null'></td>
              <td class='column30 style1 null'></td>
              <td class='column31 style1 null'></td>
              <td class='column32 style1 null'></td>
            </tr>
            <tr class='row3'>
              <td class='column0 style187 s style189' colspan='35'>SÚMULA DE JOGO</td>
            </tr>";

     $html.= "<tr class='row4'>
              <td class='column0 nomeEquipes2' colspan='9'><a class='equipeCasa'>" . $equipeCasa . "</a></td>
              <td class='column11 style268 s style268' colspan='6'>
                             <a class='golsCasa'>" . $golsCasa . "</a>
                             <a>X</a>
                             <a class='golsFora'>" . $golsFora . "</a>
                             </td>
              <td class='column15 nomeEquipes2' colspan='11'><a class='equipeVisitante'>" . $equipeVisitante . "</a></td>
              <td class='column26 style216 s style217' colspan='9'>RESULTADO</td>
            </tr>
            <tr class='row5'>
              <td class='column0 style272 s style273' colspan='10'>LOCAL: Dario de Almeida Neves</td>
              <td class='column13 style273 s style273' colspan='9'>DATA: <a id='dataPartida' class='cadastro_inputs'>" . $dataPartida . "</a></td>
              <td class='column19 style274 s style274' colspan='7'>HORÁRIO DE ÍNICIO</td>
              <td class='column26 style275 s style275' colspan='4'>1º PERÍODO</td>
              <td class='column30 style246 s style247' colspan='5'><a class='numero_inputs' id='placar1Periodo1'>" . $placar1Periodo1 . "</a>x<a id='placar1Periodo2' class='numero_inputs'>" . $placar1Periodo2 . "</a></td>
            </tr>
            <tr class='row6'>
              <td class='column0 style262 s style263' colspan='6'>1º ÁRBITRO</td>
              <td class='column6 style256 null style256' colspan='5'><a class='numero_inputs' id='nome1Arbitro'>" . $nome1Arbitro . "</a></td>
              <td class='column14 style227 null style227' colspan='8'>
                          <div class='container4'>
                            <img class='assinaturas' src='https://citajag.com.br/assinaturas/" . $ass1Arb . "' />  
                          </div>
              </td>
              <td class='column19 style259 s style259' colspan='4'>1º PERÍODO</td>
              <td class='column23 style251 s style251' colspan='3'><a class='numero_inputs' id='horarioInicio1Periodo1'>" . $horarioInicio1Periodo1 . "</a>:<a id='horarioInicio1Periodo2' class='numero_inputs'>" . $horarioInicio1Periodo2 . "</a></td>
              <td class='column26 style259 s style259' colspan='4'>2º PERÍODO</td>
              <td class='column30 style246 s style247' colspan='5'><a class='numero_inputs' id='placar2Periodo1'>" . $placar2Periodo1 . "x<a id='placar2Periodo2' class='numero_inputs'>" . $placar2Periodo2 . "</a></td>
            </tr>
            <tr class='row7'>
              <td class='column0 style254 s style255' colspan='6'>2º ÁRBITRO</td>
              <td class='column6 style256 null style256' colspan='5'><a class='numero_inputs' id='nome2Arbitro'>" . $nome2Arbitro . "</a></td>
              <td class='column14 style257 null style257' colspan='8'>
                          <div class='container4'>
                            <img class='assinaturas' src='https://citajag.com.br/assinaturas/" . $ass2Arb . "' />
                          </div>
                  </td>
              <td class='column19 style259 s style259' colspan='4'>2º PERÍODO</td>
              <td class='column23 style251 s style251' colspan='3'><a class='numero_inputs' id='horarioInicio2Periodo1'>" . $horarioInicio2Periodo1 . "</a>:<a id='horarioInicio2Periodo2' class='numero_inputs'>" . $horarioInicio2Periodo2 . "</a></td>
              <td class='column26 style258 s style258' colspan='4'>PRORROGAÇÃO</td>
              <td class='column30 style246 s style247' colspan='5'><a class='numero_inputs' id='placarProrrogacao1'>" . $placarProrrogacao1 . "</a>x<a id='placarProrrogacao2' class='numero_inputs'>" . $placarProrrogacao2 . "</a></td>
            </tr>
            <tr class='row8'>
              <td class='column0 style254 s style255' colspan='6'>ANOTADOR</td>
              <td class='column6 style256 null style256' colspan='5'><a class='numero_inputs' id='nomeAnotador'>" . $nomeAnotador . "</a></td>
              <td class='column14 style257 null style257' colspan='8'>
                          <div class='container4'>
                            <img class='assinaturas' src='https://citajag.com.br/assinaturas/" . $assAnotador . "' />
                          </div>
              </td>
              <td class='column19 style258 s style258' colspan='4'>PRORROGAÇÃO</td>
              <td class='column23 style251 s style251' colspan='3'><a class='numero_inputs' id='horarioInicioProrrogacao1'>" . $horarioInicioProrrogacao1 . "</a>:<a id='horarioInicioProrrogacao2' class='numero_inputs'>" . $horarioInicioProrrogacao2 . "</a></td>
              <td class='column26 style259 s style259' colspan='4'>PENALTIS</td>
              <td class='column30 style246 s style247' colspan='5'><a class='numero_inputs' id='placarPenaltis1'>" . $placarPenaltis1 . "</a>x<a id='placarPenaltis2' class='numero_inputs'>" . $placarPenaltis2 . "</a></td>
            </tr>
            <tr class='row9'>
              <td class='column0 style248 s style249' colspan='6'>CRONOMETRISTA</td>
              <td class='column6 style230 null style230' colspan='5'><a class='numero_inputs' id='nomeCronometrista'>" . $nomeCronometrista . "</a></td>
              <td class='column14 style231 null style231' colspan='8'>
                <div class='container4'>
                  <img class='assinaturas' src='https://citajag.com.br/assinaturas/" . $assCronometrista . "' />
                </div>
              </td>
              <td class='column19 style250 s style250' colspan='4'>FINAL</td>
              <td class='column23 style251 s style251' colspan='3'><a class='numero_inputs' id='horarioFinal1'>" . $horarioFinal1 . "</a>:<a id='horarioFinal2' class='numero_inputs'>" . $horarioFinal2 . "</a></td>
              <td class='column26 style250 s style250' colspan='4'>FINAL</td>
              <td class='column30 style246 s style247' colspan='5'><a class='numero_inputs' id='placarFinal1'>" . $placarFinal1 . "</a>x<a id='placarFinal2' class='numero_inputs'>" . $placarFinal2 . "</a></td>
            </tr>
            <tr class='row10'>
              <td class='column0 nomeEquipes' colspan='19'>EQUIPE A: <a>" . $equipeCasa . "</a> </td>
              <td class='column19 style216 s style217' colspan='16'>FALTAS ACUMULATIVAS</td>
            </tr>
            <tr class='row11'>
              <td class='column0 style166 s'>Nº</td>
              <td class='column1 style235 s style235' colspan='14'>ATLETAS</td>
              <td class='column15 style245 s style245' colspan='2'>C.A.</td>
              <td class='column17 style216 s style216' colspan='2'>C.V.</td>
              <td class='column19 style236 s style236' colspan='4'>1º PERÍODO</td>";
             if($faltasCasa1Periodo >= '1') {
              $html.= "<td class='column23 style237 null style237' colspan='2'><input type='checkbox' id='faltaCasa1Periodo1' name='falta1' checked value='1'></td>";
             } else {
              $html.= "<td class='column23 style237 null style237' colspan='2'><input type='checkbox' id='faltaCasa1Periodo1' name='falta1' value='1'></td>";
             }
             if($faltasCasa1Periodo >= '2') {
              $html.= "<td class='column25 style226 null style226' colspan='2'><input type='checkbox' id='faltaCasa1Periodo2' name='falta2' checked value='2'></td>";
             } else {
              $html.= "<td class='column25 style226 null style226' colspan='2'><input type='checkbox' id='faltaCasa1Periodo2' name='falta2' value='2'></td>";
             }
             if($faltasCasa1Periodo >= '3') {
              $html.= "<td class='column27 style226 null style226' colspan='2'><input type='checkbox' id='faltaCasa1Periodo3' name='falta3' checked value='3'></td>";
             } else {
              $html.= "<td class='column27 style226 null style226' colspan='2'><input type='checkbox' id='faltaCasa1Periodo3' name='falta3' value='3'></td>";
             }
             if($faltasCasa1Periodo >= '4') {
              $html.= "<td class='column29 style226 null style226' colspan='2'><input type='checkbox' id='faltaCasa1Periodo4' name='falta4' checked value='4'></td>";
             } else {
              $html.= "<td class='column29 style226 null style226' colspan='2'><input type='checkbox' id='faltaCasa1Periodo4' name='falta4' value='4'></td>";
             }
             if($faltasCasa1Periodo == '5') {
              $html.= "<td class='column31 style227 null style228' colspan='2'><input type='checkbox' id='faltaCasa1Periodo5' name='falta5' checked value='5'></td>";
             } else {
              $html.= "<td class='column31 style227 null style228' colspan='2'><input type='checkbox' id='faltaCasa1Periodo5' name='falta5' value='5'></td>";
             }
           $html.= "</tr>";
  
                 if($query_dadosJogadoresCasa->num_rows > 0) { 
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
  
                      if($funcao == 'atleta') {
                      $aux = $aux + 1;
                      $amarelo = 'amareloCasa' . $aux;
                      $amareloMinCasa = 'minAmareloCasa' . $aux;
                      $amareloSecCasa = 'secAmareloCasa' . $aux;
                      $vermelho = 'vermelhoCasa' . $aux;
                      $vermelhoMinCasa = 'minVermelhoCasa' . $aux;
                      $vermelhoSecCasa = 'secVermelhoCasa' . $aux;
                  
                    $html.=  "<tr class='row12'>
                          <td class='column0 style173 null'><p>" . $numeroCamisa . "</p></td>
                          <td class='column2 style164 null' colspan='14'><p>" . $nomeJogador . "</p></td>
                          <td class='column15 style211 s style212' colspan='2'>
                            <a>" . $$amarelo . "</a>
                                <a class='numero_inputs'>" . $$amareloMinCasa . "</a>:<a class='numero_inputs' id='secAmareloCasa'>" . $$amareloSecCasa . "</a>
                          </td>
                          <td class='column17 style213 s style212' colspan='2'>
                                <a>" . $$vermelho . "</a>
                            <a class='numero_inputs' id='minVermelhoCasa'>" . $$vermelhoMinCasa . "</a>:<a class='numero_inputs' id='secVermelhoCasa'>" . $$vermelhoSecCasa . "</a>
                          </td>";
                            if($contador == 1) {
                            $contador = $contador + 1;
                            
                            $html .=  "<td class='column19 style240 s style240' colspan='4'>2º PERÍODO</td>";
                            if($faltasCasa2Periodo >= '1') {
                              $html.= "<td class='column23 style237 null style237' colspan='2'><input type='checkbox' id='faltaCasa1Periodo1' name='falta1' checked value='1'></td>";
                            } else {
                              $html.= "<td class='column23 style237 null style237' colspan='2'><input type='checkbox' id='faltaCasa1Periodo1' name='falta1' value='1'></td>";
                            }
                            if($faltasCasa2Periodo >= '2') {
                              $html.= "<td class='column25 style226 null style226' colspan='2'><input type='checkbox' id='faltaCasa1Periodo2' name='falta2' checked value='2'></td>";
                            } else {
                              $html.= "<td class='column25 style226 null style226' colspan='2'><input type='checkbox' id='faltaCasa1Periodo2' name='falta2' value='2'></td>";
                            }
                            if($faltasCasa2Periodo >= '3') {
                              $html.= "<td class='column27 style226 null style226' colspan='2'><input type='checkbox' id='faltaCasa1Periodo3' name='falta3' checked value='3'></td>";
                            } else {
                              $html.= "<td class='column27 style226 null style226' colspan='2'><input type='checkbox' id='faltaCasa1Periodo3' name='falta3' value='3'></td>";
                            }
                            if($faltasCasa2Periodo >= '4') {
                              $html.= "<td class='column29 style226 null style226' colspan='2'><input type='checkbox' id='faltaCasa1Periodo4' name='falta4' checked value='4'></td>";
                            } else {
                              $html.= "<td class='column29 style226 null style226' colspan='2'><input type='checkbox' id='faltaCasa1Periodo4' name='falta4' value='4'></td>";
                            }
                            if($faltasCasa2Periodo == '5') {
                              $html.= "<td class='column31 style227 null style228' colspan='2'><input type='checkbox' id='faltaCasa1Periodo5' name='falta5' checked value='5'></td>";
                            } else {
                              $html.= "<td class='column31 style227 null style228' colspan='2'><input type='checkbox' id='faltaCasa1Periodo5' name='falta5' value='5'></td>";
                            }
                             } else if($contador == 2) {
                              $contador = $contador + 1;

                              $html.= "<td class='column32 style135 null' colspan='16'></td>";
                              } else if($contador == 3) {
                              $contador = $contador + 1;
                              $html.= "<td class='column32 style135 null' colspan='16'></td>";
                              } else if($contador == 4) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style238 s style239' colspan='16'>ASSINATURAS</td>";
                              } else if($contador == 5) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style218 s style219' colspan='16'>TÉCNICO</td>";
                              } else if($contador == 6) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style142 null' colspan='16'></td>";
                              } else if($contador == 7) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style142 null' colspan='16'>
                                        <img class='assinaturas' src='https://citajag.com.br/assinaturas/" . $assTecCasa . "' />
                                       </td>";
                              } else if($contador == 8) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style142 null' colspan='16'></td>";
                              } else if($contador == 9) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style218 s style219' colspan='16'>CAPITÃO</td>";
                              } else if($contador == 10) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style142 null' colspan='16'></td>";
                              } else if($contador == 11) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style142 null' colspan='16'>
                                  <div class='container1'>
                                    <img class='assinaturas' src='https://citajag.com.br/assinaturas/" . $assCapCasa . "' />
                                  </div>
                                </td>";
                              } else if($contador == 12) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style8 null' colspan='16'></td>";
                              } else if($contador == 13) {
                              $contador = $contador + 1;
                              $html.= "<td class='column32 style141 null' colspan='16'></td>";
                              } else if($contador == 14) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style220 s style221' colspan='16'>PEDIDOS DE TEMPO</td>";
                              } else if($contador == 15) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style223 s style223' colspan='7'>1º PERÍODO</td>
                                       <td class='column26 style224 s style225' colspan='9'>2º PERÍODO</td>";
                              }
                              $html.= "</tr>";
                         } } }

                        // <!-- Lógica de quando não possui pelo menos 15 inscritos no time -->
                        if($linhas < 15) {
                         if($contador < 6) {
                          $html.= "<tr class='row12'>";
                              if($contador == 5 && $contador < 6) { 
                              $contador = $contador + 1; 
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                <td class='column15 style211 s style212' colspan='2'>
                                        --:--
                                </td>
                                <td class='column17 style213 s style212' colspan='2'>
                                    --:--
                                </td>
                                <td class='column19 style218 s style219' colspan='16'>TÉCNICO</td>";
                              }
                              $html.= "</tr>";
                              }
                          if($contador < 7) {
                            $html.= "<tr class='row12'>";
                            if($contador == 6 && $contador < 7) { 
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                      <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                      <td class='column15 style211 s style212' colspan='2'>
                                            --:--
                                      </td>
                                      <td class='column17 style213 s style212' colspan='2'>
                                        --:--
                                      </td>
                                      <td class='column19 style142 null' colspan='16'></td>";
                               } 
                              $html.= "</tr>";
                               }
                              if($contador < 8) {
                              $html.= "<tr class='row12'>";
                              if($contador == 7 && $contador < 8) { 
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                      <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                      <td class='column15 style211 s style212' colspan='2'>
                                            --:--
                                      </td>
                                      <td class='column17 style213 s style212' colspan='2'>
                                        --:--
                                      </td>
                                      <td class='column19 style142 null' colspan='16'>";           
                                      $html.= "<div class='container1'>
                                                  <img class='assinaturas' src='https://citajag.com.br/assinaturas/" . $assTecCasa . "' />
                                               </div>";
                                  $html.= "</td>";
                              }
                              $html.= "</tr>";
                              }
                            if($contador < 9) {
                            $html.= "<tr class='row12'>";
                            if($contador == 8 && $contador < 9) { 
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                      <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                      <td class='column15 style211 s style212' colspan='2'>
                                            --:--
                                      </td>
                                      <td class='column17 style213 s style212' colspan='2'>
                                        --:--
                                      </td>
                                      <td class='column19 style142 null' colspan='16'></td>";
                              }
                              $html.= "</tr>";
                              }
                            if($contador < 10) {
                              $html.= "<tr class='row12'>";
                            if($contador == 9 && $contador < 10) { 
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                       <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                       <td class='column15 style211 s style212' colspan='2'>
                                            --:--
                                       </td>
                                       <td class='column17 style213 s style212' colspan='2'>
                                        --:--
                                       </td>
                                       <td class='column19 style218 s style219' colspan='16'>CAPITÃO</td>";
                              }
                              $html.= "</tr>";
                              }
                              if($contador < 11) {
                              $html.= "<tr class='row12'>";
                              if($contador == 10 && $contador < 11) { 
                              $contador = $contador + 1;
                              $html.=   "<td class='column0 style173 null'><p>0</p></td>
                                        <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                        <td class='column15 style211 s style212' colspan='2'>
                                              --:--
                                        </td>
                                        <td class='column17 style213 s style212' colspan='2'>
                                          --:--
                                        </td>
                                        <td class='column19 style142 null' colspan='16'></td>";
                              }
                              $html.= "</tr>";
                              }
                              if($contador < 12) {
                              $html.= "<tr class='row12'>";
                              if($contador == 11 && $contador < 12) { 
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                      <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                      <td class='column15 style211 s style212' colspan='2'>
                                            --:--
                                      </td>
                                      <td class='column17 style213 s style212' colspan='2'>
                                        --:--
                                      </td>
                                      <td class='column19 style142 null' colspan='16'>";
                                
                                  $html.= "<div class='container1'>
                                            <img class='assinaturas' src='https://citajag.com.br/assinaturas/" . $assCapCasa . "' />
                                          </div>";
                                  $html.= "</td>";
                              }
                              $html.= "</tr>";
                              }
                              if($contador < 13) {
                              $html.= "<tr class='row12'>";
                              if($contador == 12 && $contador < 13) { 
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                      <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                      <td class='column15 style211 s style212' colspan='2'>
                                            --:--
                                      </td>
                                      <td class='column17 style213 s style212' colspan='2'>
                                        --:--
                                      </td>
                                      <td class='column19 style8 null' colspan='16'></td>";
                                  }
                                  $html.= "</tr>";
                                }
                              if($contador < 14) {
                                $html.= "<tr class='row12'>";
                              if($contador == 13  && $contador < 14) { 
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                       <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                       <td class='column15 style211 s style212' colspan='2'>
                                            --:--
                                       </td>
                                       <td class='column17 style213 s style212' colspan='2'>
                                        --:--
                                       </td>
                                       <td class='column32 style141 null' colspan='16'></td>";
                                }
                                $html.= "</tr>";
                              }
                              if($contador < 15) {
                                $html.= "<tr class='row12'>";
                              if($contador == 14 && $contador < 15) {
                              $contador = $contador + 1;
                              $html.=  "<td class='column0 style173 null'><p>0</p></td>
                                        <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                        <td class='column15 style211 s style212' colspan='2'>
                                              --:--
                                        </td>
                                        <td class='column17 style213 s style212' colspan='2'>
                                          --:--
                                        </td>
                                        <td class='column19 style220 s style221' colspan='16'>PEDIDOS DE TEMPO</td>";
                              }
                              $html.= "</tr>";
                              }
                            if($contador == 15) {
                              $html.= "<tr class='row12'>";
                            if($contador == 15) {
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                       <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                       <td class='column15 style211 s style212' colspan='2'>
                                            --:--
                                       </td>
                                       <td class='column17 style213 s style212' colspan='2'>
                                        --:--
                                       </td>
                                       <td class='column19 style223 s style223' colspan='7'>1º PERÍODO</td>
                                       <td class='column26 style224 s style225' colspan='9'>2º PERÍODO</td>";
                               } 
                               $html.= "</tr>";
                              }
                            }

                $sql_nomesTecnicosCasa = "SELECT docIdentidade, fotoPerfil, nomeUsuario, cartaoVermelhoAtual, cartaoVermelho, suspenso, emblema, funcao FROM usuarios WHERE equipe = '$equipeCasa' AND categoria = '$categoria'";
                $query_dadosTecnicosCasa = $mysqli->query($sql_nomesTecnicosCasa) or die($mysqli->error);
                if($query_dadosTecnicosCasa->num_rows > 0) {
                $contador = 1;
                $aux = 0;
                while($dadoJogador = $query_dadosTecnicosCasa->fetch_assoc()) { 
                    $docIdentidade = $dadoJogador['docIdentidade'];
                    $fotoPerfil = $dadoJogador['fotoPerfil'];
                    $nomeJogador = $dadoJogador['nomeUsuario'];
                    $cartaoVermelhoAtual = $dadoJogador['cartaoVermelhoAtual'];
                    $cartaoVermelho = $dadoJogador['cartaoVermelho'];
                    $suspenso = $dadoJogador['suspenso'];
                    $emblema = $dadoJogador['emblema'];
                    $funcao = $dadoJogador['funcao'];
                    
                    if($funcao == 'comissaoTecnica') {
                    $aux = $aux + 1;

                  if($contador == 1) {
                  $contador = $contador + 1;

                  $html.= "<tr class='row27'>
                  <td class='column0 style157 s'>TEC</td>
                  <td class='column2 style160 null' colspan='13'><p>" . $nomeJogador . "</p></td>
                  <td class='column3 style163 null' colspan='1'></td>
                  <td class='column15 style153 null'></td>
                  <td class='column16 style152 null'></td>
                  <td class='column17 style206 s style205' colspan='2'>
                  <a>" . $vermelhoTreinadorCasa . "</a>
                  <a class='numero_inputs' id='minVerTreinadorCasa'>" . $minVerTreinadorCasa . "</a>:<a id='secVerTreinadorCasa' class='numero_inputs'>" . $secVerTreinadorCasa . "</a>
                  </td>
                  <td class='column19 style209 s style209' colspan='7'><a class='numero_inputs' id='minTempoCasa1Periodo'>" . $minTempoCasa1Periodo . "</a>:<a id='secTempoCasa1Periodo' class='numero_inputs'>" . $secTempoCasa1Periodo . "</a></td>
                  <td class='column26 style214 s style215' colspan='9'><a class='numero_inputs' id='minTempoCasa2Periodo'>" . $minTempoCasa2Periodo . "</a>:<a id='secTempoCasa2Periodo' class='numero_inputs'>" . $secTempoCasa2Periodo . "</a></td>";
                  } else if($contador == 2) {
                    $contador = $contador + 1;           
                  $html.=  "<td class='column0 style157 s'>AUX</td>
                  <td class='column2 style160 null' colspan='13'><p>" . $nomeJogador . "</p></td>
                  <td class='column3 style163 null' colspan='1'></td>
                  <td class='column15 style153 null'></td>
                  <td class='column16 style152 null'></td>
                  <td class='column17 style206 s style205' colspan='2'>
                  <a>" . $vermelhoAuxiliarCasa . "</a>
                  <a class='numero_inputs' id='minVerAuxiliarCasa'>" . $minVerAuxiliarCasa . "</a>:<a id='secVerAuxiliarCasa' class='numero_inputs'>" . $secVerAuxiliarCasa . "</a>
                </td>
                <td class='column19 style143 null' colspan='19'></td>";
                  } else if($contador == 3) {
                    $contador = $contador + 1;
                  $html.= "<td class='column0 style157 s'>MAS</td>
                  <td class='column2 style160 null' colspan='13'><p>" . $nomeJogador . "</p></td>
                  <td class='column3 style163 null' colspan='1'></td>
                  <td class='column15 style153 null'></td>
                  <td class='column16 style152 null'></td>
                  <td class='column17 style207 s style208' colspan='2'>
                  <a>" . $vermelhoMassagistaCasa . "</a>
                  <a class='numero_inputs' id='minVerMassagistaCasa'>" . $minVerMassagistaCasa . "</a>:<a id='secVerMassagistaCasa' class='numero_inputs'>" . $secVerMassagistaCasa . "</a>
                </td>
                <td class='column19 style143 null' colspan='19'></td>";
                }
                $html.= "</tr>";
              } } }
            
              $html.= "<tr class='row30'>
                       <td class='column0 style177 s style196' colspan='3'>01|
                        <a>" . $golsCasa1 . "</a>
                       </td>";
   
              $html.= "<td class='column3 style197 s style196' colspan='3'>02|
                        <a>" . $golsCasa2 . "</a>
                       </td>";

              $html.= "<td class='column6 style197 s style196' colspan='3'>03|
                        <a>" . $golsCasa3 . "</a>
                       </td>";
              
              $html.= "<td class='column9 style197 s style196' colspan='3'>04|
                        <a>" . $golsCasa4 . "</a>
                       </td>";
      
              $html.= "<td class='column12 style197 s style196' colspan='3'>05|
                        <a>" . $golsCasa5 . "</a>
                       </td>";

              $html.= "<td class='column15 style180 s style179' colspan='3'>06|
                        <a>" . $golsCasa6 . "</a>
                       </td>";

              $html.= "<td class='column18 style180 s style179' colspan='3'>07|
                        <a>" . $golsCasa7 . "</a>
                       </td>";
              
              $html.= "<td class='column21 style180 s style179' colspan='3'>08|
                        <a>" . $golsCasa8 . "</a>
                       </td>";

              $html.= "<td class='column24 style180 s style179' colspan='3'>09|
                        <a>" . $golsCasa9 . "</a>
                        </td>";
              
              $html.= "<td class='column27 style180 s style179' colspan='3'>10|
                        <a>" . $golsCasa10 . "</a>
                      </td>";
              
              $html.= "<td class='column30 style180 s style190' colspan='5'>11|
                        <a>" . $golsCasa11 . "</a>
                      </td>
            </tr>";
  
            $html.= "<tr class='row31'>
              <td class='column0 style181 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa1'>" . $minGolsCasa1  . "</a>:<a id='secGolsCasa1' class='numero_inputs'>" . $secGolsCasa1 . "</a></td>
              <td class='column3 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa2'>" . $minGolsCasa2  . "</a>:<a id='secGolsCasa2' class='numero_inputs'>" . $secGolsCasa2 . "</a></td>
              <td class='column6 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa3'>" . $minGolsCasa3  . "</a>:<a id='secGolsCasa3' class='numero_inputs'>" . $secGolsCasa3 . "</a></td>
              <td class='column9 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa4'>" . $minGolsCasa4  . "</a>:<a id='secGolsCasa4' class='numero_inputs'>" . $secGolsCasa4 . "</a></td>
              <td class='column12 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa5'>" . $minGolsCasa5  . "</a>:<a id='secGolsCasa5' class='numero_inputs'>" . $secGolsCasa5 . "</a></td>
              <td class='column15 style201 s style203' colspan='3'><a class='numero_inputs' id='minGolsCasa6'>" . $minGolsCasa6  . "</a>:<a id='secGolsCasa6' class='numero_inputs'>" . $secGolsCasa6 . "</a></td>
              <td class='column18 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa7'>" . $minGolsCasa7  . "</a>:<a id='secGolsCasa7' class='numero_inputs'>" . $secGolsCasa7 . "</a></td>
              <td class='column21 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa8'>" . $minGolsCasa8  . "</a>:<a id='secGolsCasa8' class='numero_inputs'>" . $secGolsCasa8 . "</a></td>
              <td class='column24 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa9'>" . $minGolsCasa9  . "</a>:<a id='secGolsCasa9' class='numero_inputs'>" . $secGolsCasa9 . "</a></td>
              <td class='column27 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa10'>" . $minGolsCasa10 . "</a>:<a id='secGolsCasa10' class='numero_inputs'>" . $secGolsCasa10 . "</a></td>
              <td class='column30 style184 s style198' colspan='5'><a class='numero_inputs' id='minGolsCasa11'>" . $minGolsCasa11 . "</a>:<a id='secGolsCasa11' class='numero_inputs'>" . $secGolsCasa11 . "</a></td>
            </tr>";

            $html.= "<tr class='row32'>
                  <td class='column0 style177 s style196' colspan='3'>12|
                    <a>" . $golsCasa12 . "</a>
                  </td>
              
                  <td class='column3 style197 s style196' colspan='3'>13|
                    <a>" . $golsCasa13 . "</a>
                  </td>
             
                  <td class='column6 style197 s style196' colspan='3'>14|
                    <a>" . $golsCasa14 . "</a>
                  </td>
              
                  <td class='column9 style197 s style196' colspan='3'>15|
                    <a>" . $golsCasa15 . "</a>
                  </td>
              
                  <td class='column12 style197 s style196' colspan='3'>16|
                    <a>" . $golsCasa16 . "</a>
                  </td>
              
                  <td class='column15 style180 s style179' colspan='3'>17|
                    <a>" . $golsCasa17 . "</a>
                  </td>
              
                  <td class='column18 style180 s style179' colspan='3'>18|
                    <a>" . $golsCasa18 . "</a>
                  </td>
              
                  <td class='column21 style180 s style179' colspan='3'>19|
                    <a>" . $golsCasa19 . "</a>
                  </td>
              
                  <td class='column24 style180 s style179' colspan='3'>20|
                    <a>" . $golsCasa20 . "</a>
                  </td>
              
                  <td class='column27 style180 s style179' colspan='3'>21|
                    <a>" . $golsCasa21 . "</a>
                  </td>
              
                  <td class='column30 style180 s style190' colspan='5'>22|
                    <a>" . $golsCasa22 . "</a>
                  </td>
                </tr>";
                
                $html.= "<tr class='row33'>
              <td class='column0 style181 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa12'>" . $secGolsCasa12 . "</a>:<a id='secGolsCasa12' class='numero_inputs'>" . $secGolsCasa12 . "</a></td>
              <td class='column3 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa13'>" . $secGolsCasa13 . "</a>:<a id='secGolsCasa13' class='numero_inputs'>" . $secGolsCasa13 . "</a></td>
              <td class='column6 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa14'>" . $secGolsCasa14 . "</a>:<a id='secGolsCasa14' class='numero_inputs'>" . $secGolsCasa14 . "</a></td>
              <td class='column9 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa15'>" . $secGolsCasa15 . "</a>:<a id='secGolsCasa15' class='numero_inputs'>" . $secGolsCasa15 . "</a></td>
              <td class='column12 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa16'>" . $secGolsCasa16 . "</a>:<a id='secGolsCasa16' class='numero_inputs'>" . $secGolsCasa16 . "</a></td>
              <td class='column15 style201 s style203' colspan='3'><a class='numero_inputs' id='minGolsCasa17'>" . $secGolsCasa17 . "</a>:<a id='secGolsCasa17' class='numero_inputs'>" . $secGolsCasa17 . "</a></td>
              <td class='column18 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa18'>" . $secGolsCasa18 . "</a>:<a id='secGolsCasa18' class='numero_inputs'>" . $secGolsCasa18 . "</a></td>
              <td class='column21 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa19'>" . $secGolsCasa19 . "</a>:<a id='secGolsCasa19' class='numero_inputs'>" . $secGolsCasa19 . "</a></td>
              <td class='column24 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa20'>" . $secGolsCasa20 . "</a>:<a id='secGolsCasa20' class='numero_inputs'>" . $secGolsCasa20 . "</a></td>
              <td class='column27 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsCasa21'>" . $secGolsCasa21 . "</a>:<a id='secGolsCasa21' class='numero_inputs'>" . $secGolsCasa21 . "</a></td>
              <td class='column30 style184 s style198' colspan='5'><a class='numero_inputs' id='minGolsCasa22'>" . $secGolsCasa22 . "</a>:<a id='secGolsCasa22' class='numero_inputs'>" . $secGolsCasa22 . "</a></td>
            </tr>
            <tr class='row34'>
              <td class='column0 style145 null'></td>
              <td class='column1 style169 null' colspan='30'></td>
              <td class='column32 style147 null' colspan='4'></td>
            </tr>
            <tr class='row35'>
              <td class='column0 nomeEquipes' colspan='19'>EQUIPE B: " . $equipeVisitante . "</td>
              <td class='column19 style216 s style217' colspan='16'>FALTAS ACUMULATIVAS</td>
            </tr>
            <tr class='row36'>
              <td class='column0 style166 s'>Nº</td>
              <td class='column1 style235 s style235' colspan='14'>ATLETAS</td>
              <td class='column15 style216 s style216' colspan='2'>C.A.</td>
              <td class='column17 style216 s style216' colspan='2'>C.V.</td>
              <td class='column19 style236 s style236' colspan='4'>1º PERÍODO</td>";
              if($faltasFora1Periodo >= '1') {
                $html.= "<td class='column23 style237 null style237' colspan='2'><input type='checkbox' id='faltaFora1Periodo1' name='faltaFora11' checked value='1'></td>";
              } else {
                $html.= "<td class='column23 style237 null style237' colspan='2'><input type='checkbox' id='faltaFora1Periodo1' name='faltaFora11' value='1'></td>";
              }
              if($faltasFora1Periodo >= '2') {
                $html.= "<td class='column25 style226 null style226' colspan='2'><input type='checkbox' id='faltaFora1Periodo2' name='faltaFora12' checked value='2'></td>";
              } else {
                $html.= "<td class='column25 style226 null style226' colspan='2'><input type='checkbox' id='faltaFora1Periodo2' name='faltaFora12' value='2'></td>";
              }
              if($faltasFora1Periodo >= '3') {
                $html.= "<td class='column27 style226 null style226' colspan='2'><input type='checkbox' id='faltaFora1Periodo3' name='faltaFora13' checked value='3'></td>";
              } else {
                $html.= "<td class='column27 style226 null style226' colspan='2'><input type='checkbox' id='faltaFora1Periodo3' name='faltaFora13' value='3'></td>";
              }
              if($faltasFora1Periodo >= '4') {
                $html.= "<td class='column29 style226 null style226' colspan='2'><input type='checkbox' id='faltaFora1Periodo4' name='faltaFora14' checked value='4'></td>";
              } else {
                $html.= "<td class='column29 style226 null style226' colspan='2'><input type='checkbox' id='faltaFora1Periodo4' name='faltaFora14' value='4'></td>";
              }
              if($faltasFora1Periodo >= '5') {
                $html.= "<td class='column31 style227 null style228' colspan='4'><input type='checkbox' id='faltaFora1Periodo5' name='faltaFora15' checked value='5'></td>";
              } else {
                $html.= "<td class='column31 style227 null style228' colspan='4'><input type='checkbox' id='faltaFora1Periodo5' name='faltaFora15' value='5'></td>";
              }
            $html.= "</tr>";
  
                  if($query_dadosJogadoresVisitante->num_rows > 0) { 
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
  
                        if($funcao == 'atleta') {
                        $aux = $aux + 1;
                        $amareloFora = 'amareloFora' . $aux;
                        $amareloMinFora = 'minAmareloFora' . $aux;
                        $amareloSecFora = 'secAmareloFora' . $aux;
                        $vermelhoFora = 'vermelhoFora' . $aux;
                        $vermelhoMinFora = 'minVermelhoFora' . $aux;
                        $vermelhoSecFora = 'secVermelhoFora' . $aux;

                 $html.= "<tr class='row37'>
                          <td class='column0 style173 null'><p>" . $numeroCamisa . "</p></td>
                          <td class='column2 style164 null' colspan='14'><p>" . $nomeJogador . "</p></td>
                          <td class='column15 style211 s style212' colspan='2'>
                              <a>" . $$amareloFora . "</a>
                                  <a class='numero_inputs' id='minAmareloFora'>" . $$amareloMinFora . "</a>:<a id='secAmareloFora' class='numero_inputs'>" . $$amareloSecFora . "</a>
                          </td>
  
                          <td class='column17 style213 s style212' colspan='2'>
                            <a>" . $$vermelhoFora . "</a>
                              <a class='numero_inputs' id='minVermelhoFora'>" . $$vermelhoMinFora . "</a>:<a id='secVermelhoFora' class='numero_inputs'>" . $$vermelhoSecFora . "</a>
                          </td>";

                            if($contador == 1) {
                            $contador = $contador + 1;
                            $html.= "<td class='column19 style240 s style240' colspan='4'>2º PERÍODO</td>";
                            if($faltasFora2Periodo >= '1') {
                              $html.= "<td class='column23 style237 null style237' colspan='2'><input type='checkbox' id='faltaFora2Periodo1' name='faltaFora21' checked value='1'></td>";
                            } else {
                              $html.= "<td class='column23 style237 null style237' colspan='2'><input type='checkbox' id='faltaFora2Periodo1' name='faltaFora21' value='1'></td>";
                            }
                            if($faltasFora2Periodo >= '2') {
                              $html.= "<td class='column25 style226 null style226' colspan='2'><input type='checkbox' id='faltaFora2Periodo2' name='faltaFora22' checked value='2'></td>";
                            } else {
                              $html.= "<td class='column25 style226 null style226' colspan='2'><input type='checkbox' id='faltaFora2Periodo2' name='faltaFora22' value='2'></td>";
                            }
                            if($faltasFora2Periodo >= '3') {
                              $html.= "<td class='column27 style226 null style226' colspan='2'><input type='checkbox' id='faltaFora2Periodo3' name='faltaFora23' checked value='3'></td>";
                            } else {
                              $html.= "<td class='column27 style226 null style226' colspan='2'><input type='checkbox' id='faltaFora2Periodo3' name='faltaFora23' value='3'></td>";
                            }
                            if($faltasFora2Periodo >= '4') {
                              $html.= "<td class='column29 style226 null style226' colspan='2'><input type='checkbox' id='faltaFora2Periodo4' name='faltaFora24' checked value='4'></td>";
                            } else {
                              $html.= "<td class='column29 style226 null style226' colspan='2'><input type='checkbox' id='faltaFora2Periodo4' name='faltaFora24' value='4'></td>";
                            }
                            if($faltasFora2Periodo >= '5') {
                              $html.= "<td class='column31 style227 null style228' colspan='4'><input type='checkbox' id='faltaFora2Periodo5' name='faltaFora25' checked value='5'></td>";
                            } else {
                              $html.= "<td class='column31 style227 null style228' colspan='4'><input type='checkbox' id='faltaFora2Periodo5' name='faltaFora25' value='5'></td>";
                            }
                              
                              } else if($contador == 2) {
                              $contador = $contador + 1;
                              $html.= "<td class='column32 style135 null' colspan='16'></td>";
                              } else if($contador == 3) {
                              $contador = $contador + 1;
                              $html.= "<td class='column32 style135 null' colspan='16'></td>";
                              } else if($contador == 4) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style238 s style239' colspan='16'>ASSINATURAS</td>";
                              } else if($contador == 5) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style218 s style219' colspan='16'>TÉCNICO</td>";
                              } else if($contador == 6) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style142 null' colspan='16'></td>";
                              } else if($contador == 7) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style142 null' colspan='16'>
                                          <img class='assinaturas' src='https://citajag.com.br/assinaturas/" . $assTecFora . "' />
                                       </td>";
                              } else if($contador == 8) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style142 null' colspan='16'></td>";
                              } else if($contador == 9) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style218 s style219' colspan='16'>CAPITÃO</td>";
                              } else if($contador == 10) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style142 null' colspan='16'></td>";
                              } else if($contador == 11) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style142 null' colspan='16'>
                                          <img class='assinaturas' src='https://citajag.com.br/assinaturas/" . $assCapFora . "' />
                                       </td>";
                              } else if($contador == 12) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style8 null' colspan='16'></td>";
                              } else if($contador == 13) {
                              $contador = $contador + 1;
                              $html.= "<td class='column32 style141 null' colspan='16'></td>";
                              } else if($contador == 14) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style220 s style221' colspan='16'>PEDIDOS DE TEMPO</td>";
                              } else if($contador == 15) {
                              $contador = $contador + 1;
                              $html.= "<td class='column19 style223 s style223' colspan='7'>1º PERÍODO</td>
                                <td class='column26 style224 s style225' colspan='9'>2º PERÍODO</td>";
                              }
                              $html.= "</tr>";
                              } } }
  
                       // <!-- Lógica de quando não possui pelo menos 15 inscritos no time -->
                        if($linhas < 15) {
                          if($contador < 6) {
                            $html.= "<tr class='row37'>";
                            if($contador == 5 && $contador < 6) { 
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                  <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                  <td class='column15 style211 s style212' colspan='2'>
                                        --:--
                                  </td>
                                  <td class='column17 style213 s style212' colspan='2'>
                                    --:--
                                  </td>
                                  <td class='column19 style218 s style219' colspan='16'>TÉCNICO</td>";
                               }
                               $html.= "</tr>";
                              }
                        
                          if($contador < 7) {
                            $html.= "<tr class='row37'>";
                            if($contador == 6 && $contador < 7) { 
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                  <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                  <td class='column15 style211 s style212' colspan='2'>
                                        --:--
                                  </td>
                                  <td class='column17 style213 s style212' colspan='2'>
                                    --:--
                                  </td>
                                  <td class='column19 style142 null' colspan='16'></td>";
                               }
                               $html.= "</tr>";
                              }
                          if($contador < 8) {
                            $html.= "<tr class='row37'>";
                            if($contador == 7 && $contador < 8) { 
                              $contador = $contador + 1; 
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                      <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                      <td class='column15 style211 s style212' colspan='2'>
                                            --:--
                                      </td>
                                      <td class='column17 style213 s style212' colspan='2'>
                                        --:--
                                      </td>
                                      <td class='column19 style142 null' colspan='16'>";           
                                      $html.= "<div class='container1'>
                                                  <img class='assinaturas' src='https://citajag.com.br/assinaturas/" . $assTecFora . "' />
                                               </div>";
                                      $html.= "</td>";
                              }
                              $html.= "</tr>";
                            }
                        
                          if($contador < 9) {  
                            $html.= "<tr class='row37'>";
                            if($contador == 8 && $contador < 9) { 
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                  <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                  <td class='column15 style211 s style212' colspan='2'>
                                        --:--
                                  </td>
                                  <td class='column17 style213 s style212' colspan='2'>
                                    --:--
                                  </td>
                                  <td class='column19 style142 null' colspan='16'></td>";
                              }
                              $html.= "</tr>";
                            }
                          
                          if($contador < 10) {
                            $html.= "<tr class='row37'>";
                            if($contador == 9 && $contador < 10) { 
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                  <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                  <td class='column15 style211 s style212' colspan='2'>
                                        --:--
                                  </td>
                                  <td class='column17 style213 s style212' colspan='2'>
                                    --:--
                                  </td>
                                  <td class='column19 style218 s style219' colspan='16'>CAPITÃO</td>";
                              }
                              $html.= "</tr>";
                            }
                          if($contador < 11) { 
                            $html.= "<tr class='row37'>";
                            if($contador == 10 && $contador < 11) { 
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                  <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                  <td class='column15 style211 s style212' colspan='2'>
                                        --:--
                                  </td>
                                  <td class='column17 style213 s style212' colspan='2'>
                                    --:--
                                  </td>
                                  <td class='column19 style142 null' colspan='16'></td>";
                              }
                              $html.= "</tr>";
                            }
                          if($contador < 12) {
                            $html.= "<tr class='row37'>";
                             if($contador == 11 && $contador < 12) { 
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                      <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                      <td class='column15 style211 s style212' colspan='2'>
                                            --:--
                                      </td>
                                      <td class='column17 style213 s style212' colspan='2'>
                                        --:--
                                      </td>
                                      <td class='column19 style142 null' colspan='16'>";           
                                      $html.= "<div class='container1'>
                                                  <img class='assinaturas' src='https://citajag.com.br/assinaturas/" . $assCapFora . "' />
                                               </div>";
                                      $html.= "</td>";
                              }
                              $html.= "</tr>";
                            }
                          if($contador < 13) {
                              $html.= "<tr class='row37'>";
                               if($contador == 12 && $contador < 13) { 
                               $contador = $contador + 1;
                               $html.= "<td class='column0 style173 null'><p>0</p></td>
                                  <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                  <td class='column15 style211 s style212' colspan='2'>
                                        --:--
                                  </td>
                                  <td class='column17 style213 s style212' colspan='2'>
                                    --:--
                                  </td>
                                  <td class='column19 style8 null' colspan='16'></td>";
                              }
                              $html.= "</tr>";
                            }
                            if($contador < 14) {
                              $html.= "<tr class='row37'>";
                              if($contador == 13  && $contador < 14) { 
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                  <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                  <td class='column15 style211 s style212' colspan='2'>
                                        --:--
                                  </td>
                                  <td class='column17 style213 s style212' colspan='2'>
                                    --:--
                                  </td>
                                  <td class='column32 style141 null' colspan='16'></td>";
                                }
                                $html.= "</tr>";
                            }
                            if($contador < 15) {
                              $html.= "<tr class='row37'>";
                            if($contador == 14 && $contador < 15) { 
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                  <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                  <td class='column15 style211 s style212' colspan='2'>
                                        --:--
                                  </td>
                                  <td class='column17 style213 s style212' colspan='2'>
                                    --:--
                                  </td>
                                  <td class='column19 style220 s style221' colspan='16'>PEDIDOS DE TEMPO</td>";
                                }
                                $html.= "</tr>";
                            }
                            if($contador == 15) {
                              $html.= "<tr class='row37'>";
                              if($contador == 15) { 
                              $contador = $contador + 1;
                              $html.= "<td class='column0 style173 null'><p>0</p></td>
                                  <td class='column2 style164 null' colspan='14'><p>Vago</p></td>
                                  <td class='column15 style211 s style212' colspan='2'>
                                        --:--
                                  </td>
                                  <td class='column17 style213 s style212' colspan='2'>
                                    --:--
                                  </td>
                                  <td class='column19 style223 s style223' colspan='7'>1º PERÍODO</td>
                                  <td class='column26 style224 s style225' colspan='9'>2º PERÍODO</td>";
                                }
                                $html.= "</tr>";
                            }
                          }
  
                $sql_nomesTecnicosVisitante = "SELECT docIdentidade, fotoPerfil, nomeUsuario, cartaoVermelhoAtual, cartaoVermelho, suspenso, emblema, funcao FROM usuarios WHERE equipe = '$equipeVisitante' AND categoria = '$categoria'";
                $query_dadosTecnicosVisitante = $mysqli->query($sql_nomesTecnicosVisitante) or die($mysqli->error);
                if($query_dadosTecnicosVisitante->num_rows > 0) {
                $contador = 1;
                while($dadoJogador = $query_dadosTecnicosVisitante->fetch_assoc()) { 
                    $docIdentidade = $dadoJogador['docIdentidade'];
                    $fotoPerfil = $dadoJogador['fotoPerfil'];
                    $nomeJogador = $dadoJogador['nomeUsuario'];
                    $cartaoVermelhoAtual = $dadoJogador['cartaoVermelhoAtual'];
                    $cartaoVermelho = $dadoJogador['cartaoVermelho'];
                    $suspenso = $dadoJogador['suspenso'];
                    $emblema = $dadoJogador['emblema'];
                    $funcao = $dadoJogador['funcao'];
                    
                  if($funcao == 'comissaoTecnica') {

                  if($contador == 1) {
                  $contador = $contador + 1;

                  $html.= "<tr class='row52'>
                  <td class='column0 style157 s'>TEC</td>
                  <td class='column2 style160 null' colspan='13'><p>" . $nomeJogador . "</p></td>
                  <td class='column3 style163 null' colspan='1'></td>
                  <td class='column15 style153 null'></td>
                  <td class='column16 style152 null'></td>
                  <td class='column17 style206 s style205' colspan='2'>
                   <a>" . $vermelhoTreinadorFora . "</a>
                  <a class='numero_inputs' id='minVerTreinadorFora'>" . $minVerTreinadorFora . "</a>:<a id='secVerTreinadorFora' class='numero_inputs'>" . $secVerTreinadorFora . "</a>
                  </td>
                  <td class='column19 style209 s style209' colspan='7'><a class='numero_inputs' id='minTempoFora1Periodo'>" . $minTempoFora1Periodo . "</a>:<a id='secTempoFora1Periodo' class='numero_inputs'>" . $secTempoFora1Periodo . "</a></td>
                  <td class='column26 style214 s style215' colspan='9'><a class='numero_inputs' id='minTempoFora2Periodo'>" . $minTempoFora2Periodo . "</a>:<a id='secTempoFora2Periodo' class='numero_inputs'>" . $secTempoFora2Periodo . "</a></td>";
                  } else if($contador == 2) {
                   $contador = $contador + 1;           
                   $html.= "<td class='column0 style157 s'>AUX</td>
                  <td class='column2 style160 null' colspan='13'><p>" . $nomeJogador . "</p></td>
                  <td class='column3 style163 null' colspan='1'></td>
                  <td class='column15 style153 null'></td>
                  <td class='column16 style152 null'></td>
                  <td class='column17 style206 s style205' colspan='2'>
                  <a>" . $vermelhoAuxiliarFora . "</a>
                  <a class='numero_inputs' id='minVerAuxiliarFora'>" . $minVerAuxiliarFora . "</a>:<a id='secVerAuxiliarFora' class='numero_inputs'>" . $secVerAuxiliarFora . "</a>
                  </td>
                  <td class='column19 style143 null' colspan='19'></td>";
                  } else if($contador == 3) {
                    $contador = $contador + 1;
                    $html.= "<td class='column0 style157 s'>MAS</td>
                  <td class='column2 style160 null' colspan='13'><p>" . $nomeJogador . "</p></td>
                  <td class='column3 style163 null' colspan='1'></td>
                  <td class='column15 style153 null'></td>
                  <td class='column16 style152 null'></td>
                  <td class='column17 style207 s style208' colspan='2'>
                  <a>" . $vermelhoMassagistaFora . "</a>
                  <a class='numero_inputs' id='minVerMassagistaFora'>" . $minVerMassagistaFora . "</a>:<a id='secVerMassagistaFora' class='numero_inputs'>" . $secVerMassagistaFora . "</a>
                </td>
                <td class='column19 style143 null' colspan='19'></td>";
                  }
                $html.= "</tr>";
              } } }
  
                $html.= "<tr class='row55'>
                <td class='column0 style177 s style196' colspan='3'>01|
                  <a>" . $golsFora1 . "</a>
                </td>

                <td class='column3 style197 s style196' colspan='3'>02|
                  <a>" . $golsFora2 . "</a>
                </td>

                <td class='column6 style197 s style196' colspan='3'>03|
                  <a>" . $golsFora3 . "</a>
                </td>
              
                <td class='column9 style197 s style196' colspan='3'>04|
                  <a>" . $golsFora4 . "</a>
                </td>
              
                <td class='column12 style197 s style196' colspan='3'>05|
                  <a>" . $golsFora5 . "</a>
                </td>
              
                <td class='column15 style180 s style179' colspan='3'>06|
                  <a>" . $golsFora6 . "</a>
                </td>
              
                <td class='column18 style180 s style179' colspan='3'>07|
                  <a>" . $golsFora7 . "</a>
                </td>
              
                <td class='column21 style180 s style179' colspan='3'>08|
                  <a>" . $golsFora8 . "</a>
                </td>
              
                <td class='column24 style180 s style179' colspan='3'>09|
                  <a>" . $golsFora9 . "</a>
                </td>
              
                <td class='column27 style180 s style179' colspan='3'>10|
                  <a>" . $golsFora10 . "</a>
                </td>
              
                <td class='column30 style180 s style190' colspan='5'>11|
                  <a>" . $golsFora11 . "</a>
                </td>
                </tr>
            <tr class='row56'>
              <td class='column0 style181 s style183' colspan='3'><a class='numero_inputs' id='minGolsFora1'>" . $minGolsFora1 . "</a>:<a id='secGolsFora1' class='numero_inputs'>" . $secGolsFora1 . "</a></td>
              <td class='column3 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsFora2'>" . $minGolsFora2 . "</a>:<a id='secGolsFora2' class='numero_inputs'>" . $secGolsFora2 . "</a></td>
              <td class='column6 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsFora3'>" . $minGolsFora3 . "</a>:<a id='secGolsFora3' class='numero_inputs'>" . $secGolsFora3 . "</a></td>
              <td class='column9 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsFora4'>" . $minGolsFora4 . "</a>:<a id='secGolsFora4' class='numero_inputs'>" . $secGolsFora4 . "</a></td>
              <td class='column12 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsFora5'>" . $minGolsFora5 . "</a>:<a id='secGolsFora5' class='numero_inputs'>" . $secGolsFora5 . "</a></td>
              <td class='column15 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsFora9'>" . $minGolsFora6 . "</a>:<a id='secGolsFora6' class='numero_inputs'>" . $secGolsFora6 . "</a></td>
              <td class='column18 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsFora7'>" . $minGolsFora7 . "</a>:<a id='secGolsFora7' class='numero_inputs'>" . $secGolsFora7 . "</a></td>
              <td class='column21 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsFora8'>" . $minGolsFora8 . "</a>:<a id='secGolsFora8' class='numero_inputs'>" . $secGolsFora8 . "</a></td>
              <td class='column24 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsFora9'>" . $minGolsFora9 . "</a>:<a id='secGolsFora9' class='numero_inputs'>" . $secGolsFora9 . "</a></td>
              <td class='column27 style184 s style183' colspan='3'><a class='numero_inputs' id='minGolsFora10'>" . $minGolsFora10 . "</a>:<a id='secGolsFora10' class='numero_inputs'>" . $secGolsFora1 . "</a></td>
              <td class='column30 style184 s style198' colspan='5'><a class='numero_inputs' id='minGolsFora11'>" . $minGolsFora11 . "</a>:<a id='secGolsFora11' class='numero_inputs'>" . $secGolsFora1 . "</a></td>
            </tr>
            
            <tr class='row57'>
              <td class='column0 style177 s style196' colspan='3'>12|
                <a>" . $golsFora12 . "</a>
              </td>

              <td class='column3 style197 s style196' colspan='3'>13|
                <a>" . $golsFora13 . "</a>
              </td>
              
              <td class='column6 style197 s style196' colspan='3'>14|
                <a>" . $golsFora14 . "</a>
              </td>
              
              <td class='column9 style197 s style196' colspan='3'>15|
                <a>" . $golsFora15 . "</a>
              </td>
              
              <td class='column12 style197 s style196' colspan='3'>16|
                <a>" . $golsFora16 . "</a>
              </td>
              
              <td class='column15 style180 s style179' colspan='3'>17|
                <a>" . $golsFora17 . "</a>
              </td>
              
              <td class='column18 style180 s style179' colspan='3'>18|
                <a>" . $golsFora18 . "</a>
              </td>
              
              <td class='column21 style180 s style179' colspan='3'>19|
                <a>" . $golsFora19 . "</a>
              </td>
              
              <td class='column24 style180 s style179' colspan='3'>20|
                <a>" . $golsFora20 . "</a>
              </td>
              
              <td class='column27 style180 s style179' colspan='3'>21|
                <a>" . $golsFora21 . "</a>
              </td>
              
              <td class='column30 style180 s style190' colspan='5'>22|
                <a>" . $golsFora22 . "</a>
              </td>
            </tr>
              
            <tr class='row58'>
              <td class='column0 style199 s style193' colspan='3'><a class='numero_inputs' id='minGolsFora12'>" . $minGolsFora12 . "</a>:<a id='secGolsFora12' class='numero_inputs'>" . $secGolsFora12 . "</a></td>
              <td class='column3 style191 s style193' colspan='3'><a class='numero_inputs' id='minGolsFora13'>" . $minGolsFora13 . "</a>:<a id='secGolsFora13' class='numero_inputs'>" . $secGolsFora13 . "</a></td>
              <td class='column6 style191 s style193' colspan='3'><a class='numero_inputs' id='minGolsFora14'>" . $minGolsFora14 . "</a>:<a id='secGolsFora14' class='numero_inputs'>" . $secGolsFora14 . "</a></td>
              <td class='column9 style191 s style193' colspan='3'><a class='numero_inputs' id='minGolsFora15'>" . $minGolsFora15 . "</a>:<a id='secGolsFora15' class='numero_inputs'>" . $secGolsFora15 . "</a></td>
              <td class='column12 style191 s style193' colspan='3'><a class='numero_inputs' id='minGolsFora16'>" . $minGolsFora16 . "</a>:<a id='secGolsFora16' class='numero_inputs'>" . $secGolsFora16 . "</a></td>
              <td class='column15 style191 s style193' colspan='3'><a class='numero_inputs' id='minGolsFora17'>" . $minGolsFora17 . "</a>:<a id='secGolsFora17' class='numero_inputs'>" . $secGolsFora17 . "</a></td>
              <td class='column18 style191 s style193' colspan='3'><a class='numero_inputs' id='minGolsFora18'>" . $minGolsFora18 . "</a>:<a id='secGolsFora18' class='numero_inputs'>" . $secGolsFora18 . "</a></td>
              <td class='column21 style191 s style193' colspan='3'><a class='numero_inputs' id='minGolsFora19'>" . $minGolsFora19 . "</a>:<a id='secGolsFora19' class='numero_inputs'>" . $secGolsFora19 . "</a></td>
              <td class='column24 style191 s style193' colspan='3'><a class='numero_inputs' id='minGolsFora20'>" . $minGolsFora20 . "</a>:<a id='secGolsFora20' class='numero_inputs'>" . $secGolsFora20 . "</a></td>
              <td class='column27 style191 s style193' colspan='3'><a class='numero_inputs' id='minGolsFora21'>" . $minGolsFora21 . "</a>:<a id='secGolsFora21' class='numero_inputs'>" . $secGolsFora21 . "</a></td>
              <td class='column30 style191 s style194' colspan='5'><a class='numero_inputs' id='minGolsFora22'>" . $minGolsFora22 . "</a>:<a id='secGolsFora22' class='numero_inputs'>" . $secGolsFora22 . "</a></td>
            </tr>
          </tbody>
      </table> 
      <p class='container_anotacoes'>
        <a class='label_anotacoes'>Anotações:</a>
        <a name='anotacoes' id='anotacoesPartida' style='width: 80%; height: 50vh; margin-top: 8px'>" . $anotacoesPartida . "</a>
      </p>
      </div>  
  </body>
  </html>";

  // echo $html;

    // Incluímos a biblioteca DOMPDF
    require 'vendor/autoload.php';

    use Dompdf\Dompdf;

    // Instanciamos a classe
    $dompdf = new DOMPDF(['enable_remote' => true]);

    // Definimos o tamanho do papel e
    // sua orientação (retrato ou paisagem)
    $dompdf->set_paper('A4','portrait');
    
    // Passamos o conteúdo que será convertido para PDF
    // $html = file_get_contents("sumula.php");
    $dompdf->load_html($html);
    // O arquivo é convertido
    $dompdf->render();

    // Salvo no diretório temporário do sistema
    // e exibido para o usuário
    $output = $dompdf->output();
    //criar uma variável puxando os nomes dos times e o dia e mês do jogo. aí juntar com sumulas/ + .pdf!
    date_default_timezone_set('America/Sao_Paulo');
    $dataAtual = date('dmY');
    $nomePDF = $equipeCasa . "_" . $equipeVisitante . $dataAtual . ".pdf";
    file_put_contents('sumulas/' . $nomePDF, $output);
    
    unset($_SESSION["equipeCasa"]);
    unset($_SESSION["equipeVisitante"]);
    unset($_SESSION["categoria"]);
    unset($_SESSION["sumulaRecarregada"]);
    
    header("Location: gerarSumula");
    die();
    ?>