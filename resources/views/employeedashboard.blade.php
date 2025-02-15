<x-app-layout>
<div class="max-w-lg mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-4">{{__("Carte din sursa externa")}}</h2>

    <form action="{{route('angajatdash.update')}}" method="POST">
      <!-- URL Field -->
      @csrf
      <input type="hidden" name="model_carte_adaug" value='true'/>
      <div class="mb-4">
        <label for="url" class="block text-sm font-medium text-gray-600 dark:text-gray-300">URL model carte</label>
        <input type="url" id="url" name="url" placeholder="https://annas-archive.org"
          class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
      </div>

      <!-- Number Field -->
      <div class="mb-4">
        <label for="number" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Numar de carti noi</label>
        <input type="number" id="number" name="number" placeholder="123"
          class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
      </div>

      <!-- Submit Button -->
      <div>
        <button type="submit"
          class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 dark:bg-blue-700 dark:hover:bg-blue-600">
          Submit
        </button>
      </div>
    </form>
  </div>
</x-app-layout>
