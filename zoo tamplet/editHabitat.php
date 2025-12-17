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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['namee'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE habitats SET Name_Hab = ?, Description_Hab = ? WHERE ID_Hab = ?");
    $stmt->bind_param("ssi", $name, $description, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: Habitats.php");
    exit();
}


$stmt = $conn->prepare("SELECT * FROM habitats WHERE ID_Hab = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$habitat = $result->fetch_assoc();
$stmt->close();


if (!$habitat) {
    header("Location: Habitats.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Habitat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="max-w-xl mx-auto mt-20 bg-white p-8 rounded-xl shadow">

        <h1 class="text-2xl font-bold mb-6">Edit Habitat</h1>

        <form method="POST" class="space-y-4">

            
            <input type="text" name="namee" required class="w-full p-3 border rounded-lg"
                value="<?= htmlspecialchars($habitat['Name_Hab']) ?>">

            
            <textarea name="description" rows="4"
                class="w-full p-3 border rounded-lg"><?= htmlspecialchars($habitat['Description_Hab']) ?></textarea>

            
            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg">
                    Update
                </button>

                <a href="Habitats.php" class="px-6 py-3 border rounded-lg text-center">
                    Cancel
                </a>
            </div>
        </form>

    </div>

</body>

</html>