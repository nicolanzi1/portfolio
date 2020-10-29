<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $from = 'nicolanzi@gmail.com';
    $subject = "New form submission";
    $body = "Name: $name.\n".
                "Email: $email.\n".
                    "Message: $message.\n";

    $to = "nicolanzi@gmail.com";
    $headers = "From: $from \r\n";
    $headers .= "Reply to: $email \r\n";
    mail($to,$subject,$body,$headers);
    header("Location: thanks.html");
?>