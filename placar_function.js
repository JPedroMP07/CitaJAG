//Codigo Placar Ao Vivo

let select_golsCasa = document.getElementById("golsCasa");
let select_golsVisitante = document.getElementById("golsVisitante");

let dataDaPartida = document.getElementById("dataPartida");
//Nomes
let nome1ArbitroV = document.getElementById("nome1Arbitro");
let nome2ArbitroV = document.getElementById("nome2Arbitro");
let nomeAnotadorV = document.getElementById("nomeAnotador");
let nomeCronometristaV = document.getElementById("nomeCronometrista");
//Placar e horário 1 período
let placar1PeriodoCasa = document.getElementById("placar1Periodo1");
let placar1PeriodoFora = document.getElementById("placar1Periodo2");
let horarioInicio1PeriodoCasa = document.getElementById("horarioInicio1Periodo1")
let horarioInicio1PeriodoFora = document.getElementById("horarioInicio1Periodo2");
//Placar e horário 2 período
let placar2PeriodoCasa = document.getElementById("placar2Periodo1");
let placar2PeriodoFora = document.getElementById("placar2Periodo2");
let horarioInicio2PeriodoCasa = document.getElementById("horarioInicio2Periodo1");
let horarioInicio2PeriodoFora = document.getElementById("horarioInicio2Periodo2");
//Placar e horário Prorrogação
let placarProrrogacaoCasa = document.getElementById("placarProrrogacao1");
let placarProrrogacaoFora = document.getElementById("placarProrrogacao2");
let horarioInicioProrrogacaoCasa = document.getElementById("horarioInicioProrrogacao1");
let horarioInicioProrrogacaoFora = document.getElementById("horarioInicioProrrogacao2");
//Placar e horário Pênaltis
let placarPenaltisCasa = document.getElementById("placarPenaltis1");
let placarPenaltisFora = document.getElementById("placarPenaltis2");
//Placar e horário final do jogo
let horarioFinalCasa = document.getElementById("horarioFinal1");
let horarioFinalFora = document.getElementById("horarioFinal2");
let placarFinalCasa = document.getElementById("placarFinal1");
let placarFinalFora = document.getElementById("placarFinal2");
//Números de falta Casa 1 período
let faltasCasa1Periodo2 = document.getElementById("faltasCasa1Periodo2");
let faltasCasa1Periodo3 = document.getElementById("faltasCasa1Periodo3");
let faltasCasa1Periodo4 = document.getElementById("faltasCasa1Periodo4");
let faltasCasa1Periodo5 = document.getElementById("faltasCasa1Periodo5");


//Dados Equipe Casa
let select_amareloCasa1 = document.getElementById("amareloCasa1");
let minAmarelo1Casa1 = document.getElementById("minAmareloCasa1");
let secAmarelo1Casa1 = document.getElementById("secAmareloCasa1");
let select_amareloCasa2 = document.getElementById("amareloCasa2");
let minAmareloCasa21 = document.getElementById("minAmareloCasa2");
let secAmareloCasa21 = document.getElementById("secAmareloCasa2");
let select_amareloCasa3 = document.getElementById("amareloCasa3");
let minAmareloCasa31 = document.getElementById("minAmareloCasa3");
let secAmareloCasa31 = document.getElementById("secAmareloCasa3");
let select_amareloCasa4 = document.getElementById("amareloCasa4");
let minAmareloCasa41 = document.getElementById("minAmareloCasa4");
let secAmareloCasa41 = document.getElementById("secAmareloCasa4");
let select_amareloCasa5 = document.getElementById("amareloCasa5");
let minAmareloCasa51 = document.getElementById("minAmareloCasa5");
let secAmareloCasa51 = document.getElementById("secAmareloCasa5");
let select_amareloCasa6 = document.getElementById("amareloCasa6");
let minAmareloCasa61 = document.getElementById("minAmareloCasa6");
let secAmareloCasa61 = document.getElementById("secAmareloCasa6");
let select_amareloCasa7 = document.getElementById("amareloCasa7");
let minAmareloCasa71 = document.getElementById("minAmareloCasa7");
let secAmareloCasa71 = document.getElementById("secAmareloCasa7");
let select_amareloCasa8 = document.getElementById("amareloCasa8");
let minAmareloCasa81 = document.getElementById("minAmareloCasa8");
let secAmareloCasa81 = document.getElementById("secAmareloCasa8");
let select_amareloCasa9 = document.getElementById("amareloCasa9");
let minAmareloCasa91 = document.getElementById("minAmareloCasa9");
let secAmareloCasa91 = document.getElementById("secAmareloCasa9");
let select_amareloCasa10 = document.getElementById("amareloCasa10");
let minAmareloCasa101 = document.getElementById("minAmareloCasa10");
let secAmareloCasa101 = document.getElementById("secAmareloCasa10");
let select_amareloCasa11 = document.getElementById("amareloCasa11");
let minAmareloCasa111 = document.getElementById("minAmareloCasa11");
let secAmareloCasa111 = document.getElementById("secAmareloCasa11");
let select_amareloCasa12 = document.getElementById("amareloCasa12");
let minAmareloCasa121 = document.getElementById("minAmareloCasa12");
let secAmareloCasa121 = document.getElementById("secAmareloCasa12");
let select_amareloCasa13 = document.getElementById("amareloCasa13");
let minAmareloCasa131 = document.getElementById("minAmareloCasa13");
let secAmareloCasa131 = document.getElementById("secAmareloCasa13");
let select_amareloCasa14 = document.getElementById("amareloCasa14");
let minAmareloCasa141 = document.getElementById("minAmareloCasa14");
let secAmareloCasa141 = document.getElementById("secAmareloCasa14");
let select_amareloCasa15 = document.getElementById("amareloCasa15");
let minAmareloCasa151 = document.getElementById("minAmareloCasa15");
let secAmareloCasa151 = document.getElementById("secAmareloCasa15");

let select_vermelhoCasa1 = document.getElementById("vermelhoCasa1");
let minVermelho1Casa1 = document.getElementById("minVermelhoCasa1");
let secVermelho1Casa1 = document.getElementById("secVermelhoCasa1");
let select_vermelhoCasa2 = document.getElementById("vermelhoCasa2");
let minVermelhoCasa21 = document.getElementById("minVermelhoCasa2");
let secVermelhoCasa21 = document.getElementById("secVermelhoCasa2");
let select_vermelhoCasa3 = document.getElementById("vermelhoCasa3");
let minVermelhoCasa31 = document.getElementById("minVermelhoCasa3");
let secVermelhoCasa31 = document.getElementById("secVermelhoCasa3");
let select_vermelhoCasa4 = document.getElementById("vermelhoCasa4");
let minVermelhoCasa41 = document.getElementById("minVermelhoCasa4");
let secVermelhoCasa41 = document.getElementById("secVermelhoCasa4");
let select_vermelhoCasa5 = document.getElementById("vermelhoCasa5");
let minVermelhoCasa51 = document.getElementById("minVermelhoCasa5");
let secVermelhoCasa51 = document.getElementById("secVermelhoCasa5");
let select_vermelhoCasa6 = document.getElementById("vermelhoCasa6");
let minVermelhoCasa61 = document.getElementById("minVermelhoCasa6");
let secVermelhoCasa61 = document.getElementById("secVermelhoCasa6");
let select_vermelhoCasa7 = document.getElementById("vermelhoCasa7");
let minVermelhoCasa71 = document.getElementById("minVermelhoCasa7");
let secVermelhoCasa71 = document.getElementById("secVermelhoCasa7");
let select_vermelhoCasa8 = document.getElementById("vermelhoCasa8");
let minVermelhoCasa81 = document.getElementById("minVermelhoCasa8");
let secVermelhoCasa81 = document.getElementById("secVermelhoCasa8");
let select_vermelhoCasa9 = document.getElementById("vermelhoCasa9");
let minVermelhoCasa91 = document.getElementById("minVermelhoCasa9");
let secVermelhoCasa91 = document.getElementById("secVermelhoCasa9");
let select_vermelhoCasa10 = document.getElementById("vermelhoCasa10");
let minVermelhoCasa101 = document.getElementById("minVermelhoCasa10");
let secVermelhoCasa101 = document.getElementById("secVermelhoCasa10");
let select_vermelhoCasa11 = document.getElementById("vermelhoCasa11");
let minVermelhoCasa111 = document.getElementById("minVermelhoCasa11");
let secVermelhoCasa111 = document.getElementById("secVermelhoCasa11");
let select_vermelhoCasa12 = document.getElementById("vermelhoCasa12");
let minVermelhoCasa121 = document.getElementById("minVermelhoCasa12");
let secVermelhoCasa121 = document.getElementById("secVermelhoCasa12");
let select_vermelhoCasa13 = document.getElementById("vermelhoCasa13");
let minVermelhoCasa131 = document.getElementById("minVermelhoCasa13");
let secVermelhoCasa131 = document.getElementById("secVermelhoCasa13");
let select_vermelhoCasa14 = document.getElementById("vermelhoCasa14");
let minVermelhoCasa141 = document.getElementById("minVermelhoCasa14");
let secVermelhoCasa141 = document.getElementById("secVermelhoCasa14");
let select_vermelhoCasa15 = document.getElementById("vermelhoCasa15");
let minVermelhoCasa151 = document.getElementById("minVermelhoCasa15");
let secVermelhoCasa151 = document.getElementById("secVermelhoCasa15");

let select_golsCasa1 = document.getElementById("gols1");
let select_golsCasa2 = document.getElementById("gols2");
let select_golsCasa3 = document.getElementById("gols3");
let select_golsCasa4 = document.getElementById("gols4");
let select_golsCasa5 = document.getElementById("gols5");
let select_golsCasa6 = document.getElementById("gols6");
let select_golsCasa7 = document.getElementById("gols7");
let select_golsCasa8 = document.getElementById("gols8");
let select_golsCasa9 = document.getElementById("gols9");
let select_golsCasa10 = document.getElementById("gols10");
let select_golsCasa11 = document.getElementById("gols11");
let select_golsCasa12 = document.getElementById("gols12");
let select_golsCasa13 = document.getElementById("gols13");
let select_golsCasa14 = document.getElementById("gols14");
let select_golsCasa15 = document.getElementById("gols15");
let select_golsCasa16 = document.getElementById("gols16");
let select_golsCasa17 = document.getElementById("gols17");
let select_golsCasa18 = document.getElementById("gols18");
let select_golsCasa19 = document.getElementById("gols19");
let select_golsCasa20 = document.getElementById("gols20");
let select_golsCasa21 = document.getElementById("gols21");
let select_golsCasa22 = document.getElementById("gols22");

// Parte da comissão técnica Casa
let vermTreinadorCasa = document.getElementById("vermelhoTreinadorCasa");
let minVermTreinadorCasa = document.getElementById("minVerTreinadorCasa");
let secVermTreinadorCasa = document.getElementById("secVerTreinadorCasa");
// Auxiliar
let vermAuxiliarCasa = document.getElementById("vermelhoAuxiliarCasa");
let minVermAuxiliarCasa = document.getElementById("minVerAuxiliarCasa");
let secVermAuxiliarCasa= document.getElementById("secVerAuxiliarCasa");
// Massagista
let vermMassagistaCasa = document.getElementById("vermelhoMassagistaCasa");
let minVermMassagistaCasa = document.getElementById("minVerMassagistaCasa");
let secVermMassagistaCasa = document.getElementById("secVerMassagistaCasa");
// Pedidos de Tempo
let secTempoCasa1Periodo1 = document.getElementById("secTempoCasa1Periodo");
let minTempoCasa1Periodo1 = document.getElementById("minTempoCasa1Periodo");
let minTempoCasa2Periodo1 = document.getElementById("minTempoCasa2Periodo");
let secTempoCasa2Periodo1 = document.getElementById("secTempoCasa2Periodo");

// Parte da comissão técnica Fora
let vermTreinadorFora = document.getElementById("vermelhoTreinadorFora");
let minVermTreinadorFora = document.getElementById("minVerTreinadorFora");
let secVermTreinadorFora = document.getElementById("secVerTreinadorFora");
// Auxiliar
let vermAuxiliarFora = document.getElementById("vermelhoAuxiliarFora");
let minVermAuxiliarFora = document.getElementById("minVerAuxiliarFora");
let secVermAuxiliarFora= document.getElementById("secVerAuxiliarFora");
// Massagista
let vermMassagistaFora = document.getElementById("vermelhoMassagistaFora");
let minVermMassagistaFora = document.getElementById("minVerMassagistaFora");
let secVermMassagistaFora = document.getElementById("secVerMassagistaFora");
// Pedidos de Tempo
let minTempoFora1Periodo1 = document.getElementById("minTempoFora1Periodo");
let secTempoFora1Periodo1 = document.getElementById("secTempoFora1Periodo");
let minTempoFora2Periodo1 = document.getElementById("minTempoFora2Periodo");
let secTempoFora2Periodo1 = document.getElementById("secTempoFora2Periodo");

