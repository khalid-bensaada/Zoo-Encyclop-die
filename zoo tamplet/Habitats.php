<?php

$conn = new mysqli("localhost", "root", "", "zoo");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['addHabitat'])) {
    $name = $_POST['namee'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO habitats (Name_Hab, Description_Hab) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $description);
    $stmt->execute();
    $stmt->close();

    header("Location: Habitats.php");
    exit;


}

$result = $conn->query("SELECT * FROM habitats ORDER BY Name_Hab ASC");
$habitats = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $habitats[] = $row;
    }
}


?>
<!DOCTYPE html>

<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Habitats List - Zoo Animals</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&amp;display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script
        id="tailwind-config"> tailwind.config = { darkMode: "class", theme: { extend: { colors: { "primary": "#6cee2b", "background-light": "#f6f8f6", "background-dark": "#162210", }, fontFamily: { "display": ["Lexend", "sans-serif"] }, borderRadius: { "DEFAULT": "0.5rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px" }, }, }, } </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-gray-900 dark:text-gray-100">
    <div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <main class="px-4 sm:px-8 md:px-16 lg:px-24 xl:px-40 flex flex-1 justify-center py-10">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1 w-full">
                    <header
                        class="flex items-center justify-between whitespace-nowrap border-b border-solid border-gray-200 dark:border-gray-800 px-5 lg:px-10 py-3">
                        <div class="flex items-center gap-4 text-[#131811] dark:text-white">
                            <div class="size-8 text-primary"> <svg fill="currentColor" viewbox="0 0 48 48"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_6_543)">
                                        <path
                                            d="M42.1739 20.1739L27.8261 5.82609C29.1366 7.13663 28.3989 10.1876 26.2002 13.7654C24.8538 15.9564 22.9595 18.3449 20.6522 20.6522C18.3449 22.9595 15.9564 24.8538 13.7654 26.2002C10.1876 28.3989 7.13663 29.1366 5.82609 27.8261L20.1739 42.1739C21.4845 43.4845 24.5355 42.7467 28.1133 40.548C30.3042 39.2016 32.6927 37.3073 35 35C37.3073 32.6927 39.2016 30.3042 40.548 28.1133C42.7467 24.5355 43.4845 21.4845 42.1739 20.1739Z"
                                            fill="currentColor"></path>
                                        <path clip-rule="evenodd"
                                            d="M7.24189 26.4066C7.31369 26.4411 7.64204 26.5637 8.52504 26.3738C9.59462 26.1438 11.0343 25.5311 12.7183 24.4963C14.7583 23.2426 17.0256 21.4503 19.238 19.238C21.4503 17.0256 23.2426 14.7583 24.4963 12.7183C25.5311 11.0343 26.1438 9.59463 26.3738 8.52504C26.5637 7.64204 26.4411 7.31369 26.4066 7.24189C26.345 7.21246 26.143 7.14535 25.6664 7.1918C24.9745 7.25925 23.9954 7.5498 22.7699 8.14278C20.3369 9.32007 17.3369 11.4915 14.4142 14.4142C11.4915 17.3369 9.32007 20.3369 8.14278 22.7699C7.5498 23.9954 7.25925 24.9745 7.1918 25.6664C7.14534 26.143 7.21246 26.345 7.24189 26.4066ZM29.9001 10.7285C29.4519 12.0322 28.7617 13.4172 27.9042 14.8126C26.465 17.1544 24.4686 19.6641 22.0664 22.0664C19.6641 24.4686 17.1544 26.465 14.8126 27.9042C13.4172 28.7617 12.0322 29.4519 10.7285 29.9001L21.5754 40.747C21.6001 40.7606 21.8995 40.931 22.8729 40.7217C23.9424 40.4916 25.3821 39.879 27.0661 38.8441C29.1062 37.5904 31.3734 35.7982 33.5858 33.5858C35.7982 31.3734 37.5904 29.1062 38.8441 27.0661C39.879 25.3821 40.4916 23.9425 40.7216 22.8729C40.931 21.8995 40.7606 21.6001 40.747 21.5754L29.9001 10.7285ZM29.2403 4.41187L43.5881 18.7597C44.9757 20.1473 44.9743 22.1235 44.6322 23.7139C44.2714 25.3919 43.4158 27.2666 42.252 29.1604C40.8128 31.5022 38.8165 34.012 36.4142 36.4142C34.012 38.8165 31.5022 40.8128 29.1604 42.252C27.2666 43.4158 25.3919 44.2714 23.7139 44.6322C22.1235 44.9743 20.1473 44.9757 18.7597 43.5881L4.41187 29.2403C3.29027 28.1187 3.08209 26.5973 3.21067 25.2783C3.34099 23.9415 3.8369 22.4852 4.54214 21.0277C5.96129 18.0948 8.43335 14.7382 11.5858 11.5858C14.7382 8.43335 18.0948 5.9613 21.0277 4.54214C22.4852 3.8369 23.9415 3.34099 25.2783 3.21067C26.5973 3.08209 28.1187 3.29028 29.2403 4.41187Z"
                                            fill="currentColor" fill-rule="evenodd"></path>
                                    </g>
                                    <defs>
                                        <clippath id="clip0_6_543">
                                            <rect fill="white" height="48" width="48"></rect>
                                        </clippath>
                                    </defs>
                                </svg> </div>
                            <h2
                                class="text-[#131811] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">
                                Zoo Adventures</h2>
                        </div>
                        <div class="flex flex-1 justify-end">
                            <div class="flex items-center gap-9"> <a
                                    class="text-[#131811] dark:text-gray-300 text-sm font-medium leading-normal"
                                    href="Home.php">Home</a> <a
                                    class="text-[#131811] dark:text-gray-300 text-sm font-medium leading-normal"
                                    href="animales.php">Animals</a> <a
                                    class="text-[#131811] dark:text-gray-300 text-sm font-medium leading-normal"
                                    href="Habitats.php">Habitats</a> <a
                                    class="text-[#131811] dark:text-gray-300 text-sm font-medium leading-normal"
                                    href="game.php">Game</a> <a
                                    class="text-[#131811] dark:text-gray-300 text-sm font-medium leading-normal"
                                    href="statistique.php">Statistics</a> </div>
                        </div>
                    </header> <!-- Page Heading -->
                    <div class="flex flex-wrap items-center justify-between gap-4 p-4 mb-6">
                        <div class="flex items-center gap-4"> <span
                                class="material-symbols-outlined text-5xl text-primary">pets</span>
                            <h1
                                class="text-4xl font-black leading-tight tracking-[-0.033em] text-[#131811] dark:text-white">
                                Our Animal Habitats</h1>
                        </div> <button id="habitat"
                            class="flex items-center justify-center gap-2 min-w-[84px] cursor-pointer overflow-hidden rounded-lg h-12 px-6 bg-primary text-black text-base font-bold leading-normal tracking-[0.015em] transition-transform duration-200 ease-in-out hover:scale-105">
                            <span class="material-symbols-outlined">add</span> <span class="truncate">Add Habitat</span>
                        </button>
                    </div> <!-- Image Grid -->
                    <div class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-6 p-4">
                        <div
                            class="group flex flex-col gap-4 pb-3 rounded-xl bg-white dark:bg-zinc-800/20 p-4 transition-all duration-300 ease-in-out hover:shadow-lg hover:-translate-y-1">
                            <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                data-alt="A sun-drenched savannah with acacia trees and tall grass."
                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAu7YMORoZ1aRvz_Mtfc6p5IolhPbbHC0SEsysdodS2KwX0rJdhfPrz-eTLaWpRAWHxUwtAy72hzDh5AmzMMEpb2wBepr5FOK5scdGsIB4PfYQD0v2GoGQtKfcfv_MZtnexqPtTXrfDPsPOa1A6qUJGANpuSY5j9_dMRUukedDjI71At7y-d05Ro2wDNnG7dV3yd6tx9Mok89pLzSBaU6JVhKZg4BNzAJXZA2TFGtwe0AMU5B1NhHwG3AvAP6aKbngbyEG7npYPdv1p');">
                            </div>
                            <div class="flex flex-col">
                                <p class="text-[#131811] dark:text-white text-lg font-bold">The Savannah</p>
                                <div
                                    class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
                                    <button
                                        class="flex items-center gap-1 text-primary/80 dark:text-primary/90 text-sm font-medium hover:text-primary">
                                        <span class="material-symbols-outlined text-base">edit</span>Edit </button>
                                    <span class="text-gray-300 dark:text-gray-600">/</span> <button
                                        class="flex items-center gap-1 text-red-500/80 dark:text-red-400/90 text-sm font-medium hover:text-red-500">
                                        <span class="material-symbols-outlined text-base">delete</span>Delete </button>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($habitats as $hab): ?>
                            <div
                                class="group flex flex-col gap-4 pb-3 rounded-xl bg-white dark:bg-zinc-800/20 p-4 transition-all duration-300 ease-in-out hover:shadow-lg hover:-translate-y-1">

                                <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                    data-alt="<?= htmlspecialchars($hab['Description_Hab']) ?>"
                                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAu7YMORoZ1aRvz_Mtfc6p5IolhPbbHC0SEsysdodS2KwX0rJdhfPrz-eTLaWpRAWHxUwtAy72hzDh5AmzMMEpb2wBepr5FOK5scdGsIB4PfYQD0v2GoGQtKfcfv_MZtnexqPtTXrfDPsPOa1A6qUJGANpuSY5j9_dMRUukedDjI71At7y-d05Ro2wDNnG7dV3yd6tx9Mok89pLzSBaU6JVhKZg4BNzAJXZA2TFGtwe0AMU5B1NhHwG3AvAP6aKbngbyEG7npYPdv1p');">
                                </div>

                                <div class="flex flex-col">
                                    <p class="text-[#131811] dark:text-white text-lg font-bold">
                                        <?= htmlspecialchars($hab['Name_Hab']) ?>
                                    </p>

                                    <div
                                        class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">

                                        <a href="editHabitat.php?id=<?= $hab['ID_Hab'] ?>"
                                            class="flex items-center gap-1 text-primary/80 dark:text-primary/90 text-sm font-medium hover:text-primary">
                                            <span class="material-symbols-outlined text-base">edit</span>Edit
                                        </a>

                                        <span class="text-gray-300 dark:text-gray-600">/</span>

                                        <a href="deleteHabitat.php?id=<?= $hab['ID_Hab'] ?>"
                                            onclick="return confirm('Delete habitat?')"
                                            class="flex items-center gap-1 text-red-500/80 dark:text-red-400/90 text-sm font-medium hover:text-red-500">
                                            <span class="material-symbols-outlined text-base">delete</span>Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>



                    </div>
                </div>
                <form method="POST" name="habitat_form" id="habitatForm"
                    class="hidden md:col-span-2 bg-white/70 backdrop-blur-lg border border-slate-200 rounded-3xl shadow-xl p-8 space-y-6"
                    novalidate> <!-- Habitat Name -->
                    <div class="relative"> <input id="name" name="namee" type="text" required
                            class="peer w-full px-4 py-3 border border-slate-300 rounded-xl bg-white/50 focus:bg-white focus:border-indigo-400 focus:ring-4 focus:ring-indigo-200/40 transition-all outline-none"
                            placeholder=" " /> <label for="name"
                            class="absolute left-3 top-3 text-slate-500 text-sm transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-slate-400 peer-focus:top-0 peer-focus:text-xs peer-focus:text-indigo-600 bg-white/70 px-1">
                            Habitat Name </label>
                        <p id="nameError" class="text-xs text-red-600 mt-1 hidden">Please enter a habitat name.</p>
                    </div> <!-- Description -->
                    <div class="relative"> <textarea id="description" name="description" rows="4"
                            class="peer w-full px-4 py-3 border border-slate-300 rounded-xl bg-white/50 focus:bg-white focus:border-indigo-400 focus:ring-4 focus:ring-indigo-200/40 transition-all outline-none resize-none"
                            placeholder=" "></textarea> <label for="description"
                            class="absolute left-3 top-3 text-slate-500 text-sm transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-slate-400 peer-focus:top-0 peer-focus:text-xs peer-focus:text-indigo-600 bg-white/70 px-1">
                            Habitat Description </label> </div> <!-- Buttons -->
                    <div class="flex items-center gap-4 pt-4"> <button type="submit" name="addHabitat"
                            class="px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-xl shadow-md hover:shadow-lg transition-all">
                            Add Habitat </button> <button type="button" id="clearBtn"
                            class="px-5 py-3 border border-slate-300 rounded-xl text-slate-700 hover:bg-slate-100 hover:shadow transition-all">
                            Clear Form </button> </div>
                </form>
            </main>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const showFormBtn = document.getElementById('habitat');
            const habitatForm = document.getElementById('habitatForm');
            const clearBtn = document.getElementById('clearBtn');


            showFormBtn.addEventListener('click', () => {
                habitatForm.classList.toggle('hidden');
            });


            clearBtn.addEventListener('click', () => {
                habitatForm.classList.add('hidden');
            });
        });
    </script>



</body>

</html>