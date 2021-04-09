<?php
session_start();
require('includes/dbh.inc.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bekijk vakken</title>
        <link rel="stylesheet" type="text/css" href="design.css">
    </head>
    <body>

    <header>
	<img class="logo" width="25%" height="10%" src="afbeelding/logo_small.png" alt="logo">

<?php
    include 'menu.php';
    ?>
</header>
<?php
include 'footer.php';
?>
   <div class="index-intro">>
        <!-- <section class="index-intro"> -->
<h1>Bekijk vakken van de leerlingen:</h1>


        <!-- </section> -->
         <!-- </div> -->
<form method="post" name="post" >
<!-- <div class="index-intro"> -->


<?php


if ($_SESSION['userid'] == 1) {
    $sql = "SELECT usersName,usersUid FROM users WHERE NOT usersId= 1 ORDER BY usersName ASC";
    $records = mysqli_query($conn, $sql);
    if (mysqli_num_rows($records) > 0) {
    while($record = mysqli_fetch_assoc($records)) {
        ?>

         <label class="container_hk">
        <br><p9><input type="radio" name="leerling[]" value=
            <?php
                echo $record["usersUid"];
            ?>
        >
        <?php
        echo $record["usersName"]."</p9>";
        }
    }
}
?><br><br>
<button type="submit" name="submit" value="submit">Bekijk vakken</button>
<?php
    if (isset($_POST['leerling'])) {
        if (!empty($_POST["leerling"])) {
            foreach ($_POST["leerling"] as $leerlingnummer) {
                $sql = "SELECT users_subjects FROM users_subjects,users WHERE users.usersId=users_subjects.usersId AND usersUid = $leerlingnummer"; 
                $records = mysqli_query($conn, $sql);
                if (mysqli_num_rows($records) > 0) {

                    $sql2 = "SELECT usersName FROM users WHERE usersUid = '$leerlingnummer'"; 
                    $resultaat = mysqli_query($conn, $sql2);
                    if (mysqli_num_rows($resultaat) > 0) {
                        echo "<br><br><h2>";
                        while($res = mysqli_fetch_assoc($resultaat)) {
                            echo $res["usersName"];
                        }
                    }

                    echo $naam." heeft de volgende vakken:</h2><br><br><p8>";
                    while ($record = mysqli_fetch_assoc($records)) {
                        echo $record["users_subjects"]."</p8><br><br><p8>";
                    }
                } else {
                    $sql2 = "SELECT usersName FROM users WHERE usersUid ='$leerlingnummer'"; 
                    $resultaat = mysqli_query($conn, $sql2);
                    if (mysqli_num_rows($resultaat) > 0) {
                        echo "</p8><br><br>";
                        while($res = mysqli_fetch_assoc($resultaat)) {
                            echo $res["<p8>usersName"];
                        }
                    }

                    echo $res["usersName"]." heeft nog geen vakken </p8>";
                }
            }
        } 
    }
    
?>
</div> 
</form>
<div class="mid">
<?php
// echo $leerlingnummer;
// $sql = "SELECT users_subjects FROM users_subjects,users WHERE users.usersId=users_subjects.usersId AND usersUid = $leerlingnummer"; 
// $records = mysqli_query($conn, $sql);
// if (mysqli_num_rows($records) > 0) {
//     while ($record = mysqli_fetch_assoc($records)) {
//         echo $record["users_subjects"]."<br>";
//     }
// }
$sql2 = "SELECT usersName FROM users WHERE usersUid='151341'"; 
$resultaat = mysqli_query($conn, $sql2);
if (mysqli_num_rows($resultaat) > 0) {
    echo $resultaat["usersName"];
}
?>
</div>
</body>

</html>