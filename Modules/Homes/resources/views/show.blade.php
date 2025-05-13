@extends('layouts.after_login')

@section('title', $home->name . ' # ' . ($current_channel->name ?? ''))

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
      @foreach($user->homes as $serverListhome)
        <div class="relative group w-12 h-12">
          <a href="{{ route('homes.show', $serverListhome->id) }}" class="w-full h-full bg-indigo-600 rounded-full flex items-center justify-center cursor-pointer">
            @if (!$serverListhome->icon_url)
              <span class="text-white font-bold">{{ substr($serverListhome->name, 0, 1) }}</span>
            @else
              <img src="{{ $serverListhome->icon_url }}" alt="{{ $serverListhome->name }}" class="w-full h-full object-cover rounded-full" />
            @endif
          </a>
          <!-- Hover Label -->
          <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 px-2 py-1 text-sm bg-gray-800 text-white rounded hidden group-hover:block whitespace-nowrap z-10 shadow-lg">
            {{ $serverListhome->name }}
          </div>
        </div>
      @endforeach
    </div>

    <!-- Channel List -->
    <div class="w-60 bg-gray-850 text-gray-300 p-4 flex flex-col h-full">
      <div>
        <div
          class="flex items-center gap-3 mb-4 p-2 rounded cursor-pointer transition-colors duration-200 hover:outline-none hover:ring-2 hover:ring-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-600"
          tabindex="0"
        >
          <h2 class="text-shadow-md font-bold">{{ $home->name ?? ''}}</h2>
          <span class="text-white font-semibold truncate"></span>
          <svg class="w-5 h-5 transform transition-transform duration-300 hover:scale-110 text-gray-400 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
          <!-- Invite -->
          <button class="transform transition-transform duration-300 hover:scale-110" id="inviteCopyBtn">
            <svg class="w-5 h-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
            </svg>
            <input type="hidden" id="inviteUrl" value="{{ URL('/invite/' . $home->id) }}">
          </button>
        </div>
      </div>

      <!-- Home channels -->
      <h2 class="text-white text-sm mb-2 ml-2 font-bold flex justify-between items-center" onclick="openNewChannelModal()">
        Rooms
        <span class="text-white text-lg cursor-pointer transform transition-transform duration-300 hover:scale-110">+</span>
      </h2>

      <!-- Channel loop -->
      <ul class="space-y-1">
        @foreach($home->channels as $channel)
          <a href="?channel={{ $channel->name }}">
            @if($current_channel->name == $channel->name)
              <li class="relative px-2 py-1 group cursor-pointer transition-colors duration-200 hover:outline-none ring-2 ring-indigo-600 outline-none ring-2 ring-indigo-600 p-1 rounded">
            @else
              <li class="relative px-2 py-1 group cursor-pointer transition-colors duration-200 hover:outline-none hover:ring-2 hover:ring-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-600 p-1 rounded">
            @endif
              # {{ $channel->name }}
              <div class="absolute right-2 top-14/15 transform -translate-y-1/2 opacity-0 group-hover:opacity-100">
                <button title="Settings" class="transform transition-transform duration-300 hover:scale-110">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                    <path d="M18.75 12.75h1.5a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM12 6a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 6ZM12 18a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 18ZM3.75 6.75h1.5a.75.75 0 1 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM5.25 18.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 0 1.5ZM3 12a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 3 12ZM9 3.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM12.75 12a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0ZM9 15.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                  </svg>
                </button>
              </div>
            </li>
          </a>
        @endforeach
      </ul>

      <ul class="space-y-1">


      <!-- User profile -->
      <div class="p-2 mt-4 bg-gray-800 rounded-xl flex items-center justify-between fixed bottom-0 left-20 mb-6 z-50 ">
        <div class="flex items-center gap-2">
          <div class="relative">
            <img src="https://i.pravatar.cc/40?img=1" alt="User Avatar" class="w-8 h-8 rounded-full" />
            <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 border-2 border-gray-800 rounded-full"></span>
          </div>
          <div class="text-sm">
            <p class="text-white leading-none">{{ Auth::user()->username }}</p>
            <p class="text-gray-400 text-xs">Online</p>
          </div>
        </div>
        <div class="flex items-center gap-2 text-gray-400">
          <button title="Mute" class="transform transition-transform duration-300 hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z" />
            </svg>
          </button>
          <button title="Deafen" class="transform transition-transform duration-300 hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
              <path d="M13.5 4.06c0-1.336-1.616-2.005-2.56-1.06l-4.5 4.5H4.508c-1.141 0-2.318.664-2.66 1.905A9.76 9.76 0 0 0 1.5 12c0 .898.121 1.768.35 2.595.341 1.24 1.518 1.905 2.659 1.905h1.93l4.5 4.5c.945.945 2.561.276 2.561-1.06V4.06ZM18.584 5.106a.75.75 0 0 1 1.06 0c3.808 3.807 3.808 9.98 0 13.788a.75.75 0 0 1-1.06-1.06 8.25 8.25 0 0 0 0-11.668.75.75 0 0 1 0-1.06Z" />
              <path d="M15.932 7.757a.75.75 0 0 1 1.061 0 6 6 0 0 1 0 8.486.75.75 0 0 1-1.06-1.061 4.5 4.5 0 0 0 0-6.364.75.75 0 0 1 0-1.06Z" />
            </svg>
          </button>
          <button title="Settings" class="transform transition-transform duration-300 hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Chat Area -->
    <div class="flex-1">
      <div class="h-12 bg-gray-800 flex items-center px-4 border-b border-gray-700 rounded-b">
        <h3 class="text-white font-semibold"># {{ ($current_channel->name ?? '') }}</h3>
        <p class="text-gray-400 text-xs ms-3">{{ Str::words(($current_channel->description ?? ''), 6, '...')}}</p>

        <div class="ml-auto flex items-center">
          <x-fields.searchbar />
        </div>
      </div>

      <!-- Messages -->
      <livewire:homes::chat-room />
    </div>
  </div>


  <!-- Create New Room Modal -->
  <div id="createChannelModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden justify-center items-center flex">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-lg mx-4 sm:mx-8 lg:max-w-2xl">
      <h2 class="text-2xl font-semibold mb-4 text-center text-white">Create a new room</h2>

      <!-- Modal Form -->
      <form action="{{ route('channels.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-300">Room Name</label>
          <input type="text" id="name" name="name" placeholder="Enter channel name"
                 class="w-full p-3 mt-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
          <label for="description" class="block text-sm font-medium text-gray-300">Description</label>
          <textarea id="description" name="description" placeholder="Enter description"
                    class="w-full p-3 mt-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <!-- Channel Type Select Dropdown -->
        <div class="mb-4">
          <label for="type" class="block text-sm font-medium text-gray-300">Room Type</label>
          <select id="type" name="type"
                  class="w-full p-3 mt-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value=1>Text</option>
            <option value=2>Voice</option>
          </select>
        </div>

        <!-- "Is Public" Switch -->
        <div class="mb-4 flex items-center">
          <label for="is_public" class="block text-sm font-medium text-gray-300 mr-4">Is Public</label>
          <input type="checkbox" id="is_public" value=1 name="is_public" class="toggle-checkbox hidden" />
          <div class="relative">
            <div class="w-10 h-6 bg-gray-600 rounded-full cursor-pointer" onclick="toggleSwitch()">
              <div class="absolute top-0 left-0 w-6 h-6 bg-blue-500 rounded-full transition-transform duration-300 transform" id="toggleCircle"></div>
            </div>
          </div>
        </div>

        <input type="hidden" name="home_id" id="home_id" value="{{ $home->id }}">
        <!-- Modal Footer with Buttons -->
        <div class="flex justify-between mt-4">
          <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md" id="closeModalBtn" onclick="closeModal()">Cancel</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Create</button>
        </div>
      </form>
    </div>
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
  </div>

  <input type="hidden" id="invite_url" value="{{ url('/invite/' . $home->id) }}">

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

    document.getElementById('inviteCopyBtn').addEventListener('click', function () {
      navigator.clipboard.writeText(document.getElementById('invite_url').value);

      const notification = document.getElementById('noti-invite');
      // Show notification
      notification.classList.remove('hidden');

      // Hide after 5 seconds
      setTimeout(() => {
        notification.classList.add('hidden');
      }, 5000);
    });
    </script>

    <div class="fixed bottom-4 right-4 z-50 hidden" id="noti-invite">
      <div class="flex items-center justify-between px-4 py-3 rounded bg-gray-800 border border-gray-700 text-white shadow-lg w-80">
        <div class="flex items-center space-x-3">
          <svg class="w-15 h-15 text-green-600 size-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
          </svg>
          <span class="text-sm">Invite has been copied to your clipboard!</span>
        </div>
        <button onclick="this.closest('.flex').classList.add('hidden')" class="text-gray-400 hover:text-white focus:outline-none">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
    </div>

  <input type="hidden" id="channel_id" name="channel_id" value="{{ $channel_id }}">
  <input type="hidden" id="current_user_id" name="current_user_id" value="{{ Auth::id() }}">

  @vite(['Modules/Homes/resources/assets/js/app.js'])
@stop