let minGols1Casa1 = document.getElementById("minGolsCasa1");
let secGols1Casa1 = document.getElementById("secGolsCasa1");
let minGols2Casa1 = document.getElementById("minGolsCasa2");
let secGols2Casa1 = document.getElementById("secGolsCasa2");
let minGolsCasa31 = document.getElementById("minGolsCasa3");
let secGolsCasa31 = document.getElementById("secGolsCasa3");
let minGolsCasa41 = document.getElementById("minGolsCasa4");
let secGolsCasa41 = document.getElementById("secGolsCasa4");
let minGolsCasa51 = document.getElementById("minGolsCasa5");
let secGolsCasa51 = document.getElementById("secGolsCasa5");
let minGolsCasa61 = document.getElementById("minGolsCasa6");
let secGolsCasa61 = document.getElementById("secGolsCasa6");
let minGolsCasa71 = document.getElementById("minGolsCasa7");
let secGolsCasa71 = document.getElementById("secGolsCasa7");
let minGolsCasa81 = document.getElementById("minGolsCasa8");
let secGolsCasa81 = document.getElementById("secGolsCasa8");
let minGolsCasa91 = document.getElementById("minGolsCasa9");
let secGolsCasa91 = document.getElementById("secGolsCasa9");
let minGolsCasa101 = document.getElementById("minGolsCasa10");
let secGolsCasa101 = document.getElementById("secGolsCasa10");
let minGolsCasa111 = document.getElementById("minGolsCasa11");
let secGolsCasa111 = document.getElementById("secGolsCasa11");
let minGolsCasa121 = document.getElementById("minGolsCasa12");
let secGolsCasa121 = document.getElementById("secGolsCasa12");
let minGolsCasa131 = document.getElementById("minGolsCasa13");
let secGolsCasa131 = document.getElementById("secGolsCasa13");
let minGolsCasa141 = document.getElementById("minGolsCasa14");
let secGolsCasa141 = document.getElementById("secGolsCasa14");
let minGolsCasa151 = document.getElementById("minGolsCasa15");
let secGolsCasa151 = document.getElementById("secGolsCasa15");
let minGolsCasa161 = document.getElementById("minGolsCasa16");
let secGolsCasa161 = document.getElementById("secGolsCasa16");
let minGolsCasa171 = document.getElementById("minGolsCasa17");
let secGolsCasa171 = document.getElementById("secGolsCasa17");
let minGolsCasa181 = document.getElementById("minGolsCasa18");
let secGolsCasa181 = document.getElementById("secGolsCasa18");
let minGolsCasa191 = document.getElementById("minGolsCasa19");
let secGolsCasa191 = document.getElementById("secGolsCasa19");
let minGolsCasa201 = document.getElementById("minGolsCasa20");
let secGolsCasa201 = document.getElementById("secGolsCasa20");
let minGolsCasa211 = document.getElementById("minGolsCasa21");
let secGolsCasa211 = document.getElementById("secGolsCasa21");
let minGolsCasa221 = document.getElementById("minGolsCasa22");
let secGolsCasa221 = document.getElementById("secGolsCasa22");


//Dados Equipe Fora
let select_amareloFora1 = document.getElementById("amareloFora1");
let minAmarelo1Fora1 = document.getElementById("minAmareloFora1");
let secAmarelo1Fora1 = document.getElementById("secAmareloFora1");
let select_amareloFora2 = document.getElementById("amareloFora2");
let minAmareloFora21 = document.getElementById("minAmareloFora2");
let secAmareloFora21 = document.getElementById("secAmareloFora2");
let select_amareloFora3 = document.getElementById("amareloFora3");
let minAmareloFora31 = document.getElementById("minAmareloFora3");
let secAmareloFora31 = document.getElementById("secAmareloFora3");
let select_amareloFora4 = document.getElementById("amareloFora4");
let minAmareloFora41 = document.getElementById("minAmareloFora4");
let secAmareloFora41 = document.getElementById("secAmareloFora4");
let select_amareloFora5 = document.getElementById("amareloFora5");
let minAmareloFora51 = document.getElementById("minAmareloFora5");
let secAmareloFora51 = document.getElementById("secAmareloFora5");
let select_amareloFora6 = document.getElementById("amareloFora6");
let minAmareloFora61 = document.getElementById("minAmareloFora6");
let secAmareloFora61 = document.getElementById("secAmareloFora6");
let select_amareloFora7 = document.getElementById("amareloFora7");
let minAmareloFora71 = document.getElementById("minAmareloFora7");
let secAmareloFora71 = document.getElementById("secAmareloFora7");
let select_amareloFora8 = document.getElementById("amareloFora8");
let minAmareloFora81 = document.getElementById("minAmareloFora8");
let secAmareloFora81 = document.getElementById("secAmareloFora8");
let select_amareloFora9 = document.getElementById("amareloFora9");
let minAmareloFora91 = document.getElementById("minAmareloFora9");
let secAmareloFora91 = document.getElementById("secAmareloFora9");
let select_amareloFora10 = document.getElementById("amareloFora10");
let minAmareloFora101 = document.getElementById("minAmareloFora10");
let secAmareloFora101 = document.getElementById("secAmareloFora10");
let select_amareloFora11 = document.getElementById("amareloFora11");
let minAmareloFora111 = document.getElementById("minAmareloFora11");
let secAmareloFora111 = document.getElementById("secAmareloFora11");
let select_amareloFora12 = document.getElementById("amareloFora12");
let minAmareloFora121 = document.getElementById("minAmareloFora12");
let secAmareloFora121 = document.getElementById("secAmareloFora12");
let select_amareloFora13 = document.getElementById("amareloFora13");
let minAmareloFora131 = document.getElementById("minAmareloFora13");
let secAmareloFora131 = document.getElementById("secAmareloFora13");
let select_amareloFora14 = document.getElementById("amareloFora14");
let minAmareloFora141 = document.getElementById("minAmareloFora14");
let secAmareloFora141 = document.getElementById("secAmareloFora14");
let select_amareloFora15 = document.getElementById("amareloFora15");
let minAmareloFora151 = document.getElementById("minAmareloFora15");
let secAmareloFora151 = document.getElementById("secAmareloFora15");

let select_vermelhoFora1 = document.getElementById("vermelhoFora1");
let minVermelho1Fora1 = document.getElementById("minVermelhoFora1");
let secVermelho1Fora1 = document.getElementById("secVermelhoFora1");
let select_vermelhoFora2 = document.getElementById("vermelhoFora2");
let minVermelhoFora21 = document.getElementById("minVermelhoFora2");
let secVermelhoFora21 = document.getElementById("secVermelhoFora2");
let select_vermelhoFora3 = document.getElementById("vermelhoFora3");
let minVermelhoFora31 = document.getElementById("minVermelhoFora3");
let secVermelhoFora31 = document.getElementById("secVermelhoFora3");
let select_vermelhoFora4 = document.getElementById("vermelhoFora4");
let minVermelhoFora41 = document.getElementById("minVermelhoFora4");
let secVermelhoFora41 = document.getElementById("secVermelhoFora4");
let select_vermelhoFora5 = document.getElementById("vermelhoFora5");
let minVermelhoFora51 = document.getElementById("minVermelhoFora5");
let secVermelhoFora51 = document.getElementById("secVermelhoFora5");
let select_vermelhoFora6 = document.getElementById("vermelhoFora6");
let minVermelhoFora61 = document.getElementById("minVermelhoFora6");
let secVermelhoFora61 = document.getElementById("secVermelhoFora6");
let select_vermelhoFora7 = document.getElementById("vermelhoFora7");
let minVermelhoFora71 = document.getElementById("minVermelhoFora7");
let secVermelhoFora71 = document.getElementById("secVermelhoFora7");
let select_vermelhoFora8 = document.getElementById("vermelhoFora8");
let minVermelhoFora81 = document.getElementById("minVermelhoFora8");
let secVermelhoFora81 = document.getElementById("secVermelhoFora8");
let select_vermelhoFora9 = document.getElementById("vermelhoFora9");
let minVermelhoFora91 = document.getElementById("minVermelhoFora9");
let secVermelhoFora91 = document.getElementById("secVermelhoFora9");
let select_vermelhoFora10 = document.getElementById("vermelhoFora10");
let minVermelhoFora101 = document.getElementById("minVermelhoFora10");
let secVermelhoFora101 = document.getElementById("secVermelhoFora10");
let select_vermelhoFora11 = document.getElementById("vermelhoFora11");
let minVermelhoFora111 = document.getElementById("minVermelhoFora11");
let secVermelhoFora111 = document.getElementById("secVermelhoFora11");
let select_vermelhoFora12 = document.getElementById("vermelhoFora12");
let minVermelhoFora121 = document.getElementById("minVermelhoFora12");
let secVermelhoFora121 = document.getElementById("secVermelhoFora12");
let select_vermelhoFora13 = document.getElementById("vermelhoFora13");
let minVermelhoFora131 = document.getElementById("minVermelhoFora13");
let secVermelhoFora131 = document.getElementById("secVermelhoFora13");
let select_vermelhoFora14 = document.getElementById("vermelhoFora14");
let minVermelhoFora141 = document.getElementById("minVermelhoFora14");
let secVermelhoFora141 = document.getElementById("secVermelhoFora14");
let select_vermelhoFora15 = document.getElementById("vermelhoFora15");
let minVermelhoFora151 = document.getElementById("minVermelhoFora15");
let secVermelhoFora151 = document.getElementById("secVermelhoFora15");

let select_golsFora1 = document.getElementById("golsFora1");
let select_golsFora2 = document.getElementById("golsFora2");
let select_golsFora3 = document.getElementById("golsFora3");
let select_golsFora4 = document.getElementById("golsFora4");
let select_golsFora5 = document.getElementById("golsFora5");
let select_golsFora6 = document.getElementById("golsFora6");
let select_golsFora7 = document.getElementById("golsFora7");
let select_golsFora8 = document.getElementById("golsFora8");
let select_golsFora9 = document.getElementById("golsFora9");
let select_golsFora10 = document.getElementById("golsFora10");
let select_golsFora11 = document.getElementById("golsFora11");
let select_golsFora12 = document.getElementById("golsFora12");
let select_golsFora13 = document.getElementById("golsFora13");
let select_golsFora14 = document.getElementById("golsFora14");
let select_golsFora15 = document.getElementById("golsFora15");
let select_golsFora16 = document.getElementById("golsFora16");
let select_golsFora17 = document.getElementById("golsFora17");
let select_golsFora18 = document.getElementById("golsFora18");
let select_golsFora19 = document.getElementById("golsFora19");
let select_golsFora20 = document.getElementById("golsFora20");
let select_golsFora21 = document.getElementById("golsFora21");
let select_golsFora22 = document.getElementById("golsFora22");

let minGols1Fora1 = document.getElementById("minGolsFora1");
let secGols1Fora1 = document.getElementById("secGolsFora1");
let minGols2Fora1 = document.getElementById("minGolsFora2");
let secGols2Fora1 = document.getElementById("secGolsFora2");
let minGolsFora31 = document.getElementById("minGolsFora3");
let secGolsFora31 = document.getElementById("secGolsFora3");
let minGolsFora41 = document.getElementById("minGolsFora4");
let secGolsFora41 = document.getElementById("secGolsFora4");
let minGolsFora51 = document.getElementById("minGolsFora5");
let secGolsFora51 = document.getElementById("secGolsFora5");
let minGolsFora61 = document.getElementById("minGolsFora6");
let secGolsFora61 = document.getElementById("secGolsFora6");
let minGolsFora71 = document.getElementById("minGolsFora7");
let secGolsFora71 = document.getElementById("secGolsFora7");
let minGolsFora81 = document.getElementById("minGolsFora8");
let secGolsFora81 = document.getElementById("secGolsFora8");
let minGolsFora91 = document.getElementById("minGolsFora9");
let secGolsFora91 = document.getElementById("secGolsFora9");
let minGolsFora101 = document.getElementById("minGolsFora10");
let secGolsFora101 = document.getElementById("secGolsFora10");
let minGolsFora111 = document.getElementById("minGolsFora11");
let secGolsFora111 = document.getElementById("secGolsFora11");
let minGolsFora121 = document.getElementById("minGolsFora12");
let secGolsFora121 = document.getElementById("secGolsFora12");
let minGolsFora131 = document.getElementById("minGolsFora13");
let secGolsFora131 = document.getElementById("secGolsFora13");
let minGolsFora141 = document.getElementById("minGolsFora14");
let secGolsFora141 = document.getElementById("secGolsFora14");
let minGolsFora151 = document.getElementById("minGolsFora15");
let secGolsFora151 = document.getElementById("secGolsFora15");
let minGolsFora161 = document.getElementById("minGolsFora16");
let secGolsFora161 = document.getElementById("secGolsFora16");
let minGolsFora171 = document.getElementById("minGolsFora17");
let secGolsFora171 = document.getElementById("secGolsFora17");
let minGolsFora181 = document.getElementById("minGolsFora18");
let secGolsFora181 = document.getElementById("secGolsFora18");
let minGolsFora191 = document.getElementById("minGolsFora19");
let secGolsFora191 = document.getElementById("secGolsFora19");
let minGolsFora201 = document.getElementById("minGolsFora20");
let secGolsFora201 = document.getElementById("secGolsFora20");
let minGolsFora211 = document.getElementById("minGolsFora21");
let secGolsFora211 = document.getElementById("secGolsFora21");
let minGolsFora221 = document.getElementById("minGolsFora22");
let secGolsFora221 = document.getElementById("secGolsFora22");

