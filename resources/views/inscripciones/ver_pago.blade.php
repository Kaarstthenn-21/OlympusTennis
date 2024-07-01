<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-white text-4xl font-bold mb-8 text-center">Factura de Pago</h1>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold mb-2 text-black">Usuario: {{ $factura->user->name }}</h2>
            <p class="text-black"><span class="font-semibold">Monto:</span> {{ $factura->monto }}</p>
            <div class="mt-4 flex justify-center">
                <img src="{{ asset($factura->imagen_pago) }}" alt="Imagen de Pago" class="h-70 w-auto rounded-lg">
            </div>
        </div>
    </div>
</x-app-layout>
