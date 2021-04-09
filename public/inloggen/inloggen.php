<?php
    session_start();
    include('includes/dbh.inc.php');
//     if (!$conn) {
// die("Verbinding mislukt: " . mysqli_connect_error());
// }
// else {
//   echo '<h1 style="color:green;">Verbinding gelukt</h1>';
// }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Inloggen</title>
        <link rel="stylesheet" type="text/css" href="design.css">
    </head>
    <body>

    <header>
   <img  class="logo" width="25%" height="10%" src="afbeelding/logo_small.png" alt="logo">
<?php
    include 'menu.php';
    ?>
    </header>
    
    

    
    <section 
    class="signup-form">
	<h2>Inloggen</h2>
	<div class="aanmelden_uiterlijk">
    <form action="includes/inloggen.inc.php" method="POST">
        <input type="text" name="uid" size="50" placeholder="leerlingnummer/docentnummer/E-mailadres...">
        <input type="password" name="pwd" placeholder="Wachtwoord...">
    <div class="button"><br>
  <button type="submit"name="submit">Inloggen</button>
  </div>
	</form>


    <?php
    if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Vul alle velden in.</p>";
    }
    else if ($_GET["error"] == "wronglogin") {
        echo "<p>Onjuiste logingegevens.</p>";
        }
    }
    ?>
<p><button onclick="location.href='reset-password.php'" class="button"> Uw wachtwoord vergeten?</button></p>

</section> 
</div>
</body>
	
    
     <?php


    if ($_POST["submit"]) {
        header("location: ../inloggen/profile.php");
    }

    include 'footer.php';
    ?>
</html>

