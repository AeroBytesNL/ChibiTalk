@extends('layouts.before_login')

@section('title', 'Create account')

@section('content')
  <div class="flex justify-center items-center min-h-screen">
    <!-- Form -->
    <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-sm">
      <div class="flex justify-center mb-6">
        <img src="/media/app/ChibiTalk_logo.png" alt="ChibiTalk Logo" class="h-32 w-auto object-contain rounded-xl" />
      </div>

      <h4 class="text-2xl font-semibold mb-6 text-center">Login</h4>

      <form action="#" method="POST" class="space-y-4">
        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium">Email Address</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required
            class="w-full p-3 mt-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Submit Button -->
        <div>
          <button type="submit"
            class="w-full py-3 mt-4 bg-blue-600 hover:bg-blue-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            Reset
          </button>
        </div>

      </form>
      <!-- Form End -->
    </div>
  </div>
@stop
