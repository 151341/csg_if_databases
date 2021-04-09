<?php
session_start();


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profiel</title>
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
        //session_start();
        require('includes/dbh.inc.php');
        $dBName = "project";
        $conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);
        $sql = "SELECT * FROM users"; 
           
        
        if (isset($_POST['uid'])) { // is er iets ingevuld: gebruikersnaam of email
            echo "werkt";
            $naam=$_POST['uid'];
            $pass=$_POST['pwd'];
            $sql="SELECT * FROM users WHERE userName='".$naam."' OR userEmail='".$naam."' AND userPwd='".$pass."'"; //usersPwd misschien usersUid
            $records= mysqli_query($conn, $sql);
                if (mysqli_num_rows($records) == 1) {
                    $_SESSION["user"]= "$naam";
                    header("Location: profile.php");
                    exit();
                    echo "het werkt";
                }
                else {
                echo "<h1 style='color: red;'>leerlingnummer, docentnummer, E-mailadres of wachtwoord onjuist</h1>";
                }
        }

echo '<h1> Profiel van '.$_SESSION['username']. 
'</h1><br><p8>Je ';
if ($_SESSION['userid'] == 1) {
    echo 'docentnummer';
}
else {
    echo 'leerlingnummer';
}
echo ' is '.$_SESSION['useruid'].'</p8><br><br><p8>Je e-mailadres is '.$_SESSION['useremail']. '</p8></br>' ;

$sql = "SELECT users_subjects FROM users_subjects WHERE usersId = '{$_SESSION['userid']}'";
$records = mysqli_query($conn, $sql);
if (mysqli_num_rows($records) > 0) {
    echo "<br><br><h3>Je hebt de volgende vakken: </h3><br>";
    while($record = mysqli_fetch_assoc($records)) {
    echo " <br><p8>".$record["users_subjects"]."<br></p8>";
    }
    echo "<br>";

    $sqll = "SELECT user_resit FROM `users_resit` WHERE usersId = '{$_SESSION['userid']}'";
    $record = mysqli_query($conn, $sqll);
    if ($record > 0) {
    }
    else {
    ?>



    <?php
    }  
} 

else {
    if (!($_SESSION['userid'] == 1)) {
    ?>
<p><button onclick="location.href='kiesvakken.php'" class="button_vhk"> Kies je huidige schoolvakken</button></p>
    <?php
    }
    
}

$sql = "SELECT users_subjects FROM users_subjects WHERE usersId = '{$_SESSION['userid']}'";
$records = mysqli_query($conn, $sql);


$sql2 = "SELECT users_subjects FROM `users_subjects` WHERE usersId = '{$_SESSION['userid']}'";
$records2 = mysqli_query($conn, $sql2);
if (mysqli_num_rows($records2) > 0) {
    echo '';
}
$record = mysqli_query($conn, $sqln);



$sqli = "SELECT user_resit FROM `users_resit` WHERE usersId = '{$_SESSION['userid']}'";
$recordi = mysqli_query($conn, $sqli);
if (mysqli_num_rows($recordi) > 0) { // als de leerling nog geen herkansing heeft
    $recordi = mysqli_fetch_assoc($recordi);
    echo "<h6> Je herkanst: ".$recordi['user_resit'] ;
    
    
    ?>  </h6>
  
<div class="button_vhk">
    <form action="profile.php" method="POST">

    <button type="submit" name="verwijderHK">
        <?php
        echo "Verwijder je herkansing voor".$recordi['user_resit']?>
    </button>
    
    </form><div
    <?php
    
}
?>
</section>
<?php
if (isset($_POST['verwijderHK'])) {
    $sql = "DELETE FROM `users_resit` WHERE usersId='{$_SESSION['userid']}'";
    header("Refresh:0");
    mysqli_query($conn, $sql);
}

$sqlvak = "SELECT * FROM users_subjects WHERE usersId = '{$_SESSION['userid']}'";
$recordsvak = mysqli_query($conn, $sqlvak);
if (mysqli_num_rows($recordsvak) > 0) {
    $sqlherk = "SELECT * FROM users_resit WHERE usersId = '{$_SESSION['userid']}'";
    $recordsherk = mysqli_query($conn, $sqlherk);
    if (mysqli_num_rows($recordsherk) == 0) {
        ?>

<div class="kieshk">
 <form action="kiesherkansing.php" >
    <button class="button_vhk" type="submit"> Kies je herkansing </button>
    </form>
    </div>
    <?php
    }
}
?>
</div>
</body>
 <?php
    include 'footer.php';
    ?>
</html>