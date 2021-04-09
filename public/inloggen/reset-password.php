<!DOCTYPE html>
<html>
    <head>
        <title>Wachtwoord opnieuw instellen</title>
        <link rel="stylesheet" type="text/css" href="design.css">
    </head>
    <body>

    <header>
	<img class="logo" width="25%" height="10%" src="afbeelding/logo_small.png" alt="logo">

<?php
    include 'menu.php';
    ?>
    </header>

<main>
<div class="wrapper-main">
<section class="section-default">
    <h1>Wachtwoord opnieuw instellen</h1>
    <p>Een e-mail zal naar je verstuurd worden met de instructies hoe je je wachtwoord opnieuw kan instellen.</p>
    <form action="includes/reset-request.inc.php">
    <input type="text" name="email" placeholder="vul Je e-mailadres in...">
    <button type="submit" name="reset-request-submit">Verstuur de e-mail</button>
    </form>
    <?php
    if (isset($_GET["reset"])) {
        if ($_GET["reset"] == "success") {
            echo '<p class="signupsuccess">Check Je e-mail</p>';
        }
    }
    ?>
</section>
</div>
</main>


</body>
 <?php
    include 'footer.php';
    ?>
</html>