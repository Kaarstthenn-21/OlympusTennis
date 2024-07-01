<!-- resources/views/inscripciones/mis_clases.blade.php -->

<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-white text-4xl font-bold mb-8 text-center">Mis Clases</h1>
        @if($clases->isEmpty())
            <p class="text-center text-white">No estás inscrito en ninguna clase.</p>
        @else
            <div class="flex justify-center flex-wrap">
                @foreach ($clases as $clase)
                    <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                        <div class="bg-gradient-to-r from-blue-500 to-green-500 hover:from-blue-600 hover:to-green-600 text-white font-semibold rounded-lg shadow-lg transition duration-300 transform hover:scale-105 p-6 cursor-pointer" onclick="window.location='{{ route('clases.show', $clase->id) }}'">
                            <h2 class="text-xl font-bold mb-2">{{ $clase->categoria->categoria }}</h2>
                            <p><strong>Instructor:</strong> {{ $clase->instructor }}</p>
                            <p><strong>Duración:</strong> {{ $clase->duracion }} minutos</p>
                            <p><strong>Fecha de Inicio:</strong> {{ $clase->fecha_inicio }}</p>
                            <p><strong>Hora de Inicio:</strong> {{ $clase->hora_inicio }}</p>
                            <p><strong>Hora de Fin:</strong> {{ $clase->hora_fin }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
