<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFROM = $_POST['mail'];
    $message = $_POST['message'];

    $mailTo = "stef.delnoye@gmail.com";
    $headers = "From: ".$mailFROM;
    $txt = "You have received an e-mail from ".$name.".\n\n".$message;

    mail($mailTo, $subject, $txt, $headers);
    header("Location: random.php?mailsend");
}