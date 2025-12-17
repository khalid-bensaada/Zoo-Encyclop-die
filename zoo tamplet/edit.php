<?php
$conn = new mysqli("localhost", "root", "", "zoo");
if ($conn->connect_error) {
    die("Connection failed");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nom = $_POST['nam'];
    $food = $_POST['food'];
    $habitat = $_POST['habitats'];

    if (!empty($_FILES['img']['name'])) {
        $image = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], "images/" . $image);

        $sql = "UPDATE Animal 
                SET Name_animal=?, Type_food=?, Image_animal=?, Habitat_ID=?
                WHERE ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssii", $nom, $food, $image, $habitat, $id);
    } else {
        $sql = "UPDATE Animal 
                SET Name_animal=?, Type_food=?, Habitat_ID=?
                WHERE ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $nom, $food, $habitat, $id);
    }

    $stmt->execute();
    header("Location: animales.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: animales.php");
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM Animal WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$animal = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $animal['ID'] ?>">

        <input type="text" name="nam" value="<?= $animal['Name_animal'] ?>" required>

        <select name="food">
            <option value="meat" <?= $animal['Type_food'] == "meat" ? "selected" : "" ?>>Meat</option>
            <option value="fruit" <?= $animal['Type_food'] == "fruit" ? "selected" : "" ?>>Fruit</option>
            <option value="plants" <?= $animal['Type_food'] == "plants" ? "selected" : "" ?>>Plants</option>
        </select>

        <select name="habitats">
            <option value="1" <?= $animal['Habitat_ID'] == 1 ? "selected" : "" ?>>Jungle</option>
            <option value="2" <?= $animal['Habitat_ID'] == 2 ? "selected" : "" ?>>Savannah</option>
            <option value="3" <?= $animal['Habitat_ID'] == 3 ? "selected" : "" ?>>Arctic</option>
        </select>

        <input type="file" name="img">

        <button type="submit">Update</button>
    </form>

</body>

</html>