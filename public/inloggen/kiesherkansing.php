<?php
    session_start();
    include 'includes/dbh.inc.php';
    include_once 'includes/dbh.inc.php';
    require('includes/dbh.inc.php');
$sql = "SELECT COUNT(*) FROM `users_subjects` WHERE usersId = '{$_SESSION['userid']}'";
?>


<!DOCTYPE html>
<html>
<head>
    <title>Kies herkansing</title>
    <link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>
<header>
<img class="logo" width="25%" height="10%" src="afbeelding/logo_small.png" alt="logo">


<?php
include 'menu.php';
?>
</header>


<div class="index-intro">
<?php
$sql = "SELECT * FROM users_subjects WHERE usersId = '{$_SESSION['userid']}'";
$records = mysqli_query($conn, $sql);
if (mysqli_num_rows($records) == 0) {
    echo "Je hebt nog geen vakken gekozen<br>";
    $var = false;
    }
else {
    echo "<h1>Kies hier je herkansing<br></h1>";
    $var = true;
}


if (mysqli_num_rows($records) > 0) {
    $records = mysqli_query($conn, $sql);
    while($record = mysqli_fetch_assoc($records)) {
        ?>
      
        <form action="" method="POST">    <label class="container_hk">
     <br><p9><input  type="radio" name="herkansing" id="vak" value="
        <?php
   
        echo $record["users_subjects"];
        ?>">

        <?php
        echo $record["users_subjects"];
        echo "</p9>";
    }
}

echo "<br><br>";
?>
<button class="button_vhk" type="submit" name="submit" id="submit" value="Submit Values">bevestig</button>
</form>
<?php
if (isset($_POST['herkansing'])) {
    echo "<br>Je herkanst ".$_POST['herkansing'];

    $sql = "INSERT INTO `users_resit` (`usersId`,`user_resit`) VALUES ('{$_SESSION['userid']}', '{$_POST['herkansing']}')";
    $records = mysqli_query($conn, $sql);
}

if ($var == false) {
    echo "<br>kies eerst vakken<br>";
}


if(isset($_POST["herkansing"])) {
    header("location: ../inloggen/profile.php");
}
?>
</div>
 <?php
    include 'footer.php';
    ?>
</body>
</html>