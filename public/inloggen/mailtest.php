<?php
    session_start();
    include 'includes/dbh.inc.php';
    include_once 'includes/dbh.inc.php';
    require('includes/dbh.inc.php');
    

    require_once('php-mailer-master/PHPMailerAutoload.php');

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth; //of zonder ()
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '8001'; // in ons geval 8001   465
    $mail->isHTML();
    $mail->Username = 'stef.delnoye@gmail.com';
    $mail->Password = '';
    $mail->setFrom('no-reply@howcode.org');
    $mail->Subject = "hello world";
    $mail->Body = "a test email";
    $mail->addAddress('');
    $mail->send();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>random</title>
        <link rel="stylesheet" type="text/css" href="design.css">
    </head>
<body>
<?php
$dbName = "project";
require("includes/dbh.inc.php");
$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

?>

</body>
 <?php
    include 'footer.php';
    ?>
</html>