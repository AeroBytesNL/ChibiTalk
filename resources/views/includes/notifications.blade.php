@foreach (['success', 'error'] as $type)
  @if (session()->has($type))
    <div class="fixed bottom-4 right-4 z-50" id="noti-{{ $type }}">
      <div class="flex items-center justify-between px-4 py-3 rounded bg-gray-800 border border-gray-700 text-white shadow-lg w-80 hidden">
        <div class="flex items-center space-x-3">
          @if ($type === 'success')
            <svg class="w-5 h-5 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
            </svg>
          @else
            <svg class="w-5 h-5 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75M12 16.5h.008v.008H12v-.008ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          @endif
          <span class="text-sm">{{ $type }}! {{ session($type) }}</span>
        </div>
        <button onclick="this.closest('.flex').classList.add('hidden')" class="text-gray-400 hover:text-white focus:outline-none">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
    </div>
  @endif
@endforeach

@if ($errors->any())
  <div class="fixed bottom-4 right-4 z-50" id="noti-errors">
    <div class="flex items-center justify-between px-4 py-3 rounded bg-gray-800 border border-gray-700 text-white shadow-lg w-80 hidden">
      <div class="flex items-center space-x-3">
        <svg class="w-5 h-5 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75M12 16.5h.008v.008H12v-.008ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <span class="text-sm">
          @foreach($errors->all() as $error)
            {{ $error }}
          @endforeach
        </span>
      </div>
      <button onclick="this.closest('.flex').classList.add('hidden')" class="text-gray-400 hover:text-white focus:outline-none">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>
  </div>
@endif

<script>
  window.addEventListener('load', () => {
    ['success', 'error', 'errors'].forEach(type => {
      const el = document.getElementById(`noti-${type}`);
      if (el) {
        const box = el.querySelector('.flex');
        box.classList.remove('hidden');
        setTimeout(() => box.classList.add('hidden'), 5000);
      }
    });
  });
</script>
