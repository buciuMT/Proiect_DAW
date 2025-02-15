
@props(['books', 'user'])

<x-app-layout>
<div class="max-w-4xl mx-auto p-4 bg-white shadow rounded-lg">
    <h2 class="text-xl font-semibold mb-4">Lista Cărților</h2>

    @if ($books->isEmpty())
        <p class="text-gray-600">Nu există cărți în listă.</p>
    @else
        <ul class="divide-y divide-gray-200">
            @foreach ($books as $book)
                <li class="p-4 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-medium">{{ $book->modelCarte->titlu }}</h3>
                        <p class="text-sm text-gray-500">{{ $book->modelCarte->autor }}</p>
                    </div>

                    @if ($user->id === $book->id_lista || in_array($user->role, ['angajat', 'admin']))
                        <form method="POST" action="{{ route('lista_carte.destroy', $book->id) }}" onsubmit="return confirm('Sigur doriți să ștergeți această carte?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Șterge</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</div>
</x-app-layout>
