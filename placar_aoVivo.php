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
        $categoria = $_SESSION['categoria'];
        
        $golsCasa = $_GET['golsCasa'];
        $golsVisitante = $_GET['golsVisitante'];

        $dataPartida = $_GET['dataPartida'];
        $nome1Arbitro = $_GET['nome1Arbitro'];
        $nome2Arbitro = $_GET['nome2Arbitro'];
        $nomeAnotador = $_GET['nomeAnotador'];
        $nomeCronometrista = $_GET['nomeCronometrista'];

        $placar1Periodo1 = $_GET['placar1Periodo1'];
        $placar1Periodo2 = $_GET['placar1Periodo2'];
        $horarioInicio1Periodo1 = $_GET['horarioInicio1Periodo1'];
        $horarioInicio1Periodo2 = $_GET['horarioInicio1Periodo2'];

        $placar2Periodo1 = $_GET['placar2Periodo1'];
        $placar2Periodo2 = $_GET['placar2Periodo2'];
        $horarioInicio2Periodo1 = $_GET['horarioInicio2Periodo1'];
        $horarioInicio2Periodo2 = $_GET['horarioInicio2Periodo2'];

        $placarProrrogacao1 = $_GET['placarProrrogacao1'];
        $placarProrrogacao2 = $_GET['placarProrrogacao2'];
        $horarioInicioProrrogacao1 = $_GET['horarioInicioProrrogacao1'];
        $horarioInicioProrrogacao2 = $_GET['horarioInicioProrrogacao2'];

        $placarPenaltis1 = $_GET['placarPenaltis1'];
        $placarPenaltis2 = $_GET['placarPenaltis2'];

        $placarFinal1 = $_GET['placarFinal1'];
        $placarFinal2 = $_GET['placarFinal2'];
        $horarioFinal1 = $_GET['horarioFinal1'];
        $horarioFinal2 = $_GET['horarioFinal2'];

        $faltasCasa1Periodo = $_GET['faltasCasa1Periodo'];
        $faltasCasa2Periodo = $_GET['faltasCasa2Periodo'];
        $faltasFora1Periodo = $_GET['faltasFora1Periodo'];
        $faltasFora2Periodo = $_GET['faltasFora2Periodo'];

        $amareloCasa1 = $_GET['amareloCasa1'];
        $amareloCasa2 = $_GET['amareloCasa2'];
        $amareloCasa3 = $_GET['amareloCasa3'];
        $amareloCasa4 = $_GET['amareloCasa4'];
        $amareloCasa5 = $_GET['amareloCasa5'];
        $amareloCasa6 = $_GET['amareloCasa6'];
        $amareloCasa7 = $_GET['amareloCasa7'];
        $amareloCasa8 = $_GET['amareloCasa8'];
        $amareloCasa9 = $_GET['amareloCasa9'];
        $amareloCasa10 = $_GET['amareloCasa10'];
        $amareloCasa11 = $_GET['amareloCasa11'];
        $amareloCasa12 = $_GET['amareloCasa12'];
        $amareloCasa13 = $_GET['amareloCasa13'];
        $amareloCasa14 = $_GET['amareloCasa14'];
        $amareloCasa15 = $_GET['amareloCasa15'];

        $minAmareloCasa1 = $_GET['minAmareloCasa1'];
        $secAmareloCasa1 = $_GET['secAmareloCasa1'];
        $minAmareloCasa2 = $_GET['minAmareloCasa2'];
        $secAmareloCasa2 = $_GET['secAmareloCasa2'];
        $minAmareloCasa3 = $_GET['minAmareloCasa3'];
        $secAmareloCasa3 = $_GET['secAmareloCasa3'];
        $minAmareloCasa4 = $_GET['minAmareloCasa4'];
        $secAmareloCasa4 = $_GET['secAmareloCasa4'];
        $minAmareloCasa5 = $_GET['minAmareloCasa5'];
        $secAmareloCasa5 = $_GET['secAmareloCasa5'];
        $minAmareloCasa6 = $_GET['minAmareloCasa6'];
        $secAmareloCasa6 = $_GET['secAmareloCasa6'];
        $minAmareloCasa7 = $_GET['minAmareloCasa7'];
        $secAmareloCasa7 = $_GET['secAmareloCasa7'];
        $minAmareloCasa8 = $_GET['minAmareloCasa8'];
        $secAmareloCasa8 = $_GET['secAmareloCasa8'];
        $minAmareloCasa9 = $_GET['minAmareloCasa9'];
        $secAmareloCasa9 = $_GET['secAmareloCasa9'];
        $minAmareloCasa10 = $_GET['minAmareloCasa10'];
        $secAmareloCasa10 = $_GET['secAmareloCasa10'];
        $minAmareloCasa11 = $_GET['minAmareloCasa11'];
        $secAmareloCasa11 = $_GET['secAmareloCasa11'];
        $minAmareloCasa12 = $_GET['minAmareloCasa12'];
        $secAmareloCasa12 = $_GET['secAmareloCasa12'];
        $minAmareloCasa13 = $_GET['minAmareloCasa13'];
        $secAmareloCasa13 = $_GET['secAmareloCasa13'];
        $minAmareloCasa14 = $_GET['minAmareloCasa14'];
        $secAmareloCasa14 = $_GET['secAmareloCasa14'];
        $minAmareloCasa15 = $_GET['minAmareloCasa15'];
        $secAmareloCasa15 = $_GET['secAmareloCasa15'];

        $vermelhoCasa1 = $_GET['vermelhoCasa1'];
        $vermelhoCasa2 = $_GET['vermelhoCasa2'];
        $vermelhoCasa3 = $_GET['vermelhoCasa3'];
        $vermelhoCasa4 = $_GET['vermelhoCasa4'];
        $vermelhoCasa5 = $_GET['vermelhoCasa5'];
        $vermelhoCasa6 = $_GET['vermelhoCasa6'];
        $vermelhoCasa7 = $_GET['vermelhoCasa7'];
        $vermelhoCasa8 = $_GET['vermelhoCasa8'];
        $vermelhoCasa9 = $_GET['vermelhoCasa9'];
        $vermelhoCasa10 = $_GET['vermelhoCasa10'];
        $vermelhoCasa11 = $_GET['vermelhoCasa11'];
        $vermelhoCasa12 = $_GET['vermelhoCasa12'];
        $vermelhoCasa13 = $_GET['vermelhoCasa13'];
        $vermelhoCasa14 = $_GET['vermelhoCasa14'];
        $vermelhoCasa15 = $_GET['vermelhoCasa15'];

        $minVermelhoCasa1 = $_GET['minVermelhoCasa1'];
        $secVermelhoCasa1 = $_GET['secVermelhoCasa1'];
        $minVermelhoCasa2 = $_GET['minVermelhoCasa2'];
        $secVermelhoCasa2 = $_GET['secVermelhoCasa2'];
        $minVermelhoCasa3 = $_GET['minVermelhoCasa3'];
        $secVermelhoCasa3 = $_GET['secVermelhoCasa3'];
        $minVermelhoCasa4 = $_GET['minVermelhoCasa4'];
        $secVermelhoCasa4 = $_GET['secVermelhoCasa4'];
        $minVermelhoCasa5 = $_GET['minVermelhoCasa5'];
        $secVermelhoCasa5 = $_GET['secVermelhoCasa5'];
        $minVermelhoCasa6 = $_GET['minVermelhoCasa6'];
        $secVermelhoCasa6 = $_GET['secVermelhoCasa6'];
        $minVermelhoCasa7 = $_GET['minVermelhoCasa7'];
        $secVermelhoCasa7 = $_GET['secVermelhoCasa7'];
        $minVermelhoCasa8 = $_GET['minVermelhoCasa8'];
        $secVermelhoCasa8 = $_GET['secVermelhoCasa8'];
        $minVermelhoCasa9 = $_GET['minVermelhoCasa9'];
        $secVermelhoCasa9 = $_GET['secVermelhoCasa9'];
        $minVermelhoCasa10 = $_GET['minVermelhoCasa10'];
        $secVermelhoCasa10 = $_GET['secVermelhoCasa10'];
        $minVermelhoCasa11 = $_GET['minVermelhoCasa11'];
        $secVermelhoCasa11 = $_GET['secVermelhoCasa11'];
        $minVermelhoCasa12 = $_GET['minVermelhoCasa12'];
        $secVermelhoCasa12 = $_GET['secVermelhoCasa12'];
        $minVermelhoCasa13 = $_GET['minVermelhoCasa13'];
        $secVermelhoCasa13 = $_GET['secVermelhoCasa13'];
        $minVermelhoCasa14 = $_GET['minVermelhoCasa14'];
        $secVermelhoCasa14 = $_GET['secVermelhoCasa14'];
        $minVermelhoCasa15 = $_GET['minVermelhoCasa15'];
        $secVermelhoCasa15 = $_GET['secVermelhoCasa15'];

        //Cartões Comissão Casa
        $vermelhoTreinadorCasa = $_GET['vermelhoTreinadorCasa'];
        $minVerTreinadorCasa = $_GET['minVerTreinadorCasa'];
        $secVerTreinadorCasa = $_GET['secVerTreinadorCasa'];

        $vermelhoAuxiliarCasa = $_GET['vermelhoAuxiliarCasa'];
        $minVerAuxiliarCasa = $_GET['minVerAuxiliarCasa'];
        $secVerAuxiliarCasa = $_GET['secVerAuxiliarCasa'];

        $vermelhoMassagistaCasa = $_GET['vermelhoMassagistaCasa'];
        $minVerMassagistaCasa = $_GET['minVerMassagistaCasa'];
        $secVerMassagistaCasa = $_GET['secVerMassagistaCasa'];
        // Pedidos de tempo Casa
        $minTempoCasa1Periodo = $_GET['minTempoCasa1Periodo'];
        $secTempoCasa1Periodo = $_GET['secTempoCasa1Periodo'];
        $minTempoCasa2Periodo = $_GET['minTempoCasa2Periodo'];
        $secTempoCasa2Periodo = $_GET['secTempoCasa2Periodo'];

        //Cartões Comissão Fora
        $vermelhoTreinadorFora = $_GET['vermelhoTreinadorFora'];
        $minVerTreinadorFora = $_GET['minVerTreinadorFora'];
        $secVerTreinadorFora = $_GET['secVerTreinadorFora'];

        $vermelhoAuxiliarFora = $_GET['vermelhoAuxiliarFora'];
        $minVerAuxiliarFora = $_GET['minVerAuxiliarFora'];
        $secVerAuxiliarFora = $_GET['secVerAuxiliarFora'];

        $vermelhoMassagistaFora = $_GET['vermelhoMassagistaFora'];
        $minVerMassagistaFora = $_GET['minVerMassagistaFora'];
        $secVerMassagistaFora = $_GET['secVerMassagistaFora'];
        // Pedidos de Tempo Fora
        $minTempoFora1Periodo = $_GET['minTempoFora1Periodo'];
        $secTempoFora1Periodo = $_GET['secTempoFora1Periodo'];
        $minTempoFora2Periodo = $_GET['minTempoFora2Periodo'];
        $secTempoFora2Periodo = $_GET['secTempoFora2Periodo'];

        $golsCasa1 = $_GET['golsCasa1'];
        $golsCasa2 = $_GET['golsCasa2'];
        $golsCasa3 = $_GET['golsCasa3'];
        $golsCasa4 = $_GET['golsCasa4'];
        $golsCasa5 = $_GET['golsCasa5'];
        $golsCasa6 = $_GET['golsCasa6'];
        $golsCasa7 = $_GET['golsCasa7'];
        $golsCasa8 = $_GET['golsCasa8'];
        $golsCasa9 = $_GET['golsCasa9'];
        $golsCasa10 = $_GET['golsCasa10'];
        $golsCasa11 = $_GET['golsCasa11'];
        $golsCasa12 = $_GET['golsCasa12'];
        $golsCasa13 = $_GET['golsCasa13'];
        $golsCasa14 = $_GET['golsCasa14'];
        $golsCasa15 = $_GET['golsCasa15'];
        $golsCasa16 = $_GET['golsCasa16'];
        $golsCasa17 = $_GET['golsCasa17'];
        $golsCasa18 = $_GET['golsCasa18'];
        $golsCasa19 = $_GET['golsCasa19'];
        $golsCasa20 = $_GET['golsCasa20'];
        $golsCasa21 = $_GET['golsCasa21'];
        $golsCasa22 = $_GET['golsCasa22'];

        $minGolsCasa1 = $_GET['minGolsCasa1'];
        $secGolsCasa1 = $_GET['secGolsCasa1'];
        $minGolsCasa2 = $_GET['minGolsCasa2'];
        $secGolsCasa2 = $_GET['secGolsCasa2'];
        $minGolsCasa3 = $_GET['minGolsCasa3'];
        $secGolsCasa3 = $_GET['secGolsCasa3'];
        $minGolsCasa4 = $_GET['minGolsCasa4'];
        $secGolsCasa4 = $_GET['secGolsCasa4'];
        $minGolsCasa5 = $_GET['minGolsCasa5'];
        $secGolsCasa5 = $_GET['secGolsCasa5'];
        $minGolsCasa6 = $_GET['minGolsCasa6'];
        $secGolsCasa6 = $_GET['secGolsCasa6'];
        $minGolsCasa7 = $_GET['minGolsCasa7'];
        $secGolsCasa7 = $_GET['secGolsCasa7'];
        $minGolsCasa8 = $_GET['minGolsCasa8'];
        $secGolsCasa8 = $_GET['secGolsCasa8'];
        $minGolsCasa9 = $_GET['minGolsCasa9'];
        $secGolsCasa9 = $_GET['secGolsCasa9'];
        $minGolsCasa10 = $_GET['minGolsCasa10'];
        $secGolsCasa10 = $_GET['secGolsCasa10'];
        $minGolsCasa11 = $_GET['minGolsCasa11'];
        $secGolsCasa11 = $_GET['secGolsCasa11'];
        $minGolsCasa12 = $_GET['minGolsCasa12'];
        $secGolsCasa12 = $_GET['secGolsCasa12'];
        $minGolsCasa13 = $_GET['minGolsCasa13'];
        $secGolsCasa13 = $_GET['secGolsCasa13'];
        $minGolsCasa14 = $_GET['minGolsCasa14'];
        $secGolsCasa14 = $_GET['secGolsCasa14'];
        $minGolsCasa15 = $_GET['minGolsCasa15'];
        $secGolsCasa15 = $_GET['secGolsCasa15'];
        $minGolsCasa16 = $_GET['minGolsCasa16'];
        $secGolsCasa16 = $_GET['secGolsCasa16'];
        $minGolsCasa17 = $_GET['minGolsCasa17'];
        $secGolsCasa17 = $_GET['secGolsCasa17'];
        $minGolsCasa18 = $_GET['minGolsCasa18'];
        $secGolsCasa18 = $_GET['secGolsCasa18'];
        $minGolsCasa19 = $_GET['minGolsCasa19'];
        $secGolsCasa19 = $_GET['secGolsCasa19'];
        $minGolsCasa20 = $_GET['minGolsCasa20'];
        $secGolsCasa20 = $_GET['secGolsCasa20'];
        $minGolsCasa21 = $_GET['minGolsCasa21'];
        $secGolsCasa21 = $_GET['secGolsCasa21'];
        $minGolsCasa22 = $_GET['minGolsCasa22'];
        $secGolsCasa22 = $_GET['secGolsCasa22'];

        //Dados Equipe Visitante
        $amareloFora1 = $_GET['amareloFora1'];
        $amareloFora2 = $_GET['amareloFora2'];
        $amareloFora3 = $_GET['amareloFora3'];
        $amareloFora4 = $_GET['amareloFora4'];
        $amareloFora5 = $_GET['amareloFora5'];
        $amareloFora6 = $_GET['amareloFora6'];
        $amareloFora7 = $_GET['amareloFora7'];
        $amareloFora8 = $_GET['amareloFora8'];
        $amareloFora9 = $_GET['amareloFora9'];
        $amareloFora10 = $_GET['amareloFora10'];
        $amareloFora11 = $_GET['amareloFora11'];
        $amareloFora12 = $_GET['amareloFora12'];
        $amareloFora13 = $_GET['amareloFora13'];
        $amareloFora14 = $_GET['amareloFora14'];
        $amareloFora15 = $_GET['amareloFora15'];

        $minAmareloFora1 = $_GET['minAmareloFora1'];
        $secAmareloFora1 = $_GET['secAmareloFora1'];
        $minAmareloFora2 = $_GET['minAmareloFora2'];
        $secAmareloFora2 = $_GET['secAmareloFora2'];
        $minAmareloFora3 = $_GET['minAmareloFora3'];
        $secAmareloFora3 = $_GET['secAmareloFora3'];
        $minAmareloFora4 = $_GET['minAmareloFora4'];
        $secAmareloFora4 = $_GET['secAmareloFora4'];
        $minAmareloFora5 = $_GET['minAmareloFora5'];
        $secAmareloFora5 = $_GET['secAmareloFora5'];
        $minAmareloFora6 = $_GET['minAmareloFora6'];
        $secAmareloFora6 = $_GET['secAmareloFora6'];
        $minAmareloFora7 = $_GET['minAmareloFora7'];
        $secAmareloFora7 = $_GET['secAmareloFora7'];
        $minAmareloFora8 = $_GET['minAmareloFora8'];
        $secAmareloFora8 = $_GET['secAmareloFora8'];
        $minAmareloFora9 = $_GET['minAmareloFora9'];
        $secAmareloFora9 = $_GET['secAmareloFora9'];
        $minAmareloFora10 = $_GET['minAmareloFora10'];
        $secAmareloFora10 = $_GET['secAmareloFora10'];
        $minAmareloFora11 = $_GET['minAmareloFora11'];
        $secAmareloFora11 = $_GET['secAmareloFora11'];
        $minAmareloFora12 = $_GET['minAmareloFora12'];
        $secAmareloFora12 = $_GET['secAmareloFora12'];
        $minAmareloFora13 = $_GET['minAmareloFora13'];
        $secAmareloFora13 = $_GET['secAmareloFora13'];
        $minAmareloFora14 = $_GET['minAmareloFora14'];
        $secAmareloFora14 = $_GET['secAmareloFora14'];
        $minAmareloFora15 = $_GET['minAmareloFora15'];
        $secAmareloFora15 = $_GET['secAmareloFora15'];

        $vermelhoFora1 = $_GET['vermelhoFora1'];
        $vermelhoFora2 = $_GET['vermelhoFora2'];
        $vermelhoFora3 = $_GET['vermelhoFora3'];
        $vermelhoFora4 = $_GET['vermelhoFora4'];
        $vermelhoFora5 = $_GET['vermelhoFora5'];
        $vermelhoFora6 = $_GET['vermelhoFora6'];
        $vermelhoFora7 = $_GET['vermelhoFora7'];
        $vermelhoFora8 = $_GET['vermelhoFora8'];
        $vermelhoFora9 = $_GET['vermelhoFora9'];
        $vermelhoFora10 = $_GET['vermelhoFora10'];
        $vermelhoFora11 = $_GET['vermelhoFora11'];
        $vermelhoFora12 = $_GET['vermelhoFora12'];
        $vermelhoFora13 = $_GET['vermelhoFora13'];
        $vermelhoFora14 = $_GET['vermelhoFora14'];
        $vermelhoFora15 = $_GET['vermelhoFora15'];
        
        $minVermelhoFora1 = $_GET['minVermelhoFora1'];
        $secVermelhoFora1 = $_GET['secVermelhoFora1'];
        $minVermelhoFora2 = $_GET['minVermelhoFora2'];
        $secVermelhoFora2 = $_GET['secVermelhoFora2'];
        $minVermelhoFora3 = $_GET['minVermelhoFora3'];
        $secVermelhoFora3 = $_GET['secVermelhoFora3'];
        $minVermelhoFora4 = $_GET['minVermelhoFora4'];
        $secVermelhoFora4 = $_GET['secVermelhoFora4'];
        $minVermelhoFora5 = $_GET['minVermelhoFora5'];
        $secVermelhoFora5 = $_GET['secVermelhoFora5'];
        $minVermelhoFora6 = $_GET['minVermelhoFora6'];
        $secVermelhoFora6 = $_GET['secVermelhoFora6'];
        $minVermelhoFora7 = $_GET['minVermelhoFora7'];
        $secVermelhoFora7 = $_GET['secVermelhoFora7'];
        $minVermelhoFora8 = $_GET['minVermelhoFora8'];
        $secVermelhoFora8 = $_GET['secVermelhoFora8'];
        $minVermelhoFora9 = $_GET['minVermelhoFora9'];
        $secVermelhoFora9 = $_GET['secVermelhoFora9'];
        $minVermelhoFora10 = $_GET['minVermelhoFora10'];
        $secVermelhoFora10 = $_GET['secVermelhoFora10'];
        $minVermelhoFora11 = $_GET['minVermelhoFora11'];
        $secVermelhoFora11 = $_GET['secVermelhoFora11'];
        $minVermelhoFora12 = $_GET['minVermelhoFora12'];
        $secVermelhoFora12 = $_GET['secVermelhoFora12'];
        $minVermelhoFora13 = $_GET['minVermelhoFora13'];
        $secVermelhoFora13 = $_GET['secVermelhoFora13'];
        $minVermelhoFora14 = $_GET['minVermelhoFora14'];
        $secVermelhoFora14 = $_GET['secVermelhoFora14'];
        $minVermelhoFora15 = $_GET['minVermelhoFora15'];
        $secVermelhoFora15 = $_GET['secVermelhoFora15'];

        $golsFora1 = $_GET['golsFora1'];
        $golsFora2 = $_GET['golsFora2'];
        $golsFora3 = $_GET['golsFora3'];
        $golsFora4 = $_GET['golsFora4'];
        $golsFora5 = $_GET['golsFora5'];
        $golsFora6 = $_GET['golsFora6'];
        $golsFora7 = $_GET['golsFora7'];
        $golsFora8 = $_GET['golsFora8'];
        $golsFora9 = $_GET['golsFora9'];
        $golsFora10 = $_GET['golsFora10'];
        $golsFora11 = $_GET['golsFora11'];
        $golsFora12 = $_GET['golsFora12'];
        $golsFora13 = $_GET['golsFora13'];
        $golsFora14 = $_GET['golsFora14'];
        $golsFora15 = $_GET['golsFora15'];
        $golsFora16 = $_GET['golsFora16'];
        $golsFora17 = $_GET['golsFora17'];
        $golsFora18 = $_GET['golsFora18'];
        $golsFora19 = $_GET['golsFora19'];
        $golsFora20 = $_GET['golsFora20'];
        $golsFora21 = $_GET['golsFora21'];
        $golsFora22 = $_GET['golsFora22'];

        $minGolsFora1 = $_GET['minGolsFora1'];
        $secGolsFora1 = $_GET['secGolsFora1'];
        $minGolsFora2 = $_GET['minGolsFora2'];
        $secGolsFora2 = $_GET['secGolsFora2'];
        $minGolsFora3 = $_GET['minGolsFora3'];
        $secGolsFora3 = $_GET['secGolsFora3'];
        $minGolsFora4 = $_GET['minGolsFora4'];
        $secGolsFora4 = $_GET['secGolsFora4'];
        $minGolsFora5 = $_GET['minGolsFora5'];
        $secGolsFora5 = $_GET['secGolsFora5'];
        $minGolsFora6 = $_GET['minGolsFora6'];
        $secGolsFora6 = $_GET['secGolsFora6'];
        $minGolsFora7 = $_GET['minGolsFora7'];
        $secGolsFora7 = $_GET['secGolsFora7'];
        $minGolsFora8 = $_GET['minGolsFora8'];
        $secGolsFora8 = $_GET['secGolsFora8'];
        $minGolsFora9 = $_GET['minGolsFora9'];
        $secGolsFora9 = $_GET['secGolsFora9'];
        $minGolsFora10 = $_GET['minGolsFora10'];
        $secGolsFora10 = $_GET['secGolsFora10'];
        $minGolsFora11 = $_GET['minGolsFora11'];
        $secGolsFora11 = $_GET['secGolsFora11'];
        $minGolsFora12 = $_GET['minGolsFora12'];
        $secGolsFora12 = $_GET['secGolsFora12'];
        $minGolsFora13 = $_GET['minGolsFora13'];
        $secGolsFora13 = $_GET['secGolsFora13'];
        $minGolsFora14 = $_GET['minGolsFora14'];
        $secGolsFora14 = $_GET['secGolsFora14'];
        $minGolsFora15 = $_GET['minGolsFora15'];
        $secGolsFora15 = $_GET['secGolsFora15'];
        $minGolsFora16 = $_GET['minGolsFora16'];
        $secGolsFora16 = $_GET['secGolsFora16'];
        $minGolsFora17 = $_GET['minGolsFora17'];
        $secGolsFora17 = $_GET['secGolsFora17'];
        $minGolsFora18 = $_GET['minGolsFora18'];
        $secGolsFora18 = $_GET['secGolsFora18'];
        $minGolsFora19 = $_GET['minGolsFora19'];
        $secGolsFora19 = $_GET['secGolsFora19'];
        $minGolsFora20 = $_GET['minGolsFora20'];
        $secGolsFora20 = $_GET['secGolsFora20'];
        $minGolsFora21 = $_GET['minGolsFora21'];
        $secGolsFora21 = $_GET['secGolsFora21'];
        $minGolsFora22 = $_GET['minGolsFora22'];
        $secGolsFora22 = $_GET['secGolsFora22'];

        $anotacoesPartida = $_GET['anotacoesPartida'];

        if(isset($golsCasa) && isset($golsVisitante)) {

        if(isset($_SESSION["equipeCasa"]) && isset($_SESSION["equipeVisitante"])) {
            $equipeCasa = $_SESSION["equipeCasa"];
            $equipeVisitante = $_SESSION["equipeVisitante"];

            $sql_update = "UPDATE sumula SET golsCasa = '$golsCasa', golsFora = '$golsVisitante', dataPartida = '$dataPartida', nome1Arbitro = '$nome1Arbitro', nome2Arbitro = '$nome2Arbitro', nomeAnotador = '$nomeAnotador', nomeCronometrista = '$nomeCronometrista', placar1Periodo1 = '$placar1Periodo1', placar1Periodo2 = '$placar1Periodo2', placar2Periodo1 = '$placar2Periodo1',
            placar2Periodo2 = '$placar2Periodo2', horarioInicio1Periodo1 = '$horarioInicio1Periodo1', horarioInicio1Periodo2 = '$horarioInicio1Periodo2', horarioInicio2Periodo1 = '$horarioInicio2Periodo1', horarioInicio2Periodo2 = '$horarioInicio2Periodo2', horarioInicioProrrogacao1 = '$horarioInicioProrrogacao1', horarioInicioProrrogacao2 = '$horarioInicioProrrogacao2',
            placarProrrogacao1 = '$placarProrrogacao1', placarProrrogacao2 = '$placarProrrogacao2', placarPenaltis1 = '$placarPenaltis1', placarPenaltis2 = '$placarPenaltis2', placarFinal1 = '$placarFinal1', placarFinal2 = '$placarFinal2', horarioFinal1 = '$horarioFinal1', horarioFinal2 = '$horarioFinal2', faltasCasa1Periodo = '$faltasCasa1Periodo', faltasCasa2Periodo = '$faltasCasa2Periodo', faltasFora1Periodo = '$faltasFora1Periodo', faltasFora2Periodo = '$faltasFora2Periodo', amareloCasa1 = '$amareloCasa1', amareloCasa2 = '$amareloCasa2', 
            amareloCasa3 = '$amareloCasa3', amareloCasa4 = '$amareloCasa4', amareloCasa5 = '$amareloCasa5', amareloCasa6 = '$amareloCasa6', amareloCasa7 = '$amareloCasa7', amareloCasa8 = '$amareloCasa8', amareloCasa9 = '$amareloCasa9', amareloCasa10 = '$amareloCasa10', amareloCasa11 = '$amareloCasa11', amareloCasa12 = '$amareloCasa12', amareloCasa13 = '$amareloCasa13', amareloCasa14 = '$amareloCasa14', amareloCasa15 = '$amareloCasa15', minAmareloCasa1 = '$minAmareloCasa1', minAmareloCasa2 = '$minAmareloCasa2', minAmareloCasa3 = '$minAmareloCasa3', minAmareloCasa4 = '$minAmareloCasa4', minAmareloCasa5 = '$minAmareloCasa5', minAmareloCasa6 = '$minAmareloCasa6', minAmareloCasa7 = '$minAmareloCasa7', 
            minAmareloCasa8 = '$minAmareloCasa8', minAmareloCasa9 = '$minAmareloCasa9', minAmareloCasa10 = '$minAmareloCasa10', minAmareloCasa11 = '$minAmareloCasa11', minAmareloCasa12 = '$minAmareloCasa12', minAmareloCasa13 = '$minAmareloCasa13', minAmareloCasa14 = '$minAmareloCasa14', 
            minAmareloCasa15 = '$minAmareloCasa15', secAmareloCasa1 = '$secAmareloCasa1', secAmareloCasa2 = '$secAmareloCasa2', secAmareloCasa3 = '$secAmareloCasa3', secAmareloCasa4 = '$secAmareloCasa4', secAmareloCasa5 = '$secAmareloCasa5', secAmareloCasa6 = '$secAmareloCasa6', secAmareloCasa7 = '$secAmareloCasa7', 
            secAmareloCasa8 = '$secAmareloCasa8', secAmareloCasa9 = '$secAmareloCasa9', secAmareloCasa10 = '$secAmareloCasa10', secAmareloCasa11 = '$secAmareloCasa11', secAmareloCasa12 = '$secAmareloCasa12', secAmareloCasa13 = '$secAmareloCasa13', secAmareloCasa14 = '$secAmareloCasa14', 
            secAmareloCasa15 = '$secAmareloCasa15', vermelhoCasa1 = '$vermelhoCasa1', vermelhoCasa2 = '$vermelhoCasa2', 
            vermelhoCasa3 = '$vermelhoCasa3', vermelhoCasa4 = '$vermelhoCasa4', vermelhoCasa5 = '$vermelhoCasa5', vermelhoCasa6 = '$vermelhoCasa6', vermelhoCasa7 = '$vermelhoCasa7', vermelhoCasa8 = '$vermelhoCasa8', vermelhoCasa9 = '$vermelhoCasa9', vermelhoCasa10 = '$vermelhoCasa10', vermelhoCasa11 = '$vermelhoCasa11', vermelhoCasa12 = '$vermelhoCasa12', 
            vermelhoCasa13 = '$vermelhoCasa13', vermelhoCasa14 = '$vermelhoCasa14', vermelhoCasa15 = '$vermelhoCasa15', minVermelhoCasa1 = '$minVermelhoCasa1', minVermelhoCasa2 = '$minVermelhoCasa2', minVermelhoCasa3 = '$minVermelhoCasa3', minVermelhoCasa4 = '$minVermelhoCasa4', minVermelhoCasa5 = '$minVermelhoCasa5', minVermelhoCasa6 = '$minVermelhoCasa6', minVermelhoCasa7 = '$minVermelhoCasa7', 
            minVermelhoCasa8 = '$minVermelhoCasa8', minVermelhoCasa9 = '$minVermelhoCasa9', minVermelhoCasa10 = '$minVermelhoCasa10', minVermelhoCasa11 = '$minVermelhoCasa11', minVermelhoCasa12 = '$minVermelhoCasa12', minVermelhoCasa13 = '$minVermelhoCasa13', minVermelhoCasa14 = '$minVermelhoCasa14', 
            minVermelhoCasa15 = '$minVermelhoCasa15', secVermelhoCasa1 = '$secVermelhoCasa1', secVermelhoCasa2 = '$secVermelhoCasa2', secVermelhoCasa3 = '$secVermelhoCasa3', secVermelhoCasa4 = '$secVermelhoCasa4', secVermelhoCasa5 = '$secVermelhoCasa5', secVermelhoCasa6 = '$secVermelhoCasa6', secVermelhoCasa7 = '$secVermelhoCasa7', 
            secVermelhoCasa8 = '$secVermelhoCasa8', secVermelhoCasa9 = '$secVermelhoCasa9', secVermelhoCasa10 = '$secVermelhoCasa10', secVermelhoCasa11 = '$secVermelhoCasa11', secVermelhoCasa12 = '$secVermelhoCasa12', secVermelhoCasa13 = '$secVermelhoCasa13', secVermelhoCasa14 = '$secVermelhoCasa14', 
            secVermelhoCasa15 = '$secVermelhoCasa15', golsCasa1 = '$golsCasa1', golsCasa2 = '$golsCasa2', golsCasa3 = '$golsCasa3', golsCasa4 = '$golsCasa4', golsCasa5 = '$golsCasa5', golsCasa6 = '$golsCasa6', golsCasa7 = '$golsCasa7', 
            golsCasa8 = '$golsCasa8', golsCasa9 = '$golsCasa9', golsCasa10 = '$golsCasa10', golsCasa11 = '$golsCasa11', golsCasa12 = '$golsCasa12', golsCasa13 = '$golsCasa13', golsCasa14 = '$golsCasa14', golsCasa15 = '$golsCasa15', golsCasa16 = '$golsCasa16', golsCasa17 = '$golsCasa17', golsCasa18 = '$golsCasa18', golsCasa19 = '$golsCasa19', golsCasa20 = '$golsCasa20', 
            golsCasa21 = '$golsCasa21', golsCasa22 = '$golsCasa22', minGolsCasa1 = '$minGolsCasa1', minGolsCasa2 = '$minGolsCasa2', minGolsCasa3 = '$minGolsCasa3', minGolsCasa4 = '$minGolsCasa4', minGolsCasa5 = '$minGolsCasa5', minGolsCasa6 = '$minGolsCasa6', minGolsCasa7 = '$minGolsCasa7', 
            minGolsCasa8 = '$minGolsCasa8', minGolsCasa9 = '$minGolsCasa9', minGolsCasa10 = '$minGolsCasa10', minGolsCasa11 = '$minGolsCasa11', minGolsCasa12 = '$minGolsCasa12', minGolsCasa13 = '$minGolsCasa13', minGolsCasa14 = '$minGolsCasa14', 
            minGolsCasa15 = '$minGolsCasa15', minGolsCasa16 = '$minGolsCasa16', minGolsCasa17 = '$minGolsCasa17', minGolsCasa18 = '$minGolsCasa18', minGolsCasa19 = '$minGolsCasa19', minGolsCasa20 = '$minGolsCasa20', minGolsCasa21 = '$minGolsCasa21', minGolsCasa22 = '$minGolsCasa22', secGolsCasa1 = '$secGolsCasa1', secGolsCasa2 = '$secGolsCasa2', secGolsCasa3 = '$secGolsCasa3', secGolsCasa4 = '$secGolsCasa4', secGolsCasa5 = '$secGolsCasa5', secGolsCasa6 = '$secGolsCasa6', secGolsCasa7 = '$secGolsCasa7', 
            secGolsCasa8 = '$secGolsCasa8', secGolsCasa9 = '$secGolsCasa9', secGolsCasa10 = '$secGolsCasa10', secGolsCasa11 = '$secGolsCasa11', secGolsCasa12 = '$secGolsCasa12', secGolsCasa13 = '$secGolsCasa13', secGolsCasa14 = '$secGolsCasa14', 
            secGolsCasa15 = '$secGolsCasa15', secGolsCasa16 = '$secGolsCasa16', secGolsCasa17 = '$secGolsCasa17', secGolsCasa18 = '$secGolsCasa18', secGolsCasa19 = '$secGolsCasa19', secGolsCasa20 = '$secGolsCasa20', secGolsCasa21 = '$secGolsCasa21', secGolsCasa22 = '$secGolsCasa22', amareloFora1 = '$amareloFora1', amareloFora2 = '$amareloFora2', amareloFora3 = '$amareloFora3', amareloFora4 = '$amareloFora4', amareloFora5 = '$amareloFora5', amareloFora6 = '$amareloFora6', amareloFora7 = '$amareloFora7', amareloFora8 = '$amareloFora8', 
            amareloFora9 = '$amareloFora9', amareloFora10 = '$amareloFora10', amareloFora11 = '$amareloFora11', amareloFora12 = '$amareloFora12', amareloFora13 = '$amareloFora13', amareloFora14 = '$amareloFora14', amareloFora15 = '$amareloFora15', minAmareloFora1 = '$minAmareloFora1', minAmareloFora2 = '$minAmareloFora2', minAmareloFora3 = '$minAmareloFora3', minAmareloFora4 = '$minAmareloFora4', minAmareloFora5 = '$minAmareloFora5', minAmareloFora6 = '$minAmareloFora6', minAmareloFora7 = '$minAmareloFora7', 
            minAmareloFora8 = '$minAmareloFora8', minAmareloFora9 = '$minAmareloFora9', minAmareloFora10 = '$minAmareloFora10', minAmareloFora11 = '$minAmareloFora11', minAmareloFora12 = '$minAmareloFora12', minAmareloFora13 = '$minAmareloFora13', minAmareloFora14 = '$minAmareloFora14', 
            minAmareloFora15 = '$minAmareloFora15', secAmareloFora1 = '$secAmareloFora1', secAmareloFora2 = '$secAmareloFora2', secAmareloFora3 = '$secAmareloFora3', secAmareloFora4 = '$secAmareloFora4', secAmareloFora5 = '$secAmareloFora5', secAmareloFora6 = '$secAmareloFora6', secAmareloFora7 = '$secAmareloFora7', 
            secAmareloFora8 = '$secAmareloFora8', secAmareloFora9 = '$secAmareloFora9', secAmareloFora10 = '$secAmareloFora10', secAmareloFora11 = '$secAmareloFora11', secAmareloFora12 = '$secAmareloFora12', secAmareloFora13 = '$secAmareloFora13', secAmareloFora14 = '$secAmareloFora14', 
            secAmareloFora15 = '$secAmareloFora15', vermelhoFora1 = '$vermelhoFora1', vermelhoFora2 = '$vermelhoFora2', vermelhoFora3 = '$vermelhoFora3', vermelhoFora4 = '$vermelhoFora4', 
            vermelhoFora5 = '$vermelhoFora5', vermelhoFora6 = '$vermelhoFora6', vermelhoFora7 = '$vermelhoFora7', vermelhoFora8 = '$vermelhoFora8', vermelhoFora9 = '$vermelhoFora9', vermelhoFora10 = '$vermelhoFora10', vermelhoFora11 = '$vermelhoFora11', vermelhoFora12 = '$vermelhoFora12', vermelhoFora13 = '$vermelhoFora13', vermelhoFora14 = '$vermelhoFora14', 
            vermelhoFora15 = '$vermelhoFora15', minVermelhoFora1 = '$minVermelhoFora1', minVermelhoFora2 = '$minVermelhoFora2', minVermelhoFora3 = '$minVermelhoFora3', minVermelhoFora4 = '$minVermelhoFora4', minVermelhoFora5 = '$minVermelhoFora5', minVermelhoFora6 = '$minVermelhoFora6', minVermelhoFora7 = '$minVermelhoFora7', 
            minVermelhoFora8 = '$minVermelhoFora8', minVermelhoFora9 = '$minVermelhoFora9', minVermelhoFora10 = '$minVermelhoFora10', minVermelhoFora11 = '$minVermelhoFora11', minVermelhoFora12 = '$minVermelhoFora12', minVermelhoFora13 = '$minVermelhoFora13', minVermelhoFora14 = '$minVermelhoFora14', 
            minVermelhoFora15 = '$minVermelhoFora15', secVermelhoFora1 = '$secVermelhoFora1', secVermelhoFora2 = '$secVermelhoFora2', secVermelhoFora3 = '$secVermelhoFora3', secVermelhoFora4 = '$secVermelhoFora4', secVermelhoFora5 = '$secVermelhoFora5', secVermelhoFora6 = '$secVermelhoFora6', secVermelhoFora7 = '$secVermelhoFora7', 
            secVermelhoFora8 = '$secVermelhoFora8', secVermelhoFora9 = '$secVermelhoFora9', secVermelhoFora10 = '$secVermelhoFora10', secVermelhoFora11 = '$secVermelhoFora11', secVermelhoFora12 = '$secVermelhoFora12', secVermelhoFora13 = '$secVermelhoFora13', secVermelhoFora14 = '$secVermelhoFora14', 
            secVermelhoFora15 = '$secVermelhoFora15', vermelhoTreinadorCasa = '$vermelhoTreinadorCasa', minVerTreinadorCasa = '$minVerTreinadorCasa', secVerTreinadorCasa = '$secVerTreinadorCasa', vermelhoAuxiliarCasa = $vermelhoAuxiliarCasa, minVerAuxiliarCasa = '$minVerAuxiliarCasa', secVerAuxiliarCasa = '$secVerAuxiliarCasa', vermelhoMassagistaCasa = '$vermelhoMassagistaCasa', minVerMassagistaCasa = '$minVerMassagistaCasa', secVerMassagistaCasa = '$secVerMassagistaCasa', vermelhoTreinadorFora = '$vermelhoTreinadorFora', 
            minVerTreinadorFora = '$minVerTreinadorFora', secVerTreinadorFora = '$secVerTreinadorFora', vermelhoAuxiliarFora = $vermelhoAuxiliarFora, minVerAuxiliarFora = '$minVerAuxiliarFora', secVerAuxiliarFora = '$secVerAuxiliarFora', vermelhoMassagistaFora = '$vermelhoMassagistaFora', minVerMassagistaFora = '$minVerMassagistaFora', secVerMassagistaFora = '$secVerMassagistaFora', minTempoCasa1Periodo = '$minTempoCasa1Periodo', secTempoCasa1Periodo = '$secTempoCasa1Periodo', minTempoCasa2Periodo = '$minTempoCasa2Periodo', 
            secTempoCasa2Periodo = '$secTempoCasa2Periodo', minTempoFora1Periodo = '$minTempoFora1Periodo', secTempoFora1Periodo = '$secTempoFora1Periodo', minTempoFora2Periodo = '$minTempoFora2Periodo', secTempoFora2Periodo = '$secTempoFora2Periodo', golsFora1 = '$golsFora1', golsFora2 = '$golsFora2', golsFora3 = '$golsFora3', golsFora4 = '$golsFora4', golsFora5 = '$golsFora5', 
            golsFora6 = '$golsFora6', golsFora7 = '$golsFora7', golsFora8 = '$golsFora8', golsFora9 = '$golsFora9', golsFora10 = '$golsFora10', golsFora11 = '$golsFora11', golsFora12 = '$golsFora12', golsFora13 = '$golsFora13', golsFora14 = '$golsFora14', golsFora15 = '$golsFora15', golsFora16 = '$golsFora16', golsFora17 = '$golsFora17', golsFora18 = '$golsFora18', golsFora19 = '$golsFora19', golsFora20 = '$golsFora20', golsFora21 = '$golsFora21', golsFora22 = '$golsFora22', minGolsFora1 = '$minGolsFora1', 
            minGolsFora2 = '$minGolsFora2', minGolsFora3 = '$minGolsFora3', minGolsFora4 = '$minGolsFora4', minGolsFora5 = '$minGolsFora5', minGolsFora6 = '$minGolsFora6', minGolsFora7 = '$minGolsFora7', minGolsFora8 = '$minGolsFora8', minGolsFora9 = '$minGolsFora9', minGolsFora10 = '$minGolsFora10', minGolsFora11 = '$minGolsFora11', minGolsFora12 = '$minGolsFora12', minGolsFora13 = '$minGolsFora13', minGolsFora14 = '$minGolsFora14', 
            minGolsFora15 = '$minGolsFora15', minGolsFora16 = '$minGolsFora16', minGolsFora17 = '$minGolsFora17', minGolsFora18 = '$minGolsFora18', minGolsFora19 = '$minGolsFora19', minGolsFora20 = '$minGolsFora20', minGolsFora21 = '$minGolsFora21', minGolsFora22 = '$minGolsFora22', secGolsFora1 = '$secGolsFora1', secGolsFora2 = '$secGolsFora2', secGolsFora3 = '$secGolsFora3', secGolsFora4 = '$secGolsFora4', secGolsFora5 = '$secGolsFora5', secGolsFora6 = '$secGolsFora6', secGolsFora7 = '$secGolsFora7', 
            secGolsFora8 = '$secGolsFora8', secGolsFora9 = '$secGolsFora9', secGolsFora10 = '$secGolsFora10', secGolsFora11 = '$secGolsFora11', secGolsFora12 = '$secGolsFora12', secGolsFora13 = '$secGolsFora13', secGolsFora14 = '$secGolsFora14', 
            secGolsFora15 = '$secGolsFora15', secGolsFora16 = '$secGolsFora16', secGolsFora17 = '$secGolsFora17', secGolsFora18 = '$secGolsFora18', secGolsFora19 = '$secGolsFora19', secGolsFora20 = '$secGolsFora20', secGolsFora21 = '$secGolsFora21', secGolsFora22 = '$secGolsFora22', anotacoesPartida = '$anotacoesPartida' WHERE equipeCasa = '$equipeCasa' AND equipeFora = '$equipeVisitante'"; 
            $funcionou_update = $mysqli->query($sql_update) or die($mysqli->error);

            $sql_update2 = "UPDATE jogoatual SET equipeCasa = '$equipeCasa', golsCasa = '$golsCasa', equipeFora = '$equipeVisitante', golsFora = '$golsVisitante', categoria = '$categoria' WHERE id_partida = '1'"; 
            $funcionou_update2 = $mysqli->query($sql_update2) or die($mysqli->error);
            
            $sql_updateTabelaJogos = "UPDATE tabela_jogos SET golsCasa = '$golsCasa', golsFora = '$golsVisitante' WHERE equipeCasa = '$equipeCasa' AND equipeFora = '$equipeVisitante'";
            $funcionou_update3 = $mysqli->query($sql_updateTabelaJogos) or die($mysqli->error);
        }
    }
?>