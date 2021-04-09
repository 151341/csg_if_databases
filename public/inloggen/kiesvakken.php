<?php
    session_start();
    include 'includes/dbh.inc.php';
    include_once 'includes/dbh.inc.php';
    require('includes/dbh.inc.php');
    // echo "<h3>inhoud SESSION-array:</h3><PRE>";
    // print_r($_SESSION);
    // echo "</PRE>";

$db =  new mysqli("localhost","username","password","project");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Kies vakken</title>
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
    $sql = "SELECT users_subjects FROM users_subjects WHERE usersId = '{$_SESSION['userid']}'";
    $records = mysqli_query($conn, $sql);
    if (mysqli_num_rows($records) == 0) {
        echo "<h1>Kies je vakken</h1>";
    } else {
        echo "<h1>Je vakken</h1>";
    }
    ?>
</div>
<?php
$sql = "SELECT users_subjects FROM users_subjects WHERE usersId = '{$_SESSION['userid']}'";
$records = mysqli_query($conn, $sql);
if (mysqli_num_rows($records) == 0) {
    include 'vakkenlijst.php';
} else {
    echo "Je hebt de volgende vakken:<br>";
}

if(isset($_POST["vak"])) {
    if (!empty($_POST["vak"])) {
    // echo "<br>je hebt de volgende vakken:<br>";
    echo ' Engels<br> Nederlands<br>';
    foreach($_POST["vak"] as $vak) {
        echo $vak.'<br>';
        $sql = "INSERT INTO `users_subjects` (`usersId`,`users_subjects`) VALUES ('{$_SESSION['userid']}', '$vak')";
        $records = mysqli_query($conn, $sql);
        // echo "<br>";
        // echo "<h3>$sql</h3>";
    }
    $sql = "INSERT INTO `users_subjects` (`usersId`,`users_subjects`) VALUES ('{$_SESSION['userid']}', 'Engels')";
    $records = mysqli_query($conn, $sql);
    $sql = "INSERT INTO `users_subjects` (`usersId`,`users_subjects`) VALUES ('{$_SESSION['userid']}', 'Nederlands')";
    $records = mysqli_query($conn, $sql);
    $sql = "";
    $records = mysqli_query($conn, $sql);
// NL en engels in tabel inserten
    

  } else {
    echo '<br>kies je vakken';
  }
}


    // print_r($_POST['vak']);

    $records = mysqli_query($conn, $sql);
    echo '<br><br>';
    // if (mysqli_num_rows($records) == 0) {
    //     echo "nog geen resultaten";
    // }
    if (mysqli_num_rows($records) > 0) {
        while ($record = mysqli_fetch_assoc($records)) {
            echo $record["users_sujects"]." hoort bij " . $record["userid"]."<br>";
        }
    }
    echo "<br>";

mysqli_close($conn);
if(isset($_POST["vak"])) {
    header("location: ../inloggen/profile.php");
}
?>
</div>

</form>
</section>
</div>
</body>
 <?php
    include 'footer.php';
    ?>
</html>