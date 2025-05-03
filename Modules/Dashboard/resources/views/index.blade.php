@extends('layouts.after_login')

@section('title', 'Dashboard')

@section('content')
  <div class="flex h-full">
    <!-- Sidebar (Server list) -->
    <div class="w-16 bg-gray-800 flex flex-col items-center py-4 space-y-4">

      <!-- Find Homes -->
      <div class="relative group w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
        <!-- Hover Label -->
        <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 px-2 py-1 text-sm bg-gray-800 text-white rounded hidden group-hover:block whitespace-nowrap z-10 shadow-lg">
          Flufffff
        </div>
      </div>

      <!-- Create Home -->
      <div class="relative group w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center cursor-pointer" onclick="openModal()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>

        <!-- Hover Label -->
        <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 px-2 py-1 text-sm bg-gray-800 text-white rounded hidden group-hover:block whitespace-nowrap z-10 shadow-lg">
          Make a new home
        </div>
      </div>

      <!-- User Servers -->
      <div class="relative group w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center cursor-pointer">
        F
        <!-- Hover Label -->
        <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 px-2 py-1 text-sm bg-gray-800 text-white rounded hidden group-hover:block whitespace-nowrap z-10 shadow-lg">
          Flufffff
        </div>
      </div>

      <div class="relative group w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center cursor-pointer">
        Y
        <!-- Hover Label -->
        <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 px-2 py-1 text-sm bg-gray-800 text-white rounded hidden group-hover:block whitespace-nowrap z-10 shadow-lg">
          Yolo Discord
        </div>
      </div>

      <div class="relative group w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center cursor-pointer">
        L
        <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 px-2 py-1 text-sm bg-gray-800 text-white rounded hidden group-hover:block whitespace-nowrap z-10 shadow-lg">
          Life server
        </div>
      </div>
    </div>

    <!-- Channel List -->
    <div class="w-60 bg-gray-850 text-gray-300 p-4 flex flex-col h-full">
      <!-- Current active guild -->
      <div class="flex items-center gap-3 mb-4 p-2 rounded hover:bg-gray-700 cursor-pointer transition-colors duration-200">
        <img src="https://i.pravatar.cc/40?img=1" alt="Server Icon" class="w-8 h-8 rounded-full" />
        <span class="text-white font-semibold truncate">Home Name</span>
        <svg class="w-4 h-4 text-gray-400 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>

      <!-- Guild channels -->
      <h2 class="text-white text-sm mb-2 ml-2 font-bold flex justify-between items-center" onclick="openNewChannelModal()">
        Rooms
        <span class="text-white text-lg cursor-pointer hover:animate-bounce">+</span>
      </h2>

      <ul class="space-y-1">
        <li class="relative hover:ml-1 px-2 py-1 rounded group">
          # general
          <!-- Hover settings icon -->
          <div class="absolute right-2 top-1/2 transform -translate-y-1/2 opacity-0 group-hover:opacity-100">
            <button title="Settings" class="hover:animate-bounce">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                <path d="M18.75 12.75h1.5a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM12 6a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 6ZM12 18a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 18ZM3.75 6.75h1.5a.75.75 0 1 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM5.25 18.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 0 1.5ZM3 12a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 3 12ZM9 3.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM12.75 12a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0ZM9 15.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
              </svg>

            </button>
          </div>
        </li>
        <li class="relative hover:ml-1 px-2 py-1 rounded group">
          # random
          <!-- Hover settings icon -->
          <div class="absolute right-2 top-1/2 transform -translate-y-1/2 opacity-0 group-hover:opacity-100">
            <button title="Settings" class="hover:animate-bounce">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                <path d="M18.75 12.75h1.5a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM12 6a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 6ZM12 18a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 18ZM3.75 6.75h1.5a.75.75 0 1 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM5.25 18.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 0 1.5ZM3 12a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 3 12ZM9 3.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM12.75 12a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0ZM9 15.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
              </svg>
            </button>
          </div>
        </li>
        <li class="relative hover:ml-1 px-2 py-1 rounded group">
          # help
          <!-- Hover settings icon -->
          <div class="absolute right-2 top-1/2 transform -translate-y-1/2 opacity-0 group-hover:opacity-100">
            <button title="Settings" class="hover:animate-bounce">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                <path d="M18.75 12.75h1.5a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM12 6a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 6ZM12 18a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 18ZM3.75 6.75h1.5a.75.75 0 1 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM5.25 18.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 0 1.5ZM3 12a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 3 12ZM9 3.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM12.75 12a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0ZM9 15.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
              </svg>
            </button>
          </div>
        </li>
      </ul>


      <!-- User profile -->
      <div class="mt-auto p-2 bg-gray-800 rounded-xl flex items-center justify-between ">
        <div class="flex items-center gap-2">
          <div class="relative">
            <img src="https://i.pravatar.cc/40?img=1" alt="User Avatar" class="w-8 h-8 rounded-full" />
            <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 border-2 border-gray-800 rounded-full"></span>
          </div>
          <div class="text-sm">
            <p class="text-white leading-none">User One</p>

            <p class="text-gray-400 text-xs">Online</p>
          </div>
        </div>
        <div class="flex items-center gap-2 text-gray-400">
          <button title="Mute" class="hover:animate-bounce">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z" />
            </svg>
          </button>
          <button title="Deafen" class="hover:animate-bounce">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
              <path d="M13.5 4.06c0-1.336-1.616-2.005-2.56-1.06l-4.5 4.5H4.508c-1.141 0-2.318.664-2.66 1.905A9.76 9.76 0 0 0 1.5 12c0 .898.121 1.768.35 2.595.341 1.24 1.518 1.905 2.659 1.905h1.93l4.5 4.5c.945.945 2.561.276 2.561-1.06V4.06ZM18.584 5.106a.75.75 0 0 1 1.06 0c3.808 3.807 3.808 9.98 0 13.788a.75.75 0 0 1-1.06-1.06 8.25 8.25 0 0 0 0-11.668.75.75 0 0 1 0-1.06Z" />
              <path d="M15.932 7.757a.75.75 0 0 1 1.061 0 6 6 0 0 1 0 8.486.75.75 0 0 1-1.06-1.061 4.5 4.5 0 0 0 0-6.364.75.75 0 0 1 0-1.06Z" />
            </svg>
          </button>
          <button title="Settings" class="hover:animate-bounce">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Chat Area -->
    <div class="flex-1 flex flex-col">
      <!-- Top Bar -->
      <div class="h-12 bg-gray-800 flex items-center px-4 border-b border-gray-700 rounded-b">
        <h3 class="text-white font-semibold"># general</h3>
        <p class="text-gray-400 text-xs ms-3">Welcome to the general room! Feel free to chat here.</p>

        <div class="ml-auto flex items-center">
          <input type="text" placeholder="Search..."
                 class="p-2 bg-gray-700 text-white mt-3 mb-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 w-32 sm:w-48">
        </div>
      </div>

      <!-- Messages -->
      <div class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-900">
        <!-- Individual message -->
        <div class="group flex items-start space-x-3 relative hover:ml-1">
          <!-- PFP -->
          <img src="https://i.pravatar.cc/40?img=1" alt="User1 PFP"
               class="w-10 h-10 rounded-full object-cover" />

          <!-- Message content -->
          <div class="flex-1">
            <div class="flex items-center space-x-2">
              <!-- User name -->
              <span class="font-bold text-blue-400 hover:underline">User one</span>
              <span class="bg-indigo-600 text-blue-800 text-xs font-medium me-1 px-1 py-0.25 leading-tight rounded-sm dark:bg-blue-900 dark:text-blue-300 text-white">Admin</span>
              <span class="text-xs text-gray-500">Today at 3:45 PM</span>
            </div>
            <!-- Message -->
            <p class="text-white">Hello, welcome to the channel!</p>
          </div>

          <!-- Hover icons -->
          <div class="absolute right-0 top-0 hidden group-hover:flex space-x-2 p-1 bg-gray-800 rounded">
            <button title="React">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m11.99 16.5 3.75 3.75m0 0 3.75-3.75m-3.75 3.75V3.75H4.49" />
              </svg>
            </button>
            <button title="Reply" class="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z"
                />
              </svg>
            </button>
            <button title="edit">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
              </svg>
            </button>
            <button title="trash">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
              </svg>
            </button>
          </div>
        </div>

        <!-- Individual message -->
        <div class="group flex items-start space-x-3 relative hover:ml-1">
          <!-- PFP -->
          <img src="https://i.pravatar.cc/40?img=3" alt="User1 PFP"
               class="w-10 h-10 rounded-full object-cover" />

          <!-- Message content -->
          <div class="flex-1">
            <div class="flex items-center space-x-2">
              <span class="font-bold text-blue-400 hover:underline">User1</span>
              <span class="bg-indigo-600 text-blue-800 text-xs font-medium me-1 px-1 py-0.25 leading-tight rounded-sm dark:bg-blue-900 dark:text-blue-300 text-white">Level 1</span>
              <span class="text-xs text-gray-500">Today at 3:45 PM</span>
            </div>
            <p class="text-white">Thanks homie!</p>
          </div>

          <!-- Hover icons -->
          <div class="absolute right-0 top-0 hidden group-hover:flex space-x-2 p-1 bg-gray-800 rounded">
            <button title="React">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m11.99 16.5 3.75 3.75m0 0 3.75-3.75m-3.75 3.75V3.75H4.49" />
              </svg>
            </button>
            <button title="Reply">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z"
                />
              </svg>
            </button>
            <button title="edit">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
              </svg>
            </button>
            <button title="trash">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Message Input -->
      <div class="h-16 bg-gray-800 flex items-center px-4 border-t border-gray-700 rounded-xl mr-1 mb-1">
        <input
          type="text"
          placeholder="Message #general"
          class="w-full bg-gray-700 text-white px-4 py-2 rounded focus:outline-none"
        />
        <!-- Send Button -->
        <button
          class="ml-4 p-2 bg-gray-900 text-white rounded-lg hover:bg-indigo-600 transition-colors duration-200"
          title="Send Message"
        >
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
          </svg>

        </button>
      </div>

    </div>
  </div>

  <!-- Create New Channel Modal -->
  <div id="createChannelModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden justify-center items-center flex">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-lg mx-4 sm:mx-8 lg:max-w-2xl">
      <h2 class="text-2xl font-semibold mb-4 text-center text-white">Create a new channel</h2>

      <!-- Modal Form -->
      <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-300">Channel Name</label>
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
          <label for="channel_type" class="block text-sm font-medium text-gray-300">Channel Type</label>
          <select id="channel_type" name="channel_type"
                  class="w-full p-3 mt-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="text">Text</option>
            <option value="voice">Voice</option>
            <option value="announcement">Announcement</option>
          </select>
        </div>

        <!-- "Is Public" Switch -->
        <div class="mb-4 flex items-center">
          <label for="is_public" class="block text-sm font-medium text-gray-300 mr-4">Is Public</label>
          <input type="checkbox" id="is_public" name="is_public" class="toggle-checkbox hidden" />
          <div class="relative">
            <div class="w-10 h-6 bg-gray-600 rounded-full cursor-pointer" onclick="toggleSwitch()">
              <div class="absolute top-0 left-0 w-6 h-6 bg-blue-500 rounded-full transition-transform duration-300 transform" id="toggleCircle"></div>
            </div>
          </div>
        </div>

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
          <input type="text" id="name" name="name" placeholder="Enter home name"
                 class="w-full p-3 mt-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>


        <div class="mb-4">
          <label for="description" class="block text-sm font-medium text-gray-300">Description</label>
          <textarea id="description" name="description" placeholder="Enter description"
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
        <div class="mb-4 flex items-center">
          <label for="is_public" class="block text-sm font-medium text-gray-300 mr-4">Is Public</label>
          <input type="checkbox" id="is_public" name="is_public" class="toggle-checkbox hidden" />
          <div class="relative">
            <div class="w-10 h-6 bg-gray-600 rounded-full cursor-pointer" onclick="toggleSwitch()">
              <div class="absolute top-0 left-0 w-6 h-6 bg-blue-500 rounded-full transition-transform duration-300 transform" id="toggleCircle"></div>
            </div>
          </div>
        </div>

        <!-- Modal Footer with Buttons -->
        <div class="flex justify-between mt-4">
          <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md" id="closeModalBtn" onclick="closeModal()">Cancel</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Create</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function toggleSwitch() {
      const toggleCircle = document.getElementById('toggleCircle');
      const toggleCheckbox = document.getElementById('is_public');
      toggleCheckbox.checked = !toggleCheckbox.checked;

      if (toggleCheckbox.checked) {
        toggleCircle.style.transform = "translateX(100%)";
      } else {
        toggleCircle.style.transform = "translateX(0)";
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
