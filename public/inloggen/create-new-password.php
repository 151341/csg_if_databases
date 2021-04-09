<!DOCTYPE html>
<html>
    <head>
        <title>Nieuw wachtwoord creëren</title>
        <link rel="stylesheet" type="text/css" href="design.css">
    </head>
    <body>

    <header>
	<img class="logo" width="25%" height="10%" src="afbeelding/logo_small.png" alt="logo">

    </header>
    <div class="option_">
<?php
    include 'menu.php';
    ?> </div>

<main>
    <div class="wrapper-main">
        <section class="section-default">
           <?php
             $selector = $_GET["selector"];
             $validator = $_GET["validator"];

             if (empty($selector) || empty($validator)) {
                 echo "Uw verzoek kon niet gevalideerd worden";
             }
             else {
                 if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                     ?>
                        <form action="includes/reset-password.inc.php" method="POST">
                          <input type="hidden" name="selector" value="<?php echo $selector ?>">
                          <input type="hidden" name="validator" value="<?php echo $validator ?>">
                          <input type="password" name="pwd" placeholder="Voer je nieuwe wachtwoord in">
                          <input type="password" name="pwd-repeat" placeholder="Herhaal je nieuwe wachtwoord in">
                          <button type="submit" name="reset-password-submit">Nieuwe wachtwoord invoeren</button>
                        </form>
                     <?php
                 }
             }
           ?>
        </section>
    </div>
</main>

 <?php
    include 'footer.php';
    ?>
</body>
</html>