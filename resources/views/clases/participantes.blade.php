<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-white text-4xl font-bold mb-8 text-center">Participantes de la clase: {{ $clase->categoria->nombre }}</h1>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold mb-2 text-black">Instructor: {{ $clase->instructor }}</h2>
            <p class="text-black"><span class="font-semibold">Fecha de Inicio:</span> {{ $clase->fecha_inicio }}</p>
            <p class="text-black"><span class="font-semibold">Hora de Inicio:</span> {{ $clase->hora_inicio }}</p>
            <p class="text-black"><span class="font-semibold">Hora de Fin:</span> {{ $clase->hora_fin }}</p>
        </div>

        <h2 class="text-white text-3xl font-bold mt-8 mb-4">Lista de Participantes</h2>
        @if($inscripciones->isEmpty())
            <p class="text-white">No hay participantes inscritos en esta clase.</p>
        @else
            <ul class="list-disc list-inside">
                @foreach($inscripciones as $inscripcion)
                    <li class="text-white">
                        {{ $inscripcion->user->name }} ({{ $inscripcion->user->email }})
                        <a href="{{ route('inscripciones.ver-pago', $inscripcion->id) }}" class="ml-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Ver Pago
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-app-layout>
