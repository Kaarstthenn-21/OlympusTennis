<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-white text-4xl font-bold mb-8 text-center">Detalles de la Clase</h1>

        <div class="bg-white rounded-lg shadow-lg p-6 flex flex-wrap">
            <div class="w-full md:w-1/2">
                <h2 class="text-xl font-bold mb-2 text-black">{{ $clase->categoria->categoria }}</h2>
                <p class="text-black"><span class="font-semibold">Instructor:</span> {{ $clase->instructor }}</p>
                <p class="text-black"><span class="font-semibold">Cupos Totales:</span> {{ $clase->cupos_totales }}</p>
                <p class="text-black"><span class="font-semibold">Duración:</span> {{ $clase->duracion }} minutos</p>
                <p class="text-black"><span class="font-semibold">Fecha de Inicio:</span> {{ $clase->fecha_inicio }}</p>
                <p class="text-black"><span class="font-semibold">Hora de Inicio:</span> {{ $clase->hora_inicio }}</p>
                <p class="text-black"><span class="font-semibold">Hora de Fin:</span> {{ $clase->hora_fin }}</p>
                <p class="text-black"><span class="font-semibold">Costo de Inscripción:</span> S/.{{ $clase->costo_inscripcion }}</p>
                <p class="mt-4 text-black">{{ $clase->informacion }}</p>
                
                @if ($hayCuposDisponibles)
                    <div id="forma-pago" class="mb-4 text-center">
                        <h4 class="text-black font-bold">Paga con Yape</h4>
                        <div class="flex justify-center">
                            <button class="image-button" type="button" onclick="mostrar();">
                                <img src="{{ asset('images/Yape.jpeg') }}" alt="Yape" class="w-14 h-14 mx-auto">
                            </button>
                        </div>
                        <p class="text-black mt-2">Método de pago mediante QR, cuando se realice<br> el pago se debe adjuntar el comprobante.</p>
                    </div>
                @endif
            </div>
            <div class="w-full md:w-1/2 md:pl-8">
                @if ($hayCuposDisponibles)
                    <div id="form-inscripcion" class="hidden">
                        <form action="{{ route('inscripciones.inscribir', $clase) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-col items-center">
                                <img src="{{ asset('images/QR.jpeg') }}" alt="QR Code" class="w-48 h-48 mb-4 mx-auto">
                                <div class="qr-info text-center">
                                    <p class="text-black">Importe a pagar</p>
                                    <h2 class="text-black font-bold">S/. {{ $clase->costo_inscripcion }}</h2>
                                    <p class="text-black mt-2">
                                        Escanea el código QR desde la App Yape y realiza el pago. <br>
                                        Luego sube la captura de pantalla del Yapeo realizado. <br>
                                        (es el único comprobante de pago) para completar la solicitud.
                                    </p>
                                    <div class="upload-section mt-4">
                                        <label for="imagen_pago" class="block text-black font-bold mb-2">Subir imagen del comprobante:<br>(formatos permitidos:jpeg,png,jpg)</label>
                                        <input type="file" name="imagen_pago" id="imagen_pago" required class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline">
                                    </div>
                                    <button type="submit" class="bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700 mt-4">Confirmar Inscripción</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <p class="text-red-500 mt-4">Ya no hay cupos disponibles.</p>
                    <button class="bg-gray-400 text-white font-bold py-2 px-4 rounded mt-4 cursor-not-allowed" disabled>
                        Inscripción Cerrada
                    </button>
                @endif
            </div>
        </div>
    </div>

    <script>
        function mostrar() {
            var formInscripcion = document.getElementById('form-inscripcion');
            formInscripcion.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
