<x-app-layout>
    @if(Auth::user()->is_admin === 1)
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-white text-4xl font-bold mb-8 text-center">Lista de Clases</h1>
            <div class="flex justify-end mb-4">
                <a href="{{ route('clases.create') }}" class="bg-gradient-to-r from-blue-500 to-green-500 hover:from-blue-600 hover:to-green-600 text-white font-semibold rounded-lg shadow-lg transition duration-300 transform hover:scale-105 px-4 py-2">Crear Clase</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Categoría</th>
                            <th class="px-4 py-2">Instructor</th>
                            <th class="px-4 py-2">Cupos Totales</th>
                            <th class="px-4 py-2">Duración</th>
                            <th class="px-4 py-2">Fecha de Inicio</th>
                            <th class="px-4 py-2">Hora de Inicio</th>
                            <th class="px-4 py-2">Hora de Fin</th>
                            <th class="px-4 py-2">Costo de Inscripción</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clases as $clase)
                        <tr>
                            <td class="border px-4 py-2 text-black">{{ $clase->id }}</td>
                            <td class="border px-4 py-2 text-black">{{ $clase->categoria->categoria }}</td> {{-- Accede al nombre de la categoría --}}
                            <td class="border px-4 py-2 text-black">{{ $clase->instructor }}</td>
                            <td class="border px-4 py-2 text-black">{{ $clase->cupos_totales }}</td>
                            <td class="border px-4 py-2 text-black">{{ $clase->duracion }}</td>
                            <td class="border px-4 py-2 text-black">{{ $clase->fecha_inicio }}</td>
                            <td class="border px-4 py-2 text-black">{{ $clase->hora_inicio }}</td>
                            <td class="border px-4 py-2 text-black">{{ $clase->hora_fin }}</td>
                            <td class="border px-4 py-2 text-black">{{ $clase->costo_inscripcion }}</td>
                            <td class="border px-4 py-2 flex space-x-2">
                                <a href="{{ route('clases.edit', $clase->id) }}" class="bg-gradient-to-r from-blue-500 to-green-500 hover:from-blue-600 hover:to-green-600 text-white font-semibold rounded-lg shadow-lg transition duration-300 transform hover:scale-105 px-2 py-1">Editar</a>
                                <form action="{{ route('clases.destroy', $clase->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta clase?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg shadow-lg transition duration-300 transform hover:scale-105 px-2 py-1">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <script>window.location = "/dashboard";</script>
    @endif
</x-app-layout>

