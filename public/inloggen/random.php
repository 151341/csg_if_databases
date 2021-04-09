<?php
    session_start();
    include 'includes/dbh.inc.php';
    include_once 'includes/dbh.inc.php';
    require('includes/dbh.inc.php');
    $dbName = "project";
    require("includes/dbh.inc.php");
    $conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

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
if ($_SESSION['userid'] == 1 ) {
        $sql = "SELECT * FROM users,users_resit WHERE users.usersId=users_resit.usersId";
        $records = mysqli_query($conn, $sql);
        if (mysqli_num_rows($records) > 0) {
            while ($record = mysqli_fetch_assoc($records))
            echo $record["usersName"]."<br>";
        }
    }
?>

<input type="submit" name="submit" id="submit">
<?php
if ($_POST['submit']) {
    // echo 'hoi';
	header("location: ../index.php");

}




if(isset($_POST["vak"])) {
    if (!empty($_POST["vak"])) {
    echo ' Engels<br> Nederlands<br><br><br>';}}


$sql2 = "SELECT * FROM users WHERE usersUid='151341'"; 
$resultaat = mysqli_query($conn, $sql2);
if (mysqli_num_rows($resultaat) > 0) {
    while($res = mysqli_fetch_assoc($resultaat)) {
        echo "<br>".$res["usersId"]."<br>";
    }
}
?>


</body>
</html>