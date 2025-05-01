<div class="max-w-7xl mx-auto p-6 bg-gray-50 rounded-lg shadow-xl">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Gestión de Libros</h2>

    <button wire:click="openModal" class="bg-green-600 text-white px-6 py-3 rounded-md mb-6 shadow-md hover:bg-green-700 transition-colors">
        Crear Libro
    </button>

    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Lista de Libros</h3>
    <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white rounded-lg shadow-md border border-gray-200">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-4 text-left">ID</th>
                    <th class="px-6 py-4 text-left">Título</th>
                    <th class="px-6 py-4 text-left">Género</th>
                    <th class="px-6 py-4 text-left">Sinopsis</th>
                    <th class="px-6 py-4 text-left">ISBN</th>
                    <th class="px-6 py-4 text-left">Editorial</th>
                    <th class="px-6 py-4 text-left">Usuario (ID)</th>
                    <th class="px-6 py-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr class="hover:bg-gray-100 transition-colors">
                        <td class="border px-6 py-4 text-gray-700">{{ $book->id }}</td>
                        <td class="border px-6 py-4 text-gray-700">{{ $book->titulo }}</td>
                        <td class="border px-6 py-4 text-gray-700">{{ $book->genero }}</td>
                        <td class="border px-6 py-4 text-gray-700 truncate">{{ $book->sinopsis }}</td>
                        <td class="border px-6 py-4 text-gray-700">{{ $book->isbn }}</td>
                        <td class="border px-6 py-4 text-gray-700">{{ $book->editorial }}</td>
                        <td class="border px-6 py-4 text-gray-700">{{ $book->user_id }}</td>
                        <td class="border px-6 py-4 text-center space-x-2">
                            <button wire:click="deleteBook({{ $book->id }})" 
                                class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition-colors">
                                Eliminar
                            </button>
                            <button wire:click="openModal({{ $book->id }})" 
                                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
                                Editar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($isModalOpen)
        <div wire:click.self="closeModal" class="fixed inset-0 flex items-center justify-center h-screen bg-gray-900 bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-xl w-11/12 md:w-4/12 h-5/6 overflow-y-auto scrollbar-hide">
                <button wire:click="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <form class="h-full grid grid-cols-1 sm:grid-cols-2 gap-6 bg-white p-8 rounded-md shadow-md" wire:submit.prevent="{{ $isEdit ? 'updateBook' : 'createBook' }}">
                    <div class="flex flex-col">
                        <label for="title" class="text-sm font-semibold text-gray-700">Título</label>
                        <input type="text" id="title" wire:model="title" placeholder="Título" required
                            class="mt-2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div class="flex flex-col">
                        <label for="genre" class="text-sm font-semibold text-gray-700">Género</label>
                        <input type="text" id="genre" wire:model="genre" placeholder="Género" required
                            class="mt-2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div class="flex flex-col">
                        <label for="synopsis" class="text-sm font-semibold text-gray-700">Sinopsis</label>
                        <textarea required id="synopsis" wire:model="synopsis" placeholder="Sinopsis" rows="4"
                            class="mt-2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                    </div>
                    <div class="flex flex-col">
                        <label for="isbn" class="text-sm font-semibold text-gray-700">ISBN</label>
                        <input type="text" id="isbn" wire:model="isbn" placeholder="ISBN" required
                            class="mt-2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div class="flex flex-col">
                        <label for="publisher" class="text-sm font-semibold text-gray-700">Editorial</label>
                        <input required type="text" id="publisher" wire:model="publisher" placeholder="Editorial"
                            class="mt-2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div class="flex flex-col">
                        <label for="userId" class="text-sm font-semibold text-gray-700">Usuario (ID)</label>
                        <input type="number" id="userId" wire:model="userId" placeholder="Usuario (ID)" required
                            class="mt-2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div class="col-span-full mt-6">
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 transition-colors">
                            {{ $isEdit ? 'Actualizar Libro' : 'Crear Libro' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
