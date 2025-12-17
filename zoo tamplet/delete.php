<?php
$conn = new mysqli("localhost", "root", "", "zoo");
if ($conn->connect_error) {
    die("Connection failed");
}

if (!isset($_GET['id'])) {
    header("Location: animales.php");
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM Animal WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: animales.php");
exit;
