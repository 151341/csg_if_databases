<?php
    session_start();
    require('includes/dbh.inc.php');
    $dBName = "project";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Algemene informatie</title>
        <link rel="stylesheet" type="text/css" href="design.css">
    </head>
    <body>

    <header>
	<img class="logo" width="25%" height="10%" src="afbeelding/logo_small.png" alt="logo">

    <?php
    include 'menu.php';
    ?>
    </header>

    <div class="start">
        <section class="index-intro">
        <h2>Algemene informatie</h2>

    <br><p8>Deze website is gemaakt door Christiaan Vlas en Stef Delnoye.</8p><br></p8>
    <br><p8>De website kan gebruikt worden voor leerlingen om hun herkansing door te geven.</8p><br></p8>
    <br><p8>Overigens kunnen docenten zien welke vakken leerlingen hebben en welke toets ze willen herkansen.</8p></p8>
    

        </div>
        </section>
     <?php
    include 'footer.php';
    ?>
</html>