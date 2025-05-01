<div class="max-w-7xl mx-auto p-6 bg-gray-100 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Gestión de Usuarios</h2>

    <form wire:submit.prevent="createUser" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 bg-white p-6 rounded-md shadow-sm border border-gray-200">
        <div class="flex flex-col">
            <label for="name" class="text-sm font-semibold text-gray-600">Nombre</label>
            <input type="text" id="name" wire:model="name" placeholder="Nombre" required class="mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div class="flex flex-col">
            <label for="email" class="text-sm font-semibold text-gray-600">Email</label>
            <input type="email" id="email" wire:model="email" placeholder="Email" required class="mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div class="flex flex-col">
            <label for="password" class="text-sm font-semibold text-gray-600">Contraseña</label>
            <input type="password" id="password" wire:model="password" placeholder="Contraseña" required class="mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div class="flex flex-col">
            <label for="phone" class="text-sm font-semibold text-gray-600">Teléfono</label>
            <input type="text" id="phone" wire:model="phone" placeholder="Teléfono" required class="mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div class="col-span-full">
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition-colors">Crear Usuario</button>
        </div>
    </form>

    <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Lista de Usuarios</h3>
    <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white rounded-md shadow-sm border border-gray-200">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Teléfono</th>
                    <th class="px-4 py-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-100 transition-colors">
                        <td class="border px-4 py-2">{{ $user->id }}</td>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">{{ $user->phone }}</td>
                        <td class="border px-4 py-2 text-center">
                            <button wire:click="deleteUser({{ $user->id }})" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition-colors">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
