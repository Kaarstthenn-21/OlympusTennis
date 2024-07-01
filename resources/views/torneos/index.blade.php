<x-app-layout>
    @if(Auth::user()->is_admin === 1)
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-white text-4xl font-bold mb-8 text-center">Lista de Torneos</h1>
            <div class="flex justify-end mb-4">
                <a href="{{ route('torneos.create') }}" class="bg-gradient-to-r from-blue-500 to-green-500 hover:from-blue-600 hover:to-green-600 text-white font-semibold rounded-lg shadow-lg transition duration-300 transform hover:scale-105 px-4 py-2">Crear Torneo</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Categoría</th>
                            <th class="px-4 py-2">Organizador</th>
                            <th class="px-4 py-2">Nombre del Torneo</th>
                            <th class="px-4 py-2">Modalidad</th>
                            <th class="px-4 py-2">Cupos Totales</th>
                            <th class="px-4 py-2">Fecha de Inicio</th>
                            <th class="px-4 py-2">Costo de Inscripción</th>
                            <th class="px-4 py-2">Descripción</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($torneos as $torneo)
                        <tr>
                            <td class="border px-4 py-2 text-black">{{ $torneo->id_torneo }}</td>
                            <td class="border px-4 py-2 text-black">{{ $torneo->categoria->categoria }}</td>
                            <td class="border px-4 py-2 text-black">{{ $torneo->organizador }}</td>
                            <td class="border px-4 py-2 text-black">{{ $torneo->nombre_torneo }}</td>
                            <td class="border px-4 py-2 text-black">{{ $torneo->modalidad }}</td>
                            <td class="border px-4 py-2 text-black">{{ $torneo->cupos_totales }}</td>
                            <td class="border px-4 py-2 text-black">{{ $torneo->fecha_inicio }}</td>
                            <td class="border px-4 py-2 text-black">{{ $torneo->costo_inscripcion }}</td>
                            <td class="border px-4 py-2 text-black">{{ $torneo->descripcion }}</td>
                            <td class="border px-4 py-2 flex space-x-2">
                                <a href="{{ route('torneos.edit', $torneo->id_torneo) }}" class="bg-gradient-to-r from-blue-500 to-green-500 hover:from-blue-600 hover:to-green-600 text-white font-semibold rounded-lg shadow-lg transition duration-300 transform hover:scale-105 px-2 py-1">Editar</a>
                                <form action="{{ route('torneos.destroy', $torneo->id_torneo) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este torneo?');">
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
