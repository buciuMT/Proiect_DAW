
<x-app-layout>
  <div class="bg-white dark:bg-gray-700 p-8 rounded-lg shadow-lg w-96">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-900 dark:text-white">Contact Us</h2>
    <form action="{{route('contact.store')}}" method="POST">
      <!-- Name -->
@csrf
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Full Name</label>
        <input type="text" id="name" name="name" class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" required>
      </div>

      <!-- Email -->
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email Address</label>
        <input type="email" id="email" name="email" class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" required>
      </div>

      <!-- Message -->
      <div class="mb-4">
        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
        <textarea id="message" name="message" rows="4" class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" required></textarea>
      </div>

      <!-- Submit Button -->
      <div class="flex justify-center">
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition dark:bg-blue-700 dark:hover:bg-blue-600">
          Send Message
        </button>
      </div>
    </form>
  </div>
</x-app-layout>

