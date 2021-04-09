<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Contact</title>
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
        <section class="signup-form">
        <h2>Contact</h2>



<?php
if (isset($_POST['submit'])){
    if (mail('stef.delnoye@gmail.com', $_POST['subject'], $_POST['message'])) {
        $headers = 'From: Website <stef.delnoye@gmail.com>' ."\n";        
    }
}
?>

<table>

<div class="contact_uiterlijk">

<form class="contact-form" action="contact.php" method="POST">
    <input type="text" name="name" placeholder="Volledige naam">
    <input type="text" name="mail" placeholder="E-mailadres">
    <input type="text" name="subject" placeholder="Onderwerp">
    <textarea name="message" placeholder="Bericht"></textarea>
    <br><br><button type="submit" name="submit">Verzend e-mail</button>
</form>
        </div>
        </section>

    </div>
     <?php
    include 'footer.php';
    ?>
</html>