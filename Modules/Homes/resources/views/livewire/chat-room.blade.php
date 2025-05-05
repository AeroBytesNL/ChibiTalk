<div class="relative">
  <!-- Scrollable messages container -->
  <div class="messages overflow-y-auto  text-white p-4 space-y-4 mb-7" style="height: calc(100vh - 150px);">
    <!-- Individual messages -->
    @foreach($messages as $message)
      <div class="group flex items-start space-x-3 relative cursor-pointer transition-colors duration-200 hover:outline-none hover:ring-2 hover:ring-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-600 p-1 rounded">
        <!-- PFP -->
        @if ($message->user->icon_url)
          <img src="{{ $message->user->icon_url }}" alt="User1 PFP"
               class="w-10 h-10 rounded-full object-cover" />
        @else
          <img src="https://placehold.co/30x30" alt=""
               class="w-10 h-10 rounded-full object-cover" />
        @endif
        <!-- Message content -->
        <div class="flex-1">
          <div class="flex items-center space-x-2">
            <!-- User name -->
            <span class="font-bold text-blue-400 hover:underline">{{ $message->user->username }}</span>
            <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($message->created_at)->format('d-m-Y | H:i:s') }}</span>
          </div>
          <!-- Message -->
          <p class="text-white">{{ $message->content }}</p>
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
    @endforeach
  </div>

  <!-- Fixed input form -->
  <div class="fixed bottom-0  right-0 z-50 w-6/7  p-4">
    <form wire:submit.prevent="sendMessage">
      <div class="h-16 flex items-center px-4 rounded-xl">
        <input
          type="text"
          placeholder="Message #general"
          wire:model="message"
          class="w-full bg-gray-800 text-white px-4 py-2 rounded cursor-pointer transition-colors duration-200 hover:outline-none hover:ring-2 hover:ring-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-600 p-1 rounded"
        />

        <input type="hidden" wire:model="homeId" value="{{ $homeId }}" />
        <input type="hidden" wire:model="channelId" value="{{ $channelId }}" />

        <button
          type="submit"
          class="ml-4 p-2 bg-gray-900 text-white rounded-lg hover:bg-indigo-600 transition-colors duration-200"
          title="Send Message"
        >
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
          </svg>
        </button>
      </div>
    </form>

  </div>
</div>
