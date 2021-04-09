<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gekozen herkansingen</title>
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
<h2>Gekozen herkansingen van de leerlingen:</h2>
        <?php 
        if ($_SESSION['userid'] == 1) {
            $sql = "SELECT * FROM users,users_resit WHERE users.usersId=users_resit.usersId";
            $records = mysqli_query($conn, $sql);
            if (mysqli_num_rows($records) > 0) {
                while ($record = mysqli_fetch_assoc($records))
                echo "<br><p8>".$record["usersName"]." herkanst: <p10>".$record["user_resit"]."</p8></p12><br>";
                
            }
            else {
                echo "Er zijn nog geen herkansingen gekozen";
            }
        }
        ?>
        <!-- </div> -->
        <!-- </section> -->

    </div>
</body>
 <?php
    include 'footer.php';
    ?>
</html>