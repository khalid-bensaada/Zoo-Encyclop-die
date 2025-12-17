<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "zoo";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

?>
