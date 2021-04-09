<?php
session_start();
// echo "<h3>inhoud SESSION-array:</h3><PRE>";
// print_r($_SESSION);
// echo "</PRE>";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Startpagina</title>
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


<?php
        if ($_SESSION['userid'] == 1){
            ?>
            <h1>Welkom Docent</h1>
            <br>


 <form action="zievakken.php">
    <button type="submit"> Vakken van leerlingen </button>
    </form></br>

 <form action="zieherkansingen.php">
    <button type="submit"> Gekozen herkansing van leerlingen</button>
    </form>



            <?php
        }
        else 
        
        {
            ?>
            <h1>Welkom bij Herkansing.nl</h1>
            <h3>Heb je een herkansing nodig? Geen probleem, hier regel je het!</h3>          
            <?php
            if (!isset($_SESSION["useruid"])) {
            ?>
            <p8>Ben je nieuw hier? Dan mag je eerst 
            <div class= "inloggen_aanmeldenbutton">
            <button style=" display:inline;" onclick="location.href='aanmelden.php'" >aanmelden</button>
            </div></p8>
            <br><br>
            
            <p8>Heb je al een account? Dan mag je

            <div class= "inloggen_aanmeldenbutton">
            <button style=" display:inline;" onclick="location.href='inloggen.php'">inloggen</button></p8>
            </div>
            </p8>
            <?php
            }
            ?>    
            
        
            
            <br> <br> <p8>Heb je vragen? Of wat anders te melden? Neem dan
            
              <div class= "inloggen_aanmeldenbutton">
            <button style=" display:inline;" onclick="location.href='contact.php'" >contact</button>
             met ons op.</p8>
            </div>             

            <?php
        }
        ?>

        </div>
        </section>

    </div>


    <?php
    include 'footer.php';
    ?>
    </body>
</html>