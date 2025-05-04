@extends('layouts.after_login')

@section('title', 'Dashboard')

@section('content')
  <div class="flex h-full">
    <!-- Sidebar (Server list) -->
    <div class="w-16 bg-gray-800 flex flex-col items-center py-4 space-y-4">
      <div class="relative group w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center cursor-pointer">
        <img src="/media/app/ChibiTalk_logo.png" class="w-15 h-15 rounded-full">
      </div>

      <!-- Find Homes -->
      <div class="relative group w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
        <!-- Hover Label -->
        <div class="absolute left-full top-9/12 -translate-y-1/2 ml-2 px-2 py-1 text-sm bg-gray-800 text-white rounded hidden group-hover:block whitespace-nowrap z-10 shadow-lg">
          Find new homes
        </div>
      </div>

      <!-- Create Home -->
      <div class="relative group w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center cursor-pointer" onclick="openModal()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>

        <!-- Hover Label -->
        <div class="absolute left-full top-10/12 -translate-y-1/2 ml-2 px-2 py-1 text-sm bg-gray-800 text-white rounded hidden group-hover:block whitespace-nowrap z-10 shadow-lg">
          Make a new home
        </div>
      </div>

      <!-- User Servers -->
      @foreach($user->homes as $home)
        <div class="relative group w-12 h-12">
          <a href="{{ route('homes.show', $home->id) }}" class="w-full h-full bg-indigo-600 rounded-full flex items-center justify-center cursor-pointer">
            @if (!$home->icon_url)
              <span class="text-white font-bold">{{ substr($home->name, 0, 1) }}</span>
            @else
              <img src="{{ $home->icon_url }}" alt="{{ $home->name }}" class="w-full h-full object-cover rounded-full" />
            @endif
          </a>
          <!-- Hover Label -->
          <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 px-2 py-1 text-sm bg-gray-800 text-white rounded hidden group-hover:block whitespace-nowrap z-10 shadow-lg">
            {{ $home->name }}
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <!-- Main Content Area -->
  <div class="flex-1 p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Welcome, {{ Auth::user()->name }} aka {{ Auth::user()->username }}!</h1>
    <p class="text-gray-600">Select a home from the sidebar or create a new one to get started.</p>
  </div>

  <!-- Create New Home Modal -->
  <div id="createHomeModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden justify-center items-center flex">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-lg mx-4 sm:mx-8 lg:max-w-2xl">
      <h2 class="text-2xl font-semibold mb-4 text-center text-white">Create a New Home</h2>

      <!-- Modal Form -->
      <form action="{{ route('homes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-300">Home Name</label>
          <input type="text" id="name" name="name" placeholder="Enter home name" required
                 class="w-full p-3 mt-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
          <label for="description" class="block text-sm font-medium text-gray-300">Description</label>
          <textarea id="description" name="description" placeholder="Enter description" required
                    class="w-full p-3 mt-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <!-- File Upload with Icon and Preview -->
        <div class="mb-4 flex items-center space-x-2">
          <label for="image" class="block text-sm font-medium text-gray-300 flex items-center cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mr-2" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M9 2a1 1 0 011 1v7.293l1.146-1.146a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 111.414-1.414L8 10.293V3a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            <span>Upload Image</span>
          </label>
          <input type="file" id="image" name="image" accept="image/*" class="hidden" onchange="previewImage()" />
        </div>

        <!-- Image Preview -->
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-300">Image Preview</label>
          <div class="mt-2">
            <img id="imagePreview" src="" alt="Image preview" class="w-100 h-auto rounded-md" style="display: none;">
          </div>
        </div>

        <!-- "Is Public" Switch -->

        <!-- Modal Footer with Buttons -->
        <div class="flex justify-between mt-4">
          <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md" id="closeModalBtn" onclick="closeModal()">Cancel</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Create</button>
        </div>
      </form>
    </div>

  <script>
    function toggleSwitch() {
      const checkbox = document.getElementById('is_public');
      const toggleCircle = document.getElementById('toggleCircle');

      checkbox.checked = !checkbox.checked;

      if (checkbox.checked) {
        toggleCircle.style.transform = 'translateX(100%)';
      } else {
        toggleCircle.style.transform = 'translateX(0)';
      }
    }

    function closeModal() {
      const modal = document.getElementById('createHomeModal');
      modal.classList.add('hidden');
    }

    function previewImage() {
      const file = document.getElementById('image').files[0];
      const reader = new FileReader();

      reader.onloadend = function () {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.src = reader.result;
        imagePreview.style.display = 'block';
      };

      if (file) {
        reader.readAsDataURL(file);
      }
    }
    function openModal() {
      document.getElementById('createHomeModal').classList.remove('hidden');
    }

    function openNewChannelModal() {
      document.getElementById('createChannelModal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('createHomeModal').classList.add('hidden');
      document.getElementById('createChannelModal').classList.add('hidden');
    }
  </script>
@stop
