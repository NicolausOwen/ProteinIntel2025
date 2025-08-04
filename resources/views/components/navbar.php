<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Navbar Fixed</title>

  <!-- Font Montserrat -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet" />

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <!-- Flowbite (for dropdown toggle) -->
  <script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.js"></script>

  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      margin: 0;
      padding: 0;
    }
    nav a, nav button {
      font-size:22px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav style="background-color: #333446;"
     class="fixed top-0 left-0 right-0 z-50 w-full border-gray-200 dark:border-gray-700 
            rounded-bl-[25px] rounded-br-[25px]">

  <div class="max-w-screen-xl mx-auto p-4 flex flex-wrap items-center justify-between">
    <!-- Logo -->
    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
      <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Protein</span>
    </a>

    <!-- Mobile Menu Button -->
    <button data-collapse-toggle="navbar-dropdown" type="button"
      class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-[#B8CFCE] focus:outline-none focus:ring-2 focus:ring-gray-200"
      aria-controls="navbar-dropdown" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>

    <!-- Menu Items -->
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul
        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg 
               bg-[#333446] md:flex-row md:mt-0 md:border-0 md:bg-[#333446] 
               justify-center md:justify-center space-y-2 md:space-y-0 md:space-x-8 rtl:space-x-reverse">

        <li>
          <a href="#"
            class="block py-2 px-3 text-white font-semibold hover:text-black transition rounded-[10px]"
            onmouseover="this.style.backgroundColor='#B8CFCE'"
            onmouseout="this.style.backgroundColor='transparent'">Home</a>
        </li>

        <li>
          <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
            class="flex items-center justify-between w-full py-2 px-3 text-white font-semibold hover:text-black transition rounded-[10px] md:w-auto"
            onmouseover="this.style.backgroundColor='#B8CFCE'"
            onmouseout="this.style.backgroundColor='transparent'">
            Quizzez
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
            </svg>
          </button>

          <!-- Dropdown Menu -->
          <div id="dropdownNavbar"
            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
            <ul class="py-2 text-sm text-gray-700">
              <li>
                <a href="#" class="block px-4 py-2 transition hover:text-black rounded-[10px]"
                  onmouseover="this.style.backgroundColor='#B8CFCE'"
                  onmouseout="this.style.backgroundColor='white'">lorem</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 transition hover:text-black rounded-[10px]"
                  onmouseover="this.style.backgroundColor='#B8CFCE'"
                  onmouseout="this.style.backgroundColor='white'">lorem</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 transition hover:text-black rounded-[10px]"
                  onmouseover="this.style.backgroundColor='#B8CFCE'"
                  onmouseout="this.style.backgroundColor='white'">lorem</a>
              </li>
            </ul>
            <div class="py-1">
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 transition hover:text-black rounded-[10px]"
                onmouseover="this.style.backgroundColor='#B8CFCE'"
                onmouseout="this.style.backgroundColor='white'">Sign out</a>
            </div>
          </div>
        </li>

        <li>
          <a href="#"
            class="block py-2 px-3 text-white font-semibold hover:text-black transition rounded-[10px]"
            onmouseover="this.style.backgroundColor='#B8CFCE'"
            onmouseout="this.style.backgroundColor='transparent'">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>



</body>
</html>
