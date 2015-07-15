<?php
//Замените настройки на нужные.
$mail_to = 'techkrasnov1@gmail.com'; //вам потребуется указать здесь Ваш настоящий почтовый ящик, куда должно будет прийти письмо.
$type = 'plain'; //Можно поменять на html; plain означяет: будет присылаться чистый текст.
$charset = 'UTF-8';
$subject = "contact";

include('smtp-func.php');
if ($_REQUEST['message'])
{
   $message = $_REQUEST['message'];
   $replyto = $_REQUEST['replyto'];
   $mail_from = $_REQUEST['mail_from'];
    
   $headers = "To: \"Administrator\" <$mail_to>\r\n".
              "From: \"$replyto\" <$mail_from>\r\n".
              "Reply-To: $replyto\r\n".
              "Content-Type: text/$type; charset=\"$charset\"\r\n";
 
	$sended = smtpmail($mail_to, $subject, $message, $headers);
   echo '<html>
        <head>
        <meta http-equiv="content-type" content="text/html; charset='.$charset.'">
        </head>
              <body>';
   if (!$sended) echo 'error!Please send your message to: '.$mail_to;
   else echo 'Thanks you for your message!';
   echo '</body>';
   exit;
}
Header('Location: mailer.php');
?>
