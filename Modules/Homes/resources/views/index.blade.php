@extends('layouts.after_login')

@section('title', 'Discover homes')

@section('content')
  <div class="flex h-full">
    <!-- Sidebar (Server list) -->
    <div class="w-16 bg-gray-800 flex flex-col items-center py-4 space-y-4">
      <div class="relative group w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center cursor-pointer">
        <img src="/media/app/ChibiTalk_logo.png" class="w-15 h-15 rounded-full">
      </div>

      <!-- Find Homes -->
      <a href="{{ route('homes.index') }}">

        <div class="relative group w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
          </svg>

          <!-- Hover Label -->
          <div class="absolute left-full top-9/12 -translate-y-1/2 ml-2 px-2 py-1 text-sm bg-gray-800 text-white rounded hidden group-hover:block whitespace-nowrap z-10 shadow-lg">
            Find new homes
          </div>
        </div>
      </a>

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

    <!-- Different homes -->
    <div class="flex-1 p-6 overflow-auto">
      <h1 class="text-2xl font-semibold text-white mb-6">Discover Homes</h1>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($homes as $home)
          <a href="{{ route('homes.show', $home->id) }}" class="block bg-white rounded-lg shadow hover:shadow-md transition duration-200">
            <div class="p-4 flex items-center space-x-4">
              @if($home->icon_url)
                <img src="{{ $home->icon_url }}" alt="{{ $home->name }}" class="w-12 h-12 rounded-full object-cover" />
              @else
                <div class="w-12 h-12 rounded-full bg-indigo-500 text-white flex items-center justify-center text-lg font-bold">
                  {{ strtoupper(substr($home->name, 0, 1)) }}
                </div>
              @endif
              <div>
                <h2 class="text-lg font-semibold text-gray-800">{{ $home->name }}</h2>
                <p class="text-sm text-gray-500">{{ $home->description ?? 'No description provided' }}</p>
              </div>
            </div>
          </a>
        @endforeach
      </div>
    </div>

  @vite(['Modules/Homes/resources/assets/js/app.js'])
@stop
