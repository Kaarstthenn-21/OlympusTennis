<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-white text-4xl font-bold mb-8 text-center">Asignar Ronda 2</h1>
        <form method="POST" action="{{ route('partidos.guardarRonda2', $idTorneo) }}" class="space-y-4">
            @csrf
            @foreach ($partidosRonda2 as $partido)
                <div class="bg-gray-800 p-6 rounded-lg shadow-md text-white">
                    <h2 class="text-2xl font-semibold mb-4">Partido {{ $partido['nro_partido'] }}</h2>
                    <p class="mb-2">Jugador 1: {{ $partido['nombre_jugador1'] }}</p>
                    <p class="mb-2">Jugador 2: {{ $partido['nombre_jugador2'] }}</p>
                    <div class="mb-4">
                        <label for="cancha_{{ $partido['nro_partido'] }}" class="block text-sm font-medium">Cancha:</label>
                        <input type="text" id="cancha_{{ $partido['nro_partido'] }}" name="cancha[{{ $partido['nro_partido'] }}]" class="mt-1 block w-full p-2 bg-gray-700 border border-gray-600 rounded-lg" required>
                    </div>
                    <div class="mb-4">
                        <label for="fecha_{{ $partido['nro_partido'] }}" class="block text-sm font-medium">Fecha:</label>
                        <input type="date" id="fecha_{{ $partido['nro_partido'] }}" name="fecha[{{ $partido['nro_partido'] }}]" class="mt-1 block w-full p-2 bg-gray-700 border border-gray-600 rounded-lg" required>
                    </div>
                    <div class="mb-4">
                        <label for="ganador_{{ $partido['nro_partido'] }}" class="block text-sm font-medium">Ganador:</label>
                        <select id="ganador_{{ $partido['nro_partido'] }}" name="ganador[{{ $partido['nro_partido'] }}]" class="mt-1 block w-full p-2 bg-gray-700 border border-gray-600 rounded-lg" required>
                            <option value="{{ $partido['jugador1'] }}">{{ $partido['nombre_jugador1'] }}</option>
                            <option value="{{ $partido['jugador2'] }}">{{ $partido['nombre_jugador2'] }}</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="puntaje_{{ $partido['nro_partido'] }}" class="block text-sm font-medium">Puntaje:</label>
                        <input type="text" id="puntaje_{{ $partido['nro_partido'] }}" name="puntaje[{{ $partido['nro_partido'] }}]" class="mt-1 block w-full p-2 bg-gray-700 border border-gray-600 rounded-lg" placeholder="Jugador 1 (6 6 6) Jugador 2 (4 4 4)" required>
                    </div>
                </div>
            @endforeach
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">
                    Guardar Ronda 2
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

