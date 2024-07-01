<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-white text-4xl font-bold mb-8 text-center">Partidos de la Ronda 2</h1>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md text-white">
            @foreach ($partidosRonda2 as $partido)
                <div class="mb-4">
                    <h2 class="text-2xl font-semibold">Partido {{ $partido->nro_partido }}</h2>
                    <p>Jugador 1: {{ $partido->nombre_jugador1 }}</p>
                    <p>Jugador 2: {{ $partido->nombre_jugador2 }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