let anotacoesPartida1 = document.getElementById("anotacoesPartida");

    function checkedFaltaCasa1Periodo1() {
        if(document.getElementById("faltaCasa1Periodo1").checked) {
            faltasCasa1Periodo = "1";
        } else {
            faltasCasa1Periodo = "0";
        }
        return faltasCasa1Periodo;
    }

    function checkedFaltaCasa1Periodo2() {
        if(document.getElementById("faltaCasa1Periodo2").checked) {
            faltasCasa1Periodo = "2";
        } else {
            faltasCasa1Periodo = "0";
        }
        return faltasCasa1Periodo;
    }

    function checkedFaltaCasa1Periodo3() {
        if(document.getElementById("faltaCasa1Periodo3").checked) {
            faltasCasa1Periodo = "3";
        } else {
            faltasCasa1Periodo = "0";
        }
        return faltasCasa1Periodo;
    }

    function checkedFaltaCasa1Periodo4() {
        if(document.getElementById("faltaCasa1Periodo4").checked) {
            faltasCasa1Periodo = "4";
        } else {
            faltasCasa1Periodo = "0";
        }
        return faltasCasa1Periodo;
    }

    function checkedFaltaCasa1Periodo5() {
        if(document.getElementById("faltaCasa1Periodo5").checked) {
            faltasCasa1Periodo = "5";
        } else {
            faltasCasa1Periodo = "0";
        }
        return faltasCasa1Periodo;
    }

    // Faltas 2 Tempo time Casa
    function checkedFaltaCasa2Periodo1() {
        if(document.getElementById("faltaCasa2Periodo1").checked) {
            faltasCasa2Periodo = "1";
        } else {
            faltasCasa2Periodo = "0";
        }
        return faltasCasa2Periodo;
    }

    function checkedFaltaCasa2Periodo2() {
        if(document.getElementById("faltaCasa2Periodo2").checked) {
            faltasCasa2Periodo = "2";
        } else {
            faltasCasa2Periodo = "0";
        }
        return faltasCasa2Periodo;
    }

    function checkedFaltaCasa2Periodo3() {
        if(document.getElementById("faltaCasa2Periodo3").checked) {
            faltasCasa2Periodo = "3";
        } else {
            faltasCasa2Periodo = "0";
        }
        return faltasCasa2Periodo;
    }

    function checkedFaltaCasa2Periodo4() {
        if(document.getElementById("faltaCasa2Periodo4").checked) {
            faltasCasa2Periodo = "4";
        } else {
            faltasCasa2Periodo = "0";
        }
        return faltasCasa2Periodo;
    }

    function checkedFaltaCasa2Periodo5() {
        if(document.getElementById("faltaCasa2Periodo5").checked) {
            faltasCasa2Periodo = "5";
        } else {
            faltasCasa2Periodo = "0";
        }
        return faltasCasa2Periodo;
    }


    //Faltas Fora
    function checkedFaltaFora1Periodo1() {
        if(document.getElementById("faltaFora1Periodo1").checked) {
            faltasFora1Periodo = "1";
        } else {
            faltasFora1Periodo = "0";
        }
        return faltasFora1Periodo;
    }

    function checkedFaltaFora1Periodo2() {
        if(document.getElementById("faltaFora1Periodo2").checked) {
            faltasFora1Periodo = "2";
        } else {
            faltasFora1Periodo = "0";
        }
        return faltasFora1Periodo; 
    }

    function checkedFaltaFora1Periodo3() {
        if(document.getElementById("faltaFora1Periodo3").checked) {
            faltasFora1Periodo = "3";
        } else {
            faltasFora1Periodo = "0";
        }
        return faltasFora1Periodo;
    }

    function checkedFaltaFora1Periodo4() {
        if(document.getElementById("faltaFora1Periodo4").checked) {
            faltasFora1Periodo = "4";
        } else {
            faltasFora1Periodo = "0";
        }
        return faltasFora1Periodo;
    }

    function checkedFaltaFora1Periodo5() {
        if(document.getElementById("faltaFora1Periodo5").checked) {
            faltasFora1Periodo = "5";
        } else {
            faltasFora1Periodo = "0";
        }
        return faltasFora1Periodo;
    }

    // Faltas 2 Tempo time Fora
    function checkedFaltaFora2Periodo1() {
        if(document.getElementById("faltaFora2Periodo1").checked) {
            faltasFora2Periodo = "1";
        } else {
            faltasFora2Periodo = "0";
        }
        return faltasFora2Periodo;
    }

    function checkedFaltaFora2Periodo2() {
        if(document.getElementById("faltaFora2Periodo2").checked) {
            faltasFora2Periodo = "2";
        } else {
            faltasFora2Periodo = "0";
        }
        return faltasFora2Periodo;
    }

    function checkedFaltaFora2Periodo3() {
        if(document.getElementById("faltaFora2Periodo3").checked) {
            faltasFora2Periodo = "3";
        } else {
            faltasFora2Periodo = "0";
        }
        return faltasFora2Periodo;
    }

    function checkedFaltaFora2Periodo4() {
        if(document.getElementById("faltaFora2Periodo4").checked) {
            faltasFora2Periodo = "4";
        } else {
            faltasFora2Periodo = "0";
        }
        return faltasFora2Periodo;
    }

    function checkedFaltaFora2Periodo5() {
        if(document.getElementById("faltaFora2Periodo5").checked) {
            faltasFora2Periodo = "5";
        } else {
            faltasFora2Periodo = "0";
        }
        return faltasFora2Periodo;
    }

        setInterval(function() {
            let valorGolsCasa = select_golsCasa.value;
            let valorGolsVisitante = select_golsVisitante.value;

            let dataPartida = dataDaPartida.value;

            let nome1Arbitro = nome1ArbitroV.value;
            let nome2Arbitro = nome2ArbitroV.value;
            let nomeAnotador = nomeAnotadorV.value;
            let nomeCronometrista = nomeCronometristaV.value;

            let placar1Periodo1 = placar1PeriodoCasa.value;
            let placar1Periodo2 = placar1PeriodoFora.value;
            let horarioInicio1Periodo1 = horarioInicio1PeriodoCasa.value;
            let horarioInicio1Periodo2 = horarioInicio1PeriodoFora.value;

            let horarioInicio2Periodo1 = horarioInicio2PeriodoCasa.value;
            let horarioInicio2Periodo2 = horarioInicio2PeriodoFora.value;
            let placar2Periodo1 = placar2PeriodoCasa.value;
            let placar2Periodo2 = placar2PeriodoFora.value;

            let horarioInicioProrrogacao1 = horarioInicioProrrogacaoCasa.value;
            let horarioInicioProrrogacao2 = horarioInicioProrrogacaoFora.value;
            let placarProrrogacao1 = placarProrrogacaoCasa.value;
            let placarProrrogacao2 = placarProrrogacaoFora.value;

            let placarPenaltis1 = placarPenaltisCasa.value;
            let placarPenaltis2 = placarPenaltisFora.value;

            let horarioFinal1 = horarioFinalCasa.value;
            let horarioFinal2 = horarioFinalFora.value;
            let placarFinal1 = placarFinalCasa.value;
            let placarFinal2 = placarFinalFora.value;

            // Faltas Casa 1 Periodo
            let faltasCasa1Periodo1 = checkedFaltaCasa1Periodo1();
            let faltasCasa1Periodo2 = checkedFaltaCasa1Periodo2();
            let faltasCasa1Periodo3 = checkedFaltaCasa1Periodo3();
            let faltasCasa1Periodo4 = checkedFaltaCasa1Periodo4();
            let faltasCasa1Periodo5 = checkedFaltaCasa1Periodo5();
            console.log(faltasCasa1Periodo1);
            console.log(faltasCasa1Periodo2);
            console.log(faltasCasa1Periodo3);
            console.log(faltasCasa1Periodo4);
            console.log(faltasCasa1Periodo5);

            if(faltasCasa1Periodo1 > 0) {
                var faltasCasa1Periodo = faltasCasa1Periodo1;
            } else {
                var faltasCasa1Periodo = "0";
            }
            if(faltasCasa1Periodo2 > 0) {
                var faltasCasa1Periodo = faltasCasa1Periodo2;
            }
            if(faltasCasa1Periodo3 > 0) {
                var faltasCasa1Periodo = faltasCasa1Periodo3;
            }
            if(faltasCasa1Periodo4 > 0) {
                var faltasCasa1Periodo = faltasCasa1Periodo4;
            }
            if(faltasCasa1Periodo5 > 0) {
                var faltasCasa1Periodo = faltasCasa1Periodo5;
            }
            console.log(faltasCasa1Periodo);

            // Faltas Casa 2 Periodo
            let faltasCasa2Periodo1 = checkedFaltaCasa2Periodo1();
            let faltasCasa2Periodo2 = checkedFaltaCasa2Periodo2();
            let faltasCasa2Periodo3 = checkedFaltaCasa2Periodo3();
            let faltasCasa2Periodo4 = checkedFaltaCasa2Periodo4();
            let faltasCasa2Periodo5 = checkedFaltaCasa2Periodo5();
            console.log(faltasCasa2Periodo1);
            console.log(faltasCasa2Periodo2);
            console.log(faltasCasa2Periodo3);
            console.log(faltasCasa2Periodo4);
            console.log(faltasCasa2Periodo5);

            if(faltasCasa2Periodo1 > 0) {
                var faltasCasa2Periodo = faltasCasa2Periodo1;
            } else {
                var faltasCasa2Periodo = "0";
            }
            if(faltasCasa2Periodo2 > 0) {
                var faltasCasa2Periodo = faltasCasa2Periodo2;
            }
            if(faltasCasa2Periodo3 > 0) {
                var faltasCasa2Periodo = faltasCasa2Periodo3;
            }
            if(faltasCasa2Periodo4 > 0) {
                var faltasCasa2Periodo = faltasCasa2Periodo4;
            }
            if(faltasCasa2Periodo5 > 0) {
                var faltasCasa2Periodo = faltasCasa2Periodo5;
            }
            console.log(faltasCasa2Periodo);

            // Faltas Fora 1 Periodo
            let faltasFora1Periodo1 = checkedFaltaFora1Periodo1();
            let faltasFora1Periodo2 = checkedFaltaFora1Periodo2();
            let faltasFora1Periodo3 = checkedFaltaFora1Periodo3();
            let faltasFora1Periodo4 = checkedFaltaFora1Periodo4();
            let faltasFora1Periodo5 = checkedFaltaFora1Periodo5();
            console.log(faltasFora1Periodo1);
            console.log(faltasFora1Periodo2);
            console.log(faltasFora1Periodo3);
            console.log(faltasFora1Periodo4);
            console.log(faltasFora1Periodo5);

            if(faltasFora1Periodo1 > 0) {
                var faltasFora1Periodo = faltasFora1Periodo1;
            } else {
                var faltasFora1Periodo = "0";
            }
            if(faltasFora1Periodo2 > 0) {
                var faltasFora1Periodo = faltasFora1Periodo2;
            }
            if(faltasFora1Periodo3 > 0) {
                var faltasFora1Periodo = faltasFora1Periodo3;
            }
            if(faltasFora1Periodo4 > 0) {
                var faltasFora1Periodo = faltasFora1Periodo4;
            }
            if(faltasFora1Periodo5 > 0) {
                var faltasFora1Periodo = faltasFora1Periodo5;
            }
            console.log(faltasFora1Periodo);
            
            // Faltas Fora 2 Periodo
            let faltasFora2Periodo1 = checkedFaltaFora2Periodo1();
            let faltasFora2Periodo2 = checkedFaltaFora2Periodo2();
            let faltasFora2Periodo3 = checkedFaltaFora2Periodo3();
            let faltasFora2Periodo4 = checkedFaltaFora2Periodo4();
            let faltasFora2Periodo5 = checkedFaltaFora2Periodo5();
            console.log(faltasFora2Periodo1);
            console.log(faltasFora2Periodo2);
            console.log(faltasFora2Periodo3);
            console.log(faltasFora2Periodo4);
            console.log(faltasFora2Periodo5);

            if(faltasFora2Periodo1 > 0) {
                var faltasFora2Periodo = faltasFora2Periodo1;
            } else {
                var faltasFora2Periodo = "0";
            }
            if(faltasFora2Periodo2 > 0) {
                var faltasFora2Periodo = faltasFora2Periodo2;
            }
            if(faltasFora2Periodo3 > 0) {
                var faltasFora2Periodo = faltasFora2Periodo3;
            }
            if(faltasFora2Periodo4 > 0) {
                var faltasFora2Periodo = faltasFora2Periodo4;
            }
            if(faltasFora2Periodo5 > 0) {
                var faltasFora2Periodo = faltasFora2Periodo5;
            }
            console.log(faltasFora2Periodo);

            // console.log("Falta2".faltasFora2Periodo);
            
            // console.log(dataPartida);
            // console.log(nome1Arbitro);
            // console.log(nome2Arbitro);
            // console.log(nomeAnotador);
            // console.log(nomeCronometrista);
            // console.log(placar1Periodo1);
            // console.log(placar1Periodo2);
            // console.log(horarioInicio1Periodo1);
            // console.log(horarioInicio1Periodo2);

            // console.log(placar2Periodo1);
            // console.log(placar2Periodo2);
            // console.log(horarioInicio2Periodo1);
            // console.log(horarioInicio2Periodo2);

            // console.log(horarioInicioProrrogacao1);
            // console.log(horarioInicioProrrogacao2);
            // console.log(placarProrrogacao1);
            // console.log(placarProrrogacao2);

            // console.log(placarPenaltis1);
            // console.log(placarPenaltis2);

            // console.log(horarioFinal1);
            // console.log(horarioFinal2);
            // console.log(placarFinal1);
            // console.log(placarFinal2);

            let valorAmareloCasa1 = select_amareloCasa1.value;
            let valorAmareloCasa2 = select_amareloCasa2.value;
            let valorAmareloCasa3 = select_amareloCasa3.value;
            let valorAmareloCasa4 = select_amareloCasa4.value;
            if(select_amareloCasa5 == null) {
                var valorAmareloCasa5 = "0";
            } else {
                var valorAmareloCasa5 = select_amareloCasa5.value;
            }
            if(select_amareloCasa6 == null) {
                var valorAmareloCasa6 = "0";
            } else {
                var valorAmareloCasa6 = select_amareloCasa6.value;
            }
            if(select_amareloCasa7 == null) {
                var valorAmareloCasa7 = "0";
            } else {
                var valorAmareloCasa7 = select_amareloCasa7.value;
            }
            if(select_amareloCasa8 == null) {
                var valorAmareloCasa8 = "0";
            } else {
                var valorAmareloCasa8 = select_amareloCasa8.value;
            }
            if(select_amareloCasa9 == null) {
                var valorAmareloCasa9 = "0";
            } else {
                var valorAmareloCasa9 = select_amareloCasa9.value;
            }
            if(select_amareloCasa10 == null) {
                var valorAmareloCasa10 = "0";
            } else {
                var valorAmareloCasa10 = select_amareloCasa10.value;
            }
            if(select_amareloCasa11 == null) {
                var valorAmareloCasa11 = "0";
            } else {
                var valorAmareloCasa11 = select_amareloCasa11.value;
            }
            if(select_amareloCasa12 == null) {
                var valorAmareloCasa12 = "0";
            } else {
                var valorAmareloCasa12 = select_amareloCasa12.value;
            }
            if(select_amareloCasa13 == null) {
                var valorAmareloCasa13 = "0";
            } else {
                var valorAmareloCasa13 = select_amareloCasa13.value;
            }
            if(select_amareloCasa14 == null) {
                var valorAmareloCasa14 = "0";
            } else {
                var valorAmareloCasa14 = select_amareloCasa14.value;
            }
            if(select_amareloCasa15 == null) {
                var valorAmareloCasa15 = "0";
            } else {
                var valorAmareloCasa15 = select_amareloCasa15.value;
            }

            let valorVermelhoCasa1 = select_vermelhoCasa1.value;
            let valorVermelhoCasa2 = select_vermelhoCasa2.value;
            let valorVermelhoCasa3 = select_vermelhoCasa3.value;
            let valorVermelhoCasa4 = select_vermelhoCasa4.value;
            if(select_vermelhoCasa5 == null) {
                var valorVermelhoCasa5 = "0";
            } else {
                var valorVermelhoCasa5 = select_vermelhoCasa5.value;
            }
            if(select_vermelhoCasa6 == null) {
                var valorVermelhoCasa6 = "0";
            } else {
                var valorVermelhoCasa6 = select_vermelhoCasa6.value;
            }
            if(select_vermelhoCasa7 == null) {
                var valorVermelhoCasa7 = "0";
            } else {
                var valorVermelhoCasa7 = select_vermelhoCasa7.value;
            }
            if(select_vermelhoCasa8 == null) {
                var valorVermelhoCasa8 = "0";
            } else {
                var valorVermelhoCasa8 = select_vermelhoCasa8.value;
            }
            if(select_vermelhoCasa9 == null) {
                var valorVermelhoCasa9 = "0";
            } else {
                var valorVermelhoCasa9 = select_vermelhoCasa9.value;
            }
            if(select_vermelhoCasa10 == null) {
                var valorVermelhoCasa10 = "0";
            } else {
                var valorVermelhoCasa10 = select_vermelhoCasa10.value;
            }
            if(select_vermelhoCasa11 == null) {
                var valorVermelhoCasa11 = "0";
            } else {
                var valorVermelhoCasa11 = select_vermelhoCasa11.value;
            }
            if(select_vermelhoCasa12 == null) {
                var valorVermelhoCasa12 = "0";
            } else {
                var valorVermelhoCasa12 = select_vermelhoCasa12.value;
            }
            if(select_vermelhoCasa13 == null) {
                var valorVermelhoCasa13 = "0";
            } else {
                var valorVermelhoCasa13 = select_vermelhoCasa13.value;
            }
            if(select_vermelhoCasa14 == null) {
                var valorVermelhoCasa14 = "0";
            } else {
                var valorVermelhoCasa14 = select_vermelhoCasa14.value;
            }
            if(select_vermelhoCasa15 == null) {
                var valorVermelhoCasa15 = "0";
            } else {
                var valorVermelhoCasa15 = select_vermelhoCasa15.value;
            }


            if(vermTreinadorCasa == null) {
                var vermelhoTreinadorCasa = "0";
                var minVerTreinadorCasa = "0";
                var secVerTreinadorCasa = "0";
            } else {
                var vermelhoTreinadorCasa = vermTreinadorCasa.value;
                var minVerTreinadorCasa = minVermTreinadorCasa.value;
                var secVerTreinadorCasa = secVermTreinadorCasa.value;
            }

            if(vermAuxiliarCasa == null) {
                var vermelhoAuxiliarCasa = "0";
                var minVerAuxiliarCasa = "0";
                var secVerAuxiliarCasa = "0";
            } else {
                var vermelhoAuxiliarCasa = vermAuxiliarCasa.value;
                var minVerAuxiliarCasa = minVermAuxiliarCasa.value;
                var secVerAuxiliarCasa = secVermAuxiliarCasa.value;
            }

            if(vermMassagistaCasa == null) {
                var vermelhoMassagistaCasa = "0";
                var minVerMassagistaCasa = "0";
                var secVerMassagistaCasa = "0";
            } else {
                var vermelhoMassagistaCasa = vermMassagistaCasa.value;
                var minVerMassagistaCasa = minVermMassagistaCasa.value;
                var secVerMassagistaCasa = secVermMassagistaCasa.value;
            }

            // Pedidos de tempo Casa
            if(minTempoCasa1Periodo1 == null) {
                minTempoCasa1Periodo = "0";
                secTempoCasa1Periodo = "0";
            } else {
                minTempoCasa1Periodo = minTempoCasa1Periodo1.value;
                secTempoCasa1Periodo = secTempoCasa1Periodo1.value;
            }

            if(minTempoCasa2Periodo1 == null) {
                minTempoCasa2Periodo = "0";
                secTempoCasa2Periodo = "0";
            } else {
                minTempoCasa2Periodo = minTempoCasa2Periodo1.value;
                secTempoCasa2Periodo = secTempoCasa2Periodo1.value;
            }

            // Pedidos de Tempo Fora
            if(minTempoFora1Periodo1 == null) {
                minTempoFora1Periodo = "0";
                secTempoFora1Periodo = "0";
            } else {
                minTempoFora1Periodo = minTempoFora1Periodo1.value;
                secTempoFora1Periodo = secTempoFora1Periodo1.value;
            }

            if(minTempoFora2Periodo1 == null) {
                minTempoFora2Periodo = "0";
                secTempoFora2Periodo = "0";
            } else {
                minTempoFora2Periodo = minTempoFora2Periodo1.value;
                secTempoFora2Periodo = secTempoFora2Periodo1.value;
            }

            let valorgolsCasa1 = select_golsCasa1.value;
            let valorgolsCasa2 = select_golsCasa2.value;
            let valorgolsCasa3 = select_golsCasa3.value;
            let valorgolsCasa4 = select_golsCasa4.value;
            let valorgolsCasa5 = select_golsCasa5.value;
            let valorgolsCasa6 = select_golsCasa6.value;
            let valorgolsCasa7 = select_golsCasa7.value;
            let valorgolsCasa8 = select_golsCasa8.value;
            let valorgolsCasa9 = select_golsCasa9.value;
            let valorgolsCasa10 = select_golsCasa10.value;
            let valorgolsCasa11 = select_golsCasa11.value;
            let valorgolsCasa12 = select_golsCasa12.value;
            let valorgolsCasa13 = select_golsCasa13.value;
            let valorgolsCasa14 = select_golsCasa14.value;
            let valorgolsCasa15 = select_golsCasa15.value;
            let valorgolsCasa16 = select_golsCasa15.value;
            let valorgolsCasa17 = select_golsCasa16.value;
            let valorgolsCasa18 = select_golsCasa17.value;
            let valorgolsCasa19 = select_golsCasa18.value;
            let valorgolsCasa20 = select_golsCasa19.value;
            let valorgolsCasa21 = select_golsCasa21.value;
            let valorgolsCasa22 = select_golsCasa22.value;

            let minGolsCasa1 = minGols1Casa1.value;
            let secGolsCasa1 = secGols1Casa1.value;
            let minGolsCasa2 = minGols2Casa1.value;
            let secGolsCasa2 = secGols2Casa1.value;
            let minGolsCasa3 = minGolsCasa31.value;
            let secGolsCasa3 = secGolsCasa31.value;
            let minGolsCasa4 = minGolsCasa41.value;
            let secGolsCasa4 = secGolsCasa41.value;
            if(minGolsCasa51 == null) {
                var minGolsCasa5 = "0";
                var secGolsCasa5 = "0";
            } else {
                var minGolsCasa5 = minGolsCasa51.value;
                var secGolsCasa5 = secGolsCasa51.value;
            }
            if(minGolsCasa61 == null) {
                var minGolsCasa6 = "0";
                var secGolsCasa6 = "0";
            } else {
                var minGolsCasa6 = minGolsCasa61.value;
                var secGolsCasa6 = secGolsCasa61.value;
            }
            if(minGolsCasa71 == null) {
                var minGolsCasa7 = "0";
                var secGolsCasa7 = "0";
            } else {
                var minGolsCasa7 = minGolsCasa71.value;
                var secGolsCasa7 = secGolsCasa71.value;
            }
            if(minGolsCasa81 == null) {
                var minGolsCasa8 = "0";
                var secGolsCasa8 = "0";
            } else {
                var minGolsCasa8 = minGolsCasa81.value;
                var secGolsCasa8 = secGolsCasa81.value;
            }
            if(minGolsCasa91 == null) {
                var minGolsCasa9 = "0";
                var secGolsCasa9 = "0";
            } else {
                var minGolsCasa9 = minGolsCasa91.value;
                var secGolsCasa9 = secGolsCasa91.value;
            }
            if(minGolsCasa101 == null) {
                var minGolsCasa10 = "0";
                var secGolsCasa10 = "0";
            } else {
                var minGolsCasa10 = minGolsCasa101.value;
                var secGolsCasa10 = secGolsCasa101.value;
            }
            if(minGolsCasa111 == null) {
                var minGolsCasa11 = "0";
                var secGolsCasa11 = "0";
            } else {
                var minGolsCasa11 = minGolsCasa111.value;
                var secGolsCasa11 = secGolsCasa111.value;
            }
            if(minGolsCasa121 == null) {
                var minGolsCasa12 = "0";
                var secGolsCasa12 = "0";
            } else {
                var minGolsCasa12 = minGolsCasa121.value;
                var secGolsCasa12 = secGolsCasa121.value;
            }
            if(minGolsCasa131 == null) {
                var minGolsCasa13 = "0";
                var secGolsCasa13 = "0";
            } else {
                var minGolsCasa13 = minGolsCasa131.value;
                var secGolsCasa13 = secGolsCasa131.value;
            }
            if(minGolsCasa141 == null) {
                var minGolsCasa14 = "0";
                var secGolsCasa14 = "0";
            } else {
                var minGolsCasa14 = minGolsCasa141.value;
                var secGolsCasa14 = secGolsCasa141.value;
            }
            if(minGolsCasa151 == null) {
                var minGolsCasa15 = "0";
                var secGolsCasa15 = "0";
            } else {
                var minGolsCasa15 = minGolsCasa151.value;
                var secGolsCasa15 = secGolsCasa151.value;
            }
            if(minGolsCasa161 == null) {
                var minGolsCasa16 = "0";
                var secGolsCasa16 = "0";
            } else {
                var minGolsCasa16 = minGolsCasa161.value;
                var secGolsCasa16 = secGolsCasa161.value;
            }
            if(minGolsCasa171 == null) {
                var minGolsCasa17 = "0";
                var secGolsCasa17 = "0";
            } else {
                var minGolsCasa17 = minGolsCasa171.value;
                var secGolsCasa17 = secGolsCasa171.value;
            }
            if(minGolsCasa181 == null) {
                var minGolsCasa18 = "0";
                var secGolsCasa18 = "0";
            } else {
                var minGolsCasa18 = minGolsCasa181.value;
                var secGolsCasa18 = secGolsCasa181.value;
            }
            if(minGolsCasa191 == null) {
                var minGolsCasa19 = "0";
                var secGolsCasa19 = "0";
            } else {
                var minGolsCasa19 = minGolsCasa191.value;
                var secGolsCasa19 = secGolsCasa191.value;
            }
            if(minGolsCasa201 == null) {
                var minGolsCasa20 = "0";
                var secGolsCasa20 = "0";
            } else {
                var minGolsCasa20 = minGolsCasa201.value;
                var secGolsCasa20 = secGolsCasa201.value;
            }
            if(minGolsCasa211 == null) {
                var minGolsCasa21 = "0";
                var secGolsCasa21 = "0";
            } else {
                var minGolsCasa21 = minGolsCasa211.value;
                var secGolsCasa21 = secGolsCasa211.value;
            }
            if(minGolsCasa221 == null) {
                var minGolsCasa22 = "0";
                var secGolsCasa22 = "0";
            } else {
                var minGolsCasa22 = minGolsCasa221.value;
                var secGolsCasa22 = secGolsCasa221.value;
            }

            //Valores dados Visitante
            let valorAmareloFora1 = select_amareloFora1.value;
            let valorAmareloFora2 = select_amareloFora2.value;
            let valorAmareloFora3 = select_amareloFora3.value;
            let valorAmareloFora4 = select_amareloFora4.value;
            if(select_amareloFora5 == null) {
                var valorAmareloFora5 = "0";
            } else {
                var valorAmareloFora5 = select_amareloFora5.value;
            }
            if(select_amareloFora6 == null) {
                var valorAmareloFora6 = "0";
            } else {
                var valorAmareloFora6 = select_amareloFora6.value;
            }
            if(select_amareloFora7 == null) {
                var valorAmareloFora7 = "0";
            } else {
                var valorAmareloFora7 = select_amareloFora7.value;
            }
            if(select_amareloFora8 == null) {
                var valorAmareloFora8 = "0";
            } else {
                var valorAmareloFora8 = select_amareloFora8.value;
            }
            if(select_amareloFora9 == null) {
                var valorAmareloFora9 = "0";
            } else {
                var valorAmareloFora9 = select_amareloFora9.value;
            }
            if(select_amareloFora10 == null) {
                var valorAmareloFora10 = "0";
            } else {
                var valorAmareloFora10 = select_amareloFora10.value;
            }
            if(select_amareloFora11 == null) {
                var valorAmareloFora11 = "0";
            } else {
                var valorAmareloFora11 = select_amareloFora11.value;
            }
            if(select_amareloFora12 == null) {
                var valorAmareloFora12 = "0";
            } else {
                var valorAmareloFora12 = select_amareloFora12.value;
            }
            if(select_amareloFora13 == null) {
                var valorAmareloFora13 = "0";
            } else {
                var valorAmareloFora13 = select_amareloFora13.value;
            }
            if(select_amareloFora14 == null) {
                var valorAmareloFora14 = "0";
            } else {
                var valorAmareloFora14 = select_amareloFora14.value;
            }
            if(select_amareloFora15 == null) {
                var valorAmareloFora15 = "0";
            } else {
                var valorAmareloFora15 = select_amareloFora15.value;
            }

            let valorVermelhoFora1 = select_vermelhoFora1.value;
            let valorVermelhoFora2 = select_vermelhoFora2.value;
            let valorVermelhoFora3 = select_vermelhoFora3.value;
            let valorVermelhoFora4 = select_vermelhoFora4.value;
            if(select_vermelhoFora5 == null) {
                var valorVermelhoFora5 = "0";
            } else {
                var valorVermelhoFora5 = select_vermelhoFora5.value;
            }
            if(select_vermelhoFora6 == null) {
                var valorVermelhoFora6 = "0";
            } else {
                var valorVermelhoFora6 = select_vermelhoFora6.value;
            }
            if(select_vermelhoFora7 == null) {
                var valorVermelhoFora7 = "0";
            } else {
                var valorVermelhoFora7 = select_vermelhoFora7.value;
            }
            if(select_vermelhoFora8 == null) {
                var valorVermelhoFora8 = "0";
            } else {
                var valorVermelhoFora8 = select_vermelhoFora8.value;
            }
            if(select_vermelhoFora9 == null) {
                var valorVermelhoFora9 = "0";
            } else {
                var valorVermelhoFora9 = select_vermelhoFora9.value;
            }
            if(select_vermelhoFora10 == null) {
                var valorVermelhoFora10 = "0";
            } else {
                var valorVermelhoFora10 = select_vermelhoFora10.value;
            }
            if(select_vermelhoFora11 == null) {
                var valorVermelhoFora11 = "0";
            } else {
                var valorVermelhoFora11 = select_vermelhoFora11.value;
            }
            if(select_vermelhoFora12 == null) {
                var valorVermelhoFora12 = "0";
            } else {
                var valorVermelhoFora12 = select_vermelhoFora12.value;
            }
            if(select_vermelhoFora13 == null) {
                var valorVermelhoFora13 = "0";
            } else {
                var valorVermelhoFora13 = select_vermelhoFora13.value;
            }
            if(select_vermelhoFora14 == null) {
                var valorVermelhoFora14 = "0";
            } else {
                var valorVermelhoFora14 = select_vermelhoFora14.value;
            }
            if(select_vermelhoFora15 == null) {
                var valorVermelhoFora15 = "0";
            } else {
                var valorVermelhoFora15 = select_vermelhoFora15.value;
            }

            // Cartões treinador
            if(vermTreinadorFora == null) {
                var vermelhoTreinadorFora = "0";
                var minVerTreinadorFora = "0";
                var secVerTreinadorFora = "0";
            } else {
                var vermelhoTreinadorFora = vermTreinadorFora.value;
                var minVerTreinadorFora = minVermTreinadorFora.value;
                var secVerTreinadorFora = secVermTreinadorFora.value;
            }

            if(vermAuxiliarFora == null) {
                var vermelhoAuxiliarFora = "0";
                var minVerAuxiliarFora = "0";
                var secVerAuxiliarFora = "0";
            } else {
                var vermelhoAuxiliarFora = vermAuxiliarFora.value;
                var minVerAuxiliarFora = minVermAuxiliarFora.value;
                var secVerAuxiliarFora = secVermAuxiliarFora.value;
            }

            if(vermMassagistaFora == null) {
                var vermelhoMassagistaFora = "0";
                var minVerMassagistaFora = "0";
                var secVerMassagistaFora = "0";
            } else {
                var vermelhoMassagistaFora = vermMassagistaFora.value;
                var minVerMassagistaFora = minVermMassagistaFora.value;
                var secVerMassagistaFora = secVermMassagistaFora.value;
            }

            let valorgolsFora1 = select_golsFora1.value;
            let valorgolsFora2 = select_golsFora2.value;
            let valorgolsFora3 = select_golsFora3.value;
            let valorgolsFora4 = select_golsFora4.value;
            let valorgolsFora5 = select_golsFora5.value;
            let valorgolsFora6 = select_golsFora6.value;
            let valorgolsFora7 = select_golsFora7.value;
            let valorgolsFora8 = select_golsFora8.value;
            let valorgolsFora9 = select_golsFora9.value;
            let valorgolsFora10 = select_golsFora10.value;
            let valorgolsFora11 = select_golsFora11.value;
            let valorgolsFora12 = select_golsFora12.value;
            let valorgolsFora13 = select_golsFora13.value;
            let valorgolsFora14 = select_golsFora14.value;
            let valorgolsFora15 = select_golsFora15.value;
            let valorgolsFora16 = select_golsFora16.value;
            let valorgolsFora17 = select_golsFora17.value;
            let valorgolsFora18 = select_golsFora18.value;
            let valorgolsFora19 = select_golsFora19.value;
            let valorgolsFora20 = select_golsFora20.value;
            let valorgolsFora21 = select_golsFora21.value;
            let valorgolsFora22 = select_golsFora22.value;

            let minGolsFora1 = minGols1Fora1.value;
            let secGolsFora1 = secGols1Fora1.value;
            let minGolsFora2 = minGols2Fora1.value;
            let secGolsFora2 = secGols2Fora1.value;
            let minGolsFora3 = minGolsFora31.value;
            let secGolsFora3 = secGolsFora31.value;
            let minGolsFora4 = minGolsFora41.value;
            let secGolsFora4 = secGolsFora41.value;
            if(minGolsFora51 == null) {
                var minGolsFora5 = "0";
                var secGolsFora5 = "0";
            } else {
                var minGolsFora5 = minGolsFora51.value;
                var secGolsFora5 = secGolsFora51.value;
            }
            if(minGolsFora61 == null) {
                var minGolsFora6 = "0";
                var secGolsFora6 = "0";
            } else {
                var minGolsFora6 = minGolsFora61.value;
                var secGolsFora6 = secGolsFora61.value;
            }
            if(minGolsFora71 == null) {
                var minGolsFora7 = "0";
                var secGolsFora7 = "0";
            } else {
                var minGolsFora7 = minGolsFora71.value;
                var secGolsFora7 = secGolsFora71.value;
            }
            if(minGolsFora81 == null) {
                var minGolsFora8 = "0";
                var secGolsFora8 = "0";
            } else {
                var minGolsFora8 = minGolsFora81.value;
                var secGolsFora8 = secGolsFora81.value;
            }
            if(minGolsFora91 == null) {
                var minGolsFora9 = "0";
                var secGolsFora9 = "0";
            } else {
                var minGolsFora9 = minGolsFora91.value;
                var secGolsFora9 = secGolsFora91.value;
            }
            if(minGolsFora101 == null) {
                var minGolsFora10 = "0";
                var secGolsFora10 = "0";
            } else {
                var minGolsFora10 = minGolsFora101.value;
                var secGolsFora10 = secGolsFora101.value;
            }
            if(minGolsFora111 == null) {
                var minGolsFora11 = "0";
                var secGolsFora11 = "0";
            } else {
                var minGolsFora11 = minGolsFora111.value;
                var secGolsFora11 = secGolsFora111.value;
            }
            if(minGolsFora121 == null) {
                var minGolsFora12 = "0";
                var secGolsFora12 = "0";
            } else {
                var minGolsFora12 = minGolsFora121.value;
                var secGolsFora12 = secGolsFora121.value;
            }
            if(minGolsFora131 == null) {
                var minGolsFora13 = "0";
                var secGolsFora13 = "0";
            } else {
                var minGolsFora13 = minGolsFora131.value;
                var secGolsFora13 = secGolsFora131.value;
            }
            if(minGolsFora141 == null) {
                var minGolsFora14 = "0";
                var secGolsFora14 = "0";
            } else {
                var minGolsFora14 = minGolsFora141.value;
                var secGolsFora14 = secGolsFora141.value;
            }
            if(minGolsFora151 == null) {
                var minGolsFora15 = "0";
                var secGolsFora15 = "0";
            } else {
                var minGolsFora15 = minGolsFora151.value;
                var secGolsFora15 = secGolsFora151.value;
            }
            if(minGolsFora161 == null) {
                var minGolsFora16 = "0";
                var secGolsFora16 = "0";
            } else {
                var minGolsFora16 = minGolsFora161.value;
                var secGolsFora16 = secGolsFora161.value;
            }
            if(minGolsFora171 == null) {
                var minGolsFora17 = "0";
                var secGolsFora17 = "0";
            } else {
                var minGolsFora17 = minGolsFora171.value;
                var secGolsFora17 = secGolsFora171.value;
            }
            if(minGolsFora181 == null) {
                var minGolsFora18 = "0";
                var secGolsFora18 = "0";
            } else {
                var minGolsFora18 = minGolsFora181.value;
                var secGolsFora18 = secGolsFora181.value;
            }
            if(minGolsFora191 == null) {
                var minGolsFora19 = "0";
                var secGolsFora19 = "0";
            } else {
                var minGolsFora19 = minGolsFora191.value;
                var secGolsFora19 = secGolsFora191.value;
            }
            if(minGolsFora201 == null) {
                var minGolsFora20 = "0";
                var secGolsFora20 = "0";
            } else {
                var minGolsFora20 = minGolsFora201.value;
                var secGolsFora20 = secGolsFora201.value;
            }
            if(minGolsFora211 == null) {
                var minGolsFora21 = "0";
                var secGolsFora21 = "0";
            } else {
                var minGolsFora21 = minGolsFora211.value;
                var secGolsFora21 = secGolsFora211.value;
            }
            if(minGolsFora221 == null) {
                var minGolsFora22 = "0";
                var secGolsFora22 = "0";
            } else {
                var minGolsFora22 = minGolsFora221.value;
                var secGolsFora22 = secGolsFora221.value;
            }

            //Tempos dos cartões CASA
            let minAmareloCasa1 = minAmarelo1Casa1.value;
            let secAmareloCasa1 = secAmarelo1Casa1.value;
            let minAmareloCasa2 = minAmareloCasa21.value;
            let secAmareloCasa2 = secAmareloCasa21.value;
            let minAmareloCasa3 = minAmareloCasa31.value;
            let secAmareloCasa3 = secAmareloCasa31.value;
            let minAmareloCasa4 = minAmareloCasa41.value;
            let secAmareloCasa4 = secAmareloCasa41.value;
            if(minAmareloCasa51 == null) {
                var minAmareloCasa5 = "0";
                var secAmareloCasa5 = "0";
            } else {
                var minAmareloCasa5 = minAmareloCasa51.value;
                var secAmareloCasa5 = secAmareloCasa51.value;
            }
            if(minAmareloCasa61 == null) {
                var minAmareloCasa6 = "0";
                var secAmareloCasa6 = "0";
            } else {
                var minAmareloCasa6 = minAmareloCasa61.value;
                var secAmareloCasa6 = secAmareloCasa61.value;
            }
            if(minAmareloCasa71 == null) {
                var minAmareloCasa7 = "0";
                var secAmareloCasa7 = "0";
            } else {
                var minAmareloCasa7 = minAmareloCasa71.value;
                var secAmareloCasa7 = secAmareloCasa71.value;
            }
            if(minAmareloCasa81 == null) {
                var minAmareloCasa8 = "0";
                var secAmareloCasa8 = "0";
            } else {
                var minAmareloCasa8 = minAmareloCasa81.value;
                var secAmareloCasa8 = secAmareloCasa81.value;
            }
            if(minAmareloCasa91 == null) {
                var minAmareloCasa9 = "0";
                var secAmareloCasa9 = "0";
            } else {
                var minAmareloCasa9 = minAmareloCasa91.value;
                var secAmareloCasa9 = secAmareloCasa91.value;
            }
            if(minAmareloCasa101 == null) {
                var minAmareloCasa10 = "0";
                var secAmareloCasa10 = "0";
            } else {
                var minAmareloCasa10 = minAmareloCasa101.value;
                var secAmareloCasa10 = secAmareloCasa101.value;
            }
            if(minAmareloCasa111 == null) {
                var minAmareloCasa11 = "0";
                var secAmareloCasa11 = "0";
            } else {
                var minAmareloCasa11 = minAmareloCasa111.value;
                var secAmareloCasa11 = secAmareloCasa111.value;
            }
            if(minAmareloCasa121 == null) {
                var minAmareloCasa12 = "0";
                var secAmareloCasa12 = "0";
            } else {
                var minAmareloCasa12 = minAmareloCasa121.value;
                var secAmareloCasa12 = secAmareloCasa121.value;
            }
            if(minAmareloCasa131 == null) {
                var minAmareloCasa13 = "0";
                var secAmareloCasa13 = "0";
            } else {
                var minAmareloCasa13 = minAmareloCasa131.value;
                var secAmareloCasa13 = secAmareloCasa131.value;
            }
            if(minAmareloCasa141 == null) {
                var minAmareloCasa14 = "0";
                var secAmareloCasa14 = "0";
            } else {
                var minAmareloCasa14 = minAmareloCasa141.value;
                var secAmareloCasa14 = secAmareloCasa141.value;
            }
            if(minAmareloCasa151 == null) {
                var minAmareloCasa15 = "0";
                var secAmareloCasa15 = "0";
            } else {
                var minAmareloCasa15 = minAmareloCasa151.value;
                var secAmareloCasa15 = secAmareloCasa151.value;
            }

            //Vermelho Casa
            let minVermelhoCasa1 = minVermelho1Casa1.value;
            let secVermelhoCasa1 = secVermelho1Casa1.value;
            let minVermelhoCasa2 = minVermelhoCasa21.value;
            let secVermelhoCasa2 = secVermelhoCasa21.value;
            let minVermelhoCasa3 = minVermelhoCasa31.value;
            let secVermelhoCasa3 = secVermelhoCasa31.value;
            let minVermelhoCasa4 = minVermelhoCasa41.value;
            let secVermelhoCasa4 = secVermelhoCasa41.value;
            if(minVermelhoCasa51 == null) {
                var minVermelhoCasa5 = "0";
                var secVermelhoCasa5 = "0";
            } else {
                var minVermelhoCasa5 = minVermelhoCasa51.value;
                var secVermelhoCasa5 = secVermelhoCasa51.value;
            }
            if(minVermelhoCasa61 == null) {
                var minVermelhoCasa6 = "0";
                var secVermelhoCasa6 = "0";
            } else {
                var minVermelhoCasa6 = minVermelhoCasa61.value;
                var secVermelhoCasa6 = secVermelhoCasa61.value;
            }
            if(minVermelhoCasa71 == null) {
                var minVermelhoCasa7 = "0";
                var secVermelhoCasa7 = "0";
            } else {
                var minVermelhoCasa7 = minVermelhoCasa71.value;
                var secVermelhoCasa7 = secVermelhoCasa71.value;
            }
            if(minVermelhoCasa81 == null) {
                var minVermelhoCasa8 = "0";
                var secVermelhoCasa8 = "0";
            } else {
                var minVermelhoCasa8 = minVermelhoCasa81.value;
                var secVermelhoCasa8 = secVermelhoCasa81.value;
            }
            if(minVermelhoCasa91 == null) {
                var minVermelhoCasa9 = "0";
                var secVermelhoCasa9 = "0";
            } else {
                var minVermelhoCasa9 = minVermelhoCasa91.value;
                var secVermelhoCasa9 = secVermelhoCasa91.value;
            }
            if(minVermelhoCasa101 == null) {
                var minVermelhoCasa10 = "0";
                var secVermelhoCasa10 = "0";
            } else {
                var minVermelhoCasa10 = minVermelhoCasa101.value;
                var secVermelhoCasa10 = secVermelhoCasa101.value;
            }
            if(minVermelhoCasa111 == null) {
                var minVermelhoCasa11 = "0";
                var secVermelhoCasa11 = "0";
            } else {
                var minVermelhoCasa11 = minVermelhoCasa111.value;
                var secVermelhoCasa11 = secVermelhoCasa111.value;
            }
            if(minVermelhoCasa121 == null) {
                var minVermelhoCasa12 = "0";
                var secVermelhoCasa12 = "0";
            } else {
                var minVermelhoCasa12 = minVermelhoCasa121.value;
                var secVermelhoCasa12 = secVermelhoCasa121.value;
            }
            if(minVermelhoCasa131 == null) {
                var minVermelhoCasa13 = "0";
                var secVermelhoCasa13 = "0";
            } else {
                var minVermelhoCasa13 = minVermelhoCasa131.value;
                var secVermelhoCasa13 = secVermelhoCasa131.value;
            }
            if(minVermelhoCasa141 == null) {
                var minVermelhoCasa14 = "0";
                var secVermelhoCasa14 = "0";
            } else {
                var minVermelhoCasa14 = minVermelhoCasa141.value;
                var secVermelhoCasa14 = secVermelhoCasa141.value;
            }
            if(minVermelhoCasa151 == null) {
                var minVermelhoCasa15 = "0";
                var secVermelhoCasa15 = "0";
            } else {
                var minVermelhoCasa15 = minVermelhoCasa151.value;
                var secVermelhoCasa15 = secVermelhoCasa151.value;
            }

            // Tempo dos Cartões da Equipe Fora
            let minAmareloFora1 = minAmarelo1Fora1.value;
            let secAmareloFora1 = secAmarelo1Fora1.value;
            let minAmareloFora2 = minAmareloFora21.value;
            let secAmareloFora2 = secAmareloFora21.value;
            let minAmareloFora3 = minAmareloFora31.value;
            let secAmareloFora3 = secAmareloFora31.value;
            let minAmareloFora4 = minAmareloFora41.value;
            let secAmareloFora4 = secAmareloFora41.value;
            if(minAmareloFora51 == null) {
                var minAmareloFora5 = "0";
                var secAmareloFora5 = "0";
            } else {
                var minAmareloFora5 = minAmareloFora51.value;
                var secAmareloFora5 = secAmareloFora51.value;
            }
            if(minAmareloFora61 == null) {
                var minAmareloFora6 = "0";
                var secAmareloFora6 = "0";
            } else {
                var minAmareloFora6 = minAmareloFora61.value;
                var secAmareloFora6 = secAmareloFora61.value;
            }
            if(minAmareloFora71 == null) {
                var minAmareloFora7 = "0";
                var secAmareloFora7 = "0";
            } else {
                var minAmareloFora7 = minAmareloFora71.value;
                var secAmareloFora7 = secAmareloFora71.value;
            }
            if(minAmareloFora81 == null) {
                var minAmareloFora8 = "0";
                var secAmareloFora8 = "0";
            } else {
                var minAmareloFora8 = minAmareloFora81.value;
                var secAmareloFora8 = secAmareloFora81.value;
            }
            if(minAmareloFora91 == null) {
                var minAmareloFora9 = "0";
                var secAmareloFora9 = "0";
            } else {
                var minAmareloFora9 = minAmareloFora91.value;
                var secAmareloFora9 = secAmareloFora91.value;
            }
            if(minAmareloFora101 == null) {
                var minAmareloFora10 = "0";
                var secAmareloFora10 = "0";
            } else {
                var minAmareloFora10 = minAmareloFora101.value;
                var secAmareloFora10 = secAmareloFora101.value;
            }
            if(minAmareloFora111 == null) {
                var minAmareloFora11 = "0";
                var secAmareloFora11 = "0";
            } else {
                var minAmareloFora11 = minAmareloFora111.value;
                var secAmareloFora11 = secAmareloFora111.value;
            }
            if(minAmareloFora121 == null) {
                var minAmareloFora12 = "0";
                var secAmareloFora12 = "0";
            } else {
                var minAmareloFora12 = minAmareloFora121.value;
                var secAmareloFora12 = secAmareloFora121.value;
            }
            if(minAmareloFora131 == null) {
                var minAmareloFora13 = "0";
                var secAmareloFora13 = "0";
            } else {
                var minAmareloFora13 = minAmareloFora131.value;
                var secAmareloFora13 = secAmareloFora131.value;
            }
            if(minAmareloFora141 == null) {
                var minAmareloFora14 = "0";
                var secAmareloFora14 = "0";
            } else {
                var minAmareloFora14 = minAmareloFora141.value;
                var secAmareloFora14 = secAmareloFora141.value;
            }
            if(minAmareloFora151 == null) {
                var minAmareloFora15 = "0";
                var secAmareloFora15 = "0";
            } else {
                var minAmareloFora15 = minAmareloFora151.value;
                var secAmareloFora15 = secAmareloFora151.value;
            }

            let minVermelhoFora1 = minVermelho1Fora1.value;
            let secVermelhoFora1 = secVermelho1Fora1.value;
            let minVermelhoFora2 = minVermelhoFora21.value;
            let secVermelhoFora2 = secVermelhoFora21.value;
            let minVermelhoFora3 = minVermelhoFora31.value;
            let secVermelhoFora3 = secVermelhoFora31.value;
            let minVermelhoFora4 = minVermelhoFora41.value;
            let secVermelhoFora4 = secVermelhoFora41.value;
            if(minVermelhoFora51 == null) {
                var minVermelhoFora5 = "0";
                var secVermelhoFora5 = "0";
            } else {
                var minVermelhoFora5 = minVermelhoFora51.value;
                var secVermelhoFora5 = secVermelhoFora51.value;
            }
            if(minVermelhoFora61 == null) {
                var minVermelhoFora6 = "0";
                var secVermelhoFora6 = "0";
            } else {
                var minVermelhoFora6 = minVermelhoFora61.value;
                var secVermelhoFora6 = secVermelhoFora61.value;
            }
            if(minVermelhoFora71 == null) {
                var minVermelhoFora7 = "0";
                var secVermelhoFora7 = "0";
            } else {
                var minVermelhoFora7 = minVermelhoFora71.value;
                var secVermelhoFora7 = secVermelhoFora71.value;
            }
            if(minVermelhoFora81 == null) {
                var minVermelhoFora8 = "0";
                var secVermelhoFora8 = "0";
            } else {
                var minVermelhoFora8 = minVermelhoFora81.value;
                var secVermelhoFora8 = secVermelhoFora81.value;
            }
            if(minVermelhoFora91 == null) {
                var minVermelhoFora9 = "0";
                var secVermelhoFora9 = "0";
            } else {
                var minVermelhoFora9 = minVermelhoFora91.value;
                var secVermelhoFora9 = secVermelhoFora91.value;
            }
            if(minVermelhoFora101 == null) {
                var minVermelhoFora10 = "0";
                var secVermelhoFora10 = "0";
            } else {
                var minVermelhoFora10 = minVermelhoFora101.value;
                var secVermelhoFora10 = secVermelhoFora101.value;
            }
            if(minVermelhoFora111 == null) {
                var minVermelhoFora11 = "0";
                var secVermelhoFora11 = "0";
            } else {
                var minVermelhoFora11 = minVermelhoFora111.value;
                var secVermelhoFora11 = secVermelhoFora111.value;
            }
            if(minVermelhoFora121 == null) {
                var minVermelhoFora12 = "0";
                var secVermelhoFora12 = "0";
            } else {
                var minVermelhoFora12 = minVermelhoFora121.value;
                var secVermelhoFora12 = secVermelhoFora121.value;
            }
            if(minVermelhoFora131 == null) {
                var minVermelhoFora13 = "0";
                var secVermelhoFora13 = "0";
            } else {
                var minVermelhoFora13 = minVermelhoFora131.value;
                var secVermelhoFora13 = secVermelhoFora131.value;
            }
            if(minVermelhoFora141 == null) {
                var minVermelhoFora14 = "0";
                var secVermelhoFora14 = "0";
            } else {
                var minVermelhoFora14 = minVermelhoFora141.value;
                var secVermelhoFora14 = secVermelhoFora141.value;
            }
            if(minVermelhoFora151 == null) {
                var minVermelhoFora15 = "0";
                var secVermelhoFora15 = "0";
            } else {
                var minVermelhoFora15 = minVermelhoFora151.value;
                var secVermelhoFora15 = secVermelhoFora151.value;
            }

            let anotacoesPartida2 = anotacoesPartida1.value;
            if(anotacoesPartida2 == null) {
               var anotacoesPartida = "Anote algo aqui...";
            } else {
               var anotacoesPartida = anotacoesPartida1.value;
            }

            // console.log(valorGolsCasa);
            // console.log(valorGolsVisitante);

            // console.log(valorAmareloCasa1);
            // console.log(minAmareloCasa1);
            // console.log(secAmareloCasa1);
            // console.log(valorVermelhoCasa1);
            // console.log(minVermelhoCasa1);
            // console.log(secVermelhoCasa1);
            // console.log(valorgolsCasa1);

            // console.log(valorAmareloFora1);
            // console.log(valorVermelhoFora1);
            // console.log(valorgolsFora1);

            // console.log(anotacoesPartida);

                fetch("placar_aoVivo.php?golsCasa=" + valorGolsCasa + "&golsVisitante=" + valorGolsVisitante + "&dataPartida=" + dataPartida + "&nome1Arbitro=" + nome1Arbitro + "&nome2Arbitro=" + nome2Arbitro + "&nomeAnotador=" + nomeAnotador + "&nomeCronometrista=" + nomeCronometrista + "&placar1Periodo1=" + placar1Periodo1 + "&placar1Periodo2=" + placar1Periodo2 + "&horarioInicio1Periodo1=" + horarioInicio1Periodo1 + "&horarioInicio1Periodo2=" + horarioInicio1Periodo2 + "&horarioInicio2Periodo1=" + horarioInicio2Periodo1 + "&horarioInicio2Periodo2=" + horarioInicio2Periodo2 + "&placar2Periodo1=" + placar2Periodo1 + "&placar2Periodo2=" + placar2Periodo2 + "&horarioInicioProrrogacao1=" + horarioInicioProrrogacao1 + "&horarioInicioProrrogacao2=" + horarioInicioProrrogacao2 + "&placarProrrogacao1=" + placarProrrogacao1 
                + "&placarProrrogacao2=" + placarProrrogacao2 + "&placarPenaltis1=" + placarPenaltis1 + "&placarPenaltis2=" + placarPenaltis2 + "&horarioFinal1=" + horarioFinal1 + "&horarioFinal2=" + horarioFinal2 + "&placarFinal1=" + placarFinal1 + "&placarFinal2=" + placarFinal2 + "&faltasCasa1Periodo=" + faltasCasa1Periodo + "&faltasCasa2Periodo=" + faltasCasa2Periodo + "&faltasFora1Periodo=" + faltasFora1Periodo + "&faltasFora2Periodo=" + faltasFora2Periodo + "&amareloCasa1=" + valorAmareloCasa1 + "&amareloCasa2=" + valorAmareloCasa2 + "&amareloCasa3=" + valorAmareloCasa3 + "&amareloCasa4=" + valorAmareloCasa4 + "&amareloCasa5=" + valorAmareloCasa5 + "&amareloCasa6=" + valorAmareloCasa6 + "&amareloCasa7=" + valorAmareloCasa7 + "&amareloCasa8=" + valorAmareloCasa8 + "&amareloCasa9=" + valorAmareloCasa9 + "&amareloCasa10=" + valorAmareloCasa10 + "&amareloCasa11=" + valorAmareloCasa11 + "&amareloCasa12=" + valorAmareloCasa12 + "&amareloCasa13=" + valorAmareloCasa13 
                + "&amareloCasa14=" + valorAmareloCasa14 + "&amareloCasa15=" + valorAmareloCasa15 + "&minAmareloCasa1=" + minAmareloCasa1 + "&secAmareloCasa1=" + secAmareloCasa1 + "&minAmareloCasa2=" + minAmareloCasa2 + "&secAmareloCasa2=" + secAmareloCasa2 + "&minAmareloCasa3=" + minAmareloCasa3 + "&secAmareloCasa3=" + secAmareloCasa3 + "&minAmareloCasa4=" + minAmareloCasa4 + "&secAmareloCasa4=" + secAmareloCasa4 + "&minAmareloCasa5=" + minAmareloCasa5 + "&secAmareloCasa5=" + secAmareloCasa5 + "&minAmareloCasa6=" + minAmareloCasa6 + "&secAmareloCasa6=" + secAmareloCasa6 + "&minAmareloCasa7=" + minAmareloCasa7 + "&secAmareloCasa7=" + secAmareloCasa7 + "&minAmareloCasa8=" + minAmareloCasa8 + "&secAmareloCasa8=" + secAmareloCasa8
                + "&minAmareloCasa9=" + minAmareloCasa9 + "&secAmareloCasa9=" + secAmareloCasa9 + "&minAmareloCasa10=" + minAmareloCasa10 + "&secAmareloCasa10=" + secAmareloCasa10 + "&minAmareloCasa11=" + minAmareloCasa11 + "&secAmareloCasa11=" + secAmareloCasa11 + "&minAmareloCasa12=" + minAmareloCasa12 + "&secAmareloCasa12=" + secAmareloCasa12 + "&minAmareloCasa13=" + minAmareloCasa13 + "&secAmareloCasa13=" + secAmareloCasa13 + "&minAmareloCasa14=" + minAmareloCasa14 + "&secAmareloCasa14=" + secAmareloCasa14 + "&minAmareloCasa15=" + minAmareloCasa15 + "&secAmareloCasa15=" + secAmareloCasa15 + "&vermelhoCasa1=" + valorVermelhoCasa1 + "&vermelhoCasa2=" + valorVermelhoCasa2 + "&vermelhoCasa3=" + valorVermelhoCasa3 + "&vermelhoCasa4=" + valorVermelhoCasa4 + "&vermelhoCasa5=" + valorVermelhoCasa5 + "&vermelhoCasa6=" + valorVermelhoCasa6 + "&vermelhoCasa7=" + valorVermelhoCasa7 + "&vermelhoCasa8=" + valorVermelhoCasa8 + "&vermelhoCasa9=" + valorVermelhoCasa9 + "&vermelhoCasa10=" + valorVermelhoCasa10 + "&vermelhoCasa11=" + valorVermelhoCasa11 + "&vermelhoCasa12=" + valorVermelhoCasa12 + "&vermelhoCasa13=" + valorVermelhoCasa13 + "&vermelhoCasa14=" + valorVermelhoCasa14 + "&vermelhoCasa15=" + valorVermelhoCasa15 
                + "&minVermelhoCasa1=" + minVermelhoCasa1 + "&secVermelhoCasa1=" + secVermelhoCasa1 + "&minVermelhoCasa2=" + minVermelhoCasa2 + "&secVermelhoCasa2=" + secVermelhoCasa2 + "&minVermelhoCasa3=" + minVermelhoCasa3 + "&secVermelhoCasa3=" + secVermelhoCasa3 + "&minVermelhoCasa4=" + minVermelhoCasa4 + "&secVermelhoCasa4=" + secVermelhoCasa4 + "&minVermelhoCasa5=" + minVermelhoCasa5 + "&secVermelhoCasa5=" + secVermelhoCasa5 + "&minVermelhoCasa6=" + minVermelhoCasa6 + "&secVermelhoCasa6=" + secVermelhoCasa6 + "&minVermelhoCasa7=" + minVermelhoCasa7 + "&secVermelhoCasa7=" + secVermelhoCasa7 + "&minVermelhoCasa8=" + minVermelhoCasa8 + "&secVermelhoCasa8=" + secVermelhoCasa8
                + "&minVermelhoCasa9=" + minVermelhoCasa9 + "&secVermelhoCasa9=" + secVermelhoCasa9 + "&minVermelhoCasa10=" + minVermelhoCasa10 + "&secVermelhoCasa10=" + secVermelhoCasa10 + "&minVermelhoCasa11=" + minVermelhoCasa11 + "&secVermelhoCasa11=" + secVermelhoCasa11 + "&minVermelhoCasa12=" + minVermelhoCasa12 + "&secVermelhoCasa12=" + secVermelhoCasa12 + "&minVermelhoCasa13=" + minVermelhoCasa13 + "&secVermelhoCasa13=" + secVermelhoCasa13 + "&minVermelhoCasa14=" + minVermelhoCasa14 + "&secVermelhoCasa14=" + secVermelhoCasa14 + "&minVermelhoCasa15=" + minVermelhoCasa15 + "&secVermelhoCasa15=" + secVermelhoCasa15 + "&amareloFora1=" + valorAmareloFora1 + "&amareloFora2=" + valorAmareloFora2 
                + "&amareloFora3=" + valorAmareloFora3 + "&amareloFora4=" + valorAmareloFora4 + "&amareloFora5=" + valorAmareloFora5 + "&amareloFora6=" + valorAmareloFora6 + "&amareloFora7=" + valorAmareloFora7 + "&amareloFora8=" + valorAmareloFora8 + "&amareloFora9=" + valorAmareloFora9 + "&amareloFora10=" + valorAmareloFora10 + "&amareloFora11=" + valorAmareloFora11 + "&amareloFora12=" + valorAmareloFora12 + "&amareloFora13=" + valorAmareloFora13 + "&amareloFora14=" + valorAmareloFora14 + "&amareloFora15=" + valorAmareloFora15 + "&vermelhoFora1=" + valorVermelhoFora1 + "&vermelhoFora2=" + valorVermelhoFora2 + "&vermelhoFora3=" + valorVermelhoFora3 + "&vermelhoFora4=" + valorVermelhoFora4 + "&vermelhoFora5=" + valorVermelhoFora5 + "&vermelhoFora6=" + valorVermelhoFora6 
                + "&vermelhoFora7=" + valorVermelhoFora7 + "&vermelhoFora8=" + valorVermelhoFora8 + "&vermelhoFora9=" + valorVermelhoFora9 + "&vermelhoFora10=" + valorVermelhoFora10 + "&vermelhoFora11=" + valorVermelhoFora11 + "&vermelhoFora12=" + valorVermelhoFora12 + "&vermelhoFora13=" + valorVermelhoFora13 + "&vermelhoFora14=" + valorVermelhoFora14 + "&vermelhoFora15=" + valorVermelhoFora15 + "&minAmareloFora1=" + minAmareloFora1 + "&secAmareloFora1=" + secAmareloFora1 + "&minAmareloFora2=" + minAmareloFora2 + "&secAmareloFora2=" + secAmareloFora2 + "&minAmareloFora3=" + minAmareloFora3 + "&secAmareloFora3=" + secAmareloFora3 + "&minAmareloFora4=" + minAmareloFora4 + "&secAmareloFora4=" + secAmareloFora4 + "&minAmareloFora5=" + minAmareloFora5 + "&secAmareloFora5=" + secAmareloFora5 + "&minAmareloFora6=" + minAmareloFora6 + "&secAmareloFora6=" + secAmareloFora6 + "&minAmareloFora7=" + minAmareloFora7 + "&secAmareloFora7=" + secAmareloFora7 + "&minAmareloFora8=" + minAmareloFora8 + "&secAmareloFora8=" + secAmareloFora8
                + "&minAmareloFora9=" + minAmareloFora9 + "&secAmareloFora9=" + secAmareloFora9 + "&minAmareloFora10=" + minAmareloFora10 + "&secAmareloFora10=" + secAmareloFora10 + "&minAmareloFora11=" + minAmareloFora11 + "&secAmareloFora11=" + secAmareloFora11 + "&minAmareloFora12=" + minAmareloFora12 + "&secAmareloFora12=" + secAmareloFora12 + "&minAmareloFora13=" + minAmareloFora13 + "&secAmareloFora13=" + secAmareloFora13 + "&minAmareloFora14=" + minAmareloFora14 + "&secAmareloFora14=" + secAmareloFora14 + "&minAmareloFora15=" + minAmareloFora15 + "&secAmareloFora15=" + secAmareloFora15 + "&minVermelhoFora1=" + minVermelhoFora1 + "&secVermelhoFora1=" + secVermelhoFora1 + "&minVermelhoFora2=" + minVermelhoFora2 + "&secVermelhoFora2=" + secVermelhoFora2 + "&minVermelhoFora3=" + minVermelhoFora3 + "&secVermelhoFora3=" + secVermelhoFora3 + "&minVermelhoFora4=" + minVermelhoFora4 + "&secVermelhoFora4=" + secVermelhoFora4 + "&minVermelhoFora5=" + minVermelhoFora5 + "&secVermelhoFora5=" + secVermelhoFora5 + "&minVermelhoFora6=" + minVermelhoFora6 + "&secVermelhoFora6=" + secVermelhoFora6 + "&minVermelhoFora7=" + minVermelhoFora7 + "&secVermelhoFora7=" + secVermelhoFora7 + "&minVermelhoFora8=" + minVermelhoFora8 + "&secVermelhoFora8=" + secVermelhoFora8
                + "&minVermelhoFora9=" + minVermelhoFora9 + "&secVermelhoFora9=" + secVermelhoFora9 + "&minVermelhoFora10=" + minVermelhoFora10 + "&secVermelhoFora10=" + secVermelhoFora10 + "&minVermelhoFora11=" + minVermelhoFora11 + "&secVermelhoFora11=" + secVermelhoFora11 + "&minVermelhoFora12=" + minVermelhoFora12 + "&secVermelhoFora12=" + secVermelhoFora12 + "&minVermelhoFora13=" + minVermelhoFora13 + "&secVermelhoFora13=" + secVermelhoFora13 + "&minVermelhoFora14=" + minVermelhoFora14 + "&secVermelhoFora14=" + secVermelhoFora14 + "&minVermelhoFora15=" + minVermelhoFora15 + "&secVermelhoFora15=" + secVermelhoFora15 + "&vermelhoTreinadorFora=" + vermelhoTreinadorFora + "&minVerTreinadorFora=" + minVerTreinadorFora + "&secVerTreinadorFora=" + secVerTreinadorFora + "&vermelhoAuxiliarFora=" + vermelhoAuxiliarFora + "&minVerAuxiliarFora=" + minVerAuxiliarFora + "&secVerAuxiliarFora=" + secVerAuxiliarFora + "&vermelhoMassagistaFora=" + vermelhoMassagistaFora + "&minVerMassagistaFora=" + minVerMassagistaFora + "&secVerMassagistaFora=" + secVerMassagistaFora + "&vermelhoTreinadorCasa=" + vermelhoTreinadorCasa + "&minVerTreinadorCasa=" + minVerTreinadorCasa + "&secVerTreinadorCasa=" + secVerTreinadorCasa + "&vermelhoAuxiliarCasa=" + vermelhoAuxiliarCasa 
                + "&minVerAuxiliarCasa=" + minVerAuxiliarCasa + "&secVerAuxiliarCasa=" + secVerAuxiliarCasa + "&vermelhoMassagistaCasa=" + vermelhoMassagistaCasa + "&minVerMassagistaCasa=" + minVerMassagistaCasa + "&secVerMassagistaCasa=" + secVerMassagistaCasa + "&golsCasa1=" + valorgolsCasa1 + "&golsCasa2=" + valorgolsCasa2 + "&golsCasa3=" + valorgolsCasa3 + "&golsCasa4=" + valorgolsCasa4 + "&golsCasa5=" + valorgolsCasa5 + "&golsCasa6=" + valorgolsCasa6 + "&golsCasa7=" + valorgolsCasa7 + "&golsCasa8=" + valorgolsCasa8 + "&golsCasa9=" + valorgolsCasa9 + "&golsCasa10=" + valorgolsCasa10 + "&golsCasa11=" + valorgolsCasa11 + "&golsCasa12=" + valorgolsCasa12 
                + "&golsCasa13=" + valorgolsCasa13 + "&golsCasa14=" + valorgolsCasa14 + "&golsCasa15=" + valorgolsCasa15 + "&golsCasa16=" + valorgolsCasa16 + "&golsCasa17=" + valorgolsCasa17 + "&golsCasa18=" + valorgolsCasa18 + "&golsCasa19=" + valorgolsCasa19 + "&golsCasa20=" + valorgolsCasa20 + "&golsCasa21=" + valorgolsCasa21 + "&golsCasa22=" + valorgolsCasa22 + "&minGolsCasa1=" + minGolsCasa1 + "&secGolsCasa1=" + secGolsCasa1 + "&minGolsCasa2=" + minGolsCasa2 + "&secGolsCasa2=" + secGolsCasa2 + "&minGolsCasa3=" + minGolsCasa3 + "&secGolsCasa3=" + secGolsCasa3 + "&minGolsCasa4=" + minGolsCasa4 + "&secGolsCasa4=" + secGolsCasa4 + "&minGolsCasa5=" + minGolsCasa5 + "&secGolsCasa5=" + secGolsCasa5 + "&minGolsCasa6=" + minGolsCasa6 + "&secGolsCasa6=" + secGolsCasa6 + "&minGolsCasa7=" + minGolsCasa7 + "&secGolsCasa7=" + secGolsCasa7 + "&minGolsCasa8=" + minGolsCasa8 + "&secGolsCasa8=" + secGolsCasa8 
                + "&minGolsCasa9=" + minGolsCasa9 + "&secGolsCasa9=" + secGolsCasa9 + "&minGolsCasa10=" + minGolsCasa10 + "&secGolsCasa10=" + secGolsCasa10 + "&minGolsCasa11=" + minGolsCasa11 + "&secGolsCasa11=" + secGolsCasa11 + "&minGolsCasa12=" + minGolsCasa12 + "&secGolsCasa12=" + secGolsCasa12 + "&minGolsCasa13=" + minGolsCasa13 + "&secGolsCasa13=" + secGolsCasa13 + "&minGolsCasa14=" + minGolsCasa14 + "&secGolsCasa14=" + secGolsCasa14 + "&minGolsCasa15=" + minGolsCasa15 + "&secGolsCasa15=" + secGolsCasa15 + "&minGolsCasa16=" + minGolsCasa16 + "&secGolsCasa16=" + secGolsCasa16 
                + "&minGolsCasa17=" + minGolsCasa17 + "&secGolsCasa17=" + secGolsCasa17 + "&minGolsCasa18=" + minGolsCasa18 + "&secGolsCasa18=" + secGolsCasa18 + "&minGolsCasa19=" + minGolsCasa19 + "&secGolsCasa19=" + secGolsCasa19 + "&minGolsCasa20=" + minGolsCasa20 + "&secGolsCasa20=" + secGolsCasa20 + "&minGolsCasa21=" + minGolsCasa21 + "&secGolsCasa21=" + secGolsCasa21 + "&minGolsCasa22=" + minGolsCasa22 + "&secGolsCasa22=" + secGolsCasa22 + "&golsFora1=" + valorgolsFora1 + "&golsFora2=" + valorgolsFora2 + "&golsFora3=" + valorgolsFora3 + "&golsFora4=" + valorgolsFora4 + "&golsFora5=" + valorgolsFora5 + "&golsFora6=" + valorgolsFora6 + "&golsFora7=" + valorgolsFora7 + "&golsFora8=" + valorgolsFora8 + "&golsFora9=" + valorgolsFora9 + "&golsFora10=" + valorgolsFora10 + "&golsFora11=" + valorgolsFora11 + "&golsFora12=" + valorgolsFora12 + "&golsFora13=" + valorgolsFora13 
                + "&golsFora14=" + valorgolsFora14 + "&golsFora15=" + valorgolsFora15 + "&golsFora16=" + valorgolsFora16 + "&golsFora17=" + valorgolsFora17 + "&golsFora18=" + valorgolsFora18 + "&golsFora19=" + valorgolsFora19 + "&golsFora20=" + valorgolsFora20 + "&golsFora21=" + valorgolsFora21 + "&golsFora22=" + valorgolsFora22 + "&minGolsFora1=" + minGolsFora1 + "&secGolsFora1=" + secGolsFora1 + "&minGolsFora2=" + minGolsFora2 + "&secGolsFora2=" + secGolsFora2 + "&minGolsFora3=" + minGolsFora3 + "&secGolsFora3=" + secGolsFora3 + "&minGolsFora4=" + minGolsFora4 + "&secGolsFora4=" + secGolsFora4 + "&minGolsFora5=" + minGolsFora5 + "&secGolsFora5=" + secGolsFora5 + "&minGolsFora6=" + minGolsFora6 + "&secGolsFora6=" + secGolsFora6 + "&minGolsFora7=" + minGolsFora7 + "&secGolsFora7=" + secGolsFora7 + "&minGolsFora8=" + minGolsFora8 + "&secGolsFora8=" + secGolsFora8 
                + "&minGolsFora9=" + minGolsFora9 + "&secGolsFora9=" + secGolsFora9 + "&minGolsFora10=" + minGolsFora10 + "&secGolsFora10=" + secGolsFora10 + "&minGolsFora11=" + minGolsFora11 + "&secGolsFora11=" + secGolsFora11 + "&minGolsFora12=" + minGolsFora12 + "&secGolsFora12=" + secGolsFora12 + "&minGolsFora13=" + minGolsFora13 + "&secGolsFora13=" + secGolsFora13 + "&minGolsFora14=" + minGolsFora14 + "&secGolsFora14=" + secGolsFora14 + "&minGolsFora15=" + minGolsFora15 + "&secGolsFora15=" + secGolsFora15 + "&minGolsFora16=" + minGolsFora16 + "&secGolsFora16=" + secGolsFora16 
                + "&minGolsFora17=" + minGolsFora17 + "&secGolsFora17=" + secGolsFora17 + "&minGolsFora18=" + minGolsFora18 + "&secGolsFora18=" + secGolsFora18 + "&minGolsFora19=" + minGolsFora19 + "&secGolsFora19=" + secGolsFora19 + "&minGolsFora20=" + minGolsFora20 + "&secGolsFora20=" + secGolsFora20 + "&minGolsFora21=" + minGolsFora21 + "&secGolsFora21=" + secGolsFora21 + "&minGolsFora22=" + minGolsFora22 + "&secGolsFora22=" + secGolsFora22 + "&minTempoCasa1Periodo=" + minTempoCasa1Periodo + "&secTempoCasa1Periodo=" + secTempoCasa1Periodo + "&minTempoCasa2Periodo=" + minTempoCasa2Periodo + "&secTempoCasa2Periodo=" + secTempoCasa2Periodo + "&minTempoFora1Periodo=" + minTempoFora1Periodo + "&secTempoFora1Periodo=" + secTempoFora1Periodo + "&minTempoFora2Periodo=" + minTempoFora2Periodo + "&secTempoFora2Periodo=" + secTempoFora2Periodo + "&anotacoesPartida=" + anotacoesPartida)
                .then( response => {
                    return response.text();
                });

            }, 5000);