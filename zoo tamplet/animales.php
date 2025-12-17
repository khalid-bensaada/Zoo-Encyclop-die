<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zoo";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nom = $_POST['nam'];
  $type = $_POST['food'];
  $habitat = intval($_POST['habitats']);

  if (isset($_FILES['img']) && $_FILES['img']['name'] != "") {
    $image = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], "images/" . $image);
  } else {
    $image = "";
  }

  $stmt = $conn->prepare("INSERT INTO Animal (Name_animal, Type_food, Image_animal, Habitat_ID) 
                            VALUES (?, ?, ?, ?)");
  $stmt->bind_param("sssi", $nom, $type, $image, $habitat);
  $stmt->execute();
}


$sql = "SELECT a.ID, a.Name_animal, a.Type_food, a.Image_animal, h.Name_Hab AS habitat_name
        FROM Animal a
        LEFT JOIN habitats h ON a.Habitat_ID = h.ID_Hab
        ORDER BY a.Name_animal ASC";

$result = mysqli_query($conn, $sql);

?>



<!DOCTYPE html>
<html class="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Animals List - Zoo Animals</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
    rel="stylesheet" />
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#6cee2b",
            "background-light": "#f6f8f6",
            "background-dark": "#162210",
          },
          fontFamily: {
            "display": ["Lexend", "sans-serif"]
          },
          borderRadius: { "DEFAULT": "0.5rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px" },
        },
      },
    }
  </script>
  <style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
  </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display">
  <div class="relative flex min-h-screen w-full flex-col group/design-root overflow-x-hidden">
    <div class="layout-container flex h-full grow flex-col">
      <div class="px-4 sm:px-8 md:px-16 lg:px-24 xl:px-40 flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col w-full max-w-6xl flex-1">

          <!-- TopNavBar -->
          <header
            class="flex items-center justify-between whitespace-nowrap border-b border-solid border-gray-200 dark:border-gray-800 px-5 lg:px-10 py-3">
            <div class="flex items-center gap-4 text-[#131811] dark:text-white">
              <div class="size-8 text-primary">
                <svg fill="currentColor" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_6_543)">
                    <path
                      d="M42.1739 20.1739L27.8261 5.82609C29.1366 7.13663 28.3989 10.1876 26.2002 13.7654C24.8538 15.9564 22.9595 18.3449 20.6522 20.6522C18.3449 22.9595 15.9564 24.8538 13.7654 26.2002C10.1876 28.3989 7.13663 29.1366 5.82609 27.8261L20.1739 42.1739C21.4845 43.4845 24.5355 42.7467 28.1133 40.548C30.3042 39.2016 32.6927 37.3073 35 35C37.3073 32.6927 39.2016 30.3042 40.548 28.1133C42.7467 24.5355 43.4845 21.4845 42.1739 20.1739Z"
                      fill="currentColor"></path>
                    <path clip-rule="evenodd"
                      d="M7.24189 26.4066C7.31369 26.4411 7.64204 26.5637 8.52504 26.3738C9.59462 26.1438 11.0343 25.5311 12.7183 24.4963C14.7583 23.2426 17.0256 21.4503 19.238 19.238C21.4503 17.0256 23.2426 14.7583 24.4963 12.7183C25.5311 11.0343 26.1438 9.59463 26.3738 8.52504C26.5637 7.64204 26.4411 7.31369 26.4066 7.24189C26.345 7.21246 26.143 7.14535 25.6664 7.1918C24.9745 7.25925 23.9954 7.5498 22.7699 8.14278C20.3369 9.32007 17.3369 11.4915 14.4142 14.4142C11.4915 17.3369 9.32007 20.3369 8.14278 22.7699C7.5498 23.9954 7.25925 24.9745 7.1918 25.6664C7.14534 26.143 7.21246 26.345 7.24189 26.4066ZM29.9001 10.7285C29.4519 12.0322 28.7617 13.4172 27.9042 14.8126C26.465 17.1544 24.4686 19.6641 22.0664 22.0664C19.6641 24.4686 17.1544 26.465 14.8126 27.9042C13.4172 28.7617 12.0322 29.4519 10.7285 29.9001L21.5754 40.747C21.6001 40.7606 21.8995 40.931 22.8729 40.7217C23.9424 40.4916 25.3821 39.879 27.0661 38.8441C29.1062 37.5904 31.3734 35.7982 33.5858 33.5858C35.7982 31.3734 37.5904 29.1062 38.8441 27.0661C39.879 25.3821 40.4916 23.9425 40.7216 22.8729C40.931 21.8995 40.7606 21.6001 40.747 21.5754L29.9001 10.7285ZM29.2403 4.41187L43.5881 18.7597C44.9757 20.1473 44.9743 22.1235 44.6322 23.7139C44.2714 25.3919 43.4158 27.2666 42.252 29.1604C40.8128 31.5022 38.8165 34.012 36.4142 36.4142C34.012 38.8165 31.5022 40.8128 29.1604 42.252C27.2666 43.4158 25.3919 44.2714 23.7139 44.6322C22.1235 44.9743 20.1473 44.9757 18.7597 43.5881L4.41187 29.2403C3.29027 28.1187 3.08209 26.5973 3.21067 25.2783C3.34099 23.9415 3.8369 22.4852 4.54214 21.0277C5.96129 18.0948 8.43335 14.7382 11.5858 11.5858C14.7382 8.43335 18.0948 5.9613 21.0277 4.54214C22.4852 3.8369 23.9415 3.34099 25.2783 3.21067C26.5973 3.08209 28.1187 3.29028 29.2403 4.41187Z"
                      fill="currentColor" fill-rule="evenodd"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_6_543">
                      <rect fill="white" height="48" width="48"></rect>
                    </clipPath>
                  </defs>
                </svg>
              </div>
              <h2 class="text-[#131811] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">Zoo
                Adventures</h2>
            </div>
            <div class="flex flex-1 justify-end">
              <div class="flex items-center gap-9">
                <a class="text-[#131811] dark:text-gray-300 text-sm font-medium leading-normal" href="Home.php">Home</a>
                <a class="text-[#131811] dark:text-gray-300 text-sm font-medium leading-normal"
                  href="animales.php">Animals</a>
                <a class="text-[#131811] dark:text-gray-300 text-sm font-medium leading-normal"
                  href="Habitats.php">Habitats</a>
                <a class="text-[#131811] dark:text-gray-300 text-sm font-medium leading-normal" href="game.php">Game</a>
                <a class="text-[#131811] dark:text-gray-300 text-sm font-medium leading-normal"
                  href="statistique.php">Statistics</a>
              </div>
            </div>
          </header>

          <!-- Filters + Add Animal Button Row -->
          <div
            class="flex flex-wrap items-center gap-3 p-4 sm:p-6 border-b border-solid border-gray-200 dark:border-gray-800">
            <button
              class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-gray-100 dark:bg-gray-800 px-4">
              <p class="text-gray-900 dark:text-gray-100 text-sm font-medium leading-normal">Filter by Habitat</p>
              <span class="material-symbols-outlined text-gray-900 dark:text-gray-100">expand_more</span>
            </button>
            <button
              class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-gray-100 dark:bg-gray-800 px-4">
              <p class="text-gray-900 dark:text-gray-100 text-sm font-medium leading-normal">What they eat</p>
              <span class="material-symbols-outlined text-gray-900 dark:text-gray-100">expand_more</span>
            </button>
            <!-- Add Animal Button -->
            <button id="addAnimalBtn"
              class="ml-auto flex h-10 items-center justify-center gap-x-2 rounded-xl bg-primary text-gray-900 px-4 font-bold">
              <span class="material-symbols-outlined">add</span> Add Animal
            </button>
          </div>

          <!-- Animal Grid -->
          <div id="animalGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4 sm:p-6">



            <?php while ($row = mysqli_fetch_assoc($result)): ?>
              <div class="flex flex-col gap-3 pb-3 bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
                <div class="w-full bg-center bg-no-repeat aspect-square bg-cover">
                  <img src="images/<?php echo $row['Image_animal']; ?>">
                </div>
                <div class="px-4">
                  <p class="text-gray-900 dark:text-gray-100 text-lg font-bold">
                    <?php echo $row['Name_animal']; ?>
                  </p>
                  <p class="text-gray-500 dark:text-gray-400 text-sm">
                    <?php echo $row['Type_food']; ?> | <?php echo $row['habitat_name']; ?>
                  </p>
                </div>
                <div class="flex gap-4">
                  <a href="edit.php?id=<?php echo $row['ID']; ?>"
                    class="relative left-2 text-sm text-blue-600 hover:underline">
                    Edit
                  </a>
                  <a href="delete.php?id=<?= $row['ID'] ?>"
                    onclick="return confirm('Are you sure you want to delete this animal?');"
                    class="text-sm text-red-600 hover:underline">
                    Delete
                  </a>
                </div>

              </div>
            <?php endwhile; ?>




            <!-- Add Animal Form Modal -->
            <div id="addAnimalForm"
              class="hidden relative flex min-h-screen w-full flex-col items-center justify-center bg-background-light dark:bg-background-dark p-4 sm:p-6 lg:p-8"
              style='font-family: Lexend, "Noto Sans", sans-serif;'>
              <form method="POST" action="" enctype="multipart/form-data">
                <div
                  class="absolute inset-0 z-0 bg-[url('https://images.unsplash.com/photo-1516912481808-3406841bd33c?q=80&amp;w=2148&amp;auto=format&amp;fit=crop')] bg-cover bg-center opacity-30 dark:opacity-20">
                </div>
                <div class="absolute inset-0 bg-background-light/50 dark:bg-background-dark/70 backdrop-blur-sm z-0">
                </div>
                <!-- Modal -->
                <div
                  class="relative z-10 w-full max-w-2xl bg-white/80 dark:bg-gray-900/80 backdrop-blur-lg rounded-xl shadow-2xl border border-gray-200 dark:border-gray-700 font-display">
                  <div class="p-6 sm:p-8">
                    <!-- Modal Header -->
                    <div class="flex items-start justify-between pb-4 border-b border-gray-200 dark:border-gray-700">
                      <h2 class="text-[#131811] dark:text-gray-100 tracking-light text-2xl font-bold leading-tight">Add
                        New
                        Animal
                      </h2>
                      <button id="closeForm"
                        class="text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white transition-colors">
                        <span class="material-symbols-outlined">close</span>
                      </button>
                    </div>
                    <!-- Modal Body/Form -->
                    <div class="mt-6 space-y-6">
                      <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                        <!-- Left Column -->
                        <div class="flex flex-col gap-6">
                          <!-- Animal's Name -->
                          <label class="flex flex-col w-full">
                            <p class="text-[#131811] dark:text-gray-200 text-base font-medium leading-normal pb-2">
                              Animal's
                              Name
                            </p>
                            <input name="nam" id="animalName"
                              class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#131811] dark:text-gray-200 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#dfe6db] dark:border-gray-600 bg-white dark:bg-gray-800 focus:border-primary h-12 placeholder:text-[#6f8961] dark:placeholder:text-gray-400 p-3 text-base font-normal leading-normal"
                              placeholder="e.g., Leo the Lion" value="" />
                          </label>
                          <!-- Favorite Food -->
                          <label class="flex flex-col w-full">
                            <p class="text-[#131811] dark:text-gray-200 text-base font-medium leading-normal pb-2">
                              Favorite
                              Food
                            </p>
                            <select name="food" id="animalFood"
                              class="form-select flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#131811] dark:text-gray-200 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#dfe6db] dark:border-gray-600 bg-white dark:bg-gray-800 focus:border-primary h-12 p-3 text-base font-normal leading-normal">
                              <option value="">Select a food type</option>
                              <option value="meat">Meat</option>
                              <option value="fruit">Fruit</option>
                              <option value="plants">Plants</option>
                              <option value="fish">Fish</option>
                            </select>
                          </label>
                          <!-- Habitat -->
                          <label class="flex flex-col w-full">
                            <p class="text-[#131811] dark:text-gray-200 text-base font-medium leading-normal pb-2">
                              Habitat
                            </p>
                            <select name="habitats" id="animalHabitat"
                              class="form-select flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#131811] dark:text-gray-200 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#dfe6db] dark:border-gray-600 bg-white dark:bg-gray-800 focus:border-primary h-12 p-3 text-base font-normal leading-normal">
                              <option value="1">Jungle</option>
                              <option value="2">Savannah</option>
                              <option value="3">Arctic</option>
                              <option value="4">Ocean</option>

                            </select>
                          </label>
                          <!-- Image URL -->
                          <label class="flex flex-col w-full">
                            <p class="text-[#131811] dark:text-gray-200 text-base font-medium leading-normal pb-2">Image
                              URL
                            </p>
                            <input type="file" name="img" id="animalImage"
                              class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#131811] dark:text-gray-200 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#dfe6db] dark:border-gray-600 bg-white dark:bg-gray-800 focus:border-primary h-12 placeholder:text-[#6f8961] dark:placeholder:text-gray-400 p-3 text-base font-normal leading-normal"
                              placeholder="Enter image URL here" />
                          </label>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Footer -->
                    <div
                      class="flex justify-end items-center gap-4 pt-6 mt-6 border-t border-gray-200 dark:border-gray-700">
                      <button id="cancelAnimal"
                        class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-11 px-6 bg-transparent text-gray-700 dark:text-gray-300 text-base font-bold leading-normal tracking-wide hover:bg-gray-100 dark:hover:bg-gray-700/50 transition-colors">
                        <span class="truncate">Cancel</span>
                      </button>
                      <button
                        class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-11 px-6 bg-primary text-background-dark text-base font-bold leading-normal tracking-wide shadow-sm hover:brightness-110 transition-all">
                        <span class="truncate">Save Animal</span>
                      </button>
                    </div>
                  </div>
                </div>
            </div>
            </form>
            <!-- Background content -->


            <script>
              const addAnimalBtn = document.getElementById('addAnimalBtn');
              const addAnimalForm = document.getElementById('addAnimalForm');
              const cancelAnimal = document.getElementById('cancelAnimal');
              const closeForm = document.getElementById('closeForm');
              const animalGrid = document.getElementById('animalGrid');

              // Show form above animal grid
              addAnimalBtn.addEventListener('click', () => {
                addAnimalForm.classList.remove('hidden');
                addAnimalForm.scrollIntoView({ behavior: "smooth" });
              });

              // Hide form
              cancelAnimal.addEventListener('click', () => addAnimalForm.classList.add('hidden'));
              closeForm.addEventListener('click', () => addAnimalForm.classList.add('hidden'));

            </script>

</body>

</html>