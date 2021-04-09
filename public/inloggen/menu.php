<?php
    session_start();
    include 'includes/dbh.inc.php';
    include_once 'includes/dbh.inc.php';
    require('includes/dbh.inc.php');
?>

<nav>
<ul class="nav_links"> 
    <!-- <li><a href="index.php">Startpagina</a></li> -->
     <?php

    
    $sqli = "SELECT user_resit FROM `users_resit` WHERE usersId = '{$_SESSION['userid']}'";
    $recordi = mysqli_query($conn, $sqli);

 
    if (isset($_SESSION["useruid"])) {   echo "<li><a href='index.php'>Startpagina</a></li>";
    echo "<li><a href='profile.php'>Profiel</a></li>";
    $sql = "SELECT * FROM users_subjects WHERE usersId = '{$_SESSION['userid']}'";
    $results = mysqli_query($conn, $sql);
    if (!($_SESSION['userid'] == 1)) {
        if (mysqli_num_rows($results) == 0) {
            echo "<li><a href='kiesvakken.php'>Kies je vakken</a></li>";  
        } 
        elseif (mysqli_num_rows($recordi) == 0) { // als de leerling nog geen herkansing heeft
            $recordi = mysqli_fetch_assoc($recordi);
            echo "<li><a href='kiesherkansing.php'>Kies je Herkansing</a></li>";
        }
    }
    else {
    
        echo "<li><a href='zievakken.php'>Vakken leerlingen</a></li>";
        echo "<li><a href='zieherkansingen.php'>Zie herkansingen</a></li>"; 
    }
    
    // echo "<li><a href='algemeneinfo.php'>Algemene informatie</a></li>";
    echo "<li><a href='contact.php'>Contact</a></li>";
    echo "<li><a href='includes/uitloggen.inc.php'>Uitloggen</a></li>";
    }
    else {
        echo "<li><a href='index.php'>Startpagina</a></li>";
        echo "<li><a href='algemeneinfo.php'>Algemene informatie</a></li>";
        echo "<li><a href='contact.php'>Contact</a></li>";
        echo "<li><a href='aanmelden.php'>Aanmelden</a></li>";
        echo "<li><a href='inloggen.php'>Inloggen</a></li>";
    }
    ?>
   
    

    </ul>
</nav>