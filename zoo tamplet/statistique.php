<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zoo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$totalResult = $conn->query("SELECT COUNT(*) AS total FROM animal");
$totalAnimals = $totalResult->fetch_assoc()['total'];


$foodResult = $conn->query("
  SELECT Type_food, COUNT(*) AS total
  FROM animal
  GROUP BY Type_food
");
$foodLabels = [];
$foodData = [];
while ($row = $foodResult->fetch_assoc()) {
  $foodLabels[] = $row['Type_food'];
  $foodData[] = $row['total'];
}


$habitatResult = $conn->query("
  SELECT h.Name_Hab, COUNT(a.ID) AS total
  FROM habitats h
  LEFT JOIN animal a ON a.Habitat_ID = h.ID_Hab
  GROUP BY h.Name_Hab
");

$habitatLabels = [];
$habitatData = [];

while ($row = $habitatResult->fetch_assoc()) {
  $habitatLabels[] = $row['Name_Hab'];
  $habitatData[] = $row['total'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Zoo Statistics</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-background-light font-display">


  <header class="flex items-center justify-between border-b px-10 py-4 bg-white">
    <h2 class="text-xl font-bold">Zoo Adventures</h2>
    <nav class="flex gap-6">
      <a href="Home.php">Home</a>
      <a href="animales.php">Animals</a>
      <a href="Habitats.php">Habitats</a>
      <a href="game.php">Game</a>
      <a href="statistique.php" class="font-bold text-green-600">Statistics</a>
    </nav>
  </header>


  <main class="p-10 max-w-6xl mx-auto">

    <h1 class="text-4xl font-black mb-10 text-center">
      📊 Zoo Statistics
    </h1>


    <div class="bg-white shadow rounded-xl p-6 text-center mb-10">
      <p class="text-5xl font-bold text-green-600">
        <?php echo $totalAnimals; ?>
      </p>
      <p class="text-lg text-gray-600">Total Animals</p>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">


      <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-4 text-center">
          Animals by Food Type
        </h2>
        <canvas id="foodChart"></canvas>
      </div>


      <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-4 text-center">
          Animals by Habitat
        </h2>
        <canvas id="habitatChart"></canvas>
      </div>

    </div>
  </main>


  <footer class="text-center py-6 text-gray-500">
    © 2024 Zoo Adventures
  </footer>


  <script>
    new Chart(document.getElementById('foodChart'), {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($foodLabels); ?>,
        datasets: [{
          label: 'Animals',
          data: <?php echo json_encode($foodData); ?>,
          backgroundColor: ['#ef4444', '#22c55e', '#3b82f6']
        }]
      }
    });

    new Chart(document.getElementById('habitatChart'), {
      type: 'doughnut',
      data: {
        labels: <?php echo json_encode($habitatLabels); ?>,
        datasets: [{
          data: <?php echo json_encode($habitatData); ?>,
          backgroundColor: ['#fde047', '#34d399', '#60a5fa', '#f87171']
        }]
      }
    });
  </script>

</body>

</html>