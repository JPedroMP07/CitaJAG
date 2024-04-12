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

     $equipeLista = $_SESSION["equipeLista"];
     $categoriaLista = $_SESSION["categoriaLista"];

     if(isset($_SESSION["categoriaLista"]) && isset($_SESSION["equipeLista"])) { 
     $sql_nomesJogadoresLista = "SELECT docIdentidade, fotoPerfil, nomeUsuario, emblema, categoria, equipe, funcao, suspenso FROM usuarios WHERE equipe = '$equipeLista' AND categoria = '$categoriaLista'";
     $query_dadosJogadoresLista = $mysqli->query($sql_nomesJogadoresLista) or die($mysqli->error);
    }

 $html = "<!DOCTYPE html>
            <html lang='pt-BR'>
            <head>
            <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' href='https://localhost/citajag/gerarLista.css'>";
                
            $html.= "<link rel='icon' href='https://cdn.discordapp.com/attachments/750028167225540648/963110597187235870/icone_appcjagforeground.png'>
                        <title>CitaJAG - Gerar Lista</title>
                        </head>
                        <body>
                        <main>";
  
        $html.= "<div class='container'>
                    <div class='child'>
                    <img class='logo-citadino' style='width: 120px;' src='https://cdn.discordapp.com/attachments/750028167225540648/1169340842260054037/Sem_Titulo-1.png'/>
                    <p class='titulo'>Lista de Atletas da equipe ". $equipeLista ."</p>
                <table border='1' class='tabela'>
                <colgroup span='3'></colgroup>
                    <tr>
                        <th>Nome</th>
                        <th>Nº do Documento</th>
                        <th>Assinatura</th>
                    </tr>";

        while($dadoJogador = $query_dadosJogadoresLista->fetch_assoc()) {
            $docIdentidade = $dadoJogador["docIdentidade"];
            $nomeUsuario = $dadoJogador["nomeUsuario"];
            $suspenso = $dadoJogador["suspenso"];
            $suspensoTexto = " - Restam: ".$suspenso." jogos.";

        $html.= "<tr>";
                
                if($suspenso > 1) {
        $html.="<td style='color:red;'>". $nomeUsuario . $suspensoTexto."</td>";
                } else {
            $html.="<td>". $nomeUsuario ."</td>
                    <td>". $docIdentidade ."</td>
                    <td> </td>
                </tr>";
            }
        }
        $html.= "</table>
                    <img class='logo-sumula' style='width: 90px;' src='https://cdn.discordapp.com/attachments/750028167225540648/1088666411783700541/logocitajagtelaini.png'>
                    </div>
                 </div>
                    <style>
                    .logo-citadino {
                        position: absolute;
                        top: 0;
                        left: 50%;
                        transform: translate(-50%, -50%);
                    }

                    .titulo {
                        text-align: center;
                        margin-top: 24px;
                        font-weight: 600;
                    }

                    .logo-sumula {
                            position: absolute;
                            top: 100%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                    }

                        .tabela, th, td{
                            border-collapse:collapse;
                            padding: 4px;
                            text-align: left;
                            width: 90% !important;
                            margin: auto;
                        }
                    </style>
                </main>
                </body>
            </html>";

    // Incluímos a biblioteca DOMPDF
    require 'vendor/autoload.php';

    use Dompdf\Dompdf;

    // Instanciamos a classe
    $dompdf = new DOMPDF(['enable_remote' => true]);

    // Passamos o conteúdo que será convertido para PDF
    // $html = file_get_contents("sumula.php");
    $dompdf->load_html($html);

    // Definimos o tamanho do papel e
    // sua orientação (retrato ou paisagem)
    $dompdf->set_paper('A4','portrait');
    
    // O arquivo é convertido
    $dompdf->render();

    // Salvo no diretório temporário do sistema
    // e exibido para o usuário
    $output = $dompdf->stream("$equipeLista");
    
    
    ?>