<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-white text-4xl font-bold mb-8 text-center">Lista de Clases</h1>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p class="font-bold">¡Éxito!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($clases as $clase)
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-2 text-black">{{ $clase->categoria->categoria }}</h2>
                    <p class="text-black"><span class="font-semibold">Instructor:</span> {{ $clase->instructor }}</p>
                    <p class="text-black"><span class="font-semibold">Cupos Totales:</span> {{ $clase->cupos_totales }}</p>
                    <p class="text-black"><span class="font-semibold">Duración:</span> {{ $clase->duracion }} minutos</p>
                    <p class="text-black"><span class="font-semibold">Fecha de Inicio:</span> {{ $clase->fecha_inicio }}</p>
                    <p class="text-black"><span class="font-semibold">Hora de Inicio:</span> {{ $clase->hora_inicio }}</p>
                    <p class="text-black"><span class="font-semibold">Hora de Fin:</span> {{ $clase->hora_fin }}</p>
                    <p class="text-black"><span class="font-semibold">Costo de Inscripción:</span> s/.{{ $clase->costo_inscripcion }}</p>
                    <p class="mt-4 text-black">{{ $clase->informacion }}</p>
                    
                    <div class="flex justify-between mt-4">
                        <!-- Botón Ver Participantes -->
                        <a href="{{ route('clases.participantes', $clase) }}" class="bg-gray-800 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">
                            Ver Participantes
                        </a>

                        <!-- Botón Más Información -->
                        <a href="{{ route('clases.show', $clase) }}" class="bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700">
                            Más Información
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

