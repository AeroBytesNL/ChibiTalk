@extends('layouts.before_login')

@section('title', 'Create account')

@section('content')
  <div class="flex justify-center items-center min-h-screen">
    <!-- Form -->
    <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-sm">
      <div class="flex justify-center mb-6">
        <img src="/media/app/ChibiTalk_logo.png" alt="ChibiTalk Logo" class="h-32 w-auto object-contain rounded-xl" />
      </div>

      <h4 class="text-2xl font-semibold mb-6 text-center">Create Account</h4>

      <!-- Form Start -->
      <form action="{{ route('users.create') }}" method="POST" class="space-y-4">
        @csrf
        <!-- Full Name -->
        <div>
          <label for="name" class="block text-sm font-medium">Full Name</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" required
            value="{{ old('name') }}"
            class="w-full p-3 mt-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- User Name -->
        <div>
          <label for="username" class="block text-sm font-medium">Username</label>
          <input type="text" id="username" name="username" placeholder="Enter your username" required
            value="{{ old('username') }}"
            class="w-full p-3 mt-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium">Email Address</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required
                 value="{{ old('email') }}"
                 class="w-full p-3 mt-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
          <p class="text-xs text-gray-400 mt-1">We don't share your personal information with others.</p>
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required
                 value="{{ old('password') }}"
                 class="w-full p-3 mt-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Confirm Password -->
        <div>
          <label for="confirm-password" class="block text-sm font-medium">Confirm Password</label>
          <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required
                 value="{{ old('confirm-password') }}"
                 class="w-full p-3 mt-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Anti-bot
        <div>
          <label for="anti-bot" class="block text-sm font-medium">Anti Bot</label>
          <input type="text" id="anti-bot" name="anti-bot" placeholder="What's 2 + 2?" required
                 class="w-full p-3 mt-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        -->

        <!-- Submit Button -->
        <div>
          <button type="submit"
            class="w-full py-3 mt-4 bg-blue-600 hover:bg-blue-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            Create Account
          </button>
        </div>

      </form>
      <!-- Form End -->

      <p class="text-sm mt-4 text-center">
        Already have an account? <a href="/login" class="text-blue-400 hover:underline">Login</a>
      </p>
    </div>
  </div>
@stop
