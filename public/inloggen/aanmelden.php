<?php
    session_start();
    require('includes/dbh.inc.php');
    $dBName = "project";
    $conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

    include __DIR__ . "/includes/get-subjects.php";

    foreach( $subjects as $i => $subject) $subjects[$i]["html_id"] = bin2hex(random_bytes(2));
    // if (!$conn) {
    // die("Verbinding mislukt: " . mysqli_connect_error());
    // }
    // else {
    // echo '<h1 style="color:green;">Verbinding gelukt</h1>';
    // }

?>


<!DOCTYPE html>
<html>
    <head>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <title>Aanmelden</title>
        <link rel="stylesheet" type="text/css" href="design.css">
    </head>
    <body>

    <header>

	    <img class="logo" width="25%" height="10%" src="afbeelding/logo_small.png" alt="logo">

<?php
    include 'menu.php';
    ?>
    </header>
	
	<section class="signup-form">

	    <h2>Aanmelden</h2>

        <div class="aanmelden_uiterlijk">
        
            <form action="includes/aanmelden.inc.php" method="post">
                <input type="text" name="naam" placeholder="Voor- en achternaam...">
                <input type="text" name="email" placeholder="E-mailadres...">
                <input type="text" name="uid" placeholder="Leerlingnummer/docentnummer...">
                <input type="password" name="pwd" placeholder="Wachtwoord...">
                <input type="password" name="pwdrepeat" placeholder="Herhaal wachtwoord...">

                <!-- <?php foreach ($subjects as $subject) : ?>

                    <input type="checkbox" id="<?= $subject["html_id"] ?>" name="subject1">
                    <label for="<?= $subject["html_id"] ?>"><?= $subject["name"] ?></label><br>

                <?php endforeach; ?> -->

                  <?PHP
    echo $_SESSION['userid'].'<br>';
    require('includes/dbh.inc.php');
    $dBName = "project";
    $conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);
        
    mysqli_close($conn);
?>
        <button type="submit" name="submit" value="Submit">Aanmelden</button>
        </form>

       

        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Vul alle velden in.</p>";
                }
                else if ($_GET["error"] == "invaliduid") {
                    echo "<p>Kies een geldig leerlingnummer/docentnummer.</p>";
                }

                else if ($_GET["error"] == "invalidemail") {
                    echo "<p>Kies een geldig e-mailadres.</p>";
                }
                else if ($_GET["error"] == "passwordsdontmatch") {
                    echo "<p>Het herhaalde wachtwoord is niet hetzelfde.</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Iets ging fout. Probeer opnieuw.</p>";
                }
                else if ($_GET["error"] == "usernametaken") {
                    echo "<p>Leerlingnummer/docentnummer is al in gebruik. Kies een nieuw leerlingnummer/docentnummer.</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo "<br><p8>Je bent aangemeld. Je kunt nu inloggen.</p8></br>";
                    // header("location: ../inloggen/inloggen.php");  
                    //  activeer deze als je liever hebt dat je gelijk naar inloggen.php gaat als je bent aangemeld
                }
            }
        ?>
	

    <?php
    if (isset($_GET["newpwd"])) {
        if ($_GET["newpwd"] == "passwordupdated") {
            echo '<p8 class="signupsuccess"> Je wachtwoord is succesvol opnieuw ingesteld</p8>';
        }
    }
    ?>
 <p><button onclick="location.href='inloggen.php'" class="button"> inloggen</button></p>
 <p><button onclick="location.href='reset-password.php'" class="button"> Uw wachtwoord vergeten?</button></p>



 </section>
 <?php
       if (!$conn) {
  die("Verbinding mislukt: " . mysqli_connect_error());
}
else {
  echo '<h1 style="color:green;">Verbinding gelukt</h1>';
}
    include 'footer.php';
    ?>

 </div>
</html>