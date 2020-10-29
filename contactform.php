<?php
    if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mailFrom = $_POST['mailFrom'];
    $message = $_POST['message'];

    $mailTo = "nicolanzi@gmail.com";
    $headers = "From: ".$mailFrom;
    $subject = "New Form Submission";
    $txt = "You have received an email from ".$name.".\n\n".$message;

    mail($mailTo, $txt, $headers);
    header("Location: index.html");
}

?>