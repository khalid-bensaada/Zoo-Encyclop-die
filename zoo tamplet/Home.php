<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zoo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Home Page - Zoo Animals</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;900&amp;display=swap" rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
  <div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
    <div class="layout-container flex h-full grow flex-col">
      <div class="px-4 md:px-10 lg:px-20 xl:px-40 flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col max-w-[960px] flex-1 gap-8">
          <!-- TopNavBar -->
          <header
            class="flex items-center justify-between whitespace-nowrap border-b border-solid border-gray-200 dark:border-gray-800 px-5 lg:px-10 py-3">
            <div class="flex items-center gap-4 text-[#131811] dark:text-white">
              <div class="size-8 text-primary">
                <svg fill="currentColor" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
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
                </svg>
              </div>
              <h2 class="text-[#131811] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">Zoo
                Adventures</h2>
            </div>
            <div class="flex flex-1 justify-end">
              <div class="flex items-center gap-9">
                <a class="text-[#131811] dark:text-gray-300 text-sm font-medium leading-normal"
                  href="Home.php">Home</a>
                <a class="text-[#131811] dark:text-gray-300 text-sm font-medium leading-normal"
                  href="animales.php">Animals</a>
                <a class="text-[#131811] dark:text-gray-300 text-sm font-medium leading-normal"
                  href="Habitats.php">Habitats</a>
                <a class="text-[#131811] dark:text-gray-300 text-sm font-medium leading-normal"
                  href="game.php">Game</a>
                <a class="text-[#131811] dark:text-gray-300 text-sm font-medium leading-normal"
                  href="statistique.php">Statistics</a>
              </div>
            </div>
          </header>
          <!-- HeroSection -->
          <div class="@container">
            <div class="@[480px]:p-4">
              <div
                class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4"
                data-alt="A vibrant, cartoon-style illustration of a friendly zoo scene"
                style='background-image: linear-gradient(rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.4) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuCMV3ATvJ5MXtAZ9FawBM44hdaM9pNE5Ln6alZ2BIEUeKKP_tyFLoDy7dtxMrqtCwGzJ_IjpL_PMZbXmV-vQZdheFXojMeqJcF6Nj098MvpjJ_akYnl_l3B4VfsGFZ9Z2YzCcy0eTNCmUW0qVo_bhkUqPratSKvrKEKaKy3zZ_11clDG0yUmceGVboYDAU4DcERxkjuUSWq-jdDrUq4lW573dyjnL32L0Zi_kJFHYWQOa0mhH9g5dq0Aas0YRtyrd3YYj1IsOGkPGsV");'>
                <div class="flex flex-col gap-2 text-center">
                  <h1
                    class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">
                    Welcome to the Zoo!</h1>
                  <h2
                    class="text-white text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">
                    Let's learn about all the amazing animals together.</h2>
                </div>
                <button
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-primary text-[#131811] text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]">
                  <span class="truncate">Start Exploring</span>
                </button>
              </div>
            </div>
          </div>
          <!-- TextGrid -->
          <div class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-4 p-4">
            <div
              class="flex flex-1 gap-3 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-background-dark p-6 flex-col text-center items-center">
              <div class="text-primary text-4xl mb-2">
                <span class="material-symbols-outlined !text-4xl">pets</span>
              </div>
              <div class="flex flex-col gap-1">
                <h2 class="text-[#131811] dark:text-white text-base font-bold leading-tight">Meet the Animals</h2>
                <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">Learn fun facts about all
                  your favorite animals.</p>
              </div>
            </div>
            <div
              class="flex flex-1 gap-3 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-background-dark p-6 flex-col text-center items-center">
              <div class="text-primary text-4xl mb-2">
                <span class="material-symbols-outlined !text-4xl">forest</span>
              </div>
              <div class="flex flex-col gap-1">
                <h2 class="text-[#131811] dark:text-white text-base font-bold leading-tight">Explore Habitats</h2>
                <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">See where the animals
                  live, from the jungle to the savanna.</p>
              </div>
            </div>
            <div
              class="flex flex-1 gap-3 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-background-dark p-6 flex-col text-center items-center">
              <div class="text-primary text-4xl mb-2">
                <span class="material-symbols-outlined !text-4xl">extension</span>
              </div>
              <div class="flex flex-col gap-1">
                <h2 class="text-[#131811] dark:text-white text-base font-bold leading-tight">Play a Game!</h2>
                <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">Test your knowledge with
                  a fun matching game.</p>
              </div>
            </div>
          </div>
          <!-- Footer -->
          <footer
            class="flex flex-col gap-6 px-5 py-10 text-center @container border-t border-gray-200 dark:border-gray-800 mt-8">
            <div class="flex flex-wrap items-center justify-center gap-6 @[480px]:flex-row @[480px]:justify-around">
              <a class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal min-w-40" href="#">Daycare
                Website</a>
            </div>
            <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">© 2024 Zoo Adventures. A
              project by the Daycare.</p>
          </footer>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", () => {

      /* ------------------------------
         Fade-In Animation on Page Load
      ------------------------------- */
      document.body.classList.add("opacity-0");
      setTimeout(() => {
        document.body.classList.add("transition-all", "duration-700");
        document.body.classList.remove("opacity-0");
      }, 50);


      /* ----------------------------------------
         Smooth Scroll - "Start Exploring" Button
      ---------------------------------------- */
      const exploreBtn = document.querySelector("button");
      const gridSection = document.querySelector(".grid");

      if (exploreBtn && gridSection) {
        exploreBtn.addEventListener("click", () => {
          gridSection.scrollIntoView({ behavior: "smooth" });
        });
      }


      /* ------------------------------
         Hover Animation for Cards
      ------------------------------- */
      const cards = document.querySelectorAll(".grid > div");

      cards.forEach(card => {
        card.addEventListener("mouseenter", () => {
          card.classList.add("scale-105", "shadow-xl", "transition-all", "duration-300");
        });

        card.addEventListener("mouseleave", () => {
          card.classList.remove("scale-105", "shadow-xl");
        });
      });


      /* -------------------------------------
         Navbar Hover Animation (simple glow)
      ------------------------------------- */
      const navLinks = document.querySelectorAll("header a");

      navLinks.forEach(link => {
        link.addEventListener("mouseenter", () => {
          link.classList.add("text-primary", "transition-colors", "duration-200");
        });
        link.addEventListener("mouseleave", () => {
          link.classList.remove("text-primary");
        });
      });


      /* -------------------------------------
         Prepare Dark Mode Toggle (future use)
      ------------------------------------- */
      const root = document.documentElement;

      function enableDarkMode() {
        root.classList.add("dark");
      }

      function disableDarkMode() {
        root.classList.remove("dark");
      }

      // (لن يتم تفعيل الزر الآن — فقط تجهيز)
    });

  </script>
</body>

</html>