<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Confirm Your Email</title>
  <style>
    /* Include Tailwind CSS here */
    @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
  </style>
</head>
<body class="font-sans bg-gray-100 text-gray-800">
<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg mt-10">
  <p class="text-xl text-gray-700 mb-4">Thank you for signing up!</p>
  <p class="text-base text-gray-600 mb-6">
    Please confirm your email by clicking the link below:
  </p>
  <a
    href="{{ url('/confirm?email=' . urlencode($email)) }}"
    class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg text-center hover:bg-blue-700 transition duration-200"
  >Confirm Email</a
  >
  <p class="text-sm text-gray-500 mt-6">
    If you did not sign up for an account, please ignore this email.
  </p>
</div>
</body>
</html>
