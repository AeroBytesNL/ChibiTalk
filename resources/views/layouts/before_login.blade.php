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


  </body>
</html>
