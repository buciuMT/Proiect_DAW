<x-app-layout>
 <div class="container mx-auto p-6">
        <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
            <div class="flex flex-col md:flex-row items-center">
                <img src={{ Storage::url($model->dark_cover) }} alt="Book Cover" class="w-40 h-56 rounded-lg shadow-md">
                <div class="md:ml-6 mt-4 md:mt-0 p-4">
                    <h1 class="text-2xl font-bold">{{$model->titlu}}</h1>
                    <p class="text-gray-600 dark:text-gray-400">{{$model->autor}}</p>
                    <div class="mt-3 flex flex-wrap gap-2">
                    @foreach ($categorii as $categorie)
                        <span class="px-3 py-1 text-sm bg-blue-500 text-white rounded-full"><a href={{'/categorie/'.$categorie->nume_categorie}}>{{$categorie->nume_categorie}}</a></span>
                    @endforeach
                    </div>
                    <div class="mt-4 flex space-x-4">
                        <button class="px-4 py-2 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600">Add to Favorites</button>
                        <button class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600">Add to List</button>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <h2 class="text-xl font-semibold">Reviews</h2>
                <div class="mt-4 space-y-4">
                    @foreach ($recenzii as $recenzie)
                    <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                        <p class="font-semibold">{{''}}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">“{{$recenzie->continut}}”</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
