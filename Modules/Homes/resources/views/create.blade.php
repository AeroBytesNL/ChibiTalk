<!-- Trigger button to open the modal -->
<button class="bg-blue-600 text-white px-4 py-2 rounded-md" id="openModalBtn">
  Create Home
</button>

<!-- Modal -->
<div id="createHomeModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden justify-center items-center">
  <div class="bg-white p-6 rounded-lg shadow-lg w-96">
    <h2 class="text-xl font-semibold mb-4">Create a New Home</h2>

    <!-- Modal form -->
    <form action="{{ route('home.store') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Home Name</label>
        <input type="text" id="name" name="name" placeholder="Enter home name"
               class="w-full p-3 mt-2 bg-gray-100 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div class="mb-4">
        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
        <input type="text" id="address" name="address" placeholder="Enter home address"
               class="w-full p-3 mt-2 bg-gray-100 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea id="description" name="description" placeholder="Enter description"
                  class="w-full p-3 mt-2 bg-gray-100 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
      </div>

      <!-- Modal footer with buttons -->
      <div class="flex justify-between mt-4">
        <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md" id="closeModalBtn">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Create</button>
      </div>
    </form>
  </div>
</div>
