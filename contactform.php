<?php
    $result="";

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    use PHPMailer\PHPMailer\PHPMailer;

    $email_user = getenv['EMAIL_USER'];
    $email_password = getenv['EMAIL_PASSWORD'];

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $body = $_POST['body'];

        require_once "phpmailer/src/PHPMailer.php";
        require_once "phpmailer/src/SMTP.php";
        require_once "phpmailer/src/Exception.php";

        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $email_user;
        $mail->Password = $email_password;
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';

        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress('contact@nicolanz.io');
        $mail->Body = $body;

        if($mail->send()){
            $status = "success";
            $response = "Your message has been sent. We'll be in touch...";
        }
        else
        {
            $status = "failed";
            $response = "Something went wrong: <br>".$mail->ErrorInfo;
        }

        exit(json_decode(array("status" => $status, "response" => $response)));
    }

?>