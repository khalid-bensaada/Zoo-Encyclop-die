<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zoo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['id'])) {
    header("Location: Habitats.php");
    exit();
}

$id = $_GET['id'];


$stmt = $conn->prepare("SELECT COUNT(*) FROM animal WHERE Habitat_ID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count > 0) {
    echo "Sorry, you can't delete this habitat because it has animals.";
    exit;
}


$stmt = $conn->prepare("DELETE FROM habitats WHERE ID_Hab = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: Habitats.php");
exit();
?>
