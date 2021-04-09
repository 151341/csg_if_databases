<?php

if (isset($_POST["reset-request-submit"])) {
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "https://8001-indigo-piranha-yurw1pga.ws-eu03.gitpod.io/inloggen/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token); //tussen inloggen en create misschien forgottenpwd
// 
    $expires = date("U") + 1800;

    require 'dbh.inc.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Er ging iets fout.";
        exit();
   }
   else {
       mysqli_stmt_bind_param($stmt, "s", $userEmail);
       mysqli_stmt_execute($stmt);
   }

   $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
       echo "Er ging iets fout.";
       exit();
  }
  else {
      $hashedToken = password_hash($token, PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
      mysqli_stmt_execute($stmt);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  $to = $userEmail;
  $subject = 'Uw wachtwoord opnieuw instellen voor school';
  $message = '<p>We ontvingen een verzoek om Je wachtwoord opnieuw in te stellen. Klik op de link om Je wachtwoord opnieuw in te stellen.</p>';
  $message .= '<p>Hier is de link voor het opnieuw instellen van Je wachtwoord: </br>';
  $message .= '<a href="' . $url . '">' . $url . '</a></p>'; // kies de juiste url

  $headers = "From: csgproj <online4testen@gmail.com>\r\n";
  $headers .= "Reply-To: online4testen@gmail.com\r\n";
  $headers .= "Content-type: text/html\r\n";

  mail($to, $subject, $message, $headers);

  header("Location: ../reset-password.php?reset=succes");

}
else {
    header("Location: ../index.php");
}