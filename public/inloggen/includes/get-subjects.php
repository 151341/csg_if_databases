<?php

include __DIR__ . "/dbh.inc.php";

$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, "SELECT id, name FROM subjects");
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$subjects = [];

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    //resultaat rij

    //maak nieuw object (respresenteert vak)
    $subject = [];

    // //loop over de key value pairs van de rij
    // foreach ( $row as $key => $value ) {
    //     $subject[$key] = $value;
    // }

    $subjects[] = $subject;
}		

mysqli_stmt_close($stmt);