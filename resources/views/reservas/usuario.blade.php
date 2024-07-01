<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-white text-4xl font-bold mb-8 text-center">Mis Reservas</h1>

        @if($reservas->isEmpty())
            <p class="text-white text-center">No tienes reservas.</p>
        @else
            @foreach($reservas as $fecha => $reservasPorFecha)
                <div class="mb-8">
                    <h2 class="text-white text-3xl font-bold mb-4 text-center">Reservas para {{ $fecha }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($reservasPorFecha as $reserva)
                            <div class="bg-gradient-to-r from-blue-500 to-green-500 hover:from-blue-600 hover:to-green-600 text-white font-semibold rounded-lg shadow-lg transition duration-300 transform hover:scale-105 p-6">
                                <p class="text-xl"><span class="font-bold">Cancha:</span> {{ $reserva->cancha->nombre }}</p>
                                <p class="text-lg"><span class="font-bold">Horario:</span> {{ $reserva->horario }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</x-app-layout>
