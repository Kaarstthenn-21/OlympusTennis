<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-white text-4xl font-bold mb-8 text-center">Lista de Torneos</h1>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p class="font-bold">¡Éxito!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($torneos as $torneo)
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h5 class="text-2xl font-bold mb-4 text-black">{{ $torneo->nombre_torneo }}</h5>
                    <p class="text-black">Organizador: {{ $torneo->organizador }}</p>
                    <p class="text-black">Fecha de Inicio: {{ $torneo->fecha_inicio }}</p>
                    <p class="text-black">Modalidad: {{ $torneo->modalidad }}</p>
                    <p class="text-black">Cupos Disponibles: {{ $torneo->cupos_totales }}</p>
                    <p class="text-black">Costo de Inscripción: {{ $torneo->costo_inscripcion }}</p>
                    <p class="text-black">Descripción: {{ $torneo->descripcion }}</p>
                    
                    <div class="flex justify-between mt-4">
                        <a href="{{ route('inscribirsetorneo.show', $torneo->id_torneo) }}" class="bg-gray-800 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">
                            Inscribirse
                        </a>
                        <a href="{{ route('torneos.show', $torneo->id_torneo) }}" class="bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700">
                            Más Información
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
