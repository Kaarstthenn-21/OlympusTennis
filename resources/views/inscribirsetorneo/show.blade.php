<x-app-layout>
    <div class="container mx-auto p-8 bg-white shadow-md rounded-lg">
        <div class="pedido flex flex-col md:flex-row">
            <!-- Resumen del Torneo -->
            <div class="w-full md:w-1/2 p-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-24 h-24 mb-4 mx-auto md:mx-0">
                <h1 class="text-3xl font-bold mb-6 text-black text-center md:text-left">{{ $torneo->nombre_torneo }}</h1>
                <table class="mb-4 w-full text-center md:text-left">
                    <tbody>
                        <tr>
                            <td class="text-black"><strong>Descripción:</strong></td>
                            <td class="text-black">{{ $torneo->descripcion }}</td>
                        </tr>
                        <tr>
                            <td class="text-black"><strong>Organizador:</strong></td>
                            <td class="text-black">{{ $torneo->organizador }}</td>
                        </tr>
                        <tr>
                            <td class="text-black"><strong>Fecha de Inicio:</strong></td>
                            <td class="text-black">{{ $torneo->fecha_inicio }}</td>
                        </tr>
                        <tr>
                            <td class="text-black"><strong>Modalidad:</strong></td>
                            <td class="text-black">{{ $torneo->modalidad }}</td>
                        </tr>
                        <tr>
                            <td class="text-black"><strong>Cupos disponibles:</strong></td>
                            <td class="text-black">{{ $torneo->cupos_totales }}</td>
                        </tr>
                        <tr>
                            <td class="text-black"><strong>Monto de inscripción:</strong></td>
                            <td class="text-black">${{ $torneo->costo_inscripcion }}</td>
                        </tr>
                    </tbody>
                </table>

                <!-- Mensaje de Inscripción -->
                @if($inscrito)
                    <div class="alert alert-success mb-4 text-center">
                        Ya estás inscrito en este torneo.
                    </div>
                @endif

                <!-- Sección de Pago -->
                <div id="forma-pago" class="mb-4 text-center md:text-center">
                    <h4 class="text-black font-bold">Paga con Yape</h4>
                    <div class="flex justify-center">
                        <button class="image-button" type="button" onclick="mostrar();">
                            <img src="{{ asset('images/Yape.jpeg') }}" alt="Yape" class="w-14 h-14 mx-auto">
                        </button>
                    </div>
                    <p class="text-black mt-2">Método de pago mediante QR, cuando se realice<br> el pago se debe adjuntar el comprobante.</p>
                </div>
            </div>

            <!-- Confirmación de la Inscripción -->
            <div class="w-full md:w-1/2 p-4">
                @if(!$inscrito)
                    <form action="{{ route('inscribirsetorneo.inscribirse', $torneo->id_torneo) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="torneo_id" value="{{ $torneo->id_torneo }}">

                        <div id="qr-section" style="display:none;" class="flex flex-col items-center">
                            <img src="{{ asset('images/QR.jpeg') }}" alt="QR Code" class="w-48 h-48 mb-4 mx-auto">
                            <div class="qr-info text-center">
                                <p class="text-black">Importe a pagar</p>
                                <h2 class="text-black font-bold">${{ $torneo->costo_inscripcion }}</h2>
                                <p class="text-black mt-2">
                                    Escanea el código QR desde la App Yape y realiza el pago. <br>
                                    Luego sube la captura de pantalla del Yapeo realizado. <br>
                                    (es el único comprobante de pago) para completar la solicitud.
                                </p>
                                <div class="upload-section mt-4">
                                    <label for="imagen_pago" class="block text-black font-bold mb-2">Subir imagen del comprobante:<br>(formatos permitidos: jpeg, png, jpg)</label>
                                    <input type="file" name="imagen_pago" id="imagen_pago" required class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <button type="submit" class="bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700 mt-4">Confirmar Inscripción</button>
                            </div>
                        </div>
                    </form>
                @endif

                @if(session('success'))
                    <div class="alert alert-success mt-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger mt-4">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        function mostrar() {
            document.getElementById('qr-section').style.display = 'block';
        }
    </script>
</x-app-layout>

