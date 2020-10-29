<?php
    $result="";

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    require PHPMailer/PHPMailer/PHPMailer;

    $email_user = getenv['EMAIL_USER'];
    $email_password = getenv['EMAIL_PASSWORD'];

    if(isset($_POST['submit'])){
        require 'PHPMailer/autoload.php';
        $mail = new PHPMailer;

        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';
        $mail->Username=$email_user;
        $mail->Password=$email_password;

        $mail->setFrom($_POST['email'],$_POST['name']);
        $mail->addAddress('contact@nicolanz.io');
        $mail->addReplyTo($_POST['email'],$_POST['name']);

        $mail->isHTML(true);
        $mail->Subject="Form Submission: ".$_POST['subject'];
        $mail->Body='<h1 align=center>Name: '.$_POST['name'].'<br>Email: '.$_POST['email'].'<br>Message: '.$_POST['msg'].'</h1>';

        if(!$mail->send()){
            header('Location: error.html');
        }
        else{
            header('Location: thanks.html');
        }
    }

?>