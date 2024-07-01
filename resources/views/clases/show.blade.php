<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-black text-black">
        <div class="bg-white shadow-md rounded-lg p-8 max-w-md w-full">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-900">Detalles de la Clase</h1>
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <strong class="block text-sm font-bold mb-2 text-gray-700">Categoría:</strong> 
                    <p class="text-lg font-medium">{{ $clase->categoria->categoria }}</p>
                </div>
                <div class="mb-4">
                    <strong class="block text-sm font-bold mb-2 text-gray-700">Instructor:</strong>
                    <p class="text-lg font-medium">{{ $clase->instructor }}</p>
                </div>
                <div class="mb-4">
                    <strong class="block text-sm font-bold mb-2 text-gray-700">Cupos Totales:</strong>
                    <p class="text-lg font-medium">{{ $clase->cupos_totales }}</p>
                </div>
                <div class="mb-4">
                    <strong class="block text-sm font-bold mb-2 text-gray-700">Duración:</strong>
                    <p class="text-lg font-medium">{{ $clase->duracion }} minutos</p>
                </div>
                <div class="mb-4">
                    <strong class="block text-sm font-bold mb-2 text-gray-700">Fecha de Inicio:</strong>
                    <p class="text-lg font-medium">{{ $clase->fecha_inicio }}</p>
                </div>
                <div class="mb-4">
                    <strong class="block text-sm font-bold mb-2 text-gray-700">Hora de Inicio:</strong>
                    <p class="text-lg font-medium">{{ $clase->hora_inicio }}</p>
                </div>
                <div class="mb-4">
                    <strong class="block text-sm font-bold mb-2 text-gray-700">Hora de Fin:</strong>
                    <p class="text-lg font-medium">{{ $clase->hora_fin }}</p>
                </div>
                <div class="mb-4 col-span-2">
                    <strong class="block text-sm font-bold mb-2 text-gray-700">Costo de Inscripción:</strong>
                    <p class="text-lg font-medium">S/.{{ $clase->costo_inscripcion }}</p>
                </div>
                <div class="mb-4 col-span-2">
                    <strong class="block text-sm font-bold mb-2 text-gray-700">Información:</strong>
                    <p class="text-lg font-medium">{{ $clase->informacion }}</p>
                </div>
            </div>
            <div class="flex justify-center mt-6">
                <a href="{{ route('clases.list') }}" class="bg-gradient-to-r from-blue-500 to-green-500 hover:from-blue-600 hover:to-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Volver a la lista</a>
            </div>
        </div>
    </div>
</x-app-layout>
