<?php 
    include('conexao.php');
    
    if(!isset($_SESSION)) {
        session_start();
    }

    if(!($_SESSION['funcao'] == "arbitragem") && !($_SESSION['funcao'] == "admin")) {
        header("Location: inicio");
        die();
    }

    // $data = $_POST["image"];

    // list($type, $data) = explode(';', $data);
    // list($base, $data) = explode(',', $data);

    // $data = base64_decode($data);

    // // $path = $nome1Arbitro . $diaMes . '.png';

    // file_put_contents('/citajag/arquivos/assinaturas', $data);


// Requires php5  
$result = array();
$img_data = base64_decode($_POST['name_img']);
$filename = uniqid();
$file_name = './assinaturas/' . $filename . '.png';
file_put_contents($file_name, $img_data);
$result['status'] = 1;
$result['file_name'] = $file_name;

$nomeArquivo = $filename . '.png';
$quemAss = $_POST['assinatura'];

if($quemAss == "assTecCasa") {
    $sql_assinatura = "UPDATE sumula SET assTecCasa = '$nomeArquivo'";
    $funcionou_update = $mysqli->query($sql_assinatura) or die($mysqli->error);
} else if($quemAss == "assCapCasa") {
    $sql_assinatura = "UPDATE sumula SET assCapCasa = '$nomeArquivo'";
    $funcionou_update = $mysqli->query($sql_assinatura) or die($mysqli->error);
} else if($quemAss == "assTecFora") {
    $sql_assinatura = "UPDATE sumula SET assTecFora = '$nomeArquivo'";
    $funcionou_update = $mysqli->query($sql_assinatura) or die($mysqli->error);
} else if($quemAss == "assCapFora") {
    $sql_assinatura = "UPDATE sumula SET assCapFora = '$nomeArquivo'";
    $funcionou_update = $mysqli->query($sql_assinatura) or die($mysqli->error);
} else if($quemAss == "ass1Arb") {
    $sql_assinatura = "UPDATE sumula SET ass1Arb = '$nomeArquivo'";
    $funcionou_update = $mysqli->query($sql_assinatura) or die($mysqli->error);
} else if($quemAss == "ass2Arb") {
    $sql_assinatura = "UPDATE sumula SET ass2Arb = '$nomeArquivo'";
    $funcionou_update = $mysqli->query($sql_assinatura) or die($mysqli->error);
} else if($quemAss == "assCronometrista") {
    $sql_assinatura = "UPDATE sumula SET assCronometrista = '$nomeArquivo'";
    $funcionou_update = $mysqli->query($sql_assinatura) or die($mysqli->error);
} else if($quemAss == "assAnotador") {
    $sql_assinatura = "UPDATE sumula SET assAnotador = '$nomeArquivo'";
    $funcionou_update = $mysqli->query($sql_assinatura) or die($mysqli->error);
}
  
?>