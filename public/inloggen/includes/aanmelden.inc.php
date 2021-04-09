<?php

if (isset($_POST["submit"])) {
	
	$name = $_POST["naam"];
	$email = $_POST["email"];
	$username = $_POST["uid"];
	$pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    // $vakken = $_POST["subjects"]; //
	
	require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
	
	if (emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) !== false) {
		header("location: ../aanmelden.php?error=emptyinput");
		exit();
	}
	if (invalidUid($username) !== false) {
		header("location: ../aanmelden.php?error=invalidUid");
		exit();
	}
	if (invalidEmail($email) !== false) {
		header("location: ../aanmelden.php?error=invalidEmail");
		exit();
	}
	if (pwdMatch($pwd, $pwdrepeat) !== false) {
		header("location: ../aanmelden.php?error=pwdnotmatch");
		exit();
	}
	if (uidExists($conn, $username, $email) !== false) {
		header("location: ../aanmelden.php?error=usernametaken");
		exit();
	}
	
	createUsers($conn, $name, $email, $username, $pwd);
}

else {
	header("location: ../aanmelden.php");
	exit();
}