<?php 

    use PHPMailer\PHPMailer\PHPMailer;
function enviarEmail($email, $nome, $assunto, $corpo, $cod) {
    require 'vendor/autoload.php';

    $mensagem = "Olá " . $nome . ", " . $cod . ", " . "esse é o código para redefinir sua senha, insira-o na caixa de texto no CitaJAG e você será redirecionado para redefinir sua senha!";

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;
    $mail->IsSMTP(); 
    $mail->Host = "smtp.gmail.com"; // Servidor SMTP
    $mail->Port = 465; 
    $mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Username = "jpmpitoni@gmail.com"; // SMTP username
    $mail->Password = "zveufbmfaymtxdno"; // SMTP password
    
    $mail->isHTML(true); // Enviar como HTML
    $mail->SMTPSecure = 'ssl';
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('suporte@citajag.com', 'CitaJAG');
    $mail->addAddress($email, $nome); // Email e nome de quem receberá //Responder
    $mail->Subject = $assunto; // Assunto
    
    $mail->Body = $corpo; //Corpo da mensagem caso seja HTML
    $mail->AltBody = "$mensagem" ; //PlainText, para caso quem receber o email não aceite o corpo HTML

    if($mail->Send()) { // Envia o email 
           
    } else {
        echo "Erro no envio do código para o e-mail, contate o suporte para mais informações!";
    }
}
?>