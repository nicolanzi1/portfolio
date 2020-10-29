<?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $mailFrom = $_POST['mail'];
        $message = $_POST['message'];

        $mailTo = "contact@nicolanz.io";
        $headers = "From: ".$mailFrom;
        $subject = "Contact form submission: $name";
        $txt = "You have received an email from ".$name.".\n\n".$message;

        mail($mailTo, $subject, $txt, $headers);
        header("Location: thanks.html");
    }
?>