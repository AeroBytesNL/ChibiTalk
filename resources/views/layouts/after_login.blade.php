<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script> <!-- TODO: Import to local -->
    <script src="https://cdn.jsdelivr.net/npm/heroicons@1.0.6/umd/heroicons.min.js"></script> <!-- TODO: Import to local -->
  </head>

  <body class="bg-gray-900 text-white h-screen overflow-hidden font-sans">
    <div class="flex h-full">
      @yield('content')
    </div>
  </body>
</html>
