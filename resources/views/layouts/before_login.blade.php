<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title')</title>

    <link rel="icon" type="image/x-icon" href="/media/app/ChibiTalk_logo.png"> <!-- TODO: Fix smaller icon size -->

    <script src="https://cdn.tailwindcss.com"></script> <!-- TODO: Import to local -->
    <script src="https://cdn.jsdelivr.net/npm/heroicons@1.0.6/umd/heroicons.min.js"></script> <!-- TODO: Import to local -->
  </head>

  <body class="bg-gray-900 text-white h-screen overflow-hidden font-sans">
    @yield('content')


    <!-- Notification Success -->
    <div class="fixed bottom-4 right-4 z-50">
      <div class="flex items-center justify-between px-4 py-3 rounded bg-gray-800 border border-gray-700 text-white shadow-lg w-80 hidden" >
        <div class="flex items-center space-x-3">
          <!-- Icon -->
          <svg class="w-5 h-5 text-green-600"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
          </svg>

          <!-- Message -->
          <span class="text-sm">Success!</span>
        </div>
        <!-- Close Button -->
        <button class="text-gray-400 hover:text-white focus:outline-none">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Notification warn -->
    <div class="fixed bottom-4 right-4 z-50">
      <div class="flex items-center justify-between px-4 py-3 rounded bg-gray-800 border border-gray-700 text-white shadow-lg w-80 hidden">
        <div class="flex items-center space-x-3">
          <!-- Icon -->
          <svg class="w-5 h-5 text-orange-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
          </svg>

          <!-- Message -->
          <span class="text-sm">Warning!</span>
        </div>
        <!-- Close Button -->
        <button class="text-gray-400 hover:text-white focus:outline-none">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Notification error -->
    <div class="fixed bottom-4 right-4 z-50">
      <div class="flex items-center justify-between px-4 py-3 rounded bg-gray-800 border border-gray-700 text-white shadow-lg w-80 hidden">
        <div class="flex items-center space-x-3">
          <!-- Icon -->
          <svg class="w-5 h-5 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
          </svg>

          <!-- Message -->
          <span class="text-sm">Error!</span>
        </div>
        <!-- Close Button -->
        <button class="text-gray-400 hover:text-white focus:outline-none">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
    </div>

  </body>
</html>
