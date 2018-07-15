<?php
//require('phpmailer/src/PHPMailer.php');
include('phpmailer/src/PHPMailer.php');
include('phpmailer/src/SMTP.php');

include('phpmailer/src/Exception.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = 587;  
$mail->Username = "projetosparacameras@gmail.com";
$mail->Password = "cam147258";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("projetosparacameras@gmail.com", "Camplanner - Faleconosco MVP");
$mail->AddReplyTo("projetosparacameras@gmail.com", "Camplanner - Faleconosco MVP");
$mail->AddAddress("projetosparacameras@gmail.com");
$mail->AddAddress("andersondefaria1980@gmail.com");
$mail->Subject = "Camplanner - Faleconosco MVP: ". $_POST["assunto"];
$mail->WordWrap   = 80;
$content = "<b>Camplanner - Faleconosco MVP </b><br> <br>Mensagem enviada por: ". $_POST["nome"] . " / " .$_POST["email"]. "<br><br><b>Mensagem: </b>". $_POST["mensagem"]; 
$mail->MsgHTML($content);
$mail->IsHTML(true);
if(!$mail->Send()) {
  $mensagem = "Ocorreram problemas no envio do e-mail, tente novamente por favor. Caso o problema persista entre em contato com projetosparacameras@gmail.com. Desculpe o transtorno.";
  $erro = "sim";
}else{
  $mensagem = "Mensagem enviada com sucesso. Obrigado por entrar em contato. A Equipe Camplanner agradece.";
  $erro="nao";
}
?>

<form class="form-horizontal" id="formprincipal" action="faleconosco.php" method="post">
  <input type="hidden" name="mensagem" value="<?=$mensagem?>">
  <input type="hidden" name="erro" value="<?=$erro?>">
  </form>
  <script>
    document.getElementById("formprincipal").submit();
  </script>