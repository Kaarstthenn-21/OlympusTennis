<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-white text-4xl font-bold mb-8 text-center">Seleccionar Cancha</h1>
        <div class="flex justify-center flex-wrap">
            @foreach ($canchas as $cancha)
                <a href="{{ route('reservar', ['cancha' => $cancha->id]) }}" class="block w-40 h-40 m-2 bg-gradient-to-r from-blue-500 to-green-500 hover:from-blue-600 hover:to-green-600 text-white font-semibold rounded-lg shadow-lg transition duration-300 transform hover:scale-105 flex items-center justify-center">
                    {{ $cancha->nombre }}
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
