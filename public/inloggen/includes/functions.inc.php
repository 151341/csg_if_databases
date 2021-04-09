<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) {
	return (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)) ? true : false;
}

function invalidUid($username) {
    return (!preg_match("/^[a-zA-Z0-9]*$/", $username)) ? true : false;

}

function invalidEmail($email) {
    return (!filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;
}

function pwdMatch($pwd, $pwdrepeat) {
	return ($pwd !== $pwdrepeat) ? true : false;
}

function uidExists($conn, $username, $email) {
	$sql = "SELECT * FROM users WHERE usersUid = ? OR  usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    
	if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../aanmelden.php?error=stmtfailed");
        exit();
	}
	
	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);
	
	$resultData = mysqli_stmt_get_result($stmt);
	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
		//$result = true;  // ??
	} else {
		$result = false;
		return $result;
	}
	
	mysqli_stmt_close($stmt);
}

function createUsers($conn, $name, $email, $username, $pwd) {
	$sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    
	if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../aanmelden.php?error=stmtfailed");
        exit();
    }
	
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	
	mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
	mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
	header("location: ../aanmelden.php?error=none");
	exit();

}
// vanaf hier op- 4-3 veranderd
function emptyInputLogin($username, $pwd) {
	return (empty($username) || empty($pwd)) ? true : false;
}

function loginUser($conn, $username, $pwd) {
	$uidExists = uidExists($conn, $username, $username);

	if ($uidExists === false) {
		header("location: ../inloggen.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $uidExists["usersPwd"];
	$checkpwd = password_verify($pwd, $pwdHashed);

	if ($checkpwd === false) {
		header("location: ../inloggen.php?error=wronglogin");
		exit();
	} else if ($checkpwd === true) {
		session_start();
		$_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["username"] = $uidExists["usersName"];
        $_SESSION["useremail"] = $uidExists["usersEmail"];        
		// header("location: ../index.php");
		header("location: ../profile.php");
		exit();
	}
}